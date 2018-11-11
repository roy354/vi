<?php
echo file_get_contents("tampil");
$ref = readline("Masukkan Kode Referral : ");
$x= readline("Masukkan Jumlah Ref : ");
for ($i=0; $i < $x; $i++) 
{ 
  # code...

$rand = "VC".rand(1000,10000);
// Membuat User Name Uniq 
$data = file_get_contents("nama.txt");
$pisah= explode(" ", $data);
$user = $pisah[array_rand($pisah)].rand(1,10000);
// Membuat Email Uniq 
$data = file_get_contents("mail");
$pisah_1= explode(" ", $data);
$user = $pisah[array_rand($pisah)].rand(1,1000)."@".$pisah_1[array_rand($pisah)].".com";
$user = urlencode($user);
// Initialisasi CURL 
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://vic-cash.com/webservice/viccash.php?apicall=signup",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "email=$email&password=ibuku354&myreferralcode=$rand&username=$user&referral=$ref",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
    "postman-token: d16273e4-9afc-aae0-a266-5b5999a48f02"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo "Referral $ref Sukses -> $user\n ";
}

}
?>