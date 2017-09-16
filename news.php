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
.grid-post-meta h3 {
    color: #5d3a0f;
    text-transform: capitalize;
    font-size: 12px !important;
}
.grid-post {
    border: 1px solid #eee;
    height: 200px;
    overflow-y: auto;
}
</style>

<?php include 'head_css.php';?>
    <body>
        <!--<div id="preloader"></div>-->
        <!-- header -->
      <?php include 'nav.php'; ?>
        <!-- header end-->
        <div class="breadcrumb-v1 b-parllax">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 animated text-center" style="margin-top:-4em !important">
                        <h1>Latest News</h1>
                    </div>
                      <div class="col-sm-3 pull-right animated fadeInRight" data-wow-delay="0.1s">
                       <img src="images/ucmp.png" style="margin-top:-12em !important"/>
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
                            <div id='vary_body'> ".$body."</div>                              
                            <a href='$link' target='_blank' style='".hide_link($link)."'></a>
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

                    function check_body_size($body_arr)
                    {
                        $string = preg_replace('/\s+?(\S+)?$/', '', substr($body_arr, 0, 100));

                        $body_len = str_word_count($body_arr,1);
                        $body="";
//                        return $body_len;
//                        $body_len = strlen($body_arr);
                        if(count($body_len) > 100)
                        {
                            for($i=0; $i<100; $i++){$body.= $body_len[$i];}
                            return $body."<button type='button' class=\"btn btn-default\" id=\"btnMore\" onclick=\"show_full_body($body_arr)\">more&raquo;</button>" ;
                        } else {
                            return $body_arr;
                        }

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

<script type="text/javascript">
    $(document).ready(function () {
        show_full_body(body_arr);

        var arr_len = $('#vary_body').val();
        if(arr_len.length > 50){
            $('#vary_body').replace('/\s+?(\S+)?$/',arr_len.substr(0, 50));
            $('#btnMore').show();
        }

//        function check_body() {
//            $('#vary_body').addClass('hidden');
//            $('#read_data').addClass('hidden');
//
//            var str_len = $('#vary_body').val();
//            if(str_len.length > 50){
//                $('#vary_body').html(str_len.substr(0,50));
//                $('#read_data').removeClass('hidden');
//            }
//            else {
//                $('#vary_body').html(str_len.length);
//            }
//        }
//
//        function show_full_body(body_arr) {
////            $('#btnMore').addClass('hidden');
////
////            $('#vary_body').val(body_arr);
////            var body_len = body_arr.length;
////            var str_arr = body_arr.replace('/\s+?(\S+)?$/', '',body_arr.substr(50, body_len));
//            alert('you shd see the full body ....');
//            console.log(body_arr);
//
//        }
//
//
//////        check_size(body_arr);
////
////        var body_size = $('#body_size').val();
////        if (body_size.length <= 50) {
////            $('#body_size').html(body_size.length);
////        } else {
////            $('#body_size').html(body_size);
////        }
    });

    function show_full_body(body_arr) {
        $("#vary_body").html(body_arr);
    }

//    function check_body_len(body_size){
//        var str_len = body_size.length;
////                alert(str_len.length);
////        alert(str_len.substr(0, 11));  // using the substring method ..........
//        $('#body_size').html(str_len);
//    }

//    var body_size = $('#body_size').val();
//    if(body_size.length > 50){
//        $('#body_size').html(body_size.length);
//    } else {
//        $('#body_size').html(body_size);
//    }
//
//    function check_size(body_arr) {
//        var body_size = body_arr.length;
//        if(body_size > 50) { $('#body_size').html(body_arr); }
//        else{ $('#body_size').html(body_size); }
//    }
</script>
