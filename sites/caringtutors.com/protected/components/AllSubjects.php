<?php

Yii::import('zii.widgets.CPortlet');
Yii::import('application.models.Subject');
Yii::import('application.extensions.alphapager.ApPagination');
class AllSubjects extends CPortlet
{
	public $title='Training Categories:';
	public $maxCats=10;

	public function getAllSubjs()
	{  $act = 1;
		return Subject::model()->findAll('active='.$act);
	}

	protected function renderContent()
	{      $model=new Subjects('search');

	 $criteria=new CDbCriteria();
       	if(isset($_GET['tag']))
			$criteria->addSearchCondition('name',$_GET['tag']);
        
        $alphaPages = new ApPagination('name');
        
        $pages = $alphaPages->pagination;
        $alphaPages->applyCondition($criteria);
        $pages->setItemCount(Subjects::model()->count($criteria));
        $pages->applyLimit($criteria);
	/*$dataProvider=new CActiveDataProvider('Post', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->params['postsPerPage'],
			),
			'criteria'=>$criteria,
		));*/

		$this->render('allSubjects',array(
			'model'=>$model,
			'alphaPages'=>$alphaPages,
		));
		//$this->render('allSubjects');
	}
}