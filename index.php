

<?php
       
       $furl=null;
        if(isset($_POST["submitted"])){

        include'db_conn.php';

        if(isset($_POST["url"])){

        $name=$_POST['url'];
        if(filter_var($name,FILTER_VALIDATE_URL))
        {


        $ins="INSERT INTO urldata (url,shortenurl) VALUES('$name','sad')";

        if(mysqli_query($con,$ins)){

        $id=mysqli_insert_id($con);
        $key=$id;
        $_characters='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $base=strlen($_characters); // 62
        $string=$_characters[$id%$base];

        while(($id=intval($id/$base))>0)
        {
        $string=$_characters[$id%$base].$string;
        }


        $furl="https://www.oururl.com/s.php?u=".$string;
        $upd="UPDATE urldata SET shortenurl = '$string' WHERE id ='$key' ";
        if(mysqli_query($con,$upd)){

      //  echo $furl;
        }else{
        echo"Error updating record: ".mysqli_error($con);
        }


        }
        else{
        echo"Error: "."<br>".mysqli_error($con);
        }
        }
        else
        {
        echo"No it is not url";
        // my else codes goes
        }

        }

        }

        ?>
<html>
<body>
<h1><center>Url Shortner</center></h1>


<center><form method="post"><p>
<input type="text"id="url"placeholder="Enter Your Url Here"size="50"name="url"><br></p>

<input type="Submit"value="Genrate"name="submitted"></form>

<?php 

if(!is_null('furl')){
echo $furl;}?>

</center>
</body>
</html>
