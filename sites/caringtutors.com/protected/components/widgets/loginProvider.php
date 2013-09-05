<?php
Yii::import('application.components.widgets.EFancyBox');
class loginProvider {//extends EFancyBox{
    
    public $title='User login';
    public $visible=true; 
    public $breadcrumbs;
    public $returnUrl = 'test';
    public $fbProfile = null;
    public $fbUser = null;
    public $facebook;
    public $registered = false;
    public $autoOpen = false;
    public $model;
    public $login_model;
    public $modalId = 'login-modal';
  
    public function init()
    {
	
	$this->controller->pageTitle = "login to caringtutors.com";
      /*  $this->config = array(
	         'title'   => 'Returning User? Login',
        
	'width' => '67%',
        'height' => '54%',
        'enableEscapeButton' => false,
        'overlayShow' => true,
        'overlayOpacity' => 0,
        'hideOnOverlayClick' => false,
       
	'type'          => 'iframe',
          'onClosed'      =>  'function(){alert("are you sure?");parent.location.reload(true);}',
        'afterClose'=> 'function () {
            window.location.reload();
        }',
        'helpers' => '{  overlay : {closeClick: false}}'
           );
        $this->target =   '#user-login'      ;
         parent::init();*/
    }
     
    public static function actions(){
        return array(
                   'GetLogin'=>'application.components.actions.getLogin',
                   'modal'=>'application.components.actions.getRegst',
        );
    }
    
    public function getModule(){
        // return 'postAd';
    }
        
       
    public function run(){
      
      
          
            $this->renderContent();
            
           //   parent::run();
     
    }
         
    protected function getFbPic(){
        
        return CHtml::image("http://graph.facebook.com/".$this->fbProfile["id"]."/picture");
    }
    
   protected function renderContent(){
    if(Yii::app()->user->isGuest){
         echo '<span class="pull-right">';
         echo CHtml::link('Login or Register',array('/dashboard/public/login.GetLogin','type'=>2),array('id'=>'user-login','class' => 'btn btn-info','target'=>'_blank'));
         echo '</span>';
    }
    else {
      
        $username = Yii::app()->user->name;
       
        
        echo '<a href="/dashboard/dash">Welcome,'. $username.'</a>';
        echo '<ul id="yw2" >';
        echo '<li><a tabindex="-1" href="/userGroups.html">My Profile</a></li>';
        echo '<li><a tabindex="-1" href="/dashboard/classifieds/postAd.html">Post Ad</a></li><li class="divider"></li>';
        echo '<li><a tabindex="-1" href="/userGroups/user/logout.html"><i class="icon-off"></i> Logout</a></li></ul>';
   
    }
   
   }
 
}
                                     