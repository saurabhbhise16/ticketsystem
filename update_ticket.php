<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'ticket_system');

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ticket_id = $_POST['ticket_id'];
    $new_status = $_POST['status'];

    // Update the ticket status
    $sql = "UPDATE tickets SET status='$new_status' WHERE id='$ticket_id'";
    if ($conn->query($sql) === TRUE) {
        // Log the change in ticket_changes table
        $change_description = "Status updated to $new_status";
        $log_sql = "INSERT INTO ticket_changes (ticket_id, change_description) VALUES ('$ticket_id', '$change_description')";
        $conn->query($log_sql);

        echo "Ticket updated and change logged successfully!";
    } else {
        echo "Error updating ticket: " . $conn->error;
    }
}
?>

<a href="admin_dashboard.php">Go Back to Dashboard</a>
