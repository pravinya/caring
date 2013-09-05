<?php
class adProvider {
    
    public function init()
    {
        
    }
     
   
    
    public function getModule(){
        // return 'postAd';
    }
        
       
    public function run(){
      
      
          
            $this->renderContent();
          
     
    }
         
  
   protected function renderContent(){
   
         echo '<span class="pull-right">';
         echo CHtml::link('Post Ad',array('/classifieds/publish'),array('id'=>'post-ad','class' => 'btn btn-info','target' => 'blank'));
         echo '</span>';
    
   
   }
 
}
                                     