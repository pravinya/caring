
<h5 class="tab">Please specify your Company Details</h5>
   <div class="form-stacked">
       
       
   <div class="row-fluid">
    <div class="span7">       
<?php   //$this->widget('EUniForm',array('theme' => 'aristo')); 
     
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
'id' => 'biz-post', 
     //'focus'=>array($model,'title'),
                       
    'errorMessageCssClass' => 'help-inline',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
   'htmlOptions' => array('enctype' => 'multipart/form-data'),
));  ?>


  
	
<fieldset>
      
   
    <?php echo $form->errorSummary($model); ?>
   
     
             
             <?php //$this->widget('catBrowser',array('model'=>$model)); ?>
      
     
     
    <div class="row-fluid">
           <div class="clearfix">
		<?php echo $form->labelEx($model,'cname'); ?>
		<?php echo $form->textField($model,'cname',array('title'=>'Your company name')); ?>
		<?php echo $form->error($model,'cname'); ?>
	    </div>
        
    </div>
     <div class="row-fluid"> 
     <div class="clearfix">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('placeholder'=>'Website http://',  'title'=>'Type your website address starting with http://')); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>
     </div>
    
    <div class="row-fluid"> 
        <div class="clearfix">
		<?php echo $form->labelEx($model,'addr1'); ?>
		<?php echo $form->textField($model,'addr1',array('title'=>'Address first line')); ?>
		<?php echo $form->error($model,'addr1'); ?>
	</div>

    
     </div>
    
  <div class="row-fluid">    
    <div class="clearfix">
		<?php echo $form->labelEx($model,'addr2'); ?>
		<?php echo $form->textField($model,'addr2',array( 'title'=>'Address second line')); ?>
		<?php echo $form->error($model,'addr2'); ?>
	</div>
  </div>
  <div class="row-fluid">    
    <div class="clearfix">
  
  
	</div>
  </div>	    
    </div><!--span6--> 
       
     <div class="span5"> 
      <div class="row-fluid">
       <div class="clearfix"> 
   <?php echo CHtml::activeLabel($model,'pcode',array('class'=>'control-label required'));?>  
                
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
			$('#Profiles_location').val(ui.item.id);
			}"

    ),
    'htmlOptions'=>array(
       "rel"=>"tooltip" ,"title"=>"Your location here!",
    
    )
));?>
       </div>
     
      </div>
         
    <div class="row-fluid">     
          <div class="clearfix">  
         <?php echo  $form->labelEx($model,'location');?>
          
<?php echo $form->textField($model,'location',array('title'=>'')); ?>
</div>
    </div>        
  <div class="row-fluid">
        <div class="clearfix">
		<?php echo $form->labelEx($model,'mphone'); ?>
		<?php echo $form->textField($model,'mphone',array( 'title'=>'')); ?>
		<?php echo $form->error($model,'mphone'); ?>
	</div>
    
   
</div>
  <div class="row-fluid">        
      <div class="clearfix">
		<?php echo $form->labelEx($model,'lphone'); ?>
		<?php echo $form->textField($model,'lphone',array( 'title'=>'')); ?>
		<?php echo $form->error($model,'lphone'); ?>
	</div>   
  </div>      
  

 </div><!--span6--> 
      </div>
  
       <div class="actions" style="padding: 14px 19px;">
    <?php echo CHtml::hiddenField('formID', $form->id) ?>
     
<?php echo CHtml::submitButton('Save Company Details',
                                  //array('update' => '#main'),   
                 array('id' => 'submit-this'.$model->id.rand(),'class' =>'btn btn-primary ') ); ?>
               </div>
</fieldset>
 <?php $this->endWidget(); ?>
  </div> <!--form stacked-->
       
       
      
  


