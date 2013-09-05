           
  <?php 
                    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                         'id' => 'resume-form',
			 'type'=>'horizontal',
                         'enableAjaxValidation'=>true,
                         'enableClientValidation'=>true,
                        // 'errorMessageCssClass' => 'help-inline',
                        'htmlOptions' => array('enctype' => 'multipart/form-data'),
           ));
		    
		    
?>

        <fieldset>
	     <legend>Dear tutor, Please specify your profile and experience details</legend>
	    
	     <?php echo $form->textFieldRow($model, 'title', array('class'=>'span6','title'=>'Your Profile title','rel'=>'tooltip','placeholder'=>'Eg. Mathematic tutor 6 years exp Malakpet')); ?>
	    <?php echo $form->textFieldRow($model, 'addr1', array('hint'=>'Address Line1:Give your street address')); ?>
	    <?php echo $form->textFieldRow($model, 'addr2', array('hint'=>'Address Line2:Give nearest landmark here')); ?>
	   
	    <div class="control-group">
                <label class="control-label">PIN Code</label>
                   <div class="controls">
		       <?php    
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$model,
    'attribute' => 'pcode',
 // 'name'=>'pcode',
    'source'=>$this->createUrl('/site/locLookup'), //"http://ws.geonames.org/searchJSON",  //$this->createUrl('autocompleteTest'),
    'options'=>array(
            'showAnim'=>'fold',
          //  'appendTo'=>'#test1',
        'minLength'=>'6',
        'select'=>"js:function(event, ui) {
			$('#label').val(ui.item.label);
			$('#Profile_location').val(ui.item.id);
			}"

    ),
    'htmlOptions'=>array( 'class'=>'small',
       'placeholder'=>'PIN Code', 'hint'=>'Your location here!',
       'title' =>'Type your area PIN Code without spaces and then choose a location from the list displayed. The chosen location is automatically taken as location(next)'
    )
));?>

    
   <span>
         
   <?php echo $form->textField($model,'location',array('class'=>'medium','placeholder'=>'location','title'=>'If this is empty, you can manually type in your location')); ?>
       
</span>
     <?php echo $form->error($model,'location'); ?>
                       
	           </div>
            </div>
	    <?php echo $form->textFieldRow($model, 'contact_name', array('hint'=>'Give the name of the person to be contacted')); ?>
	    <?php echo $form->textFieldRow($model, 'mobile', array('hint'=>'Give the mobile number of the person to be contacted')); ?>
	    <?php echo $form->dropDownListRow($model, 'course', array('1'=>'Post Graduate','2'=>'Under Graduate'),array('hint'=>'')); ?>
	    <?php echo $form->textFieldRow($model, 'degree', array('hint'=>'Highest qualifying degree name')); ?>
	    <?php echo $form->textFieldRow($model, 'univer', array('hint'=>'Graduating University name')); ?>
	    <?php echo $form->textFieldRow($model, 'occupa', array('hint'=>'Presently working as','title' =>'Give your present designation')); ?>
	    <?php echo $form->dropDownListRow($model, 'expyrs',array('0'=>'< 1 Year','1'=>'1 Year','2'=>'2 Years','3'=>'3 Years',
       '4'=>'4 Years','5'=>'5 Years','6'=>'> 5 Years'),array('hint' => 'Experience Level in Yrs')); ?>
	    
	    
  
		 <?php //$this->widget('catBrowser',array('model'=>$model)); ?>
                <?php //$this->widget('catProvider',array('modelName'=>'Profile','model'=>$model));?>
                
          
      <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit Details')); ?>
      
      </div>
 
       
 </fieldset>  

<?php $this->endWidget(); ?>
   
   
  


