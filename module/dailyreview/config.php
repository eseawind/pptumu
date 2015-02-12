<?php
/* Open daily reminder.*/
$config->dailyreview = new stdclass();

$config->dailyreview->editor = new stdclass();
$config->dailyreview->editor->verify  = array('id' => 'remark', 'tools' => 'simpleTools');

$config->dailyreview->status = array(
    'refused' => -1, 'pending' => 0, 'passed' => 1
);
