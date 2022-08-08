		<?php 
		$conn = new mysqli("localhost", "root","", "food_crib");
		if($conn->connect_error){
		die("Connection Failed".$conn->connect_error);
		}
		?>