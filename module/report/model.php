<?php
/**
 * the model of reprot module
 */

class reportModel extends model
{

	/**
	 *
	 */
	public function getProjectReports($conds = array(), $pager = null)
	{
		$projects = $this->dao->select('project.id, project.code, project.name')
			->from(TABLE_PROJECT)->alias('project')
			->where('deleted')->eq(0)
			->page($pager)
			->fetchAll('id');
		foreach ($projects As $pid => $project) {
			$appDetails = $this->dao->select('application.id, applicationdetail.id AS applicationdetail_id, applicationdetail.material_id, applicationdetail.qty, material.code AS material_code, material.name AS material_name, mtype.name AS material_type_name')
				->from(TABLE_MATERIALAPPLICATION)->alias('application')
				->rightJoin(TABLE_MATERIALAPPLICATIONDETAIL)->alias('applicationdetail')
				->on('applicationdetail.application_id = application.id')
				->leftJoin(TABLE_MATERIAL)->alias('material')
				->on('applicationdetail.material_id = material.id')
				->leftJoin(TABLE_MATERIALTYPE)->alias('mtype')
				->on('material.type_id = mtype.id')
				->where('application.project_id')->eq($pid)
				->fetchAll();

			$projects[$pid]->appdetails = $appDetails;
			unset($appDetails);
		}

		return $projects;
	}

	/**
	 *
	 */
	public function getList($projectID, $type = 'today', $conds = array())
	{
		$reports = $this->dao->select('report.*')->from(TABLE_REPORT)->alias('report')
			->where('deleted')->eq(0)
			->andWhere('type')->eq($type)
			->andWhere('project_id')->eq($projectID)
			->fetchAll('id');

		return $reports;
	}

	/**
	 *
	 */
	public function getReportById($reportID)
	{
		$report = $this->dao->findById((int)$reportID)->from(TABLE_REPORT)->fetch();

		$materialUsed = $this->dao->select('used.id, used.project_id, used.material_id, used.qty, material.code AS material_code, material.name AS material_name, material.unit AS material_unit, mtype.name AS material_type_name')->from(TABLE_MATERIALUSEDHISTORY)->alias('used')
			->leftJoin(TABLE_MATERIAL)->alias('material')
			->on('used.material_id = material.id')
			->leftJoin(TABLE_MATERIALTYPE)->alias('mtype')
			->on('material.type_id = mtype.id')
			->where('used.report_id')->eq($reportID)
			->fetchAll('id');
		$machineUsed = $this->dao->select('used.id, used.project_id, used.machine_id, used.hours,
          machine.code AS machine_code, machine.name AS machine_name, mtype.name AS machiine_type_name')->from(TABLE_MACHINEUSEDHISTORY)->alias('used')
			->leftJoin(TABLE_MACHINE)->alias('machine')
			->on('used.machine_id = machine.id')
			->leftJoin(TABLE_MACHINETYPE)->alias('mtype')
			->on('machine.type_id = mtype.id')
			->where('used.report_id')->eq($reportID)
			->fetchAll('id');

		$report->material_used_history = $materialUsed;
		$report->machine_used_history = $machineUsed;

		return $report;
	}

	/**
	 * Create report for a project
	 */
	public function create()
	{
		global $app;

		$dt = date('Y-m-d H:i:s');
		$report = fixer::input('post')->get();
		$report->created = $dt;
		$report->modified = $dt;
		$report->deleted = 0;
		$report->created_by = $app->user->account;

		// material used data
		$materialsUsed = array();
		foreach ($report->material['ids'] As $i => $materialID) {
			$materialsUsed[$i] = new stdClass();
			$materialsUsed[$i]->material_id = $materialID;
			$materialsUsed[$i]->qty = $report->material['used_qty'][$i];

			$materialsUsed[$i]->project_id = $report->project_id;
			$materialsUsed[$i]->created = $dt;
			$materialsUsed[$i]->modified = $dt;
			$materialsUsed[$i]->deleted = 0;
			$materialsUsed[$i]->created_by = $app->user->account;
		}
		unset($report->material);

		// machine used data
		$machinesUsed = array();
		foreach ($report->machine['ids'] As $i => $machineID) {
			$machinesUsed[$i] = new stdClass();
			$machinesUsed[$i]->machine_id = $machineID;
			$machinesUsed[$i]->hours = $report->machine['used_hours'][$i];

			$machinesUsed[$i]->project_id = $report->project_id;
			$machinesUsed[$i]->created = $dt;
			$machinesUsed[$i]->modified = $dt;
			$machinesUsed[$i]->deleted = 0;
			$machinesUsed[$i]->created_by = $app->user->account;
		}
		unset($report->machine);

		$this->dao->insert(TABLE_REPORT)->data($report)
			->check('content', 'NotEmpty')
			->check('reprot_date', 'date')
			->exec();
		if (!dao::isError()) {
			$reportID = $this->dao->lastInsertId();
		}

		foreach ($materialsUsed As $usedData) {
			$usedData->report_id = $reportID;

			$this->dao->insert(TABLE_MATERIALUSEDHISTORY)->data($usedData)
				->exec();
		}
		foreach ($machinesUsed As $hourData) {
			$hourData->report_id = $reportID;

			$this->dao->insert(TABLE_MACHINEUSEDHISTORY)->data($hourData)
				->exec();
		}

		return $reportID;
	}

	/**
	 * Create a Testation
	 */
	public function createTestation()
	{
		global $app;

		$dt = date('Y-m-d H:i:s');
		$testation = fixer::input('post')->get();
		$testation->created = $dt;
		$testation->modified = $dt;
		$testation->deleted = 0;
		$testation->created_by = $app->user->account;

		$this->dao->insert(TABLE_TESTATION)->data($testation)
			->check('content', 'NotEmpty')
			->check('reprot_date', 'date')
			->exec();

		if (!dao::isError()) {
			$testationID = $this->dao->lastInsertId();

			return $testationID;
		}

		return false;
	}

	/**
	 * Create a Problem
	 */
	public function createProblem()
	{
		global $app;

		$dt = date('Y-m-d H:i:s');
		$problem = fixer::input('post')->get();
		$problem->created = $dt;
		$problem->modified = $dt;
		$problem->deleted = 0;
		$problem->created_by = $app->user->account;

		$this->dao->insert(TABLE_PROBLEM)->data($problem)
			->check('content', 'NotEmpty')
			->check('reprot_date', 'date')
			->exec();

		if (!dao::isError()) {
			$problemID = $this->dao->lastInsertId();

			return $problemID;
		}

		return false;
	}

	/**
	 * Create the html code of chart.
	 *
	 * @param  string $swf the swf type
	 * @param  string $dataURL the date url
	 * @param  int $width
	 * @param  int $height
	 * @access public
	 * @return string
	 */
	public function createChart($swf, $dataURL, $width = 800, $height = 500)
	{
		$chartRoot = $this->app->getWebRoot() . 'fusioncharts/';
		$swfFile = "fcf_$swf.swf";
		return <<<EOT
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase=http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="$width" height="$height" id="fcf$swf" >
<param name="movie"     value="$chartRoot$swfFile" />
<param name="FlashVars" value="&dataURL=$dataURL&chartWidth=$width&chartHeight=$height">
<param name="quality"   value="high" />
<param name="wmode"     value="Opaque">
<embed src="$chartRoot$swfFile" flashVars="&dataURL=$dataURL&chartWidth=$width&chartHeight=$height" quality="high" wmode="Opaque" width="$width" height="$height" name="fcf$swf" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
EOT;
	}

	/**
	 * Create the js code of chart.
	 *
	 * @param  string $swf the swf type
	 * @param  string $dataURL the date url
	 * @param  int $width
	 * @param  int $height
	 * @access public
	 * @return string
	 */
	public function createJSChart($swf, $dataXML, $width = 'auto', $height = 500)
	{
		$jsRoot = $this->app->getWebRoot() . 'js/';
		static $count = 0;
		$count++;
		$chartRoot = $this->app->getWebRoot() . 'fusioncharts/';
		$swfFile = "fcf_$swf.swf";
		$divID = "chart{$count}div";
		$chartID = "chart{$count}";

		$js = '';
		if ($count == 1) $js = "<script language='Javascript' src='{$jsRoot}misc/fusioncharts.js'></script>";
		return <<<EOT
$js
<div id="$divID" class='chartDiv'></div>
<script language="JavaScript"> 
function createChart$count()
{
chartWidth = "$width";
if(chartWidth == 'auto') chartWidth = $('#$divID').width() - 10;
if(chartWidth < 300) chartWidth = 300;
var $chartID = new FusionCharts("$chartRoot$swfFile", "{$chartID}id", chartWidth, "$height"); 
$chartID.setDataXML("$dataXML");
$chartID.render("$divID");
}
</script>
EOT;
	}

	public function createJSChartFlot($projectName, $flotJSON, $width = 'auto', $height = 500)
	{
		$this->app->loadLang('project');
		$jsRoot = $this->app->getWebRoot() . 'js/';
		$width = $width . 'px';
		$height = $height . 'px';

		$dataJSON = $flotJSON['data'];
		$limitJSON = $flotJSON['limit'];
		$baselineJSON = $flotJSON['baseline'];
		$dateListJSON = $flotJSON['dateList'];
		$ticksJSON = $flotJSON['ticks'];
		return <<<EOT
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{$jsRoot}jquery/flot/excanvas.min.js"></script><![endif]-->
<script language="javascript" type="text/javascript" src="{$jsRoot}jquery/flot/jquery.flot.min.js"></script>
<div id="placeholder" style="width:$width;height:$height;margin:0 auto"></div>
<script type="text/javascript">
$(function () 
{
    var data     = $dataJSON;
    var limit    = $limitJSON;
    var baseline = $baselineJSON;
    var dateList = $dateListJSON;
    var ticks    = $ticksJSON;
    var firstDay = 0;
    function showTooltip(x, y, contents) 
    {
        $('<div id="tooltip">' + contents + '</div>').css
        ({
            position: 'absolute',
            display: 'none',
            top: y + 5,
            left: x + 5,
            border: '1px solid #fdd',
            padding: '2px',
            'background-color': '#fee',
            opacity: 0.80
        }).appendTo("body").fadeIn(200);
    }

        var options = {
            series: {lines:{show: true,  lineWidth: 2}, points: {show: true},hoverable: true},
            legend: {noColumns: 1},
            grid: { hoverable: true, clickable: true },
            xaxis:
            {
                 ticks:ticks,
                 tickFormatter: function(val)
                 {
                     tick = new Date(dateList[val]);
                     if(dateList[val] != undefined)
                     {
                         var month    = tick.getMonth() + 1;
                         var dateTail = '';
                         if(firstDay != month)
                         {
                             dateTail = '/' + month;
                             firstDay = month;
                         }

                         if(config.clientLang == 'en')
                         {
                             title = month + '/' + tick.getDate() + '/' + tick.getFullYear();
                         }
                         else
                         {
                             title = tick.getFullYear() + '/' + month + '/' + tick.getDate();
                         }

                         if(ticks.length <= 30) dateTail = '/' + month;
                         return '<span title="' + title + '">' + tick.getDate() + dateTail + '</span>';
                     }
                     return '';
                 }
            },
            yaxis: {mode: null, min: 0, minTickSize: [1, "day"]}};

    var placeholder = $("#placeholder");
    $("#placeholder").bind("plotselected", function (event, ranges) 
    {
        plot = $.plot(placeholder, data, $.extend(true, {}, options, {xaxis: { min: ranges.xaxis.from, max: ranges.xaxis.to } }));
    });
    var plot = $.plot(placeholder, [
            {
                data:data,
                color: "rgb(10, 12, 235)",
                lines:  {show: true},
                points: {show: true}
            },
            {
                data:baseline,
                color: "rgb(235, 12, 10)",
                hoverable: false,
                lines:  {show: true, lineWidth:0.5, lineType:'dashed', style:'dashed'},
                points: {show: false}
            },
            {
                data:limit,
                lines:  {show: false},
                points: {show: false}
            }
        ], options);
    var previousPoint = null;

    placeholder.bind("plothover", function(event, pos, item) 
    {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));

        if (item) 
        {
            if (previousPoint != item.dataIndex)    
            {
                previousPoint = item.dataIndex;

                $("#tooltip").remove();
                var x = item.datapoint[0].toFixed(2), y = item.datapoint[1].toFixed(2);

                showTooltip(item.pageX, item.pageY, y);
            }
        }
    });
});
</script>
<h1>$projectName  {$this->lang->project->burn}</h1>
EOT;
	}

	/**
	 * Create xml data of single charts.
	 *
	 * @param  array $sets
	 * @param  array $chartOptions
	 * @param  array $colors
	 * @access public
	 * @return string the xml data.
	 */
	public function createSingleXML($sets, $chartOptions = array(), $colors = array())
	{
		$data = pack("CCC", 0xef, 0xbb, 0xbf); // utf-8 bom.
		$data .= "<?xml version='1.0' encoding='UTF-8'?>";

		$data .= '<graph';
		foreach ($chartOptions as $key => $value) $data .= " $key='$value'";
		$data .= ">";

		if (empty($colors)) $colors = $this->lang->report->colors;
		$colorCount = count($colors);
		$i = 0;
		foreach ($sets as $set) {
			if ($i == $colorCount) $i = 0;
			$color = $colors[$i];
			$i++;
			$data .= "<set name='$set->name' value='$set->value' color='$color' />";
		}
		$data .= "</graph>";
		return $data;
	}

	public function createSingleJSON($sets, $dateList)
	{
		$data = '[';
		foreach ($dateList as $i => $date) {
			$date = date('Y-m-d', strtotime($date));
			if (isset($sets[$date])) $data .= "[$i, {$sets[$date]->value}],";
		}
		$data = rtrim($data, ',');
		$data .= ']';
		return $data;
	}

	/**
	 * Create the js code to render chart.
	 *
	 * @param  int $chartCount
	 * @access public
	 * @return string
	 */
	public function renderJsCharts($chartCount)
	{
		$js = '<script language="Javascript">';
		for ($i = 1; $i <= $chartCount; $i++) $js .= "createChart$i()\n";
		$js .= '</script>';
		return $js;
	}

	/**
	 * Compute percent of every item.
	 *
	 * @param  array $datas
	 * @access public
	 * @return array
	 */
	public function computePercent($datas)
	{
		$sum = 0;
		foreach ($datas as $data) $sum += $data->value;
		foreach ($datas as $data) $data->percent = round($data->value / $sum, 2);
		return $datas;
	}

	/**
	 * Get projects.
	 *
	 * @access public
	 * @return void
	 */
	public function getProjects()
	{
		$projects = array();

		$tasks = $this->dao->select('t1.*')
			->from(TABLE_TASK)->alias('t1')
			->leftJoin(TABLE_PROJECT)->alias('t2')
			->on('t1.project = t2.id')
			->where('t1.status')->ne('cancel')
			->andWhere('t1.deleted')->eq(0)
			->andWhere('t2.deleted')->eq(0)
			->fetchAll();
		foreach ($tasks as $task) {
			if (!isset($projects[$task->project])) $projects[$task->project] = new stdclass();

			$projects[$task->project]->estimate = isset($projects[$task->project]->estimate) ? $projects[$task->project]->estimate + $task->estimate : $task->estimate;
			$projects[$task->project]->consumed = isset($projects[$task->project]->consumed) ? $projects[$task->project]->consumed + $task->consumed : $task->consumed;
			$projects[$task->project]->tasks = isset($projects[$task->project]->tasks) ? $projects[$task->project]->tasks + 1 : 1;
			if ($task->type == 'devel') $projects[$task->project]->devConsumed = isset($projects[$task->project]->devConsumed) ? $projects[$task->project]->devConsumed + $task->consumed : $task->consumed;
			if ($task->type == 'test') $projects[$task->project]->testConsumed = isset($projects[$task->project]->testConsumed) ? $projects[$task->project]->testConsumed + $task->consumed : $task->consumed;
		}

		$bugs = $this->dao->select('t1.project')
			->from(TABLE_BUG)->alias('t1')
			->leftJoin(TABLE_PROJECT)->alias('t2')
			->on('t1.project = t2.id')
			->where('t1.deleted')->eq(0)
			->andWhere('t2.deleted')->eq(0)
			->fetchAll();
		foreach ($bugs as $bug) {
			if ($bug->project) {
				$projects[$bug->project] = new stdclass();
				$projects[$bug->project]->bugs = isset($projects[$bug->project]->bugs) ? $projects[$bug->project]->bugs + 1 : 1;
			}
		}

		$stories = $this->dao->select('t1.project')
			->from(TABLE_PROJECTSTORY)->alias('t1')
			->leftJoin(TABLE_PROJECT)->alias('t2')
			->on('t1.project = t2.id')
			->leftJoin(TABLE_STORY)->alias('t3')
			->on('t1.story = t3.id')
			->where('t2.deleted')->eq(0)
			->andWhere('t3.deleted')->eq(0)
			->fetchAll();
		foreach ($stories as $story) {
			if (!isset($projects[$story->project])) $projects[$story->project] = new stdclass();

			$projects[$story->project]->stories = isset($projects[$story->project]->stories) ? $projects[$story->project]->stories + 1 : 1;
		}

		$projectList = $this->dao->select('id, name, status')->from(TABLE_PROJECT)->fetchAll();
		$projectPairs = array();
		foreach ($projectList as $project) {
			$projectPairs[$project->id] = $project->name;
			if ($project->status != 'done') unset($projects[$project->id]);
		}
		foreach ($projects as $id => $project) {
			if (!isset($projectPairs[$id])) {
				unset($projects[$id]);
				continue;
			}
			if (!isset($project->stories)) $projects[$id]->stories = 0;
			if (!isset($project->bugs)) $projects[$id]->bugs = 0;
			if (!isset($project->devConsumed)) $projects[$id]->devConsumed = 0;
			if (!isset($project->testConsumed)) $projects[$id]->testConsumed = 0;
			if (!isset($project->consumed)) $projects[$id]->consumed = 0;
			if (!isset($project->estimate)) $projects[$id]->estimate = 0;
			$projects[$id]->name = $projectPairs[$id];
		}
		return $projects;
	}

	/**
	 * Get products.
	 *
	 * @access public
	 * @return array
	 */
	public function getProducts()
	{
		$products = $this->dao->select('id, code, name, PO')->from(TABLE_PRODUCT)->where('deleted')->eq(0)->fetchAll('id');
		$plans = $this->dao->select('*')->from(TABLE_PRODUCTPLAN)->where('deleted')->eq(0)->andWhere('product')->in(array_keys($products))->fetchAll('id');
		if (!$plans) return array();
		foreach ($plans as $plan) $products[$plan->product]->plans[$plan->id] = $plan;

		$planStories = $this->dao->select('plan, id, status')->from(TABLE_STORY)->where('deleted')->eq(0)->andWhere('plan')->in(array_keys($plans))->fetchGroup('plan', 'id');
		foreach ($planStories as $planID => $stories) {
			foreach ($stories as $story) {
				$plan = $plans[$story->plan];
				$products[$plan->product]->plans[$story->plan]->status[$story->status] = isset($products[$plan->product]->plans[$story->plan]->status[$story->status]) ? $products[$plan->product]->plans[$story->plan]->status[$story->status] + 1 : 1;
			}
		}
		$unplannedStories = $this->dao->select('product, id, status')->from(TABLE_STORY)->where('deleted')->eq(0)->andWhere('plan')->eq(0)->andWhere('product')->in(array_keys($products))->fetchGroup('product', 'id');
		foreach ($unplannedStories as $product => $stories) {
			$products[$product]->plans[0] = new stdClass();
			$products[$product]->plans[0]->title = $this->lang->report->unplanned;
			$products[$product]->plans[0]->begin = '';
			$products[$product]->plans[0]->end = '';
			foreach ($stories as $story) {
				$products[$product]->plans[0]->status[$story->status] = isset($products[$product]->plans[0]->status[$story->status]) ? $products[$product]->plans[0]->status[$story->status] + 1 : 1;
			}
		}
		return $products;
	}

	/**
	 * Get bugs
	 *
	 * @param  int $begin
	 * @param  int $end
	 * @access public
	 * @return array
	 */
	public function getBugs($begin, $end)
	{
		$end = date('Ymd', strtotime("$end +1 day"));
		$bugs = $this->dao->select('id, resolution, openedBy, status')->from(TABLE_BUG)
			->where('deleted')->eq(0)
			->andWhere('openedDate')->ge($begin)
			->andWhere('openedDate')->le($end)
			->fetchAll();

		$bugSummary = array();
		foreach ($bugs as $bug) {
			$bugSummary[$bug->openedBy][$bug->resolution] = empty($bugSummary[$bug->openedBy][$bug->resolution]) ? 1 : $bugSummary[$bug->openedBy][$bug->resolution] + 1;
			$bugSummary[$bug->openedBy]['all'] = empty($bugSummary[$bug->openedBy]['all']) ? 1 : $bugSummary[$bug->openedBy]['all'] + 1;
			if ($bug->status == 'resolved' or $bug->status == 'closed') {
				$bugSummary[$bug->openedBy]['resolved'] = empty($bugSummary[$bug->openedBy]['resolved']) ? 1 : $bugSummary[$bug->openedBy]['resolved'] + 1;
			}
		}

		foreach ($bugSummary as $account => $bug) {
			$validRate = 0;
			if (isset($bug['fixed'])) $validRate += $bug['fixed'];
			if (isset($bug['postponed'])) $validRate += $bug['postponed'];
			$bugSummary[$account]['validRate'] = (isset($bug['resolved']) and $bug['resolved']) ? ($validRate / $bug['resolved']) : "0";
		}
		uasort($bugSummary, 'sortSummary');
		return $bugSummary;
	}

	/**
	 * Get workload.
	 *
	 * @access public
	 * @return array
	 */
	public function getWorkload()
	{
		$tasks = $this->dao->select('t1.*, t2.name as projectName')
			->from(TABLE_TASK)->alias('t1')
			->leftJoin(TABLE_PROJECT)->alias('t2')
			->on('t1.project = t2.id')
			->where('t1.deleted')->eq(0)
			->andWhere('t1.status')->notin('cancel, closed, done')
			->andWhere('t2.deleted')->eq(0)
			->fetchGroup('assignedTo');
		$workload = array();
		foreach ($tasks as $user => $userTasks) {
			if ($user) {
				foreach ($userTasks as $task) {
					$workload[$user]['task'][$task->projectName]['count'] = isset($workload[$user]['task'][$task->projectName]['count']) ? $workload[$user]['task'][$task->projectName]['count'] + 1 : 1;
					$workload[$user]['task'][$task->projectName]['manhour'] = isset($workload[$user]['task'][$task->projectName]['manhour']) ? $workload[$user]['task'][$task->projectName]['manhour'] + $task->left : $task->left;
					$workload[$user]['task'][$task->projectName]['projectID'] = $task->project;
					$workload[$user]['total']['count'] = isset($workload[$user]['total']['count']) ? $workload[$user]['total']['count'] + 1 : 1;
					$workload[$user]['total']['manhour'] = isset($workload[$user]['total']['manhour']) ? $workload[$user]['total']['manhour'] + $task->left : $task->left;
				}
			}
		}
		unset($workload['closed']);
		return $workload;
	}

	/**
	 * Get bug assign.
	 *
	 * @access public
	 * @return array
	 */
	public function getBugAssign()
	{
		$bugs = $this->dao->select('t1.*, t2.name as productName')
			->from(TABLE_BUG)->alias('t1')
			->leftJoin(TABLE_PRODUCT)->alias('t2')
			->on('t1.product = t2.id')
			->where('t1.deleted')->eq(0)
			->andWhere('t1.status')->eq('active')
			->andWhere('t2.deleted')->eq(0)
			->fetchGroup('assignedTo');
		$assign = array();
		foreach ($bugs as $user => $userBugs) {
			if ($user) {
				foreach ($userBugs as $bug) {
					$assign[$user]['bug'][$bug->productName]['count'] = isset($assign[$user]['bug'][$bug->productName]['count']) ? $assign[$user]['bug'][$bug->productName]['count'] + 1 : 1;
					$assign[$user]['bug'][$bug->productName]['productID'] = $bug->product;
					$assign[$user]['total']['count'] = isset($assign[$user]['total']['count']) ? $assign[$user]['total']['count'] + 1 : 1;
				}
			}
		}
		unset($assign['closed']);
		return $assign;
	}

	/**
	 * Get System URL.
	 *
	 * @access public
	 * @return void
	 */
	public function getSysURL()
	{
		/* Ger URL when run in shell. */
		if (PHP_SAPI == 'cli') {
			$url = parse_url(trim($this->server->argv[1]));
			$port = (empty($url['port']) or $url['port'] == 80) ? '' : $url['port'];
			$host = empty($port) ? $url['host'] : $url['host'] . ':' . $port;
			return $url['scheme'] . '://' . $host;
		} else {
			return common::getSysURL();
		}
	}

	/**
	 * Get user bugs.
	 *
	 * @access public
	 * @return void
	 */
	public function getUserBugs()
	{
		$bugs = $this->dao->select('t1.id, t1.title, t2.account as user')
			->from(TABLE_BUG)->alias('t1')
			->leftJoin(TABLE_USER)->alias('t2')
			->on('t1.assignedTo = t2.account')
			->where('t1.assignedTo')->ne('')
			->andWhere('t1.assignedTo')->ne('closed')
			->andWhere('t1.deleted')->eq(0)
			->andWhere('t2.deleted')->eq(0)
			->fetchGroup('user');
		return $bugs;
	}

	/**
	 * Get user tasks.
	 *
	 * @access public
	 * @return void
	 */
	public function getUserTasks()
	{
		$tasks = $this->dao->select('t1.id, t1.name, t2.account as user')
			->from(TABLE_TASK)->alias('t1')
			->leftJoin(TABLE_USER)->alias('t2')
			->on('t1.assignedTo = t2.account')
			->where('t1.assignedTo')->ne('')
			->andWhere('t1.deleted')->eq(0)
			->andWhere('t2.deleted')->eq(0)
			->andWhere('t1.status')->in('wait, doing')
			->fetchGroup('user');

		return $tasks;
	}

	/**
	 * Get user todos.
	 *
	 * @access public
	 * @return void
	 */
	public function getUserTodos()
	{
		$stmt = $this->dao->select('t1.*, t2.account as user')
			->from(TABLE_TODO)->alias('t1')
			->leftJoin(TABLE_USER)->alias('t2')
			->on('t1.account = t2.account')
			->where('t1.status')->eq('wait')
			->orWhere('t1.status')->eq('doing')
			->query();

		$todos = array();
		while ($todo = $stmt->fetch()) {
			if ($todo->type == 'task') $todo->name = $this->dao->findById($todo->idvalue)->from(TABLE_TASK)->fetch('name');
			if ($todo->type == 'bug') $todo->name = $this->dao->findById($todo->idvalue)->from(TABLE_BUG)->fetch('title');
			$todos[$todo->user][] = $todo;
		}
		return $todos;
	}
}

function sortSummary($pre, $next)
{
	if ($pre['validRate'] == $next['validRate']) return 0;
	return $pre['validRate'] > $next['validRate'] ? -1 : 1;
}
