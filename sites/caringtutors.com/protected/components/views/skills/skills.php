
 
<?php  // $this->widget('EUniForm',array('theme' => 'aristo')); 
    $this->widget( 'ext.EChosen.EChosen' ); 
$form = $this->beginWidget('CActiveForm', array(
'id' => 'skills-post',
    // 'focus'=>array($profile,'title'),
                       
   
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
));  ?>


 
	
             <table id="skills" class="table table-bordered">
                 <thead>
                    <tr>
                         <th><?php echo Skills::model()->getAttributeLabel('name')?></th>
                         <th><!--php echo CHtml::link('add', '#', array('submit'=>'', 'params'=>array('Skills[command]'=>'add', 'noValidate'=>true)));-->
                             <?php echo CHtml::link('+ Add New', '', array('onClick'=>'addSkill($(this))', 'class'=>'add'));?>
                          </th>

                    </tr>
                 </thead>
                 <tbody>
                    <?php foreach($skillsManager->items as $id=>$skills):?>
                          <?php $this->render('skills/_skills', array('id'=>$id, 'model'=>$skills, 'form'=>$form));?>
                    <?php endforeach;?>
                </tbody>
           </table>
         <?php $this->render('skills/skillsJs', array('model'=>$skills, 'form'=>$form));?>
      

         <div class="form-actions">
             <?php echo CHtml::htmlButton('<i class="icon-ok icon-white"></i> Save Skills', array('class'=>'btn btn-primary', 'type'=>'submit')); ?>
         </div>
    
               
   <?php $this->endWidget(); ?>
 


