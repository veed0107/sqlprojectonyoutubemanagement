<?php
 $servername = "localhost"; 
 $username = "root"; // Replace with your database username
 $password = ""; // Replace with your database password
$database="dbms";



$conn=mysqli_connect($servername, $username, $password,$database);
// $sql="create table veedanshi(id int, namr varchar(20))";
// $result=mysqli_query($conn,$sql);

?>
<?php
// if($conn)
// {die("Connection successfull". mysqli_connect_error());
// }
// $sql="CREATE DATABASE DDBMS";
// $result=mysqli_query($conn,$sql);
//  $sql="Use DDBMMS ";
// $result=mysqli_query($conn,$sql);


// if($result)
// {
//     echo "database created successfully";
// }
// else 
// {
//     echo "no";
// }
// echo"nono";
// ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="X-UA-Compatible" content="IE=edge">
    <title>Youtube Management and Analysis</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/boostrap/4.0.0/css/boostrap.min.css">
  
</head>
<body
            style="height: 100%;
             margin: 0;
             padding: 0;
             background-image: url('image.png'); 
             background-position: center;
             background-repeat: no-repeat;
             background-size: 2000px 3000px; 

    
</div>
    <div class="container">
    <h1 style="padding: 20px; text-align: center;color:black"> Youtube Management and Analysis Project</h1>
   <p style="padding: 10px; text-align:center ;font-size: 25px;font-weight: bold;font-style: italic; color:black ">Enter the category you want to see videos for!</p>




    
<div  class="container my-5 mx-3 p-3">

        
    <!-- <form  action="/search" method="GET">
       
       <input type="text" id="search" name="search" placeholder="Search..." required>
       <input type="submit" value="SUBMIT" name="SUBMIT">
   </form> -->
    <form method="post">
        <input type="text" placeholder="Search... " name="search">
        <button class="btn btn-dark btn-sm" name="submit">search</button>
        
    </form>

 <div class ="container p-3 mx-5 my -5">
    <table class ="table">
    <?php
        // error_reporting(E_ALL);
        // ini_set('display_errors', true);
        
        if(isset($_POST['submit']))
        {
            $search = $_POST['search'];
            // $sql="Select * from `total_videos` where id='$search'";
            $sql="SELECT *
FROM total_videos
WHERE TOPIC_NAME LIKE CONCAT('%', '$search', '%') or CHANNEL_NAME LIKE CONCAT('%', '$search', '%') or VIDEO_ID LIKE CONCAT('%', '$search', '%') 
order by LIKES  DESC";


            $result=mysqli_query($conn,$sql);
            if($result)
            {
                
                if(mysqli_num_rows($result)> 0)
                {
                    echo ' <thead>
                    <tr>
                    <th>VIDEO_ID </th>
                    <th> VIDEO_NAME</th>
                    <th>CHANNEL_NAME </th>
                    <th> VIDE0_LINK</th>
                    <th>VIEWS </th>
                    <th> LIKES</th>
                    </tr>
                    </thead>';
                    while($row=mysqli_fetch_assoc($result))
                    {
                    echo '<tbody>
                    <tr>
                    <td> '.$row['VIDEO_ID'].'</td>
                    <td> '.$row['TOPIC_NAME'].'</td>
                    <td> '.$row['CHANNEL_NAME'].'</td>
                    <td> '.$row['VIDEO_LINK'].'</td>
                    <td> '.$row['VIEWS'].'</td>
                    <td> '.$row['LIKES'].'</td>
                    </tr>
                    </tbody>';
                }
//                 if(strpos($search,"like")){
// //                 {
// // //                     $array=array('like', 'most_liked');

// // // if (in_array($search,$array))
// // // {
//                 $sql=" SELECT *
//                 FROM total_videos
//                 WHERE TOPIC_NAME LIKE '%$search%' 
//                 ORDER BY LIKES DESC
//                 ";
//                  $result=mysqli_query($conn,$sql);
//                  if($result)
//                  {
                     
//                      if(mysqli_num_rows($result)> 0)
//                      {
//                          echo ' <thead>
//                          <tr>
//                          <th>VIDEO_ID </th>
//                          <th> VIDEO_NAME</th>
//                          <th>CHANNEL_NAME </th>
//                          <th> VIDE0_LINK</th>
//                          <th>VIEWS </th>
//                          <th> LIKES</th>
//                          </tr>
//                          </thead>';
//                          while($row=mysqli_fetch_assoc($result))
//                          {
//                          echo '<tbody>
//                          <tr>
//                          <td> '.$row['VIDEO_ID'].'</td>
//                          <td> '.$row['TOPIC_NAME'].'</td>
//                          <td> '.$row['CHANNEL_NAME'].'</td>
//                          <td> '.$row['VIDEO_LINK'].'</td>
//                          <td> '.$row['VIEWS'].'</td>
//                          <td> '.$row['LIKES'].'</td>
//                          </tr>
//                          </tbody>';
//                 }}}}}
//             }
        }
    }


    

            
                
                    else
                    {
                        echo '<h2 class="text-danger"> Data Not Found</h2>';
                    }
                }
                




                
            
        
        
        ?>
        
        </table>
 
 


      

    


</div>

</div>
</div>
</body>
</html>

