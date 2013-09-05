<?php

class PublicController extends Controller
{
    
    public $breadcrumbs;
    
   public function actions(){
    return array(
     'login.'    =>  array('class'=>'dashboard.components.widgets.loginProvider'),  
     'tagLookup' => array( 'class'=>'dashboard.extensions.SkillManager.actions.SuggestTag',
                                       'modelName'=>'Skills',
				       'methodName'=>'suggest' ),  
      'skills.' => array( 'class'=>'dashboard.extensions.SkillManager.SkillManager',
                                     //  'modelName'=>'Skills',
				      // 'methodName'=>'suggest'
                                     ),                                                   
    );
   }
    public function actionIndex()
    {
        $this->layout = 'dashboard.views.layouts.column1';
	//print_r($_GET);
        $model = Profile::model()->findByPk($_GET['id']);
	//if(!empty($moede3l))
        $this->render('index',array('tutor'=>$model));
		      
    }

    
    /**
	 * form for new pass request
	 */
	public function actionPassRequest()
	{   $this->layout = 'dashboard.views.layouts.column1';
		$model = new UserGroupsUser('passRequest');

		if (isset($_POST['UserGroupsUser'])) {
			$model->attributes = $_POST['UserGroupsUser'];
			if ($model->validate()) {
				$model = UserGroupsUser::model()->findByAttributes(array('username'=>$_POST['UserGroupsUser']['username']));
				$model->scenario = 'passRequest';
				if ($model->save()) {
					$mail = new UGMail($model, UGMail::PASS_RESET);
					$mail->send();
				} else
					Yii::app()->user->setFlash('success', Yii::t('userGroupsModule.general','An Error Occurred. Please try later.'));
				//$this->redirect(Yii::app()->baseUrl . '/userGroups');
			}
		}

		$this->render('passRequest', array('model'=>$model));
	}
        
        /**
	 * user activation view
	 */
	public function actionActivate()
	{
            
            $this->layout = 'dashboard.views.layouts.column1';
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
					$this->redirect(Yii::app()->baseUrl . '/dashboard/public/recovery');
				} else {
					$userModel = UserGroupsUser::model()->findByAttributes(array('email'=>$model->email));
					$mail = new UGMail($userModel, UGMail::ACTIVATION);
					$mail->send();
					$this->redirect(Yii::app()->baseUrl . '/dashboard/public/activate');
				}
			}
		}



		$this->render('activate',array(
			'activeModel'=>$activeModel,
			'requestModel'=>$requestModel
		));
	}
        
        
	/**
	 * login in recovery mode
	 */
	public function actionRecovery()
	{        $this->layout = 'dashboard.views.layouts.column1';
		$model = $this->loadModel(Yii::app()->user->id, 'recovery');

		// if user and password are already setted and so question and answer no form will be prompted
		if (strpos($model->username, '_user') !== 0 && $model->password
			&& $model->salt && $model->question && $model->answer) {
			$model->scenario = 'swift_recovery';
			if (!$model->save())
				Yii::app()->user->setFlash('success', Yii::t('userGroupsModule.general','An Error Occurred. Please try later.'));
			$this->redirect(Yii::app()->baseUrl . '/userGroups/user/logout');
		}

		// empty the password field
		$model->password = NULL;

		$this->performAjaxValidation($model,'user-groups-recovery-form');

		if (isset($_POST['UserGroupsUser'])) {
			$model->attributes = $_POST['UserGroupsUser'];
			if ($model->validate()) {
				if (!$model->save())
					Yii::app()->user->setFlash('success', Yii::t('userGroupsModule.general','An Error Occurred. Please try later.'));
				$this->redirect(Yii::app()->baseUrl . '/userGroups/user/logout');
			}
		}

		$this->render('recovery',array(
			'model'=>$model,
		));
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
        
          protected function performAjaxValidation($model, $formId) {
           if (isset($_POST['ajax']) && $_POST['ajax'] === $formId) {
               echo CJSON::encode(CActiveForm::validate($model));
               Yii::app()->end();
        }
           }
}