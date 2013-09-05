<div class="box">
   
        <div class="box_title"><h1>Find the best training providers in Hyderabad</h1></div>
         <div class="box_content">
	  <p>
		Find the top tutors and training businesses in Hyderabad under your fingertips at CaringTutors.
		We're committed to bringing you the best, most affordable and trustworthy training around!
                <span class="label label-warning">It is free!</span>
       
            
            
          </p>
	  <h3><?=Yii::t('home_page', 'Popular Searches')?></h3>
	   <?php  $this->widget('ext.eGoogleImages.EGoogleImages', array('q' => 'online trainers in hyderabad', 'size'=>8, 'safeSearch'=>true));?> 
                   
	 </div>
         
         <?php echo  CHtml::link('Browse >>',array('/profiles/list'),array('id'=>'cmp-list','class' => 'btn btn-info btn-large'));  ?>
                   
</div>
	 