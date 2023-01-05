
<?php
    require_once('./user.php');
    $obj = new user;
    //$id = 0;
    
    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $department = $_POST['department'];
        $password = $_POST['password'];

        $obj->set_fullname($_POST['fullname']);
        $obj->set_email($_POST['email']);
        $obj->set_gender($_POST['gender']);
        $obj->set_department($_POST['department']);
        $obj->set_password($_POST['password']);
        $obj->is_new = 1;

        if ($obj->apply_edit($obj->get_id())){
            mail("$email", "FSS Complain", 
            "Hello, 
            Dear $fullname you just sign up on our website with the following info: 
            Email: $email 
            Password: $password 
            Click on the link below to log in to your dashboard:
            http://covidtest.cf
            - Ciscotech 
            "); 
            $at = "<meta http-equiv='Refresh' content=\"0; url='dashboard.php?email=".base64_encode($email)."'\" />";
            
        } else {
            $alert= "<div class='flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800' role='alert'>
            <svg aria-hidden='true' class='flex-shrink-0 inline w-5 h-5 mr-3' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z' clip-rule='evenodd'></path></svg>
            <span class='sr-only'>Danger</span>
            <div>
              <span class='font-medium'>Ensure that these requirements are met:</span>
                <ul class='mt-1.5 ml-4 text-red-700 list-disc list-inside'>
                  ".$obj->get_error_msg()."
              </ul>
            </div>
          </div>";
        }
    }
    
    ?><!DOCTYPE html>
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
  <?php //echo @$alertt; ?>
<section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
    <h1 class="mb-6 text-xl font-bold text-black">Student Portal</h1>
    <div class="p-10 lg:w-2/3 w-full bg-white rounded-lg border border-gray-200 shadow-md">
    <h1 class="text-xl  text-center font-bold text-black">Sign Up</h1>
<form action="#" method="post">
     <?php echo @$alert; ?>
        <div class="mb-6">
            <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fullname</label>
            <input type="text" name="fullname" value="<?php echo @$fullname ?>" id="fullname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John">
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email address</label>
            <input type="email" name="email" value="<?php echo @$email ?>" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com">
        </div> 
        <div class="mb-6"> 
            <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Department</label>
            <select id="department" name="department" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected value="Computer Science">Computer Science</option>
            <option value="Accounting">Accounting</option>
            <option value="Business Addministration">Business Addministration</option>
            <option value="Statistics">Statistics</option>
        </select>
        </div>
        <div class="mb-6">  
        <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Gender</h3>
        <ul class="w-48 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                <div class="flex items-center pl-3">
                    <input id="list-radio-license" checked type="radio" value="female" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="list-radio-license" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                </div>
            </li>
            <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                <div class="flex items-center pl-3">
                    <input id="list-radio-passport" type="radio" value="male" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="list-radio-passport" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>             </div>
            </li>
        </ul>
        </div>
    
    <div class="mb-6">
        <label for="pass" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
        <input type="password" value="<?php echo @$password ?>" name="password" id="pass" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <p class="mt-2"><input type="checkbox" id="show" onclick="myFunction()"> Show Password</p>
    </div> 
    <input type="submit" name="submit" value="Sign Up" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
</form>
<div class="mt-2 text-sm font-medium text-gray-500 dark:text-gray-300">
          Already have an account? <a href="index.php" class="text-blue-700 hover:underline dark:text-blue-500">Log in</a>
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
</script>
</body>
</html>