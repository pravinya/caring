

        
            <div>  
           <?php 
           $this->widget('ext.imageSelect.ImageSelect',  array(
                                 'path'=>'/image/default/create/id/'.$il2->imageId.'&version=medium',
                                 'alt'=>'alt text',
                                 'uploadUrl'=>$this->createUrl('/profile/uploadAvatar',array('imid'=>$il2->imageId)),
        'htmlOptions'=>array()
   ));
             //$user->renderImage('medium','',array());
              // $uid = Yii::app()->user->id;
              /* $img = Image::model()->findByAttributes(array( 'ug_id'=>(int)$uid));
              // $il =  Yii::app()->image->loadModel($img->id);*/
              // $path=Yii::getPathOfAlias('avatars').DIRECTORY_SEPARATOR.$uid;
            //  echo CHtml::image('http://caringtutors.com/image/default/create?id='.$il->id.'&version=medium','',array());  
           //  echo "<a href='http://caringtutors.com/image/default/create?id='.$il->id.'&version=small'/>"       ;      
// echo $il->id;
             ?> 
            
         </div>
      