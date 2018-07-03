<?php 
include('common/config.php');
include('common/app_function.php');
headerIndex('','Home Page','inner','home');

$_SESSION['user'];
if(!$_SESSION['user'])
{
    header('location:login.php'); exit;
}

$query = sprintf("SELECT * FROM search_info WHERE s_search_by='%s' LIMIT 0,5",$_SESSION['user']['u_id']);
if(!$result=mysqli_query($con,$query)){echo "Error : - ".mysqli_error($com); exit;}
// $row = mysqli_fetch_assoc($result);
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <title>Statistical entity extraction from web</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
   </head>

<body>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Statistical entity extraction from web</h1>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard.html">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="fetch.html">Fetch New Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Latest History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sharing</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link " href="login.html">Logout</a>
                </li>
            </ul>
        </div>
    </nav> -->

    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-4">
                <h2>History</h2>
                <ul class="list-group">
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <li class="list-group-item"><a href="fetch.php?playerName=<?php  echo $row['s_title'];  ?>&insert=no"  ><?php echo $row['s_title']; ?></a></li>
                    <?php } ?>
                    <!-- <li class="list-group-item">Miguel Cabrera</li>
                    <li class="list-group-item">Carl Hubbell</li>
                    <li class="list-group-item">Reggie Jackson</li>
                    <li class="list-group-item">Al Kaline</li> -->
                </ul>
                <p>Link to extract Data.</p>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://www.baseball-reference.com/">https://www.baseball-reference.com/</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://www.baseballamerica.com/">https://www.baseballamerica.com/</a>
                    </li> -->
                </ul>
                <hr class="d-sm-none">
            </div>
            <div class="col-sm-8">
                <h2>Sharing</h2>
                <hr>
                <div class="history-on-dashboard">
                    <h4>Sharing By You</h4>
                    <?php 
$query = sprintf("SELECT * FROM share LEFT JOIN users on share.s_sharewith = users.u_id WHERE s_shareby='%s'",$_SESSION['user']['u_id']);
if(!$result=mysqli_query($con,$query)){echo "Error : - ".mysqli_error($com); exit;} ?>

                    <ul>
                    <?php $i = 1; while($row = mysqli_fetch_assoc($result)){ ?>
                        <li>You Shared '<?php echo $row['s_searchTitle']; ?>' stats with <?php echo $row['u_firstname']." ".$row['u_lastname']; ?> on <?php echo $row['s_dateTime']; ?></li>
                    <?php } ?>
                    </ul>
                </div>
                <hr>
                <div class="history-on-dashboard">
                    <h4>Sharing to You</h4>
                    <?php 
$query = sprintf("SELECT * FROM share LEFT JOIN users on share.s_shareby = users.u_id WHERE s_sharewith='%s'",$_SESSION['user']['u_id']);
if(!$result=mysqli_query($con,$query)){echo "Error : - ".mysqli_error($com); exit;} ?>
                    <ul>
                    <?php $i = 1; while($row = mysqli_fetch_assoc($result)){ ?>
                        <li><?php echo $row['u_firstname']." ".$row['u_lastname']; ?> Shared '<?php echo $row['s_searchTitle']; ?>' stats with you</li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <p>Statistical entity extraction from web @ 2018</p>
    </div>

</body>

</html>