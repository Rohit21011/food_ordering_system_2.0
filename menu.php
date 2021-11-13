<!DOCTYPE html>
<html lang="en">
<html>

<head>

    <title></title>
    <?php include("boostrap-files.php");?>

</head>

<body>
    <?php include("header.php");?>

    <div class=" aboutus">
        <img width="100%" src="img/about-background.jpg">



        <div class="content ">
            <h1>Menu</h1>
            <div class="more-links">
                <a href="index.php">Home</a>
                <i class=" fa fa-angle-double-right" style="font-size:15px; "></i>
                <span class="about-link">Menu</span>
            </div>
        </div>
    </div>
    <div class="container-fluid " style="position:relative;">
        <h1 class="title text-center">Menu of the day</h1>
        <h2 class="d-lg-block d-none  tab-titles-lg">Breakfast<i class="	far fa-arrow-alt-circle-right"></i></h2>
        <ul class="d-flex  justify-content-center justify-content-lg-start ml-lg-5 ">
            <li>
                <a href="#breakfast">
                    <p class="d-md-block d-lg-none tab-titles">Breakfast<i class="	far fa-arrow-alt-circle-right"></i>
                    </p>
                </a>
            </li>
            <li>
                <a href="#lunch">
                    <p class="d-md-block d-lg-none tab-titles">Lunch<i class="	far fa-arrow-alt-circle-right"></i> </p>
                </a>
            </li>
            <li>
                <a href="#dinner">
                    <p class="d-md-block d-lg-none tab-titles">Dinner<i class="	far fa-arrow-alt-circle-right"></i> </p>
                </a>
            </li>
        </ul>
        <div class="row justify-content-around " id="show-breakfast">

            
        </div>
    </div>
    <!-- Lunch -->
    <div class="container-fluid " id="lunch" style="position:relative;">

        <h2 class=" tab-titles-lg">Lunch<i class="far fa-arrow-alt-circle-right"></i> </h2>
        <div class="row justify-content-around " id="show-lunch">
            
        </div>
    </div>
    <!-- Dinner -->
    <div class="container-fluid " id="dinner" style="position:relative;">

        <h2 class=" tab-titles-lg">Dinner<i class="far fa-arrow-alt-circle-right"></i> </h2>
        <div class="row justify-content-around " id="show-dinner">

           
        </div>
    </div>
    <?php include("footer.php");?>
    <script>
    $(document).ready(function() {
        var category = "break-fast";
        var display = "#show-breakfast";
        getData(category, display);

        function getData(category, display) {
            var str = "";
            $.ajax({
                url: "api/fetch-menu.php",
                type: "POST",
                data: {
                    "category": category
                },
                dataType: "JSON",
                success: function(data) {
                   console.log(data);
                    $.each(data, function(key, value) {
                        str += `<div class="ml-1 mt-5 col-lg-2 col-md-3 col-sm-5 col-9  menu-card">
                <img src="menu-image/${value.menu_image}" class="mt-5 set-height">
                <i class="far fa-heart"></i>

                <a href="add-to-cart.php"><i class="fas fa-shopping-basket  menu-cart"></i></a>
                <div>
                    <p>₹ ${value.menu_price}/-</p>
                </div>
                <p style="margin-top:-10px">${value.menu_name}</p>
            </div>`
                    });
                    $(display).append(str);

                }
            });
        }
        lunch();
        function lunch(){
            var category="lunch";
            var display="#show-lunch";
            getData(category,display);
        }
        breakfast();
        function breakfast(){
            
            var category="dinner";
            var display="#show-dinner";
            getData(category,display);
        }

    });
    </script>
</body>

</html>