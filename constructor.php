<?php 

class Produk {
    // ini property(variable didalam class)
    public $judul, 
           $penulis,
           $penerbit,
           $harga;

    // ini mehtod(function di dalam class)
    // public function sayHello() {
    //     // setiap fungsinya dipanggil kembalikan nilai Hello World.
    //     return "Hello World";
    // }

    // isi dari parameter function ini berbeda dengan property yg ada didalam class.
    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getLabel() {
        // tambahkan $this-> lalu nama property nya, untuk mengambil isi dari variable/property yang diluar method tapi masih dalam 1 class yang sama.
        return "$this->penulis, $this->penerbit";
    }
}

// cara kerja $produk1 ini, isi dari dalam parameternya dikirim ke parameter function __constructor untuk memberi/menimpa nilai default dari property yang ada di dalam class Produk().
$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shounen JUMP", 38000);

$produk2 = new Produk("Filosofi Teras", "Henry Manampiring", "Gramedia", 80000);

$produk3 = new Produk("Rumble Racing");

echo "Komik : " .$produk1->getLabel();
echo "<br>";
echo "Buku : " .$produk2->getLabel();
echo "<br>";
var_dump($produk3);

// costructor method adalah method khusus yang akan dijalan kan otomatis stiap kita membuat instance dari sebuah class.