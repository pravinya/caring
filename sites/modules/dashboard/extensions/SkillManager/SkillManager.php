<?php

Yii::import('zii.widgets.CPortlet');

class SkillManager extends CWidget{
    protected $controller; 
    public $modelName ;
    public $baseModel;
    public $fetchMethodName = "";
    
    public static function actions(){
        return array(
                   'manage'=>'dashboard.extensions.SkillManager.actions.getSkills',
        );
    }
   
    
    public function run(){
         //  $model = new Skills;
            $base_class = get_class($this->baseModel);
           $base_id = $this->baseModel->primaryKey;
           $this->baseModel->tags = implode(',',call_user_func('Skills::'.$this->fetchMethodName,$base_id));
         
         $this->render('dashboard.extensions.SkillManager.views.cvskills',array(
                           'model'=>$this->baseModel,
                           'base_id' => $base_id,
                           'base_class' => $base_class
                              )
                       );
         }
}

?>