<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $PhoneNumber  = "";
$name_err = $PhoneNumber_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }

    // Validate address address
    $input_PhoneNumber= trim($_POST["PhoneNumber"]);
    if(empty($input_PhoneNumber)){
        $PhoneNumber_err= "Please enter PhoneNumber.";
     } else{
         $PhoneNumber= $input_PhoneNumber;
     }

// Check input errors before inserting in database
    if(empty($name_err) && empty($PhoneNumber_err)){
    // Prepare an update statement
    $sql = "UPDATE contacts SET name=?, PhoneNumber=?, WHERE id=?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_PhoneNumber, $param_id);
        
        // Set parameters
        $param_name = $name;
        $param_PhoneNumber = $PhoneNumber;
        $param_id = $id;
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records updated successfully. Redirect to landing page
            header("location: index.php");
            exit();
        }}  else{
            echo "Something went wrong. Please try again later.";
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
     mysqli_close($link);
}else{  
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
            // Get URL parameter
            $id = trim($_GET["id"]);
        
            // Prepare a select statement
            $sql = "SELECT * FROM contacts WHERE id = ?";
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ss", $param_id , $spam_name);
        
                // Set parameters
                $param_id = $id;
                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);
                
                    if(mysqli_num_rows($result) == 1){
                        /* Fetch result row as an associative array. Since the result set
                        contains only one row, we don't need to use while loop */
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                        // Retrieve individual field value
                        $name = $row["name"];
                        $address = $row["PhoneNumber"];
                    } else{
                        // URL doesn't contain valid id. Redirect to error page
                        header("location: error.php");
                        exit();
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            // Close statement
            mysqli_stmt_close($stmt);

            mysqli_close($link);
        }else{
            header("location: error.php");
            exit();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Contacts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Contact</h2>
                    </div>
                    <p>Please edit the input values and submit to update the contacts.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($PhoneNumber_err)) ? 'has-error' : ''; ?>">
                            <label>PhoneNumber</label>
                            <textarea name="PhoneNumber" class="form-control"><?php echo $PhoneNumber; ?></textarea>
                            <span class="help-block"><?php echo $PhoneNumber_err;?></span>
                        </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="index.php" class=""></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>                    


                
        
    

