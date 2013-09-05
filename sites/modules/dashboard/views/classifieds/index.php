<span><?php echo CHtml::link('Post an Ad',array('/classifieds'),array('id'=>'ad-post','class' => 'btn btn-primary btn-large')); ?></span> 


<div style="display:none;">              
	<?php
	$this->widget('application.components.widgets.EFancyBox', array(
    'target'=>'#ad-post',
    'config'=>array(
	   'title'   => 'Post your classified ad',
        
	'width' => '67%',
        'height' => '54%',
        'enableEscapeButton' => false,
        'overlayShow' => true,
        'overlayOpacity' => 0,
        'hideOnOverlayClick' => false,
       
	'type'          => 'iframe',
          'onClosed'      =>  'function(){alert("are you sure?");parent.location.reload(true);}',
        'afterClose'=> 'function () {
            window.location.reload();
        }',
        'helpers' => '{  overlay : {closeClick: false}}'
           ),
        ));  ?>
                    
                
</div>             