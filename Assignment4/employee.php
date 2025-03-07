<?php

$employees = [
    "Amit", "Bhavya", "Chirag", "Deepika", "Esha",
    "Farhan", "Gaurav", "Krushna", "Ishita", "Jayesh",
    "Sameer", "Lakshmi", "Meera", "Nikhil", "Omkar",
    "Pranav", "Quasar", "Ritika", "Suresh", "Tanvi"
];

$searchResult = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchName = trim($_POST["name"]);
    
    if (in_array($searchName, $employees)) {
        $searchResult = "Yes, '$searchName' is in the employee list.";
    } else {
        $searchResult = "Sorry, '$searchName' was not found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Lookup</title>
</head>
<body>
    <h2>Find an Employee</h2>
    <form method="post" action="employee.php">
        <label for="name">Enter Employee Name:</label>
        <input type="text" name="name" id="name" required>
        <button type="submit">Check</button>
    </form>
    <p><?php echo $searchResult; ?></p>
</body>
</html>
