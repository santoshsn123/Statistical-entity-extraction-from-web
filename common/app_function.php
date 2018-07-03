<?php 

function headerIndex($path,$title,$type,$page)
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $title; ?> :: Statistical entity extraction from web</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <?php if($type=='outer'){  ?>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">About Project</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Abstract</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" <?php if($page=='register'){?> class="active" <?php } ?> href="register.php">Register</a>
        </li>
        <li class="nav-item" class="active">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
      <?php  
        }
      if($type=='inner'){ ?>
        <ul class="navbar-nav">
                <li class="nav-item <?php if($page=='home'){ echo "active";} ?>">
                    <a class="nav-link" href="home.php">Dashboard</a>
                </li>
                <li class="nav-item <?php if($page=='fetch'){ echo "active";} ?>">
                    <a class="nav-link" href="fetch.php">Fetch New Data</a>
                </li>
                <li class="nav-item <?php if($page=='history'){ echo "active";} ?>">
                    <a class="nav-link" href="history.php">Latest History</a>
                </li>
                <li class="nav-item <?php if($page=='sharing'){ echo "active";} ?>">
                    <a class="nav-link" href="share.php">Sharing</a>
                </li>
                
                <li class="nav-item ">
                    <a class="nav-link " href="submit.php?mode=logout">Logout</a>
                </li>
            </ul>
      <?php } ?>
    </div>
  </nav>

<?php
}


function getpersonalDetails($link)
{
    $html = file_get_contents("https://www.baseball-reference.com".$link);
    $name = explode('<h1 itemprop="name">',$html);
    $PlayerName = explode('</h1>',$name[1])[0];
    // print_r($html);
    // echo "Position :  - ".$name[1];
    return explode("</a></p>",$name[1])[0]."</a>";
    // $toposition = explode('<strong>Position:</strong>',$name[1]);
    // $Position = explode("</p>",$toposition[1])[0];

    // $forBats = explode('<strong>Bats: </strong>',$name[1]);
    // $forBatsNew = explode('<strong>Throws: </strong>',$forBats[1]);
    // $bats = $forBatsNew[0];

    // $forThrows = explode('</p>',$forBatsNew[1]);
    // $throws=$forThrows[0];

    // $forPhysical = explode("<p>",$forThrows[1]);
    // $physical =  explode("</p>",$forPhysical[1])[0];

    // return $array = array('playername'=>$PlayerName,'Position'=>$Position,'bats'=>$bats,'throws'=>$throws,'physical'=>$physical);
}



function getAllPlayers($initial,$search){
    $html = file_get_contents('https://www.baseball-reference.com/players/'.$initial.'/');

    preg_match_all('/<div class="section_content" id="div_players_">(.*?)<\/div>/s', $html , $match);
    $array = explode('html">',$match[0][0]);
    $i = 1 ;
    while(count($array)>$i)
    {
        $value = explode('</a>',$array[$i]);
        $link = explode('href="',$array[$i-1])[1]."html";
        if($value[0]==$search)
        {
           $data=array('name'=>$value[0],'years'=>explode('</p>',$value[1])[0],'link'=>$link);
           break;
        }
        $i++;
    }
    return $data;
}

function getFirstcharacter($name)
{
    $n = explode(" ",$name);
    return array('initial'=>lcfirst(substr($n[1],0,1)),'lastname'=>$n[1]);
}



function getAllData()
{
    $html = file_get_contents('https://www.baseball-reference.com/players/a/aardsda01.shtml');

$complete = explode('<caption>Standard Pitching</caption>',$html);
$getHeadersOnly = explode("</tr>",$complete[1]);
$dt = explode('<th aria-label="',$getHeadersOnly[0]);


$titles = [];
$i=1;
while(count($dt)>$i)
{
    $dt[$i];
    $titles[]=explode('>',explode('</th>',$dt[$i])[0])[1];
    $i++;
}

$tableData=[];
$tableData[]=$titles;

$completeTable=explode("</tbody>",explode('<tbody>',$complete[1])[1])[0];
$rows=explode("</tr>",$completeTable);


$i=0;
while(count($rows)>$i)
{
    // explode(">",explode("</td>",$rows[$i])[0])[1];
    $arr = explode("</td>",$rows[$i]);

    $j=0;
    $row= [];
    while(count($arr)>$j+1)
    {
        if($j==0)
        {
            $diff = explode(" >",explode('</th>',$arr[$j])[0]);
            $row[] =$diff[count($diff)-1]; // explode(" >",explode('</th>',$arr[$j])[0])[1];
            $row[] = explode(">",explode('</th>',$arr[$j])[1])[1];
        }
        else
        {
            $d = explode(">",$arr[$j]);
            $row[] = $d[count($d)-1];
        }
        $j++;
    }
    $tableData[]=$row;
    $i++;
}

return $tableData;

}
?>