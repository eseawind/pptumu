<?php
/**
 * the model of reprot module
 */

class reportModel extends model
{

	/**
	 *
	 */
	public function getProjectReports($projectID, $conds = array(), $pager = null)
	{
		$fields = "report.*, application.id AS application_id, application.verified AS application_verified";
		$this->dao->select($fields)->from(TABLE_REPORT)->alias('report')
			->leftJoin(TABLE_APPLICATION)->alias('application')
			->on("application.object_id = report.id AND application.object_type = 'report' AND application.finished = 0")
			->where('deleted')->eq(0)
			->andWhere('report.project_id')->eq($projectID);

		if (isset($conds['type']) && in_array($conds['type'], $this->config->report->type)) {
			$this->dao->andWhere('report.type')->eq($conds['type']);
		}

		$reports = $this->dao->page($pager)->fetchAll('id');

		return $reports;
	}

	/**
	 *
	 */
	public function getList($projectID, $type = 'today', $conds = array())
	{
		$this->dao->select('report.*')->from(TABLE_REPORT)->alias('report')
			->where('deleted')->eq(0)
			->andWhere('type')->eq($type)
			->andWhere('project_id')->eq($projectID);

		$reports = $this->dao->fetchAll('id');

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
		$report = fixer::input('post')
			->stripTags($this->config->report->editor->create['id'], $this->config->allowedTags)
			->get();
		// $report->daily_id = $this->getDailyId($report->project_id, $report->report_date);
		$report->created = $dt;
		$report->modified = $dt;
		$report->deleted = 0;
		$report->created_by = $app->user->account;

		// material used data
		$materialsUsed = array();
		foreach ($report->material['ids'] As $i => $materialID) {
			$materialsUsed[$i] = new stdClass();
			$materialsUsed[$i]->material_id = $materialID;
			$materialsUsed[$i]->existing_qty = $report->material['existing_qty'][$i];
			$materialsUsed[$i]->used_qty = $report->material['used_qty'][$i];
			$materialsUsed[$i]->remaining_qty = $report->material['remaining_qty'][$i];

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
		$testation = fixer::input('post')
			->stripTags($this->config->report->editor->createtestation['id'], $this->config->allowedTags)
			->get();
		$testation->daily_id = $this->getDailyId($testation->project_id, $testation->report_date);
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
		$problem = fixer::input('post')
			->stripTags($this->config->report->editor->createproblem['id'], $this->config->allowedTags)
			->get();
		$problem->daily_id = $this->getDailyId($problem->project_id, $problem->report_date);

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
	 *
	 */
	public function getDailyId($projectID, $date)
	{
		global $app;

		$daily = $this->dao->select('daily.id')
			->from(TABLE_DAILY)->alias('daily')
			->where('daily.project_id')->eq($projectID)
			->andWhere('daily.date')->eq($date)
			->orderBy('verified_asc')
			->limit(1)
			->fetch();

		if (!$daily) {
			$dt = date('Y-m-d H:i:s');
			$dailyData = new stdClass();
			$dailyData->project_id = $projectID;
			$dailyData->date = $date;
			$dailyData->verified = 0;
			$dailyData->created = $dt;
			$dailyData->modified = $dt;
			$dailyData->created_by = $app->user->account;

			$this->dao->insert(TABLE_DAILY)->data($dailyData)
				->check('project_id', 'int')
				->check('date', 'date')
				->exec();

			if (!dao::isError()) {
				$dailyID = $this->dao->lastInsertId();
			}
		} else {
			$dailyID = $daily->id;
		}

		return $dailyID;
	}

	public function getDailyById($dailyID)
	{
		$daily = $this->dao->select('*')->from(TABLE_DAILY)->alias('daily')
			->where('daily.id')->eq($dailyID)
			->fetch();

		return $daily;
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

}

function sortSummary($pre, $next)
{
	if ($pre['validRate'] == $next['validRate']) return 0;
	return $pre['validRate'] > $next['validRate'] ? -1 : 1;
}
