<?php error_reporting(0); include 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include 'side.php'; ?>
<?php
if(isset($_POST['submit'])){
  $logo_dir = "../images/logos/";
  $pname = $_POST['pname'];

  $logo_name = basename($_FILES['plogo']['name']);
  $logo_name = time().str_replace(" ", "_", $logo_name);

  $logo_file = $_FILES['plogo']['tmp_name'];

  move_uploaded_file($logo_file, $logo_dir.$logo_name);

  $sql = "INSERT INTO partners (name, logo) VALUES ('$pname', '$logo_name')";
  $result = $database->query($sql);
  if($result){
    echo "Saved";
  }else{
    echo "503";
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
        <small>Partners</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">New Partners</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body  no-padding">
            <div class="container">
    <form action="partners.php" method="post" enctype="multipart/form-data">
        <div class="row">
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="pname" class="control-label">Partner Name</label>
                        <input type="text" class="form-control" name="pname" id="pname" placeholder="Partner Name" required="required">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="logo" class="control-label">Logo (.jpg,.png,.jpeg)</label>
                      <input id="exampleInputFile" type="file" name="plogo" required="required">
                    </div>
                </div>
                  <div class="col-md-3">
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
            $sql = "SELECT * FROM partners";
            $result = $database->query($sql);

            while(($resultArray[]= mysqli_fetch_assoc($result))|| array_pop($resultArray));
    
           // return $resultArray;

            

            ?>
              <table class="table table-hover">
                <tr>
                  <th>Number</th>
                   <th>Partner Name</th>
                  <th>Logo</th>
                  <th>Options</th>
                </tr>
                <tr>
                    <?php
                  $i = 1;
                    foreach ($resultArray as $partner) {
                      $id = $partner['id'];
                      $name = $partner['name'];
                      $logo = $partner['logo'];
                     // $url = $news['url'];

                      # code...
                     echo "<tr><td>$i</td>
                  <td>$name</td>
                  <td>$logo</td>
                 
                  <td>
                 <!--<a href='#'' class='btn btn-primary  btn-xs'> Edit</a>-->
                  <button type='button' class='btn btn-danger btn-xs' onclick='remove_partner($id)'>Remove</button>
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
        <h4 class="modal-title" id="myModalLabel">Delete Logo </h4>
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
  function remove_partner(id){
     swal({   title: "Are you Sure?",   text: "",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, Remove",   closeOnConfirm: false }, function(){   
              $.post("xhr.php", {token:"delete_partner", id:id}, function(response){
                window.location.reload();
            //  alert(response);
                  swal("", response, "success"); 
                  });
                 // location.reload();
                 
              });
}
</script>