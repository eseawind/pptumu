<?php
/* Set the error reporting. */
// error_reporting(1);

/* Start output buffer. */
ob_start();

/* Load the framework. */
include '../framework/router.class.php';
include '../framework/control.class.php';
include '../framework/model.class.php';
include '../framework/helper.class.php';

/* Log the time and define the run mode. */
$startTime = getTime();

/* Instance the app. */
$app = router::createApp('pms', dirname(dirname(__FILE__)));

/* installed or not. */
if(!isset($config->installed) or !$config->installed) die(header('location: install.php'));

/* Detect mobile. */
$mobile = $app->loadClass('mobile');
if(!$mobile->isTablet() and $mobile->isMobile())
{
    $config->default->view = 'mhtml';
    helper::setViewType();
}

/* Run the app. */
$common = $app->loadCommon();

/* Check the reqeust is getconfig or not. */
if(isset($_GET['mode']) and $_GET['mode'] == 'getconfig') die(helper::removeUTF8Bom($app->exportConfig()));

/* Check for need upgrade. */
$config->installedVersion = $common->loadModel('setting')->getVersion();
if(!(!is_numeric($config->version{0}) and $config->version{0} != $config->installedVersion{0}) and version_compare($config->version, $config->installedVersion, '>')) die(header('location: upgrade.php'));

$app->parseRequest();
$common->checkPriv();
$app->loadModule();

/* Flush the buffer. */
echo helper::removeUTF8Bom(ob_get_clean());
