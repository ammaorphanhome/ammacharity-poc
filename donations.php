<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amma Orphanage</title>
    <meta name="description" content="Amma Orphanage">
    <meta name="keywords" content="Amma Orphanage, Amma children home, amma anadhasaranalayam">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Montserrat:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


      <nav class="navbar navbar-default probootstrap-navbar">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html" title="uiCookies:Enlight">Enlight</a>
          </div>

          <div id="navbar-collapse" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php">Home</a></li>
              <li><a href="about.html">About Us</a></li>
              <li><a href="news.html">News</a></li>
              <li><a href="causes.html">Causes</a></li>
              <li><a href="projects.html">Projects</a></li>
              <li class="active"><a href="donations.php">Donations</a></li>
              <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Pages</a>
                <ul class="dropdown-menu">
                  <li><a href="about.html">About Us</a></li>
                  <li><a href="testimonial.html">Testimonial</a></li>
                  <li><a href="cause-single.html">Cause Single</a></li>
                  <li><a href="gallery.html">Gallery</a></li>
                  <li class="dropdown-submenu dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span>Sub Menu</span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Second Level Menu</a></li>
                      <li><a href="#">Second Level Menu</a></li>
                      <li><a href="#">Second Level Menu</a></li>
                      <li><a href="#">Second Level Menu</a></li>
                    </ul>
                  </li>
                  <li><a href="news.html">News</a></li>
                  <li class="active"><a href="contact.html">Contact</a></li>
                </ul>
              </li>

              <li class="probootstra-cta-button last"><a href="donate.html" class="btn btn-primary">Donate</a></li>
            </ul>
          </div>
        </div>
      </nav>

      <section class="probootstrap-hero probootstrap-hero-inner" style="background-image: url(img/hero_bg_bw_1.jpg)"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">
                <h1 class="probootstrap-heading probootstrap-animate">Donate <span>Together we can make a difference</span></h1>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="probootstrap-section">
        <div class="container">
          <h2>Latest Donations</h2>
          <p>Thank you for your very kind donations. Your generosity will directly benefit the children of Amma Orphanage.</p>
          <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th>Donated On</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Purpose</th>
                <th>Message</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include 'src/DBFunctions.php';
                $dbFunctions = new DB\DBFunctions();
                $query = $dbFunctions->getPayments();
                date_default_timezone_set("Asia/Calcutta");
                while ($row = mysqli_fetch_array($query)) {
                  $date = new DateTime($row["created_dt"]);
                  $new_date_format = $date->format('d-m-Y');
                  echo "<tr>";
                  echo "<td>".$new_date_format."</td>";
                  echo "<td>".$row["name"]."</td>";
                  echo "<td>₹".$row["amount"]."</td>";
                  echo "<td>".$row["purpose"]."</td>";
                  echo "<td>".$row["message"]."</td>";
                  echo "</tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
      </section>


      <footer class="probootstrap-footer probootstrap-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-4 probootstrap-animate">
              <div class="probootstrap-footer-widget">
                <h3>About Us</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro provident suscipit natus a cupiditate ab minus illum quaerat maxime inventore Ea consequatur consectetur hic provident dolor ab aliquam eveniet alias</p>
                <ul class="probootstrap-footer-social">
                  <li><a href="#"><i class="icon-twitter"></i></a></li>
                  <li><a href="#"><i class="icon-facebook"></i></a></li>
                  <li><a href="#"><i class="icon-github"></i></a></li>
                  <li><a href="#"><i class="icon-dribbble"></i></a></li>
                  <li><a href="#"><i class="icon-linkedin"></i></a></li>
                  <li><a href="#"><i class="icon-youtube"></i></a></li>
                </ul>
              </div>
            </div>

            <div class="col-md-4 probootstrap-animate">
              <div class="probootstrap-footer-widget">
                <h3>Contact Info</h3>
                <ul class="probootstrap-contact-info">
                  <li><i class="icon-location2"></i> <span>198 West 21th Street, Suite 721 New York NY 10016</span></li>
                  <li><i class="icon-mail"></i><span>info@domain.com</span></li>
                  <li><i class="icon-phone2"></i><span>+123 456 7890</span></li>
                </ul>

              </div>
            </div>

            <div class="col-md-4 probootstrap-animate">
              <div class="probootstrap-footer-widget">
                <h3>Donation</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit omnis nam obcaecati placeat. Repellendus omnis in praesentium molestiae rem eligendi.</p>
                <p><a href="#" class="btn btn-primary">Donate Now</a></p>
              </div>
            </div>

          </div>
          <!-- END row -->

        </div>

        <div class="probootstrap-copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-8 text-left">
                <p>&copy; 2017 <a href="https://uicookies.com/">uiCookies:Charity</a>. All Rights Reserved. Designed &amp; Developed with <i class="icon icon-heart"></i> by <a href="https://uicookies.com/">uicookies.com</a></p>
              </div>
              <div class="col-md-4 probootstrap-back-to-top">
                <p><a href="#" class="js-backtotop">Back to top <i class="icon-arrow-long-up"></i></a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>

    <script src="js/scripts.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/custom.js"></script>

  </body>
</html>