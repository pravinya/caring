<?php
class getLogIn extends CAction{
      
      public $fbProfile = null;
      public $model;
      public $login_model;
     
      protected function init(){
	    
	    $this->login_model = new LoginForm;  //UserGroupsUser('login');
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
      
      public function run() {
	    $lfmodel=new LoginForm;
	   $model = new UserGroupsUser('login');
	 if (Yii::app()->request->isAjaxRequest){
	  
	    if (isset($_POST['LoginForm'])) {  
		  $model->username = $_POST['LoginForm']['username'];
		  $model->password = $_POST['LoginForm']['password'];
                   //  $model->attributes = $_POST['UserGroupsUser'];
		  if ($model->validate() && $model->login()){
			       $array = array('login' => 'success');
                              Yii::app()->user->setFlash('success', 'Successfully logged in.');
                              $json = json_encode($array);
                              echo $json; 
			    //  $this->getController()->redirect(array('/userGroups'));
                              Yii::app()->end();
		  }
		  else{
			echo CActiveForm::validate($model);
                        Yii::app()->end();
		  }
	    }
	 }   
	 else {   
	    $this->init();
	    $this->controller->layout = 'fancy_box_layout';
	    
	  }
          $this->getController()->render('userGroups.components.widgets.views.login',array('login_model'=>$lfmodel,'fbUser'=>$this->fbProfile,)); 
      
      }
  
  public function getModule(){
     
    }
    
}
?>