<?php
Yii::import('zii.widgets.CPortlet');
Yii::import('application.extensions.alphapager.ApPagination');

class SearchByCategory extends CWidget
{
 public function run()
    {  
  
$model=new Category('search');

	 $criteria=new CDbCriteria();
       	if(isset($_GET['tag']))
	   $criteria->addSearchCondition('name',$_GET['tag']);
        
        $alphaPages = new ApPagination('name');
        
        $pages = $alphaPages->pagination;
        $alphaPages->applyCondition($criteria);
        $pages->setItemCount(Subjects::model()->count($criteria));
        $pages->applyLimit($criteria);
	
        $this->getController()->renderPartial('catindex',array(
			'model'=>$model,
			'alphaPages'=>$alphaPages,
		),false,true);
          }
   
    
}