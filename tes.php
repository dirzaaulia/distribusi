<!DOCTYPE html>
<html>
<head>
	<title>Distribusi Barang</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="assets/js/jquery.js"></script>
  	<script src="assets/js/bootstrap.js"></script>
</head>
<body>
	<?php 

		$con=mysqli_connect("localhost","root","","distribusi");
		$sql="TRUNCATE TABLE temp";
		$hasil=mysqli_query($con,$sql);

	 ?>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<ul class="navbar-nav">
	    	<li class="nav-item active">
	      		<a class="nav-link" href="#">Active</a>
	    	</li>
	    	<li class="nav-item">
	      		<a class="nav-link" href="#">Link</a>
	    	</li>
	    	<li class="nav-item">
	      		<a class="nav-link" href="#">Link</a>
	    	</li>
	    	<li class="nav-item">
	      		<a class="nav-link disabled" href="#">Disabled</a>
	    	</li>
	  	</ul>
	</nav>
	<div class="container" style="margin-top: 5%">
		 <div class="row">
      		<div class="col">
      			<h1>Distribusi Barang</h1>
      		</div>
    	</div>
    	<div class="row">
    		<div class="col">
    			<span>Silahkan pilih lokasi minimarket tujuan pengiriman distribusi barang</span>
    		</div>
    	</div>
	</div>
	<div class="container" style="margin-top: 2%">
		<div class="row">
			<div class="col">
				<form class="form-horizontal" action="" method="POST">
					<div class="form-group">
						<input type="hidden" name="id1" id="id1" value="1">
						<label class="control-label col-sm-10" for="id2">Lokasi 1</label>
						<div class="col-sm-10">
							<select class="form-control" id="id2" name="id2">
								<option value="">Pilih Lokasi</option>
							 	<?php 
								 	$con=mysqli_connect("localhost","root","","distribusi");

									$sql="SELECT * FROM lokasi WHERE id BETWEEN 2 AND 11";
									$hasil=mysqli_query($con,$sql);

									while($list = mysqli_fetch_assoc($hasil)){

									    echo "<option value='" . $list['id'] . "'>" . $list['nama'] . " - " . $list['alamat'] . "</option>";
									}
							 	?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-10" for="id3">Lokasi 2</label>
						<div class="col-sm-10">
							<select class="form-control" id="id3" name="id3">
								<option value="">Pilih Lokasi</option>
							 	<?php 
								 	$con=mysqli_connect("localhost","root","","distribusi");

									$sql="SELECT * FROM lokasi WHERE id BETWEEN 2 AND 11";
									$hasil=mysqli_query($con,$sql);

									while($list = mysqli_fetch_assoc($hasil)){

									    echo "<option value='" . $list['id'] . "'>" . $list['nama'] . " - " . $list['alamat'] . "</option>";
									}
							 	?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-10" for="id4">Lokasi 3</label>
						<div class="col-sm-10">
							<select class="form-control" id="id4" name="id4">
								<option value="">Pilih Lokasi</option>
							 	<?php 
								 	$con=mysqli_connect("localhost","root","","distribusi");

									$sql="SELECT * FROM lokasi WHERE id BETWEEN 2 AND 11";
									$hasil=mysqli_query($con,$sql);

									while($list = mysqli_fetch_assoc($hasil)){

									    echo "<option value='" . $list['id'] . "'>" . $list['nama'] . " - " . $list['alamat'] . "</option>";
									}
							 	?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-10" for="id5">Lokasi 4</label>
						<div class="col-sm-10">
							<select class="form-control" id="id5" name="id5">
								<option value="">Pilih Lokasi</option>
							 	<?php 
								 	$con=mysqli_connect("localhost","root","","distribusi");

									$sql="SELECT * FROM lokasi WHERE id BETWEEN 2 AND 11";
									$hasil=mysqli_query($con,$sql);

									while($list = mysqli_fetch_assoc($hasil)){

									    echo "<option value='" . $list['id'] . "'>" . $list['nama'] . " - " . $list['alamat'] . "</option>";
									}
							 	?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-10" for="id6">Lokasi 5</label>
						<div class="col-sm-10">
							<select class="form-control" id="id6" name="id6">
								<option value="">Pilih Lokasi</option>
							 	<?php 
								 	$con=mysqli_connect("localhost","root","","distribusi");

									$sql="SELECT * FROM lokasi WHERE id BETWEEN 2 AND 11";
									$hasil=mysqli_query($con,$sql);

									while($list = mysqli_fetch_assoc($hasil)){

									    echo "<option value='" . $list['id'] . "'>" . $list['nama'] . " - " . $list['alamat'] . "</option>";
									}
							 	?>
							</select>
						</div>
					</div>
					<div class="form-group"> 
						<div class="col-sm-10">
							<button type="submit" class="btn btn-success" name="buttonSubmit">Tampilkan Rute</button>
						</div>
					</div>
				</form>
				<?php  

					
					if (isset($_POST['buttonSubmit'])) {

						$id1 = $_POST['id1'];
						$id2 = $_POST['id2'];
						$id3 = $_POST['id3'];
						$id4 = $_POST['id4'];
						$id5 = $_POST['id5'];
						$id6 = $_POST['id6'];

						$rute = array();
						array_push($rute, $id1);

						$jarakmin = array();

						$con=mysqli_connect("localhost","root","","distribusi");
						$sql ="INSERT INTO temp SELECT * FROM jarak WHERE id in ($id1,$id2,$id3,$id4,$id5,$id6)";
						$hasil=mysqli_query($con,$sql);

						for ($i = 0; $i < 6; $i++){

							if($i==5){

								$sql="SELECT MIN(lokasi$rute[$i]) FROM temp";
								$rows_count = mysqli_query($con,$sql); 
								$count = mysqli_fetch_array($rows_count);
								array_push($jarakmin, $count[0]);

								$sql="SELECT id FROM temp WHERE lokasi$rute[$i]=$count[0] LIMIT 1";
								$rows_count = mysqli_query($con,$sql); 
								$count = mysqli_fetch_array($rows_count);
								array_push($rute, $count[0]);
								
								for ($x = 1; $x < count($rute); $x++) {
								    
								    $sql="UPDATE temp SET lokasi$count[0]=NULL WHERE id='$rute[$x]'";
									$hasil=mysqli_query($con,$sql);
								}
							} else {

								
								$sql="SELECT MIN(lokasi$rute[$i]) FROM temp WHERE id in ($id2,$id3,$id4,$id5,$id6)";
								$rows_count = mysqli_query($con,$sql); 
								$count = mysqli_fetch_array($rows_count);
								array_push($jarakmin, $count[0]);

								$sql="SELECT id FROM temp WHERE lokasi$rute[$i]=$count[0] LIMIT 1";
								$rows_count = mysqli_query($con,$sql); 
								$count = mysqli_fetch_array($rows_count);
								array_push($rute, $count[0]);
								
								for ($x = 1; $x < count($rute); $x++) {
								    
								    $sql="UPDATE temp SET lokasi$count[0]=NULL WHERE id='$rute[$x]'";
									$hasil=mysqli_query($con,$sql);
								}
							}
						}
					}
				?>
			</div>
		</div>
		<div class="row">
			<?php 

				if (isset($_POST['buttonSubmit'])) {

					foreach ($rute as $value) {
					
						$sql="SELECT * FROM lokasi WHERE id='$value'";
						$rows_count = mysqli_query($con,$sql); 
						$count = mysqli_fetch_array($rows_count);
						echo nl2br($count[1] . " - " . $count[2] . "\n");
					}
				}
			 ?>
		</div>
	</div>
</body>
</html>