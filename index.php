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
	<nav class="navbar navbar-dark bg-dark">
  		<span class="navbar-brand mb-0 h1">Distribusi Barang Minimarket</span>
	</nav>
	<div class="container" style="margin-top: 2%">
		<form action="" method="POST">
			<div class="form-group">
				<input type="hidden" name="lokasiawal" id="lokasiawal" value="1">
				<label class="control-label col-sm-10" for="lokasi">Silahkan pilih lokasi minimarket tujuan pengiriman distribusi barang</label>
				<select multiple class="form-control" id="lokasi" name="lokasi[]" size="10" required="true">
					<option value="">Pilih Lokasi</option>
				 	<?php 
					 	$con=mysqli_connect("localhost","root","","distribusi");
						$sql="SELECT * FROM lokasi WHERE id BETWEEN 2 AND 11";
						$hasil=mysqli_query($con,$sql);
						$row=mysqli_fetch_row($hasil);

						do
						{
							list($id,$nama,$nohp)=$row;
							
							echo "<option value='" . $row[0] . "'>" . $row[1] . " - ". $row[2] ."</option>";
						}
						while($row=mysqli_fetch_row($hasil));
					 ?>
				</select>
			</div>
			<div class="form-group"> 
				<div class="col-sm-10">
					<button type="submit" class="btn btn-success" name="buttonSubmit">Tampilkan Rute</button>
				</div>
			</div>
		</form>
		<?php  

			if (isset($_POST['buttonSubmit'])) {

				if(isset($_POST["lokasi"])){

					$jumlahlokasi = count($_POST['lokasi']);
					
					$lokasi = array();
					array_push($lokasi, 1);
					foreach ($_POST['lokasi'] as $idlokasi){

	        		 	array_push($lokasi, $idlokasi);

	        		 }
	        		 $listLokasi = implode(",", $lokasi);
				}

				$rute = array();
				array_push($rute, $_POST['lokasiawal']);

				$jarakmin = array();

				foreach ($lokasi as $value) {
				
					$con=mysqli_connect("localhost","root","","distribusi");
					$sql ="INSERT INTO temp SELECT * FROM jarak WHERE id='$value'";
					$hasil=mysqli_query($con,$sql);
				}

				for ($i = 0; $i < count($lokasi); $i++){

					if($i==(count($lokasi))-1){

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

			
						$sql="SELECT MIN(lokasi$rute[$i]) FROM temp WHERE id in ($listLokasi)";
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
		<div class="row h-100 justify-content-center align-items-center">
			<?php 
				if (isset($_POST['buttonSubmit'])) {

					$listRute = implode(",", $rute);
					$x=0;


					echo "
						<h5>Rute Terpendek</h5>
						</div>
					";

					foreach ($rute as $value) {
		
						$con=mysqli_connect("localhost","root","","distribusi");
						$sql ="SELECT nama,alamat FROM lokasi WHERE id=$value";
						$rows_count = mysqli_query($con,$sql); 
						$count = mysqli_fetch_array($rows_count);

						if($x<count($jarakmin)){

							echo"
									<div class='d-flex flex-column text-center' style='font-weight:bold'>
							  			<div class='p-2 bg-dark text-white'>$count[0] - $count[1]</div>
							  			<div class='p-2 bg-white'>$jarakmin[$x] km</div>
							  		</div> 
							";
						
						} else {

							echo"
									<div class='d-flex flex-column text-center text-white' style='font-weight:bold'>
							  			<div class='p-2 bg-dark text-white'>$count[0] - $count[1]</div>
							  		</div> 
							";
						}
						$x++;
					}
				}
			?>
		<br><br>
	</div>
</body>
</html>