<!DOCTYPE html>
<html>
<head>
<link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">


    <style>
        *{
            font-family:sans-serif;
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
            padding-top:0.55rem;
            padding-bottom:0.80rem;
            padding-left:0.75rem;
            padding-right:0.75rem;
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
            width: 20px;
            height: 20px;
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
        }
        body{
            margin:0;
        }






    </style>
</head>

<body>
    
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
</body>
</html>