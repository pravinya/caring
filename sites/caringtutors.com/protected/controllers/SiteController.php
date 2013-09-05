<?php
                    
class SiteController extends Controller{
    // public $layout= 'account';
     public $locLink;
     public $locData; 

     public function filters(){
          return array(
                array('ext.seo.components.SeoFilter + view'), // apply the filter to the view-action
          );
     }

     public function behaviors(){
             return array(
                'seo'=>array('class'=>'ext.seo.components.SeoControllerBehavior'),
            );
     }
     
     public function accessRules()
    {
        return array(
            array('allow',
                'controllers'=>array('site'),
                'actions'=>array('error'),
            ),

         );
    }
     public function actions(){
		return array(
		         'captcha'=>array(
				'class'=>'CCaptchaAction',
                                
				'backColor'=>0xFFFFFF,
			),
			'page'=>array(
				'class'=>'CViewAction',
			),
                        'locLookup'  =>  array(
				             'class'      =>  'application.components.actions.SuggestLoc',
				             'modelName'  =>  'Location',
				             'methodName' =>  'suggest',
			),
                        
                        'fetch.' =>  array(
                                            'class'=>'application.components.widgets.catProvider',
                                            'modelName'=>$_GET['modelName']
                                          ),
                        'categories.' =>  array(
                                            'class'=>'application.components.subjProvider',
                                            'modelName'=>$_GET['modelName']
                                          ),
                        'catree.' =>  array(
                                            'class'=>'application.components.widgets.catBrowser',
                                            
                                          ),
                        'quick.' => array('class'=>'application.components.widgets.msgProvider',
                                           ),
                        'login.'    =>  array('class'=>'application.components.widgets.loginProvider'),  
                        'signup.'    =>  array('class'=>'userGroups.components.widgets.regstProvider'),
			'contact.'    =>  array('class'=>'application.components.widgets.contactProvider'),
			'tagLookup' => array( 'class'=>'application.components.actions.SuggestTag',
                                       'modelName'=>'Skills',
				       'methodName'=>'suggest'
                                     ),   
                       
                        );
	}
        
       
	
        public function actionError(){
           if(isset($_GET["login"]))$this->refresh();
	  if($error=Yii::app()->errorHandler->error)
          {   //$this->redirect(array('site/index'));
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }

	        	//$this->render('error');
	      
	}

    
      

	public function actionContact(){
	 
 
	  $this->layout = 'application.views.layouts.adview';
           	$model=new ContactForm;
		
		if(isset($_POST['ContactForm'])){
             		$model->attributes=$_POST['ContactForm'];
			if($model->validate()){
                               
                                $headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['supportEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
				Yii::app()->sms->send(array('to'=>$model->mobile, 'message'=>'Thanks for contacting us. We will reply to your query shortly-caringtutors.com team'));
                              // Yii::app()->end();
			}
		}
		$this->render('_contact',array('contact_model'=>$model));
        
		
	}

	
 }