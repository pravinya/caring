
<div  id = "main" >
<?php if(Yii::app()->user->hasFlash('ad-post-success')): ?>
<div class="notice"><?php echo Yii::app()->user->getFlash('ad-post-success'); ?><br>
Your Company profile is successfully posted!. We will review your profile and publish your profile as soon as possible.
</div>

<?php else: ?>
   
    <h5 class="tab">Please specify your Company Details</h5>
   <div class="form-stacked">
       
<?php   //$this->widget('EUniForm',array('theme' => 'aristo')); 
     
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
'id' => 'biz-post', 
     'focus'=>array($model,'title'),
                       
   
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
   'htmlOptions' => array('enctype' => 'multipart/form-data'),
));  ?>


 
	
<fieldset>
      
    <?php echo CHtml::errorSummary($model); ?>
    <div class="row-fluid">
 <div class="clearfix">
		<?php echo $form->labelEx($model,'cname'); ?>
		<?php echo $form->textField($model,'cname',array('title'=>'Your company name')); ?>
		<?php echo CHtml::error($model,'title'); ?>
	</div>
    

    
    <div class="clearfix">


    <?php echo $form->labelEx($model,'cat_id'); ?>
    <?php $this->widget('ext.EChosen.EChosen');?>
    <?php echo CHtml::activeDropDownList($model,'category',CHtml::listData(Category::model()->findAll(),'id','name'),
         array('class'=>'chzn-select', 'style' => 'width:292px;')); ?>
  
   

</div>
    
    </div>
    
     <div class="row-fluid"> 
  <div class="clearfix">
		<?php echo $form->labelEx($model,'addr1'); ?>
		<?php echo $form->textField($model,'addr1',array('title'=>'Address first line')); ?>
		<?php echo CHtml::error($model,'addr1'); ?>
	</div>
<div class="clearfix">
		<?php echo $form->labelEx($model,'addr2'); ?>
		<?php echo $form->textField($model,'addr2',array( 'title'=>'Address second line')); ?>
		<?php echo CHtml::error($model,'addr2'); ?>
	</div>
    
     </div>
    
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
      <div class="clearfix">  
         <?php echo  $form->labelEx($model,'location');?>
          
<?php echo $form->textField($model,'location',array('class'=>'span3','title'=>'')); ?>
</div>
      </div>
  <div class="row-fluid">
        <div class="clearfix">
		<?php echo $form->labelEx($model,'mphone'); ?>
		<?php echo $form->textField($model,'mphone',array( 'title'=>'')); ?>
		<?php echo CHtml::error($model,'mphone'); ?>
	</div>
    <div class="clearfix">
		<?php echo $form->labelEx($model,'lphone'); ?>
		<?php echo $form->textField($model,'lphone',array( 'title'=>'')); ?>
		<?php echo CHtml::error($model,'lphone'); ?>
	</div>
    <div class="clearfix">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('placeholder'=>'Website http://',  'title'=>'Type your website address starting with http://')); ?>
		<?php echo CHtml::error($model,'url'); ?>
	</div>
</div>
    <div class="row-fluid">
   <div class="clearfix">
       <?php echo $form->labelEx($model,'about'); ?>
       <?php echo CHtml::activeTextArea($model,'about',array( 'rows'=>10,'cols'=>50,'placeholder'=>'Few lines about yoor company...','title' =>'Write in detail about your company')); ?>
      
</div>

    </div>
<div class="row-fluid">
    <div class="clearfix">
		<?php echo $form->labelEx($model,'tags'); ?>
	
	        
                
    <?php $this->widget('application.modules.postAd.extensions.multicomplete.MultiComplete', array(
          'model'=>$model,
          'attribute'=>'tags',
          'splitter'=>',',
         // 'source'=>array('ac1', 'ac2', 'ac3'),
          'sourceUrl'=>array('tagLookup'),
          // additional javascript options for the autocomplete plugin
          'options'=>array(
                  'minLength'=>'2',
          ),
          'htmlOptions'=>array(
                  'size'=>60,'class'=>'span8'
          ),
  ));
  ?>    
    	<p class="hint">Please separate different tags with commas.</p>
		<?php echo $form->error($model,'tags'); ?>
        
	</div>

</div>
        
<div class="form-actions">
    <?php echo CHtml::hiddenField('formID', $form->id) ?>
     <div class="">
<?php echo CHtml::submitButton('Save Ad Details',
                                 // array('update' => '#main'),   
                 array('id' => 'submit-this'.$model->id.rand(),'class' =>'btn btn-primary btn-large') ); ?>
               </div>
   
       
</div>
 
</fieldset>
 <?php $this->endWidget(); ?>
    <?php endif;?>
       </div>
       
      
   </div>


