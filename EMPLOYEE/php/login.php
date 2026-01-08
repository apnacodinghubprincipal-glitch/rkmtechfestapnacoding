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

    <style>
        form{
            width: 65% !important;
            margin: 50px auto !important;
        }

        .form-label{
            margin: 20px 0 !important;
        }
        .form-control{
            border-color: orangered !important;
        }

        .form-control:focus{
            box-shadow: none !important;
            border-color: purple;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="display-4 text-center text-success fw-normal my-4">User login Portal</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <?php 

                    if(isset($_GET['error']))
                    {
                        echo '<div class="alert alert-danger d-flex align-items-center" role="alert" style="width:65%; margin:25px auto; height:auto">';

                        echo '<svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
                        echo '<span>'.$_GET['error'].'</span>';
                        echo '</div>';
                    }
                     
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="showSerachData.php" method="POST">
                     <div class="mb-3">
                         <label for="username" class="form-label">User Name</label>
                         <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                     </div>
                     <div class="mb-3">
                         <label for="password" class="form-label">User Password</label>
                          <input type="password" id="password" name="password" class="form-control" placeholder="User Password">
                     </div>
                     <div class="mb-3">

                     <button type="submit" class="btn btn-primary px-4">Login </button>
                     <button type="reset" class="btn btn-danger px-4 ms-3">Reset</button>
                     </div>
                </form>
            </div>
        </div>
    </div>
    

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>