<?php 

// database connection file import
include "connection.php";

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-4 text-center text-success fw-normal my-4">Employee Portal View</h1>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table mt-4 table-striped  text-center align-middle table-bordered">
                    <thead class="table-dark">
                        <th scope="col">#</th>
                        <th scope="col">Emp ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Email </th>
                        <th scope="col">Mobile</th>
                        <th scope="col">City</th>
                        <th scope="col">Photo</th>
                        
                    </thead>
                    <tbody>
                        <?php 

                    $sql = "SELECT DISTINCT * FROM `employee`";
                    
                    $query = mysqli_query($conn,$sql);

                    if(mysqli_num_rows($query)>0)
                    {
                        $count= 1;
                        while($row=mysqli_fetch_assoc($query))
                        {
                            echo "<tr>".PHP_EOL;
                            echo "<th scope='row'>".$count++."</th>".PHP_EOL;
                            echo "<td>".$row['eid']."</td>".PHP_EOL;
                            echo "<td>".$row['empname']."</td>".PHP_EOL;
                            echo "<td>".$row['username']."</td>".PHP_EOL;
                            echo "<td>".str_repeat('x',strlen($row['password'])-2)."-".substr($row['password'],-2)."</td>".PHP_EOL;
                            echo "<td>".$row['email']."</td>".PHP_EOL;
                            echo "<td>".$row['mobile']."</td>".PHP_EOL;
                            echo "<td>".$row['city']."</td>".PHP_EOL;
                            echo "<td><img src='".$row['photo_path']."' class='img-thumbnail' width='100px'></td>".PHP_EOL;
                            echo "</tr>".PHP_EOL;
                        }
                    }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>