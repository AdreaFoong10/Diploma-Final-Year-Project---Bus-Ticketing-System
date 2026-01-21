

<?php
  if($_SESSION['ad_login_status'] === 0)
  {
    $_SESSION['send_no_login'] =1;
      ?>
    <script>
    window.location.href = "/FYP/login.signup/login.signup.php";
  </script>
  <?php
  }
  

    

?>