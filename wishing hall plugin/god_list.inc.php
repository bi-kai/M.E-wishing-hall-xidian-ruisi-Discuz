<?php
!defined('IN_DISCUZ') && exit('Access Denied');
define('IN_wishing_hall', '1');
define("NOROBOT", TRUE);
$navtitle = "许愿堂";

$_G['setting']['switchwidthauto']=0;
include template('wishing_hall:god_list');
?>