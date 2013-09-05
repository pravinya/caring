<!doctype html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
<?php Yii::app()->controller->widget('ext.seo.widgets.SeoHead',array(
  
    'httpEquivs'=>array('Content-Type'=>'text/html;  charset=utf-8','Content-Language'=>'en-US' ),
    'defaultDescription'=>'Post free training classified ad on caringtutors.com, IT, management & language training classified ads, skilled online home tutors, trainer jobs',
    'defaultKeywords'=>'training classified ads, it management training, tutors, language trainers, competitive exams training ',
)); ?>


<meta name="msvalidate.01" content="2E2CB83026CAECEC85719CABA07D2248" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="author" content=""/>
<?php Yii::app()->clientScript->scriptMap=array('jquery.js'=>false );?>
<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="<?=Yii::app()->baseUrl; ?>/public/css/bootstrap-and-responsive.min.css" />
<link rel="stylesheet" type="text/css" href="<?=Yii::app()->baseUrl; ?>/public/css/common.css" />
<link rel="stylesheet" type="text/css" href="/public/css/forms.css" />
<link rel="stylesheet/less" type="text/css" href="<?=Yii::app()->baseUrl; ?>/public/kickstrap.less">

<script src="<?=Yii::app()->baseUrl; ?>/public/Kickstrap/js/less-1.3.3.min.js"></script>


<style>
 .navbar-inner{
	background: none;
	filter : none;
	border: none;
	box-shadow: none;
	
	background-color: #3D3814;
	
	padding-top: 10px;
	padding-bottom: 10px;
}

.navbar .nav > li > a{
	color: #fff;
	text-shadow: none;
}

.navbar .nav > li > a:hover{
	color: #666;
}

.navbar .nav .active > a{
	color: #666;
	background: none;
}

.navbar .nav .active > a:hover{
	background: none;
}

.navbar .divider-vertical{
	border-left: 1px solid #1c2022;
	border-right: 1px solid #3e4a4e;
}
.js-masonry {
 /* background: #EEE;*/
  max-width: 980px;
}

.js-masonry .panel-info{
  width:  235px;
  height: auto;
  float: left;
  /*background: #D26;*/
  border: 2px solid #333;
  border-color: hsla(0, 0%, 0%, 0.5);
  border-radius: 5px;
}
.letterP3 {    
  -webkit-transform: rotate(90deg); 
     -moz-transform: rotate(90deg); 
      -ms-transform: rotate(90deg); 
       -o-transform: rotate(90deg); 
          transform: rotate(90deg);
            color: #000;
                      
            height: 200px;
            width: 200px;
         /*   float: left;   */     
    vertical-align:top;    
}
.panel-info.w2 { width:  120px; }
.panel-info.w3 { width:  180px; }
.panel-info.w4 { width:  240px; }

.panel-info.h2 { height: 100px; }
.panel-info.h3 { height: 130px; }
.panel-info.h4 { height: 180px; }

</style>

</head>
<body class="body-jobsearch-browse Main au backgroundPositionTuned" >
<div class="site-wrapper group">
<div class="header group">
    
    <div class="row-fluid"><!-- amazon ad here -->
<script type="text/javascript" language="javascript">
var aax_size= '728x90'; var aax_pubname = 'caringtutorsc-21'; var aax_src='302';
</script>
<script type="text/javascript" language="javascript" src="http://c.amazon-adsystem.com/aax2/assoc.js"> </script>

</div>
    
      <ul style="width:60%;float:left;"><li><?php $this->widget('ext.yii-facebook-opengraph.plugins.LikeButton', array( 'show_faces'=>true, 'send' => true )); ?></li>
      
      </ul>
      <ul style="float:right;"><li><?php $this->widget('application.components.widgets.loginProvider'); ?></li></ul>
	
       
       	
      
       <div class="topMenu clearfix">
       <a id="brand" href="/" class="brand"><img title="CaringTutors - training business and tutor listings in Hyderabad" src="/public/images/caringtut.jpg" alt="caringtutors.com- training business listings in Hyderabad"></a>
       <span class="label label-warning"><i>BETA</i></span>
           <?php
                $this->widget('bootstrap.widgets.TbNavbar', array(
		     'type'=>'null', // null or 'inverse'
                    'fixed' => false,
                    'brand' => '',
                  //  'brandUrl' => Yii::app()->createAbsoluteUrl('/'),
                    'brandOptions' => array(
                        'id' => 'brand'
                    ),
                  //  'fluid' => true,
                   // 'collapse' => true,
                    'items' => array(
                        array(
                            'class' => 'bootstrap.widgets.TbMenu',
                            'items' => array(
                             
                                array(
				    'label' => 'Classifieds',
                                    'url' => array('/ad/default'),
                                    'active' => Yii::app()->controller->id == 'ad'),
                                array('label' => 'Directory',
                                    'url' => array('/training'),
                                    'active' => Yii::app()->controller->id== 'profiles'),
				 array('label' => 'Tutors',
                                    'url' => array('/trainers'),
                                    'active' => Yii::app()->controller->id== 'profile'),
				 array('label' => 'My Account',
                                    'url' => array('/dashboard/public'),
                                    'active' => Yii::app()->controller->id== 'public',
				     'linkOptions' => array( 'target' => '_blank'   )),
                                array('label' => 'Contact',
				       'url' => array('/site/contact'))
                            ),
			    
                        ),
                      // '<form class="navbar-search pull-right" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
                     CHtml::link('Post an Ad',array('/dashboard/classifieds'),array('id'=>'ad-post','class' => 'btn btn-info btn-large')),   
                   
                        )
                ));
                ?>
           
    
       </div>
</div>  <!-- header group -->
    
   
    <?php  $is_cadd = $this->getId() == "ad" ;
 
	    $title = $is_cadd ? $_GET["cattxt"] : $_GET["catitl"];
	    $tmp_str = $is_cadd ? "training Classified Ads" : "training";
	    $loc = "near ".(!empty($_GET["location"])? $_GET["location"]: "Hyderabad Secunderabad");
	     
	    $this->pageTitle = $title." ".$tmp_str." ".$loc;
		     // echo $this->getId();
    ?>
 

 
<h3 style="margin-bottom:0px;"><?php echo $this->pageTitle;?></h3>

                  <?php
                    if(Layout::hasRegions('sidebar.left','sidebar.right'))
                    {
                        $tagClass = ' class="sidebars clearfix"';
                    }else if(Layout::hasRegions('sidebar.left'))
                    {
                        $tagClass = 'col-lg-7';
                    }else if(Layout::hasRegions('sidebar.right'))
                    {
                        $tagClass = 'col-lg-10';
                    }else{
                        $tagClass = 'col-lg-10';
                    }
                    ?>
<?php if(Layout::hasRegion('sidebar.left')): ?>
<div class="col-lg-4">
<div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Search </h3>
              </div>
         <?php //$this->widget('application.components.widgets.contactProvider');
$filtersForm = new FiltersForm();
$this->renderPartial('_search'); ?>
        
     
</div>     
 

<div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Quick Navigation</h3>
              </div>
              <ul><li><a class="selected" href="/">Home</a></li>
                  <li><a href="/dashboard/classifieds">Post free Ad</a></li>
              </ul>
</div>    

	      
<div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Advertise Here!</h3>
              </div>
              <p>Advertise your business in <br><?php echo $this->pageTitle;?></p>
              <p><img src="http://placehold.it/260&text= Advertise Here!"/></p>
</div>

</div>
<?php endif; ?>


<div class="<?php echo $tagClass;?>">


   
                <!-- widget categories  -->
    <h3 id="omchat_page_header_text" class="panel-title">
    <?php
        $this->widget('application.extensions.addThis', array(
            'id'=>'addThis',
            'username'=>'purnachandra',
            'htmlOptions'=>array(
                'class'=>'addthis_default_style',
            ),
            'showServices'=>array(
                   'tweet',
                   'google_plusone'=>array(
                   'g:plusone:size'=>'large',
                   'g:plusone:annotation'=>'bubble',
                    ),
                 // 'facebook_like',
            ),
            'config'=>array(),
            'share'=>array(),
         ));
    ?>
    </h3>
 
      <?php echo $content ?>
 	
</div>  <!--  span12 -->
   
 <?php if(Layout::hasRegion('sidebar.right')): ?>
<div class="col-lg-2">
    
<?php $this->widget('application.components.widgets.LocationWidget'); ?>
<SCRIPT charset="utf-8" type="text/javascript" src="http://ws-in.amazon-adsystem.com/widgets/q?rt=tf_cw&ServiceVersion=20070822&MarketPlace=IN&ID=V20070822%2FIN%2Fcaringtutorsc-21%2F8010%2Fb6f4ac33-ee6c-478c-95db-32cb65698d21&Operation=GetScriptTemplate"> </SCRIPT> <NOSCRIPT><A HREF="http://ws-in.amazon-adsystem.com/widgets/q?rt=tf_cw&ServiceVersion=20070822&MarketPlace=IN&ID=V20070822%2FIN%2Fcaringtutorsc-21%2F8010%2Fb6f4ac33-ee6c-478c-95db-32cb65698d21&Operation=NoScript">Amazon.in Widgets</A></NOSCRIPT>
       <?php //$this->widget('application.components.widgets.contactProvider');  ?>
    </div>
<?php endif; ?>
   <div class="clear"></div>
<div class="footer group clearfix">
       <div class="left">
	   <div class="column">
        	<h3>More Info</h3>
		 <ul><li><?php echo CHtml::link('Contact CaringTutors',array('site/contact'));?></li>
                     <li><a href="advertise.html">Advertise</a></li>
                     <li><a href="/">Top Searches</a></li>
                     <li><a href="/">Resources</a></li>
                     <li><a href="/">Site Map</a></li>
		     <li><?php //echo print_r($_GET); ?></li>
                 </ul>
	   </div>	
       </div>
       <div class="right">
	  <p class="copyright">Copyright &copy; 2012 caringtutors.com. All rights reserved.</p>
	  <a class="terms" href="/">Terms of Use</a>	
          <a class="rss" href="/"></a>	
       </div>
</div> <!--  footer group clearfix  -->
 
</div>  <!--  wrapper -->
<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

<script type="text/javascript">
   var _gaq = _gaq || [];
   _gaq.push(['_setAccount', 'UA-33826803-1']);
   _gaq.push(['_trackPageview']);
   (function(){
          var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>

<script>window.jQuery || document.write('<script src="<?=Yii::app()->baseUrl; ?>/public/js/jquery-1.7.2.min.js"><\/script>')</script>
<script id="appList" src="<?=Yii::app()->baseUrl; ?>/public/Kickstrap/js/kickstrap.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/public/js/modernizr-2.5.3-respond-1.1.0.min.js"></script>
<script type="text/javascript" src="<?php Yii::app()->baseUrl; ?>/public/js/masonry.pkgd.min.js"></script>	
<script type="text/javascript">
$(document).ready(function() {

	// Initialize Masonry
	$('#cat-blocks').masonry({
		columnWidth: 80,
		itemSelector: '.panel-info',
		isFitWidth: true,
		isAnimated: !Modernizr.csstransitions
	})
	});


</script>
</body>
</html>