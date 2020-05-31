<?php 
try {
	
	$conexion = new PDO('mysql:host=localhost;dbname=prueba_datos', 'root', '');
	// echo "Conexion correcta";

	// Metodo Query (metodo desaconsejado)
	$resultados = $conexion->query("SELECT * FROM usuarios WHERE id = 2");
	foreach($resultados as $fila){
		echo $fila['nombre'] . "<br />";
	}


	//Prepared Statements
	$statement = $conexion->prepare("SELECT * FROM usuarios WHERE id = :id or :id2");
	$statement->execute(
		array(
			':id' => $id,
			':id2' => 5
		)
	);
	$resultados = $statement->fetchAll();
	foreach ($resultados as $usuario) {
		echo $fila['nombre'] . "<br />";
	}

} catch(PDOException $e){
	// Obtener errores
	echo "Error: " . $e->getMessage();
}

?>