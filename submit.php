<?php 
include('common/config.php');
include('common/app_function.php');
// headerIndex('','Home Page','user','login');
$mode = $_POST['mode'];


if($mode=='register')
{

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];


    if($firstname=='' || $lastname=='' || $email=='' || $username=='' || $phone=='' || $password=='')
    {
        header("Location:register.php?flag=allField"); exit;
    }
    if($password!=$cpassword)
    {
        header("Location:register.php?flag=missmatch"); exit;
    }

    $query = sprintf("SELECT * FROM users WHERE u_email='%s'",$email);
    if(!$result=mysqli_query($con,$query)){echo "Error : - ".$query.mysqli_error($con); exit;}
    $count = mysqli_num_rows($result);
    if($count>0)
    {
        header("Location:register.php?flag=email_exist"); exit;
    }

    $query = sprintf("SELECT * FROM users WHERE u_username='%s'",$username);
    if(!$result=mysqli_query($con,$query)){echo "Error : - ".$query.mysqli_error($con); exit;}
    $count = mysqli_num_rows($result);
    if($count>0)
    {
        header("Location:register.php?flag=username_exist"); exit;
    }

    $query = sprintf("INSERT INTO users SET u_firstname='%s',u_lastname='%s',u_email='%s',u_phone='%s',u_username='%s',u_password='%s'",
    $firstname,$lastname,$email,$phone,$username,md5($password));
    if(!$result=mysqli_query($con,$query)){echo "Error : - ".$query.mysqli_error($con); exit;}

    header("Location:register.php?flag=done"); exit;
}
if($mode=='login')
{
    // echo "<pre>";
    // print_r($_SESSION['user']);
    // echo "</pre>";
    // exit;

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = sprintf("SELECT * FROM users WHERE  u_username='%s' AND  u_password='%s' ",$username,$password);
    if(!$result=mysqli_query($con,$query)){echo "Error : - ".mysqli_error($com); exit;}
    
    $count = mysqli_num_rows($result);
    if($count>0)
    {
        $_SESSION['user'] = mysqli_fetch_assoc($result);
        header("Location:home.php"); exit;
//   echo "<pre>";
//   print_r($_SESSION['user']);
//   echo "</pre>";
    }
    else{
        header("Location:login.php?flag=wrong"); exit;
        // header("Location:home.php"); exit;
    }

}
$mode = $_GET['mode'];

if($mode == 'share')
{
    $share = $_GET['share'];
    $sharewith = $_GET['sharewith'];
    $searchTitle = $_GET['searchTitle'];
    $user = $_SESSION['user']['u_id'];
    $dateTime = date('Y-m-d H:i:s');

    $query= sprintf("INSERT INTO share SET s_shareby='%s', s_sharewith='%s',s_searchId='%s',s_searchTitle='%s',s_dateTime='%s' ",
    $user,$sharewith,$share,$searchTitle,$dateTime);
    if(!$result=mysqli_query($con,$query)){echo "Error : - ".mysqli_error($com); exit;}
    header("Location:fetch.php?flag=share_done&playerName=".$searchTitle."&insert=no"); exit;
}

if($mode=='delete')
{
    $s_id = $_GET['s_id'];
    $query= sprintf("DELETE FROM search_info WHERE s_id='%s' ",$s_id);
    if(!$result=mysqli_query($con,$query)){echo "Error : - ".mysqli_error($com); exit;}
    header("Location:history.php"); exit;
}
if($mode=='logout')
{
    session_destroy();
    header("location:login.php"); exit;
} 
?>