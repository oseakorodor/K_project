<?php
include 'config.php'; // Include database connection

// Fetch all memorials
$result = $conn->query("SELECT * FROM memorials ORDER BY died DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memorial Notices</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .memorial-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .memorial-card {
            background: white;
            margin: 15px;
            padding: 15px;
            width: 300px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .memorial-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .memorial-card h3 {
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <h2>Memorial Notices</h2>
    <div class="memorial-container">
        <?php while ($row = $result->fetch_assoc()): ?>
        <div class="memorial-card">
            <img src="uploads/<?php echo $row['image']; ?>" alt="Memorial Image">
            <h3><?php echo $row['title'] . ' ' . $row['name']; ?></h3>
            <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
            <p><strong>Age:</strong> <?php echo $row['age']; ?></p>
            <p><strong>Date of Death:</strong> <?php echo $row['died']; ?></p>
            <p><strong>Funeral Date:</strong> <?php echo $row['funeral']; ?></p>
            <p><strong>Funeral Place:</strong> <?php echo $row['place_of_funeral']; ?></p>
            <p><?php echo $row['description']; ?></p>
        </div>
        <?php endwhile; ?>
    </div>

</body>
</html>

<?php $conn->close(); ?>
 
