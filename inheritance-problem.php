<?php 

class Produk {
    // ini property(variable didalam class)
    public $judul, 
           $penulis,
           $penerbit,
           $harga,
           $jmlHalaman,
           $waktuMain,
           $tipe;

    // ini mehtod(function di dalam class)
    // public function sayHello() {
    //     // setiap fungsinya dipanggil kembalikan nilai Hello World.
    //     return "Hello World";
    // }

    // isi dari parameter function ini berbeda dengan property yg ada didalam class. 
    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0, $waktuMain = 0, $tipe) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
        $this->tipe = $tipe;
    }

    public function getLabel() {
        // tambahkan $this-> lalu nama property nya, untuk mengambil isi dari variable/property yang diluar method tapi masih dalam 1 class yang sama.
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoLengkap() {
        // Komik : Naruto | Masahsi Kishimoto, Shonen Jump (Rp. 38000) - 100 Halaman.
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} | ({$this->harga})";
        if ($this->tipe == "Komik") {
            $str .= " - {$this->jmlHalaman} Halaman.";
        } elseif ($this->tipe == "Game") {
            $str .= " - {$this->waktuMain} Jam.";
        }
        return $str; 
    }

}

class CetakInfoProduk {
    public function cetak( Produk $produk ) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";

        return $str;
    }
}

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shounen JUMP", 38000, 100, 0, "Komik");

$produk2 = new Produk("Rumble Racing", "Thoms", "Racing", 120000, 0 , 80, "Game");

// $produk2 = new Produk("Filosofi Teras", "Henry Manampiring", "Gramedia", 80000, "");

// $produk3 = new Produk("Rumble Racing");

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();

