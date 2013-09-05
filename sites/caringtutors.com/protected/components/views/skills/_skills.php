<tr>


    <td>
        <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>$model,
			'attribute'=>"[$id]name",
			'sourceUrl'=>CController::createUrl('site/tagLookup'), 
			//'multiple'=>false,
			'htmlOptions'=>array('class'=>'input-large search-query','placeholder'=>'Type your skill',
                            'title' => 'Please type your training specialization here!'),
		)); ?>

<?php /*$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>$model,
			'attribute'=>"[$id]name",
			'source'=>$this->createUrl('suggestTags'), 
			//'multiple'=>false,
			'htmlOptions'=>array('class'=>'input-large search-query','placeholder'=>'Type your skill'),
		)); */?>

        <?php echo CHtml::error($model,"name"); ?>
 
    </td>
      
    <td>
<?php echo CHtml::link(
                '<i class="icon-remove"></i>Delete', 
                '', 
                array(
                    //'class'=>'btn btn-small',
                    'onClick'=>'deleteSkill($(this))',  ));?>
    </td>
</tr>
