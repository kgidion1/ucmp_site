<style>
    .mytext{
        /*overflow: hidden;*/
        /*line-height: 1.2em;*/
        /*max-height: 2.0em;*/
        /*max-lines: 2;*/
    }
    .text .ellipsis::after {
        content: "...";
        position: absolute;
        right: -12px;
        bottom: 4px;
    }
    .text-concat {
        position: relative;
        display: inline-block;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 2.4em;
        line-height: 1.2em;
        text-align: justify;
    }
</style>

<?php include 'head_css.php';?>
 <?php //include "src/functions/database.php"; ?>
    <body>
        <!--<div id="preloader"></div>-->
        <?php include 'nav.php'; ?>
        <!-- header end -->
        <div class="clearfix"></div>
        <div class="slider-main" style="overflow: hidden;">
            <!-- Master Slider -->
            <div class="master-slider ms-skin-default" id="masterslider"> 
                 <?php 
                           $sql = "SELECT * FROM sliders ORDER BY id DESC";
                           $result = $database->query($sql);

                           while(($resultArray[]= mysqli_fetch_assoc($result))|| array_pop($resultArray));
                             $i = 1;
                           foreach($resultArray as $slider){
                             
                               $id = $slider['id'];
                               $image = $slider['filename'];
                               $caption = $slider['caption'];
                           

                    //       var_dump($resultArray);

                           echo "<div class='ms-slide slide-2' data-delay='14'> 
                           

                    <!-- slide background --> 
                    <img src='masterslider/style/blank.gif' data-src='images/slide/$image' alt='Slide1 background'/>
                    <p class='ms-layer title2 one full-wid font-sbold white text-capitalize text-center'
                        style='left:0px; top: 480px;font-weight:900;  font-size:14px;line-height: 32px;'
                        data-type='text'
                        data-delay='2000'
                        data-duration='2500'
                        data-ease='easeOutExpo'
                        data-effect='rotate3dtop(-100,0,0,40,t)'>$caption</p>";
                    if($i == 1) {
                     echo  "   <a class='ms-layer btn1 btn-xs uppercase' href='members.php'
                       style='left: 600px; top:520px;'
                       data-type='text'
                       data-delay='3200'
                       data-ease='easeOutExpo'
                       data-duration='2200'
                       data-effect='scale(1.5,1.6)'> Become a Member <i class='fa fa-angle-right'></i></a>"; }
                 
                    echo "</div>";
                    
                    $i++;
                    }
                           
                    ?>
              
                <!-- end of slide --> 
            </div>
            <!-- end Master Slider -->
        </div>

         <div class="space-20"></div>
        <div class="container">
            <div class="row">

                <div class="col-sm-3 text-left box-style-1 margin-b-30">
                <div class="space-20"></div>
                  <h3>Members</h3>
                  <a href="members.php"><img src="images/member1.gif" width="450x450" class="img-responsive" ></a>
                </div><!--end col-->
                <div class="col-sm-6 text-justify">
                    <div class="box-style-1 margin-b-30">
                        <div class="space-20"></div>
                         <h3>Who We are</h3>
                        <p>Uganda Chamber of Mines and
                    Petroleum (the Chamber) is a
                    not-for-profit, non-governmental
                    umbrella body representing all
                    aspects of the mining and
                    petroleum sectors in Uganda. It
                    was officially launched by H.E The
                    President of the Republic of
                    Uganda Yoweri Kaguta Museveni
                    together with the South African
                    President H.E Jacob Zuma on 25
                    March, 2010.
                        </p>
                        <p><a href="about.php">Read more</a></p>
                    </div>
                </div><!--end col-->
                <div class="col-sm-3 text-left">
                    <div class="box-style-1 margin-b-30">
                        <div class="space-20"></div>
                        <h3>Upcoming Events</h3>
                        <ul class="list-unstyled">
                            <?php 
                                $events_sql = "SELECT * FROM events";
                                $events_result = $database->query($events_sql);

                                while(($eventsArray[]= mysqli_fetch_assoc($events_result))|| array_pop($eventsArray));
                                foreach($eventsArray as $event){
                                    $event_name = $event['name'];
                                    $event_url = $event['url'];
                                    echo "<li><a href='$event_url' target='_blank'>$event_name";
                                }

                            ?>
                           
    
                            </ul>
                             <!-- <a href="" class="btn btn-xs btn-primary flash-button" style="color: #fff !important;">Register Now</a></a></li> -->
                             <label class="control-label flash-button"style="color:#09c4f2 !important;">Register Now</label>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
        <hr>
       
        <div class=" news-flow">
            <div class="container">
            <div class="space-20"></div>
               <div class="row">
                    <div class="col-sm-6 section-padded" style="margin-top:-8em;">
                    <div class="heading-style-center wow animated  fadeInUp" data-wow-delay="0.1s">
                    <h2>Tweets by UgandaChamber</h2>
                     </div>
                        <div class="twt_wrap" >
                        <a class="twitter-timeline" 
                         data-chrome="transparent noborders noheader nofooter noscrollbar"
                         height="690"
                        href="https://twitter.com/UgandaChamber"></a> 
                       </div>
                    </div>
                        
                    <div class="col-sm-4 col-sm-offset-1 ">
                    <div class="heading-style-center wow animated  fadeInUp" data-wow-delay="0.1s">
                    <h2>Latest News</h2>
                        <?php

                              $news_sql = "SELECT * FROM news ORDER BY id DESC LIMIT 3";
                           $news_result = $database->query($news_sql);

                           while(($newsArray[]= mysqli_fetch_assoc($news_result))|| array_pop($newsArray));
                             $i = 1;
                           foreach($newsArray as $news){
                             
                               $id = $news['id'];
                               $title = $news['title'];
                               $body = $news['body'];
                               $url = $news['url'];
                               
                               if($url == ""){
                                   $url = "news.php";
                               }
                            //   var_dump($url);

                              echo     "<div class='news-flow-box margin-b-20 wow animated  fadeInUp' data-wow-delay='0.2s'>
                            <h2><a href='#'><div class='text ellipsis'><span class='text-concat'>$title</span></div></a></h2>
                           <!--  <ul class='list-inline'>
                                <li><a href='#'><i class='fa fa-calendar-check-o'></i>2016/10/13</a></li>
                            </ul> -->
                            <p class='text ellipsis'>
                               <span class='text-concat'> $body </span>
                            </p>
                           <p class='text-right lead'><a href=$url target='_blank'>Read More <i class='fa fa-angle-right'></i></a></p>
                        </div><!--news flow-->";
                           
                           }
              

                        ?>
                    </div>
<!--news flow-->
                    <nav>
                    <ul class="pager">
                   <!-- <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>-->
                    <li class="next"><a href="news.php">More News<span aria-hidden="true">&rarr;</span></a></li>
                    </ul>
                    </nav>
                      <div class="box-style-1 border-style  margin-b-30">
                        <div class="space-20"></div>
                        <h3>Useful links</h3>
                        <br/>
                        <div class="owl-theme testimonial-slide">
                        <div class="item">
                            <ul class="list-unstyled"  style="line-height: 20px !important;">
                            <li><a href="https://www.uganda-mining.go.ug" target="_blank">MEMD</a></li>
                            <li><a href="#">UIA</a></li>
                            <li><a href="http://www.mofa.go.ug/" target="_blank">MOFA</a></li>
                            </ul>
                        </div>
                        <div class="item">
                            <ul class="list-unstyled"  style="line-height: 20px !important;">
                            <li><a href="https://www.petroleum.go.ug" target="_blank" >PEPD</a></li>
                             <li><a href="#" target="_blank" >Women in Mining</a></li>
                             <li><a href="#" target="_blank" >UCMP Youtube</a></li>
                            <li><a href="#">DGSM</a></li>
                            <li><a href="http://portals.flexicadastre.com/uganda/" target="_blank">CADASTRE PORTAL</a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div><!--news end-->
        <hr>
            <div class="clients">
            <div class="container">
                <div class="heading-style-center">
                    <div class="space-20"></div>
                    <h2>Our Partners</h2>
                </div>
                 <div class="space-50"></div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="owl-theme client-slide">

                        <?php
                            $partners_sql =  "SELECT * FROM partners";
                            $partners_result = $database->query($partners_sql);
                            while(($partners[] = mysqli_fetch_assoc($partners_result)) || array_pop($partners));
                            foreach($partners as $partner){
                                $partner_name = $partner['name'];
                                $partner_logo = $partner['logo'];
                                
                            echo "    <div class='item'>
                                <a href='#'>
                                    <img src='images/logos/$partner_logo' alt='Partner Logo' 
                                    class='img-responsive'>
                                </a>
                            </div> ";
                            }

                        ?>
        
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-40"></div>
        </div>

       <?php include 'footer_js.php';?>