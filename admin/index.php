<?php
//error_reporting(0);
session_start();
if(!isset($_SESSION['uid'])){
  header("location:login.php");
}
?>
<?php include 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include 'side.php'; ?>

<?php

if(isset($_POST['submit'])){
  
  $slider_dir = "../images/slide/";

  $caption = $_POST['caption'];
  $image_name = basename($_FILES['slider_image']['name']);
  $image_name = time().str_replace(" ", "_", $image_name);
  $image_file = $_FILES['slider_image']['tmp_name'];

  move_uploaded_file($image_file, $slider_dir.$image_name);

  $sql = "INSERT INTO sliders (filename, caption) VALUES ('$image_name', '$caption')";
    $result = $database->query($sql);
    if ($result) {
        echo "Added!";
    } else {
        echo "An Error Ocurred. Try Again.";
    }
} 

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <script src="dist/js/sweetalert.min.js" type="text/javascript"></script>
    <section class="content-header" style="background: #fff;padding: 15px;">
      <h1>
        UCMP Admin
        <small>Sliders</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">New Slider Images</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body  no-padding">
            <div class="container">
    <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="row">
                <div class="col-md-4">
                    <div class="form-group form-group-sm">
                        <label for="caption" class="control-label">Caption</label>
                        <input type="text" class="form-control" id="caption" placeholder="Slider Caption" name="caption" required="required">
                        <p class="text-red hidden" id="caption_error">Please Enter a Caption  for this Image</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="pdf" class="control-label">Slider Image (.jpg,.png,.jpeg only (613x 400))</label>
                      <input type="file" name="slider_image" id="slider_image" required="required">
                      <p class="text-red hidden" id="file_error">Please Select an Image</p>
                    </div>
                </div>
                  <div class="col-md-4">
                    <div class="form-group" style="margin-top: 1em;">
                       <button type="submit" name="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-upload"></i> Upload</button>
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

<!-- slider preview-->
  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Slider Images</h3>
         <!--      <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <?php
            $sql = "SELECT * FROM sliders";
            $result = $database->query($sql);

            while(($resultArray[]= mysqli_fetch_assoc($result))|| array_pop($resultArray));
    
           // return $resultArray;

            

            ?>
              <table class="table table-hover">
                <tr>
                  <th>Number</th>
                  <th>Image</th>
                  <th>Caption</th>
                  <th>Options</th>
                </tr>
              
                  <?php
                  $i = 1;
                    foreach ($resultArray as $slider) {
                      $id = $slider['id'];
                      $file = $slider['filename'];
                      $caption = $slider['caption'];

                      # code...
                     echo "<tr><td>$i</td>
                  <td><img src='../images/slide/$file' width='100 x 100' class='img-responsive'></td>
                  <td>$caption</td>
                  <td>
                  <!--<a href='#'' class='btn btn-primary  btn-xs'> Edit</a>-->
                  <button type='button' class='btn btn-danger btn-xs' onclick='remove_slide($id)'>Remove</button>
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
        <h4 class="modal-title" id="myModalLabel">Delete Slider</h4>
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
<script type="text/javascript">
 

function remove_slide(id){
  
            swal({   title: "Are you Sure?",   text: "",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, Delete",   closeOnConfirm: false }, function(){   
              $.post("xhr.php", {token:"delete_slider", id:id}, function(response){
                window.location.reload();
            //  alert(response);
                  swal("", response, "success"); 
                  });
                 // location.reload();
                 
              });

}
</script>
