<?php
session_start(); // Start the session

// Check if the session variable for tickets exists
if (!isset($_SESSION['tickets'])) {
    $_SESSION['tickets'] = array(); // Initialize it if not set
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get the values from the form and store them in the array
    $name = htmlspecialchars($_POST['name']);
    $train_number = htmlspecialchars($_POST['train_number']);
    $departure = htmlspecialchars($_POST['departure']);
    $destination = htmlspecialchars($_POST['destination']);
    $date = htmlspecialchars($_POST['date']);
    
    // Add the new ticket to the session array
    $_SESSION['tickets'][] = array(
        "name" => $name,
        "train_number" => $train_number,
        "departure" => $departure,
        "destination" => $destination,
        "date" => $date
    );
}

// Check if the "Clear" button was clicked
if (isset($_POST['clear'])) {
    // Clear the session data
    $_SESSION['tickets'] = array();  // Reset the array to clear the data
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway Ticket Booking</title>
</head>
<body>

<header>
    <h1>Railway Ticket Booking</h1>
</header>

<div class="container">

<?php
// Display the form
echo "<h2>Book a New Ticket</h2>";
echo "<form method='POST' action=''>";
echo "<label for='name'>Passenger Name:</label>";
echo "<input type='text' id='name' name='name' required><br><br>";
echo "<label for='train_number'>Train Number:</label>";
echo "<input type='text' id='train_number' name='train_number' required><br><br>";
echo "<label for='departure'>Departure:</label>";
echo "<input type='text' id='departure' name='departure' required><br><br>";
echo "<label for='destination'>Destination:</label>";
echo "<input type='text' id='destination' name='destination' required><br><br>";
echo "<label for='date'>Date of Travel:</label>";
echo "<input type='date' id='date' name='date' required><br><br>";
echo "<input type='submit' name='submit' value='Book Ticket'>";
echo "</form>";

// Add a Clear button to reset the data
echo "<form method='POST' action=''>";
echo "<input type='submit' name='clear' value='Clear All Bookings'>";
echo "</form>";

// Display the list of booked tickets in a table
echo "<h2>Booked Tickets</h2>";
if (count($_SESSION['tickets']) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Passenger Name</th><th>Train Number</th><th>Departure</th><th>Destination</th><th>Date of Travel</th></tr>";

    foreach ($_SESSION['tickets'] as $ticket) {
        echo "<tr>";
        echo "<td>" . $ticket['name'] . "</td>";
        echo "<td>" . $ticket['train_number'] . "</td>";
        echo "<td>" . $ticket['departure'] . "</td>";
        echo "<td>" . $ticket['destination'] . "</td>";
        echo "<td>" . $ticket['date'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No tickets booked yet. Please book a ticket above!</p>";
}

?>

</div>

</body>
</html>