<?php session_start(); ?>
<!-- Sweet alert 2 code -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Jquery Library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/FYP/dbconnect.php'; ?> 

<div class="search-wrapper">
                <span class="las la-search"></span>
                    <form method="post">
                    <input type="button" name="search_data" id="search_data" placeholder="Search here">
                </form>
            </div>


<?php

if (!isset($_SESSION['admin_user']) && !isset($_SESSION['adminpw'])) {
    echo "<script>
            Swal.fire({
              title: 'Oops!',
              html: 'It seems you are directly accessing this page. Please Login to access Admin Pages',
              icon: 'warning',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'OK'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = '/FYP/login.signup/login.signup.php';
                
              }
            });

            
          </script>";
  }

    
?>