<?php	Yii::import('ext.LocationPicker.Location');
	
		//$location = new Location();
		$this->widget (
			'ext.LocationPicker.LocationWidget',
			array (
				'model' => $model,
				'longitudeAttribute' => 'lng',
				'latitudeAttribute' => 'lat',
				'locationAttribute' => 'location',
				'map_key' => 'AIzaSyDUPhG1gc0pREJzCzAhrBhqVtJK1enVbWk',
		        )
		);
        ?>
	
	<script type="text/javascript">
		
		$("#location_ok").click(function(){
			var ok_address;
			var ok_address_lat;  // = $("#Ad_lat").val().trim();
			ok_address = $("#Ad_location").val().trim();
			ok_address_lat = $("#Ad_lat").val().trim();
	                //var doc = window.frames[0].contentDocument;
	                //doc.body.style.backgroundColor = 'green';
			if(ok_address && ok_address_lat){  
				window.parent.$("#Ad_ad_address").val(ok_address);
				window.parent.$("#Ad_ad_lat").val(ok_address_lat);				  
				parent.jQuery.fancybox.close();
			}
		});
		
		
	</script>	
		