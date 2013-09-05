<?php
Yii::import('application.modules.message.models.Message');
class msgProvider extends CWidget{
    
    protected $controller; 
    public $modelName ;
    public $model;
    public $category;
    public static function actions(){
        return array(
                   'job'=>'application.components.actions.CreateAction',
        );
    }
    
     public function getModule()   {
        // return 'postAd';
     }
        
    
    
    public function run(){
        echo CHtml::link( 'Post Job', array( '/site/quick.job' ),
  array(
    'class' => 'update-dialog-open-link',
    'data-update-dialog-title' => Yii::t( 'app', 'Post Your training requirement' ),
));
         
         }
        
}

?>