<?php

include_once "prepend.inc";
require_once OPENHR_LIB."/Form.php";

$page=&Page::singleton("search");

if (!isset($_GET["content"])) $_GET["content"]="project";

Page::fetchSlots("search");
Page::setSlot('menuleft',    "");
Page::setSlot('menutop',     "");
Page::setSlot('menufoot',    sprintf(_("Copyright (c) 2003 %s"),"<a href=\"?content=carsten\">Carsten Bleek</a>"));


$template_dir="jobSearch/";

$form = new Form('jobSearch','GET');

$defaultValues=array();
$form->setDefaults($defaultValues);
$form->addElement('text', 'fulltext', _("Fulltext"));

$content=&Page::addElement("text");
$content->setSlot("content",$form->toHtml());

$smarty->assign("page",Page::getSlots());
$smarty->display($template_dir.'generic.tpl');


?>
