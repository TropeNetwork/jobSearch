<?php
/**
 * @package    OpenHR
 * @subpackage jobSearch
 * @version    $Revision: 1.2 $
 * @author     Carsten Bleek <carsten@bleek.de>
 */

require_once("prepend.inc");

$key=importVar("key");

$page=&Page::singleton("job");

$smarty->assign("key",$key);
$smarty->display("jobs/example.tpl");

?>
