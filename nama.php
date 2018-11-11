<?php
$data = file_get_contents("nama.txt");
$pisah= explode(" ", $data);
echo $pisah[array_rand($pisah)];

?>