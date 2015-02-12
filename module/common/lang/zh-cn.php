<?php
global $lang;

$lang->arrow     = '&nbsp;<i class="icon-angle-right"></i>&nbsp;';
$lang->colon     = '::';
$lang->comma     = '，';
$lang->dot       = '。';
$lang->at        = ' 于 ';
$lang->downArrow = '↓';
$lang->null      = '空';
$lang->ellipsis  = '…';

$lang->zentaoPMS      = '土木工程管理系统';
$lang->welcome        = "%s土木工程管理系统";
$lang->myControl      = "我的地盘";
$lang->currentPos     = '当前位置：';
$lang->logout         = '退出';
$lang->login          = '登录';
$lang->aboutZenTao    = '关于';
$lang->profile        = '个人档案';
$lang->changePassword = '更改密码';
$lang->runInfo        = "<div class='row'><div class='u-1 a-center' id='debugbar'>时间: %s 毫秒, 内存: %s KB, 查询: %s.  </div></div>";

$lang->reset        = '重填';
$lang->refresh      = '刷新';
$lang->edit         = '编辑';
$lang->copy         = '复制';
$lang->delete       = '删除';
$lang->close        = '关闭';
$lang->link         = '关联';
$lang->unlink       = '移除';
$lang->import       = '导入';
$lang->export       = '导出';
$lang->setFileName  = '文件名：';
$lang->activate     = '激活';
$lang->submitting   = '稍候...';
$lang->save         = '提交';
$lang->confirm      = '确认';
$lang->preview      = '查看';
$lang->goback       = '返回';
$lang->goPC         = 'PC版';
$lang->go           = 'GO';
$lang->more         = '更多';
$lang->day          = '天';

$lang->actions      = '操作';
$lang->comment      = '备注';
$lang->history      = '历史记录';
$lang->attatch      = '附件';
$lang->reverse      = '切换顺序';
$lang->switchDisplay= '切换显示';
$lang->switchHelp   = '切换帮助';
$lang->addFiles     = '上传了附件 ';
$lang->files        = '附件 ';
$lang->pasteText    = '粘贴文本 ';
$lang->uploadImages = '多图上传 ';
$lang->timeout      = '连接超时，请检查网络环境，或重试！';
$lang->repairTable  = '数据库表可能损坏，请用phpmyadmin或myisamchk检查修复。';
$lang->duplicate    = '已有相同标题的%s';
$lang->unfold       = '+';
$lang->fold         = '-';

$lang->selectAll     = '全选';
$lang->selectReverse = '反选';
$lang->notFound      = '抱歉，您访问的对象并不存在！';
$lang->showAll       = '[[全部显示]]';
$lang->hideClosed    = '[[显示进行中]]';

$lang->future       = '未来';
$lang->year         = '年';
$lang->workingHour  = '工时';

$lang->idAB         = 'ID';
$lang->priAB        = 'P';
$lang->statusAB     = '状态';
$lang->openedByAB   = '创建';
$lang->assignedToAB = '指派';
$lang->typeAB       = '类型';

$lang->common = new stdclass();
$lang->common->common = '公有模块';

/* 主导航菜单。*/
$lang->menu = new stdclass();
$lang->menu->my       = '<i class="icon-home"></i><span> 首页</span>|my|index';
$lang->menu->project  = '工程管理|project|index';
$lang->menu->material = '材料管理|material|index';
$lang->menu->financial = '财务管理|financial|index';
$lang->menu->machine = '机械管理|machine|index';
$lang->menu->report = '工程上报|report|index';
$lang->menu->dailyreview = '日报审核|dailyreview|index';
$lang->menu->statistics = '统计管理|statistics|index';
$lang->menu->company  = '权限管理|company|index';

/* 查询条中可以选择的对象列表。*/
$lang->searchObjects['bug']         = 'Bug';
$lang->searchObjects['story']       = '需求';
$lang->searchObjects['task']        = '任务';
$lang->searchObjects['testcase']    = '用例';
$lang->searchObjects['project']     = '项目';
$lang->searchObjects['material']    = '材料';
$lang->searchObjects['product']     = '产品';
$lang->searchObjects['user']        = '用户';
$lang->searchObjects['build']       = '版本';
$lang->searchObjects['release']     = '发布';
$lang->searchObjects['productplan'] = '产品计划';
$lang->searchObjects['testtask']    = '测试版本';
$lang->searchObjects['doc']         = '文档';
$lang->searchTips                   = '编号(ctrl+g)';

/* 导入支持的编码格式。*/
$lang->importEncodeList['gbk']   = 'GBK';
$lang->importEncodeList['big5']  = 'BIG5';
$lang->importEncodeList['utf-8'] = 'UTF-8';

/* 导出文件的类型列表。*/
$lang->exportFileTypeList['csv']  = 'csv';
$lang->exportFileTypeList['xml']  = 'xml';
$lang->exportFileTypeList['html'] = 'html';

$lang->exportTypeList['all']      = '全部记录';
$lang->exportTypeList['selected'] = '选中记录';

/* 语言 */
$lang->lang = 'Language';

/* 风格列表。*/
$lang->theme                 = '主题';
$lang->themes['default']     = '默认';

/* 首页菜单设置。*/
$lang->index = new stdclass();
$lang->index->menu = new stdclass();

$lang->index->menu->product = '浏览产品|product|browse';
$lang->index->menu->project = '浏览项目|project|browse';

/* 我的地盘菜单设置。*/
$lang->my = new stdclass();
$lang->my->menu = new stdclass();

$lang->my->menu->account        = '<span id="myname"><i class="icon-user"></i> %s' . $lang->arrow . '</span>';
$lang->my->menu->index          = '首页|my|index';
$lang->my->menu->profile        = array('link' => '档案|my|profile', 'alias' => 'editprofile');
$lang->my->menu->changePassword = '密码|my|changepassword';

$lang->todo = new stdclass();
$lang->todo->menu = $lang->my->menu;

/* 项目视图菜单设置。*/
$lang->project = new stdclass();
$lang->project->menu = new stdclass();

$lang->project->menu->list      = '所有项目';
$lang->project->menu->create    = array('link' => '<i class="icon-plus"></i>&nbsp;添加项目|project|create', 'float' => 'right');
$lang->project->menu->all       = array('link' => '<i class="icon-th-large"></i>&nbsp;所有项目|project|index|', 'float' => 'right');

/* 材料视图菜单设置。*/
$lang->material = new stdclass();
$lang->material->menu = new stdclass();

$lang->material->menu->list = array('link' => '全部材料|material|index');
$lang->material->menu->apply = array('link' => '申请材料|material|apply');
$lang->material->menu->applicationindex = array('link' => '申请记录|material|applicationindex');


/** 财务管理菜单 */
$lang->financial = new stdClass();
$lang->financial->menu = new stdClass();
$lang->financial->menu->index          = '财务管理';

/** 机械试图菜单设置 */
$lang->machine = new stdClass();
$lang->machine->menu = new stdClass();

$lang->machine->menu->self = array('link' => '自有机械|machine|index', 'varalias' => array('isRent' => 0));
$lang->machine->menu->rent = array('link' => '租赁机械|machine|index|isRent=1', 'varalias' => array('isRent' => 1));

/* 工程上报视图菜单设置。*/
$lang->report = new stdclass();
$lang->report->menu = new stdclass();
$lang->report->menu->index            = array('link' => '工程上报|report|index', 'alias' => '');

/** 财务管理菜单 */
$lang->dailyreview = new stdClass();
$lang->dailyreview->menu = new stdClass();
$lang->dailyreview->menu->index          = '日报表列表';

/** 统计管理菜单 */
$lang->statistics = new stdClass();
$lang->statistics->menu = new stdClass();
$lang->statistics->menu->index          = '统计管理';


/* 组织结构视图菜单设置。*/
$lang->company = new stdclass();
$lang->company->menu = new stdclass();
$lang->company->menu->name         = '%s' . $lang->arrow;
$lang->company->menu->browseUser   = array('link' => '用户|company|browse', 'subModule' => 'user');
$lang->company->menu->dept         = array('link' => '部门|dept|browse', 'subModule' => 'dept');
$lang->company->menu->browseGroup  = array('link' => '权限|group|browse', 'subModule' => 'group');
$lang->company->menu->view         = array('link' => '公司|company|view', 'alias' => 'edit');
$lang->company->menu->dynamic      = '动态|company|dynamic|';
$lang->company->menu->addGroup     = array('link' => '<i class="icon-group"></i>&nbsp;添加分组|group|create', 'float' => 'right');
$lang->company->menu->batchAddUser = array('link' => '<i class="icon-plus-sign"></i>&nbsp;批量添加|user|batchCreate|dept=%s', 'subModule' => 'user', 'float' => 'right');
$lang->company->menu->addUser      = array('link' => '<i class="icon-plus"></i>&nbsp;添加用户|user|create|dept=%s', 'subModule' => 'user', 'float' => 'right');

$lang->dept  = new stdclass();
$lang->group = new stdclass();
$lang->user  = new stdclass();

$lang->dept->menu  = $lang->company->menu;
$lang->group->menu = $lang->company->menu;
$lang->user->menu  = $lang->company->menu;

$lang->convert   = new stdclass();
$lang->upgrade   = new stdclass();
$lang->action    = new stdclass();
$lang->backup    = new stdclass();
$lang->extension = new stdclass();
$lang->custom    = new stdclass();
$lang->editor    = new stdclass();
$lang->mail      = new stdclass();

$lang->convert->menu   = $lang->admin->menu;
$lang->upgrade->menu   = $lang->admin->menu;
$lang->action->menu    = $lang->admin->menu;
$lang->backup->menu    = $lang->admin->menu;
$lang->extension->menu = $lang->admin->menu;
$lang->custom->menu    = $lang->admin->menu;
$lang->editor->menu    = $lang->admin->menu;
$lang->mail->menu      = $lang->admin->menu;

/* 菜单分组。*/
$lang->menugroup = new stdclass();
//$lang->menugroup->release     = 'product';
//$lang->menugroup->story       = 'product';
//$lang->menugroup->productplan = 'product';
$lang->menugroup->task        = 'project';
$lang->menugroup->build       = 'project';
$lang->menugroup->convert     = 'admin';
$lang->menugroup->upgrade     = 'admin';
$lang->menugroup->user        = 'company';
$lang->menugroup->group       = 'company';
//$lang->menugroup->bug         = 'qa';
//$lang->menugroup->testcase    = 'qa';
//$lang->menugroup->testtask    = 'qa';
$lang->menugroup->people      = 'company';
$lang->menugroup->dept        = 'company';
$lang->menugroup->todo        = 'my';
$lang->menugroup->action      = 'admin';
$lang->menugroup->backup      = 'admin';
$lang->menugroup->extension   = 'admin';
$lang->menugroup->custom      = 'admin';
$lang->menugroup->editor      = 'admin';
$lang->menugroup->mail        = 'admin';

/* 错误提示信息。*/
$lang->error = new stdclass();
$lang->error->companyNotFound = "您访问的域名 %s 没有对应的公司。";
$lang->error->length          = array("『%s』长度错误，应当为『%s』", "『%s』长度应当不超过『%s』，且不小于『%s』。");
$lang->error->reg             = "『%s』不符合格式，应当为:『%s』。";
$lang->error->unique          = "『%s』已经有『%s』这条记录了。如果您确定该记录已删除，请到后台管理-回收站还原。。";
$lang->error->gt              = "『%s』应当大于『%s』。";
$lang->error->ge              = "『%s』应当不小于『%s』。";
$lang->error->notempty        = "『%s』不能为空。";
$lang->error->empty           = "『%s』必须为空。";
$lang->error->equal           = "『%s』必须为『%s』。";
$lang->error->int             = array("『%s』应当是数字。", "『%s』应当介于『%s-%s』之间。");
$lang->error->float           = "『%s』应当是数字，可以是小数。";
$lang->error->email           = "『%s』应当为合法的EMAIL。";
$lang->error->date            = "『%s』应当为合法的日期。";
$lang->error->datetime        = "『%s』应当为合法的时间。";
$lang->error->account         = "『%s』应当为合法的用户名。";
$lang->error->passwordsame    = "两次密码应当相等。";
$lang->error->passwordrule    = "密码应该符合规则，长度至少为六位。";
$lang->error->accessDenied    = '您没有访问权限';
$lang->error->pasteImg        = '您的浏览器不支持粘贴图片！';
$lang->error->noData          = '没有数据';

/* 分页信息。*/
$lang->pager = new stdclass();
$lang->pager->noRecord  = "暂时没有记录";
// $lang->pager->digest    = "共 <strong>%s</strong> 条记录，%s <strong>%s/%s</strong> &nbsp; ";
$lang->pager->digest    = "共 <strong>%s</strong> 条记录，<strong>%s/%s</strong> &nbsp; ";
$lang->pager->recPerPage= "每页 <strong>%s</strong> 条";
$lang->pager->first     = "<i class='icon-step-backward' title='首页'></i>";
$lang->pager->pre       = "<i class='icon-play icon-rotate-180' title='上一页'></i>";
$lang->pager->next      = "<i class='icon-play' title='下一页'></i>";
$lang->pager->last      = "<i class='icon-step-forward' title='末页'></i>";
$lang->pager->locate    = "GO!";

$lang->zentaoSite     = "官方网站";
$lang->chinaScrum     = "<a href='http://api.zentao.net/goto.php?item=chinascrum' target='_blank'>Scrum社区</a>&nbsp; ";
$lang->agileTraining  = "<a href='http://api.zentao.net/goto.php?item=agiletrain' target='_blank'>培训</a> ";
$lang->donate         = "<a href='http://api.zentao.net/goto.php?item=donate' target='_blank'>捐赠 </a>";
$lang->downNotify     = "下载桌面提醒";

$lang->suhosinInfo   = "警告：数据太多，请在php.ini中修改<font color=red>sohusin.post.max_vars</font>和<font color=red>sohusin.request.max_vars</font>（设置更大的数）。 保存并重新启动apache，否则会造成部分数据无法保存。";
$lang->pasteTextInfo = "粘贴文本到文本域中，每行文字作为一条数据的标题。";

$lang->noResultsMatch     = "没有匹配结果";
$lang->searchMore         = "搜索此关键字的更多结果：";
$lang->selectAnOption     = "选择一个选项";
$lang->selectSomeOptions  = "选择一些选项";
$lang->chooseUsersToMail  = "选择要发信通知的用户...";

/* 时间格式设置。*/
define('DT_DATETIME1',  'Y-m-d H:i:s');
define('DT_DATETIME2',  'y-m-d H:i');
define('DT_MONTHTIME1', 'n/d H:i');
define('DT_MONTHTIME2', 'n月d日 H:i');
define('DT_DATE1',     'Y-m-d');
define('DT_DATE2',     'Ymd');
define('DT_DATE3',     'Y年m月d日');
define('DT_DATE4',     'n月j日');
define('DT_TIME1',     'H:i:s');
define('DT_TIME2',     'H:i');

/* datepicker 时间*/
$lang->datepicker = new stdclass();

$lang->datepicker->dpText = new stdclass();
$lang->datepicker->dpText->TEXT_OR          = '或 ';
$lang->datepicker->dpText->TEXT_PREV_YEAR   = '去年';
$lang->datepicker->dpText->TEXT_PREV_MONTH  = '上月';
$lang->datepicker->dpText->TEXT_PREV_WEEK   = '上周';
$lang->datepicker->dpText->TEXT_YESTERDAY   = '昨天';
$lang->datepicker->dpText->TEXT_THIS_MONTH  = '本月';
$lang->datepicker->dpText->TEXT_THIS_WEEK   = '本周';
$lang->datepicker->dpText->TEXT_TODAY       = '今天';
$lang->datepicker->dpText->TEXT_NEXT_YEAR   = '明年';
$lang->datepicker->dpText->TEXT_NEXT_MONTH  = '下月';
$lang->datepicker->dpText->TEXT_CLOSE       = '关闭';
$lang->datepicker->dpText->TEXT_DATE        = '选择时间段';
$lang->datepicker->dpText->TEXT_CHOOSE_DATE = '选择日期';

$lang->datepicker->dayNames     = array('日', '一', '二', '三', '四', '五', '六');
$lang->datepicker->abbrDayNames = array('日', '一', '二', '三', '四', '五', '六');
$lang->datepicker->monthNames   = array('一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月');

/* Common action icons 通用动作图标 */
$lang->icons['todo']      = 'check';
$lang->icons['product']   = 'cube';
$lang->icons['bug']       = 'bug';
$lang->icons['task']      = 'check-sign';
$lang->icons['tasks']     = 'tasks';
$lang->icons['project']   = 'folder-close-alt';
$lang->icons['material']   = 'folder-close-alt';
$lang->icons['machine']   = 'folder-close-alt';
$lang->icons['doc']       = 'file-text';
$lang->icons['doclib']    = 'folder-close';
$lang->icons['story']     = 'lightbulb';
$lang->icons['release']   = 'tags';
$lang->icons['roadmap']   = 'code-fork';
$lang->icons['plan']      = 'flag';
$lang->icons['dynamic']   = 'volume-up';
$lang->icons['build']     = 'tag';
$lang->icons['test']      = 'check';
$lang->icons['testtask']  = 'check';
$lang->icons['group']     = 'group';
$lang->icons['team']      = 'group';
$lang->icons['company']   = 'building';
$lang->icons['user']      = 'user';
$lang->icons['dept']      = 'sitemap';
$lang->icons['tree']      = 'sitemap';
$lang->icons['usecase']   = 'sitemap';
$lang->icons['testcase']  = 'smile';
$lang->icons['result']    = 'flag-checkered';
$lang->icons['mail']      = 'envelope';
$lang->icons['trash']     = 'trash';
$lang->icons['extension'] = 'th-large';
$lang->icons['app']       = 'th-large';

$lang->icons['results']        = 'flag-checkered';
$lang->icons['create']         = 'plus';
$lang->icons['post']           = 'edit';
$lang->icons['batchCreate']    = 'plus-sign';
$lang->icons['batchEdit']      = 'edit-sign';
$lang->icons['batchClose']     = 'off';
$lang->icons['edit']           = 'pencil';
$lang->icons['delete']         = 'remove';
$lang->icons['copy']           = 'copy';
$lang->icons['report']         = 'bar-chart';
$lang->icons['export']         = 'download-alt';
$lang->icons['report-file']    = 'file-powerpoint';
$lang->icons['import']         = 'upload-alt';
$lang->icons['finish']         = 'ok-sign';
$lang->icons['resolve']        = 'ok-sign';
$lang->icons['start']          = 'play';
$lang->icons['restart']        = 'play';
$lang->icons['run']            = 'play';
$lang->icons['runCase']        = 'play';
$lang->icons['batchRun']       = 'play-sign';
$lang->icons['assign']         = 'hand-right';
$lang->icons['assignTo']       = 'hand-right';
$lang->icons['change']         = 'random';
$lang->icons['link']           = 'link';
$lang->icons['close']          = 'off';
$lang->icons['activate']       = 'off';
$lang->icons['review']         = 'search';
$lang->icons['confirm']        = 'search';
$lang->icons['putoff']         = 'calendar';
$lang->icons['suspend']        = 'pause';
$lang->icons['pause']          = 'pause';
$lang->icons['cancel']         = 'ban-circle';
$lang->icons['recordEstimate'] = 'time';
$lang->icons['customFields']   = 'cogs';
$lang->icons['manage']         = 'cog';
$lang->icons['unlock']         = 'unlock-alt';
$lang->icons['confirmStoryChange'] = 'search';

include (dirname(__FILE__) . '/menuOrder.php');
