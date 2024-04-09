<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Update Alert</title>
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>

<!-- Button to trigger status update -->
<button onclick="approveStatus()">Approve Status</button>
<button onclick="rejectStatus()">Reject Status</button>

<!-- Include SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
    function showStatusAlert(status) {
        let statusColor = status === 'Approved' ? 'green' : 'red'; // Set color based on status
        let statusText = `<span style="color: ${statusColor};">${status}</span>`; // Apply color to status text

        Swal.fire({
            icon: 'success',
            title: `Status Updated to ${statusText}`,
            timer: 3000,
            showConfirmButton: false
        });
    }

    function approveStatus() {
        // Perform approval logic here (e.g., make an API call)
        // Simulate a status change to 'Approved'
        showStatusAlert('Approved');
    }

    function rejectStatus() {
        // Perform rejection logic here (e.g., make an API call)
        // Simulate a status change to 'Rejected'
        showStatusAlert('Rejected');
    }
</script>

</body>
</html>
