<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$this->view->pageTitle?></title>

<meta name="description" content="<?=$this->view->pageDescription?>" />
<meta name="keywords" content="<?=$this->view->pageKeywords?>" />
<meta name="robots" content="index , follow" />
<meta name="googlebot" content="noindex , nofollow" />
<meta name="rating" content="general" />
<link href="/public/css/home.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="/public/css/forms.css" />
<link rel="stylesheet" type="text/css" href="/public/css/droplinebar.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="/public/Kickstrap/apps/tooltip/css/tooltipster.css" />
<script type="text/javascript">window.jQuery || document.write('<script src="/public/js/jquery-1.7.2.min.js"><\/script>')</script>
<script id="appList" src="<?=Yii::app()->baseUrl; ?>/public/Kickstrap/apps/tooltip/js/jquery.tooltipster.min.js"></script>

<script>
        $(document).ready(function() {
           $('.element-input input[type="text"]').tooltipster({ 
        trigger: 'custom', // default is 'hover' which is no good here
        onlyOne: false,    // allow multiple tips to be open at a time
        position: 'right'  // display the tips to the right of the element
    });
        });
    </script>
</head>
<body style="height:auto;">
    <div id="container" style="width:950px;">

     <div id="header">  
    <div id="top_bar">
  <span style="float:right;">
    
 <?php $this->widget('application.extensions.addThis', array(
    'id'=>'addThis',
    'username'=>'purnachandra',
    'htmlOptions'=>array(
        'class'=>'addthis_default_style',
             ),
    'showServices'=>array(
        'tweet',
	'google_plusone'=>array(
	    'g:plusone:size'=>'medium',
            'g:plusone:annotation'=>'bubble',
        ),
        'facebook_like', ),
    'config'=>array(),
    'share'=>array(),
));
?> 

</span>
</div>   <!-- top bar -->  
     </div>  <!-- header -->
     
<p style="top: 13px;position: absolute;"><img src='/public/images/caringtut.jpg'/></p>
<div id="navigation">
 <div id="mydroplinemenu" class="droplinebar">
    <ul id="main-nav">
       
	<li></li>
	<li></li>
	<li></li>
        <li></li>    
    </ul>
</div>      

<?php if(Yii::app()->user->isGuest):?>
     

<?php endif;?>
</div> <!-- navigation  -->

<div class="header-top-right">
    <div class="top-login">
       <div class="home-login-midbg"> <?php $this->widget('application.components.widgets.loginProvider'); ?>
    </div>
  </div>
</div><!--  end of top right -->
 
<?php echo $content;?>

</div> <!-- container  -->
<div id="footer">
 <div class="footerwrap">
    <div id="footer-menu"></div>
    <div id="footer-flair">
        <a href=""...</a>
        <a href=""...</a>
    </div>
    <div id="copyright">caringtutors.com | Copyright © 2012 All rights reserved. </div>
 </div>
</div>


</body>
</html>
