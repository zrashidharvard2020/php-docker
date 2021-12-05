<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zthaibd | Contact</title>
    <meta charset="utf-8" />
    <meta name=viewport content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="ZThaibd, DhakaBestThaiFood, DhakaThaiAirportFood, Dhaka, Bangladesh">
    <meta name="description" content="ZThai Contact | Thank you for contacting us.">
    <?php include("includes/htmlhead.php"); ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php include("includes/header.php"); ?>
        </div>

        <div class="row">

            <div class="page-title">
                <div class="page-title-heading">
                    <h1 class="title">Contact</h1>
                    <div class="breadcrumbs">
                        <ul>
                            <li> <a href="index.php">Home</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <main id="contact">
                    <div class="row container" style="margin-top: 6%;">
                        <div class="col-md-3 contact_us">
                            <h2>Contact Us ?</h2>
                            <div class="address">
                                <ul>
                                    <li><span><img src="images/home-ico.png" alt="home-ico"></span><a href="#">47, Block #3, Uttara, Dhaka-1230.,</a></li>
                                    <li><span><img src="images/contact-ico.png" alt="contact-ico"></span><a href="tel:01724006177">Phone. 01795666526</a></li>
                                    <li><span><img src="images/email-ico.png" alt="email-ico"></span><a href="mailto:info@zthaibd.com">info@zthaibd.com</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 form_address">
                            <form method="post" action="contact-respons.php">
                                <div class="row">
                                    <div class="col-md-12" id="successMessage" style="color: green;margin-bottom: 10px;">
                                    </div>
                                    <div class="col-md-4 form_box1">
                                        <label class="your_name"><span>*</span>Name</label>
                                        <input type="text" class="name_box" placeholder="" name="name" required>
                                    </div>
                                    <div class="col-md-4 form_box1">
                                        <label class="your_name"><span>*</span>Email</label>
                                        <input type="email" class="name_box" placeholder="" name="email" required>
                                    </div>
                                    <div class="col-md-4 form_box1">
                                        <label class="your_name"><span>*</span>Contact Number</label>
                                        <input type="text" class="name_box" name="phone" placeholder="" required>
                                    </div>
                                    <div class="col-md-12 form_box2">

                                        <label class="your_name"><span>*</span>Message</label>
                                        <textarea name="message" cols="30" rows="9" required></textarea>
                                        <input type="submit" class="submit_btn" name="submit" value="Submit">
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <div class="contact-right">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <div id="map" style="width: 100%; height: 400px;margin-top:20px;"></div>
                                <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=weather"></script>
                            </div>
                        </div>
                    </div>


                </main>
            </div>

        </div>

        <div class="row">
            <?php include("includes/footer.php"); ?>
        </div>
    </div>
    <script>
        var successMessage = '<?php echo (isset($_GET['successmessage']) && $_GET['successmessage']=='yes')? 'Thank you for contacting us.':''; ?>';
        $(document).ready(function() {

            if (successMessage) {
                $("#successMessage").text(successMessage);
                setTimeout(function() {
                    $("#successMessage").fadeOut(500);
                }, 5000)
            }

            // map integration
            var locations = [
                [
                    "ZThaibd",
                    23.866187, 90.397300,
                    1,
                    "47, Block #3, Uttara, Dhaka-1230."
                ]
            ]


            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                // center: new google.maps.LatLng(-33.92, 151.25),
                center: new google.maps.LatLng(23.866187, 90.397300),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                });
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][0], locations[i][6]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
            var map;
            var marker;
            //var infowindowPhoto = new google.maps.InfoWindow();
            var latPosition;
            var longPosition;

            function initialize() {

                var mapOptions = {
                    zoom: 15,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    // center: new google.maps.LatLng(10,10)
                };

                //  map = new google.maps.Map(document.getElementById("map"), mapOptions);

                initializeMarker();
            }

            function initializeMarker() {

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                        latPosition = position.coords.latitude;
                        longPosition = position.coords.longitude;

                        marker = new google.maps.Marker({
                            position: pos,
                            // animation: google.maps.Animation.DROP,
                            map: map,
                            icon: 'http://www.zthaibd.com/images/logo.png'
                        });

                        map.setCenter(pos);

                    });
                }
            }

            initialize();
        });

    </script>
</body>

</html>
