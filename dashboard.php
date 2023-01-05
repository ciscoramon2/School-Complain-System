<?php
  require_once('./utility.php');
  require_once('./functionss.php');
  $obj = new utilities;

  $email = base64_decode($_GET['email']);
  $sql = "SELECT * FROM tbl_user WHERE email = '$email'";
  $result = $obj->conn->query($sql);
  $r = mysqli_fetch_array($result);

  //echo @$email;
  
  if(@$email == ""){
    @$at = "<meta http-equiv='Refresh' content=\"0; url='index.php'\" />";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php echo @$at; ?>
    <link rel="shortcut icon" href="./asset/img/CiscotechCB-removebg-preview.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complain</title>

    <link rel="stylesheet" href="./asset/css/FLOBITE.css">
    <link rel="stylesheet" href="./asset/css/tailblock.css">
</head>
<body>
<header>
  <nav class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
      <div class="flex flex-wrap justify-between items-center">
          <div class="flex justify-start items-center">
              <a href="#" class="flex mr-4">
                <img src="./asset/img/CISCOTECH.png" class="mr-3 h-12" alt="Ciscotech Logo" />
                <!-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FSS</span> -->
              </a>
            </div>
          <div class="flex items-center lg:order-2">
              <!-- Apps -->
              <button type="button" data-dropdown-toggle="apps-dropdown" class="p-2 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                  <span class="sr-only">View notifications</span>
                  <!-- Icon -->
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
              </button>
              <!-- Dropdown menu -->
              <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:bg-gray-700 dark:divide-gray-600" id="apps-dropdown">
                  <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      Apps
                  </div>
                  <div class="grid grid-cols-3 gap-4 p-4">
                  <a href="#all_complain" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                  <svg aria-hidden="true" class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path></svg>
                      <div class="text-sm text-gray-900 dark:text-white">Complains</div>
                  </a>
                  <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                      <svg aria-hidden="true" class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                      <div class="text-sm text-gray-900 dark:text-white">Users</div>
                  </a>
                  <a href="profile.php?id=<?php echo base64_encode($r['id']); ?>" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                  <svg aria-hidden="true" class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                      <div class="text-sm text-gray-900 dark:text-white">Profile</div>
                  </a>
                  <a href="./addcomplain.php?id=<?php echo base64_encode($r['id']); ?>" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                    <svg aria-hidden="true" class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path></svg>
                    <div class="text-sm text-gray-900 dark:text-white">Add new complain</div>
                  </a>
                 
                  
                  <a href="#" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                  <svg aria-hidden="true" class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                      <div class="text-sm text-gray-900 dark:text-white">Settings</div>
                  </a>
                  <a href="index.php" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                  <svg aria-hidden="true" class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                      <div class="text-sm text-gray-900 dark:text-white">Logout</div>
                  </a>
                 
                  </div>
              </div>
              <button type="button" class="flex mx-3 text-sm bg-white rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                  <span class="sr-only">Open user menu</span>
                  <svg aria-hidden="true" class="mx-auto mb-1 w-7 h-7 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
              </button>
              <!-- Dropdown menu -->
              <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown">
                  <div class="py-3 px-4">
                      <span class="block text-sm font-semibold text-gray-900 dark:text-white"><?php echo $r['fullname'] ?></span>
                      <span class="block text-sm font-light text-gray-500 truncate dark:text-gray-400"><?php echo $r['email'] ?></span>
                  </div>
                  <ul class="py-1 font-light text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
                      <li>
                          <a href="profile.php?id=<?php echo base64_encode($r['id']); ?>" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">My profile</a>
                      </li>
                  </ul>
                  <ul class="py-1 font-light text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
                      <li>
                          <a href="index.php" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </nav>
</header>
<div class="bg-gray-200 m-5 mt-10 pt-8 pb-8 mb-0">
<form action="#complains" method="post" class="m-4">
        <div class="flex">
            <label for="states" class="sr-only">Search by</label>
            <select id="states" name="selectc" class="flex-shrink-0 z-10 inline-flex py-2.5 px-8 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-200 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                <option selected>Search by</option>
                <option value="tracking_id">Tracking_id</option>
                <option value="title">Title</option>
            </select>
    
            <div class="relative w-full">
                <input type="search" name="searchc" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-200 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search..." required>
                <button type="submit" name="featchc" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <span class="sr-only">Search</span>
                </button>
        </div>
    </div>
    </form>
    <?php
        if (isset($_POST['featchc'])) {
            echo"<div id='complains' class='m-5 mb-0 mt-0 pb-0 p-6 overflow-x-auto relative'>
            <table class='w-full text-sm text-left text-gray-500 dark:text-gray-400'>
            <thead class='text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400'>
                <tr>
                    <th scope='col' class='py-3 px-6'>
                        S/N
                    </th>
                    <th scope='col' class='py-3 px-6'>
                        Tracking Id
                    </th>
                    <th scope='col' class='py-3 px-6'>
                        Title
                    </th>
                    
                    <th scope='col' class='py-3 px-6'>
                        Date
                    </th>
                    <th scope='col' class='py-3 px-6'>
                        <span class='sr-only'>info</span>
                    </th>
                    <th scope='col' class='py-3 px-6'>
                        <span class='sr-only'>Delete</span>
                    </th>
                </tr>
            </thead>";
           $selectc = $_POST['selectc'];
           $searchc = $_POST['searchc'];
           $sqls = "SELECT * FROM tbl_complain WHERE $selectc LIKE '$searchc%' AND user_id='".$r['id']."' ORDER BY id DESC";
           echo showComplains($sqls,$obj);
          echo "<button type='button' onclick='self.history.back()' class='text-white mb-2 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-auto sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>Cancel Search</button>
          </table></div>";
   
 } 
 ?>
</div>
<div class="bg-gray-200 grid gap-6 m-5 mb-0 rounded-lg mt-0 md:grid-cols-2">
    <div class="m-10 p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Number of Complains</h5>
    <h1 class="mb-2 p-4 text-4xl text-center font-bold tracking-tight text-dark-500 dark:text-white">
      <?php 
        $sql = "SELECT COUNT(complains) as 'total' FROM tbl_complain WHERE user_id='".$r['id']."'";
        if($sql == TRUE){
            echo $obj->execut_taxk($sql);
          }else{
              echo "No complain yet";
          }
      ?>
    </h1>
    <a href="#all_complain" id="hideall" onclick="allcomplain()" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        View Details
        <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </a>
</div>

<div class="m-10 p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Number of Complains with Reply</h5>
    <h1 class="mb-2 text-4xl text-center font-bold tracking-tight text-dark-500 dark:text-white">
      <?php 
        $sql = "SELECT COUNT(complains) as 'total' FROM tbl_complain WHERE reply !='no reply yet' AND user_id='".$r['id']."'";
        if($sql == TRUE){
            echo $obj->execut_taxk($sql);
          }else{
              echo "No complain with replys yet";
          }
      ?>
    </h1>
    <a href="#no_complain" id="hideno" onclick="nocomplain()" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        View Details
        <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </a>
</div>

<div class="m-10 p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Number of Complains with out Reply</h5>
    <h1 class="mb-2 text-4xl text-center font-bold tracking-tight text-dark-500 dark:text-white">
      <?php 
        $sql = "SELECT COUNT(complains) as 'total' FROM tbl_complain WHERE reply ='no reply yet' AND user_id='".$r['id']."'";
        if($sql == TRUE){
            echo $obj->execut_taxk($sql);
          }else{
              echo "All complains have beeen replyed";
          }
      ?>
    </h1>
    <a href="#yes_complain" id="hideyes" onclick="yescomplain()" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        View Details
        <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </a>
</div>

</div>


<div id="all_complain" style="display: none;" class="m-5 mt-0  p-6 overflow-x-auto relative shadow-md sm:rounded-lg">
<h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Table for all Complains</h5>
<?php
     
?>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    S/N
                </th>
                <th scope="col" class="py-3 px-6">
                    Tracking Id
                </th>
                <th scope="col" class="py-3 px-6">
                    Title
                </th>
                
                <th scope="col" class="py-3 px-6">
                    Date
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">info</span>
                    
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Delete</span>
                </th>
            </tr>
        </thead>
        <?php
            $sqls = "SELECT * FROM tbl_complain WHERE user_id='".$r['id']."' ORDER BY id DESC";
            echo showComplains($sqls,$obj);
        ?>
    </table>
</div>

<div id="no_complain" style="display: none;" class="m-5 mt-0  p-6 overflow-x-auto relative shadow-md sm:rounded-lg">
<h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Table of Complains with replies</h5>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    S/N
                </th>
                <th scope="col" class="py-3 px-6">
                    Tracking Id
                </th>
                <th scope="col" class="py-3 px-6">
                    Title
                </th>
                
                <th scope="col" class="py-3 px-6">
                    Date
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">info</span>
                </th>
            </tr>
        </thead>
        <?php
            $sqls = "SELECT * FROM tbl_complain WHERE user_id='".$r['id']."' AND reply !='no reply yet' ORDER BY id DESC";
            echo showComplains($sqls,$obj);
        ?>
    </table>
</div>

<div id="yes_complain" style="display: none;" class="m-5 mt-0  p-6 overflow-x-auto relative shadow-md sm:rounded-lg">
<h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Table of Complains with no replies</h5>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    S/N
                </th>
                <th scope="col" class="py-3 px-6">
                    Tracking Id
                </th>
                <th scope="col" class="py-3 px-6">
                    Title
                </th>
                
                <th scope="col" class="py-3 px-6">
                    Date
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">info</span>
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Delete</span>
                </th>
            </tr>
        </thead>
        <?php
           
            $sqls = "SELECT * FROM tbl_complain WHERE user_id='".$r['id']."' AND reply ='no reply yet' ORDER BY id DESC";
            echo showComplains($sqls,$obj);
        ?>
    </table>
</div>

<footer class="p-6 bg-black shadow md:px-6 md:py-8 dark:bg-gray-900">
    <div class="sm:flex sm:items-center sm:justify-between">
        <a href="#" class="flex items-center mb-0 sm:mb-0">
        <img src="./asset/img/CISCOTECH.png" class="mr-3 h-12" alt="Ciscotech Logo" />
            <!-- <span class="self-center text-white text-2xl font-semibold whitespace-nowrap dark:text-white">FSS</span> -->
        </a>
        <ul class="flex flex-wrap items-center mb-4 text-sm text-gray-500 sm:mb-0 dark:text-gray-400">
            <li>
                <a href="#"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                <span class="sr-only">Facebook page</span></a>
            </li>
            <li>
                <a href="#"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                <span class="sr-only">Instagram page</span></a>
            </li>
            <li>
                <a href="#"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                <span class="sr-only">Twitter page</span></a>
            </li>
            <li>
                <a href="#"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                <span class="sr-only">GitHub account</span></a>
            </li>
        </ul>
    </div>
    <hr class="my-4 border-gray-200 sm:mx-8 dark:border-gray-700 lg:my-4">
    <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="#" class="hover:underline">Ciscotech Technology</a>. All Rights Reserved.
    </span>
</footer>


    
    <script src="./asset/js/tailwind.config.js"></script>
    <script src="./asset/js/FLOBITE.js"></script>
    <script>
        function allcomplain() {
                    var x = document.getElementById("all_complain");
                    var y = document.getElementById("hideall");
                    if (x.style.display === "block") {
                        x.style.display = "none";
                        y.innerHTML = "Veiw Details";
                    } else {
                        x.style.display = "block";
                        y.innerHTML = "Hide Details";
                    }
                }

                function nocomplain() {
                    var x = document.getElementById("no_complain");
                    var y = document.getElementById("hideno");
                    if (x.style.display === "block") {
                        x.style.display = "none";
                        y.innerHTML = "Veiw Details";
                    } else {
                        x.style.display = "block";
                        y.innerHTML = "Hide Details";
                    }
                }

                function yescomplain() {
                    var x = document.getElementById("yes_complain");
                    var y = document.getElementById("hideyes");
                    if (x.style.display === "block") {
                        x.style.display = "none";
                        y.innerHTML = "Show Details";
                    } else {
                        x.style.display = "block";
                        y.innerHTML = "Hide Details";
                    }
                }
    </script>
</body>
</html>