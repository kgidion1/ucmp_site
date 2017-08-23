  <!--top bar start-->
  <?php
    error_reporting(0);
    require_once("src/functions/database.php");
       $upcoming_events_sql = "SELECT * FROM events";
                                $upcoming_events_result = $database->query($upcoming_events_sql);

                                while(($upcomingEventsArray[]= mysqli_fetch_assoc($upcoming_events_result))|| array_pop($upcomingEventsArray));
                              

  ?>
        <div class="top-bar-v1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 hidden-xs col-xs-12">
                      <ul class="list-inline">
                                    <li><a>Welcome</a></li>
                                    <li><a href="#"><i class="fa fa-phone"></i>+256(0) 393-516-695,+256(0) 414-976-674)</a></li>
                                    <li><a href="#"><i class="fa fa-envelope-o"></i> info@ucmp.ug</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 hidden-xs text-right">
                        <ul class="list-inline">
                                    <li><a href=" https://www.facebook.com/UgandaChamberOfMinesandPetroleum
" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://mobile.twitter.com/UgandaChamber" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <!-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li> -->

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--top bar end-->
        <!--top bar end-->
        <!-- header -->
        <header class="top-header navbar-default navbar  navbar-static-top sticky-header yamm">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                     <a class="navbar-brand wow animated fadeInLeft " href="index.php" data-wow-delay="0.8s">
                    <img src="images/ucmp.png" width="80x80"  alt="logo" style="margin-top:-1.7em;"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php">Home</a></li>
                          <li><a href="about.php">About</a></li>
                           <li><a href="members.php">Membership</a></li>
                            <li><a href="minepet.php">Minerals &amp; Petroleum</a></li>
                             <li><a href="publications.php">Publications</a></li>
                               <li><a href="archive.php">Archives</a></li>
                                <li class="dropdown">
                            <a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown" 
                            role="button" aria-haspopup="true" aria-expanded="false">Events<span class="fa fa-angle-down"></span></a>
                            <ul class="dropdown-menu">
                                                 <?php
                                  foreach($upcomingEventsArray as $upcomingevent){
                                    $upcoming_event_name = $upcomingevent['name'];
                                    $upcoming_event_url = $upcomingevent['url'];
                                    $upcoming_event_file = $upcomingevent['filename'];
                                    if($upcoming_event_url != ""){
                                        echo "<li><a href='$upcoming_event_url' target='_blank'>$upcoming_event_name</a></li>"; 
                                    } else{
                                        echo "<li><a href='files/$upcoming_event_file' target='_blank' download>$upcoming_event_name</a></li>";
                                    } 
                                }
                                   ?>
                               
                                </ul>
                        </li>
                        <li><a href="contact.php">Contact Us</a></li>
                         
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </header>