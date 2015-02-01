<?php
/* Open daily reminder.*/
$config->report                      = new stdclass();
$config->report->dailyreminder       = new stdclass();
$config->report->dailyreminder->bug  = true;
$config->report->dailyreminder->task = true;
$config->report->dailyreminder->todo = true;

$config->report->editor = new stdclass();
$config->report->editor->create  = array('id' => 'planned_qty,actual_qty', 'tools' => 'simpleTools');
$config->report->editor->edit    = array('id' => 'planned_qty,actual_qty',    'tools' => 'simpleTools');

