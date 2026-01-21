<script>
            Swal.fire({
              title: 'Enter email address to send Account informations',
              input: 'email',
              showCancelButton: true,
              confirmButtonText: 'Yes',
              cancelButtonText: 'No'
            }).then((result) => {
              if (result.isConfirmed) {
                    Swal.fire({
                    title: 'Please wait...',
                    text: 'Sending Account information...',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    didOpen: () => {
                    Swal.showLoading();
                    // Send AJAX request to update_admin.php to update the data
                    $.ajax({
                        url: '/FYP/admin/email sent process.php',
                        type: 'POST',
                        data: {
                            email_sent: result.value,
                            id_sent: <?php echo $Id_sent ?>
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Information have been sent',
                                icon: 'success',
                                showConfirmButton: true,
                                timer: 5000,
                                willClose: () => {
                                    window.location.href = 'staff.php';
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'There was an error while sending information. Please try again later.',
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
            })
</script>