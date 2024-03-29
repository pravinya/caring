<?php

class loginProvider extends CWidget{
    
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
    public $loginViewFile = 'userGroups.components.widgets.views.signup._loginPart';
    public $regstViewFile = 'userGroups.components.widgets.views.signup._regstPart';
    
    public function init()
    {
        
          // echo 'Initialization started...';
        if($this->visible)
        {              
            $cs = Yii::app()->clientScript;
            $baseUrl = Yii::app()->theme->baseUrl;
	    $cs->registerScriptFile($baseUrl."/js/libs/bootstrap/bootstrap.min.js",CClientScript::POS_END);
            $cs->registerScriptFile(Yii::app()->baseUrl . '/js_plugins/spin.min.js', CClientScript::POS_END);
          //  $cs->registerScriptFile($baseUrl . '/js/spin.js', CClientScript::POS_END);
   
        }
    }
     
    public static function actions(){
        return array(
                   'GetLogin'=>'userGroups.components.actions.getLogin',
                   'modal'=>'userGroups.components.actions.getRegst',
        );
    }
    
    public function getModule(){
        // return 'postAd';
    }
        
       
    public function run(){
      
        if($this->visible)
        {
            
            $this->renderContent();
        }
       
    }
         
    protected function getFbPic(){
        
        return CHtml::image("http://graph.facebook.com/".$this->fbProfile["id"]."/picture");
    }
    
   protected function renderContent(){
    if(Yii::app()->user->isGuest){
     echo '<span class="pull-right">';
     echo CHtml::link('Login or Signup',array('/site/login.GetLogin'),array('id'=>'login-or-register','class' => 'btn btn-info'));
     echo '</span/>';
    $this->widget('application.components.widgets.EFancyBox', array(
    'target'=>'#login-or-register',
    'config'=>array(
	'title'             => 'Login or signup to caringtutors.com',
        "transitionIn"      =>"elastic",
        "transitionOut"     =>"elastic",
        "speedIn"           =>600,
        "speedOut"          =>200,
        "overlayShow"       =>true,
       	'fitToView'         => false,
        'autoSize'          => false,
        'width'             => '56%',
       // 'height'            => '86%',
       'autoScale' => true,
        'enableEscapeButton' => false,
        'overlayOpacity' => 0,
        'hideOnOverlayClick' => false,
       
        'onClosed'      =>  'js:function(){window.location.reload();}',
	'type'          => 'iframe',
        'helpers' => '{  overlay : {closeClick: false}}'
          ),
        ));
    }
    else {
        
       
        $username = Yii::app()->user->name;
       
        
        echo '<a>Welcome,'. $username.'</a>';
        echo '<ul id="yw2" style="visibility: visible; width: 660px; left: 143.1818084716797px; top: 98.26420211791992px; display: block;">';
        echo '<li><a tabindex="-1" href="/userGroups.html">My Profile</a></li>';
        echo '<li><a tabindex="-1" href="/ad/postAd.html">Post Ad</a></li><li class="divider"></li>';
        echo '<li><a tabindex="-1" href="/userGroups/user/logout.html"><i class="icon-off"></i> Logout</a></li></ul>';
       
      // echo CHtml::link('Welcome,'. $username,array('/userGroups/user/logout'),array('id'=>'logout-user','class' => 'btn btn-info'));
    
    }
      // $this->render('login',array('model'=>$this->model,'login_model'=>$this->login_model,'fbUser'=>$this->fbProfile,'registered'=>$this->isRegistered($this->model->facebook)));
    
   // 'http://<firm:\w+>.mydomain.com/<case:\w+>/<_c:(your|available|controllers)>/<_a:(your|available|actions>' => '<_c>/<_a>',
       
   }
 
}
                                     