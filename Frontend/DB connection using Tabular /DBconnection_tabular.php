<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information On Books Available</title>
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
<style>

        body {
            font-family:sans-serif;
            background-color:white;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color:slategray;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #D6EEEE;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>

</head>

<body>
    <div class=" container">
        <h2 style="text-align: center;color:red;">Information On Books Available</h2>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$server = "127.0.0.1";
$username = "root";
$password = "Mojgenie@0111";
$dbname = "library_management";

$connection = new mysqli($server, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


// SQL query to fetch data
$sql = "SELECT 
    title AS 'Book Title', 
    prize AS 'Price' 
    
    FROM items";

if (!isset($connection)) {
    die("Error: \$connection is not set.");
}

if (!$connection) {
    die("Error: \$connection is null.");
}

$result = $connection->query($sql);

if ($result === false) {
    die("Error executing the query: " . $connection->error);
}

// Display the results in a table
if ($result->num_rows > 0) {
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    while ($column = $result->fetch_field()) {
        echo '<th>' . htmlspecialchars($column->name) . '</th>';
    }
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        foreach ($row as $value) {
            echo '<td>' . htmlspecialchars($value) . '</td>';
        }
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo "0 results";
}

$connection->close();
?>
</div>
</body>

</html>

