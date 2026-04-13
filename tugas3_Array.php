
<?php    
//Array nama2 hewan
$hewan = array("Kucing", "Anjing", "Kelinci", "Burung","Angsa","Ikan","Kancil","Sapi","Kuda","Ayam");

echo "Kumpulan beberapa data hewan: \n";

//count untuk menghitung panjang array
$panjang = count($hewan);
for ($i=0; $i < $panjang; $i++) { 
    echo "Jumlah Hewan: $panjang \n";
}
$contoh = $hewan[0];
$sub = substr($contoh, -3);
echo "Data pertama: $contoh \n";
echo "3 huruf terakhir: $sub \n\n";

//sebelum sort
echo "Sebelum diurutkan: \n";
for ($i=0; $i < $panjang; $i++) { 
    echo "$hewan[$i] \n";
}
echo "\n";

//setelah sort
sort($hewan);
echo "Setelah diurutkan: \n";
for ($i=0; $i < $panjang; $i++) { 
    echo "$hewan[$i] \n";
}
echo "\n";

//array diacak
shuffle($hewan);
echo "Setelah diacak: \n";
for ($i=0; $i < $panjang; $i++) { 
    echo "$hewan[$i] \n";
}
echo "\n";

//menambah array
array_push($hewan, "Zebra");
echo "Setelah menambahkan Zebra: \n";
print_r($hewan);

//menghapus array
unset($hewan[3]);
echo "Setelah menghapus elemen ke-4: \n";
print_r($hewan);
echo "\n";

?>

