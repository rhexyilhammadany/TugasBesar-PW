<?php 

  require '../helper/functions.php';
  $keyword = $_GET["keyword"];

$perusahaan = query("SELECT * FROM perusahaan_teknologi WHERE  
        NamaPerusahaan LIKE '%$keyword%' OR 
        PendiriPerusahaan LIKE '%$keyword%' OR
        TahunBerdiri LIKE '%$keyword%' OR
        KantorPusat LIKE '%$keyword%' OR
        Produk LIKE '%$keyword%' OR
        Gambar LIKE '%$keyword%' ");

 ?>

  <div class="row">
    <div class="col-6 col-md-4"></div>
      <div class="col-6 col-md-4">
      <div class="container" >
        <?php if(empty($perusahaan)) :?>
      <div class="content">
        <h2 class="text-center">Data tidak ditemukan !!!</h2>
      </div>
    <?php else : ?>
      <?php 

        foreach ($perusahaan as $pt) :
      ?>
        <div class="content">
        <a href="php/profil.php?id=<?= $pt['id']; ?> ">
            <img src="assets/img/Data/<?php echo $pt['Gambar']; ?>" class="img-circle"></a>
        <a href="php/profil.php?id=<?= $pt['id']; ?> ">
            <p class="nama"><b><?php echo $pt["NamaPerusahaan"] ?></b></p></a>
        <a href="php/profil.php?id=<?= $pt['id']; ?> ">
            <p class="tahunBerdiri">(<?php echo $pt["TahunBerdiri"] ?>)</p>
          </a>
        </div>
      <?php endforeach; ?>
      <?php endif; ?>
        <p>Sumber : Wikipedia</p>
      </div>
    </div>
    </div>