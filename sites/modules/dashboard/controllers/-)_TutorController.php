<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



//Yii::import('application.extensions.upload.Upload');
require_once 'QueryPath/QueryPath.php';

class TutorController extends Controller{
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
                        
                         'update' => 'dashboard.components.actions.UpdateAction',
			
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
      

   
            public function actionUploadAvatar(){
                     $imid = $_GET['imid'];  //echo $imid;
                     $image = CUploadedFile::getInstanceByName('file');
              
		  // if(isset($image) && count($images) > 0 ) {   
		     
                      $uid = Yii::app()->user->id; //echo $uid; Yii::app()->end();
                      $user = UserGroupsUser::model()->findByAttributes(array( 'id'=>(int)$uid));
                      $apath = 'users/'.$uid;
                       //Yii::app()->image->save
                      $user->saveImage($image,'',$apath,$imid);
                      $user->save();
                           
                 //  } //$this->redirect('/profile/id/'.Yii::app()->user->id);
                           
                   echo Yii::app()->baseUrl.'/image/default/create/id/'.$imid.'&version=medium';
            }


      
}
?>
