

 
<?php 

$this->widget('zii.widgets.jui.CJuiTabs',array(
    'tabs'=>array(
        'Search by Category'=>array('id'=>'cat-search',
                             'content'=>$this->renderPartial(
                                '_catView',
                                 array('value'=>$value),TRUE)
                              ),
        'Search By Location'=>array('id'=>'loc-search',
                             'content'=>$this->renderPartial(
                                '_locView',
                                 array('value'=>$value),TRUE)
                              ),
        // panel 3 contains the content rendered by a partial view
      //  'AjaxTab'=>array('ajax'=>$ajaxUrl),
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
));


?>