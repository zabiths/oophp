<?php 

class Produk {
    // public, dapat digunakan dimana saja, bahkan diluar kelas
    // protected, hanya dapat digunakan di dalam sebuah kelas beserta turunannya.
    // private, hanya dapat digunakan didalam sebuah kelas tertentu saja.
    public $judul, 
           $penulis,
           $penerbit;
    // ketika diskon ini kita kasih class private, maka isi dari settDiskon tidak akan jalan.
    protected $diskon = 0;
    // protected $harga; 
    // kita bisa sett private ketika property ini hanya kita gunakan di class ini saja.
    private $harga;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }
    
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
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
        // parent:: ini merupakan salah satu sintaks untuk overriding, yaitu untuk menggunakan method dari parent nya sehingga tidak perlu menulis ulang semuanya.
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
    
    public function settDiskon( $diskon ) {
        $this->diskon = $diskon;
    }
    // kita buat method getHarga yang mengembalikan property harga dari parentnya, ini dibuat agar kita bisa mencetak/menampilkan property yang memiliki visibility protected. tapi kalo visibility nya private maka kita pindah kan saja method getHarga() ini ke parentnya atau class Produk.
    // public function getHarga() {
        //     return $this->harga;
        // }

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

// masalah dari visibility "public", kita bisa ubah lagi dengan menimpa nilai yang telah ditentukan, seperti ini.
// kita juga memang tidak boleh menimpa nilai yang telah ditentukan.
// $produk2->harga = 5000;
// solusi nya kita buat propertynya jadi protected atau private.

// settDiskon method dari class Game, hasil dari property diskon dengan visibitily propected. 
$produk2->settDiskon(50);
// lalu disini kita panggil method getHarga dari class Game yaitu child dari class Produk.
echo $produk2->getHarga();



