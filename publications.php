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
    /* CSS used here will be applied after bootstrap.css */

.productbox {
    position: relative;
 border: 1px solid #ddd;
border-radius: 4px;
-webkit-transition: all .2s ease-in-out; 
}
.caption {
padding:5px;
background-color:rgba(0,0,0,0.7);
    position: absolute;
    bottom: 0;
    width: 100%;
    max-height: 3.5em;
    height: 3.5em;
    line-height: 5px;
    /*margin-bottom:-1em;*/
    overflow: hidden;
  color: #FFF !important;

}
.finalprice {
  font-size:15px;
    color: #AAFCAE;
}
h5 {
  margin-top: 0px;
  color: #fff;
  max-height: 30px;
  overflow: hidden;
}
.caption h5{
	font-size: 14px !important;
}
.img-responsive img{
	width: 100%; 
    height: 300px;   
}
.container {
	width: 100%;
}
.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
  padding: 5px;
}
.btn-block {
margin-top: 5px;
}
.saleoffrate{
position: absolute;
    top:10px;
    left: 10px;
padding-top: 13px;
text-align:center;
background-color: rgba(76, 174, 76,0.8);
color: #FFFFFF;
border-radius: 50%;
height: 50px;
width: 50px;
line-height: 13px;
}
@media (min-width: 384px) and (max-width: 768px) {
  .img-responsive img{
      max-width: 50%;
  }
  .img-responsive{
      text-align: center;
  }  

}

.caption h5{
	color:#fff;
	font-size:15px !important; 
}
#publication{
  background: url("images/publications.jpg") no-repeat !important;
  background-size: cover;
  background-position: 0 0;
  background-attachment: fixed;
  padding: 20px 10px;
  padding-top: 400px;
}


</style>


<?php include 'head_css.php';?>
    <body>
        <!--<div id="preloader"></div>-->
        <!-- header -->
      <?php include 'nav_trans.php'; ?>
        <!-- header end-->
        <div class="" id="publication">
            <div class="container-fluid">
                <div class="row">
                <!--  <div class="col-sm-3 animated fadeInLeft" data-wow-delay="0.1s">
                       <img src="images/ucmp.png" width="250x250" style="margin-top:-8em !important"/>
                    </div> -->

                   <div class="col-sm-3 col-sm-push-9" style=" margin-top: -13.2em;">
                        <h1 style="font-size: 45px; color: #000; text-transform: uppercase;">
                        Publications </h1>
                    </div>
                </div>
            </div>
        </div><!--breadcrumb end-->
        <!--<hr>-->
        <div class="space-10"></div>
<div class="container-fluid">
	<div class="row">
    <?php
        $sql = "SELECT * FROM publications ORDER BY id DESC";
        $result = $database->query($sql);
        
        while(($publicationsArray[] = mysqli_fetch_assoc($result))|| array_pop($publicationsArray));
        foreach($publicationsArray as $publication){
            $title = $publication['title'];
            $cover = $publication['file'];
            $file = $publication['cover'];

            echo "<div class='col-xs-18 col-sm-3 col-md-2'>
			<div class='productbox'>
				<div class='imgthumb img-responsive'>
					<img src='files/publications/$cover' alt='$title'>
				</div>
				<div class='caption'>
	<h5 style='width: 180px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'>$title</h5>
	<span class='pull-right'>
	<a href='files/publications/$file' target='_blank' class='btn btn-default btn-xs' role='button'><i class='fa fa-eye'></i></a>
              <a href='files/publications/$file' download='$file' class='btn btn-info btn-xs' role='button'><i class='fa fa-download'></i></a> </span></div>
			</div>
		</div>";

        }
    ?>



		
	</div><!--/row-->
</div><!--/container -->
         <div class="space-50"></div>
<?php include 'footer_js.php';?>