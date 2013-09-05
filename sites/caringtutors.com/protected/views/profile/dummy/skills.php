<?php $form=$this->beginWidget('BootActiveForm',array('id'=>'skills-post',
                        'focus'=>array($skills,'name'),
                         'type'=>'horizontal',
   // 'errorMessageType'=>'block', // how to display errors, inline or block?
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
                              // 'clientOptions'=>array('onValueChange'=>true,'inputContainer'=>'p','errorCssClass'=>'error'),
                                )); ?>
<fieldset>

    <legend>Add Your Skills</legend>


<br clear="all">

<table id="skills">
<thead>
<tr>
    <th><?php echo Skills::model()->getAttributeLabel('name')?></th>
 <th><!--php echo CHtml::link('add', '#', array('submit'=>'', 'params'=>array('Skills[command]'=>'add', 'noValidate'=>true)));-->

<?php echo CHtml::link('add', '', array('onClick'=>'addSkill($(this))', 'class'=>'add'));?>
</th>

       </tr>
</thead>
<tbody>
    <?php foreach($skillsManager->items as $id=>$skills):?>
        <?php $this->renderPartial('_update', array('id'=>$id, 'skills'=>$skills, 'form'=>$form));?>
    <?php endforeach;?>
    </tbody>
 
 
</table>
<?php $this->renderPartial('skillsJs', array('skills'=>$skills, 'form'=>$form,'num'=>$num-1));?>
</fieldset>

<div class="form-actions">
    <?php echo CHtml::htmlButton('<i class="icon-ok icon-white"></i> Save Skills', array('class'=>'btn btn-primary', 'type'=>'submit')); ?>
    
</div>
      
                 

				<?php $this->endWidget(); ?>
