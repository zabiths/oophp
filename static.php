<?php 

// // class merupakan template dari object.
// // tapi kita bisa mengakses property dan method dalam konteks class. maksud nya kita bisa akses porperty dan method tanpa haru instansiasi classnya.
// class ContohStatic {
//     // static keyword, member yg terikat dgn class, bukan dengan object, ini lah kenapa kita dapat mecetak langsung tanpa membuat instasiasi terelebih dahulu.
//     // "nilai static akan selalu tetap meskipun object di instasiasi berulang kali."
//     public static $angka = 1;

//     public static  function halo() {
//         // $this->$angka, ini hanya berlaku untuk object yang kita instansiasi.
//         // untuk mengambil propert $angka diatas kita gunakan self::$angka. 
//         return "Halo." . self::$angka++." kali"; 
//     }
// }

// // cara mencetak property static, langsung panggil nama classnya lalu :: nama property nya.
// echo ContohStatic::$angka;
// echo "<br>";
// // ini panggil methodnya.
// echo ContohStatic::halo();
// echo "<hr>";
// echo ContohStatic::halo();


// ini menggunakan konsep OOP biasa.
class Contoh {
// dan juga dengan static keyword, membuat kode menjadi "procedural".
// lalu biasanya digunakan untuk membuat fungsi bantuan/ helper karna ga perlu instansiasi langsung aja panggil property atau methodnya.
// atau biasa digunakan di class-class utility pada framework.
 
    public static $angka = 1;
    
    public function halo() {
        // ini yang dimaksud dengan nilai static akan selalu tetap, yaitu akan melanjutkan dari 4,5,6, sedangkan kalo tanpa static maka hari dari return ini aku dimulai ulang dari 1,2,3.
        return "Halo " . self::$angka++ . " kali.<br>";
    }
}

$obj = new Contoh;
echo $obj->halo();
echo $obj->halo();
echo $obj->halo();

echo "<hr>";

$obj2 = new Contoh;
echo $obj2->halo();
echo $obj2->halo();
echo $obj2->halo();
?>