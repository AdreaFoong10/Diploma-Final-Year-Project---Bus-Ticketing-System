<!-- Check title and save the url into a variable based on the title -->

<script>
    Swal.fire({
        title: 'Do you want to delete <br><?php echo $title ?><br> ID : <?php echo $Id_delete ?> ?',
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
                    text: 'Deleting data...',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    didOpen: () => {
                    Swal.showLoading();
                    // Send AJAX request to update_admin.php to update the data
                    $.ajax({
                        url: '/FYP/admin/route/delete route process.php',
                        type: 'POST',
                        data: {
                            id_del: '<?php echo $Id_delete ?>',
                            title_del: '<?php echo $title ?>'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Data Have been Deleted !',
                                icon: 'success',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href = 'bus route.php';
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'There was an error while deleting data. Please try again later.',
                                icon: 'error',
                                showConfirmButton: true,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href = 'bus route.php';
                                }
                            });
                        }
                    });
                    }
                });
        }
    });
</script>
