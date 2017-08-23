
<?php
error_reporting(0);
 include 'header.php';

 ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include 'side.php'; ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <script src="dist/js/sweetalert.min.js" type="text/javascript"></script>
    <section class="content-header" style="background: #fff;padding: 15px;">
      <h1>
        UCMP Admin
        <small>Upcoming Events</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Upcoming Events</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body  no-padding">
            <div class="container">
    <form action="upcoming.php" method="post" enctype="multipart/form-data" id="event_form">
        <div class="row">
                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="evnanne" class="control-label">Event Name</label>
                        <input type="text" class="form-control " id="evname" name="evname" placeholder="Event Name">
                        <p class="text-red hidden" id="evname_error">Please Enter an Event Name</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="pdf" class="control-label">Pdf File (Optional)</label>
                      <input   type="file" name="event_file" id="event_file" class="disable-file" >
                      <p class="text-red hidden" id="evfile_error">Please Select a File</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="WebsiteUrl" class="control-label">Website URL(event website url)</label>
                        <input type="text" class="form-control disable-url" id="web_url" name="web_url" placeholder="http://www.ucmp.ug" >
                        <p class="text-red hidden" id="evlink_error">Invalid URL: You must begin with either http or https</p>
                    </div>
                </div>

                  <div class="col-md-3">
                    <div class="form-group" style="margin-top: 1em;">
                    <button name="save_e" class="btn btn-success btn-lg" type="submit" onclick="save_event(event);">
                    <i class="fa fa-plus"></i> Add</button>
                    </div>
                </div>
        </div>
    </form>

<?php
if(isset($_POST['evname']) && isset($_POST['save_e'])){
  $file_dir = "../files/";

  $evname = $_POST['evname'];
  $url = $_POST['web_url'];
  $file_name = basename($_FILES['event_file']['name']);
  $pdf_file = "";   $file = "";

  if($file_name != ""){
     $file_name = time().str_replace(" ", "_", $file_name);
     $pdf_file = $_FILES['event_file']['tmp_name'];
     $file = $file_dir.$file_name;
  }
    move_uploaded_file($pdf_file, $file);

    $sql = "INSERT INTO events (name, filename, url) VALUES ('$evname', '$file_name', '$url')";
    $result = $database->query($sql);
    if ($result) {

        echo "Added!";

        echo '<script  type="text/javascript">
           
          
          function   myfunc()
             {
             window.location="upcoming.php";
             }
             
             setTimeout(myfunc(),2000);
           </script>';
    } else {
        echo "An Error Ocurred. Try Again.";
    }
  

}
?>
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
            $sql = "SELECT * FROM events";
            $result = $database->query($sql);

            while(($resultArray[]= mysqli_fetch_assoc($result))|| array_pop($resultArray));
    
           // return $resultArray;

            

            ?>
              <table class="table table-hover">
                <tr>
                  <th>Number</th>
                   <th>Event Name</th>
                  <th>Pdf File</th>
                  <th>Site url</th>
                  <th>Options</th>
                </tr>
                <tr>
                 <?php
                  $i = 1;
                    foreach ($resultArray as $event) {
                      $id = $event['id'];
                      $name = $event['name'];
                      $file = $event['filename'];
                      $url = $event['url'];

                      # code...
                     echo "<tr><td>$i</td>
                  <td>$name</td>
                  <td>$file</td>
                  <td>$url</td>
                  <td>
                  <!--<a href='#'' class='btn btn-primary  btn-xs'> Edit</a>-->
                  <button type='button' class='btn btn-danger btn-xs' onclick='remove_event($id)'>Remove</button>
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
        <h4 class="modal-title" id="myModalLabel">Delete Upcoming Events</h4>
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

function save_event(e){
  $('#evname_error').addClass('hidden');
  $('#evfile_error').addClass('hidden');
  $('#evlink_error').addClass('hidden');
  
  if($('#evname').val() == ""){
    e.preventDefault();
    $('#evname_error').removeClass('hidden');
    return 1;
  }
  else if(!$('#web_url').val().match(/\bhttp/i) ){
      e.preventDefault();
      $('#web_url').val(' ');
      $('#evlink_error').removeClass('hidden');
      return 1;
  }
  else {
    e.default();
    $('#event_form').submit();
  }
}

function remove_event(id){
    swal({
        title: "Are you Sure?",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Remove",
        closeOnConfirm: false
    }, function () {
        $.post("xhr.php", {token: "delete_event", id: id}, function (response) {
            window.location.reload();
            //  alert(response);
            swal("", response, "success");
        });
        // location.reload();

    });
}

$('#event_file').on('input',function () {
    if($(this).get(0).files.length > 0)
        $('#web_url').attr('disabled',true);
    else
        $('#web_url').attr('disabled',false);
});
$('#web_url').on('input',function () {
    if($(this).val().length)
        $('.disable-file').prop('disabled','true');
    else
        $('.disable-file').prop('disabled','false');
});

</script>