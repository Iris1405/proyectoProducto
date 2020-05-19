<?php 

	

$con=mysqli_init(); mysqli_real_connect($con, "servidor-productos2020.mysql.database.azure.com", "adminBD@servidor-productos2020", "IdJDC16051775", "productos", 3306);

//Establishes the connection


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>mostrar productos</title>
</head>
<body style="background-color:#FFFBC3 ";>



<h1 style="text-align:center; color:#000000; FONT-SIZE: 60pt; font-weight: bolder; background-color:#FFFFFF ">Registro de Productos</h1>


<div style="float:center; margin: 30px 100px  200px">
<form action="index.php" method="post">

<input type="text" name="nombreProducto" placeholder="Nombre del producto" style="FONT-SIZE:20pt;">
<br>
<br>
<input type="text" name="marca" placeholder="Marca"  style="FONT-SIZE:20pt;">
<br>
<br>
 <input type="text" name="color" placeholder="Color" style="FONT-SIZE:20pt;">
<br>
<br>
<input type="number" step="any" name="precio" placeholder="Precio" style="FONT-SIZE:20pt;">
<br>
<br>
<input type="submit" value="Añadir registro" name="agregarRegistro" size="70" >
<input type="reset" value="Limpiar Formulario" size="70">
</form>


</div>

<div style="float:center; margin: -130px 100px  200px">
<?php
if(isset($_POST['agregarRegistro'])){
if(strlen($_POST['nombreProducto'])>= 1 && strlen($_POST['marca'])>= 1 && strlen($_POST['color'])>= 1 && strlen($_POST['precio'])>= 1){
	   $nombre=trim($_POST['nombreProducto']);
	   $marca=trim($_POST['marca']);
	   $color=trim($_POST['color']);
	   $precio=trim($_POST['precio']);
	   
	   $sql="INSERT INTO products(ProductName,marca,Color,Price) VALUES('$nombre','$marca','$color','$precio')";
	   $res=mysqli_query($con,$sql);
	   if($res){
		   ?>
		   <h3 class="ok"> Registro insertado </h3>
		   <?php
	   }else{
		   ?>
		    <h3>Ha ocurrido un error</h3>
			<?php
	   }
   }else{
	   ?>
	    <h3>Complete todos los cambios</h3>
		<?php
}

}
?>
</div>


<div style="float:center; margin: -550px 700px  200px" >

	<table border="1"  WIDTH="500">
		<tr style="FONT-SIZE: 17pt; background-color:#E7FFC3 ">
			<td >id</td>
			<td >nombre producto</td>
			<td>marca</td>
			<td>color</td>
			<td >precio</td>	
		</tr>

		<?php 
		$sql="SELECT * from products";
		$result=mysqli_query($con,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr style="FONT-SIZE:12 pt; background-color:#FFFFFF ">
			<td><?php echo $mostrar['Id'] ?></td>
			<td><?php echo $mostrar['ProductName'] ?></td>
			<td><?php echo $mostrar['marca'] ?></td>
			<td ><?php echo $mostrar['Color'] ?></td>
			<td><?php echo $mostrar['Price'] ?></td>
		
		</tr>
	<?php 
	}
	 ?>
	</table>
	</div>

</body>
</html>