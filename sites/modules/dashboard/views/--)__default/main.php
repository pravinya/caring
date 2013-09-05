<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
     
       <?php
		// Suppress Yii's autoload of JQuery
		// We're loading it at bottom of page (best practice)
		// from Google's CDN with fallback to local version 
		Yii::app()->clientScript->scriptMap=array(
			'jquery.js'=>false,
		);
		
		// Load Yii's generated javascript at bottom of page
		// instead of the 'head', ensuring it loads after JQuery
		Yii::app()->getClientScript()->coreScriptPosition = CClientScript::POS_END;
	?>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
         
    </head>

    <body>

        <span id="stripe">&nbsp;</span>

        <div class="container">
            <div id="mainmenu">
                <?php
                $this->widget('bootstrap.widgets.TbNavbar', array(
                    'fixed' => false,
                    'brand' => 'Caringtutors.com',
                    'brandUrl' => Yii::app()->createAbsoluteUrl('/'),
                    'brandOptions' => array(
                        'id' => 'brand'
                    ),
                    'fluid' => true,
                    'collapse' => true,
                    'items' => array(
                        array(
                            'class' => 'bootstrap.widgets.TbMenu',
                            'items' => array(
                                array('label' => 'My Dashboard',
                                    'url' => array('/dashboard/dash/index'),
                                    'active' => Yii::app()->controller->id == 'dash'),
                                array('label' => 'Messages',
                                    'url' => array('/dashboard/message/index'),
                                    'active' => Yii::app()->controller->id == 'message'),
                                array('label' => 'My Ads',
                                    'url' => array('/dashboard/myads/index'),
                                    'active' => Yii::app()->controller->id== 'myads'),
                                array('label' => 'My Jobs',
                                    'url' => array('/dashboard/myjobs/index'),
                                    'active' => Yii::app()->controller->id == 'myjobs'),
                                /*array('label' => 'Users',
                                    'url' => array('/admin/default/demo4'),
                                    'active' => Yii::app()->controller->action->id == 'demo4'),*/
                            ),
                        ),
                      //  '<form class="navbar-search pull-right" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
                     CHtml::link('Post an Ad',array('/classifieds/ad/publish'),array('id'=>'ad-post','class' => 'btn btn-info btn-large')),   
                    // $this->widget('dashboard.components.widgets.loginProvider'),
                    
                        )
                ));
                ?>
               
       
                
                <div id="login-widget" class="pull-right">
                    <?php //$this->widget('dashboard.components.widgets.loginProvider');?>
                <?php  ?>    
                 
                  
                </div>
            </div><!-- mainmenu -->
            <div id="page">
                <?php if (isset($this->breadcrumbs)): ?>
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    ));
                    ?><!-- breadcrumbs -->
                <?php endif ?>

                <?php echo $content; ?>

                <div class="clear"></div>

                <div class="row">
                    <div class="span12" id="footer">
                        Copyright &copy; <?php echo date('Y'); ?> by <?php echo CHtml::encode(Yii::app()->name); ?>.<br/>
                        All Rights Reserved.<br/>
                    </div><!-- footer -->
                </div>
            </div><!-- page -->
        </div><!-- page -->
    <script>window.jQuery || document.write('<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/libs/jquery-1.7.2.min.js"><\/script>')</script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/script.js"></script>
 <?php  Yii::app()->getModule("dashboard")->getComponent("bootstrap")->registerCoreScripts();?>    

    </body>
</html>
