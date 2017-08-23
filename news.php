<style>
.list-group a:nth-child(even){
    background: #fff;
    color: #444;
}

.list-group a:nth-child(odd){
    /*background: #fafafa;
    color: #444;*/
}

.list-group a:hover{
    background:transparent !important;
    /*color: #444;*/
}
</style>

<?php include 'head_css.php';?>
    <body>
        <!--<div id="preloader"></div>-->
        <!-- header -->
      <?php include 'nav_trans.php'; ?>
        <!-- header end-->
        <div class="breadcrumb-v1 b-parllax">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 animated text-center">
                        <h1>Latest News</h1>
                    </div>
                      <div class="col-sm-3 col-sm-offset-1 animated fadeInRight" data-wow-delay="0.1s">
                       <img src="images/ucmp.png" style="margin-top:-8em; !important"/>
                    </div>
                </div>
            </div>
        </div><!--breadcrumb end-->
        <!--<hr>-->
   <div class="space-70"></div>
        <div class="container">
            <div class="row">
                <?php
                    $news_sql = "SELECT * FROM news ORDER BY id DESC";
                    $news_result = $database->query($news_sql);
                    while(($newsArray[] = mysqli_fetch_assoc($news_result)) || array_pop($newsArray));
                    foreach($newsArray as $news){
                        $title = $news['title'];
                        $body = $news['body'];
                        $link = $news['url'];

                 echo   " <div class='col-md-6 margin-b-40'>
                    <div class='grid-post'>
                        <a href='#' class='bw-images'> <!-- <img src='images/box/img-1.jpg' alt='' class='img-responsive full-img'> --></a>
                        <div class='grid-post-meta'>
                            <h3>$title</h3>
                            <p>
                                $body
                            </p>
                            <a href='$link' target=\"_blank \" style='".hide_link($link)."'>read more</a>
                        </div>
                    </div>
                </div><!--post col end-->";

                    }

                    function hide_link($link_arr){
                        $link_str = substr_count($link_arr, 'http');
                        if($link_str >= 1 ){
                            return 'display: block';
                        }
                        else
                            return 'display: none';

                    }
                ?>
              

            </div><!--row end-->
      <!--       <div class="text-center">
                <nav>
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
            </div> -->


        </div><!--container-end-->
         <!--<div class="space-50"></div>-->
<?php include 'footer_js.php';?>