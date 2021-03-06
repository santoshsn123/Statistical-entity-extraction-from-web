<?php 
include('common/config.php');
include('common/app_function.php');
headerIndex('','Home Page','outer','home');
?>
  <div class="container" style="margin-top:30px">
    <div class="row">
      <div class="col-sm-4">
        <h2>Abstract</h2>
        <h5></h5>
        <p>Web harvesting is important sometimes, when we need to grab too much data from some website. Web scraping a web page
          involves fetching it and extracting from it. Fetching is the downloading of a page (which a browser does when you
          view the page). Therefore, web crawling is a main component of web scraping, to fetch pages for later processing.
          Once fetched, then extraction can take place. The content of a page may be parsed, searched, reformatted, its data
          copied into a spreadsheet, and so on. Web scrapers typically take something out of a page, to make use of it for
          another purpose somewhere else. An example would be to find and copy names and phone numbers, or companies and
          their URLs, to a list (contact scraping). In this project we are going to take one website having some dynamic
          data. Like user data or some usefull information. We will write code in such a way that it will grab data from
          that website and put the data in our database. This will be helpful to have data in our database.</p>
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
        <h2>Flow Chart</h2>
        <h5>Flow chart to do development of the concept</h5>
        <div class="fakeimg">
          <img src="images/flowchart.png" class="second-image">
        </div>
        <p>Some text..</p>
        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        <br>
        <h2>Extraction From </h2>
        <h5>Extracted data from </h5>
        <div class="fakeimg">
          <img src="images/banner2.jpeg" class="second-image">
        </div>
        <p>Some text..</p>
        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
      </div>
    </div>
  </div>

  <div class="jumbotron text-center" style="margin-bottom:0">
    <p>Statistical entity extraction from web @ 2018</p>
  </div>

</body>

</html>