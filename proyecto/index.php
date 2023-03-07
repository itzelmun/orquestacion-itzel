<?php
	

	$con = mysqli_connect('mysql-service-itzel:3306','root','itzel');
	
	if (isset($con)) {
		
		echo 'Conectado2'.'<br/>';

		mysqli_select_db($con,'pruebacurso');

		$query = 'select * from pruebacurso';
		
		$result = mysqli_query($con,$query);
		
		if($result) {
			while($row = mysqli_fetch_array($result)){
				$name = $row["col"];
				echo $name." ";
			}
		}

		return;
	}

	echo 'Sin conexión';

?>
