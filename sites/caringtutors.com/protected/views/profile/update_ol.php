
<?php
Yii::import('ext.qtip.QTip');
 
// qtip options
$opts = array(
    'position' => array(
        'corner' => array(
            'target' => 'rightMiddle',
            'tooltip' => 'leftMiddle'
            )
        ),
    'show' => array(
        'when' => array('event' => 'focus' ),
        'effect' => array( 'length' => 300 )
    ),
    'hide' => array(
        'when' => array('event' => 'blur' ),
        'effect' => array( 'length' => 300 )
    ),
    'style' => array(
        'color' => 'black',
        'name' => 'blue',
        'border' => array(
            'width' => 4,
            'radius' => 5,
        ),
    )
);

QTip::qtip('.ctrlHolder input[title]', $opts);

?>
<?php // echo 'Model one';?>
<?php print_r($form);?>
 <div  id="profile-cv-update" style="padding-left:28px;">
<h2>Resume details</h2>
<?php 

$form=$this->beginWidget('CActiveForm',array('id'=>'user-groups-profile-form',
                       // 'focus'=>array($profile,'cname'),
                       //  'type'=>'horizontal',
    'inlineErrors'=> true, // how to display errors, inline or block?
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'clientOptions'=>array('errorMessageCssClass'=>'label','onValueChange'=>true,//'inputContainer'=>'p',
        'errorCssClass'=>'label-warning'),
                                ));
 ?>
 <?php	$this->widget( 'ext.EChosen.EChosen' );?>
       <div>

  <p class="smalltxte2" style="float:left;color:green;" >Please enter the following details</p>
  <p class="smalltxte2" style="float:right;padding-right:15px;color:red;" >All fields marked with * are mandatory</p>
</div>

      <br clear="all"/>
<?php echo $form->textFieldRow($model,'title',array('class'=>'span6','title'=>'some tooltip text')); ?>
      
<div class="controls controls-row">
   <?php echo CHtml::activeLabelEx($model,'category'); ?>
     <?php
      echo CHtml::activeDropDownList($model,'category', Subject::getSubjectNames(),
      array( 'prompt' => '(Select a category)',
      'ajax' => array(
          'type'=>'POST', //request type
          'url'=>CController::createUrl('/subjects/dynamiccities'), //url to call.
          //Style: CController::createUrl('currentController/methodToCall')
          'update'=>'#Profile_cat_id',
          //'data'=>'js:javascript statement' 
          //leave out the data key to pass all form values through
       )),array('class'=>'span5')); 
    
      //empty since it will be filled by the other dropdown
     
     ?> 
       
          <?php  
          $catarr = array(); 
          if(!empty($model->category)){
          $scat =  Subsubject::model()->findByPk($model->cat_id);// echo '<strong>'.$scat->name.'</strong>';
          $catarr = array( $scat->id => $scat->name );   }
          echo CHtml::activeDropDownList($model,'cat_id',$catarr,array('prompt'=>'---choose one---'),
                  array('class'=>'span5')); 
          
           
          ?>
</div>
<?php echo CHtml::activeLabel($model,'location',array('class'=>'control-label required'));?>	
<div class="controls controls-row">
    <div class="input-append">
    <?php    
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    'attribute' => 'pcode',
 // 'name'=>'pcode',
    'source'=>CController::createUrl('/registration/locLookup'), //"http://ws.geonames.org/searchJSON",  //$this->createUrl('autocompleteTest'),
    'options'=>array(
            'showAnim'=>'fold',
          //'appendTo'=>'#test1',
            'minLength'=>'6',
            'select'=>"js:function(event, ui) {
			$('#label').val(ui.item.label);
			$('#Profile_location').val(ui.item.id);
			}"

                       ),
    'htmlOptions'=>array(
       'data-title'=>'Heading', 'hint'=>'Your location here!',
        'class' => 'span1',
        'placeholder' => 'pincode here',
       'title' =>'Type your area PIN Code without spaces and then choose a location from the list displayed. The chosen location is automatically taken as location(next)'
    )
));?>
           
<?php echo CHtml::activeTextField($model,'location',array('class'=>'span4','title'=>'If this is empty, you can manually type in your location')); ?>  
     </div>
</div>
      
<?php echo $form->textFieldRow($model,'addr1',array('class'=>'span6','title'=>'some tooltip text')); ?>
<?php echo $form->textFieldRow($model,'addr2',array('class'=>'span6','title'=>'some tooltip text')); ?>
<?php echo $form->textFieldRow($model,'contact_name',array('class'=>'span6','title'=>'some tooltip text')); ?>
<?php echo $form->textFieldRow($model,'mobile',array('class'=>'span6','title'=>'some tooltip text')); ?>   
 <?php echo $form->dropDownListRow($model,'expyrs',
              array('0'=>'< 1 Year','1'=>'1 Year','2'=>'2 Years','3'=>'3 Years',
       '4'=>'4 Years','5'=>'5 Years','6'=>'> 5 Years'),
              array('class'=>'chzn-select')); ?>

<?php echo $form->dropDownListRow($model,'course',
              array('1'=>'Post Graduate','2'=>'Under Graduate'),
              array('class'=>'chzn-select')); ?>      
 <?php echo $form->textFieldRow($model,'degree',array('class'=>'span6','title'=>'some tooltip text')); ?>  
 <?php echo $form->textFieldRow($model,'univer',array('class'=>'span6','title'=>'some tooltip text')); ?>  
 <?php echo $form->textFieldRow($model,'occupa',array('class'=>'span6','title'=>'some tooltip text')); ?>  
 <?php echo $form->textAreaRow($model,'description',array('class'=>'span6','rows'=>'6')); ?>
	
      <div class="form-actions">
		<?php echo CHtml::ajaxSubmitButton('Update Resume', Yii::app()->baseUrl . '/user/update/id/'.$user_id, array('update' => '#userGroups-container'), array('id' => 'submit-profile-'.$model->cv_id.rand(),
                    'class'=>'btn btn-primary btn-medium') ); ?>
	</div>
    
<?php $this->endWidget(); ?>
 </div>
 