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

class CetakInfoProduk {
    public function cetak( Produk $produk ) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";

        return $str;
    }
}

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shounen JUMP", 38000);

$produk2 = new Produk("Filosofi Teras", "Henry Manampiring", "Gramedia", 80000);

$produk3 = new Produk("Rumble Racing");

echo "Komik : " .$produk1->getLabel();
echo "<br>";
echo "Buku : " .$produk2->getLabel();
echo "<br>";

$infoProduk1 = new CetakInfoProduk();
echo $infoProduk1->cetak($produk2);
