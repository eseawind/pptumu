<?php
global $config;
$config->material = new stdclass();
$config->material->orderBy = 'created, modified';

global $lang, $app;

$config->material->create = new stdclass();
$config->material->edit   = new stdclass();
$config->material->create->requiredFields = 'code, name, type_id, unit';
$config->material->edit->requiredFields   = 'code, name, type_id, unit';

$config->material->editor->apply = array('id' => 'remark', 'tools' => 'simpleTools');

$config->material->units = array(
	'㎡' => '㎡', 'm³' => 'm³', '吨' => '吨', '米' => '米', '个' => '个',
	'把' => '把', '桶' => '桶', '斤' => '斤',
	'kg' => 'kg', 't' => 't', '包' => '包', '本' => '本',
	'车' => '车', '床' => '床', '袋' => '袋', '刀' => '刀',
	'付' => '付', '副' => '副', '根' => '根', '公斤' => '公斤', '管' => '管',
	'盒' => '盒', '间' => '间', '件' => '件', '节' => '节', '卷' => '卷', '块' => '块',
	'捆' => '捆', '厘米' => '厘米', '立方' => '立方', '面' => '面', '盘' => '盘', '片' => '片',
	'平方' => '平方', '瓶' => '瓶', '扇' => '扇', '升' => '升', '双' => '双', '台' => '台',
	'套' => '套', '条' => '条', '页' => '页', '元' => '元', '张' => '张', '支' => '支',
	'只' => '只', '组' => '组',
);
