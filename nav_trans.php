<!-- header -->
 <?php
    error_reporting(0);
    require_once("src/functions/database.php");
       $upcoming_events_sql = "SELECT * FROM events";
                                $upcoming_events_result = $database->query($upcoming_events_sql);

                                while(($upcomingEventsArray[]= mysqli_fetch_assoc($upcoming_events_result))|| array_pop($upcomingEventsArray));
                              

  ?>
        <header class="top-header navbar navbar-default header-transparent navbar-fixed-top yamm">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand wow animated fadeInLeft " href="index.php" data-wow-delay="0.8s">
                    <img src="images/ucmp.png" width="80x80"  alt="logo" style="margin-top:-1.5em;"></a>-->
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
                                        echo "<li><a href='files/$upcoming_event_file' target='_blank'>$upcoming_event_name</a></li>";  
                                    }    
                                }
                                   ?>

                                 </ul>
                                     <li><a href="contact.php">Contact Us</a></li>
                      
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </header>
        <!-- header end -->  