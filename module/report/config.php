<?php
/* Open daily reminder.*/
$config->report                      = new stdclass();
$config->report->dailyreminder       = new stdclass();
$config->report->dailyreminder->bug  = true;
$config->report->dailyreminder->task = true;
$config->report->dailyreminder->todo = true;

$config->report->editor = new stdclass();
$config->report->editor->create  = array('id' => 'planned_qty,actual_qty,material_remark,machine_remark', 'tools' => 'simpleTools');
$config->report->editor->edit    = array('id' => 'planned_qty,actual_qty,material_remark,machine_remark', 'tools' => 'simpleTools');
$config->report->editor->createtestation = array('id' => 'content', 'tools' => 'simpleTools');
$config->report->editor->createproblem = array('id' => 'content', 'tools' => 'simpleTools');

$config->report->type = array('today', 'tomorrow');
