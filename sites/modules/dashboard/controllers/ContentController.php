<?php

/**
 * Content Controller: Create and Update User Profiles- Resume and Company data, upload Images.
 * 
 */

class ContentController extends Controller{
        private $_model;   //for resume
	private $_model2;  //for company profile
        public $defaultAction = 'index';
	
                
	public function filters(){
		return array(
			'UserGroupsAccessControl', 
		);
	}

	public function accessRules(){
		return array(
                       
                    array( 'allow', // allow authenticated users to access all actions
                                'actions'=>array('postcv','postAd','uploadAvatar','uploadLogo'),
				'users'=>array('@'),
                               
			),    
                    array( 'allow',  // allow a user tu open an update view just on their own accounts
				'actions'=>array('update','cupdate'),
				'expression'=>'$_GET["id"] == Yii::app()->user->id',
				//'ajax'=>true,
			),
		    array( 'deny', 
			   'users'=>array('*')
                         )
                    );
	}

        public function actions(){
              return array(
                       
                    'locLookup'=>array(
			'class'=>'application.components.actions.SuggestLoc',
			'modelName'=>'Location',
			'methodName'=>'suggest',
		    ),
                    'fetch.' =>  array('class'=>'application.components.widgets.catProvider',
                                    'modelName'=>$_GET['step']
		    ),
                        
                    'update' => array('class'=>'dashboard.components.actions.UpdateAction',
			          'ajaxView' => '_form', 'view' => 'update','model'=>$this->loadModel(),
		    )
                            ,
	            'cupdate' => array('class'=>'dashboard.components.actions.UpdateAction',
			          'ajaxView' => '_cmpform', 'view' => 'cmpupdate','model'=>$this->loadCmpModel()
		    )
               );
          }
    
		
       /**
	 * Updates a user data
	 * if the update is successfull the user profile will be reloaded
	 * You can change password or mail indipendently
	 * @param integer $id the ID of the model to be updated
	*/
	  public function actionPostcv(){      
                 $this->layout = 'column1';
                 $model = $this->loadModel(Yii::app()->user->id);
                        
                    if( isset( $_POST['Profile'] ) ){
                          $model->attributes = $_POST['Profile'];
                          $model->ug_id = Yii::app()->user->id;	      
                          if( $model->save()){ 
                              if( Yii::app()->request->isAjaxRequest ){
                                   Yii::app()->clientScript->scriptMap['jquery.js'] = false;
                                   echo CJSON::encode( array(
                                          'status' => 'success',
                                          'content' => 'Post successfully updated',
                                    ));
                                   exit;
                                  }
                              else
                                 $this->redirect( array('/dashboard/dash') );
                              }
                    }
                    if( Yii::app()->request->isAjaxRequest ){
                          //echo 'ajax request';Yii::app()->end();
                          // $this->renderPartial( '_resume', array('model' => $model ), false, true );
                          // Stop jQuery from re-initialization
                              Yii::app()->clientScript->scriptMap['jquery.js'] = false;
                              echo CJSON::encode( array(
                                    'status' => 'failure',
                                    'content' => $this->renderPartial( '_form', array(
                                    'model' => $model ), true, true ),
                              ));
                              exit;
                    }
                       else
                         $this->render( '_form', array( 'model' => $model) );
	  }
            
          	
         /**
	 * Updates a user data
	 * if the update is successfull the user profile will be reloaded
	 * You can change password or mail indipendently
	 * @param integer $id the ID of the model to be updated
	*/
	public function actionPostad(){      
            $this->layout = 'column1';
                 $model = $this->loadCmpModel(Yii::app()->user->id);
                       
            if( isset( $_POST['Profiles'] ) ){
                   $model->attributes = $_POST['Profiles'];
                   $model->ug_id = Yii::app()->user->id;	      
             if( $model->save()){ 
                   if( Yii::app()->request->isAjaxRequest ){
                        Yii::app()->clientScript->scriptMap['jquery.js'] = false;
                        echo CJSON::encode( array(
                                   'status' => 'success',
                                   'content' => 'Ad successfully updated',
                           ));
                           exit;
                        }
                   else
                        $this->redirect( array('/dashboard/dash') );
                  }
              }
              
            
              if( Yii::app()->request->isAjaxRequest ){
                   // Stop jQuery from re-initialization
                    Yii::app()->clientScript->scriptMap['jquery.js'] = false;
                    echo CJSON::encode( array(
                        'status' => 'failure',
                        'content' => $this->renderPartial( '_form', array(
                        'model' => $model ), true, true ),
                     ));
               exit;
             }
             else
                $this->render( '_form2', array( 'model' => $model) );
	}
   
   
    
          public function loadModel(){
          
              $uid = Yii::app()->user->id;
              if( $this->_model === null ){
		    if( $uid > 0 )
			 $this->_model = Profile::model()->findByAttributes(array( 'ug_id'=>(int)$uid));
		    if( $this->_model === null )
		      $this->_model = new Profile();
		     //throw new CHttpException( 404, 'The requested page does not exist.' );
	      }
            
              return $this->_model;
          }
	  
	  public function loadCmpModel(){
          
               $uid = Yii::app()->user->id;
               if( $this->_model2 === null ){
                    if( $uid > 0 )
                       $this->_model2 = Profiles::model()->findByAttributes(array( 'ug_id'=>(int)$uid));
               if( $this->_model2 === null )
               $this->_model2 = new Profiles();
                 //throw new CHttpException( 404, 'The requested page does not exist.' );
               }
            
              return $this->_model2;
          }
      
      
          /**
	 *upload logo facebook like
	 */
               
        public function actionUploadLogo(){
             
              $image = CUploadedFile::getInstanceByName('file');
              $imid = $_GET['imid'];$adid = $_GET['adid'];
	      $uid = Yii::app()->user->id;
              $apath = 'posts/'.$adid;
              $ad = Profiles::model()->findByPk($adid);
              $ad->saveImage($image,'',$apath,$imid);
              $ad->save();
              echo Yii::app()->baseUrl.'/image/default/create/id/'.$imid.'&version=medium';         
         
          }
	
	
        public function setFlash( $key, $value, $defaultValue = null ){
                  Yii::app()->user->setFlash( $key, $value, $defaultValue );
        }
        
   
          public function actionUploadAvatar(){
                      $imid = $_GET['imid'];  //echo $imid; Yii::app()->end();
                     $image = CUploadedFile::getInstanceByName('file');
              
		 //  if(isset($image) && count($images) > 0 ) {   
		     
                        $uid = Yii::app()->user->id; 
                        $cv = Profile::model()->findByAttributes(array( 'ug_id'=>(int)$uid));
                        $apath = 'users/'.$uid;
                       //Yii::app()->image->save
                        $cv->saveImage($image,'',$apath,$imid);
                           $cv->save();
                           
                //   } $this->redirect('/profile/id/'.Yii::app()->user->id);
                           
                   echo Yii::app()->baseUrl.'/image/default/create/id/'.$imid.'&version=medium';
          }
      
}
?>
