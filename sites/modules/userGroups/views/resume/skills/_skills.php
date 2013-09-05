<tr>
<!--php

 $this->widget('bootstrap.widgets.BootBadge', array(
    'type'=>'success', // '', 'success', 'warning', 'error', 'info' or 'inverse'
    'label'=>'*',
)); -->

    <td>
        <!--echo $form->textField($model,"[$id]name",array()); -->
<?php $this->widget('CAutoComplete', array(
			'model'=>$model,
			'attribute'=>"[$id]name",
			'url'=>$this->createUrl('suggestTags'), 
			//'multiple'=>false,
			'htmlOptions'=>array('class'=>'input-large search-query','placeholder'=>'Type your skill'),
		)); ?>

        <?php echo $form->error($model,"name"); ?>
 
    </td>
      
    <td><!--php echo CHtml::link(
        '<i class="icon-remove"></i>Delete', 
        '#', 
        array(
            'submit'=>'', 
            'params'=>array(
                'Skills[command]'=>'delete', 
                'Skills[id]'=>$id, 
                'noValidate'=>true)
            ));-->
<?php echo CHtml::link(
                '<i class="icon-remove"></i>Delete', 
                '', 
                array(
                    //'class'=>'btn btn-small',
                    'onClick'=>'deleteSkill($(this))',  ));?>
    </td>
</tr>
