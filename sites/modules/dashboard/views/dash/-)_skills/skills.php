<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tutor-skill-form',
        'enableAjaxValidation' => false,
            ));
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <table id="skills">
        <thead>
            <tr>
                <td>
                    ID
                </td>
                <td>
                    Name
                </td>
                <td>
                    <?php echo CHtml::link('Add', '#', array('onClick' => 'addSkill($(this));return false;')); ?>
                </td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($skillsManager->items as $id => $model) {
                $this->renderPartial('skills/_skills', array('id' => $id, 'model' => $model, 'form' => $form, 'this' => $this),false,true);
            }
            ?>
        </tbody>
    </table>

    <?php $this->renderPartial('skills/skillsJs', array('skillsManager' => $skillsManager, 'form' => $form, 'this' => $this),false,true); ?>
    <?php echo CHtml::submitButton($classroom->isNewRecord ? 'Create' : 'Save'); ?>
<?php $this->endWidget(); ?>

</div><!-- form -->
