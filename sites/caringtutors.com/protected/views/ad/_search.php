
<?php $categs=Category::model()->findAll(array('condition'=>'root=:catID',
      'params'=>array(':catID'=>6),			
      //'order'=>'frequency DESC',
      //'limit'=>$this->maxLocs,
		));
    
//print_r($_GET);
//$loctn = $_GET['location'];		
?>  

<?php
    $model_class = ucfirst($this->getId());
     $form=$this->beginWidget('CActiveForm', array(
    'id'=>'searchForm',
     'action'=>Yii::app()->createUrl('/search'),
    'enableAjaxValidation'=>false,
)); ?>

 
  <div id="earch-error-div" class="alert alert-block alert-error" style="display:none;"> </div>
    <?php echo CHtml::hiddenField('model_class','Ad'); ?>

   
   <div class="row-fluid">
      
<?php $this->widget('application.components.widgets.catProvider',array('modelName' => 'Ad','model'=>new Ad()));?>
     
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
	    $href = "/categories/" + obj["cattxt"] + "/" + obj["cid"] + "/" + obj["location"];
	else $href =  "/categories/" + obj["cattxt"] + "/" + obj["cid"];   
	window.location.href = $href;
	}else if("search" in obj){
	    $("#earch-error-div").html("<h6>Choose a Category!</h6>");
	    $("#earch-error-div").show();
	   
	   }
	}'
	 ),
)); ?>
            
   </div>

<?php $this->endWidget(); ?>
    

 