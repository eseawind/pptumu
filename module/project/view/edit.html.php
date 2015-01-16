<?php
/**
 * The edit view of project module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2013 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     LGPL (http://www.gnu.org/licenses/lgpl.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     project
 * @version     $Id: edit.html.php 4728 2013-05-03 06:14:34Z chencongzhi520@gmail.com $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<?php js::import($jsRoot . 'misc/date.js');?>
<div class='container mw-1400px'>
  <div id='titlebar'>
    <div class='heading'>
      <span class='prefix'><?php echo html::icon($lang->icons['project']);?> <strong><?php echo $project->id;?></strong></span>
      <strong><?php echo html::a($this->createLink('project', 'view', 'project=' . $project->id), $project->name, '_blank');?></strong>
      <small class='text-muted'> <?php echo $lang->project->edit;?> <?php echo html::icon($lang->icons['edit']);?></small>
    </div>
  </div>
  <form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
    <table class='table table-form'>
      <tr>
        <th><?php echo $lang->project->code;?></th>
        <td><?php echo html::input('code', $project->code, "class='form-control'");?></td>
      </tr>
	  <tr>
        <th class='w-90px'><?php echo $lang->project->name;?></th>
        <td class='w-p45'><?php echo html::input('name', $project->name, "class='form-control'");?></td><td></td>
      </tr>
	  <tr>
        <th><?php echo $lang->project->client;?></th>
        <td><?php echo html::input('client', $project->client, "class='form-control'");?></td>
      </tr>
	  <tr>
        <th><?php echo $lang->project->address;?></th>
        <td><?php echo html::input('address', $project->address, "class='form-control'");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->project->type;?></th>
        <td><?php echo html::select('type', $lang->project->typeList, $project->type, "class='form-control'");?></td>
      </tr>
      <tr>
        <th class='w-90px'><?php echo $lang->project->dateRange;?></th>
        <td>
          <div class='input-group'>
            <?php echo html::input('begin', $project->begin, "class='form-control form-date' onchange='computeWorkDays()' placeholder='" . $lang->project->begin . "'");?>
            <span class='input-group-addon'><?php echo $lang->project->to;?></span>
            <?php echo html::input('end', $project->end, "class='form-control form-date' onchange='computeWorkDays()' placeholder='" . $lang->project->end . "'");?>
            <div class='input-group-btn'>
              <button type='button' class='btn dropdown-toggle' data-toggle='dropdown'><?php echo $lang->project->byPeriod;?> <span class='caret'></span></button>
              <ul class='dropdown-menu'>
              <?php foreach ($lang->project->endList as $key => $name):?>
                <li><a href='javascript:computeEndDate("<?php echo $key;?>")'><?php echo $name;?></a></li>
              <?php endforeach;?>
              </ul>
            </div>
          </div>
        </td>
      </tr>
	  <tr>
        <th><?php echo $lang->project->actual_completion;?></th>
        <td>
          <?php echo html::input('actual_completion', $project->actual_completion, "class='form-control form-date' onchange='computeWorkDays()' placeholder='" . $lang->project->actual_completion . "'");?>
        </td>
      </tr>
      <tr>
        <th><?php echo $lang->project->pm;?></th>
        <td>
          <?php echo html::select('pm', $poUsers, $project->pm, "class='form-control'");?>
        </td>
      </tr>
      <tr>
        <th><?php echo $lang->project->desc;?></th>
        <td colspan='2'><?php echo html::textarea('desc', htmlspecialchars($project->desc), "rows='6' class='form-control'");?></td>
      </tr>
      <tr><td></td><td colspan='2'><?php echo html::submitButton() . html::backButton();?></td></tr>
    </table>
  </form>
</div>
<?php include '../../common/view/footer.html.php';?>
