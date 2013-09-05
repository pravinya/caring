<?php

class DashController extends AdminController
{

    public function actionIndex()
    {
        $this->adminMenu = array(
            array('label' => 'Admin Operations'),
            array('label' => 'Dashboard Home', 'icon' => 'home', 'url' => array('/dashboard/dash/'), 'active' => true),
            array('label' => 'My Profile', 'icon' => 'refresh', 'url' => array('/dashboard/dash/myprofile')),
            array('label' => 'Account Settings', 'icon' => 'cog', 'url' => array('/dashboard/dash/accountsettings')),
            array('label' => 'Logout', 'icon' => 'off', 'url' => array('/userGroups/user/logout'),'visible'=>!Yii::app()->user->isGuest)
        );

        $this->render('index');
    }

    public function actionMyprofile()
    {
        $this->adminMenu = array(
            array('label' => 'Admin Operations'),
            array('label' => 'Dashboard Home', 'icon' => 'home', 'url' => array('/dashboard/dash/')),
         //   array('label' => 'Demo 1', 'icon' => 'refresh', 'url' => array('dfash/demo1#'), 'active' => true),
         //   array('label' => 'Demo 2', 'icon' => 'user', 'url' => array('demo2')),
        //    array('label' => 'Demo 3', 'icon' => 'cog', 'url' => array('demo3')),
         //   array('label' => 'Demo 4', 'icon' => 'book', 'url' => array('demo4'))
        ); 
        if (isset($_GET['u'])) {
			// look for the right user criteria to use according to the viewer permissions
			if (Yii::app()->user->pbac(array('user.admin', 'admin.admin')))
				$criteria = array('username'=>$_GET['u']);
			else
				$criteria = array('username'=>$_GET['u'],'status'=>UserGroupsUser::ACTIVE);
			// load the profile
			$model=UserGroupsUser::model()->findByAttributes($criteria);
			if($model===null || ($model->relUserGroupsGroup->level > Yii::app()->user->level && !UserGroupsConfiguration::findRule('public_profiles')))
				throw new CHttpException(404,Yii::t('userGroupsModule.general','The requested page does not exist.'));
		} else
			$model=$this->loadModel(Yii::app()->user->id);

		// load the profile extensions
		$profiles = array();
		$profile_list = Yii::app()->getModule("userGroups")->profile;


		foreach ($profile_list as $p) {
			// check if the profile data exist on the current user, otherwise
			// create an instance of the profile extension
			$relation = "rel$p";

			if (!$model->$relation instanceof CActiveRecord)
				$p_instance = new $p;
			else
				$p_instance = $model->$relation;

			// check if the profile extension is supporting profile views
			$views = $p_instance->profileViews();//print_r($views);
			if (isset($views[UserGroupsUser::VIEW])) {
				$profiles[] = array('view' => $views[UserGroupsUser::VIEW], 'model' => $p_instance);
			}
		}


		if (Yii::app()->request->isAjaxRequest || isset($_GET['_isAjax']))
			$this->renderPartial('view', array('model'=>$model, 'profiles' => $profiles), false, true);
		else
			$this->render('user/view', array('model'=>$model, 'profiles' => $profiles));
      //  $this->render('index');
    }

    public function actionAccountsettings()
    {
        $this->adminMenu = array(
            array('label' => 'Admin Operations'),
            array('label' => 'Dashboard Home', 'icon' => 'home', 'url' => array('/dashboard/dash/')),
          //  array('label' => 'Demo 1', 'icon' => 'refresh', 'url' => array('demo1')),
          //  array('label' => 'Demo 2', 'icon' => 'user', 'url' => array('dfash/demo2#'), 'active' => true),
          //  array('label' => 'Demo 3', 'icon' => 'cog', 'url' => array('demo3')),
          //  array('label' => 'Demo 4', 'icon' => 'book', 'url' => array('demo4'))
        );
         $id = (Yii::app()->user->groupName === 'admin')? $_GET['id']:Yii::app()->user->id;
	//print_r()	;
       // var_dump($id);
        $miscModel=$this->loadModel($id, 'changeMisc');
		$passModel= clone $miscModel;
		$passModel->setScenario('changePassword');
		$passModel->password = NULL;
                       //    echo 'Hi';
		// pass the models inside the array for ajax validation
		$ajax_validation = array($miscModel, $passModel);
        
		// load additional profile models
		$profile_models = array();
	/*	$profiles = Yii::app()->getModule("userGroups")->profile;
		foreach ($profiles as $p) {
			$external_profile = new $p;
			// check if the loaded profile has an update view
			$external_profile_views = $external_profile->profileViews();
			if (array_key_exists(UserGroupsUser::EDIT, $external_profile_views)) {
				// load the model data
				$loaded_data = $external_profile->findByAttributes(array('ug_id' => $id));
				$external_profile = $loaded_data ? $loaded_data : $external_profile;
				// set the scenario
				$external_profile->setScenario('updateProfile');
				// load the models inside both the ajax validation array and the profile models
				// array to pass it to the view
				$profile_models[$p] = $external_profile;
				$ajax_validation[] = $external_profile;
			}
		}
           */
		// perform ajax validation
		$this->performAjaxValidation($ajax_validation);

		// check if an additional profile model form was sent
		/*if ($form = array_intersect_key($_POST, array_flip($profiles))) {
			$model_name = key($form);
			$form_values = reset($form);
			// load the form values into the model
			$profile_models[$model_name]->attributes = $form_values;
			$profile_models[$model_name]->ug_id = $id;

			// save the model
			if ($profile_models[$model_name]->save()) {
				Yii::app()->user->setFlash('user', Yii::t('userGroupsModule.general','Data Updated Successfully'));
				$this->redirect(Yii::app()->baseUrl . '/userGroups?_isAjax=1&u='.$passModel->username);
			} else
				Yii::app()->user->setFlash('user', Yii::t('userGroupsModule.general','An Error Occurred. Please try later.'));
		}*/
           
		if(isset($_POST['UserGroupsUser']) && isset($_POST['formID']))
		{  //print_r($_POST);
			// pass the right model according to the sended form and load the permitted values
			if ($_POST['formID'] === 'user-groups-password-form')
				$model = $passModel;
			else if ($_POST['formID'] === 'user-groups-misc-form')
				$model = $miscModel;

			$model->attributes = $_POST['UserGroupsUser'];
                      //print_r($model->attributes);
			if ($model->validate()) {
				if ($model->save()) {
                       			Yii::app()->user->setFlash('user', Yii::t('userGroupsModule.general','Data Updated Successfully'));					
                                      //  $this->redirect(array('/dashboard/dash'));
                                      //  $array = array('update' => 'success');
                                      //  $json = json_encode($array);
                                     //   echo $json; 
			    //  $this->getController()->redirect(array('/userGroups'));
                                    //   Yii::app()->end();
				} else
					Yii::app()->user->setFlash('user', Yii::t('userGroupsModule.general','An Error Occurred. Please try later.'));
			}
		}
      
           	$this->render('account/update',array('miscModel'=>$miscModel,'passModel'=>$passModel));
    }

    public function actionDemo3()
    {
        $this->adminMenu = array(
            array('label' => 'Admin Operations'),
            array('label' => 'Dashboard Home', 'icon' => 'home', 'url' => array('index')),
            array('label' => '', 'icon' => 'refresh', 'url' => array('/dashboard/dash/')),
          
        );
       $activeModel = new UserGroupsUser('activate');
		$requestModel = new UserGroupsUser('mailRequest');

		if (isset($_POST['UserGroupsUser']) || isset($_GET['UserGroupsUser'])) {
			if (isset($_GET['UserGroupsUser']) || $_POST['id'] === 'user-groups-activate-form')
				$model = $activeModel;
			else if (($_POST['id'] === 'user-groups-request-form'))
				$model = $requestModel;

			if (isset($_POST['UserGroupsUser']))
				$model->attributes = $_POST['UserGroupsUser'];
			else
				$model->attributes = $_GET['UserGroupsUser'];


			if($model->validate()){
				if (isset($_GET['UserGroupsUser']) || $_POST['id'] === 'user-groups-activate-form') {
					$model->login('recovery');
					$this->redirect(Yii::app()->baseUrl . '/userGroups/user/recovery');
				} else {
					$userModel = UserGroupsUser::model()->findByAttributes(array('email'=>$model->email));
					$mail = new UGMail($userModel, UGMail::ACTIVATION);
					$mail->send();
					$this->redirect(Yii::app()->baseUrl . '/userGroups/user/activate');
				}
			}
		}



		$this->render('account/activate',array(
			'activeModel'=>$activeModel,
			'requestModel'=>$requestModel
		));

       //$this->render('index');
    }

    public function actionDemo4()
    {
        $this->adminMenu = array(
            array('label' => 'Admin Operations'),
            array('label' => 'Dashboard Home', 'icon' => 'home', 'url' => array('index')),
            array('label' => 'Demo 1', 'icon' => 'refresh', 'url' => array('demo1')),
            array('label' => 'Demo 2', 'icon' => 'user', 'url' => array('demo2')),
            array('label' => 'Demo 3', 'icon' => 'cog', 'url' => array('demo3')),
            array('label' => 'Demo 4', 'icon' => 'book', 'url' => array('dfash/demo4#'), 'active' => true)
        );

        $this->render('index');
    }
    
     public function actionMyads()
    {
        $this->adminMenu = array(
            array('label' => 'Admin Operations'),
            array('label' => 'Dashboard Home', 'icon' => 'home', 'url' => array('/dashboard/dash/')),
            array('label' => 'My Ads', 'icon' => 'refresh', 'url' => array('/dashboard/dash/myads')),
          //  array('label' => 'Demo 2', 'icon' => 'user', 'url' => array('demo2')),
          //  array('label' => 'Demo 3', 'icon' => 'cog', 'url' => array('demo3')),
           // array('label' => 'Demo 4', 'icon' => 'book', 'url' => array('dfash/demo4#'), 'active' => true)
        );

        $this->render('user/myads');
    }
    
    /**
	 * render a user profile
	 */
	public function actionView()
	{  //$this->layout = 'adpost';
		// load the user profile according to the request
		
	}

/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * Optionally sets a scenario
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 * @param string the scenario to apply to the model
	 */
	public function loadModel($id, $scenario = false)
	{
		$model=UserGroupsUser::model()->findByPk((int)$id);
		if($model===null || ($model->relUserGroupsGroup->level > Yii::app()->user->level && !UserGroupsConfiguration::findRule('public_profiles')))
			throw new CHttpException(404,Yii::t('userGroupsModule.general','The requested page does not exist.'));
		if ($scenario)
			$model->setScenario($scenario);
		return $model;
	}

 protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']))
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        
        }