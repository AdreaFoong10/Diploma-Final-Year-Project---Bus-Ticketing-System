<?php
    include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TRAVELER - Free Travel Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <script>
        window.history.forward();
    </script>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        ul{
            margin-top:15px;
        }
        .nav_bar{
            height:99px !important;
        }
        .adjust_position{
            margin-top:-3.5px;
        }
        


        .btn-outline-primary{
            border-color:lightblue;
            color:lightblue;
        }
        .btn-outline-primary:hover{
            background-color:lightblue;
            color:white;
            border-color:white;
        }

        .group_container1{
            margin-bottom: 3rem !important;
            margin-left:10rem !important;
            margin-right:5rem !important;
        }

        

        .display_flex{
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .padding_top{
            padding-top: 3rem !important;
        }

        .white_text{
            color: rgba(255, 255, 255, 0.5) !important;
        }

        .line_height{
            line-height: 1.2;
            margin-top:0;
        }

        .icon_button 
        {
            display: inline-block;
            font-weight: 400;
            color: #656565;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding-top:0.60rem !important;
            padding-bottom:0.80rem !important;
            padding-left:0.75rem !important;
            padding-right:0.75rem !important;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .button_outline{ 
            color: lightskyblue;
            border-color: lightskyblue;
        }

        .button_outline:hover{
            color: white;
            background-color:lightskyblue;
        }

        .square_button{      
            width: 45px !important;
            height: 45px !important;
        }

        .margin_right{ 
            margin-right: 0.5rem;
        }

        .flex_button{ 
            display: flex;
        }

        .justify_button{ 
            justify-content: flex-start;
        }

        .margin_top{
            margin-top:1.5rem;
        }

        .margin_bottom{
            margin-bottom:1rem;
        }

        .uppercase{
            text-transform:uppercase;
        }


        .twitter_content:before{  
            content: "\f099";
        }

        .instagram_content:before{ 
            content: "\f16d";
        }

        .facebook_content:before{
            content: "\f39e";
        }

        .icon_font{ //fab
            font-family: "Font Awesome 5 Brands";
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            line-height: 1;
        } 

        .black_background{
            background-color:#212121;
        }

        .Container{
            padding-right: 15px;
            padding-left: 15px;
  
            
        }

        

        .padding_bottom{
            padding-bottom: 3rem;
        }

        .margin_bottom2{
            margin-bottom:0.5rem;
        }

        .margin_bottom3{
            margin-bottom:1.5rem;
        }

        .column_flex{
            flex-direction: column;
        }

        .title_font_size{
            font-size: 1.25rem;
        }

        .title_font_weight{
            font-weight: 500;
        }

        .subtitle_font_size{
            font-size: 1rem;
        }

        .copyright_container
        {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            flex: 0 0 50%;
            max-width: 50%;
        }

        
        @media (min-width: 768px) {
        .text_margin_left{
            text-align: left;
        }
        .text_margin_right{
            text-align: right;
        }
        .text_margin_center{
            text-align: center;
        }
        }

        .margin_bottom0{
            margin-bottom:0;
        }

        .border_top{
            border-top: 1px solid #dee2e6;
        }

        .padding_top2{
            padding-top: 1.5rem;
        }

        .padding_bottom2{
            padding-bottom: 1.5rem;
        }

        .padding_left2{
            padding-left: 1rem;
        }

        .padding_right2{
            padding-right: 1rem;
        }
        .center_text{
            text-align:center;
        }

        .link{
            text-decoration:none;
            color:rgba(255, 255, 255, 0.5);
            margin-bottom:1rem;
        }

        .link:hover{
            text-decoration:underline;
            color:rgba(255, 255, 255, 0.5);
        }
        body{
            margin:0;
        }

        .hover_top_button:hover{
            background-color:lightskyblue !important;
            color:white !important;
        }

        .service-item:hover i{
            color:white !important;
            background-color:lightskyblue !important;
        }

        .service-item i:hover {
            color:white !important;
            background-color:lightskyblue !important;
        }

        .btn-primary:hover{
            background-color:#4285f4 !important;
            border:1px solid #4285f4 !important;
        }
    
    </style>
 
</head>

<body>

    <!-- Booking Start -->
    <div style="z-index:19; position:absolute; width: 100%; top:200px;">
        <?php include('search_product.php') ?>
    </div>
    <!-- Booking End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0" style="top:42px; position:relative;">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white mb-md-3">CometBus</h4>
                            <h1 class="display-3 text-white mb-md-4">Let's Discover The World Together</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2" style="background-color:lightskyblue; color:white; border:1px solid lightskyblue;">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white mb-md-3">CometBus</h4>
                            <h1 class="display-3 text-white mb-md-4">Discover Amazing Places With Us</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2" style="background-color:lightskyblue; color:white; border:1px solid lightskyblue;">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px; color:#4285f4 !important;">About Us</h6>
                        <h1 class="mb-3">We Provide The Best Service</h1>
                        <p>We provide the best customer service among other bus ticket websites. We offer hassle-free experience of purchasing tickets and with a few clicks away, you are ready to travel without any worries. Purchasing ticket will always be easy, with just a few clicks away.</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="img/about-1.jpg" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="img/about-2.jpg" alt="">
                            </div>
                        </div>
                        <a href="" class="btn btn-primary mt-1" style="background-color:lightskyblue; color:white; border:1px solid lightskyblue;">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

        <br><br><br><br><br>
    <!-- Feature Start -->
    <div class="container-fluid pb-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="background-color:lightskyblue !important; height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Competitive Pricing</h5>
                            <p class="m-0">Get the best deals on bus tickets</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="background-color:lightskyblue !important; height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Best Services</h5>
                            <p class="m-0">Experience top-notch service and amenities on your bus journey</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="background-color:lightskyblue !important; height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-ticket-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Simple & Easy</h5>
                            <p class="m-0">Book your bus tickets with ease and simplicity on our user-friendly platform</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->



    <!-- Service Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px; color:#4285f4 !important;">Services</h6>
                <h1>CometBus Services</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-route mx-auto mb-4" style="color:lightskyblue; border:2px solid lightskyblue;"></i>
                        <h5 class="mb-2">Search & Find</h5>
                        <p class="m-0">With our search engine, finding and booking your next bus trip is just a few clicks away. Simply enter your desired departure and destination locations, along with your travel dates.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-ticket-alt mx-auto mb-4" style="color:lightskyblue; border:2px solid lightskyblue;"></i>
                        <h5 class="mb-2">Ticket Booking</h5>
                        <p class="m-0">Our user-friendly booking platform allows you to quickly search for available bus trips, select your preferred seats, and securely pay for your tickets, all from the comfort of your own home.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fa fa-2x fa-bus mx-auto mb-4" style="color:lightskyblue; border:2px solid lightskyblue;"></i>
                        <h5 class="mb-2">Go!</h5>
                        <p class="m-0">You just need to bring your order summary, either as a soft or hard copy, for a quick and efficient check-in process and enjoy your trip!<br><br></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Footer Start -->
    <div class="Container black_background white_text padding_top padding_bottom padding_left padding_right">
        <div class="display_flex padding_top">
            <div class="group_container1 group_container2 group_container3">
            <a href="home.php"><img src="img/logo1.png" class="logo" style="width:90px; height:50px;"></a>
               
                <h6 class="uppercase margin_top margin_bottom line_height subtitle_font_size" style="color: white; font-weight:normal; letter-spacing: 5px;">Follow Us</h6>
                <div class="flex_button justify_button">
                    <a class="icon_button button_outline square_button margin_right" href="https://twitter.com/bus_comet09237"><i class="fab fa-twitter"></i></a>
                    <a class="icon_button button_outline square_button margin_right" href="https://www.instagram.com/cometbus0"><i class="fab fa-instagram"></i></a>
                    <a class="icon_button button_outline square_button" href="https://www.facebook.com/profile.php?id=100093159280113"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
            <div class="group_container1 group_container2 group_container3">
                <h5 class="uppercase margin_bottom3 line_height title_font_weight title_font_size" style="color:white; letter-spacing: 5px;">About<br>CometBus</h5>
                <div class="column_flex flex_button justify_button">
                    <a class="link white_text margin_bottom2" href="about_us.php"><i class="fa fa-angle-right margin_right"></i>About Us</a>
                    
                    <a class="link white_text margin_bottom2" href="contact_us.php"><i class="fa fa-angle-right margin_right"></i>Contact Us</a>
                    
                </div>
            </div>
            
            <div class="group_container1 group_container2 group_container3">
                <h5 class="uppercase margin_bottom3 line_height title_font_weight title_font_size" style="color:white; letter-spacing: 5px;">Contact Us</h5>
                <p><i class="fa fa-map-marker-alt margin_right"></i>COMET GROUP SDN. BHD. Suit 12.03(A), 12th Floor,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No.566 Jalan Ipoh, Kuala Lumpur - 51200</p>
                <p><i class="fa fa-phone-alt margin_right"></i>+011-3967 4436</p>
                <p><i class="fa fa-envelope margin_right"></i>cometbus0@gmail.com</p>
                
            </div>
        </div>
    </div>
    
    <div class="Container black_background border_top padding_top2 padding_bottom2 padding_left2 padding_right2 padding_left padding_right" style="color:white; border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="copyright_container text_margin_left margin_bottom margin_bottom0 center_text">
                <p style="margin:0; margin-left: -280px; color:rgba(255, 255, 255, 0.5);">Copyright &copy; 2023 Cometbus.com. All Rights Reserved.</p>
            </div>
            
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top hover_top_button" style="background-color:transparent; border:1px solid lightskyblue; color:lightskyblue;"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>

  
