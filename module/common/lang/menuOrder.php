<?php
global $lang;

/* Sort of main menu. */
$lang->menuOrder[5]  = 'my';
$lang->menuOrder[10] = 'project';
$lang->menuOrder[15] = 'material';
$lang->menuOrder[20] = 'financial';
$lang->menuOrder[25] = 'machine';
$lang->menuOrder[30] = 'report';
$lang->menuOrder[35] = 'dailyreview';
$lang->menuOrder[40] = 'statistics';
$lang->menuOrder[45] = 'company';

/* index menu order. */
$lang->index->menuOrder[10] = 'project';
$lang->index->menuOrder[16] = 'material';

/* my menu order. */
$lang->my->menuOrder[5]  = 'account';
$lang->my->menuOrder[10] = 'index';
// $lang->my->menuOrder[15] = 'todo';
// $lang->my->menuOrder[20] = 'task';
// $lang->my->menuOrder[25] = 'bug';
// $lang->my->menuOrder[30] = 'testtask';
// $lang->my->menuOrder[35] = 'story';
$lang->my->menuOrder[40] = 'myProject';
// $lang->my->menuOrder[45] = 'dynamic';
$lang->my->menuOrder[50] = 'profile';
$lang->my->menuOrder[55] = 'changePassword';
$lang->todo->menuOrder   = $lang->my->menuOrder;

/* project menu order. */
$lang->project->menuOrder[5]  = 'task';
$lang->project->menuOrder[10] = 'story';
$lang->project->menuOrder[15] = 'bug';
$lang->project->menuOrder[20] = 'build';
$lang->project->menuOrder[25] = 'testtask';
$lang->project->menuOrder[30] = 'burn';
$lang->project->menuOrder[35] = 'team';
$lang->project->menuOrder[40] = 'dynamic';
$lang->project->menuOrder[45] = 'doc';
$lang->project->menuOrder[50] = 'product';
$lang->project->menuOrder[55] = 'linkstory';
$lang->project->menuOrder[60] = 'view';
$lang->project->menuOrder[65] = 'order';
$lang->project->menuOrder[70] = 'create';
$lang->project->menuOrder[75] = 'copy';
$lang->project->menuOrder[80] = 'all';
$lang->task->menuOrder        = $lang->project->menuOrder;
$lang->build->menuOrder       = $lang->project->menuOrder;

/* report menu order. */
// $lang->report->menuOrder[5]  = 'product';
$lang->report->menuOrder[10] = 'prj';
// $lang->report->menuOrder[15] = 'test';
$lang->report->menuOrder[20] = 'staff';

/* company menu order. */
$lang->company->menuOrder[0]  = 'name';
$lang->company->menuOrder[5]  = 'browseUser';
$lang->company->menuOrder[10] = 'dept';
$lang->company->menuOrder[15] = 'browseGroup';
$lang->company->menuOrder[20] = 'edit';
$lang->company->menuOrder[25] = 'dynamic';
$lang->company->menuOrder[30] = 'addGroup';
$lang->company->menuOrder[35] = 'batchAddUser';
$lang->company->menuOrder[40] = 'addUser';
$lang->dept->menuOrder        = $lang->company->menuOrder;
$lang->group->menuOrder       = $lang->company->menuOrder;
$lang->user->menuOrder        = $lang->company->menuOrder;

/* admin menu order. */
$lang->admin->menuOrder[5]  = 'index';
$lang->admin->menuOrder[10] = 'extension';
$lang->admin->menuOrder[15] = 'custom';
$lang->admin->menuOrder[20] = 'editor';
$lang->admin->menuOrder[25] = 'mail';
$lang->admin->menuOrder[30] = 'custom';
$lang->admin->menuOrder[40] = 'convert';
$lang->admin->menuOrder[45] = 'backup';
$lang->admin->menuOrder[50] = 'trashes';

$lang->convert->menuOrder   = $lang->admin->menuOrder;
$lang->upgrade->menuOrder   = $lang->admin->menuOrder;
$lang->action->menuOrder    = $lang->admin->menuOrder;
$lang->extension->menuOrder = $lang->admin->menuOrder;
$lang->custom->menuOrder    = $lang->admin->menuOrder;
$lang->editor->menuOrder    = $lang->admin->menuOrder;
$lang->mail->menuOrder      = $lang->admin->menuOrder;
$lang->custom->menuOrder    = $lang->admin->menuOrder;
$lang->backup->menuOrder    = $lang->admin->menuOrder;
