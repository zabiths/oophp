<?php 

class Produk {
    public $judul, 
           $penulis,
           $penerbit,
           $harga;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoLengkap() {
        // Komik : Naruto | Masahsi Kishimoto, Shonen Jump (Rp. 38000) - 100 Halaman.
        $str = "{$this->judul} | {$this->getLabel()} | ({$this->harga})";
        return $str; 
    }
}

class Komik extends Produk {
    public $jmlHalaman;
    
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga  = 0, $jmlHalaman = 0 ){
        // parent:: ini merupakan salah satu sintaks untuk overriding, yaitu untuk menggunakan method dari parent nya sehingga tidak perlu menulis ulang semuanya.
            parent::__construct($judul, $penulis, $penerbit, $harga);

            $this->jmlHalaman = $jmlHalaman;
        }

    public function getInfoProduk() {
        $str = "Komik : ". parent::getInfoLengkap() ." - {$this->jmlHalaman} Halaman.";

    return $str;
    } 
}

class Game extends Produk {
    public $waktuMain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0){
        parent::__construct($judul, $penulis, $penerbit, $harga);

        $this->waktuMain = $waktuMain;
    }

    public function getInfoProduk() {
        $str = "Game : ". parent::getInfoLengkap() ."~ {$this->waktuMain} Jam.";

    return $str;
    }
}

class CetakInfoProduk {
    public function cetak( Produk $produk ) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";

    return $str;
    }
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shounen JUMP", 38000, 100);

$produk2 = new Game("Rumble Racing", "Thoms", "Racing", 120000, 80);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();

