<?php
/**
 * @package    OpenHR
 * @subpackage jobSearch
 * @version    $Revision: 1.3 $
 * @author     Carsten Bleek <carsten@bleek.de>
 */
require_once( 'HTML/TreeMenu.php' );

function menuleft(){

    $nodeProperties = array("text"=>_("Home"),"link"=> "/", "icon"=>"icons/home.gif");
    $pgmenuTop      = new HTML_TreeNode($nodeProperties);
    $pgmenu         = new HTML_TreeMenu();
    $pgmenu->addItem($pgmenuTop);
    $nx = &$pgmenuTop->addItem(new HTML_TreeNode(array("text"=>_("demo"), "link"=>'/?content=todo')));
      $nx->addItem(new HTML_TreeNode(array("text"=>_("jobAdmin"), "link"=>$OHR_CONFIG["dir.app_jobAdmin"])));
      $nx->addItem(new HTML_TreeNode(array("text"=>_("jobSearch"), "link"=>$OHR_CONFIG["dir.app_jobSearch"])));

    $pgmenuTree = &new HTML_TreeMenu_DHTML($pgmenu,
                                      array('images'       => $OHR_CONFIG["dir.app_jobAdmin"].'/images/TreeMenu',
                                            'defaultClass' => 'smalltext'));
    return $pgmenuTree->toHtml();
}

function menutop(){
    $loma   = &Auth::singleton();
    if ($loma->isLoggedIn()){
        $string="<a href=\"?logout\">"._("Logout")."</a>";
#        $string.=" | <a href=\"/edit.php\">"._("Edit")."</a>";
    }else{
        $string="<a href=\"/login.php\">"._("Login")."</a>";
#        $string.=" | <a href=\"/register.php\">"._("Register")."</a>";
    }
    return $string;
}

?>