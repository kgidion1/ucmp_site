<?php error_reporting(0); include 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include 'side.php'; ?>
<?php
  if(isset($_POST['submit'])){

    $file_dir = "../files/publications/";
    $name = $_POST['ptitle'];

    $file_name = basename($_FILES['pfile']['name']);
    $cover_name = basename($_FILES['pcover']['name']);

    $file_name = time().str_replace(" ", "_", $file_name);
    $cover_name = time().str_replace(" ", "_", $cover_name);

    $file = $_FILES['pfile']['tmp_name'];
    $cover = $_FILES['pcover']['tmp_name'];

    move_uploaded_file($file, $file_dir.$file_name);
    move_uploaded_file($cover, $file_dir.$cover_name);

    $sql = "INSERT INTO publications (title, cover, file) VALUES ('$name', '$file_name', '$cover_name')";
    $result = $database->query($sql);
    if($result){
      echo "Saved";
    }else{
      echo "Failed";
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
        <small>Publications</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">New Publication</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body  no-padding">
            <div class="container">
    <form action="publications.php" method="post" enctype="multipart/form-data">
        <div class="row">
                <div class="col-md-2">
                    <div class="form-group form-group-sm">
                        <label for="ptitle" class="control-label">Publication Title</label>
                        <input type="text" class="form-control" id="ptitle" name="ptitle" placeholder="Publication Title" required="required">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cover" class="control-label">Cover (.jpg,.png,.jpeg only)</label>
                      <input id="pcover" type="file" name="pcover" required="required">
                    </div>
                </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="pdf" class="control-label">Pdf (.pdf only)</label>
                      <input id="pfile" type="file" name="pfile" required="required">
                    </div>
                </div>
                  <div class="col-md-2">
                    <div class="form-group" style="margin-top: 1em;">
                      <button type="submit" name="submit" class="btn btn-success btn-block btn-flat"><i class="fa fa-upload"></i> Upload</button>
                       
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
              <h3 class="box-title">Event List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <?php
            $sql = "SELECT * FROM publications";
            $result = $database->query($sql);

            while(($resultArray[]= mysqli_fetch_assoc($result))|| array_pop($resultArray));
    
           // return $resultArray;

            

            ?>
              <table class="table table-hover">
                <tr>
                  <th>Number</th>
                   <th>Publication Title</th>
                   <th>Cover</th>
                   <th>Pdf File</th>
                  <th>Options</th>
                </tr>
                <tr>
                      <?php
                  $i = 1;
                    foreach ($resultArray as $publication) {
                      $id = $publication['id'];
                      $title = $publication['title'];
                      $cover = $publication['cover'];
                      $file = $publication['file'];
                   

                      # code...
                     echo "<tr><td>$i</td>
                  <td>$title</td>
                  <td>$file</td>
                  <td>$cover</td>
                 
                  <td>
                  <!--<a href='#'' class='btn btn-primary  btn-xs'> Edit</a>-->
                  <button type='button' class='btn btn-danger btn-xs' onclick='remove_doc($id);'>Remove</button>
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
        <h4 class="modal-title" id="myModalLabel">Publications </h4>
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
  function remove_doc(id){
     swal({   title: "Are you Sure?",   text: "",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, Remove",   closeOnConfirm: false }, function(){   
              $.post("xhr.php", {token:"delete_publication", id:id}, function(response){
                window.location.reload();
            //  alert(response);
                  swal("", response, "success"); 
                  });
                 // location.reload();
                 
              });
}
</script>