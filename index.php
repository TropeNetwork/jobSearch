<?php

include_once "prepend.inc";
require_once OPENHR_LIB."/Form.php";
require_once OPENHR_LIB."/ListObject.php";

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
$form->addElement('submit', 'search', _("search"));

$element=&Page::addElement("text");
$element->setSlot("content",$form->toHtml());
$element->setPosition(0,0);

$list = new ListObject("search",array("currentPage"=>1,
                                      "perPage"    =>2));

$list->addColumn("job_id",        array( "named" =>_("Job No.")));
$list->addColumn("incoming_date", array( "named" =>_("date")));
$list->addColumn("job_title",     array( "named" =>_("title")));
$list->addColumn("job_location",  array( "named" =>_("location")));

$element    = &Page::addElement("text");
$element->setSlot("content",$list->toHtml());
$element->setPosition(1,0);

$smarty->assign("page",Page::getSlots());
$smarty->display($template_dir.'generic.tpl');


?>
