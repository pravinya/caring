<tr>
<!--php

 $this->widget('bootstrap.widgets.BootBadge', array(
    'type'=>'success', // '', 'success', 'warning', 'error', 'info' or 'inverse'
    'label'=>'*',
)); -->

    <td>
    
        ----------
<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>$skills,
			'attribute'=>"[$id]name",
			'source'=>$this->createUrl('profiles/catLookup'), 
			//'multiple'=>false,
			'htmlOptions'=>array('class'=>'input-large search-query','placeholder'=>'Type your skill'),
		)); ?>

        <?php echo $form->error($skills,"name"); ?>
 
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
