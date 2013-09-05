
<?php 
  $categs=Category::model()->findAll(array('condition'=>'root=:catID',
    'params'=>array(':catID'=>6),			
      //'order'=>'frequency DESC',
      //'limit'=>$this->maxLocs,
		));
  
//print_r($_GET);
//$loctn = $_GET['location'];		
?>  

<?php

$model_class = ucfirst($this->getId());  
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
         'id'=>'searchForm',
    'type'=>'search',
    'htmlOptions'=>array('class'=>'form-stacked','style'=>'margin-bottom:1px;'),
	'action'=>Yii::app()->createUrl('/search'),
	'method'=>'post',
)); ?>
<div id="earch-error-div" class="alert alert-block alert-error" style="display:none;"> </div>
    <?php echo CHtml::hiddenField('model_class','Profiles'); ?>

   
   <div class="row-fluid">
      
<?php $this->widget('catProvider',array('modelName' => 'Profiles','model'=>new Profiles()));?>
     
</div>
         <div class="row-fluid">
               
<label>PIN Code/Location  </label><br>
    
 
    <?php
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
     'name'=>'pcode',
     'source'=>$this->createUrl('/site/locLookup'), 
     'options'=>array(
            'showAnim'=>'fold',
            'minLength'=>'6',
            'select'=>"js:function(event, ui) {
			$('#label').val(ui.item.label);
			$('#location').val(ui.item.id);
			//$('#pcode').attr({disabled:'disabled'}).css({'background-color':'#d0d0d0'});
			//$('#location').removeClass('loading');

                      			}",
       'open'=>"js:function(event, ui) {  
                  // $('#pcode').attr({disabled:'disabled'}).css({'background-color':'#d0d0d0'});
                  }",
       'close'=>"js:function(event, ui) {  
                   //$('#location').attr({disabled:'disabled'}).css({'background-color':'#d0d0d0'});
                   //$('#pcode').removeAttr('disabled');
                   }",

       'search'=>"js:function(event, ui) {  
                   //$('#location').attr({disabled:'disabled'}).css({'background-color':'#d0d0d0'});
                  // $('#location').addClass('loading');
                   }",
    ),
    'htmlOptions'=>array(
      "rel"=>"tooltip" ,"title"=>"Your location here!",
    'class'=>'input-small','style' => 'width:48px;',
     'placeholder'=>'pincode here!'
    )
));

?>

<?php echo CHtml::textField("location",'',array('value'=>$loctn,'placeholder'=>'location here!','style'=>'width:168px;'));?>

</div>
        
  
<div class="row-fluid">

   <?php $this->widget('bootstrap.widgets.TbButton', array(
                                             'buttonType' => 'ajaxSubmit',
					     'type' =>'custom',
                                            'url' => array('/search'),
                                            // 'icon' => 'ok', 
                                             'label' => 'Search', 
                                              'htmlOptions'=>array("id"=>"search","class" => "btn btn-primary"),
                                             'ajaxOptions' => array(
                                                'beforeSend' => 'function() { 
                            $("#search").attr("disabled",true);
                         
                        }',
                   'complete' => 'function() { 
                       $("#searchForm").each(function(){
                         // this.reset();
			  
                        });
                            $("#search").attr("disabled",false);
                         
                        }',
		'success'=>'function(data){  
        var obj = jQuery.parseJSON(data);
	var $href = "";
	if("url" in obj){ // js:alert(obj["url"]);
	if(obj["location"])
	    $href = "/training-directory/" + obj["catitl"] + "/" + obj["category"] + "/" + obj["location"];
	else $href =  "/training-directory/" + obj["catitl"] + "/" + obj["category"] ;   
	window.location.href = $href;
	}else if("search" in obj){
	    $("#earch-error-div").html("<h6>Nothing selected!</h6>");
	    $("#earch-error-div").show();
	   
	   }
	}'
		 ),
)); ?>
            
   </div>

<?php $this->endWidget(); ?>
    
   
 