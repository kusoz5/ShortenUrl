<?php

if(isset($_GET['u'])){
	include'db_conn.php';

	$id = $_GET['u'];
	$final=0;
	$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $base = 62;
    for ($i=0; $i<strlen($id); $i++) {
        $value = strpos($chars, $id[$i]);
        $num = $value * pow($base, strlen($id)-($i+1));
        $final += $num;
    }
    

    $q= "SELECT url ,id,shortenurl FROM urldata WHERE id='$final'";

    $result = mysqli_query($con,$q);
    if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $link=  $row["url"];
    header("Location:".$link);
  }
} else {
  echo "no url found ";
}
}



?>