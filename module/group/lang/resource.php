<?php
/**
 * The all avaliabe actions in ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2013 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     LGPL (http://www.gnu.org/licenses/lgpl.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     group
 * @version     $Id$
 * @link        http://www.zentao.net
 */

/* Module order. */
$lang->moduleOrder[0]   = 'index';
$lang->moduleOrder[5]   = 'my';

$lang->moduleOrder[35]  = 'project';
$lang->moduleOrder[40]  = 'material';
$lang->moduleOrder[45]  = 'financial';
$lang->moduleOrder[50]  = 'machine';
$lang->moduleOrder[70]  = 'report';
$lang->moduleOrder[75]  = 'dailyreview';
$lang->moduleOrder[80]  = 'statistics';

$lang->moduleOrder[80]  = 'company';
$lang->moduleOrder[85]  = 'dept';
$lang->moduleOrder[90]  = 'group';
$lang->moduleOrder[95]  = 'user';

$lang->moduleOrder[100] = 'admin';
$lang->moduleOrder[115] = 'editor';
$lang->moduleOrder[125] = 'action';

$lang->moduleOrder[130] = 'mail';

$lang->resource = new stdclass();

/* Index module. */
$lang->resource->index = new stdclass();
$lang->resource->index->index = 'index';

$lang->index->methodOrder[0] = 'index';

/* My module. */
$lang->resource->my = new stdclass();
$lang->resource->my->index          = 'index';
$lang->resource->my->project        = 'myProject';
$lang->resource->my->profile        = 'profile';
// $lang->resource->my->dynamic        = 'dynamic';
$lang->resource->my->editProfile    = 'editProfile';
$lang->resource->my->changePassword = 'changePassword';

$lang->my->methodOrder[0]  = 'index';
$lang->my->methodOrder[35] = 'project';
$lang->my->methodOrder[40] = 'profile';
// $lang->my->methodOrder[45] = 'dynamic';
$lang->my->methodOrder[50] = 'editProfile';
$lang->my->methodOrder[55] = 'changePassword';

/* Project. */
$lang->resource->project = new stdclass();
$lang->resource->project->index          = 'index';
$lang->resource->project->view           = 'view';
$lang->resource->project->create         = 'create';
$lang->resource->project->edit           = 'edit';
$lang->resource->project->delete         = 'delete';

$lang->project->methodOrder[0]   = 'index';
$lang->project->methodOrder[5]   = 'view';
$lang->project->methodOrder[15]  = 'create';
$lang->project->methodOrder[20]  = 'edit';
$lang->project->methodOrder[60]  = 'delete';

/* material. */
$lang->resource->material = new stdclass();
$lang->resource->material->index          = 'index';
$lang->resource->material->create         = 'create';
$lang->resource->material->edit           = 'edit';
$lang->resource->material->delete         = 'delete';
$lang->resource->material->apply         = 'apply';
$lang->resource->material->applicationindex         = 'applicationindex';

$lang->material->methodOrder[0]   = 'index';
$lang->material->methodOrder[15]  = 'create';
$lang->material->methodOrder[20]  = 'edit';
$lang->material->methodOrder[40]  = 'delete';
$lang->material->methodOrder[50]  = 'apply';
$lang->material->methodOrder[60]  = 'applicationindex';

/** financial */
$lang->resource->financial = new stdClass();
$lang->resource->financial->index = 'index';
$lang->resource->financial->verify = 'verify';

$lang->financial->methodOrder[0] = 'index';
$lang->financial->methodOrder[5] = 'apply';

/** machine */
$lang->resource->machine = new stdclass();
$lang->resource->machine->index          = 'index';
$lang->resource->machine->create         = 'create';
$lang->resource->machine->edit           = 'edit';
$lang->resource->machine->delete         = 'delete';
$lang->resource->machine->distribute     = 'distribute';
$lang->resource->machine->distributionlist     = 'distributionlist';

$lang->machine->methodOrder[0]   = 'index';
$lang->machine->methodOrder[15]  = 'create';
$lang->machine->methodOrder[20]  = 'edit';
$lang->machine->methodOrder[40]  = 'delete';
$lang->machine->methodOrder[50]  = 'distribute';
$lang->machine->methodOrder[60]  = 'distributionlist';

/* Doc. */
$lang->resource->doc = new stdclass();
$lang->resource->doc->index     = 'index';
$lang->resource->doc->browse    = 'browse';
$lang->resource->doc->createLib = 'createLib';
$lang->resource->doc->editLib   = 'editLib';
$lang->resource->doc->deleteLib = 'deleteLib';
$lang->resource->doc->create    = 'create';
$lang->resource->doc->view      = 'view';
$lang->resource->doc->edit      = 'edit';
$lang->resource->doc->delete    = 'delete';

$lang->doc->methodOrder[0]  = 'index';
$lang->doc->methodOrder[5]  = 'browse';
$lang->doc->methodOrder[10] = 'createLib';
$lang->doc->methodOrder[15] = 'editLib';
$lang->doc->methodOrder[20] = 'deleteLib';
$lang->doc->methodOrder[25] = 'create';
$lang->doc->methodOrder[30] = 'view';
$lang->doc->methodOrder[35] = 'edit';
$lang->doc->methodOrder[40] = 'delete';

/* Company. */
$lang->resource->company = new stdclass();
$lang->resource->company->index  = 'index';
$lang->resource->company->browse = 'browse';
$lang->resource->company->edit   = 'edit';
$lang->resource->company->view   = 'view';
$lang->resource->company->dynamic= 'dynamic';

$lang->company->methodOrder[0]  = 'index';
$lang->company->methodOrder[5]  = 'browse';
$lang->company->methodOrder[15] = 'edit';
$lang->company->methodOrder[25] = 'dynamic';

/* Department. */
$lang->resource->dept = new stdclass();
$lang->resource->dept->browse      = 'browse';
$lang->resource->dept->updateOrder = 'updateOrder';
$lang->resource->dept->manageChild = 'manageChild';
$lang->resource->dept->edit        = 'edit';
$lang->resource->dept->delete      = 'delete';

$lang->dept->methodOrder[5]  = 'browse';
$lang->dept->methodOrder[10] = 'updateOrder';
$lang->dept->methodOrder[15] = 'manageChild';
$lang->dept->methodOrder[20] = 'edit';
$lang->dept->methodOrder[25] = 'delete';

/* Group. */
$lang->resource->group = new stdclass();
$lang->resource->group->browse       = 'browse';
$lang->resource->group->create       = 'create';
$lang->resource->group->edit         = 'edit';
$lang->resource->group->copy         = 'copy';
$lang->resource->group->delete       = 'delete';
$lang->resource->group->managePriv   = 'managePriv';
$lang->resource->group->manageMember = 'manageMember';

$lang->group->methodOrder[5]  = 'browse';
$lang->group->methodOrder[10] = 'create';
$lang->group->methodOrder[15] = 'edit';
$lang->group->methodOrder[20] = 'copy';
$lang->group->methodOrder[25] = 'delete';
$lang->group->methodOrder[30] = 'managePriv';
$lang->group->methodOrder[35] = 'manageMember';

/* User. */
$lang->resource->user = new stdclass();
$lang->resource->user->create         = 'create';
$lang->resource->user->batchCreate    = 'batchCreate';
$lang->resource->user->view           = 'view';
$lang->resource->user->edit           = 'edit';
$lang->resource->user->unlock         = 'unlock';
$lang->resource->user->delete         = 'delete';
$lang->resource->user->todo           = 'todo';
$lang->resource->user->story          = 'story';
$lang->resource->user->task           = 'task';
$lang->resource->user->bug            = 'bug';
$lang->resource->user->testTask       = 'testTask';
$lang->resource->user->testCase       = 'testCase';
$lang->resource->user->project        = 'project';
$lang->resource->user->dynamic        = 'dynamic';
$lang->resource->user->profile        = 'profile';
$lang->resource->user->batchEdit      = 'batchEdit';
$lang->resource->user->manageContacts = 'manageContacts';
$lang->resource->user->deleteContacts = 'deleteContacts';

$lang->user->methodOrder[5]  = 'create';
$lang->user->methodOrder[7]  = 'batchCreate';
$lang->user->methodOrder[10] = 'view';
$lang->user->methodOrder[15] = 'edit';
$lang->user->methodOrder[20] = 'unlock';
$lang->user->methodOrder[25] = 'delete';
$lang->user->methodOrder[30] = 'todo';
$lang->user->methodOrder[35] = 'task';
$lang->user->methodOrder[40] = 'bug';
$lang->user->methodOrder[45] = 'project';
$lang->user->methodOrder[50] = 'dynamic';
$lang->user->methodOrder[55] = 'profile';
$lang->user->methodOrder[60] = 'batchEdit';
$lang->user->methodOrder[65] = 'manageContacts';
$lang->user->methodOrder[70] = 'deleteContacts';

/* Report. */
$lang->resource->report = new stdclass();
$lang->resource->report->index            = 'index';
$lang->resource->report->create = 'create';
$lang->resource->report->history      = 'history';
$lang->resource->report->edit       = 'edit';
$lang->resource->report->show        = 'show';
$lang->resource->report->createtestation         = 'createtestation';
$lang->resource->report->historytestation         = 'historytestation';
$lang->resource->report->showtestation         = 'showtestation';
$lang->resource->report->createproblem         = 'createproblem';
$lang->resource->report->historyproblem         = 'historyproblem';
$lang->resource->report->showproblem         = 'showproblem';

$lang->report->methodOrder[0]            = 'index';
$lang->report->methodOrder[5] = 'create';
$lang->report->methodOrder[10]      = 'history';
$lang->report->methodOrder[15]       = 'edit';
$lang->report->methodOrder[20]        = 'show';
$lang->report->methodOrder[25]         = 'createtestation';
$lang->report->methodOrder[30]         = 'historytestation';
$lang->report->methodOrder[35]         = 'showtestation';
$lang->report->methodOrder[40]         = 'createproblem';
$lang->report->methodOrder[45]         = 'historyproblem';
$lang->report->methodOrder[50]         = 'showproblem';

/* dailyreview. */
$lang->resource->dailyreview = new stdclass();
$lang->resource->dailyreview->index       = 'index';
$lang->resource->dailyreview->reportreview       = 'reportreview';
$lang->resource->dailyreview->testationreview         = 'testationreview';
$lang->resource->dailyreview->problemreview         = 'problemreview';

$lang->dailyreview->methodOrder[5]       = 'index';
$lang->dailyreview->methodOrder[10]       = 'reportreview';
$lang->dailyreview->methodOrder[15]         = 'testationreview';
$lang->dailyreview->methodOrder[20]         = 'problemreview';

/* statistics. */
$lang->resource->statistics = new stdclass();
$lang->resource->statistics->index       = 'index';
$lang->resource->statistics->reportlist       = 'reportlist';
$lang->resource->statistics->viewtotal         = 'viewtotal';

$lang->statistics->methodOrder[5]       = 'index';
$lang->statistics->methodOrder[10]       = 'reportlist';
$lang->statistics->methodOrder[15]         = 'viewtotal';

/* Search. */
$lang->resource->search = new stdclass();
$lang->resource->search->buildForm    = 'buildForm';
$lang->resource->search->buildQuery   = 'buildQuery';
$lang->resource->search->saveQuery    = 'saveQuery';
$lang->resource->search->deleteQuery  = 'deleteQuery';
$lang->resource->search->select       = 'select';

$lang->search->methodOrder[5]  = 'buildForm';
$lang->search->methodOrder[10] = 'buildQuery';
$lang->search->methodOrder[15] = 'saveQuery';
$lang->search->methodOrder[20] = 'deleteQuery';
$lang->search->methodOrder[25] = 'select';

/* Admin. */
$lang->resource->admin = new stdclass();
$lang->resource->admin->index     = 'index';
$lang->resource->admin->checkDB   = 'checkDB';

$lang->admin->methodOrder[0]  = 'index';
$lang->admin->methodOrder[5]  = 'checkDB';

/* Editor. */
$lang->resource->editor = new stdclass();
$lang->resource->editor->index   = 'index';
$lang->resource->editor->extend  = 'extend';
$lang->resource->editor->edit    = 'edit';
$lang->resource->editor->newPage = 'newPage';
$lang->resource->editor->save    = 'save';
$lang->resource->editor->delete  = 'delete';

$lang->editor->methodOrder[5]  = 'index';
$lang->editor->methodOrder[10] = 'extend';
$lang->editor->methodOrder[15] = 'edit';
$lang->editor->methodOrder[20] = 'newPage';
$lang->editor->methodOrder[25] = 'save';
$lang->editor->methodOrder[30] = 'delete';

/* Convert. */
$lang->resource->convert = new stdclass();
$lang->resource->convert->index          = 'index';
$lang->resource->convert->selectSource   = 'selectSource';  
$lang->resource->convert->setConfig      = 'setConfig';
$lang->resource->convert->setBugfree     = 'setBugfree';
$lang->resource->convert->setRedmine     = 'setRedmine';
$lang->resource->convert->checkConfig    = 'checkConfig';
$lang->resource->convert->checkBugFree   = 'checkBugFree';
$lang->resource->convert->checkRedmine   = 'checkRedmine';
$lang->resource->convert->execute        = 'execute';
$lang->resource->convert->convertBugFree = 'convertBugFree';
$lang->resource->convert->convertRedmine = 'convertRedmine';

$lang->convert->methodOrder[5]  = 'index';
$lang->convert->methodOrder[10] = 'selectSource';
$lang->convert->methodOrder[15] = 'setConfig';
$lang->convert->methodOrder[20] = 'setBugfree';
$lang->convert->methodOrder[25] = 'setRedmine';
$lang->convert->methodOrder[30] = 'checkConfig';
$lang->convert->methodOrder[35] = 'checkBugFree';
$lang->convert->methodOrder[40] = 'checkRedmine';
$lang->convert->methodOrder[45] = 'execute';
$lang->convert->methodOrder[50] = 'convertBugFree';
$lang->convert->methodOrder[55] = 'convertRedmine';
