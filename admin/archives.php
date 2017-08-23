<?php error_reporting(0); include 'header.php'; if(!isset($_SESSION['uid'])){ header("location:login.php");}?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include 'side.php';  
if (isset($_POST['submit']))
 {

echo '<script  type="text/javascript">

   location.reload();
   
   </script>';

	 }
?>
 
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <script src="dist/js/sweetalert.min.js" type="text/javascript"></script>
    <section class="content-header" style="background: #fff;padding: 15px;">
      <h1>
        UCMP Admin
        <small>Archives</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">New Archive</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body  no-padding">
            <div class="container">
    <form action="archives.php" method="post" enctype="multipart/form-data" >
        <div class="row">
                 <div class="col-md-2">
                    <div class="form-group form-group-sm">
                        <label for="ptitle" class="control-label">Publication Title</label>
                        <input type="text" class="form-control" id="ptitle" placeholder="Publication Title">
                    </div>
                </div>
                  <div class="col-md-3">
                    <div class="form-group">
                    <label for="logo" class="control-label">Category</label>
                     <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="cat"  id="filecategory">
                  <option selected="selected" value="Conferences">Conferences</option>
                  <option value="Workshops">Workshops</option>
                   <option value="Seminars">Seminars</option>
                     <option value="Presentations">Presentations</option>
                       <option value="Gallery">Gallery</option>
                </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group form-group-sm">
                        <label for="evnanne" class="control-label">File Name / Caption </label>
                        <input type="text" class="form-control" id="evname" name="fname" placeholder="File Name" required="required">
                        <p class="text-red hidden" id="evname_error">Please Enter an Event Name</p>
                    </div>
                </div>

                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="pdf" class="control-label">File(.pdf,jpg,png,jpeg,docx,doc,ppt)</label>
                      <input id="exampleInputFile" type="file"  name="afile">
                    </div>
                </div>
                           <div class="col-md-2">
                    <div class="form-group  hidden" id="filedate">
                    <label for="logo" class="control-label">Year</label>
                     <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="year">
                  <option selected="selected" value="2017">2017</option>
                  <option value="2016">2016</option>
                   <option value="2015">2015</option>
                     <option value="2014">2014</option>
                       <option value="2013">2013</option>
                        <option value="2012">2012</option>
                         <option value="2011">2011</option>
                          <option value="2010">2010</option>
                </select>
                    </div>
                </div>
                
                  <div class="col-md-2">
                    <div class="form-group" style="margin-top: 1em;">
                           <button type="submit" name="submit" class="btn btn-success btn-block btn-flat" onclick="check_url(event)" ><i class="fa fa-upload"></i> Upload</button>
                    </div>
                </div>
               <div class="col-md-12">
                    <div class="form-group form-group-sm">
                        <label for="evnanne" class="control-label">Url </label>
                        <input type="text" class="form-control" id="aurl" name="aurl" placeholder="Begin with http:// or http://">
                        <p class="text-red hidden" id="evname_error">Invalid URL: You must begin with either http or https</p>
                    </div>
                </div>
        </div>
    </form>
    
    
       <?php
       //header("Location: $url");
         if(isset($_POST['submit']) && isset($_POST['fname'])){

             echo '<script src="" type="text/javascript">
              window.location.reload();
              
              </script>';

             $file_dir = "../files/archives/";

             $category = $_POST['cat'];
             $year = $_POST['year'];
             $name = $_POST['fname'];
             $aurl = $_POST['aurl'];
             ///js
             $uploadOK = 1; //file upload
             $saveURL = 0;

             //js

             $file_name = basename($_FILES['afile']['name']);

             if ($file_name != "") {
                 $file_name = time() . str_replace(" ", "_", $file_name);
             }

             // $Filename=basename($_FILES['afile']['name']);
             $target_file = $file_dir . "$file_name";
             $documentType = pathinfo($target_file, PATHINFO_EXTENSION);

             //if files exists
             if (file_exists($target_file) && ($file_name != "")) {
                 echo "<div style='color:orange'>Sorry, file already exists.</div>";
                 $uploadOK = 0;
             }

             $file = $_FILES['afile']['tmp_name'];
             //moded by js

             $expected_files = array('doc', 'docx', 'pdf', 'ppt', 'jpeg', 'jpg', 'png');

             if (!in_array($documentType, $expected_files)) {
                 $uploadOK = 0; $file_name = "";

                 if ($aurl != "" && $file_name == "") //if the url is provided
                 {
                     //saving url
                     $aurl = urlencode($aurl);
                     $sql = "INSERT INTO archives (fname, category, filename, year,url) VALUES ('$name', '$category','', '$year','$aurl')";
                     $result = $database->query($sql);
                     if ($result) {
                         echo "<div style='color:green'> URL Upload was successful.</div>";
                         echo '<script  type="text/javascript">
        	    
        	   
        	   function   myfunc()
        	      {
        	      window.location="archives.php";
        	      }
        	      setTimeout(myfunc(),2000);
        	   
        	        </script>';


                     } else {
                         echo "<div style='color:red'> Sorry, URL Upload failed.</div>";
                     }


                 } else {
                     echo "<br/><div style='color:red'> Sorry, Only pdf,jpg,png,jpeg,docx,doc and ppt files can be Uploaded.</div>";
                 }
             }

             if ($uploadOK == 1) {

                 //  if (move_uploaded_file($file, $file_dir.$file_name))
                 if (move_uploaded_file($file, $target_file)) {

                     $sql = "INSERT INTO archives (fname, category, filename, year,url) VALUES ('$name', '$category', '$file_name', '$year','')";
                     $result = $database->query($sql);

                     echo "<div style='color:green'> File Upload was successful.</div>";


                     echo '<script  type="text/javascript">
         
        
        function   myfunc()
           {
           window.location="archives.php";
           }
           setTimeout(myfunc(),2000);
        
             </script>';


                 } else {


                     echo "<div style='color:red'> Sorry, File Upload failed. Please Try again.</div>";
                 }

                 /*
                     if($result){
                     }
                     else{
                      }
                */
             }

             //end


             $_POST = array();
             unset($_POST['submit']);
             unset($_POST['fname']);
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
              <h3 class="box-title">Publications List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
               <?php
            $sql = "SELECT * FROM archives ORDER BY id DESC";
            $result = $database->query($sql);

            while(($resultArray[]= mysqli_fetch_assoc($result))|| array_pop($resultArray));
    
           // return $resultArray;

            

            ?>
              <table class="table table-hover">
                <tr>
                  <th>Number</th>
                   <th>Category</th>
                   <th>File / Caption</th>
                  <th>Year</th>
                  <th>Options</th>
                </tr>
                <tr>
                     <?php
                  $i = 1;
                    foreach ($resultArray as $archive) 
                    {
                      $id = $archive['id'];
                      $title = $archive['category'];
                      $file = $archive['filename'];
                      if ($file=='')
                      {
                      $file=$archive['fname'];
                      }
                      $year = $archive['year'];
                
                
                echo "<tr><td>$i</td>
                <td>$title</td>";
                
                echo "<td>";
                   
				if ($title=='Gallery')
				{
				$img_ui='<img src="../files/archives/'.$file.'"  alt="..." width="100" height="100" class="img-thumbnail">';   
				echo $img_ui;
				
			 	}
				
				else
				 {
				echo $file;
                 }
				echo "</td>";
                    
                      # code...
                     echo "<td>$year</td>
                 
                  <td>
                  <!--<a href='#'' class='btn btn-primary  btn-xs'> Edit</a>-->
                  <button type='button' class='btn btn-danger btn-xs' onclick='remove_doc($id);   '>Remove</button>
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
    $(document).ready(function(){
        alert("Loaded");
    });

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
            $.post("xhr.php", {token: "delete_archive", id: id}, function (response) {
                window.location.reload();
                //  alert(response);
                swal("", response, "success");
            });
            // location.reload();

        });
    }

    $('#filecategory').on('change', function () {
        //alert("Changed");
        if ($('#filecategory').val() == "Gallery") {
            $('#filedate').removeClass("hidden");
        } else {
            $('#filedate').addClass("hidden");
        }
    })

    function check_url(e) {
        $('#evname_error').addClass('hidden');

        if($('#aurl').val() != ""){
            if(!$('#aurl').val().match(/\bhttp/i)){
                e.preventDefault();
                $('#aurl').val(' ');
                $('#evname_error').removeClass('hidden');
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