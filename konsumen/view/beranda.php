<?php
include("../config/koneksi.php");
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    // $id_siswa = $_GET['id_siswa'];
    $sql = "SELECT dashboard.no_hp,dashboard.alamat,dashboard.deskripsi,dashboard_foto.foto,dashboard_foto.tgl_upload FROM dashboard 
    	INNER JOIN dashboard_foto ON dashboard.id_dashboard = dashboard_foto.id_dashboard";

    $orderResult = $koneksi->query($sql);
    $orderdata = $orderResult->fetch_array();


    $no_hp = $orderdata[0];
    $alamat = $orderdata[1];
    $deskripsi = $orderdata[2];
    $foto = $orderdata[3];
    $tgl_upload = $orderdata[4];

    ?>
   <?php } ?>
	    

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Beranda</li>
  </ol>
</nav>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		    <ol class="carousel-indicators">
			    <?php 
			    	$no = 0;
					for($no;$no<3;$no++){
				?>
				    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $no ?>" class="<?php if($no == 0){echo 'active';}else{echo 'notactive';}?>"></li>
				<?php 
					}
				?>
			</ol>
			  <div class="carousel-inner">
			 	<?php
				$no = 0;
               $orderResult = $koneksi->query($sql);
                while ($row = $orderResult->fetch_array()) {

                    ?>
			    <div class="carousel-item <?php if($no == 0){echo 'active';}else{echo 'notactive';}?>">
			      <?php echo '<img class="d-block w-100" src="../marketing/php/dashboard_foto/upload/'.$row[3].'" style="width:100%; height:630px;">'?>
			    </div>
			    <?php 
					$no++;}
				?>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
</div>
<div class="row mt-5">
	<div class="col-lg-6 col-md-6 col-sm-6">
		<ul class="list-group list-group-flush">
  <li class="list-group-item">Nomor Handphone</li>
  <li class="list-group-item">Alamat</li>
  <li class="list-group-item">Deskripsi</li>
</ul>
	</div>

<div class="col-lg-6 col-md-6 col-sm-6">
		<ul class="list-group list-group-flush">
  <li class="list-group-item"><?php echo $no_hp?></li>
  <li class="list-group-item"><?php echo $alamat?></li>
  <li class="list-group-item"><?php echo $deskripsi?></li>
</ul>
	</div>
</div>