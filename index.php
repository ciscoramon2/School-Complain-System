<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./asset/img/CiscotechCB-removebg-preview.png" type="image/x-icon">
    <title>Complain</title>

    <link rel="stylesheet" href="../asset/css/tailblock.css">
    <link rel="stylesheet" href="../asset/css/FLOBITE.css">

</head>
<body>   
<section class="text-gray-600 bg-gray-200 rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700 md:m-20 body-font">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Admin Dashboard</h1>
      <p class="leading-relaxed">Only Admin can veiw this spage. Admin should enter his or her details to log in.</p>
    </div>
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
        <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
        <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Log in</h2>
        <form action="./dashboard.php" method="post" name="frmname" id="frmid" onsubmit="return validate()">
            <div class="relative mb-4">
            <label for="username" class="leading-7 font-medium text-sm text-gray-600">Username</label>
            <input type="text" id="username" name="username" class="w-full bg-white rounded border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="@username">
        </div>
        <div class="relative mb-4">
            <label for="password" class="leading-7 font-medium text-sm text-gray-600">Password</label>
            <input type="password" id="password" name="password" class="w-full bg-white rounded border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <p class="mt-2 mb-2"><input type="checkbox" id="show" onclick="myFunction()"> Show Password</p>
        <input type="submit" value="Log in" class="text-white bg-blue-700 border-0 py-2 px-8 focus:outline-none hover:bg-blue-800 rounded text-lg">
        </div>
    </form>
    </div>
  </div>
</section>

    <script src="../asset/js/admin.js"></script>
    <script src="../asset/js/FLOBITE.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>