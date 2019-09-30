<?php 

$conn = mysqli_connect("localhost","root","","pw_173040125");
  

  function query($query){
   
   global $conn;
  $result = mysqli_query($conn, "$query");
  $rows = [];
   while( $row = mysqli_fetch_assoc($result) ) {
     $rows[] = $row;
}
   return $rows;

  }
    
   function tambah($data){
    global $conn ;
    
    $nama= htmlspecialchars($data ["NamaPerusahaan"]);
    $pendiri = $data ["PendiriPerusahaan"];
    $tahun = htmlspecialchars($data ["TahunBerdiri"]);
    $kantor= htmlspecialchars($data ["KantorPusat"]);
    $produk = htmlspecialchars($data ["Produk"]);

 //upload gambar
    $gambar = upload();
    if (!$gambar) {
      return false;
    }



    $query = "INSERT INTO perusahaan_teknologi VALUES 
              ('','$nama','$pendiri',$tahun,'$kantor','$produk','$gambar')";
   
    var_dump($query);
    mysqli_query($conn, $query);
  // mengetahui keterangan javascript
    return mysqli_affected_rows($conn); 
  }

  function upload() {

    $namaFile = $_FILES['Gambar']['name'];
    $ukuranFile = $_FILES['Gambar']['size'];
    $error = $_FILES['Gambar']['error'];
    $tmpName = $_FILES['Gambar']['tmp_name'];

    //cek apkah yang dipilih gambar
    if ($error === 4) {
      echo "<script>
          alert('pilih gambar terlebih dahulu');
          </script>";
      return false;
    }
    //upload untuk gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
          alert('yang anda upload bukan gambar');
          </script>";
      return false;
    }

    if ($ukuranFile > 1000000) {
        echo "<script>
          alert('ukuran gambar terlalu besar');
          </script>";
      return false;
    }

    //lolos cek 
    //generate nama
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../assets/img/Data/' . $namaFileBaru);

    return $namaFileBaru;
  }
  
   function hapus ($id){
   	global $conn ;
   	mysqli_query($conn,"DELETE FROM perusahaan_teknologi WHERE id = $id");
   	return mysqli_affected_rows($conn);
   	
    
   }

   function ubah($data){
   global $conn ;
    
    $id = ($data ["id"]);
    $nama= htmlspecialchars($data ["NamaPerusahaan"]);
    $pendiri = htmlspecialchars($data ["PendiriPerusahaan"]);
    $tahun = htmlspecialchars($data ["TahunBerdiri"]);
    $kantor = htmlspecialchars($data ["KantorPusat"]);
    $produk = htmlspecialchars($data ["Produk"]);
    $gambar = htmlspecialchars($data ["Gambar"]);


    $query = "UPDATE perusahaan_teknologi SET
            NamaPerusahaan = '$nama',
            PendiriPerusahaan = '$pendiri',
            TahunBerdiri = '$tahun',
            KantorPusat = '$kantor',
            Produk = '$produk',
            Gambar = '$gambar'
             WHERE id = $id ";
    mysqli_query($conn,$query);
    // mengetahui keterangan javascript
    return mysqli_affected_rows($conn);

   }
   function registrasi($data){
  global $conn;
  $username  = strtolower(trim($data ["username"]));
  $password1 = mysqli_real_escape_string($conn, $data["password1"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);


  // cek apakah password 1 tidak sama dengan password2
    if( $password1 != $password2 ){
      echo "<script>
          alert('password tidak sesuai !');
          document.location.href = 'registrasi.php';
          </script>";
      return false;
    }


  // cek jika sudah ada username yang sama \
    $cek_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");

    if( mysqli_num_rows($cek_user) == 1){
      echo "<script>
          alert('Username sudah ada!');
          document.location.href = 'registrasi.php';
          </script>";
      return false;
    }


  // enkripsi password
    $password_baru = password_hash($password1, PASSWORD_DEFAULT);

  // masukan data user baru ke database
    $query = "INSERT INTO user VALUES ('', '$username', '$password_baru')"; 
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);





}

 ?>
