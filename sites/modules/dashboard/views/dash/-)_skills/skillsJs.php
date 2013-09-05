<script type="text/javascript">
    // initializiation of counters for new elements
    var lastSkill=<?php echo $skillsManager->lastNew ?>;

    // the subviews rendered with placeholders
    var trSkill=new String(<?php echo CJSON::encode($this->renderPartial('skills/_skills',
                                array('id' => 'idRep', 'model' => new VSkills, 'form' => $form, 'this' => $this), true, false)); ?>);


    function addSkill(button)
    {
        lastSkill++;
        button.parents('table').children('tbody').append(trSkill.replace(/idRep/g,'n'+lastStudent));
    }


    function deleteSkill(button)
    {
        button.parents('tr').detach();
    }

</script>