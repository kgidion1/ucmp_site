<?php error_reporting(0); include 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include 'side.php'; ?>
<?php
  if(isset($_POST[submit])){
      $file_dir = "../files/";
      $fname = $_POST['fname'];

      $file_name = "members.pdf";
      $the_file = $_FILES['mfile']['tmp_name'];

      move_uploaded_file($the_file, $file_dir.$file_name);

      $sql = "UPDATE members SET file = '$file_name' WHERE id = '1'";
      $result = $database->query($sql);
      if($result){
        echo "Updated";
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
        <small>Members</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">New Membership File</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body  no-padding">
            <div class="container">
    <form action="membership.php" method="post" enctype="multipart/form-data" id="membership">
        <div class="row">
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="fname" class="control-label">File Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="File Name" required="required">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="logo" class="control-label">PDF File (.pdf)</label>
                      <input id="exampleInputFile" type="file" name="mfile" required="required">
                    </div>
                </div>
                  <div class="col-md-3">
                    <div class="form-group" style="margin-top: 1em;">
                 <button type="submit" name="submit" class="btn btn-success btn-block btn-flat"><i class="fa fa-upload"></i> Update</button>
                       
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
              <h3 class="box-title">Membership File</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                 <?php
            $sql = "SELECT * FROM members";
            $result = $database->query($sql);

            while(($resultArray[]= mysqli_fetch_assoc($result))|| array_pop($resultArray));
    
           // return $resultArray;

            

            ?>
              <table class="table table-hover">
                <tr>
                  <th>Number</th>
                   <th>Pdf File</th>
                    <th>Date Updated</th>
                 
                </tr>
                <tr>
                    <?php
                  $i = 1;
                    foreach ($resultArray as $member) {
                      $id = $member['id'];
                      $file = $member['file'];
                      $time = $member['time_updated'];
                     // $url = $news['url'];

                      # code...
                     echo "<tr><td>$i</td>
                  <td>$file</td>
                 
                 <td>$time</td>
                  <td>
                
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
<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
</div> -->
</div>
<!-- ./wrapper -->






<?php include 'js.php'; ?>
<script type="text/javascript">
function the_form(){
 // $('#membership').get(0).submit();
 // alert("X");
 document.getElementById("membership").submit();
}
</script>