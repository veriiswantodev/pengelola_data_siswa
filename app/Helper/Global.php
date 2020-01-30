<?php

// untuk mendaftarkan helper harus ke composer.json dan tulis kode  "files" : [ "app/Helper/Global.php"], setelah itu masuk terminal
// dan jalankan composer dumpaotoload
Use App\Siswa;
Use App\Guru;

function ranking5Besar(){
  $siswa = Siswa::all();
  $siswa->map(function($s){
      $s->rataRata = $s->rataRata();
      return $s;
  });
  $siswa = $siswa->sortByDesc('rataRata')->take(5);
  return $siswa;
}

function totalsiswa(){
  return Siswa::count();
}

function totalguru(){
  return Guru::count();
}