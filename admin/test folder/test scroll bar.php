<!DOCTYPE html>
<html>
<head>
    <title>Horizontal Scroll Bar Example</title>
    <style>
        .container {
            width: 100%;
            overflow-x: auto; /* Enable horizontal scrolling */
        }
        table {
            width: 500%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>ffss</th>
                    <th>ffss</th>
                    <th>ffss</th>
                    <th>ffss</th>
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Example data
                $data = array(
                    array('John Doe', 25, 'idk' , 'idk'),
                    array('Jane Smith', 32 , 'idk' , 'idk'),
                    array('Bob Johnson', 40 , 'idk' , 'idk'),
                    array('John Doe', 25 , 'idk' , 'idk'),
                    array('Jane Smith', 32 , 'idk' , 'idk'),
                    array('Bob Johnson', 40 , 'idk' , 'idk'),
                    array('John Doe', 25 , 'idk', 'idk'),
                    array('Jane Smith', 32 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    array('Bob Johnson', 40 , 'idk', 'idk'),
                    // Add more data rows as needed
                );

                // Loop through the data and generate table rows
                foreach ($data as $row) {
                    echo "<tr>";
                    echo "<td>{$row[0]}</td>";
                    echo "<td>{$row[1]}</td>";
                    echo "<td>{$row[2]}</td>";
                    echo "<td>{$row[3]}</td>";
                    echo "<td>{$row[3]}</td>";
                    echo "<td>{$row[3]}</td>";
                    echo "<td>{$row[3]}</td>";
                    echo "<td>{$row[3]}</td>";
                    echo "<td>{$row[3]}</td>";
                    echo "<td>{$row[3]}</td>";
                    echo "<td>{$row[3]}</td>";
                    echo "<td>{$row[3]}</td>";
                    echo "<td>{$row[3]}</td>";
                    echo "<td>{$row[3]}</td>";
                    // Add more table cells as needed
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div style="margin-top: 5rem; display: flex; align-items: center;">
    <label for="booking_rating_comment">
        <h4 style="font-size: 1.5em">Booking Rating Comment:</h4>
    </label>
    <textarea style="margin-left: 1rem; flex-grow: 1; text-align: center; border: 1px solid #ccc; padding: 8px; height: 100px; resize: vertical; display: flex; justify-content: center; align-items: center;" id="booking_rating_comment" placeholder="Have not commented" name="booking_rating_comment" rows="4" cols="50" disabled><?php echo $comments ?></textarea>
</div>
</body>
</html>
