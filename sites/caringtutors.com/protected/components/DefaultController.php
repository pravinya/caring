<?php

class DefaultController extends Controller
{

    const AVATAR_DIR_HOME = '/files/users/';
    const LOGO_DIR_HOME = '/files/posts/';
		
     /**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'UserGroupsAccessControl', 
		);
	}

     public function beforeAction($action) {
		$config = array();
		//print_r($config); Yii::app()->end();
		switch ($action->id) {
			case 'postjob':
				$config = array(
					'steps'=>array('Jobs',array('isGuest' => array('Account Details'=>'UserGroupsUser'),
                                                                     'isEmployer' => array('Account'=>'UserLogin'),
                                                                     'Finished'=>array()
                                                       ), ),
                  
					'events'=>array(
						'onStart'=>'wizardStart',
						'onProcessStep'=>'registrationWizardProcessStep',
						'onFinished'=>'wizardFinished',
						'onInvalidStep'=>'wizardInvalidStep',
						'onSaveDraft'=>'wizardSaveDraft'
					),
					'menuLastItem'=>'Done'
				     );
				break;
                       
                         case 'postcv':
                             
                             
                               if(Yii::app()->user->groupName === 'tutor'){
                                   $id = Yii::app()->user->id;
                                   $tutor = Profile::model()->findByAttributes(array('ug_id'=>$id));
                                   if(!empty($tutor)){ $this->redirect(array('/mydashboard'));Yii::app()->end();}
                               }
				$config = array(
					'steps'=>array(  
                                            //'Skills'=>'VSkills',
                                           // 'Avatar' => 'ImageLocation',
                                           
                                                 'Resume'=>'Profile'),
                  
					'events'=>array(
						'onStart'=>'wizardStart',
						'onProcessStep'=>'registrationWizardProcessStep',
						'onFinished'=>'wizardFinished',
						'onInvalidStep'=>'wizardInvalidStep',
						'onSaveDraft'=>'wizardSaveDraft'
					),
					'menuLastItem'=>'',
					//'forwardOnly' => 'TRUE'
				        );
				break;
                        case 'company':
			    $config = array(
					'steps'=>array(
					       'Company Details'=>'Profiles',
                                               
                                             //  'Course Details' => 'Skills',
                                             //  'Upload Logo' => 'ImageLocation',
                                               array('isGuest' => array('Account Details'=>'UserGroupsUser'),
                                                                     'isAder' => array('Account'=>'UserLogin'),
                                                                     'Finished'=>array()
                                                       ),
					                   ),
                  
					'events'=>array(
						'onStart'=>'wizardStart',
						'onProcessStep'=>'registrationWizardProcessStep',
						'onFinished'=>'wizardFinished',
						'onInvalidStep'=>'wizardInvalidStep',
						'onSaveDraft'=>'wizardSaveDraft'
					),
					'menuLastItem'=>'Done',
                                      //  'forwardOnly' => 'TRUE'
				        );
				break;
			case 'agency':			
			       $config = array(
					'steps'=>array('Account Details'=>'UserGroupsUser','Employer'),
					'events'=>array(
						'onStart'=>'wizardStart',
						'onProcessStep'=>'registrationWizardProcessStep',
						'onFinished'=>'wizardFinished',
						'onInvalidStep'=>'wizardInvalidStep',
						'onSaveDraft'=>'wizardSaveDraft'
					      ),
					'menuLastItem'=>'Register'
				        );
				break;

			case 'resumeRegistration':
				$config['steps'] = array(); 
			default:
				break;
		}
		if (!empty($config)) {  //print_r($config);Yii::app()->end();
			$config['class']='application.modules.postAd.components.WizardBehavior';
			$this->attachBehavior('wizard', $config);
		}
		return parent::beforeAction($action);
	}

    
    
    
    
    
    public function actionIndex()
	{
		$this->render('index');
	}
    
   
        
        /**
	 * Resumes a registration.
	 */
	public function actionResumeRegistration($uuid) {
		$user = new application.modules.user.models.RegistrationForm();
		$data = $user->recoverRegistration($uuid);
		if ($data===false || !$this->wizard->restore($data))
			Yii::app()->getUser()->setFlash('notice', 'Your registration data could not be recovered.');
		else
			Yii::app()->getUser()->setFlash('success', 'Your registration has been recovered; please continue.');
		$this->redirect(array('registration'));
	}

	// Wizard Behavior Event Handlers
	/**
	* Raised when the wizard starts; before any steps are processed.
	* MUST set $event->handled=true for the wizard to continue.
	* Leaving $event->handled===false causes the onFinished event to be raised.
	* @param WizardEvent The event
	*/
	public function wizardStart($event) {
		$event->handled = true;
	}

	/**
	* Raised when the wizard detects an invalid step
	* @param WizardEvent The event
	*/
	public function wizardInvalidStep($event) {
		Yii::app()->getUser()->setFlash('notice', $event->step.' is not a vaild step in this wizard');
	}

        public function wfAdjustData($event, $modelName, $pk,$uid){
                    
            
         }
        
        public function separateImages($modelName,$id, $il,$image){
            $imname = '';
            switch ($modelName){
                
                case 'Profiles': 
                                $il->post_id = $id; 
                                $il->image_path = self::LOGO_DIR_HOME.$id.'/'.$image->name;
                                $il->image_name = $image->name;
                                $this->saveImages($image,$il);
                                break;
                case 'Profile' :
                                $il->ug_id = $id;
                                
                                //$path_parts = pathinfo($image->name);
                               // $imname = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
                               // $il->image_path = self::AVATAR_DIR_HOME.$id.'/'.$imname;
                               // $il->image_name = $image->name;
                                $folder=Yii::getPathOfAlias('webroot.files.users').DIRECTORY_SEPARATOR;
                                if(!is_dir($folder)){
                                     mkdir($folder,07777,true);
                                    
                                }
                                $this->saveImages($image,$il);
                                break;
            }
            
            
        }
        
        public function saveImages($pic,$il){
      // echo $il->image_path; Yii::app()->end();
                

                if($pic->saveAs(Yii::getPathOfAlias('webroot').$il->image_path)){    
                     try{
                        $image = Yii::app()->image->load(Yii::getPathOfAlias('webroot').$il->image_path);
                        $image->resize(400, 100); 
                        if($image->save()){ // echo $il->id; Yii::app()->end();
                           // if($il->id > 0) 
                                
                                $il->save(); 
                            
                           // else $il->update();
                            Yii::app()->user->setFlash('success',
                                     'Image upload successful.'
                                                );
                            return $pic;
                        }  
                       
                      } 
                  catch(Exception $e){
                           Yii::app()->user->setFlash('error',
                                'Retry:'. $e->getMessage().'. Please verify your image and try again!'
                                                );
                  }
              }
       }     
}