<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <a href="create.php" class="btn btn-primary" role="button">New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Adress</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $database = "dt_crud";

            $connection = new mysqli($servername, $username, $password, $database);

            if ($connection->connect_error) {
                die("Connection failed" . $connection->connect_error);
            }

            $sql = "SELECT * FROM clients";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query " . $connection->connect_error);
            }

            while ($row = $result->fetch_assoc())
                echo "
                <tbody>
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[address]</td>
                        <td>$row[created_at]</td>
                        <td>
                            <a class='btn btn-primary bt-sm' href='edit.php?id=$row[id]'>Edit</a>
                            <a class='btn btn-danger bt-sm' href='delete.php?id=$row[id]'>Delete</a>
                        </td>    
                    </tr>
                    ";
            ?>
            </tbody>
        </table>
    </div>

</body>

</html>