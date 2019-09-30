const tombolAmbil = document.querySelector('#cari');
const container = document.querySelector('#container');
const keyword = document.querySelector('#keyword');

keyword.addEventListener('keyup', function () {
  //menjalankan ajax
  // 1.membuat objek ajax
  const xhr = new XMLHttpRequest();

  // 2.cek hasil Ajax
  xhr.onreadystatechange = function () {
    // 3.cek status sumber
    if (xhr.readyState == 4 && xhr.status == 200 ) {
      // 4.lakukan aksi
      container.innerHTML = xhr.responseText;
    }
  }

  // 5.eksekusi ajax
  xhr.open('GET', '../ajax/perusahaan.php?keyword=' + keyword.value);
  xhr.send();

});