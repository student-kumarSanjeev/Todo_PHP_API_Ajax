<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if(!isset($_SESSION["user"])){
  header("Location:./logout.php");
}

require_once('connection.php');

$titleError = $title = "";
$descriptionError = $description = "";
$priorityError = $priority = "";
$is_completedError = $is_completed = ""; 
$isError = false;

// Return Success & Error Message for Add Todo.
$successMessage = "";
$errorMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $title = isset($_POST['title']) ? $_POST['title'] : "";
  $description = isset($_POST['description']) ? $_POST['description'] : "";
  $priority = isset($_POST['priority']) ? $_POST['priority'] : "";
  $is_completed = isset($_POST['is_completed']) ? (int)$_POST['is_completed'] : 0;

  // Security Checks. 
  if(empty($title)){
    $titleError = "<div style='color:red';>* Enter Title</div>"; 
    $isError = true;
  }
  if(empty($description)){
    $descriptionError = "<div style='color:red';>* Enter Description</div>"; 
    $isError = true;
  }
  if (empty($priority)) {
    $priorityError = "<div style='color:red';>* Select Priority</div>";
  } elseif (!in_array($priority, ['high', 'medium', 'low'])) {
    $priorityError = "Invalid priority selected.";
  }
  
  if(!isset($_POST['is_completed'])){
    $is_completedError = "<div style='color:red';>* Select task completed</div>"; 
    $isError = true;
  }
  

  // Insert Query
  if($isError == false){
    $sql = " INSERT INTO `todo_data` (`title`, `description`, `priority`, `is_completed`) VALUES ('$title', '$description', '$priority', '$is_completed')";
    $result = mysqli_query($conn, $sql);
    if($result){
      $successMessage = "<div class='font-bold text-green-800';>Success! Task Added Successfully. </div>";
    }else{
      $errorMessage = "<div style='color:red';>Error! Task Not Added.</div>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Todo List</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>

  <body>
  <nav class="flex justify-around bg-black p-[10px] text-center text-[20px] text-white">
    <h3>Todo List</h3>
    <a href="logout.php" class="w-[100px] cursor-pointer rounded-lg bg-orange-600 p-[3px] text-center hover:bg-orange-500">Logout</a>
  </nav>

  <div class="container ml-[35%] mt-[4%] flex w-[500px] flex-col items-center justify-center gap-20">
    <form action="" method="POST">
      <h1 class="text-center text-[30px] font-bold text-orange-500">Todo List</h1><br />

      <label for="title" class="text-[18px] font-semibold">Title:</label><br /><br />
      <input type="text" name="title" id="title" placeholder="Enter Todo Title" value="<?php echo $title;?>" class="w-[500px] rounded-lg border-1 p-[12px] outline-none" /><br>
      <span><?php echo $titleError; ?></span> <br />

      <label for="description" class="text-[18px] font-semibold">Description</label><br />
      <textarea name="description" cols="48" rows="5" class="mt-[20px] rounded-lg border-1" value="<?php echo $description;?>" placeholder=" Todo Description...."></textarea><br />
      <?php echo $descriptionError; ?><br>

      <label for="priority" class="text-[18px] font-semibold">Priority Level</label><br /><br />
      <select name="priority" class="w-[500px] cursor-pointer rounded-lg border-1 p-[12px]" value="<?php echo $priority;?>">
        <option value="" <?php if($priority == ""){echo "checked";}else{echo "";}?>>--- Select Priority Level ---</option>
        <option value="high" <?php if($priority == "high"){echo "selected";}else{echo "";}?>>High</option>
        <option value="medium" <?php if($priority == "medium"){echo "selected";}else{echo "";}?>>medium</option>
        <option value="low" <?php if($priority == "low"){echo "selected";}else{echo "";}?>>Low</option>
      </select><br />
      <?php echo $priorityError; ?><br>

      <label for="" class="text-[18px] font-semibold">Is Completed:</label>
      True 
      <input type="radio" name="is_completed" value="true" class="cursor-pointer" 
      <?php if ($is_completed === 1) echo 'checked'; ?> />

      False 
      <input type="radio" name="is_completed" value="false" class="cursor-pointer" 
      <?php if ($is_completed === 0) echo 'checked'; ?> />
      <br /><br />
      <?php echo $is_completedError; ?>

      <input type="submit" name="submit" value="Add Todo" class="hover:bg-orange-500 w-[500px] cursor-pointer rounded-[10px] border bg-orange-600 p-[12px] text-[20px] font-bold text-white transition-all" />
      <?php echo $successMessage?>
      <?php echo $errorMessage?>
    </form>
  </div>

  <script src="script.js"></script>
  </body>
</html>
