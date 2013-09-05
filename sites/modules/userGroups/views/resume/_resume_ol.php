     
<h5 class="tab">Dear Tutor, Please specify your profile and experience details.</h5>
    
          <div class="form-stacked">
    
   <div class="row">
    <div class="span7">           
  <?php 
                    $form = $this->beginWidget('CActiveForm', array(
                         'id' => 'resume-form',
                         'enableAjaxValidation'=>true,
                         'enableClientValidation'=>true,
                         'errorMessageCssClass' => 'help-inline',
                        'htmlOptions' => array('enctype' => 'multipart/form-data'),
           ));  ?>

        <fieldset>	
     <div class="row">
     <div class="clearfix">
           
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('class'=>'xlarge', 'title'=>'Resume title should 
       quickly convey your area of interest, experience and skills.\n Eg:Mathematics tutor-Post Graduate-5 years exp')); ?>
		<?php echo $form->error($model,'title'); ?>

	    
    </div>       
     </div>
        
    <div class="row">
            <div class="clearfix">
                <?php $this->widget('catProvider',array('modelName'=>'Profile','model'=>$model));?>
                <?php echo $form->error($model,'cat_id'); ?>
            </div>
      </div>
 
         <div class="row">     
              <div class="clearfix">
   
     
        <?php echo $form->labelEx($model,'addr1'); ?>
       <?php echo $form->textField($model,'addr1', array('placeholder'=>'Address line 1','class'=>'medium','title' => 'Address Line1:Give your street address here')); ?>
       <?php echo $form->textField($model,'addr2', array('placeholder'=>'Address line 2','class'=>'medium','title' => 'Address Line2:Give nearest landmark here')); ?>
     </div>   
         </div>
         <div class="row">
  <div class="clearfix">
 
		<?php echo $form->labelEx($model,'contact_name'); ?>
		<?php echo $form->textField($model,'contact_name',array('class'=>'medium','title'=>'Give the name of the person to be contacted')); ?>
                <?php echo $form->textField($model,'mobile',array('class'=>'medium', 'title'=>'Give the mobile number of the person to be contacted')); ?>
		<?php echo $form->error($model,'mobile'); ?>
	    
 </div>
         </div>
        
   <div class="row">
         <div class="clearfix">
      
           <?php echo $form->labelEx($model,'course'); ?>
           <?php echo CHtml::activeDropDownList($model,'course',array('1'=>'Post Graduate','2'=>'Under Graduate')); ?>
           <?php echo $form->textField($model,'degree',array('placeholder'=>'Qualifying degree name','class'=>'xlarge','title'=>'Highest qualifying degree name')); ?>
            <?php echo $form->error($model,'degree'); ?>
         </div>
         </div>
            
   <div class="row">
         <div class="clearfix">
      
      <?php echo $form->labelEx($model,'expyrs'); ?>
     <?php echo $form->dropDownList($model,'expyrs',array('0'=>'< 1 Year','1'=>'1 Year','2'=>'2 Years','3'=>'3 Years',
       '4'=>'4 Years','5'=>'5 Years','6'=>'> 5 Years'),array('title' => 'Experience Level in Yrs')); ?>
      <?php echo $form->textField($model,'occupa',array('placeholder'=>'Presently working as','title' =>'Give your present designation')); ?>
       <?php echo $form->error($model,'occupa'); ?>
     
             </div>
         </div>         
       <div class="row">        
 <div class="clearfix">   
  <?php //echo CHtml::image($img->image_path); ?>
              
         
        <?php //echo CHtml::activeHiddenField($img, 'alt_tag_text', array('hint'=>'')); ?> 
 </div>
</div>
         
    </div><!--span6--> 
       
     <div class="span6">
         
         <div class="row">
 <div class="clearfix">

   <?php echo $form->labelEx($model,'pcode',array('class'=>'control-label required'));?> 
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
         
         <div class="row">
<div class="clearfix">
       <?php echo $form->labelEx($model,'univer'); ?>
       <?php echo $form->textField($model,'univer', array('placeholder'=>'graduating university','class'=>'xlarge','title' =>'Give the name of the University you have graduated from')); ?>
</div>
          </div> 
         
        
         <div class="row">
           
         <div class="span3"> 
             
           <?php 
              if ($img->getError('images')!== null)
                  echo CHtml::errorSummary($img,'','',array('class'=>'alert-message block-message error'));
             else
               echo CHtml::image($pic);
             ?> 
            
         </div>
            <div class="span3">
               <label>Upload your Image</label>
        <?php echo CHtml::activeFileField($model,'avatar', array("style"=>"color:green;")); ?>
             
          </div>   
               
         </div>
         <div class="row">
         <div class="clearfix">
       <?php echo $form->labelEx($model,'description'); ?>
       <?php echo CHtml::activeTextArea($model,'description',array( 'rows'=>10,'class'=>'xlarge','placeholder'=>'Few lines about yoou...','title' =>'Write in detail about your experience and qualification')); ?>
       <?php echo $form->error($model,'description'); ?>
     </div>
         </div>
      </div><!--span6--> 
       
    
    
    
    </div><!--row--> 
<div class="actions" style="padding: 14px 19px;">
    <?php echo CHtml::hiddenField('formID', $form->id) ?>
     
<?php echo CHtml::submitButton('Save Resume Details',
                                  //array('update' => '#main'),   
                 array('id' => 'submit-this'.$model->cv_id.rand(),'class' =>'btn primary ') ); ?>
               </div>
   
       
 </fieldset>  

<?php $this->endWidget(); ?>
   
  
  </div> <!--form stacked-->


