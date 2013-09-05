<tr>
     <td>
          <?php echo $form->textField($model, "[$id]cv_id"); ?>
     </td>
     <td>
          <?php echo $form->textField($model, "[$id]name"); ?>
     </td>
     <td>
          <?php echo CHtml::link('Delete', '#', array('onClick' => 'deleteStudent($(this));return false;')); ?>
     </td>
</tr>
