<?php
session_start();
if(isset($_SESSION["user"])){
  header("Location: insert.php");
}
include('connection.php');

$emailVal = $email = "";
$passwordVal = $email = "";
$emailNotMatch  = "";
$passwordNotMatch ="";
 
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `signup` WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $emailVal = isset($_POST['email']) ? $_POST['email']: "";
    $passwordVal = isset($_POST['password']) ? $_POST['password']: "";

    if($user){
        if(!password_verify($password, $user['password'])){
            $passwordNotMatch = "<div class='text-red-600'>Password does't match.</div>";
        }
        else{
            session_start();
            $_SESSION["user"] = "yes";
            header("Location: insert.php");
            die();
        }
    }else{
        $emailNotMatch = "<div class='text-red-600'>Email does not match.</div>";
    }
}
?>


<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

  </head>
  <body>
  <div class="container mx-auto mt-[100px] flex h-[65vh] w-[25vw] flex-col items-center justify-center gap-[20px] rounded-[20px] bg-gray-100 shadow-2xl">
    <h1 class="text-[30px] font-bold text-orange-700">Sign In</h1>
    <form action="" method="POST"> 
      <label for="email" class='text-[20px] text-gray-800 font-semibold'>Email:</label><br /><br>
      <input autocomplete="off" type="email" name="email" value="<?php echo $emailVal;?>" id="email" placeholder="Enter email" class="w-[350px] rounded-[10px] border p-[13px]" /><br /><br />
      <span><?php echo $emailNotMatch; ?></span><br>

      <label for="password" class='text-[20px] text-gray-800 font-semibold'>Password:</label><br /><br>
      <input type="password" name="password" value="<?php echo $passwordVal;?>" id="password" placeholder="Enter password" class="w-[350px] rounded-[10px] border p-[13px]" /><br /><br />
      <span><?php echo $passwordNotMatch; ?></span><br>
      <input type="submit" name="login" value="Sign In" class="h-[55px] text-[18px] font-semibold w-[350px] cursor-pointer rounded-2xl bg-orange-400 p-[13px] transition-all hover:bg-orange-300" />
      <br><br>
      <a href="./signup.php" class="font-medium text-[17px] text-black-600 ml-[55px] ">Don't Have any account ? <span class="text-blue-500"> Sign Up</span></a>
    </form>
  </div>
  </body>
</html>