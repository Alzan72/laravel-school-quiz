<?php


include 'koneksi.php';

header("Access-Control-Allow-Origin: *");


$sql="SELECT * FROM `pendaftaran`";

$hasil=$conn->query($sql);
$array=array();

while ($a=$hasil->fetch_assoc()) $array[]=$a;   {
    # code...
}

echo json_encode($array);

?>