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

#min_pet{
  background: url("images/MIN.JPG") no-repeat !important;
  background-size: cover;
  background-position: 0 0;
  background-attachment: fixed;
  padding: 20px 10px;
  padding-top: 250px;
}

body{
    background: #fff;
}
</style>


<?php include 'head_css.php';?>
    <body>
        <!--<div id="preloader"></div>-->
        <!-- header -->
      <?php include 'nav_trans.php'; ?>
        <!-- header end-->
        <?php
            require_once("src/functions/database.php");
            $docs_sql = "SELECT * FROM min_pet ORDER BY id DESC";
            $docs_result = $database->query($docs_sql);
            while(($docsArray[]= mysqli_fetch_assoc($docs_result))|| array_pop($docsArray));
        ?>
        <div  id="min_pet">
            <div class="container-fluid">
                <div class="row">
                 <!--  <div class="col-sm-3 animated fadeInLeft" data-wow-delay="0.1s">
                       <img src="images/ucmp.png" style="margin-top:-8em; !important"/>
                    </div> -->
                   <!--  <div class="col-sm-6 col-sm-push-3 animated text-center">
                        <h1 style="font-size:30px;"></h1>
                    </div> -->
                    <div class="col-sm-6 pull-right" style="margin-top:0em;">
                        <h1 style="font-size: 45px; color: #fff;text-transform: uppercase;">
                        Minerals &amp; Petroleum </h1>
                    </div>
                    
                </div>
            </div>
             <br><br>
        </div><!--breadcrumb end-->
        <section class="section-padded half-image-section" style="background: #fff;"> 
                <div class="container-fluid"  >
                    <div class="row" style="margin-top:-4em;">
                         <div class="col-md-5 ">
                            <div class="left-title wow  fadeInUp animated" data-wow-delay="0.2s" 
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <!--<h4>Petroleum</h4>-->
                                <?php
                                $min_docs = array();
                                $pet_docs = array();
                                foreach($docsArray as $doc){
//                                    print_r($doc);
                                    $category = $doc['category'];
                                        if($category == '1'){
                                            array_push($min_docs, $doc);
                                        }else{
                                            array_push($pet_docs, $doc);
                                        }
                                    $file = $doc['file'];
                                }
                                
                                ?>
                                <h3>Mineral Sector</h3>
                                <hr>
                            </div>
                           <div class="list-group" style="border-radius:none !important;">
                            <?php
                                foreach($min_docs as $mineral){
                                    $mineral_name = $mineral['name'];
                                    $mineral_file = $mineral['file'];
                                    $url = $mineral['url'];
                                    if ($url!="" )
                                    {
                                        $mineral_file = urldecode($url);
                                    }
                                    else {
                                        $mineral_file = "files/minerals/" . $mineral_file;
                                    }
//                                    echo "anything here ..............";
                            echo "<h5 href='files/minerals/$mineral_file' class='list-group-item list-group-item-action list-group-item-success' style='padding: 15px;background:#fff;' download >$mineral_name

                          <p class='pull-right'>
                        <a target='_blank' class='btn btn-success' href='$mineral_file'><i class='fa fa-eye'></i></a>  
                         <a target='_blank'  class='btn btn-primary' href='$mineral_file' download='$mineral_file' ><i class='fa fa-download'></i></a> 
                            </p>
                            </h5>";   
                            }
                            ?>

                                </div>
                        </div>

                        <div class="col-md-7">
                            <div class="left-title wow  fadeInUp animated" data-wow-delay="0.2s" 
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <!--<h4>Petroleum</h4>-->
                                <h3>Petroleum Sector</h3>
                                <hr>
                            </div>
                            <div class="list-group">
                            <div >
                            
                            </div>
                             
                                  <?php
                                  
                                foreach($pet_docs as $petrolic){
                                    $petrolic_name = $petrolic['name'];
                                    $petrolic_file = $petrolic['file'];
                                    
                                    $url = $petrolic['url'];
                                    if ($url!="" )
                                    {
                                    $petrolic_file=urldecode($url);
                                    }
                                    else {
                                    
                                    $petrolic_file="files/minerals/".$petrolic_file;
                                    
                                    }
                                    
                               echo "<h5 href='files/minerals/$petrolic_file' class='list-group-item list-group-item-action list-group-item-success' style='padding: 15px;background:#fff;' download >".substr($petrolic_name, 0,60)."
                            <p class='pull-right'>
                              <a target='blank' class='btn btn-success'  href='$petrolic_file' ><i class='fa fa-eye'></i></a> 
                              <a target='_blank' class='btn btn-primary'  href='$petrolic_file' download='$petrolic_file'  ><i class='fa fa-download'></i>
                              </a>
                            </p>...</h5>";   
                                }

                            ?>
                                </div>

                    </div>
                    <!-- end of row        -->
                </div>
            </div>
             <div class="space-50"></div>
        </section>
        

       <?php include 'footer_js.php';?>