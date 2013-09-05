<?php

class listProvider extends CWidget{
    
    protected $controller; 
    public $modelName ;
    public $model;
    public $category;
    public static function actions(){
        return array(
                   'ListData'=>'application.components.actions.getList',
        );
    }
    
     public function getModule()   {
        // return 'postAd';
     }
        
    
    
    public function run(){
        switch($this->modelName){
          case 'Profiles':
                          $this->render('_search1');
                          break;
          case 'Profile':
                          $this->render('_search2');
                          break;
          
        }
    }
         
         
      
}

?>