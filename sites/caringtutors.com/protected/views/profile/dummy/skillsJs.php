<script type="text/javascript">
// initializiation of counters for new elements
var lastSkill=<?php echo $num; ?>  //$model->lastNew?>;
 
// the subviews rendered with placeholders
var trSkill=new String(<?php echo CJSON::encode($this->renderPartial('_update', array('id'=>'idRep', 'skills'=>new Skills, 'form'=>$form), true));?>);
 
 
function addSkill(button)
{
    lastSkill++;
    button.parents('table').children('tbody').append(trSkill.replace(/idRep/g,'n'+lastSkill));
}
 
 
function deleteSkill(button)
{
    button.parents('tr').detach();
}
 
</script>