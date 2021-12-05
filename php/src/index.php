<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zthaibd | Home Page</title>
    <meta charset="utf-8" />
    <meta name=viewport content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="ZThaibd, Foods, BDFoods, ThaiFoods, Lunch, Dinner, TakeOut, DineIn, Dhaka, ThaiFoodDhaka, DhakaBestThaiFood, DhakaThaiAirportFood, TopThaiResturantDhaka">
    <meta name="description" content="ZThai | Simply Authentic and Delicious">
    <?php include("includes/htmlhead.php"); ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php include("includes/header.php"); ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <main id="home">

                    <!-- slider -->
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item">
                                <img src="images/slider/Resturant%20Interior.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item active">
                                <img src="images/slider/IMG_9876.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="images/slider/Slider-3.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <!-- our services -->
                    <div id="our-services" class="block-section">
                        <h2>Our Services</h2>
                        <h3 class="service-sub-title">Simply Authentic and Delicious</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="service-container">
                                    <div class="service-cell">
                                        <a title="Dine In" href="menu.php">
                                            <h3>Dine In</h3>
                                            <div id="service-circle1">

                                            </div>
                                        </a>
                                        <div>
                                            We are confident that our superb food and beverages, relaxed congenial atmosphere, and friendly service will make your Dine In a special visit.
                                        </div>
                                    </div>
                                    <div class="service-cell">
                                        <a title="Dine In" href="menu.php">
                                            <h3>Take Out</h3>
                                            <div id="service-circle2">

                                            </div>
                                        </a>
                                        <div>
                                            We are happy to offer our customers a fast and efficient take-out service. Drop in or place your order by phone. We will have your food ready when you arrive.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- our services -->
                    <!-- <div id="top-menus" class="block-section">
     <h2>Chef's Special</h2>
 </div>-->

                </main>
            </div>

        </div>

        <div class="row">
            <?php include("includes/footer.php"); ?>
        </div>
    </div>
</body>

</html>
