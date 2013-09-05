

<?php if(!empty($model1->cname) ):    ?>
    
    <h5 class="tab">
   
    
    <?php echo $model1->cname.' - '.$model1->location;?></h5>
    <div class="pull-right"><?php
echo CHtml::link( '<i class="icon-edit"></i> Update Profile', array( '/profiles/update','id'=>Yii::app()->user->id ),
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
                                              
					   
					     //  array('name'=>'email', 'label'=>'Email'),
                            ),
     
          )); ?>
      </div>
     <div class="classified_list_pic">
        
        <?php   $imid = !empty($model1->imageId) ? $model1->imageId : 1;
                  
		  $this->widget('ext.imageSelect.ImageSelect',  array(
                                 'path'=>'/image/default/create/id/'.$imid.'&version=medium',
                                 'alt'=>$model1->cname.'-'.$model1->location,
                                 'uploadUrl'=>$this->createUrl('/profiles/uploadLogo',array('imid'=>$imid,'adid'=>$model1->id)),
                                 'htmlOptions'=>array()
               ));  ?>
    </div>
 </div>
<?php elseif(Yii::app()->user->groupName === 'business'):?>
 <h5 class="tab">Training Business?
       <?php $this->widget('zii.widgets.jui.CJuiButton', array(
                           'name'=>'post_ad',
                            'buttonType' => 'link',
                          'caption'=>'Post Ad',
                           'url'=>array('/profiles/postAd'),
                          'htmlOptions'=>array(
                                'class'=>'pull-right',
                                'data-title'=>'Post your free ad on caringtutors.com', 
                                 'data-content'=>'',
                                 'rel'=>'popover'
                             )
                   )); ?>  
      
      </h5>
      
    
          
         <ul><li>Reach exactly the job seekers you are looking for.</li>
          <li>Post your job ad on caringtutors.com</li>
        <li>Show your job at the top of search results</li>
        <li>Append your job with specific keywords</li>
        <li>Quickly reach job seekers</li>
      </ul>
            
<?php endif;?>
