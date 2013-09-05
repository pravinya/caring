

<?php if(!empty($model1->cname) ):    ?>
    
    <h5 class="tab">
   
    
    <?php echo $model1->cname.' - '.$model1->location;?></h5>
    <div class=""><?php
echo CHtml::link( '<i class="icon-edit"></i> Update Profile', array( '/dashboard/content/cupdate','id'=>Yii::app()->user->id ),
  array(
    'class' => 'update-dialog-open-link',
    'data-update-dialog-title' => Yii::t( 'app', 'update your company profile' ),
));
?></div>
 
<div class="row-fluid">
   
      <div class="span8">
  <?php  $this->widget( 'bootstrap.widgets.TbDetailView', array(
                            'type'=>'striped bordered condensed',
                            'data' =>   $model1,  //new CArrayDataProvider($profile->relProfile->attributes),
                            'attributes' => array(
                                               array('name'=>'cname', 'label'=>'Company'),
					        array( 'value'=> CHtml::dropDownList('tags',$data,Skills::getCmpSkillNames($model1->id)),
						     'label'=>'Skills','type'=>'raw'),
                                              
					   
					     //  array('name'=>'email', 'label'=>'Email'),
                            ),
     
          )); ?>
      </div>
     <div class="classified_list_pic">
        
        <?php   $imid = !empty($model1->imageId) ? $model1->imageId : 1;
                  
		  $this->widget('ext.imageSelect.ImageSelect',  array(
                                 'path'=>'/image/default/create/id/'.$imid.'&version=medium',
                                 'alt'=>$model1->cname.'-'.$model1->location,
                                 'uploadUrl'=>$this->createUrl('/dashboard/content/uploadLogo',array('imid'=>$imid,'adid'=>$model1->id)),
                                 'htmlOptions'=>array()
               ));  ?>
    </div>
 </div>
<?php
//print_r($model->attributes);
 $this->widget('dashboard.extensions.SkillManager.SkillManager',
              array( 'baseModel' => $model1 ,'fetchMethodName' => 'getCmpSkillNames')
              ); 
?>
<?php elseif(Yii::app()->user->groupName !== 'tutor'):?>
 <h5 class="tab">Training Business?
       <?php $this->widget('zii.widgets.jui.CJuiButton', array(
                           'name'=>'post_ad',
                            'buttonType' => 'link',
                          'caption'=>'Add your Business',
                           'url'=>array('content/postAd'),
                          'htmlOptions'=>array(
                               'class'=>'btn btn-large btn-primary pull-right',
                                'data-title'=>'Add your business on caringtutors.com', 
                                 'data-content'=>'',
                                 'rel'=>'popover'
                             )
                   )); ?>  
      
      </h5>
      
    
          
         <ul><li>Reach exactly the training seekers you are looking for.</li>
          <li>Post your training ad on caringtutors.com</li>
        <li>Show your ad at the top of search results</li>
        <li>Append your ad with specific keywords</li>
        
      </ul>
            
<?php endif;?>
