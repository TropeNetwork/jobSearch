<?php

require_once("prepend.inc");

$key=importVar("key");

$page=&Page::singleton("job");

$smarty->assign("key",$key);
$smarty->display("jobs/example.tpl");

?>
