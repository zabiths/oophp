<?php 

class Produk {
    // ini property(variable didalam class)
    public $judul = "judul", 
           $penulis = "penulis", $penerbit = "penerbit",
           $harga = 0;

    // ini mehtod(function di dalam class)
    // public function sayHello() {
    //     // setiap fungsinya dipanggil kembalikan nilai Hello World.
    //     return "Hello World";
    // }

    public function getLabel() {
        // tambahkan $this-> lalu nama property nya, untuk mengambil isi dari variable/property yang diluar method tapi masih dalam 1 class yang sama.
        return "$this->penulis, $this->penerbit";
    }
}

// $produk1 = new Produk();
// // ini cara menimpa isi dari property judul. 
// $produk1 -> judul = "Naruto";
// var_dump($produk1);
// // judul => Naruto

// $produk2 = new Produk();
// $produk2 -> judul = "Smackdown";
// // catatan kalo menimpa suatu property "ingat" nama nya harus sama karna salah 1 huruf itu ga error tapi dia menambahkan property baru. Makanya visibility itu penting.
// // $produk2 -> tambahProperty = "hehe";
// var_dump($produk2);
// // judul, karna $produk2 ini menggunakan nilai default.

$produk3 = new Produk();
$produk3->judul = "Naruto";
$produk3->penulis = "Masashi kishimoto";
$produk3->penerbit = "shounen jump";
$produk3->harga = 35000;

// var_dump($produk3); 

// echo "Komik : $produk3->judul, $produk3->penulis";

// echo "<br>";
// // setiap pemanggilan method jangan lupa gunakan tanda kurung dibelakang namanya.
// echo $produk3->getLabel();

// echo "<br>";

$produk4 = new Produk();
$produk4->judul = "Filosofi Teras";
$produk4->penulis = "Henry Manampiring";
$produk4->penerbit = "Gramedia";
$produk4->harga = 80000;

echo "Komik : " .$produk3->getLabel();
echo "<br>";
echo "Buku : " .$produk4->getLabel();