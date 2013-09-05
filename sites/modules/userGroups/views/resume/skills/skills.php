 <div  id = "main" >
 
<?php if(Yii::app()->user->hasFlash('profile-post-success')): ?>
<div class="notice"><?php echo Yii::app()->user->getFlash('profile-post-success'); ?><br>
Your Company profile is successfully posted!. We will review your profile and publish your profile as soon as possible.
</div>

<?php else: ?>
     

    <div class="form">
        <?php $this->widget('EUniForm',array('theme' => 'aristo')); 
     
$form = $this->beginWidget('CActiveForm', array(
'id' => 'skills-post',
     'focus'=>array($skills,'name'),
                       
   
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
));  ?>


<?php $this->widget('menuSteps',array('event' => $event,'title'=>'Please specify your training skill details'));?>
	<?php //echo CHtml::errorSummary($skills); ?>
<fieldset>
             <table id="skills" class="">
                 <thead>
                    <tr>
                         <th><?php echo Skills::model()->getAttributeLabel('name')?></th>
                         <th><!--php echo CHtml::link('add', '#', array('submit'=>'', 'params'=>array('Skills[command]'=>'add', 'noValidate'=>true)));-->
                             <?php echo CHtml::link('<i class="icon-plus"></i> Add New', '', array('onClick'=>'addSkill($(this))', 'class'=>'add'));?>
                          </th>

                    </tr>
                 </thead>
                 <tbody>
                    <?php foreach($skillsManager->items as $id=>$skills):?>
                          <?php $this->renderPartial('tutor/skills/_skills', array('id'=>$id, 'model'=>$skills, 'form'=>$form));?>
                    <?php endforeach;?>
                </tbody>
           </table>
         <?php $this->renderPartial('tutor/skills/skillsJs', array('model'=>$skills, 'form'=>$form));?>
      

         <div class="form-actions">
             <?php echo CHtml::htmlButton('<i class="icon-ok icon-white"></i> Save Skills', array('class'=>'btn btn-primary', 'type'=>'submit')); ?>
         </div>
      
</fieldset>
   <?php $this->endWidget(); ?>
      
</div>
   
 <?php endif;?>
</div>

