<?php
/**
 * @package    OpenHR
 * @subpackage jobSearch
 * @version    $Revision: 1.15 $
 * @author     Carsten Bleek <carsten@bleek.de>
 */

include_once 'prepend.inc';
include_once OPENHR_LIB.'/Menu.php';
require_once OPENHR_LIB.'/Form.php';
require_once OPENHR_LIB.'/ListObject.php';

$page=&Page::singleton('search');

if (!isset($_GET['content'])) $_GET['content']='project';

$page=&Page::singleton('generic.tpl');
$page->setSlot('menuleft',    menuleft('jobSearch'));
$page->setSlot('menutop',     menutop());

$form = new Form('jobSearch','GET');

$defaultValues=array();
$form->setDefaults($defaultValues);
$form->setElementTemplate('{label}&nbsp;{element}');
$form->addElement('text', 'fulltext', _("Fulltext"));
$form->addElement('submit', 'search', _("search"));

$html = $form->toHtml();

$list = new ListObject('search',array('currentPage'=>1,
                                      'perPage'    =>5));

$list->addColumn('job_id',        array( 'named' =>_("Job No.")));
$list->addColumn('incoming_date', array( 'named' =>_("date")));
$list->addColumn('job_title',     array( 'named' =>_("title"),
                                         'linked'=>'job.php'));
$list->addColumn('job_location',  array( 'named' =>_("location")));

$html.='<br/>'.$list->toHtml();

$page->setSlot('content',$html);

$page->toHtml();



?>
