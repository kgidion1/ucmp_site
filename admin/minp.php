<?php error_reporting(0); include 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include 'side.php'; ?>

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
              <h3 class="box-title">Minerals and Petroleum</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body  no-padding">
            <div class="container">
    <form action="minp.php" method="post" enctype="multipart/form-data">
        <div class="row">
                <div class="col-md-2">
                    <div class="form-group form-group-sm">
                        <label for="fname" class="control-label">File Name </label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="File Name or URL" required="required">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="logo" class="control-label">Category</label>
                     <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="cat">
                  <option selected="selected" value="1">Minerals</option>
                  <option value="2">Petroleum</option>
                </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="logo" class="control-label">PDF File (.pdf)</label>
                      <input id="exampleInputFile" type="file" name="mpfile" >
                    </div>
                </div>
                  <div class="col-md-3">
                    <div class="form-group" style="margin-top: 1em;">
                           <button type="submit" name="submit" class="btn btn-success btn-block btn-flat" onclick="check_url(event)" ><i class="fa fa-upload"></i> Upload</button>
                     </div>
                </div>
               
                <div class="col-md-12">
                    <div class="form-group form-group-sm">
                        <label for="fname" class="control-label">URL</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Begin with http:// or https://">
                        <p class="text-red hidden" id="evlink_error">Invalid URL: You must begin with either http or https</p>
                    </div>
                </div>
                
        </div>
    </form>
    
    <?php
    //ob_start();
    //ob_flush();
    //header('Location:: http://');
    //header("Refresh:0");
      if(isset($_POST['submit']) && isset($_POST['fname'])){

          $file_dir = "../files/minerals/";

          $name = $_POST['fname'];
          $category = $_POST['cat'];
          $aurl=$_POST['url'];
          
          $file_name = basename($_FILES['mpfile']['name']);
          $file_name_orig = basename($_FILES['mpfile']['name']);
         
          if($file_name != ""){
            $file_name = time().str_replace(" ", "_", $file_name);
          }
         // $file_name = time().str_replace(" ", "_", $file_name);
    
          $file  = $_FILES['mpfile']['tmp_name'];
          
//          echo $name;
//          echo $file_name;
          
          if ($aurl!="" && $file_name_orig =="") //if the url is provided
            {
          	//saving url
            $sql = "INSERT INTO min_pet (name, category, file,url) VALUES ('$name', '$category', '','$aurl')";
           	$result = $database->query($sql);
         
          	if($result)
          	{
          	echo "<div style='color:green'> URL Upload was successful.</div>";
          	
          	echo '<script  type="text/javascript">
          	    
          	   
          	   function   myfunc()
          	      {
          	      window.location="minp.php";
          	      }
          	      setTimeout(myfunc(),2000);
          	   
          	        </script>';
          	}
          	else
          	{
          	 echo "<div style='color:red'> Sorry, URL Upload failed.</div>";
          	}
              
           }
          else {

          $sql = "INSERT INTO min_pet (name, category, file,url) VALUES ('$name', '$category', '$file_name','')";
          if( move_uploaded_file($file, $file_dir.$file_name))
          {
              $result = $database->query($sql);
              echo "<div style='color:green'> PDF Upload was successful.</div>";

              echo '<script  type="text/javascript">
    	       	   
                   function   myfunc()
                      {
                      window.location="minp.php";
                      }
                      setTimeout(myfunc(),2000);
            	   
    	            </script>';
    	
    	   }
    	   else
    	   {
            echo "Failed";
           }
         }


}else {
//ß	header('Location:: http://');
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
              <h3 class="box-title">Minerals and Petroleum</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <?php
            $sql = "SELECT * FROM min_pet";
            $result = $database->query($sql);

            while(($resultArray[]= mysqli_fetch_assoc($result))|| array_pop($resultArray));
    
           // return $resultArray;

            

            ?>
              <table class="table table-hover">
                <tr>
                  <th>Number</th>
                    <th>File Name  </th>
                   <th>Pdf File</th>
                    <th>Category</th>
                  <th>Options</th>
                </tr>
                   <?php
                  $i = 1;
                    foreach ($resultArray as $min_or_pet) {
                      $id = $min_or_pet['id'];
                      $name = $min_or_pet['name'];
                      $category = $min_or_pet['category'];
                      $file = $min_or_pet['file'];
                      $url=$min_or_pet['url'];
                      if ($url!="")
                      {
                      
                      }
                      if($category == '1'){
                        $category = "Minerals";
                      }else{
                        $category = "Petroleum";
                      }
                      $file = $min_or_pet['file'];
                     // $url = $news['url'];

                      # code...
                     echo "<tr><td>$i</td>
                  <td>$name</td>
                  <td>$file</td>
                  <td>$category</td>
                 
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
        <h4 class="modal-title" id="myModalLabel">Minerals and Petroleum</h4>
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
    function remove_doc(id) {
        swal({
            title: "Are you Sure?",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Remove",
            closeOnConfirm: false
        }, function () {
            $.post("xhr.php", {token: "delete_minpet_doc", id: id}, function (response) {
                window.location.reload();
                //  alert(response);
                swal("", response, "success");
            });
            // location.reload();

        });
    }

    function check_url(e) {
        $('#evlink_error').addClass('hidden');

        if($('#url').val() != ""){
            if(!$('#url').val().match(/\bhttp/i)){
                e.preventDefault();
                $('#url').val(' ');
                $('#evlink_error').removeClass('hidden');
            }
            else {
                e.default();
            }
        }
        else {
            e.default();
        }
    }
</script>