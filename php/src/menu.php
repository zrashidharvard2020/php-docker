<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zthaibd | Menu</title>
    <meta charset="utf-8" />
    <meta name=viewport content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="ZThaibd, Foods, BDFoods, ThaiFoods, Lunch, Dinner, TakeOut, DineIn, Dhaka, ThaiFoodDhaka, DhakaBestThaiFood, DhakaThaiAirportFood, Chicken, GarlicChicken, FriedRice, ThaiFish, Fish">
    <meta name="description" content="ZThai Menu | Delicious food items for you.">
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
                    <h1 class="title">Menu</h1>
                    <div class="breadcrumbs">
                        <ul>
                            <li> <a href="index.php">Home </a></li>
                            <li><a href="#">Menu</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <main id="set_menu">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="menu-type-container">
                                <div class="menu-type circle-set-menu"><a href="#set-menu">Set Menu</a></div>
                                <div class="menu-type circle-customized-menu"><a href="#customize-menu">Customized Menu</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="set-menu">
                        <div class="col-md-12">
                            <h2 class="menu-header">Set Menu</h2>
                            <div class="row item-section">
                                <h2>Lunch</h2>

                                <div class="col-md-12" id="show-details-lunch-set-menu">
                                </div>
                            </div>

                            <div class="row item-section">
                                <h2>Dinner</h2>

                                <div class="col-md-12" id="show-details-dinner-set-menu">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="customize-menu">
                        <div class="col-md-12">
                            <h2 class="menu-header">Customized Menu</h2>
                            <div class="row item-section">
                                <h2>Lunch</h2>

                                <div class="col-md-12" id="show-details-lunch-customize">
                                </div>
                            </div>

                            <div class="row item-section">
                                <h2>Dinner</h2>

                                <div class="col-md-12" id="show-details-dinner-customize">
                                </div>
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
        $(document).ready(function() {

            // for set menue

            // get setmenu data from a json file
            $.getJSON("data/setmenu.json", function(data) {


                var generateSetMenuUI = function(itemList, divId, orderFor) {
                    $.each(itemList, function(key, menu) {
                        var menuContainer = $('<div class="menu-container">').appendTo("#" + divId);

                        $("<div class='menu-image'>").css({
                            'background': "url('images" + menu.image + "')",
                            'background-size': "contain",
                            'background-position': "center",
                            'background-repeat': "no-repeat"
                        }).appendTo(menuContainer);
                        $("<div class='menu-name'>").text(menu.menu_name).appendTo(menuContainer);
                        $("<div class='menu-price'>").text(menu.price + " Tk.").appendTo(menuContainer);

                        var menudetails = $("<div class='menu-details'>").appendTo(menuContainer);

                        $.each(menu.items, function(index, item) {
                            var itemContainer = $('<div class="item-row">').appendTo(menudetails);
                            $("<div class='item-name'>").text(item.item_name).appendTo(itemContainer);
                            $("<div class='item-quantity'>").text(item.quantity).appendTo(itemContainer);
                        })

                        // place order section
                        var placeOrder = $("<div class='place-order'>").appendTo(menuContainer);
                        var orderTypeContainer = $("<div class='order-type-container'>").appendTo(placeOrder);

                        //select Order type
                        var orderType = $("<select class='order-type' id='order_type_" + menu.menu_id + "'>").appendTo(orderTypeContainer);
                        $("<option value='Take Out'>").text('Take Out').appendTo(orderType);
                        $("<option value='Dine In'>").text('Dine In').appendTo(orderType);

                        // place order button
                        var orderButtonContainer = $("<div class='order-button-container text-right'>").appendTo(placeOrder);
                        $("<button data-id='" + menu.menu_id + "'>").text('Order Now').click(function() {
                            var menuId = $(this).data('id');
                            var orderType = $("#order_type_" + menuId).val();

                            if (orderType == 'Take Out') {
                                alert("Thank you for your " + orderFor + " order. Your order will be ready in 30 minutes. We will call you soon.")
                            } else {
                                alert("Thank you for your " + orderFor + " order. Please arrive at our restaurant in 45 minutes. Your table will be ready upon your arrival.")
                            }
                            window.location = 'menu.php';
                        }).appendTo(orderButtonContainer)


                    });
                }

                generateSetMenuUI(data.Lunch, 'show-details-lunch-set-menu', 'lunch');
                generateSetMenuUI(data.Dinner, 'show-details-dinner-set-menu', 'dinner');
            });


            // for customized menu            

            $.getJSON("data/itemlist.json", function(data) {

                var menuList;
                var totalOrderAmount = 0;

                // reusable function to calucate the order total
                var countOrderTotal = function() {
                    var orderTotal = 0.00;
                    $('.item-total').each(function() {
                        orderTotal += parseFloat($(this).text());
                    })
                    return orderTotal
                }

                var genertUiforCustomizeMenu = function(menuList, divId, orderFor) {
                    var menuContainer = $('<div class="menu-container">').appendTo("#" + divId);
                    var itemContainer = $('<div class="item-row">').appendTo(menuContainer);
                    $("<div class='row-head'>").css({
                        'width': '10%',
                        'float': 'left'
                    }).text('Select').appendTo(itemContainer);
                    $("<div class='row-head'>").css({
                        'width': '30%',
                        'float': 'left'
                    }).text("Item Name").appendTo(itemContainer);
                    $("<div class='row-head'>").css({
                        'width': '30%',
                        'float': 'left'
                    }).text('Image').appendTo(itemContainer);
                    $("<div class='row-head'>").css({
                        'width': '10%',
                        'float': 'left'
                    }).text('Price').appendTo(itemContainer);
                    $("<div class='row-head'>").css({
                        'width': '10%',
                        'float': 'left'
                    }).text("Quantity").appendTo(itemContainer);
                    $("<div class='row-head'>").css({
                        'width': '10%',
                        'float': 'left'
                    }).text("Item Total").appendTo(itemContainer);

                    // loop through the menulist to create the menu
                    $.each(menuList, function(key, item) {

                        var itemContainer = $('<div class="item-row">').appendTo(menuContainer);
                        var checkboxContainer = $("<div class='item-checked'>").appendTo(itemContainer);

                        $("<input type='checkbox' class='item-select' data-item='" + JSON.stringify(item) + "'>").click(function() {

                            //select item funtionality 
                            var rowItemDetails = $(this).data('item');
                            if ($(this).is(':checked')) {
                                //var rowItemDetails = $(this).data('item');
                                var orderQuantityContorl = $(this).parent().siblings('.order-item-qty').children('.order-qty');
                                orderQuantityContorl.attr('disabled', false);
                                orderQuantityContorl.val(1);
                                var orderItemTotalContorl = $(this).parent().siblings('.item-total').html(rowItemDetails.unit_price);
                                //totalOrderAmount += rowItemDetails.unit_price;

                            } else {
                                var orderQuantityContorl = $(this).parent().siblings('.order-item-qty').children('.order-qty');
                                orderQuantityContorl.val('');
                                orderQuantityContorl.attr('disabled', true);
                                var orderItemTotalContorl = $(this).parent().siblings('.item-total').text('0.00');
                                //totalOrderAmount -= rowItemDetails.unit_price;
                            }
                            var orderTotal = countOrderTotal();
                            $('#' + divId + ' .total-order-amount').text(orderTotal);

                        }).appendTo(checkboxContainer);

                        $("<div class='item-name'>").text(item.item_name).appendTo(itemContainer);
                        $("<div class='item-image'>").html('<img src="images' + item.image + '" >').appendTo(itemContainer);
                        $("<div class='item-unit-price'>").text(item.unit_price).appendTo(itemContainer);

                        var orderQtyCOntainer = $("<div class='order-item-qty'>").appendTo(itemContainer);
                        $("<input type='text' disabled class='order-qty' data-price='" + item.unit_price + "'>").css({
                            'width': '50px'
                        }).change(function() {

                            // calculate the item total based on quantity changes 

                            if ($(this).val()) {
                                var unitPrice = parseFloat($(this).data('price'));
                                var orderItemTotal = parseInt($(this).val()) * unitPrice;
                                $(this).parent().siblings('.item-total').text(orderItemTotal);

                            } else {
                                var orderItemTotal = parseFloat($(this).parent().siblings('.item-total').text());
                                $(this).parent().siblings('.item-total').text('0.00');

                            }
                            var orderTotal = countOrderTotal();
                            $('#' + divId + ' .total-order-amount').text(orderTotal);

                        }).appendTo(orderQtyCOntainer);
                        $("<div class='item-total'>").text('0.00').appendTo(itemContainer);


                        ;
                    });

                    // menu foote to show the order total
                    if (menuList.length > 0) {
                        var footerContainer = $('<div class="item-row">').appendTo(menuContainer);

                        $("<div class='row-footer'>").css({
                            'width': '90%',
                            'float': 'left'
                        }).text("Total").appendTo(footerContainer);

                        $("<div class='row-footer total-order-amount'>").css({
                            'width': '10%',
                            'float': 'left'
                        }).text('').appendTo(footerContainer);
                    }

                    // place order section

                    var placeOrder = $("<div class='place-order'>").appendTo(menuContainer);

                    // select order type
                    var orderTypeContainer = $("<div class='order-type-container'>").appendTo(placeOrder);
                    var orderType = $("<select class='order-type' id='order_type'>").appendTo(orderTypeContainer);
                    $("<option value='Take Out'>").text('Take Out').appendTo(orderType);
                    $("<option value='Dine In'>").text('Dine In').appendTo(orderType);

                    // place order button
                    var orderButtonContainer = $("<div class='order-button-container text-right'>").appendTo(placeOrder);
                    $("<button >").text('Order Now').click(function() {
                        var menuId = $(this).data('id');
                        var orderType = $('#' + divId + ' .order-type').val();
                        var orderTotal = countOrderTotal();
                        if (orderTotal < 1) {
                            alert("Sorry!! you did not select any item.")
                        } else {
                            if (orderType == 'Take Out') {
                                alert("Thank you for your customized " + orderFor + " order. Your order will be ready in 30 minutes. We will call you soon.")
                            } else {
                                alert("Thank you for your customized " + orderFor + " order. Please arrive at our restaurant in 45 minutes. Your table will be ready upon your arrival.")
                            }

                            window.location = 'menu.php';
                        }
                    }).appendTo(orderButtonContainer)
                }
                genertUiforCustomizeMenu(data.Lunch, 'show-details-lunch-customize', 'lunch');
                genertUiforCustomizeMenu(data.Dinner, 'show-details-dinner-customize', 'dinner');


            });
        })

    </script>
</body>

</html>
