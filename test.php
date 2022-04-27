<?php 
$host = "localhost";
$user = 'root';
$password = "";
$dbName = "trinng_company";

$conn = mysqli_connect($host, $user, $password, $dbName);

// INSERT

// $insert = "INSERT INTO `courses` VALUES (null , 'php course' , 9050)";
// $i = mysqli_query($conn , $insert);

// Update

// $update = "UPDATE `courses` SET `name` = 'full stack' where id = 11 ";
// $u = mysqli_query($conn , $update);


// delete 

// $delete = "DELETE from `courses` where id >10 ";
// $d = mysqli_query($conn , $delete);


// if($d){
//     echo "true";

// } else {
//     echo "not true";
// }


// read 

// $select = "SELECT * FROM courses";
// $s = mysqli_query($conn , $select);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container col-6 mt-5 text-center">
        <table class="table table-dark">
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>cost</th>
            </tr>
            <?php foreach ($s as $data){?>
                <tr>
                    <th> <?php echo $data['id']?></th>
                    <th> <?php echo $data['NAME']?></th>
                    <th> <?php echo $data['cost']?></th>
                </tr>
   <?php } ?> 
        </table>
    </div>


</body>
</html>