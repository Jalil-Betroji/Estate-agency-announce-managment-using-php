<?php 
 $conn = mysqli_connect('localhost','root','','estate_agency');

//  if(!$conn){
//   echo 'An error occured:'. mysqli_connect_error();
//   }
  if(!$conn){
    die('An error occured'. mysqli_connect_error());
}
  // $sql = 'SELECT ID , Title , Image , Description ,Area , Address , Amount ,Announcement_Date,Ad_Type	 FROM announcements';

  // $result = mysqli_query($conn,$sql);

  // $announc = mysqli_fetch_all($result,MYSQLI_ASSOC);

?>