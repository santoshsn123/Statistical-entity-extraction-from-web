<?php 
include('common/config.php');
include('common/app_function.php');
headerIndex('','Home Page','inner','history');

$_SESSION['user'];
if(!$_SESSION['user'])
{
    header('location:login.php'); exit;
}

$query = sprintf("SELECT * FROM search_info WHERE s_search_by='%s' ",$_SESSION['user']['u_id']);
if(!$result=mysqli_query($con,$query)){echo "Error : - ".mysqli_error($com); exit;}
// $row = mysqli_fetch_assoc($result);
?>

    <div class="container" style="margin-top:30px">
        <div class="row">
         
            <div class="col-sm-8">
                <table class="table">
                <tr>
                        <td>#</td>
                        <td>Search Title</td>
                        <td>Search Time</td>
                        <td>Action</td>
                    </tr>
                    <?php $i = 1; while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['s_title']; ?></td>
                        <td><?php echo $row['s_daytime']; ?></td>
                        <td> <a href="submit.php?flag=delete&h_id=<?php echo $row['s_id']; ?>" onclick="if(confirm('Do you really want to delete this record')){return true;}else{return false;}"> Delete</a></td>
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