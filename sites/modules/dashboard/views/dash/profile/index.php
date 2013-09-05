
<?php if($model2->cv_id > 0):    ?>
  
   
  <h4> <?php echo $model2->title.' - '.$model2->location; ?></h4>

    <div class="pull-right"><?php
echo CHtml::link( '<i class="icon-edit"></i>Update Profile', array( 'content/update','id'=>Yii::app()->user->id ),
  array(
    'class' => 'update-dialog-open-link',
    'data-update-dialog-title' => Yii::t( 'app', 'update your profile' ),
));
?>
 
</div>

<div class="row-fluid">
    <div class="span4">
      <div class="row-fluid" style ="border:2px background solid; " >
    
<?php   echo 'upload image';
      $lgid = $model2->imageId ;
      $this->widget('ext.imageSelect.ImageSelect',  array(
                                 'path'=>'/image/default/create/id/'.$lgid.'&version=medium',
                                 'alt'=>$model2->title,
                                 'uploadUrl'=>$this->createUrl('/dashboard/content/uploadAvatar',array('imid'=>$lgid)),
                                 'htmlOptions'=>array()
               ));  ?>

</div>
        
    </div>
     <div class="span8">
        
  <?php  $this->widget( 'bootstrap.widgets.TbDetailView', array(
                            'type'=>'striped bordered condensed',
                            'data' =>   $model2,  //new CArrayDataProvider($model2->relProfile->attributes),
                            'attributes' => array(
                                               array('name'=>'addr1', 'label'=>'Address Line1'),
                                               array('name'=>'addr2', 'label'=>'Address Line2'),
                                               array('name'=>'location', 'label'=>'location'),
                                               array('name'=>'contact_name', 'label'=>'Contact Person'),
                                               array('name'=>'mobile', 'label'=>'Mobile Number'),
                                               array('name'=>'degree', 'label'=>'Qualification'),
                                               array('name'=>'univer', 'label'=>'University'),
                                               array('name'=>'expyrs', 'label'=>'Exp Yrs.'),
//array('name'=>'Skills', 'label'=>'Exp Yrs.'),
					       array( 'value'=> CHtml::dropDownList('tags',$data,Skills::getCvSkillNames($model2->cv_id)),
						     'label'=>'Skills','type'=>'raw'),
					     //  array('name'=>'email', 'label'=>'Email'),
                            ),
     
          )); ?>
 </div>
</div>

<?php
//print_r($model->attributes);
$this->widget('dashboard.extensions.SkillManager.SkillManager',
              array( 'baseModel' => $model2,'fetchMethodName' => 'getCvSkillNames' )
              );
?>

<?php elseif(Yii::app()->user->groupName === 'tutor'):?>

    <h5 class="tab">Trainer/Tutor?
     
        <br><br><br>
      <?php $this->widget('zii.widgets.jui.CJuiButton', array(
                           'name'=>'post_resume',
                            'buttonType' => 'link',
                          'caption'=>'Post Your Resume',
                           'url'=>array('content/postcv'),
                          'htmlOptions'=>array(
                               'class'=>'btn btn-large btn-primary pull-right',
                                'data-title'=>'Post your resume free on caringtutors.com', 
                                 'data-content'=>'',
                                 'rel'=>'popover',
                             )
                   )); ?>     
      </h5>
      
     
          
          <p>Post your resume on caringtutors.com</p>
      <ul><li>Reach exactly the training seekers you are looking for.</li>

        <li>Show your resume at the top of search results</li>
        <li>Append your resume with specific keywords</li>
        <li>Quickly reach students</li>
      </ul>
          
<?php endif;?>
