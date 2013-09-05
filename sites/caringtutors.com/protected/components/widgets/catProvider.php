<?php
//Yii::import('application.models.Subject');
class catProvider extends CWidget{
    
    protected $controller; 
    public $modelName ;
    public $model;
    public $root;
    public $category;
    public static function actions(){
         return array(
                   'GetData'=>'application.components.actions.getCats',
        );
    }
    
     public function getModule()   {
        // return 'postAd';
     }
        
     public function init()
    {   if(empty($this->root)){
        $roots = Category::model()->roots()->findAll();
         $this->root = $roots[0];}
    }
    
    public function run(){
        $roots = Category::model()->roots()->findAll();
  $root = $roots[0];
        $controller = $this->getController();
 //$model_class = ucfirst($controller->getId());
      
       echo '<div class="control-group">';
       echo CHtml::activeLabelEx($this->model,'category_id',array('class'=>'control-label')); 
       echo '<div class="controls">';
      // echo $this->modelName;
      // echo '<span>';
       echo CHtml::activeDropDownList($this->model,'scat_id', CHtml::listData($this->root->children()->findAll(),CHtml::encode('id'), 'name'),
           array( 'prompt' => '---Select a category---',
                  'ajax' => array(
                  'type'=>'POST', //request type
                  'url'=>CController::createUrl('site/fetch.GetData',array('modelName'=>$this->modelName)), 
          //Style: CController::createUrl('currentController/methodToCall')
                 'update'=>'#'.$this->modelName.'_category_id',
                  'beforeSend' => 'js:function(){ 
                                    // $("#something").hide();
                                     $("#something").addClass("loading");
                                     }',
                  'complete' => 'js:function(){ //js:alert("completed");
                                   //  $("#something").show();
                                     $("#something").removeClass("loading");
                                     }',    
                  
                 // 
          //'data'=>'js:javascript statement' 
          //leave out the data key to pass all form values through
                       ),
              // 'visible' => false
               )); 
             echo '<br>';
              echo CHtml::label('Sub category','',array('class'=>'control-label'));
               echo '<br>';
          $catarr = array(); 
          if(!empty($this->model->category_id)){
                   $scat =  Category::model()->findByPk($this->model->category_id);
 
                   $catarr = array( $scat->id => $scat->name );   
                   
                   }
                  
                   echo CHtml::activeDropDownList($this->model,'category_id',$catarr,array('prompt'=>'---choose one---')); 
                //   echo '</span>'; 
                   echo '</div>';
                   echo '</div>';
         
         }
        
}

?>