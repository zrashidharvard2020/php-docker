 <!-- implement favico icon -->
 <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">

 <!-- load bootstrap css cdn -->
 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

 <!-- load zthaibd css -->
 <link rel="stylesheet" href="css/zthaibd.css" />

 <!-- load jquery -->
 <script src="js/jquery-3.1.1.js"></script>

 <!-- load bootstrap related js cdn -->
 <script src="https://unpkg.com/popper.js@1.16.1/dist/umd/popper.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

 <script>
     $(document).ready(function() {
         $('.carousel').carousel({
             interval: 6000,
             pause: "false"
         });

         var myBodyId = $('main').attr('id');
         var myNavId = '#nav_' + myBodyId;

         // Set iamhere id
         $(myNavId).attr('id', 'iamhere');
         // set page title
         pageName = myBodyId.charAt(0).toUpperCase() + myBodyId.slice(1)
         //document.title = pageName.replace('_', ' ');

     });

 </script>
