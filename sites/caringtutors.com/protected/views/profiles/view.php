<div style="min-height:500px;">
 
 <div id="breadcrump" itemprop="breadcrumb">
        	  <?php $this->widget('application.components.BreadCategories'); ?>
  </div>
 <style> 
  .contactmodal {
                    
                    border-bottom-left-radius: 4px;
                    border-bottom-right-radius: 4px;
                    -webkit-border-bottom-left-radius: 4px;
                    -webkit-border-bottom-right-radius: 4px;
                    -moz-border-radius-bottomleft: 4px;
                    -moz-border-radius-bottomright: 4px;
                    background: #fff;
                    -webkit-box-shadow: 0 0 20px 5px rgba(0,0,0,.1);
                    box-shadow: 0 0 20px 5px rgba(0,0,0,.1);
                    border: 1px solid #e5e5e5;
                    z-index: 2000;
                    width: 450px;
                    display: none;
  }      
 </style>


                    <?php $cat =  Category::model()->findByPk($_GET['category']);
                //if(!empty($cat)) echo $cat->name; else 
                    ?>
<div style="width: 637px;border: 1px solid #CCC;border-radius: 3px 3px 3px 3px;float: left;">
<div class="box_title" style="font-weight:normal;">
			<h1 style="margin-bottom:0px;"><?php echo $this->pageTitle;?></h1>
		</div>
<div class="blank1" style="height:30px;clear:both;"></div>
<?php

//$geocode=file_get_contents($address);

$output= json_decode($geocode);


   $this->lat = $output->results[0]->geometry->location->lat;



   $this->lng = $output->results[0]->geometry->location->lng;

//echo $address;
$parser=new CHtmlPurifier(); //create instance of CHtmlPurifier
//$about=$parser->purify($model->about);

?>
  <div class="row"> 
        <div class="span12">
 
<?php $tags = Skills::model()->getCourseNames($model->id);
    foreach($tags as $tag){
        echo '<span>';
       $this->widget('bootstrap.widgets.TbLabel', array(
             'type'=>'success', // '', 'success', 'warning', 'important', 'info' or 'inverse'
             'label'=>$tag
              ));
echo '</span>';
}?>
    </div>
        </div>
 <?php $this->renderPartial('_view', array(
                        'profile'=>$model,
                        // 'about'=>$about,
                          'lat'=>$this->lat,
                          'lng'=>$this->lng
                          ));?>


<div id="TelcomsInfo"></div>
</div>

<div class="main-rt-newui4" style="float: left;width: 250px;float: left;margin-left: 20px;"> 
    <div class="blank1" style="height:30px;clear:both;"></div>
    <div class="blank1" style="height:30px;clear:both;"></div>
    
    <!--right box 1-->
    <div class="rtboxpopup" id="rtboxpopup" style="width: 200px;top: 226px;">
      <div class="replyico-newui4" style="background: url(/public/images/separator.gif) no-repeat scroll -1129px -191px transparent;
float: left;
height: 43px;
margin-left: -32px;
position: absolute;
width: 26px;"></div>
    
      <div class="blank8" style="clear: both;"></div>
      <div class="">
                  <?php //$this->widget('contactProvider'); ?>
              </div>
         <div class="blank4" style="height:15px;clear: both;"></div>
            <span class="adreply-infoline"> <span class="socialimgcallnow">  </span> <span class="callnow"></span></span>
      <div class="blank4"></div>
            
      
      <div class="blank4"></div>
      
       
          <div id="prevnext" class="prevnext">
     	<div id="prevAd" style="float:left"></div><div id="nextAd" style="float:right"></div>
     </div>	
          
	
    </div>
    


<div class="blank10"></div>
</div>
	
	    
 

 <div class="col-lg-12">
 

<div class="col-lg-4">
 <?php $this->widget('application.components.widgets.contactProvider');  ?>
</div>
<div class="col-lg-8">
   <?php //if(!Yii::app()->user->isGuest):?>

<div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'caringtutors'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>

<?php //endif;?>
         </div>
      </div>
</div>



<?php Layout::addBlock('sidebar.right', array(
    'id'=>'right_sidebar',
    'content'=>'the content you want to add to your layout', // eg the result of a partial or widget
    
   
        /*
$this->renderPartial('/partial/aspect_index_right', array(
        'aspects'=>$user->aspects,
        'controller'=>$this,
    ), true)
*/
)); ?>