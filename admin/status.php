<!-- Check Status and Active or Unactive an account based on if the account is active or not -->
<?php
if($status_checing === "Active")
{
    $status_confirm = "deactive";
    $status_confirm_text = "Deactivating";
}
else if($status_checing === "Inactive")
{
    $status_confirm = "active";
    $status_confirm_text = "Activating";
}

if($status_check_title === "staff")
{
?>
<script>
    Swal.fire({
        title: 'Do you want to <?php echo $status_confirm ?> <br>Staff ID : <?php echo $Id_status ?>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                    title: 'Please wait...',
                    text: '<?php echo $status_confirm_text ?> Account...',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    didOpen: () => {
                    Swal.showLoading();
                    // Send AJAX request to update_admin.php to update the data
                    $.ajax({
                        url: '/FYP/admin/staff/status process.php',
                        type: 'POST',
                        data: {
                            status_p: '<?php echo $status_confirm ?>',
                            status_id: '<?php echo $Id_status ?>'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Account Have been <?php echo $status_confirm ?>d !',
                                icon: 'success',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href = 'staff.php';
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'There was an error while processing Account Status. Please try again later.',
                                icon: 'error',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href = 'staff.php';
                                }
                            });
                        }
                    });
                    }
                });
        }
    });
</script>
<?php
}
else if($status_check_title === "schedule")
{
?>
<script>
    Swal.fire({
        title: 'Do you want to <?php echo $status_confirm ?> <br>Bus Schedule ID : <?php echo $Id_status ?>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                    title: 'Please wait...',
                    text: '<?php echo $status_confirm_text ?> Bus Schedule...',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    didOpen: () => {
                    Swal.showLoading();
                    // Send AJAX request to update_admin.php to update the data
                    $.ajax({
                        url: '/FYP/admin/bus schedule/status process.php',
                        type: 'POST',
                        data: {
                            status_p: '<?php echo $status_confirm ?>',
                            status_id: '<?php echo $Id_status ?>'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Bus Schedule Have been <?php echo $status_confirm ?>d !',
                                icon: 'success',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href = 'bus schedule.php';
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'There was an error while processing Bus Schedule Status. Please try again later.',
                                icon: 'error',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href = 'bus schedule.php';
                                }
                            });
                        }
                    });
                    }
                });
        }
    });
</script>
<?php
}
else if($status_check_title === "operator")
{
?>
<script>
    Swal.fire({
        title: 'Do you want to <?php echo $status_confirm ?> <br>Bus Operator ID : <?php echo $Id_status ?>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                    title: 'Please wait...',
                    text: '<?php echo $status_confirm_text ?> Bus Operator...',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    didOpen: () => {
                    Swal.showLoading();
                    // Send AJAX request to update_admin.php to update the data
                    $.ajax({
                        url: '/FYP/admin/bus operator/status process.php',
                        type: 'POST',
                        data: {
                            status_p: '<?php echo $status_confirm ?>',
                            status_id: '<?php echo $Id_status ?>'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Bus Operator Have been <?php echo $status_confirm ?>d !',
                                icon: 'success',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href = 'bus operator.php';
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'There was an error while processing Bus Operator Status. Please try again later.',
                                icon: 'error',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href = 'bus operator.php';
                                }
                            });
                        }
                    });
                    }
                });
        }
    });
</script>
<?php
}
?>