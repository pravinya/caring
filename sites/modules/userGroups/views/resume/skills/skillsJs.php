<script type="text/javascript">
// initializiation of counters for new elements
var lastSkill=<?php echo $model->lastNew?>;
 
// the subviews rendered with placeholders
var trSkill=new String(<?php echo CJSON::encode($this->renderPartial('tutor/skills/_skills', array('id'=>'idRep', 'model'=>new Skills, 'form'=>$form), true));?>);
 
 
function addSkill(button)
{   var rowCount = $('#skills tr').length;
    var pVal = $("#Skills_" + "n0_name").val(); 
   if(pVal.length != 0){
   $("#Skills_" + "n0_name").val("");
    lastSkill = rowCount + 1;
    button.parents('table').children('tbody').prepend(trSkill.replace(/idRep/g,'n'+lastSkill));
     
   $("#Skills_" + "n" + lastSkill + "_name").val(pVal);
  /* $("#Skills_" + "n" + lastSkill + "_name").attr('disabled','disabled');*/
  }
      /*  $(/idRep/g,'n'+lastSkill).autocomplete({ 
        source: "catLookup", 
        minLength: 3 
    }); */
}
 
 
function deleteSkill(button)
{  
    button.parents('tr').detach();
}
 
$(document).ready(function() {
   var sId = $("#Skills_" + "n0_name");
   sId.parent("td").next("td").detach();
 });
</script>