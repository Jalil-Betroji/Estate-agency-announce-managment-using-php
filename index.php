<?php 
require 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/ad59909c53.js"
      crossorigin="anonymous"
    ></script>
    <!-- Boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <!-- Swiper js -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="styles.css" />
    <title>Announce managment</title>
  </head>

  <body>
    <!-- ========================== -->
          <!-- Start of header -->
    <!-- ========================== -->
    <header class="header" id="header">
      <div class="navigation">
        <div class="nav-center container d-flex">
          <div style="display:flex;">
            <img src="images/logo2.png" alt="" class="logo" />
            <h1 style="color:white; margin-top:2rem;">HomeLand</h1>
          </div>
          <ul class="nav-list d-flex">
            <li class="nav-item">
              <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#add_ann" class="nav-link">Add Announce</a>
            </li>
          </ul>

          <div class="hamburger">
            <i class="bx bx-menu-alt-left"></i>
          </div>
        </div>
      </div>

      <div class="hero">
        <div class="swiper-container heroslider">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="images/pic1.jpg" alt="" />
            </div>
            <div class="swiper-slide">
              <img src="images/pic2.jpg" alt="" />
            </div>
            <div class="swiper-slide">
              <img src="images/pic5.jpg" alt="" />
            </div>
            <div class="swiper-slide">
              <img src="images/pic6.jpg" alt="" />
            </div>
          </div>
          <div class="swiper-button-next">
            <i class="bx bx-chevron-right swiper-icon"></i>
          </div>
          <div class="swiper-button-prev">
            <i class="bx bx-chevron-left swiper-icon"></i>
          </div>
        </div>
      </div>

      <div class="content">
        <h1>Find your dream home</h1>
        <form action="index.php" id="search_Form" method="POST" enctype="multipart/form-data">
        <div class="search">
          <div class="labels">
            <label for="text">Type</label>
            <select name="Type" id="search_type">
              <option value="Choose" selected>--</option>
              <option value="Sell">Sell</option>
              <option value="Rental">Rental</option>
            </select>
          </div>
          <div class="labels">
            <label for="number">Min Price</label>
            <input type="number" name="min_Price" placeholder="100$" />
          </div>
          <div class="labels">
            <label for="number">Max Price</label>
            <input type="number" name="max_Price" placeholder="100$" />
          </div>

          <button type="submit" name="searchbtn" >Search</button>
        </div>
      </div>
    </form>
    </header>

    <!-- ========================= -->
          <!-- End of header -->
    <!-- ========================= -->

    <section class="section rent">
      <button
        id="add_ann"
        type="button"
        data-bs-toggle="modal"
        data-bs-target="#announceModal"
      >
        Add A New Announce
      </button>

      
      <div id="announce_reload" class="rent-center container">
         <?php 
         require 'search.php';


         if (isset($_POST['searchbtn'])){
          // ====== showing the announcements cards using while loop from search.php
            include 'search.php';
           ?>
           <?php
           } else { /* ========  here we will show the cards by default from database if 
                                 user didn't use search button ======= */

            $query = "SELECT * FROM announcements";
         $query_run = mysqli_query($conn, $query);
         $announces = $query_run->fetch_all(MYSQLI_ASSOC);
             foreach($announces as $values){
             ?>

            <div class="box">
              <div class="top">
                <div class="overlay">
                 <img src="images/<?php echo($values['Image']) ?>" alt="" />
                </div>
                <div class="pos">
                   <span id="search_Type"><?php echo($values['Ad_Type']) ?></span>
                </div>
              </div>
              <div class="bottom">
                <h3><?php echo($values['Title']) ?></h3>
                <p><?php echo($values['Amount']) ?>$</p>
              <div>
              <button
                type="button"
                class="Info"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
                value="<?php echo($values['ID']) ?>"
              >
                More Info
              </button>
              <span><button type="button" id="editbtn" class="edit_info" data-bs-toggle="modal"
                      data-bs-target="#EditModal"
                      value="<?php echo($values['ID']) ?>"><i
                      class="fa-solid fa-pen-to-square "
                      
                    ></i
              ></button></span>
              <span><button type="button" id="deletebtn"
                      data-bs-toggle="modal"
                      class="delete_announce"
                      data-bs-target="#DeleteModal" 
                      value="<?php echo($values['ID']) ?>"><i
                      class="fa-solid fa-trash"
                      
                    ></i
             ></button></span>
            </div>
            </div>
             </div>
            <?php
          }
        }
            ?>
      </div>

      <!-- =========================================== -->
               <!-- End of Announcements cards -->
      <!-- =========================================== -->

      <!-- =========================================== -->
              <!-- The Start of More Info Modal -->
      <!-- =========================================== -->

      <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">

         <div class="modal-header">
          <h1 class="modal-title fs-5 view__main_title" id="exampleModalLabel">
            </h1>
            <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
            ></button>
            </div>
            <div class="modal-body">
              <div id="modal_flex">
                <div>
            
                  <img id="view_image" src="" alt="" />
                </div>
                <div>
                  <h4>Id : <span class="a_info" id="view_id"></span></h4>
                  <h4>
                    Title : <span class="a_info" id="view_title"></span>
                  </h4>
                  <h4>
                    Description :
                    <span class="a_info" id="view_description"
                    ></span
                    >
                  </h4>
                  <h4>Area : <span class="a_info" id="view_area"></span></h4>
                  <h4>
                    Address :
                    <span class="a_info" id="view_address"
                    ></span
                    >
                  </h4>
                  <h4>Amount : <span class="a_info" id="view_amount"></span></h4>
                  <h4>
                    Announce Date : <span class="a_info" id="view_date"></span>
                  </h4>
                  <h4>Type : <span class="a_info" id="view_type"></span></h4>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
              type="button"
              class="btn btn-warning"
              data-bs-dismiss="modal"
              >
              Close
            </button>
          </div>
        </div>
      </div>  
      
    </div>

    <!-- =========================================== -->
              <!-- The End of More Info Modal -->
    <!-- =========================================== -->

    <!-- =========================================== -->
              <!-- The Start of add announce Modal -->
    <!-- =========================================== -->

      <div
        class="modal fade"
        id="announceModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
      <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">
                Add New Announce
              </h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form id="add_new_announce" method="post" enctype="multipart/form-data">
              <div id="modal_flex">
                <div>
                Select image to upload:
              <input type="file" name="image">
                </div>
                <div>
                  <div>
                    <label>Title : </label>
                    <input type="text" name="Title" class="container" />
                  </div>
                  <div>
                    <label>Description : </label>
                    <input type="text" name="Description" class="container" />
                  </div>
                  <div>
                    <label>Area : </label>
                    <input type="text" name="Area" class="container" />
                  </div>
                  <div>
                    <label>Address : </label>
                    <input type="text" name="Address" class="container" />
                  </div>
                  <div>
                    <label>Amount : </label>
                    <input type="number" name="Amount" class="container" />
                  </div>
                  <div>
                    <label>Announce Date : </label>
                    <input type="date" name="Announce_Date" class="container" />
                  </div>
                  <div>
                    <label>Type : </label>
                    <select name="Type" class="container">
                      <option value="- Select Type -" selected>
                        - Select Type -
                      </option>
                      <option value="Rental" name="Type">Rental</option>
                      <option value="Sell" name="Type">Sell</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
              type="button"
              class="btn btn-warning"
              data-bs-dismiss="modal"
              >
              Cancel
            </button>
            <button type="submit" class="btn btn-warning">Add Announce</button>
          </div>
        </form>
          </div>
        </div>
      </div>

      <!-- =========================================== -->
              <!-- The End of add announce Modal -->
      <!-- =========================================== -->

      <!-- =========================================== -->
              <!-- The Start of Edit Modal -->
      <!-- =========================================== -->

      <div
        class="modal fade"
        id="EditModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
       >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">
                Edit Announce
              </h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <form id="update_announce" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div id="modal_flex">
              <input type="hidden" name="announce_id" id="announce_id" >
                <div id="update_Image">
                  <img id="edit_Image" src="" alt="">
                  <input type="file" name="edit_Image">
                </div>
                <div>
                  <div>
                    <label>Title : </label>
                    <input type="text" class="container" name="Title" id="Title"/>
                  </div>
                  
                  <div>
                    <label>Description : </label>
                    <input type="text" class="container" name="Description" id="Description" />
                  </div>
                  <div>
                    <label>Area : </label>
                    <input type="text" class="container" name="Area" id="Area" />
                  </div>
                  <div>
                    <label>Adress : </label>
                    <input type="text" class="container" name="Address" id="Address" />
                  </div>
                  <div>
                    <label>Amount : </label>
                    <input type="number" class="container" name="Amount" id="Amount" />
                  </div>
                  <div>
                    <label>Announce Date : </label>
                    <input type="date" class="container" name="Announce_Date" id="Announce_Date" />
                  </div>
                  <div>
                    <label>Type : </label>
               
                    <select id="Type" name="Type" class="form-select" aria-label="Default select example">
                      <option selected value="Rental">Rental</option>
                      <option value="Sell">Sell</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-warning"
                data-bs-dismiss="modal"
              >
                Close
              </button>
              <button type="submit"
                type="button"
                class="btn btn-warning"
                data-bs-dismiss="modal"
              >
                Update
              </button>
            </div>
          </form>
          </div>
        </div>
      </div>

      <!-- =========================================== -->
                <!-- The End of Edit Modal -->
      <!-- =========================================== -->

      <!-- =========================================== -->
              <!-- The Start Delete Modal -->
      <!-- =========================================== -->

      <div
        class="modal fade"
        id="DeleteModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">
                Delete Announce
              </h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form id="confirm_delete">
              <input type="hidden" name="delete_id" id="delete_id" >
              <div id="modal_flex">                
                  
                  <h3><i class="fa-sharp fa-solid fa-trash"></i>Are you sure you want to delete this announce ?</h3> 
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-warning"
                data-bs-dismiss="modal"
              >
                Cancel
              </button>
              <button
                type="button"
                class="btn btn-warning"
                data-bs-dismiss="modal"
              >
                Delete
              </button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <!-- =========================================== -->
              <!-- The End Delete Modal -->
      <!-- =========================================== -->

    </section>

      <!-- ========================== -->
              <!-- Footer -->
      <!-- ========================== -->

    <footer class="footer">
      <div class="row">
        <div class="col d-flex">
          <img src="images/logo2.png" alt="" />
        </div>
        <div class="col d-flex">
          <h4>INFORMATION</h4>
          <a href="">About us</a>
          <a href="">Term & Conditions</a>
        </div>
        <div class="col d-flex">
          <h4>USEFUL LINK</h4>
          <a href="">Online Store</a>
          <a href="">Customer Services</a>
          <a href="">Promotion</a>
        </div>
        <div class="col d-flex">
          <h4>CONTACT US</h4>
          <a href="">+212561870055</a>
          <a href="">support@homeland.com</a>
        </div>
      </div>
      <p class="copyright">&copy;All Right Reserved , HomeLand 2023/2024</p>
    </footer>

     <!-- ========================== -->
              <!-- End of Footer -->
      <!-- ========================== -->

  </body>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="./js/slider.js"></script>
  <script src="./js/main.js"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"
  ></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" 
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" 
  crossorigin="anonymous"></script>
 
                        <!-- =============================================== -->
                                 <!-- jQuery code to get inputs Values -->
                        <!-- =============================================== -->
  
  <script>



        $(document).on('submit','#add_new_announce',function(){
          var formData = new FormData(this);
          formData.append("save_announce",true);
          $.ajax({
            type:"POST",
            url:"code.php",
            data:formData,
            processData:false,
            contentType:false,
            success: function (response){
              var res = jQuery.parseJSON(response);
            }
          })
        })




       
       /* ========= get the announce info by id and allow editor to edit them and update 
                    them by passing the announce id to the update button of edit modal ======== */

        $(document).on('click', '.edit_info', function () {

          var announce_id = $(this).val();
          $.ajax({
            type: "GET",
            url: "code.php?announce_id=" + announce_id,
             success: function (response) {

            var res = jQuery.parseJSON(response);
            if(res.status == 200){

            $('#announce_id').val(announce_id);
            $('#Title').val(res.data.Title);
            $('#edit_Image').attr('src',('images/'+res.data.Image));
            $('#Description').val(res.data.Description);
            $('#Area').val(res.data.Area);
            $('#Address').val(res.data.Address);
            $('#Amount').val(res.data.Amount);
            $('#Announce_Date').val(res.data.Announcement_Date);
            $('#Type').val(res.data.Ad_Type);
            
          }
        }
     });
  });

  // ========= get the values after updating the announce and refrech the the cards div to show them ======

  $(document).on('submit', '#update_announce', function (e) {
    
            var formData = new FormData(this);
            formData.append("update_ann", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 200){
                        $('#EditModal').load(location.href + " #EditModal");
                    }
                }
            });
    });
  
    // ========= get more info about the card using ID ===========
  
  $(document).on('click', '.Info', function () {

    var announce_id = $(this).val();
     $.ajax({
     type: "POST",
     url: "code.php?announce_id=" + announce_id,
     success: function (response) {

        var res = jQuery.parseJSON(response);
        
  
            $('.view__main_title').text(res.data.Title);
            $('#view_image').attr('src',('images/'+res.data.Image));
            $('#view_id').text(announce_id);
            $('#view_title').text(res.data.Title);
            $('#view_description').text(res.data.Description);
            $('#view_area').text(res.data.Area);
            $('#view_address').text(res.data.Address);
            $('#view_amount').text(res.data.Amount);
            $('#view_date').text(res.data.Announcement_Date);
            $('#view_type').text(res.data.Ad_Type);

            $('#exampleModal').modal('show');
        //  }
      }
    });
 });

 // ===== get the id of the announce that we want to delete and pass it to the modal confirm delete button ======
        
 $(document).on('click', '.delete_announce', function (e) {

            
                var announce_id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "code.php?announce_id=" + announce_id,
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        $("#delete_id").val(announce_id);
                      
                    }
                });
            
        });

        // =========== Confirm delete by modal ===============

        $(document).on('click', '#confirm_delete', function (e) {

            var formData = new FormData(this);
            formData.append("confirm_del", true);
            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                   
                }
            });
    });

 
    </script>
    <script src="js/main.js"></script>

                        <!-- =============================================== -->
                                 <!-- jQuery code to get inputs Values -->
                        <!-- =============================================== -->
                        
</html>
