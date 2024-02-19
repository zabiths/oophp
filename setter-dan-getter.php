<?php 

class Produk {
    // public, dapat digunakan dimana saja, bahkan diluar kelas
    // protected, hanya dapat digunakan di dalam sebuah kelas beserta turunannya.
    // private, hanya dapat digunakan didalam sebuah kelas tertentu saja.
    private $judul, 
            $penulis,
            $penerbit,
            $harga,
            $diskon = 0;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }
    
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    // ini disebut setter. dia butuh parameter. 
    // dalam mengguna kan setter dan getter memungkinkan kita untuk mezlakukan validasi.
    public function setJudul($judul) {
        // ini contoh validasi yang apabila judulnya bukan string maka akan error.
        // if( !is_string($judul)) {
        //     throw new Exception("Judul harus string");
        // }
        $this->judul = $judul;
    }

    // ini disebut getter.
    public function getJudul() {
        return $this->judul;
    }

    public function setPenulis($penulis) {
        $this->penulis = $penulis;
    }

    public function getPenulis() {
        return $this->penulis;
    }

    public function setPenerbit($penerbit) {
        $this->penerbit = $penerbit;
    }

    public function getPenerbit() {
        return $this->penerbit;
    } 
    
    public function settDiskon($diskon) {
        $this->diskon = $diskon;
    }

    public function getDiskon() {
        return $this->diskon;
    }

    public function setHarga($harga) {
        $this->harga = $harga;
    }
  
    public function getHarga() {
        // logic menghitung diskon
        return $this->harga - ( $this->harga * $this->diskon / 100);
    }
    
    public function getInfoProduk() {
        // Komik : Naruto | Masahsi Kishimoto, Shonen Jump (Rp. 38000) - 100 Halaman.
        $str = "{$this->judul} | {$this->getLabel()} | ({$this->harga})";
        return $str; 
    }
}

class Komik extends Produk {
    public $jmlHalaman;
    
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga  = 0, $jmlHalaman = 0 ){
        parent::__construct($judul, $penulis, $penerbit, $harga);
        
        $this->jmlHalaman = $jmlHalaman;
    }
    
    public function getInfoProduk() {
        $str = "Komik : ". parent::getInfoProduk() ." - {$this->jmlHalaman} Halaman.";
        
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
        $str = "Game : ". parent::getInfoProduk() ."~ {$this->waktuMain} Jam.";

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
echo "<hr>";

$produk2->settDiskon(50); 
echo $produk2->getHarga();
echo "<hr>";

// Tabel tracingnya, dia akan cek di class komik mencari method getJudul tapi tidak ada, lalu cari di parentnya dan ketemu lalu diparent ini pada method getJudul isi nya memanggil property judul yang bersifat private. maka getJudul() akan menampilkan hasilnya.
// $produk1->setJudul("JudulBaru");
$produk1->setPenulis("Joko");
echo "Penulis dari komik Naruto"." ".$produk1->getPenulis();
