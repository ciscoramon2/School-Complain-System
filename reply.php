<?php
require_once('../utility.php');
require_once('../complain.php');
$obj = new utilities;
$objs = new complain;

$id = base64_decode($_GET['id']);
$sqls = "SELECT * FROM tbl_complain WHERE id = '$id'";
$qs =  $obj->conn->query($sqls);
$rc = mysqli_fetch_array($qs);

$sql = "SELECT * FROM tbl_user WHERE id = '".$rc['user_id']."'";
$q =  $obj->conn->query($sql);
$r = mysqli_fetch_array($q);

    function repspch($input){
        $replace = str_replace(["'","/",";","\"","\\","/","#","&","="],"",$input);
        return $replace;
    }
    
    if(isset($_POST['addreply'])){
        $reply = repspch($_POST['reply']);

        $sqlss = "UPDATE tbl_complain SET reply = '$reply' WHERE id = '$id'";

        if ($obj->conn->query($sqlss)){
            mail($r['email'], "FSS Complain", 
            "Hello, 
            Dear".$r['fullname'].", Ther is a reply to your complain on ".$rc['title']." with tracking id ".$rc['tracking_id'].".
           Click on the link below to veiw:
            http://covidtest.cf/admin 
            ");
              $alertt = "<section style='display:block;' id='hid' class='text-gray-600 p-10 pt-20 body-font'>
              <div class='container mx-auto flex px-5 py-24 items-center justify-center flex-col'>
                <div class='text-center lg:w-2/3 w-full'>
                  <h1 class='title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900'>Replied is Successfull!!!</h1>
                  <p class='mb-8 leading-relaxed'>Repled Successfully. The user will get an on the reply. Kindly wait to load to your dashboard. 
                  <br> it will take some seconds to process it...</p>
                </div>
              </div>
            </section>
            ";
              $at = "<meta http-equiv='Refresh' content=\"2; url='dashboard.php'\" />";
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
    <link rel="shortcut icon" href="../asset/img/CiscotechCB-removebg-preview.png" type="image/x-icon">

    <link rel="stylesheet" href="../asset/css/FLOBITE.css">
    <link rel="stylesheet" href="../asset/css/tailblock.css">
    <title>Complain</title>
</head>
<body onload="disp()">

<header>
  <nav class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
      <div class="flex flex-wrap justify-between items-center">
            <div class="flex justify-start items-center">
              <a href="#" class="flex mr-4">
              <img src="../asset/img/CISCOTECH.png" class="mr-3 h-12" alt="Ciscotech Logo" />
                <!-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FSS</span> -->
              </a>
            </div>
        </div>
  </nav>
</header>

  <!-- Breadcrumb -->
  <nav class="flex m-5 mt-20 px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-3">
    <li class="inline-flex items-center">
      <div onclick="self.history.back();" style="cursor: pointer;" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
        Home
</div>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Reply page</span>
      </div>
    </li>
  </ol>
</nav>

<div class="m-5 mt-0 p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
<?php
    echo @$alertt;
?> 
<form action="#" method="post" style="display: block;" id="bform"  class="m-5 mt-0">
                <?php echo @$alert; ?>
                <div class="pb-4">
                
                    <div>
                        <label for="tracking_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tracking Id</label>
                        <input type="text" name="tracking_id" id="brand" value="<?php echo $rc['tracking_id']; ?>" class="bg-gray-50 border border-none text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled>
                    </div>
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tile</label>
                        <input type="text" value="<?php echo $rc['title']; ?>" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Title" disabled>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="complains" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Complain</label>
                        <textarea id="complains" rows="10" name="complains" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" maxlength="10000" placeholder="Write your complain..." disabled><?php echo $rc['complains']; ?></textarea>                    
                    </div>
                    <div class="sm:col-span-2">
                        <label for="sugestion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Suggestion</label>
                        <textarea id="sugestion" rows="5" name="sugestion" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" maxlength="10000" placeholder="Write a sugestion..." disabled><?php echo $rc['sugestion']; ?></textarea>                    
                    </div>
                    <div class="sm:col-span-2">
                        <label for="reply" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reply</label>
                        <textarea id="reply" rows="10" name="reply" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" maxlength="10000" placeholder="Add a reply..."></textarea>                    
                </div>
                </div>
                
                <button type="submit" name="addreply" class="text-white inline-flex items-center bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Add a Reply
                </button>
            </form>
</div>
<footer class="p-6 bg-black shadow md:px-6 md:py-8 dark:bg-gray-900">
    <div class="sm:flex sm:items-center sm:justify-between">
        <a href="#" class="flex items-center mb-0 sm:mb-0">
        <img src="../asset/img/CISCOTECH.png" class="mr-3 h-12" alt="Ciscotech Logo" />
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

    <script src="../asset/js/FLOBITE.js"></script>
    <script src="../asset/js/tailwind.config.js"></script>
    <script>
        function disp(){
            if(document.getElementById('hid').style.display == "block"){
                document.getElementById('bform').style.display ="none";
                document.getElementById('sub').style.display ="none";
            }
        }
    </script>
</body>
</html>