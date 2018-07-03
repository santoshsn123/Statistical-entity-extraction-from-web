<?php 
include('common/config.php');
include('common/app_function.php');
headerIndex('','Home Page','inner','sharing');

$_SESSION['user'];
if(!$_SESSION['user'])
{
    header('location:login.php'); exit;
}

$query = sprintf("SELECT * FROM share LEFT JOIN users on share.s_shareby = users.u_id WHERE s_sharewith='%s'",$_SESSION['user']['u_id']);
if(!$result=mysqli_query($con,$query)){echo "Error : - ".mysqli_error($com); exit;}
?>

    <div class="container" style="margin-top:30px">
        <div class="row">
         
            <div class="col-sm-8">
            <h3>Shared with you</h3>
                <table class="table">
                <tr>
                        <td>#</td>
                        <td>Share Title</td>
                        <td>Share Time</td>
                        <!-- <td>Action</td> -->
                    </tr>
                    <?php $i = 1; while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['u_firstname']." ".$row['u_lastname']; ?> Shared '<?php echo $row['s_searchTitle']; ?>' stats with you </td>
                        <td><?php echo $row['s_daytime']; ?></td>
                        <!-- <td> <a href="submit.php?flag=delete&h_id=<?php echo $row['s_id']; ?>" onclick="if(confirm('Do you really want to delete this record')){return true;}else{return false;}"> Delete</a></td> -->
                    </tr>
                    <?php $i++; } ?>
                </table>
    <br>
                <hr>
                <br>
<?php

$query = sprintf("SELECT * FROM share LEFT JOIN users on share.s_sharewith = users.u_id WHERE s_shareby='%s'",$_SESSION['user']['u_id']);
if(!$result=mysqli_query($con,$query)){echo "Error : - ".mysqli_error($com); exit;}
?>
<h3>Your Share</h3>
                <table class="table">
                <tr>
                        <td>#</td>
                        <td>Share Title</td>
                        <td>Share Time</td>
                        <!-- <td>Action</td> -->
                    </tr>
                    <?php $i = 1; while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td>You Shared '<?php echo $row['s_searchTitle']; ?>' stats with <?php echo $row['u_firstname']." ".$row['u_lastname']; ?> on <?php echo $row['s_dateTime']; ?> </td>
                        <td><?php echo $row['s_daytime']; ?></td>
                        <!-- <td> <a href="submit.php?flag=delete&h_id=<?php echo $row['s_id']; ?>" onclick="if(confirm('Do you really want to delete this record')){return true;}else{return false;}"> Delete</a></td> -->
                    </tr>
                    <?php $i++; } ?>
                </table>


            </div>
        </div>
    </div>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <p>Statistical entity extraction from web @ 2018</p>
    </div>

</body>

</html>