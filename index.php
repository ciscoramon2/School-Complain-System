
<?php
    require_once('./utility.php');
    $obj = new utilities;
    //$id = 0;

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($email == "" && $password == "") {
          $alert = "<div class='flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800' role='alert'>
          <svg aria-hidden='true' class='flex-shrink-0 inline w-5 h-5 mr-3' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z' clip-rule='evenodd'></path></svg>
          <span class='sr-only'>Info</span>
          <div>
            <span class='font-medium'>Danger alert!</span> Invalid Input!!!
          </div>
        </div>";
        } else {
          $sql = "SELECT email,password FROM tbl_user WHERE email = '$email'";
          $result = $obj->conn->query($sql);
          $q =  $obj->conn->query($sql);
          $r = mysqli_fetch_array($q);
          
          if($email == $r['email'] && $password == $r['password']){
              $at = "<meta http-equiv='Refresh' content=\"0; url='dashboard.php?email=".base64_encode($email)."'\" />";
          } else {
              $alert= "<div class='flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800' role='alert'>
  <svg aria-hidden='true' class='flex-shrink-0 inline w-5 h-5 mr-3' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z' clip-rule='evenodd'></path></svg>
  <span class='sr-only'>Info</span>
  <div>
    <span class='font-medium'>Danger alert!</span> Incorrect email or password!!!
  </div>
</div>";
          }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php echo @$at; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./asset/img/CiscotechCB-removebg-preview.png" type="image/x-icon">
    <title>Complain</title>

    <link rel="stylesheet" href="./asset/css/FLOBITE.css">
    <link rel="stylesheet" href="./asset/css/tailblock.css">
</head>
<body>
<section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
    <h1 class="mb-6 text-xl font-bold text-black">Student Portal</h1>
    <div class="p-10 lg:w-2/3 w-full bg-white rounded-lg border border-gray-200 shadow-md">
        <form class="space-y-6" action="#" method="post">
       
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Sign in to our platform</h5>
             <?php echo @$alert; ?>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com">
            </div>
            <div>
                <label for="pass" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your password</label>
                <input type="password" name="password" id="pass" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                <p class="mt-2 mb-2"><input type="checkbox" id="show" onclick="myFunction()"> Show Password</p>
                <a href="./forgetpass.php" class="text-blue-700 hover:underline dark:text-blue-500">Forget Password</a>
            </div>
            
            <input type="submit" name="submit" value="Log in" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        </form>
        <div class="mt-2 text-sm font-medium text-gray-500 dark:text-gray-300">
            
            Not registered? <a href="signup.php" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
        </div>
    </div>
  </div>
</section>


<script src="./asset/js/FLOBITE.js"></script>
<script>
function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

// function allpatient() {
//             var x = document.getElementById("all_patient");
//             var y = document.getElementById("hideall");
//             if (x.style.display === "block") {
//                 x.style.display = "none";
//                 y.innerHTML = "Veiw Details";
//             } else {
//                 x.style.display = "block";
//                 y.innerHTML = "Hide Details";
//             }
//         }

//         function nopatient() {
//             var x = document.getElementById("no_patient");
//             var y = document.getElementById("hideno");
//             if (x.style.display === "block") {
//                 x.style.display = "none";
//                 y.innerHTML = "Veiw Details";
//             } else {
//                 x.style.display = "block";
//                 y.innerHTML = "Hide Details";
//             }
//         }

//         function yespatient() {
//             var x = document.getElementById("yes_patient");
//             var y = document.getElementById("hideyes");
//             if (x.style.display === "block") {
//                 x.style.display = "none";
//                 y.innerHTML = "Show Details";
//             } else {
//                 x.style.display = "block";
//                 y.innerHTML = "Hide Details";
//             }
//         }
</script>
</body>
</html>