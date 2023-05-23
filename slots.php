<html>
    <head>
        <link rel="stylesheet" type="text/css" href="slots.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>   -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"> </script>    -->
    </head>
    <body>
        <!-- navigation bar -->
        <nav>
            <ul class="nav-items">
                <li class="navi"><a href="#" class="logout"><b>logout</b></a></li>
                <li class="navi"><a href="index.php"><b>Home</b></a></li>
                <li class="day1"><a href="#" class="day"></a></li>
            </ul>
        </nav>
        <h1 class="slot-heading"></h1>
        <!-- 'Monday': {'bikes': 28, 'cars': 24},
        'Tuesday': {'bikes': 17, 'cars': 25},
        'Wednesday': {'bikes': 36, 'cars': 24},
        'Thursday': {'bikes': 30, 'cars': 24},
        'Friday': {'bikes': 53, 'cars': 23},
        'Saturday': {'bikes': 36, 'cars': 24},
        'Sunday': {'bikes': 16, 'cars': 25} -->
        <div class="parent-div">
            <div class="cars-div" id="cars-div">
                <img src="car1.jpg" class="image">
            </div>
            <div class="bikes-div" id="bikes-div">
               <img src="bike1.jpg" class="image">
            </div>
        </div>
        <h1 class="booked"></h1>
        <h1 id="rebook-heading">Want to rebook slot or leave from the parking area</h1>
        <form>
            <input type="submit" id="rebook" value="Rebook">
        </form>
    </body>
</html>
<?php include("slotsserver.php") ?>
<?php include("rebook.php") ?>