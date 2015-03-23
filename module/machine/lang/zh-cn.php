<?php
global $lang, $app;

$lang->machine->common = '机械管理';

$lang->machine->code = '编号';
$lang->machine->name = '名称';
$lang->machine->type = '所属分类';
$lang->machine->owner = '负责人';
$lang->machine->ownerRent = '租赁方名称';

$lang->machine->create = '';
$lang->machine->index          = '机械列表';
$lang->machine->create         = '添加机械';
$lang->machine->edit           = '修改机械';
$lang->machine->delete         = '删除机械';
$lang->machine->distribute     = '机械分配';
$lang->machine->distributionlist     = '机械分配列表';

$lang->machine->distributionStatusList = array(
	'--' => '--',
	'wait' => '未开始',
	'doing' => '使用中',
	'done' => '已结束',
);
