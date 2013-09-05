<?php

Yii::import('application.modules.userGroups.models.UserGroupsConfiguration');
Yii::import('application.modules.userGroups.models.UserGroupsUser');
Yii::import('application.modules.userGroups.models.UserGroupsCron');
Yii::import('ext.hoauth.models.UserOAuth');
class regstProvider extends CWidget{
    
    public $title='User login';
    public $visible=true; 
    public $breadcrumbs;
    public $returnUrl = 'test';
    public $fbmail;
    public $facebook;
    public $model;
    public $profiles;
    
    public function init()
    {
        if($this->visible)
        {
            $this->model = new UserGroupsUser('registration');
         
         // $this->controller->layout = "main";
         if(!Yii::app()->user->isGuest) {
        $userOAuth = UserOAuth::model()->findUser(Yii::app()->user->id, "Facebook"); 
          if(!empty($userOAuth)) $profile = $userOAuth->adapter->getUserProfile();
          // echo "Your email is {$profile->email} and social network - {$userOAuth->name}<br />";
          $this->fbmail = $profile->email; 
          $this->facebook = $profile->identifier;
        }
        }
    }
 
    
        public static function actions(){
        return array(
                   'modal'=>'application.components.actions.getRegst',
        );
    }
    
     public function getModule()   {
        // return 'postAd';
     }
        
    
    
    public function run(){
        if($this->visible)
        {
            
            
            
            
            $this->renderContent();
        }
      //  $controller = $this->getController();
 
   
         }
         
    protected function getFbPic(){
        
        return CHtml::image("http://graph.facebook.com/".$this->facebook."/picture");
    }
   protected function renderContent(){
        $this->render('_register',array('model'=>$this->model));
     
     
       
   }

}
                                     