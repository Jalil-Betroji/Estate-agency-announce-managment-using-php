<?php 
require 'connect.php';

/* ======== if the user clicked on search utton we will apply this code and we will take 
            the search section inputs values and get those information from database 
            to display them on user interface passed on Ad_Type , min_Price and max_Price ======== */

if(isset($_POST['searchbtn'])){
  $Type = mysqli_real_escape_string($conn,$_POST['Type']);
  $min_Price = mysqli_real_escape_string($conn,$_POST['min_Price']);
  $max_Price = mysqli_real_escape_string($conn,$_POST['max_Price']);



  $query = "SELECT * FROM `announcements` WHERE Amount BETWEEN '$min_Price' AND '$max_Price' AND  Ad_Type = '$Type' ";
  $query_run = mysqli_query($conn,$query);
  
  $query_run_check = mysqli_num_rows($query_run );
   if ($query_run_check  > 0){
    while ($rows = mysqli_fetch_assoc($query_run)) {
        ?>
          <div class="box">
    <div class="top">
      <div class="overlay">
       <img src="images/<?php echo($rows['Image']) ?>" alt="" />
      </div>
      <div class="pos">
         <span id="search_Type"><?php echo($rows['Ad_Type']) ?></span>
      </div>
    </div>
    <div class="bottom">
      <h3><?php echo($rows['Title']) ?></h3>
      <p><?php echo($rows['Amount']) ?>$</p>
    <div>
    <button
      type="button"
      class="Info"
      data-bs-toggle="modal"
      data-bs-target="#exampleModal"
      value="<?php echo($rows['ID']) ?>"
    >
      More Info
    </button>
    <span><button type="button" id="editbtn" class="edit_info" data-bs-toggle="modal"
            data-bs-target="#EditModal"
            value="<?php echo($rows['ID']) ?>"><i
            class="fa-solid fa-pen-to-square "
            
          ></i
    ></button></span>
    <span><button type="button" id="deletebtn"
            data-bs-toggle="modal"
            class="delete_announce"
            data-bs-target="#DeleteModal" 
            value="<?php echo($rows['ID']) ?>"><i
            class="fa-solid fa-trash"
            
          ></i
   ></button></span>
  </div>
  </div>
   </div>

<?php
};
};
}
?>