<?php

Yii::import('userGroups.models.UserGroupsConfiguration');
Yii::import('userGroups.models.UserGroupsUser');
Yii::import('userGroups.models.UserGroupsCron');
Yii::import('ext.hoauth.models.UserOAuth');
class regstProvider extends CWidget{
    
    public $title='Sign Up';
    public $visible=true; 
    public $autoOpen = false;
    public $returnUrl = 'test';
    public $fbUser = null;
    public $fbProfile = null;
    public $model;
    
    public $regstViewFile = 'userGroups.components.widgets.views.signup._regstPart';
    public function init()
    {
        if($this->visible)
        {
           
          //Yii::app()->facebook->getAccessToken();
            $this->model = new UserGroupsUser('registration');
            if(empty($this->model)) $this->model = new UserGroupsUser('registration');
            if( empty($this->model->facebook )){
                         
                $this->fbProfile = Yii::app()->facebook->getUser();  //print_r($this->fbProfile);Yii::app()->end();
                if ($this->fbProfile) {
                  try {
            // Proceed knowing you have a logged in user who's authenticated.
                       $this->fbProfile = Yii::app()->facebook->api('/me');
                     } catch (FacebookApiException $e) {
               //throw $e;
                 $this->fbProfile = null;
                   }
                }
                $this->model->facebook = $this->fbProfile["id"] ? $this->fbProfile["id"]: null;
                $this->model->email = $this->fbProfile["email"] ? $this->fbProfile["email"]: null;
                $this->model->firstname = $this->fbProfile["first_name"] ? $this->fbProfile["first_name"]: null;
                $this->model->lastname = $this->fbProfile["last_name"] ? $this->fbProfile["last_name"]: null;
                $this->model->displayname = $this->fbProfile["username"] ? $this->fbProfile["username"]: null;
                $this->model->birthdate = $this->fbProfile["birthYear"] 
                                ? sprintf("%04d-%02d-%02d", $this->fbProfile["birthYear"], $this->fbProfile["birthMonth"], $this->fbProfile["birthDay"])
                                           : null;
                $gender = array('female'=>'f','male'=>'m');
                $this->model->username = $this->fbProfile["displayName"] ? $this->fbProfile["displayName"]: null;
               // $this->model->password = $this->fbProfile["identifier"] ? $this->fbProfile["identifier"]: null;
                $this->model->gender = $gender[$this->fbProfile["gender"]];
                $this->model->group_id = 2;
                $this->model->status = 5;  //UserGroupsUser::FACEBOOK;
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
        
        $this->render('register',array('model'=>$this->model,'fbUser'=>$this->fbProfile));
    
     
       
   }

}
                                     