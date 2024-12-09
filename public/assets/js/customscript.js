$(document).ready(function () {
    // if (typeof $ === 'undefined') {
    //     alert('jQuery is not loaded!');
    // } else {
    //     console.log("jQuery is loaded successfully.");
    // }

    $('.select2').select2();
    $('#dataTableExample').DataTable();
});

// confirm delete
function confirmDelete(customerId) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won’t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deleteForm' + customerId).submit(); // Submit the form to delete the record
        }
    });
}