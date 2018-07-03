<?php 
include('common/config.php');
include('common/app_function.php');
headerIndex('','Home Page','outer','login');

$_SESSION['user'];
if($_SESSION['user'])
{
    header('location:home.php'); exit;
}
?>
<div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-4">
                <h2>Abstract</h2>
                <h5></h5>
                <p>Web harvesting is important sometimes, when we need to grab too much data from some website. Web scraping
                    a web page involves fetching it and extracting from it. Fetching is the downloading of a page (which
                    a browser does when you view the page). Therefore, web crawling is a main component of web scraping,
                    to fetch pages for later processing. Once fetched, then extraction can take place. The content of a page
                    may be parsed, searched, reformatted, its data copied into a spreadsheet, and so on. Web scrapers typically
                    take something out of a page, to make use of it for another purpose somewhere else. An example would
                    be to find and copy names and phone numbers, or companies and their URLs, to a list (contact scraping).
                    In this project we are going to take one website having some dynamic data. Like user data or some usefull
                    information. We will write code in such a way that it will grab data from that website and put the data
                    in our database. This will be helpful to have data in our database.</p>
                <h3>Web Extraction Done from </h3>
                <p>Some Links.</p>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://www.baseball-reference.com/">https://www.baseball-reference.com/</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://www.baseballamerica.com/">https://www.baseballamerica.com/</a>
                    </li>
                </ul>
                <hr class="d-sm-none">
            </div>
            <div class="col-sm-8">
                <h1>Login</h1>
                <?php $flag = $_GET['flag']; if($flag=='wrong'){ ?><div class="error">Username / Password Wrong</div><?php } ?>
                <br>
                <form action="submit.php" method="POST">

                    <div class="form-group">
                        <label for="email">Username:</label>
                        <input type="text" class="form-control" name="username">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <input type="hidden" name="mode" value="login" >
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <p>Statistical entity extraction from web @ 2018</p>
    </div>

</body>

</html>