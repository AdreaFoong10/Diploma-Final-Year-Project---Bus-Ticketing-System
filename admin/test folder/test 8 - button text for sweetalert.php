<!-- Sweet alert 2 code and css-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="/FYP/admin/css/sweetalert.css?v=1">


<form method="POST">
<button type="submit" name="ss">Click me</button>
</form>

<?php
    if(isset($_POST['ss']))
    {
        ?>
        <script>
                Swal.fire({
                    icon: "success",
                    title: "Logged In",
                    text: "You have been successfully logged In.",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false
                }).then((result) => {
                    if (result.isConfirmed) {
                    
                    }
                }); 
            </script>
        <?php
    }


?>