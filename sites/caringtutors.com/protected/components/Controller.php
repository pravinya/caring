<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
Yii::import('userGroups.models.UserGroupsUser');
Yii::import('userGroups.models.UserGroupsConfiguration');
Yii::import('userGroups.components.UserGroupsIdentity');

class Controller extends CController
{
    
    private $_assetsUrl;
	/**
	 * @var mixed the default tooltip for every controller.
	 * if you give to this parameter a boolean false value instead of an array,
	 * the controller will not be displayed in the permission menagement view.
	 * for more information view the documentation in the userGroups module.
	 */
	public static $_permissionControl = array('read' => false, 'write' => false, 'admin' => false);
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout = 'account';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
        
       
        public $returnUrl;  // = Yii::app()->returnUrl;
        
	
	
	
	
	/**
	 * std class for pushing vars in the view
	 *
	 * @var stdClass
	 */
	public $view;
	public function init(){
         
	parent::init();
	
	$this->view = new stdClass();
	//if(isset($_GET['login']))
	
	$cs = Yii::app()->clientScript;
     // $cs->registerCoreScript('jquery');
	
        
	}
	
    /*    public function redirect($url, $terminate=true, $statusCode=302)
   {
      if(session_id()!=='') @session_write_close();
      parent::redirect($url, $terminate, $statusCode);
   }*/
	/**
	 * The filter method for 'UserGroupsAccessControl' filter.
	 * This filter is a wrapper of {@link UserGroupsAccessControl}.
	 * To use this filter, you must override {@link accessRules} method.
	 * @param CFilterChain $filterChain the filter chain that the filter is on.
	 */
	public function filterUserGroupsAccessControl($filterChain)
	{
		Yii::import('userGroups.models.UserGroupsUser');
		Yii::import('userGroups.models.UserGroupsConfiguration');
		Yii::import('userGroups.components.UserGroupsAccessControl');
		$filter=new UserGroupsAccessControl;
		$filter->setRules($this->accessRules());
		$filter->filter($filterChain);
	}
	
        protected function afterRender($view, &$output) {
             parent::afterRender($view,$output);
            //Yii::app()->facebook->addJsCallback($js); // use this if you are registering any $js code you want to run asyc
            Yii::app()->facebook->initJs($output); // this initializes the Facebook JS SDK on all pages
            Yii::app()->facebook->renderOGMetaTags(); // this renders the OG tags
            return true;
       }

          
        
            /**
    * @return string the base URL that contains all published asset files of this module.
    */
    public function getAssetsUrl()
    {
        if($this->_assetsUrl===null)
            Yii::app()->getAssetManager()->publish( 
                    Yii::getPathOfAlias( 'redmond' ), false, -1, false );
        return $this->_assetsUrl;
    }

    

    
/*
    public function registerJs($file)
    {
        
         $cs = Yii::app()->getClientScript();
         $cs->registerScriptFile( $this->getAssetUrl(). '/js/jquery-ui-1.10.0.custom.min.js'); 
        //return '<script type="text/javascript" src="'.$href.'"></script>';
    }
*/
    
    public function registerImage($file)
    {
        return $this->getAssetsUrl().'/img/'.$file;
    }

    
   

    /**
    * @param string the base URL that contains all published asset files of this module.
    */
    public function setAssetsUrl($value)
    {
        $this->_assetsUrl=$value;
    }
    
     public function registerCss($file, $media='all')
    {
        $href = $this->getAssetsUrl().'/css/'.$file;
        return '<link rel="stylesheet" type="text/css" href="'.$href.'" media="'.$media.'" />';
    }
    
    
    
    //UTILITY FUNCTIONS
  public function registerCssAndJs($folder, $jsfile, $cssfile) {
        $sourceFolder = YiiBase::getPathOfAlias($folder);
        $publishedFolder = Yii::app()->assetManager->publish($sourceFolder);
        Yii::app()->clientScript->registerScriptFile($publishedFolder . $jsfile, CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerCssFile($publishedFolder . $cssfile);
    }
/*  causing error  
 public  function registerCss($folder, $cssfile, $media-'all') {
        $sourceFolder = YiiBase::getPathOfAlias($folder);
        $publishedFolder = Yii::app()->assetManager->publish($sourceFolder);
        Yii::app()->clientScript->registerCssFile($publishedFolder .'/'. $cssfile);
        return $publishedFolder .'/'. $cssfile;
    }
*/
     public  function registerJs($folder, $jsfile) {
        $sourceFolder = YiiBase::getPathOfAlias($folder);
        $publishedFolder = Yii::app()->assetManager->publish($sourceFolder);
        Yii::app()->clientScript->registerScriptFile($publishedFolder .'/'.  $jsfile);
        return $publishedFolder .'/'. $jsfile;
    }
	

	


    
    
}