<?php
/**
 * @package    OpenHR
 * @subpackage jobSearch
 * @version    $Revision: 1.3 $
 * @author     Carsten Bleek <carsten@bleek.de>
 */

require_once("prepend.inc");

$key=importVar("key");

$page=&Page::singleton("jobs/example.tpl");
$page->setSlot("counter","<img size=\"1\" width=\"1\" alt=\"\" src=\"/jobAdmin/counter.php?document=job_$key\">");

$smarty->assign("key",$key);
$page->toHtml();

?>
