<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_path')); ?>:</b>
	<?php echo CHtml::encode($data->image_path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_name')); ?>:</b>
	<?php echo CHtml::encode($data->image_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_width')); ?>:</b>
	<?php echo CHtml::encode($data->image_width); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_height')); ?>:</b>
	<?php echo CHtml::encode($data->image_height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alt_tag_text')); ?>:</b>
	<?php echo CHtml::encode($data->alt_tag_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('part_number')); ?>:</b>
	<?php echo CHtml::encode($data->part_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('upc_code')); ?>:</b>
	<?php echo CHtml::encode($data->upc_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('upld_by_person')); ?>:</b>
	<?php echo CHtml::encode($data->upld_by_person); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('upld_by_dept')); ?>:</b>
	<?php echo CHtml::encode($data->upld_by_dept); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('upld_on')); ?>:</b>
	<?php echo CHtml::encode($data->upld_on); ?>
	<br />

	*/ ?>

</div>