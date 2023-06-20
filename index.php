<?php include("aplicacionphp/conexion.php")?>
<?php include("aplicacionphp/includes/header.php") ?>
			
<div class="container p-4">
	<div class="row">
		<div class="col-md-4">
			<?php if(isset($_SESSION['message'])){ ?>

<div class="alert alert-<?= $_SESSION['message_type'];  ?> alert-dismissible fade show" role="alert">
	<?=$_SESSION["message"]?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
			  
			<?php session_unset(); } ?>
			<div class="card card-body">
				<form action="aplicacionphp/includes/guardar.php" method="POST">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Nombre">
					</div>
					<div class="form-group">
						<input type="text" name="phone" class="form-control" placeholder="Telefono">
					</div>
					<div class="form-group">
						<input type="date" name="date" class="form-control" placeholder="Fecha">
					</div>
					<div class="form-group">
						<input type="text" name="address" class="form-control" placeholder="Dirección">
					</div>
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Correo">
					</div>
					<input type="submit" value="Guardar" class="btn btn-success btn-block" name="Guardar">
				</form>
			</div>
		</div>
		<div class="col-md-8"> 
			<table class="table table-bordered"> 
				<thead> 
					<tr >
						
						<th onclick="">Nombre</th>
						<th>Telefono</th>
						<th>Fecha de Nacimiento</th>
						<th>Dirección</th>
						<th>Correo</th>
						<th>Edad </th>
						<th>Acciones</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$DateAndTime = time();
					$DateAndTime = idate('Y', $DateAndTime);
					echo "The current year are $DateAndTime.";
					$query="SELECT * FROM CONTACTOS ORDER BY name";
					$resulta= mysqli_query($conn,$query);
					while($row = mysqli_fetch_array($resulta)){?>
				<tr>
					 <td> <?php echo $row["name"];?> </td>
					 <td> <?php echo $row["phone"];?> </td>
					 <td> <?php echo $row["date"];?> </td>
					 <td> <?php echo $row["address"];?> </td>
					 <td> <?php echo $row["email"];?> </td>
					 <td> <?php 
					 	$timestamp = date("Y", strtotime($row["date"]));
						echo $DateAndTime-$timestamp;
						?> 
					 </td>
					 <td> <a href="aplicacionphp/includes/edit.php?id=<?php echo $row["id"] ?>"> Editar</a>
					 <br>
					 <a href="aplicacionphp/includes/delete.php?id=<?php echo $row["id"] ?>">Eliminar</a>
					</td>
				</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include("aplicacionphp/includes/footer.php") ?>
	

