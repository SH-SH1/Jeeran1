<?php
include("db_connect.php");
error_reporting(0);
?>
<style>
    body {
        background:url(Jeeran_logo1.jpg) no-repeat center center;
        height : 950px;
        width:1700px;
    }

</style>

<html>
<title> insert </title>
<center><body background="Jeeran_logo1.jpg" > </center>
<center>
<form action="insert.php" method="post">
    <h2>add new company </h2>
    Name : <input type="text" name="namess1" id="namess1" />

    <input type="submit" value="insert"  name="button"/>
    <br><br>
   <h2> Add a note.. </h2><br>
    Title :<input type="text" name="Title" id="Title" /><br>
    Text:<input type="text" id="posts" name="posts" style="width: 300px;"  height="400px" /><br>
    Compnay: <?php
    echo "<select name='valuelist'>";
    $sql2="SELECT * FROM companies ";
    $myresults=$conn->query($sql2);
    $NumberOfPosts =0;
    
    if ($myresults->num_rows > 0) {

        while($row = $myresults->fetch_assoc()) {
            
            echo "<option value=".$row["id"].">" ."company id:". $row["id"] .":". $row["name"] . "</option>" ;

        }}
    echo "</select>";
    ?>
    <input type="submit" value="insert" name="button1"/>





</form>
    </center>
 <?php

$sql11 = "SELECT * FROM companies";
$resultss = $conn->query($sql11);



//echo "<select name='name'>";
//while ($rows = mysql_fetch_row($resultss)) {
  //  echo "<option value='" . $rows['name'] ."'>" . $rows['name'] ."</option>";
//}
//echo "</select>";
//?>
<center>
<a href="index.php">click here here for index page!.</a>

    <?php
    $name= $_POST['namess1'];
    $notes= $_POST['notes'];
    $Title=$_POST['Title'];
    $posts =$_POST['posts'];
    $listvalue = $_POST['valuelist'];

    




if (isset($_POST['button'])) {

    $sql = "INSERT INTO companies (name , notes)
 VALUES ('$name', '$notes')"or die (mysql_error());



}
    if (isset($_POST['button1'])) {

            $NumberOfPosts = NumberOfPosts + 1;

        $sql1 = "INSERT INTO posts (Title,posts,id,datee,NumberOfPosts) VALUES ('$Title','$posts','$listvalue',now(),'$NumberOfPosts')";
        
        $NumberOfPosts = NumberOfPosts + 1;
    }

    if (mysqli_query($conn, $sql1)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }




    ?>
</form>
  </center>
</body>
</title>
</html>