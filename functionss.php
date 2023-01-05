<?php
     function showComplains($sqlc,$cobj) {
        $i = 0;
        $result = $cobj->conn->query($sqlc);

        if (mysqli_num_rows($result) > 0) {
          //output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            echo "<tbody>
            <tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>
                <td class='py-4 px-6'>
                " .++$i. "
                </td>
                <td class='py-4 px-6'>
                    " . $row["tracking_id"]. "
                </td>
                <td class='py-4 px-6'>
                   " . $row["title"]. "
                </td>
                <td class='py-4 px-6'>
                    " . $row["date"]. "
                </td>";
                if ($row['reply'] == "no reply yet") {
                    echo "<td class='py-4 px-6 text-right'>
                    <a href='./edit.php?id=".base64_encode($row["id"])."' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>Edit</a>
                    </td>
                    <td class='py-4 px-6 text-right'>
                    <form action='#' method='POST'>
                    <input type='hidden' name='myid' value='".$row['id']."' />
                    <button type='submit' name='delete' class='font-medium text-red-600 p-2 dark:text-red-500 focus:outline-none rounded-lg hover:underline'>Delete</button>
                    </form>
                    </td>
                    </tr>
                    </tbody>";
                } else{
                     echo "<td class='py-4 px-6 text-right'>
                    <a href='./info.php?id=".base64_encode($row["id"])."' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>Info</a></td>
                    </tr>
                    </tbody>";
                }
               
          }
        } else {
          echo "<tbody>
          <tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'> 
          <td class='py-4 px-6'>
          No complain here</td>  </tr>
          </tbody>";
        }

        if (isset($_POST['delete'])) {
            $id = $_POST['myid'];
            $sqlss = "DELETE FROM tbl_complain WHERE id = '$id' ";
            $y =  $cobj->conn->query($sqlss);
            // echo $y;
            echo $at = "<meta http-equiv='Refresh' content=\"0;\" />";
        }
    }
?>