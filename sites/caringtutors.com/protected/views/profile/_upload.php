<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'upload-form','action'=>array('/profile/load'),
    'htmlOptions'=>array('class'=>'well','enctype'=>'multipart/form-data'),
)); ?>
<?php echo CHtml::activeFileField($model,'image',array('name'=>'immagine')); ?>
<?php echo CHtml::activeTextField($model,'uploadfilename'); ?>
<?php echo CHtml::htmlButton('<i class="icon-ok"></i> Load Photo', array('class'=>'btn', 'type'=>'submit')); ?>

 <?php $this->endWidget(); ?>
