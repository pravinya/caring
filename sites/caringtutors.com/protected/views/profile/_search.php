
<div id="search" style="padding-left:10px;">
<?php 
  $categs=Category::model()->findAll(array('condition'=>'root=:catID',
    'params'=>array(':catID'=>6),			
      //'order'=>'frequency DESC',
      //'limit'=>$this->maxLocs,
		));
  $locations=Locations::model()->findAll(array(
			//'order'=>'frequency DESC',
			//'limit'=>$this->maxLocs,
		));
//print_r($_GET);
//$loctn = $_GET['location'];		
?>  

<?php

$model_class = ucfirst($this->getId());  
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
         'id'=>'searchForm',
    'type'=>'search',
    'htmlOptions'=>array('style'=>'margin-bottom:1px;'),
	'action'=>Yii::app()->createUrl('/search'),
	'method'=>'post',
)); ?>
<?php $this->widget('ext.EChosen.EChosen');?>
    <?php echo CHtml::hiddenField('model_class','Profile'); ?>
<table class="table-stripped table-centered">
 <tr>   <td>


<label>PIN Code/Location  </label>
     </td></tr>
 <tr><td>
    <?php
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
     'name'=>'pcode',
     'source'=>$this->createUrl('profile/locLookup'), 
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
    'class'=>'input-small','style' => 'width:48px;',
     'placeholder'=>'pincode here!'
    )
));

?>

<?php echo CHtml::textField("location",'',array('value'=>$loctn,'class'=>'span4','placeholder'=>'location here!','style'=>'width:190px;'));?>



     </td></tr>
<tr><td>
<?php $this->widget('catProvider',array('modelName' => 'Profile','model'=>new Profile()));?>
    </td></tr>
<tr><td class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', 
            array('buttonType'=>'submit',
                'icon'=>'search','label'=>'Search','type'=>'inverse')
  ); ?>	
    </td></tr>
</table>
<?php $this->endWidget(); ?>


</div>