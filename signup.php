<?php
session_start();
if(isset($_SESSION["user"])){
  header("Location: insert.php");
}

include('connection.php');
$nameError = $name = "";
$usernameError = $username = "";
$emailError = $email = "";
$passwordError = $password = "";
$isError = FALSE;

$nameVal = $name = "";
$usernameVal = $username = "";
$emailVal = $email = "";
$passwordVal = $email = "";

if($_SERVER['REQUEST_METHOD']=='POST'){
  $name = isset($_POST['name']) ? $_POST['name'] : "";
  $username = isset($_POST['username']) ? $_POST['username']: "";
  $email = isset($_POST['email']) ? $_POST['email'] : "";
  $password = isset($_POST['password']) ? $_POST['password'] : "";
  $password_hash = password_hash($_POST['password'],PASSWORD_DEFAULT);

  $nameVal = isset($_POST['name']) ? $_POST['name']: "";
  $usernameVal = isset($_POST['username']) ? $_POST['username']: "";
  $emailVal = isset($_POST['email']) ? $_POST['email']: "";
  $passwordVal = isset($_POST['password']) ? $_POST['password']: "";
  
  
  if(empty($name)){
    $nameError = "<div style='color:red';>* Enter you Name</div>";
    $isError = true;
  }
  if(empty($username)){
    $usernameError = "<div style='color:red';>* Enter Username</div><br>";
    $isError = true;
  }
  if(empty($email)){
    $emailError = "<div style='color:red';>* Enter you email</div>";
    $isError = true;
  }
  if(empty($password)){
    $passwordError = "<div style='color:red';>* Enter password</div>";
    $isError = true;
  }
  if(strlen($password)<8){
    $passwordError = "<div style='color:red';>* Enter valid password</div>";
    $isError = true;
  }

  $query = mysqli_query($conn, "SELECT * FROM `signup` WHERE email = '$email'");

  if(mysqli_num_rows($query)>0){
    $emailEmail =  "<div style='color:red';>* Email Already Exists</div>";
  }else{

  if($isError == false){
    
    //  SQL query
    $sql = "INSERT INTO `signup` (`name`, `username`, `email`, `password`) VALUES ('$name', '$username', '$email', '$password_hash')";
    $result = mysqli_query($conn, $sql);
    if($result){
         header('Location: ./login.php');
         exit(); 
    }else{
        ?>
        <div class="flex h-[20px] w-[100%] items-center justify-start gap-1 bg-red-100 p-[20px]">
          <span class="font-bold">!Error </span>
          <p>Your Information Not Inserted Successfully.</p>
        </div>
        <?php
    } 
  }
}
}
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  </head>
  <body>
  <div class="container mx-auto mt-[70px] flex h-[85vh] w-[27vw] flex-col items-center justify-center gap-[20px] rounded-[20px] bg-gray-100 shadow-2xl">
    <h1 class="text-[30px] font-bold text-orange-700">Sign Up</h1>
    <form action="" method="POST">
      <label for="name" class='text-[18px] text-gray-800'>Name:</label><br /><br>
      <input type="text" name="name" value="<?php echo $nameVal;?>" id="name" placeholder="Enter name" class="w-[370px]  rounded-[10px] border p-[13px]" /><br /><br />
      <span><?php echo $nameError?></span>

      <label for="username" class='text-[18px]text-gray-800'>Username:</label><br /><br>
      <input  type="text" name="username" value="<?php echo $usernameVal;?>" id="username" placeholder="Enter username" class="w-[370px] rounded-[10px] border p-[13px]" /><br /><br />
      <span><?php echo $usernameError?></span>
      
      <label for="email" class='text-[18px] text-gray-800'>Email:</label><br /><br>
      <input  type="email" name="email" value="<?php echo $emailVal;?>" id="email" placeholder="Enter email" class="w-[370px] rounded-[10px] border p-[13px]" /><br /><br />
      <span><?php echo $emailError?></span>
      
      <label for="password" class='text-[18px] text-gray-800'>Password:</label><br /><br>
      <input type="password" name="password" value="<?php echo $passwordVal;?>"  id="password" placeholder="Enter password" class="w-[370px] rounded-[10px] border p-[13px]" /><br /><br />
      <span><?php echo $passwordError?></span>
      
      <input type="submit" name="submit" value="Sign Up" class="h-[55px] text-[18px] w-[370px] cursor-pointer rounded-2xl bg-orange-400 p-[13px] transition-all hover:bg-orange-300" />
      <br><br>
      <a href="./login.php" class="font-medium text-[17px] text-black-600 ml-[60px] ">Already have an account ? <span class="text-blue-500"> Sign In</span></a>
    </form>
  </div>
  </body>
</html>