<?php
/* Open daily reminder.*/
$config->financial = new stdclass();

$config->financial->editor = new stdclass();
$config->financial->editor->verify  = array('id' => 'verified_remark', 'tools' => 'simpleTools');

$config->financial->status = array(
    'refused' => -1, 'pending' => 0, 'passed' => 1, 'distributed' => 2
);
