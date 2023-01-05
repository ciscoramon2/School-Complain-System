<?php
    function count_complains($idst,$objst){
            $sqlst = "SELECT COUNT(complains) as 'total' FROM tbl_complain WHERE user_id = '$idst'";
            if($sqlst == TRUE){
                $show = $objst->execut_taxk($sqlst);
            }else{
                $show = "No complain yet";
            }
            return $show;
        }
        
        function showStudent($sqlst,$stobj){
            $i = 0;
            $result = $stobj->conn->query($sqlst);

            if (mysqli_num_rows($result) > 0) {
                //output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                echo "<tbody>
                <tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>
                    <td class='py-4 px-6'>
                    " .++$i. "
                    </td>
                    <td class='py-4 px-6'>
                        " . $row["fullname"]. "
                    </td>
                    <td class='py-4 px-6'>
                        " . $row["department"]. "
                    </td>
                    <td class='py-4 px-6'>
                        " . $row["gender"]. "
                    </td>
                    <td class='py-4 px-6'>
                        " .count_complains($row['id'],$stobj). "
                    </td>
                    <td class='py-4 px-6 text-right'>
                    <a href='./student.php?id=".base64_encode($row["id"])."' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>See Details</a></td>
                    </tr>
                    </tbody>";
                    
                }
            } else {
                echo "<tbody>
                <tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'> 
                <td class='py-4 px-6'>
                No Student yet</td>  </tr>
                </tbody>";
            }
        }
            
        function showComplain($sqlc,$cobj) {
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
                    <a href='./reply.php?id=".base64_encode($row["id"])."' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>Reply</a>
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
        No complain to see here</td>  </tr>
        </tbody>";
        }

    } 
?>