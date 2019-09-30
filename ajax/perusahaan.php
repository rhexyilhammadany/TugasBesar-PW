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

  <table border="1" cellspacing="0" cellpadding="10">
   <thead>
    <tr class="btn-danger">
    <th width="50px"  align="center">No</th> 
    <th width="200px" align="center">Opsi</th>
    <th width="200px" align="center">Nama</th>
    <th width="300px" align="center">Pendiri Perusahaan</th>
    <th width="200px" align="center">Tahun Berdiri</th>
    <th width="300px" align="center">Kantor Pusat</th>
    <th width="200px" align="center">Produk</th>
    <th width="100px" align="center">Gambar</th>
    </tr>
  </thead>
    <?php $i = 1 ; ?>
      <?php if(empty($perusahaan)) :?>
      <tr>
        <td colspan="8"><h2 class="text-center">Data tidak ditemukan !!!</h2></td>
      </tr>
    <?php endif; ?>
   <?php foreach ($perusahaan as $pt ) : ?>
    <tbody>
    <tr>
     <td align="center"><?php echo $i++; ?></td>
     <td>
       <a href="hapus.php?id=<?php echo $pt ["id"]; ?>" onclick ="return confirm('yakin?');"><button class="btn-danger">Hapus</button></a>
       <a href="ubah.php?id=<?php echo $pt ["id"]; ?>" style="text-decoration: none"><button class="btn-warning">Ubah</button></a>
     </td>
     <td align="center"><?php echo $pt ["NamaPerusahaan"]; ?></td>
     <td><?php echo $pt ["PendiriPerusahaan"]; ?> </td>
     <td align="center"><?php echo $pt ["TahunBerdiri"]; ?></td>
     <td><?php echo $pt ["KantorPusat"]; ?> </td>
     <td><?php echo $pt ["Produk"]; ?></td>
     <td> <img src="../assets/img/data/<?php echo $pt['Gambar']; ?>"  class="rounded-circle"></td>

  </tr>
    <?php endforeach; ?>
  </tbody>
</table>