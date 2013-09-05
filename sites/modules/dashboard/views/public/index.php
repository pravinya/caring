
<?php if(!empty($tutor)):
$this->pageTitle = $tutor->title.' - '.$tutor->location; 
?>
 <h2> <?php echo $tutor->title.' - '.$tutor->location; ?></h2>
<div class="span4">
  <?php $this->widget('application.components.widgets.contactProvider');?>
 </div>
 <div class="span6">
        
        
         <p style="float:right;">  <?php
$this->widget('application.extensions.addThis', array(
    'id'=>'addThis',
    'username'=>'purnachandra',
    'htmlOptions'=>array(
        'class'=>'addthis_default_style',
             ),
    
    'showServices'=>array(
        'tweet',
       
        'facebook_like',
    ),
    
    'config'=>array(),
    'share'=>array(),
));
?> </p>
         <?php 
          $imageId = ($tutor->imageId == 0)?  89 : $tutor->imageId ;
  echo CHtml::link(CHtml::image( '/image/default/create/id/'.$imageId.'&version=medium',$tutor->title.'-'.$tutor->location,array('style'=> "")),$tutor->link);
?>
 
  <?php  $this->widget( 'bootstrap.widgets.TbDetailView', array(
                            'type'=>'striped bordered condensed',
                            'data' =>   $tutor,  //new CArrayDataProvider($tutor->attributes),
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
					       array( 'value'=> CHtml::dropDownList('tags',$data,Skills::getCvSkillNames($tutor->cv_id)),
						     'label'=>'Skills','type'=>'raw'),
					     //  array('name'=>'email', 'label'=>'Email'),
                            ),
     
          )); ?>
 </div>
 
 <?php endif;?>