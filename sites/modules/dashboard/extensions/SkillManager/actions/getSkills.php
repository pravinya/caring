<?php
class getSkills extends CAction{
 protected $controller; 
    public $modelName ;
    
    public $baseModel;
    private $tags;
   
    public function run(){
        $controller = $this->getController();
      
          $this->modelName = ucfirst($controller->getId());
          $tag = new Skills;
         
          if(!empty($_GET['base_id'])) $base_id = $_GET['base_id'];
	  if(!empty($_GET['base_class'])) $baseClass = call_user_func($_GET['base_class'].'::model');
          
	  $baseName = get_class($baseClass);
          $relRec = $baseClass->findByPk($base_id );  
          
          if(isset($_POST[$baseName])){  //print_r( $_POST['Profile'] ); Yii::app()->end();
           // $cv->attributes=$_POST['Profile'];
            $this->tags =  $_POST[$baseName]['tags'];  //echo $this->tags; Yii::app()->end();
            $this->tags = Skills::array2string(array_unique(Skills::string2array($this->tags)));
             
             
             
             //delete all tags for this ad
					$skills = new Skills();
					$skills->removeTags( $skills->string2array($this->tags) );
					unset($skills);
					
	     //save tags in tags table
					$skillsArray = Skills::string2array( $this->tags );
					if(!empty($skillsArray)){ //print_r($skillsArray); Yii::app()->end();
					  $addedIds =  Skills::model()->addTags( $skillsArray );
					}
              
              $relRec->setRelationRecords('skills',$addedIds);
              unset($addedIds);
             /* $tags = $tag->normalizeTags($tag->tags);
             foreach($tags as $singletag){
                if(Skills::model()->findByAttributes(array('name'=>$singletag))){                                    
                          $tag=Skills::model()->findByAttributes(array('name'=>$singletag));
                          $vskl->skill_id = $tag->skill_id;
                    }
                    else{
                          $tag->isNewRecord = true;
                          $tag->primaryKey = NULL;
                          $tag->name = $singletag;
                          if($tag->validate()) $tag->save(false);
                          if(!empty($tag->skill_id)) $vskl->skill_id = $tag->skill_id;
                                     
                    }
                   
                 //   if($vskl->getIsNewRecord()) $vskl->save(false);
                    }  */
              }
                                                        
             $controller->redirect(array('/dashboard/dash/myprofile'));

          }
       
        
}