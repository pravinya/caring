<?php

/**
 * Classifieds Controller: Post classified ad, edit and delete ad
 * 
 */
class ClassifiedsController extends Controller{
	
	const ADCONTACT = 'ad_contact';
	const NOTIFICATION = 'notification';
        
        /**
	 * @property string the name of the default action
	 */
	public $defaultAction = 'postAd';
        
        /**
	 * Declares class-based actions.
	 */
	public function actions(){
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				'testLimit' => 1
			),
                        'gmap.'  =>  array(
                                            'class'=>'dashboard.extensions.LocationPicker.LocationWidget',
                                            'defaultLocation'=>'Hyderabad, India'
                        ),
                                             
		);
	}

	public function beforeAction($action) {
		
		$config = array();
		switch ($action->id) {
			             
                         case 'postAd':
				$config = array(
					'steps'=>array(
						    'Choose a Category' => 'category',
						    'Ad Details' => 'general',
						    'Location' => 'location',
						  //  'Add Images'=> 'photo',
						   // 'Verification' => 'verification'
					),
                  
					'events'=>array(
						'onStart'=>'wizardStart',
						'onProcessStep'=>'adWizardProcessStep',
						'onFinished'=>'wizardFinished',
						'onInvalidStep'=>'wizardInvalidStep',
						'onSaveDraft'=>'wizardSaveDraft'
					),
					'menuLastItem'=>'Finished',
					//'forwardOnly' => 'TRUE'
				        );
				break;

			
		}
		if (!empty($config)) {
			$config['class']='dashboard.components.WizardBehavior';
			$this->attachBehavior('wizard', $config);
		}
		return parent::beforeAction($action);
	}
	
	// Wizard Behavior Event Handlers
	/**
	* Raised when the wizard starts; before any steps are processed.
	* MUST set $event->handled=true for the wizard to continue.
	* Leaving $event->handled===false causes the onFinished event to be raised.
	* @param WizardEvent The event
	*/
	public function wizardStart($event) {
            
                if($adSessionData['user_is_logged'] == 1) 
                                   $event->sender->reset();
		$event->handled = true;
		
	}
	
	public function actionPostAd($step=null){
		$this->pageTitle = 'Post Ad on Caringtutors.com';
		$this->process($step);
	}
	
	/**
	* Raised when the wizard detects an invalid step
	* @param WizardEvent The event
	*/
	public function wizardInvalidStep($event) {
		Yii::app()->getUser()->setFlash('notice', $event->step.' is not a vaild step in this wizard');
	}

	/**
	* The wizard has finished; use $event->step to find out why.
	* Normally on successful completion ($event->step===true) data would be saved
	* to permanent storage; the demo just displays it
	* @param WizardEvent The event
	*/
	public function wizardFinished($event) {
	   $this->layout = 'column1';
	  
	   if ($event->step===true){
              $model = new Ad;
               
               foreach ($event->data as $step=>$data){
			foreach ($data as $k=>$v)
                              if(!empty($v))
                              { $model->$k = $v; }
               }
	       if(isset(Yii::app()->session['ad_edit'])){
                    $ad = Ad::model()->findByPk($model->ad_id);
		    $model->ad_id = $ad->ad_id;
	       }
              // echo $model->ad_id; Yii::app()->end();
             if($model->save()){  //$model->ad_id; Yii::app()->end();
                   // !empty($model->ad_id) ? $model->save(false) : $model->update();
                     Yii::app()->user->setFlash('posted','Your Ad is posted successfully. Please visit your email for instructions to further administer your ad. Thank you.');
		      $this->render('completed', compact('event','model'));
                      $event->sender->reset();
                      Yii::app()->end();	
              }
           }
	   else{
		$this->render('finished', compact('event'));
		
	   $event->sender->reset();
	   
           }
	}
		
	
        
	public function actionEditstep1(){
		//init ad model
		$adModel = new Ad();
		      
		//is there ad parameter
		$adId = isset($_GET['id']) ? $_GET['id']: null;
		if(empty($adId) || !is_numeric($adId) ||(int)$adId == 0){
		  $this->redirect(array('/site/index'));
		}
		      
		//is there ad with this id
		if(!$adModel->getAdById($adId)){
		  $this->redirect(array('/site/index'));
		}
		      
		//create delete form model
		$adDeleteModel = new AdDeleteForm();
		$this->view->showDeleteForm = 1;
							      
		//is the form submitted
		if(isset($_POST['AdDeleteForm'])){
		   $adDeleteModel->attributes = $_POST['AdDeleteForm'];
		   //validate form and delete code
		   if($adDeleteModel->validate() && $code_valid = $adModel->getAdByIdAndCode( $adId, $adDeleteModel->code)){
		      $adData = array('user_is_logged' => 1, 'ad_id' => $adId, 'code' => $adDeleteModel->code);
		      Yii::app()->session['ad_edit'] = $adData;
		      $this->redirect(Yii::app()->createUrl('/dashboard/classifieds/editstep2', array('id' => $adId)));
		   } else {
		      if (!$code_valid){
			      $adDeleteModel->addError('code', Yii::t('delete_page_v2', 'Delete code is invalid'));
		      }
		   }
		}//check if form is submitted
		      
		//set data to view
		$this->view->adDeleteModel    = $adDeleteModel;
		$this->view->breadcrump 	= array(Yii::t('edit_page', 'pageTitle'));
		$this->view->pageTitle 	= Yii::t('edit_page', 'pageTitle');
		$this->view->pageDescription 	= Yii::t('edit_page', 'pageDescription');
		$this->view->pageKeywords 	= Yii::t('edit_page', 'pageKeywords');
		$this->render('editstep1_tpl');	
	}
	
	public function actionEditstep2(){
            
	  //is there ad parameter
	  $adId = isset($_GET['id']) ? $_GET['id']: null;
	  if(empty($adId) || !is_numeric($adId) ||(int)$adId == 0){
	    $this->redirect(array('/site/index'));
	  }
		
	  //is there ad with this id
	  if(!$adModel = Ad::model()->findByPk($adId)){
	    $this->redirect(array('/site/index'));
	  }
		
	  //validate user
	  if(!isset(Yii::app()->session['ad_edit'])){
	    $this->redirect(array('/site/index'));
	  } else {
	     $adSessionData = Yii::app()->session['ad_edit'];
	     if($adSessionData['user_is_logged'] != 1 || $adSessionData['ad_id'] != $adModel->ad_id || trim($adSessionData['code']) != trim($adModel->code)){
	         $this->redirect(array('/site/index'));
	     }
	  }
	
          $this->redirect(Yii::app()->createUrl('/dashboard/classifieds/postAd', array('id'=> $adModel->ad_id )));
          
	}


	/**
	* Process wizard steps.
	* The event handler must set $event->handled=true for the wizard to continue
	* @param WizardEvent The event
	*/
	public function adWizardProcessStep($event) {
            
        $this->layout = 'column1';
                $scenario = $event->step;
		  $model = new Ad();
                   $adSessionData = Yii::app()->session['ad_edit'];
			if($adSessionData['user_is_logged'] == 1) 
                                   $model = Ad::model()->findByPk( $adSessionData['ad_id'] );
                        
                 
		   $model->scenario = $scenario;
		   $model->attributes = $event->data;
                switch($scenario){
			
                    case 'category':
			
			
			$flag = false;
                         if(!empty($model->category_id )){
                            $cat = Category::model()->findByPk($model->category_id);
                            $model->category_title = $cat->name;
                        }
		     
			if(!empty($_POST['Ad'] )){
		        $model->attributes =  $_POST['Ad'] ;
                        
                       
                        
		        if ($model->validate()) {
                                $event->sender->save($model->attributes);
			        $event->handled = true; $flag = true;
                        }
			}
			if(!$flag)
                 	$this->render('_category', compact('event','model'));
	        
                        break;
		    case 'general':  
                        
			$model->scenario = $scenario;
			$flag = false;
			
	                if(!$adTypeList = Yii::app()->cache->get( 'adTypeList' )){
	                $adTypeList = AdType::model()->getHtmlList();
	                     Yii::app()->cache->set('adTypeList' , $adTypeList);	
	                }
	                $this->view->adTypeList = $adTypeList;
		        
			if(!empty($_POST['Ad'] )){
		        $model->attributes = $_POST['Ad'] ;
			
		        if ($model->validate()) {
				
				
				
                                $event->sender->save($model->attributes);
			        $event->handled = true;
				$flag = true;
			
                        }
			}
			if(!$flag)
                 	$this->render('_general', compact('event','model'));
	        
                        break;
		   case 'photo':  
                       
		        $model->scenario = $scenario;
			$flag = false;
			if(!empty($_POST)){  //print_r($_FILES);Yii::app()->end();
			    $event->handled = true;	 
                            $flag = true;
				      
			}
			if(!$flag)
                 	$this->render('_photo', compact('event','model'));
	        
                        break;
		   case 'location':  
                       
			$flag = false;
		        $model->scenario = $scenario;
			if(!empty($_POST['Ad'] )){
				
				//print_r($_POST['Ad']); Yii::app()->end();
		        $model->attributes =  $_POST['Ad'];
			if(isset($_POST['Ad']['location']))
				     $model->ad_address  =  $_POST['Ad']['location'];
			if(isset($_POST['Ad']['ad_lat']))
				     $model->ad_lat  =  $_POST['Ad']['ad_lat'];
			if(isset($_POST['Ad']['ad_lng']))
				     $model->ad_lng  =  $_POST['Ad']['ad_lng'];	     
		        if ($model->validate()&& !AdBanEmail::model()->isBanned($model->ad_email)) {
                              
                                $event->sender->save($model->attributes);
				$event->handled = true;
				        $flag = true;
				
			        
                        }
			}
			if(!$flag)
                 	$this->render('_location', compact('event','model'));
	                break;
		
		  			
                }
        }

  
	public function actionDelete()
	{
		//init ad model
		$adModel = new Ad();
		
		//is there ad parameter
		$adId = isset($_GET['id']) ? $_GET['id']: null;
		if(empty($adId) || !is_numeric($adId) ||(int)$adId == 0){
			$this->redirect(array('/site/index'));
		}
		
		//is there ad with this id
		if(!$adModel->getAdById($adId)){
			$this->redirect(array('/site/index'));
		}
		
		//create delete form model
		$adDeleteModel = new AdDeleteForm();
		$this->view->showDeleteForm = 1;
							
		//is the form submitted
		if(isset($_POST['AdDeleteForm'])){
			$adDeleteModel->attributes = $_POST['AdDeleteForm'];
			
			//validate form and delete code
			if($adDeleteModel->validate() && $code_valid = $adModel->getAdByIdAndCode( $adId, $adDeleteModel->code)){
			try{
				//delete all tags for this ad
				$adTagModel = new AdTag();
				$adData = $adModel->findByPk( $adId );
				$adTagModel->removeTags( $adTagModel->string2array( $adData->ad_tags) );
						
				//delete all pics for this ad
				$adPicModel = new AdPic;
				$adPicArray = $adPicModel->findAll('ad_id = :ad_id', array(':ad_id' => $adId));
				if(!empty($adPicArray)){
					foreach ($adPicArray as $k => $v){
						@unlink(PATH_UF_CLASSIFIEDS . $v['ad_pic_path']);
						@unlink(PATH_UF_CLASSIFIEDS . 'small-' . $v['ad_pic_path']);
					}
					$adPicModel->deleteAll('ad_id = :ad_id', array(':ad_id' => $adId));
				}
						
				$adModel->ad_id = $adId;
				$adModel->setIsNewRecord( false );
				$adModel->delete();
					
				Yii::app()->cache->flush();
			} catch (Exception $e){}
				
				//do not show form in the view
				$this->view->showDeleteForm = 0;
			} else {
				if (!$code_valid){
					$adDeleteModel->addError('code', Yii::t('delete_page_v2', 'Delete code is invalid'));
				}
			}
		}
		
		
		//set data to view
		$this->view->adDeleteModel = $adDeleteModel;

		$this->view->breadcrump 		= array(Yii::t('delete_page', 'pageTitle'));
		$this->view->pageTitle 			= Yii::t('delete_page', 'pageTitle');
		$this->view->pageDescription 	= Yii::t('delete_page', 'pageDescription');
		$this->view->pageKeywords 		= Yii::t('delete_page', 'pageKeywords');

		$this->render('delete_tpl');	

	}
	
	   
        public function actionUploadImages(){
            
		//$adPicModels = Array();
               if(isset($_GET['ad_id']))
                      $adId = $_GET['ad_id'];
                 $model = Ad::model()->findByPk($adId);
                $uploadedFiles = CUploadedFile::getInstances($model,'images');
		if(!empty($uploadedFiles) ){  //echo 'file taken';Yii::app()->end();
                       $adPicModel = new AdPic();
                       $adPicArray = $adPicModel->findAll('ad_id = :ad_id', array(':ad_id' => $adId));
		       if(!empty($adPicArray)){
				foreach ($adPicArray as $k => $v){
					@unlink(PATH_UF_CLASSIFIEDS . $v['ad_pic_path']);
					@unlink(PATH_UF_CLASSIFIEDS . 'small-' . $v['ad_pic_path']);
				}
				$adPicModel->deleteAll('ad_id = :ad_id', array(':ad_id' => $adId));
			}
                        
			define('ASIDO_GD_JPEG_QUALITY', 100);
						
			foreach($uploadedFiles as $k => $v){
				$adPicModel = new AdPic();
				
				$fileNameOnServer = $adId . '-classifieds-' . $v->getName();
				$v->saveAs(PATH_UF_CLASSIFIEDS . $fileNameOnServer);
							
				$pic_variations = array('small' => array('name' => 'small-' . $fileNameOnServer, 'width' => 120, 'height' => 90));
							
				Yii::import('dashboard.extensions.asido.*');
				require_once('class.asido.php');
				asido::driver('gd');
							
				//resize images
				foreach ($pic_variations as $k => $v){
				    $img = asido::image(PATH_UF_CLASSIFIEDS . $fileNameOnServer , PATH_UF_CLASSIFIEDS . $v['name']);
				    asido::frame($img, $v['width'], $v['height'], Asido::color(255, 255, 255));
				    $img->save( ASIDO_OVERWRITE_ENABLED );
			        }//end of foreach
							
				//save image in image table
			        $adPicModel->ad_id = $adId;  //$adModel->ad_id;
			        $adPicModel->ad_pic_path = $fileNameOnServer;
			        $adPicModel->save();
			     	
		        }
                      
		      $this->redirect(array('/ad/detail','adid'=>$model->ad_id));
		}
            else echo 'no files';
	}
	
	protected function performAjaxValidation($model){
		if(isset($_POST['ajax']) && $_POST['ajax']==='ad-form'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	protected function getErrorSummary($model){
		if(Yii::app()->request->isAjaxRequest) {
			$errors=CActiveForm::validate($model);
			if($errors !== '[]') Yii::app()->end($errors); 
		}

	}
        
}