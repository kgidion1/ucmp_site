<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>UCMP - Uganda</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>-->
         <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!--<link href="et-line-icons/et-line.css" rel="stylesheet">-->
        <link href="bower_components/hover/css/hover-min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
        <link href="owl-carousel/owl.theme.css" rel="stylesheet">
        <link href="owl-carousel/owl.transitions.css" rel="stylesheet">
        <link href="bower_components/lightbox2/dist/css/lightbox.css" rel="stylesheet">
        <link href="bower_components/flexslider/flexslider.css" rel="stylesheet">
        <!--master slider-->
        <link rel="stylesheet" href="masterslider/style/masterslider.css"/>
        <link href="masterslider/skins/default/style.css" rel='stylesheet' type='text/css'>
        <!--cube portfolio-->
        <link href="cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet" type="text/css">
        <!--main css file-->
        <link href="css/style.css" rel="stylesheet">
        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
        <link rel="stylesheet" type="text/css" href="css/custom.css">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
    .heading-style-center h2 {
  text-transform: capitalize;
  font-size: 3.5rem;
  font-weight: 100;
  text-align:left !important;
  color: #666 !important;
  margin-left:20px !important;
  letter-spacing: -1px;
}
.heading-style-center{
    margin-bottom:10px !important;
}
.sub-intro-text{
    font-size:16px;
}

.panel-colored .panel-heading a.collapsed {
  background-color: #5B3A10 !important;
  color: #fff;
}

.panel-simple .panel-heading a {
  color: #09c4f2;
}

.panel-simple .panel-heading a.collapsed {
  background-color: transparent;
  color: #333;
}
.panel-colored .panel-heading a {
  background-color: #333;
  color: #fff;
}

.twt_wrap {
  text-align: center;
}
.twt_wrap > iframe {
  margin: auto;
}
.news-flow-box h2 >a{
    font-size:18px;
    color:#444 !important;
}
.news-flow-box:hover{
    cursor:pointer;
}
.ucmp{
color:#A44928;
font-size: 22px;
font-family: "Open Sans", sans-serif;
font-weight:700 !important;
}
.top-bar-v1 ul li a {
   /* color: #9a9a9a;*/
color:#fff;
font-size: 13px;
font-family: "Open Sans", sans-serif;

}
.top-bar-v1{
    background:#2A1B06 !important;
}
.ms-slide p{
    font-size:18px !important;
    font-weight:400;
}

.client-slide .item img{
    height:100px !important;
    width:300px !important;
}
h3{
    color:#5d3a0f;
   
    text-transform:capitalize;

}
.list-unstyled li a{
    color:#2A1B06 !important;
    text-transform:capitalize;
    font-size:13px !important;
}
.list-unstyled li a:hover{
    color:#5d3a0f !important;
    font-weight:900 !important;
}
.list-inline li a{
    color:#5d3a0f;    
    font-weight:700;
}
.news-flow-box .read{
    color:#444 !important;
}
h2{
    font-size:25px !important;
}
</style>

<!-- <script>
      function initMap() {
        var uluru = {lat: 0.3136674, lng: 32.5794374};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
        //   mapTypeId: 'terrain',

        //  mapTypeId: 'terrain',
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          tilt: 45,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          label: 'UCMP',
          map: map
        });
      }
    </script> -->

      <script>
      var map;
      function initMap() {
    var myLatLng = {lat: 0.3136619999999951, lng: 32.581626099999994};
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
      center:myLatLng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
        });
    // Create our info window content   
    var infoWindowContent = '<div class="">' +
        '<h6 style="color:#444;"><b>UCMP Offices</b></h6>' +
        '<p style="color:#444;"><em><strong>3rd Floor Block A,  Amber House</strong></em></p>' +
    '</div>';

    // Initialise the inforWindow
    var infoWindow = new google.maps.InfoWindow({
        content: infoWindowContent
    });
                
    var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Kololo Airstrip!',
        });
         infoWindow.open(map, marker);
    // Display our info window when the marker is clicked
    google.maps.event.addListener(marker, 'click', function() {
        // infoWindow.open(map, marker);

    });
      }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQM9BM_BLVAOaBDjzLKSjtkBJNpYC59a4&callback=initMap">
    </script>
    </head>
    <?php error_reporting(0); include "src/functions/database.php"; ?>
   