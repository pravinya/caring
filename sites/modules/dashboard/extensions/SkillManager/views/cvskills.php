  <h3>Specify your Training Skills</h3>
  <?php  
  $form = $this->beginWidget('CActiveForm', array(
          'id' => 'skills-post-'.$base_class,
      'action' =>array('public/skills.manage','base_id'=> $base_id,'base_class'=>$base_class),  
  
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
));  ?>
  <strong>Enter your training skill names separated by commas. Only alphabets are allowed</srong>
  <?php echo $form->textField($model,'tags',array('style'=>'width:555px;')); ?>
  <?php /*$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>$model,
			'attribute'=>"tags",
			'sourceUrl'=>CController::createUrl('/dashboard/public/tagLookup'), 
			//'multiple'=>true,
			'htmlOptions'=>array('class'=>'input-large search-query','placeholder'=>'Type your skill',
                            'title' => 'Please type your training specialization here!'),
		)); */?>
  <?php/* $this->widget('dashboard.extensions.multicomplete.MultiComplete', array(
          'model'=>$model,
          'attribute'=>'tags',
          'splitter'=>',',
         //'source'=>array('ac1', 'ac2', 'ac3'),
         'sourceUrl'=>CController::createUrl('/dashboard/public/tagLookup'),
          // additional javascript options for the autocomplete plugin
          'options'=>array(
                  'minLength'=>'2',
          ),
          'htmlOptions'=>array(
                  'size'=>'460'
          ),
  ));*/
  ?>

         <div class="form-actions">
             <?php echo CHtml::htmlButton('<i class="icon-ok icon-white"></i> Save Skills', array('class'=>'btn btn-primary', 'type'=>'submit')); ?>
         </div>
    
  <?php $this->endWidget();  ?>