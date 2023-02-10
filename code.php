<?php 

session_start();
require 'connect.php';

/* ================================================================================= 
     add announces code to get inputs values and insert them into database
      including image path and also add the image to our folder directory "images"
   ================================================================================= */
if(isset($_POST['save_announce'])){

  if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];   
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $id = mysqli_real_escape_string($conn,$_POST['ID']);
    $title = mysqli_real_escape_string($conn,$_POST['Title']);
    $description = mysqli_real_escape_string($conn,$_POST['Description']);
    $area = mysqli_real_escape_string($conn,$_POST['Area']);
    $address = mysqli_real_escape_string($conn,$_POST['Address']);
    $amount = mysqli_real_escape_string($conn,$_POST['Amount']);
    $announcment_date = mysqli_real_escape_string($conn,$_POST['Announce_Date']);
    $type = mysqli_real_escape_string($conn,$_POST['Type']);
    $errors= array();
    $image = $_FILES['image'];

   
    $query = "INSERT INTO announcements (Title , 
   Image , 
   Description , 
   Area , 
   Address , 
   Amount ,
   Announcement_Date , 
   Ad_Type	) 
   VALUES ('$title','$file_name','$description','$area',
   '$address','$amount','$announcment_date','$type')";
   $query_run = mysqli_query($conn,$query);
    if($file_size > 50000000){
      $errors[]='File size must be excately 5 MB';
    }
    
    if(empty($errors)==true){
      move_uploaded_file($file_tmp,"images/".$file_name);
      echo "Success";
    }
  }
  
}
  /* ================================================================================= 
  Update announce code to get inputs values by id and insert them into database
  including image path and also add the image to our folder directory "images"
  ================================================================================ */
  
  
if(isset($_POST['update_ann'])){
    if(isset($_FILES['edit_Image'])){

    $errors= array();
    $file_name = $_FILES['edit_Image']['name'];
    $file_size =$_FILES['edit_Image']['size'];
    $file_tmp =$_FILES['edit_Image']['tmp_name'];
    $file_type=$_FILES['edit_Image']['type'];   
    $file_ext=strtolower(end(explode('.',$_FILES['edit_Image']['name'])));
    
    $announce_id = mysqli_real_escape_string($conn, $_POST['announce_id']);
    $id = mysqli_real_escape_string($conn,$_POST['ID']);
    $title = mysqli_real_escape_string($conn,$_POST['Title']);
    $description = mysqli_real_escape_string($conn,$_POST['Description']);
    $area = mysqli_real_escape_string($conn,$_POST['Area']);
    $address = mysqli_real_escape_string($conn,$_POST['Address']);
    $amount = mysqli_real_escape_string($conn,$_POST['Amount']);
    $announcment_date = mysqli_real_escape_string($conn,$_POST['Announce_Date']);
    $type = mysqli_real_escape_string($conn,$_POST['Type']);
    $errors= array();
    $image = $_FILES['image'];

    $query = "UPDATE announcements SET Title='$title', Image='$file_name', Description='$description', 
    Area='$area' , Address='$address', Amount='$amount', 
    Announcement_Date='$announcment_date', Ad_Type='$type' 
                WHERE ID='$announce_id'";
    $query_run = mysqli_query($conn, $query);
   
    
    if(empty($errors)==true){
      move_uploaded_file($file_tmp,"images/".$file_name);
      
    }

 }

}

/* ================================================================================= 
     Get announce information from database using announce card id and display 
     them on our edit modal inputs
   ================================================================================ */

if(isset($_GET['announce_id'])){
    $announce_id = mysqli_real_escape_string($conn, $_GET['announce_id']);

    $query = "SELECT * FROM announcements WHERE ID='$announce_id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $ad_announce = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Announce Fetch Successfully by id',
            'data' => $ad_announce
        ];
        echo json_encode($res);
        return;
    }
    
}


/* ================================================================================= 
     receive the announce id from delete button on the announce card and delete
      that ID row from database
   ================================================================================ */

if(isset($_POST['confirm_del']))
{
    $announce_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    $query = "DELETE FROM announcements WHERE ID='$announce_id'";
        
}


?>