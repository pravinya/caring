    <?php
    $model_class = ucfirst($this->getId());
     $form=$this->beginWidget('CActiveForm', array(
    'id'=>'locSearchForm',
    'method' => 'get',
     'action'=>Yii::app()->createUrl('/ad/location'),
    'enableAjaxValidation'=>false,
)); ?>

     <div class="input-group">
               
      <span class="input-group-addon">
    
 
    <?php
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
     'name'=>'pcode',
     'source'=>$this->createUrl('/site/locLookup'), 
     'options'=>array(
            'showAnim'=>'fold',
            'minLength'=>'6',
            'select'=>"js:function(event, ui) {
			$('#label').val(ui.item.label);
			$('#location').val(ui.item.id);
			//$('#pcode').attr({disabled:'disabled'}).css({'background-color':'#d0d0d0'});
			//$('#location').removeClass('loading');

                      			}",
       'open'=>"js:function(event, ui) {  
                  // $('#pcode').attr({disabled:'disabled'}).css({'background-color':'#d0d0d0'});
                  }",
       'close'=>"js:function(event, ui) {  
                   //$('#location').attr({disabled:'disabled'}).css({'background-color':'#d0d0d0'});
                   //$('#pcode').removeAttr('disabled');
                   }",

       'search'=>"js:function(event, ui) {  
                   //$('#location').attr({disabled:'disabled'}).css({'background-color':'#d0d0d0'});
                  // $('#location').addClass('loading');
                   }",
    ),
    'htmlOptions'=>array(
      "rel"=>"tooltip" ,"title"=>"Your location here!",
      'class'=>'form-control', 'style' => 'width:96px;height:29px;',
     'placeholder'=>'pincode here!'
    )
));

?>
</span><span class="input-group-addon">
<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                          'name'=>'location',
			  'source'=>$this->createUrl('/site/locLookup'),
			  'options'=>array(
			      'showAnim'=>'fold',
                              'minLength'=>'3',
					   'select'=>"js:function(event, ui) {
			                       $('#label').val(ui.item.label);
			                       $('#location').val(ui.item.id);
			//$('#pcode').attr({disabled:'disabled'}).css({'background-color':'#d0d0d0'});
			//$('#location').removeClass('loading');

                      			}",
			      ),
			  'htmlOptions'=>array(
      "rel"=>"tooltip" ,"title"=>"Your location here!",
      'class'=>'form-control', 'style' => 'width:236px;height:29px;',
     'placeholder'=>'Your location here!'
    )
			  )
		  ); ?>	  
			  
</span>			  
			  
<span class="input-group-btn">
	
	 <?php $this->widget('bootstrap.widgets.TbButton', array(
                              'buttonType' => 'ajaxSubmit',
			      'type' =>'custom',
                              'url' => array('/ad/location'),
                                            // 'icon' => 'ok', 
                              'label' => 'Search',
			      'htmlOptions'=>array("id"=>"search","class" => "btn btn-primary btn-large"),
			      ));?>
	
</span>

</div>
<?php $this->endWidget(); ?>

       