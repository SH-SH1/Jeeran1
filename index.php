<?php
include("db_connect.php");
error_reporting(0);
?>

<style>


</style>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="site.css">

<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="site.js"></script>

<center><body></body> </center>
<?php

$sql = "SELECT * FROM companies";
$result = $conn->query($sql);



$core = $_GET['core'];


$sqls = "SELECT * FROM companies WHERE id='$core'";
$results = $conn->query($sqls);





?>


    <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">


                <li class="sidebar-brand">
                    <a href="insert.php">
                        Add New Compnay
                    </a>

                </li>



                 <?php

                $sql2 = "SELECT * FROM posts,companies where companies.id = posts.id";

                $result2 = $conn->query($sql2);

                 $sql = "SELECT * FROM companies";
                 $result = $conn->query($sql);



                 // asdasfadasasfasf

                if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {
                        if ($result2->num_rows > 0) {

                            if ($result2->num_rows > 0) {
                                for ($i = 0; $i < $result2->fetch_assoc(); $i++) {
                                    if ($row2['id'] == $row['id']) {
                                        $sum1 = sum1 + 1;



                                        echo "hi";
                                    }


                                }
                            }
                        }


                        ?>


                        <li>

                            <a href="index.php?core=<?php echo $row["id"]; ?>"><?php echo $row["name"] . " (" . $sum1 . " )"; ?></a>
                        </li>


                        <?php


                    }

                }


                ?>

            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <?php

                        $sql11="SELECT * FROM posts where id='$core'";
                        $results1=$conn->query($sql11);


                        $sql2="SELECT * from companies,posts where companies.id ='$core' and  posts.id ='$core';";
                        $resultss1=$conn->query($sql2);





                        if ($resultss1->num_rows > 0) {
                            while ($rowss = $resultss1->fetch_assoc()) {

                                ?>
                                
                                <div class="panel panel-default">

                                <div class="panel-heading"><?php echo $rowss['Title']." &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp "; ?>.<?php echo $rowss['datee'];?></b></div>
                                <div class="panel-body"><?php echo $rowss['posts'] ;?></div>
                                </div>
                                <?php


                            }}

    ?>



</body>
                    </div>
                </div>
            </div>
        </div>
    </div>
