<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'ticket_system');

// Get ticket_id from the URL
$ticket_id = $_GET['ticket_id'];

// Fetch changes for the ticket
$result = $conn->query("SELECT * FROM ticket_changes WHERE ticket_id='$ticket_id' ORDER BY changed_at DESC");
?>

<h1>Change History for Ticket ID <?php echo $ticket_id; ?></h1>
<table border="1">
    <tr>
        <th>Change Description</th>
        <th>Changed At</th>
    </tr>

    <?php while ($change = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $change['change_description']; ?></td>
        <td><?php echo $change['changed_at']; ?></td>
    </tr>
    <?php } ?>
</table>

<a href="admin_dashboard.php">Go Back to Dashboard</a>
