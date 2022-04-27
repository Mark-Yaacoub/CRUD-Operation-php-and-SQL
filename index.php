
<?php 
$host = "localhost";
$user = 'root';
$password = "";
$dbName = "trinng_company";

$conn = mysqli_connect($host, $user, $password, $dbName);


if(isset($_POST['send'])){
    $name = $_POST['courseName'];
    $cost = $_POST['courseCost'];
 $insert = "INSERT INTO `courses` VALUES (null , '$name' , $cost)";
    $i = mysqli_query($conn , $insert);

    if($i){
        echo "<div class='alert alert-warning alert-dismissible text-center fade show' role='alert'>
        INSER Data Done
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
    }

}

$select = "SELECT * FROM `courses` " ;
    $s = mysqli_query($conn, $select);
    $name="";
    $cost="";
    $update=false;
    if(isset($_GET['edit'])){
        $update = true;
        $id = $_GET['edit'];
        $select = "SELECT * from `courses` WHERE id = $id";
        $ss= mysqli_query($conn, $select);
        $row = mysqli_fetch_assoc($ss);
        $name = $row['name'];
        $cost = $row['cost'];

        if(isset($_POST['update'])){
            $name = $_POST['courseName'];
            $cost = $_POST['courseCost'];
            $update = "UPDATE `courses` SET `name`='$name', cost = $cost WHERE id = $id";
            $u= mysqli_query($conn, $update);
            header('location:index.php');
            
        }
        
    
    }

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete =  "DELETE from `courses` WHERE id = $id";
    $d = mysqli_query($conn , $delete);
    header('location:index.php');

    
}

if (isset($_GET['change'])){
    $num = $_GET['change'];
    $update =  "UPDATE  `color` SET  `color`=$num";
    $n = mysqli_query($conn , $update);
    header('location:index.php');
}

$selectColor = "SELECT color from `color` where id = 1 " ;
$sc = mysqli_query($conn , $selectColor);
$colorNamber = mysqli_fetch_assoc($sc);
$thisNamber = $colorNamber ['color'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php if ($thisNamber == '1') : ?>
   <link rel="stylesheet" href="./dark.css">
    <?php else : 
        
        ?>
    <link rel="stylesheet" href="./light.css">
    <?php endif;?>


    <?php if ($thisNamber == '1') : ?>
    <a href="index.php?change='2'" class="btn btn-light"> light Mood </a>
    <?php else : 
        
        ?>
    <a href="index.php?change='1'" class="btn btn-dark"> Dark Mood </a>
    <?php endif;?>


    <div class="container col-6 mt-5 text-center">
        <div class="card card-body">

        <form method="POST">
            <div class="form-group">
                <label>course name</label>
                <input type="text" value="<?php echo $name ?>" name="courseName" class="form-control" placeholder="course cost">
            </div>
            <div class="form-group">
                <label>cost name</label>
                <input type="text" value="<?php echo $cost ?>" name="courseCost" class="form-control" placeholder="course cost">
            </div>
            <?php if ($update) : ?>
                <button class="btn btn-warning" name="update">Update Data</button>
                <?php else : ?>
                    <button class="btn btn-info" name="send">send data</button>
                <?php endif; ?>
        </form>
        </div>
    </div>

<div class="container col-lg-6 mt-5 text-center">
    <table class="table table-dark">
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>cost</th>
                <th class="text-center">action</th>
            </tr>
            <?php foreach ($s as $data){?>
                <tr>
                    <th> <?php echo $data['id']?></th>
                    <th> <?php echo $data['name']?></th>
                    <th> <?php echo $data['cost']?></th>
                    <th><a onclick="return confirm('ara your suer')" href="index.php?delete=<?php echo $data['id']?>" class="btn btn-danger">Delete</a></th>
                    <th><a  href="index.php?edit=<?php echo $data['id']?>" class="btn btn-info">Edit</a></th>
                </tr>
   <?php } ?> 
        </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>