<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'ticket_system');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $room_location = $_POST['room_location'];
    $issue_category = $_POST['issue_category'];

    $sql = "INSERT INTO tickets (name, room_location, issue_category) VALUES ('$name','$room_location', '$issue_category')";
    if ($conn->query($sql) === TRUE) {
        echo "Ticket created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST" action="">
    <label for="room_location">Room Location:</label>
    <input type="text" name="room_location" required><br>

    <label for="room_location">Name:</label>

    <input type="text" name="name" required><br>

    <label for="issue_category">Issue Category:</label>
    <select name="issue_category">
        <option value="New OS Installation">New OS Installation</option>
        <option value="Printer Issue">Printer Issue</option>
        <option value="Software Update">Software Update</option>
    </select><br>

    <input type="submit" value="Submit Ticket">
</form>