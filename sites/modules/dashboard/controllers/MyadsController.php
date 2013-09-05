<?php

class MyadsController extends AdminController
{

    public function actionIndex()
    {
        $this->adminMenu = array(
            array('label' => 'Admin Operations'),
            array('label' => 'Dashboard Home', 'icon' => 'home', 'url' => array('/dashboard/dash/'), 'active' => true),
            array('label' => 'My Ads', 'icon' => 'refresh', 'url' => array('/dashboard/myads/index')),
           );

        $this->render('index');
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