<!DOCTYPE html>
<html>
<?php include("includes/htmlhead.php"); ?>

<body>
    <div class="container">
        <div class="row">
            <?php include("includes/header.php"); ?>
        </div>

        <div class="row">

            <div class="page-title">
                <div class="page-title-heading">
                    <h1 class="title">Customize Menu</h1>
                    <div class="breadcrumbs">
                        <ul>
                            <li> <a href="index.php">Home</a></li>
                            <li><a href="#">Customize Menu</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <main id="customize_menu">
                    <h2>Select Item from List and place order</h2>
                    <div>
                        <div class="customiz-menu-for" data-type="Breakfast">Breakfast</div>
                        <div class="customiz-menu-for" data-type="Launch">Launch</div>
                    </div>
                    <div id="customize-show-details">
                    </div>


                </main>
            </div>

        </div>

        <div class="row">
            <?php include("includes/footer.php"); ?>
        </div>
    </div>

</body>

</html>
