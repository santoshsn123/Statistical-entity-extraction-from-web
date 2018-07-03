<?php 
include('common/config.php');
include('common/app_function.php');
headerIndex('','Home Page','outer','register');
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
            <?php $flag = $_GET['flag']; ?>
            <div class="col-sm-8">
                    <h1>Register</h1>
                    <?php if($flag=='missmatch'){ ?><div class="error">Password Missmatch</div><?php } ?>
                    <?php if($flag=='done'){ ?><div class="success">Registration done successfully</div><?php } ?>
                    <?php if($flag=='allField'){ ?><div class="error">Please Enter All Fields</div><?php } ?>
                    <?php if($flag=='username_exist'){ ?><div class="error">Username Already Exist, Please choose another username</div><?php } ?>
                    <?php if($flag=='email_exist'){ ?><div class="error">Email Already Exist, Please choose another Email</div><?php } ?>
                    <br>
                <form method="POST" action="submit.php">
                    <div class="form-group">
                        <label for="email">First Name:</label>
                        <input type="text" name="firstname" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="email">Last Name:</label>
                        <input type="text" class="form-control" name="lastname" id="email">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="email">Phone:</label>
                        <input type="text" class="form-control" name="phone" id="email">
                    </div>
                    <div class="form-group">
                        <label for="email">Username:</label>
                        <input type="text" class="form-control" name="username" id="email">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control"  name="password" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="email">Confirm Password:</label>
                        <input type="password" class="form-control" name="cpassword" id="email">
                    </div>
                    <input type="hidden" name="mode" value="register" >
                    <!-- <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember me
                        </label>
                    </div> -->
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>