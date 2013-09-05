<?php

class MyjobsController extends AdminController
{

    public function actionIndex()
    {
        $this->adminMenu = array(
            array('label' => 'Admin Operations'),
            array('label' => 'Dashboard Home', 'icon' => 'home', 'url' => array('/dashboard/dash/')),
            array('label' => 'My Jobs', 'icon' => 'refresh', 'url' => array('/dashboard/myjobs/index'), 'active' => true),
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