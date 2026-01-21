<?php 
    $date = date("Y-m-d");
    // session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bus Ticket Booking System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet"/>

    <!-- Customized Bootstrap Stylesheet -->
    
    <script>
        function return1()
        {  
           let rmin = document.getElementById('return-date').setAttribute("min","<?php echo $date ?>"); 
           let dvalue = document.getElementById('departure-date').value;
            

            if(dvalue == 0)
            {
                let rmax = document.getElementById('return-date').setAttribute("max","2023-07-10"); 
            }
            else
            {
                let rmax2 = document.getElementById('return-date').setAttribute("min",dvalue);
                let rmax3 = document.getElementById('return-date').setAttribute("max","2023-07-10"); 
            }
            
        }

        function depart1()
        {
            let dmin = document.getElementById("departure-date").setAttribute("min","<?php echo $date ?>");
            let rvalue = document.getElementById("return-date").value;

            if(rvalue == 0)
            {
                let dmax = document.getElementById("departure-date").setAttribute("max","2023-07-10");
            }
            else
            {
                let dmax2 = document.getElementById("departure-date").setAttribute("max",rvalue);
            }
        }
    </script>

    <style>
        #label-title{
            font-size: 0.8rem;
        }

        .custom-select2 {
        position: relative;
        font-family: Arial;
        }

        .custom-select2 select {
        display: none; /*hide original SELECT element: */
        }

        .select-selected {
        border:1px solid #ced4da;
        padding: 12px !important;
        }

        /* Style the arrow inside the select element: */
        .select-selected:after {
        position: absolute;
        content: "";
        top: 14px;
        right: 10px;
        width: 0;
        height: 0;
        border: 6px solid transparent;
        border-color: #fff transparent transparent transparent;
        }

        /* Point the arrow upwards when the select box is open (active): */
        .select-selected.select-arrow-active:after {
        border-color: transparent transparent #fff transparent;
        top: 7px;
        }

        /* style the items (options), including the selected item: */
        .select-items div,.select-selected {
        color: black;
        padding: 8px 16px;
        /*border: 1px solid #ced4da;*/
        /*border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;*/
        cursor: pointer;
        }

        /* Style items (options): */
        .select-items {
        position: absolute;
        background-color: grey;
        top: 100%;
        left: 0;
        right: 0;
        z-index: 99;
        }

        /* Hide the items when the select box is closed: */
        .select-hide {
        display: none;
        }

        .select-items div:hover, .same-as-selected {
        background-color: rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <!-- Booking Start -->
    <form method="post" name="frmsearch" action="departure_product_list.php">
        <div class="container-fluid booking mt-5 pb-5">
            <div class="container pb-5">
                <div class="bg-light shadow" style="padding: 30px;">
                    <div class="row align-items-center" style="min-height: 60px;">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <p id="label-title">FROM</p>
                                        <div class="custom-select2">
                                          <select style="height: 47px;" name="origin">
                                                  <option value="emptyo">Origin</option>
                                                  <option value="Malacca">Malacca</option>
                                                  <option value="Kuala Lumpur">Kuala Lumpur</option>
                                                  <option value="Johor Bahru">Johor Bahru</option>
                                                  <option value="Penang">Penang</option>
                                          </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                    <p id="label-title">TO</p>
                                      <div class="custom-select2">
                                        <select style="height: 47px;" name="destination">
                                            <option value="emptyd">Destination</option>
                                            <option value="Malacca">Malacca</option>
                                            <option value="Kuala Lumpur">Kuala Lumpur</option>
                                            <option value="Johor Bahru">Johor Bahru</option>
                                            <option value="Penang">Penang</option>
                                        </select>
                                      </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <div class="date" id="date1" data-target-input="nearest">
                                            <p id="label-title">DEPARTURE DATE</p>
                                            <input type="date" class="form-control p-4 datetimepicker-input" name="Departure_Date" id="departure-date" class="departure-date" onclick="depart1()">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <div class="date" id="date2" data-target-input="nearest">
                                            <p id="label-title">RETURN DATE(OPTIONAL)</p>
                                            <input type="date" class="form-control p-4 datetimepicker-input" name="Return_Date" id="return-date" class="return-date" onclick="return1()">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" value="SEARCH" name="searchbtn" style="height: 47px; margin-top: 36px; background-color: lightskyblue; border:1px solid lightskyblue" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Booking End -->
    
</body>
</html>

<?php
//Create session variable for passenger_info.php
$_SESSION['errorEmail'] = "";
$_SESSION['errorName'] = "";
$_SESSION['errorAge']= "";
$_SESSION['errorPhone']= "";

if(isset($_SESSION['error_message'])) {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?php echo $_SESSION['error_message']; ?>',
        });
    </script>
<?php
    // Unset the session variable to prevent the message from being displayed again
    unset($_SESSION['error_message']);
}
?>

<script>
    var x, i, j, l, ll, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select2");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /* For each element, create a new DIV that will act as the selected item: */
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /* For each element, create a new DIV that will contain the option list: */
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /* For each option in the original select element,
    create a new DIV that will act as an option item: */
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /* When an item is clicked, update the original select box,
        and the selected item: */
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
    /* When the select box is clicked, close any other select boxes,
    and open/close the current select box: */
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}

function closeAllSelect(elmnt)
{
  /* A function that will close all select boxes in the document,
  except the current select box: */
  var x, y, i, xl, yl, arrNo = [];

  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);
</script>


