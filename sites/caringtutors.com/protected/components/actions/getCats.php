<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
class getCats extends CAction{
      protected $controller; 
      public $modelName ;
      public $step;
      
      public function run() { 
          $modelName = $_GET['modelName'];
        //  $category =  if(isset($_GET['category']))
          //  echo $_POST['Profiles']['scat_id'];Yii::app()->end();
               
               $cat=Category::model()->findByPk((int) $_POST[$modelName]['scat_id']);
               
               $data = $cat->children()->findAll();
               
         
         $data=CHtml::listData($data,'id','name'); //print_r($data);
          foreach($data as $value=>$name)
                   {
                     echo CHtml::tag('option',
                             array('value'=>$value),CHtml::encode($name),true);
                   } 
}
  public function getModule(){
        
        
        
    }
}
