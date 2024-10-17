<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'ticket_system');

// Fetch tickets from the database
$result = $conn->query("SELECT * FROM tickets ORDER BY created_at DESC");
?>

<h1>Admin Dashboard</h1>
<table border="1">
    <tr>
        <th>Room Location</th>
        <th>Name</th>
        <th>Issue Category</th>
        <th>Status</th>
        <th>Created At</th>
    </tr>

    <?php while ($ticket = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $ticket['room_location']; ?></td>
            <td><?php echo $ticket['name']; ?></td>
            <td><?php echo $ticket['issue_category']; ?></td>
            <td><?php echo $ticket['status']; ?></td>
            <td><?php echo $ticket['created_at']; ?></td>
            <td>
                <!-- Button to update ticket status -->
                <form method="POST" action="update_ticket.php">
                    <input type="hidden" name="ticket_id" value="<?php echo $ticket['id']; ?>">
                    <select name="status">
                        <option value="open" <?php if ($ticket['status'] == 'open')
                            echo 'selected'; ?>>Open</option>
                        <option value="resolved" <?php if ($ticket['status'] == 'resolved')
                            echo 'selected'; ?>>Resolved
                        </option>
                    </select>
                    <input type="submit" value="Update">
                </form>
            </td>
            <td>
                <a href="view_changes.php?ticket_id=<?php echo $ticket['id']; ?>">View Change History</a>
            </td>
        </tr>
    <?php } ?>
</table>