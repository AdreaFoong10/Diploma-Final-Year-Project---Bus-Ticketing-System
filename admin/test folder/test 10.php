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

        
        // Set a cookie with a unique identifier for the current page
      $page_id = uniqid();
      setcookie('page_id', $page_id, time() + 3600);
      
      // Check if the HTTP_REFERER variable is set and matches the current page's URL
   

    
?>