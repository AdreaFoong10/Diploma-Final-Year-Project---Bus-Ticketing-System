<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }

        .container-map{
            margin-bottom: 50px;
        }

        .header{
            text-align: center;
            padding-top: 10px;
        }

        .container-map h2{
            padding-top: 30px;
        }

        .image-map-MO{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    include "header.php";
    ?>

    <div class="header">
        <h1 style="font-size:40px;">CONTACT US</h1>
    </div>

    <div class="container-map">
        <div class="image-map-MO" >
            <h2>Malaysia Office</h2>
            <img src="img/map.svg" width="10%" alt="map icon"/>
            <p>COMET GROUP SDN. BHD. Suit 12.03(A), 
                12th Floor, No.566 Jalan Ipoh, Kuala Lumpur - 51200</p>
        </div>
        <br><br><br>
        <div class="image-map-MO">
            <h2>Contact Number</h2>
            <img src="img/phone-icon.png" width="10%" alt="Contact icon"/>
            <p>+011-3967 4436</p>
        </div>
    </div>
    <br><br><br><br><br>

    <?php
    include_once "footer.php";
    ?>

</body>
</html>