<?php
//Yii::import('application.extensions.upload.Upload');


class ProfileController extends Controller{
private $_model;
        public $defaultAction = 'index';
	/*public function filters(){
		return array(
			'userGroupsAccessControl', // perform access control for CRUD operations
			array('ext.seo.components.SeoFilter + view'), // apply the filter to the view-action
		);
	}*/
	
        public function behaviors(){
                  return array(
                          'seo'=>array('class'=>'ext.seo.components.SeoControllerBehavior'),
                             );
        }

        
	public function filters(){
		return array(
			'UserGroupsAccessControl', 
		);
	}

	public function accessRules(){
		return array(
                    array('allow', // allow authenticated users to access all actions
                                'actions'=>array('fetch.GetData','list','resume'),
				'users'=>array('*'),
			),     
                    array('allow', // allow authenticated users to access all actions
                                'actions'=>array('postcv','uploadAvatar'),
				'users'=>array('@'),
                               
			),    
                    array('allow',  // allow a user tu open an update view just on their own accounts
				'actions'=>array('update'),
				'expression'=>'$_GET["id"] == Yii::app()->user->id',
				//'ajax'=>true,
			),
                     array(
                     'deny', 
			  'users'=>array('*')
                     )
                    );
	}

        public function actions(){
              return array(
                       
                       'list'=> array('class'=>'application.components.actions.getList'),
                        'locLookup'=>array(
				'class'=>'application.components.actions.SuggestLoc',
				'modelName'=>'Location',
				'methodName'=>'suggest',
			),
                        'fetch.' =>  array('class'=>'application.components.widgets.catProvider',
                                    'modelName'=>$_GET['step']),
                        
                         'update' => 'application.components.actions.UpdateAction',
			
                            );
          }
        
        public function actionIndex(){

                 $this->render('index');
        }
 
	protected function gridDetail($data,$row){
              $model= Profile::model()->findByAttributes(array('ug_id' => $data->id));
              return $this->renderPartial('index',array('model'=>$model),true); 
       }
	
      
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']))
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
       /**
	 * Updates a user data
	 * if the update is successfull the user profile will be reloaded
	 * You can change password or mail indipendently
	 * @param integer $id the ID of the model to be updated
	*/
	  public function actionPostcv(){      
                 $this->layout = 'adpost';
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
                                 $this->redirect( array('/userGroups') );
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
      
          
	  public function setFlash( $key, $value, $defaultValue = null ){
                    Yii::app()->user->setFlash( $key, $value, $defaultValue );
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
	
}