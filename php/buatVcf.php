<?php
error_reporting(0);
include "../koneksi.php";
	if(isset($_POST['submit'])){
		if(!empty($_POST['user_list'])){
			foreach($_POST['user_list'] as $item){
			/*echo $item."</br>";*/
			$Query = mysqli_query($conn,"select * FROM pengguna where username='$item'");
while ($data=mysqli_fetch_array($Query)){
  $File .= "BEGIN:VCARD
VERSION:2.1
N:".$data[nama_blk].";".$data[nama_dpn]."
FN:".$data[nama_dpn]." ".$data[nama_blk]."
TEL;CELL;VOICE:".$data[no_wa]."
REV:".date("Y").date("m").date("d")."T".date("m")."3834Z
END:VCARD
";
}
			}
		}
	}

$a=file_put_contents("contact.vcf", $File);
/*
if ($a) {
  echo "<script> alert('Create Successful');
        window.location='../index.php?page=hal_kontak';
        </script>";
} else {
  echo "<script> alert('Create Failed');
        window.location='../index.php?page=hal_kontak';
        </script>";
}
*/
?>
<?php
if (!empty($_GET['file'])) {
  $fileName=basename($_GET['file']);
  $filePath=$fileName;
  if (file_exists($filePath)) {
    //Define header
    header("Content-Description: File Transfer");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=$fileName");
    header("Cache-Control: public");
    header("Content-Transfer-Encoding: binary");

    // Read the file
    readfile($filePath);
    exit;
  }
}
?>
