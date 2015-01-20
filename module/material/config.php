<?php
$config->material = new stdclass();

global $lang, $app;

$config->material->create = new stdclass();
$config->material->edit   = new stdclass();
$config->material->create->requiredFields = 'code, name, type_id, unit';
$config->material->edit->requiredFields   = 'code, name, type_id, unit';

$config->material->units = array(
	'㎡' => '㎡', 'm³' => 'm³', '吨' => '吨', '米' => '米', '个' => '个',
	'把' => '把', '桶' => '桶', '斤' => '斤',
);
