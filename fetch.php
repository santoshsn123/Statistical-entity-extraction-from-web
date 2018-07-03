<?php 
include('common/config.php');
include('common/app_function.php');
headerIndex('','Home Page','inner','fetch');

if(!$_SESSION['user'])
{
    header('location:login.php'); exit;
}
error_reporting(E_ALL);
   

if($_GET['insert']=='no')
{

    $query = sprintf("SELECT * FROM search_info  WHERE s_search_by='%s' AND s_title='%s' ",$_SESSION['user']['u_id'],$_GET['playerName']);
            if(!$result=mysqli_query($con,$query)){echo "Error : - ".mysqli_error($com); exit;} 
            $row = mysqli_fetch_assoc($result);
            $search_id = $row['s_id'];
            $data =$row['s_header'];
            $arra = json_decode($row['s_content']);
}
else{
    if($_GET['playerName']!='')
    {
        $array = getAllPlayers('a',$_GET['playerName']);
       
        $arra = getAllData($array['link']);
        $data = getpersonalDetails($array['link']);
        $datetime = date("Y-m-d H:i:s");
        if($_GET['insert']!='no')
        {
            $query = sprintf("INSERT INTO search_info SET s_title='%s', s_header='%s', s_content='%s', s_daytime='%s', s_search_by='%s'",$_GET['playerName'],$data,json_encode($arra),$datetime,$_SESSION['user']['u_id']);
            if(!$result=mysqli_query($con,$query)){echo "Error : - ".mysqli_error($com); exit;}
            $search_id = mysqli_insert_id($con);
        }
    }
}
?>
    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-12">
                <form action="" >
                    <div class="form-group">
                        <label> Enter Name Of Player:</label>
                        <input type="text" name="playerName" value="<?php echo $_GET['playerName']; ?>" placeholder="Player Name" class="form-control">
                    </div>
                </form>
                <div class="row margin-top">
                    <div class="col-md-12">
                        <?php if($_GET['playerName']!='')
                            { echo $data; } ?>
                        <h3>Standard Batting</h3>
                    <div style="    text-align: right;
    font-size: 25px;"><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal"  >Share</a></div>
                        <div style="    width: 100%;
                        overflow-x: scroll;">

                        <table class="table" >
                            <?php $i=0; while(count($arra)>$i){
                               ?>
                                <tr>
                                    <?php $j =0; while(count($arra[$i])>$j){
                                        ?>
                                        <td><?php echo $arra[$i][$j]; ?></td>
                                        <?php $j++;
                                    } ?>
                                </tr>
                            <?php $i++; } ?>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <p>Statistical entity extraction from web @ 2018</p>
    </div>
</body>
</html>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">]
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h1 class="modal-title" >Share With</h1>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
          <?php  $query = sprintf("SELECT * from users WHERE u_id != '%d' ",$_SESSION['user']['u_id']); 
            if(!$result=mysqli_query($con,$query)){echo "Error : - ".mysqli_error($com); exit;} 
            while($row = mysqli_fetch_assoc($result))
            {
                $que = sprintf("SELECT * FROM share where s_shareby = '%s' AND s_sharewith='%s' AND s_searchId = '%s'  ",$_SESSION['user']['u_id'],$row['u_id'],$search_id);
                if(!$res=mysqli_query($con,$que)){echo "Error : - ".mysqli_error($com); exit;}
                $count = mysqli_num_rows($res);
                if($count<1)
                {
                ?>
                <h3><a href="submit.php?searchTitle=<?php echo $_GET['playerName']; ?>&mode=share&share=<?php echo $search_id; ?>&sharewith=<?php echo $row['u_id']; ?>" ><?php echo $row['u_firstname']." ".$row['u_lastname']; ?></a> </h3>
                <?php 
                }
            }
          ?>
        <!-- <p>Some text in the modal.</p> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


