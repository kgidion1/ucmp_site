<?php error_reporting(0); include 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include 'side.php'; ?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
    <!-- Content Header (Page header) -->
     <script src="dist/js/sweetalert.min.js" type="text/javascript"></script>
    <section class="content-header" style="background: #fff;padding: 15px;">
      <h1>
        UCMP Admin
        <small>Latest News</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Lastest News </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body  no-padding">
                        <div class="container">
                            <form action="news.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group form-group-sm">
                                            <label for="title" class="control-label">Title</label>
                                            <input type="text" class="form-control" id="caption" name="news_title"
                                                   placeholder="News Title" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <label for="title" class="control-label">Body</label>
                                        <textarea id="editor1" name="news_body" rows="10" cols="80"
                                                  style="resize: none !important;"></textarea>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group form-group-sm">
                                            <label for="news_url" class="control-label" id="newsLabel">News Url (if the
                                                news is gotten from other sites eg new vision etc)</label>
                                            <input type="text" class="form-control" id="news_url" name="news_url"
                                                   placeholder="Full article url www.newvision.ug">
                                            <div class="alert alert-danger" id="news_err" hidden><b>Invalid URL: You must begin with either http or https</b></div>
                                         </div>
                                    </div>
                                        <div class="col-md-2">
                                            <div class="form-group" style="margin-top: 1em;">
                                                <button type="submit" name="submit"
                                                        class="btn btn-success btn-block btn-flat"
                                                        onclick="check_url(event)">Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

        <?php

        if (isset($_POST['submit']) && ((isset($_POST['news_title']) && !empty($_POST['news_body'])) || isset($_POST['news_title']) && !empty($_POST['news_url']))) {
            $title = $_POST['news_title'];
            $body = $_POST['news_body'];
            $cleaned_body = $database->escape_value($body);
            $url = $_POST['news_url'];
//            if(!empty($url)){
//                if(!preg_match("/\bhttp/i", $url)){
//                    $url_err = "Invalid URL: You must begin with either http or https";
//                }
//                else {
//                    $sql = "INSERT INTO news (title, body, url) VALUES ('$title', ' $cleaned_body', '$url')";
//                    $result = $database->query($sql);
//                    if ($result) {
//                        echo "Added";
//
//                        echo '<script  type="text/javascript">
//
//                         function   myfunc()
//                            {
//                            window.location="news.php";
//                            }
//                            setTimeout(myfunc(),2000);
//
//                              </script>';
//                    } else {
//                        echo "Failed";
//                    }
//                }
//            }

            $sql = "INSERT INTO news (title, body, url) VALUES ('$title', ' $cleaned_body', '$url')";
            $result = $database->query($sql);
            if ($result) {
                echo "Added";

                echo '<script  type="text/javascript">          
         
                         function   myfunc()
                            {
                            window.location="news.php";
                            }
                            setTimeout(myfunc(),2000);
                         
                 </script>';
            } else {
                echo "Failed";
            }
        }


        //        function check_url($url_str){
        //            if(!empty($url_str)){
        //                if(!preg_match("/\b(?:(?:https?):\/\/ |www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i" ,$url_str)){
        //                    return "Invalid URL: You must begin with either http or https";
        //                }
        //            }
        //        }


        ?>

<!-- slider preview-->
  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Past News</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

               <?php
            $sql = "SELECT * FROM news";
            $result = $database->query($sql);

            while(($resultArray[]= mysqli_fetch_assoc($result))|| array_pop($resultArray));
    
           // return $resultArray;

            ?>
              <table class="table table-hover">
                <tr>
                  <th>Number</th>
                  <th>News Title</th>
                  <th>Details</th>
                   <th>url</th>
                  <th>Options</th>
                </tr>
                <tr>
                  <?php
                  $i = 1;
                    foreach ($resultArray as $news) {
                      $id = $news['id'];
                      $title = $news['title'];
                      $body = $news['body'];
                      $url = $news['url'];

                      # code...
                     echo "<tr><td>$i</td>
                  <td>$title</td>
                  <td>$body</td>
                  <td>$url</td>
                  <td>
                  <!--<a href='#' class='btn btn-primary  btn-xs'> Edit</a>-->
                  <button type='button' class='btn btn-danger btn-xs' onclick='remove_news($id)'>Remove</button>
                  </td></tr>";
                  $i++;
                    }

                  ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
   </section>
  </div>
  <!-- /.content-wrapper -->
 <?php include 'footer.php'; ?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Remove</h4>
      </div>
      <div class="modal-body">
     <p class="lead">Are you sure you want to delete this?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- ./wrapper -->
<?php include 'js.php'; ?>
<script>
CKEDITOR.replace( 'editor1', {
uiColor: '#CCEAEE',
height: 200
    } );

$(document).ready(function () {
    remove_news(id);
//    $('#submit').click(function () {
//    check_url(e);
//    });

})

function remove_news(id){
    swal({
        title: "Are you Sure?",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Remove",
        closeOnConfirm: false
    }, function () {
        $.post("xhr.php", {token: "delete_news", id: id}, function (response) {
            window.location.reload();
            //  alert(response);
            swal("", response, "success");
        });
        // location.reload();

    });
}

function check_url(e) {
    var url = document.getElementById("news_url");
    if(url.value != ""){
        if(!url.value.match(/\bhttp/i)) {
            e.preventDefault();
            url.value = "";
            $('#news_err').show();

        }
        else {
            e.default();
        }
    }
}

  </script>