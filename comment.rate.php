<?php
    
    $bus_schedule_id=$_POST['bus_sche_id'];
    $booking_ID=$_POST['booking_no'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="css/sweetalert.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

body { 
  font-family: 'Montserrat', sans-serif;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  margin: 0;
  overflow: hidden;
  background-color: #fef9f2;
}

.panel {
  background-color: white;
  box-shadow: 0 0 7px rgba(0,0,0,.2);
  border-radius: 5px;
  font-size: 90%;
  text-align: center;
  padding: 30px 20px;
  max-width: 300px;
}

.panel form {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

fieldset, label { 
  margin: 0; 
  padding: 0; 
}

h1 { 
  font-size: 22px; 
  margin: 10px; 
  font-weight: normal;
}

fieldset {
  margin: 20px 0 40px;
}


.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 30px;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating:not(:checked) > label:before {
    content: '★ ';
}

.rating > label { 
  color: #ddd; 
 float: right; 
}


.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: yellow;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }

input, label {
  cursor: pointer;
}

input[type="submit"] {
  margin-top: 5px;
  background-color: #302d2b;
  color: white;
  border: none;
  border-radius: 5px;
  padding: 12px 30px;
}

input[type="submit"]:focus {
  outline: 0;
}

input[type="submit"]:active {
  transform: scale(0.98);
}

input[type="submit"]:disabled {
  background-color: #ddd;
  cursor: not-allowed;
}

.fa-heart {
  color: red;
  font-size: 30px;
  margin-bottom: 10px;
}

.fa-heart:before {
  content: "\f004";
  font-family: FontAwesome;
}


    </style>
</head>
<body>
<div class="panel">
        <div class="ratings-container">
          <h1>How Was Your Experience?</h1>
          <form method="POST" action="new_submit_rate.php" onsubmit="return submitreview_sweetalert()" id="review-form">
        
            
            <fieldset class="rating">
              <input type="radio" id="star5" name="star" value="5" /><label class = "full" for="star5" title="5 stars"></label>
              <input type="radio" id="star4" name="star" value="4" /><label class = "full" for="star4" title="4 stars"></label>      
              <input type="radio" id="star3" name="star" value="3" /><label class = "full" for="star3" title="3 stars"></label>
              <input type="radio" id="star2" name="star" value="2" /><label class = "full" for="star2" title="2 stars"></label>
              <input type="radio" id="star1" name="star" value="1" /><label class = "full" for="star1" title="1 star"></label>
            </fieldset>
          
          <input type="hidden" name="bus_sche_id" value="<?php echo  $bus_schedule_id;?>">
          <input type="hidden" name="booking_no" value="<?php echo  $booking_ID;?>">
          <br>
            <input type="submit" name="submit_review_btn" value="Submit Review">
          </form>
          <a href="new_order_history.php">back to order history</a>
          
        </div>
</div>
    
</body>
</html>

<script>
function submitreview_sweetalert()
{
    event.preventDefault();
                    Swal.fire({
                    icon: "success",
                    title: "Submited",
                    text: "You have successfully submit your review.",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false
                    }).then((result) => {
                    if(result.isConfirmed) 
                    {
                        const review_form=document.getElementById('review-form');
                        review_form.submit();
                    }
                
                    });  
}
</script>