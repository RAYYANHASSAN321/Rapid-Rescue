<!-- Login User Name and image Section Start -->
<div style="background-color: #f0f7fc;" class="admin-user rounded-bottom-pill p-3">
          <div class="d-flex">
            <a href="editprofile.php?editid=<?php echo $rowwwws['driverid']?>">
            <img class="rounded-circle" src="<?php echo "../driver_image/".$rowwwws['d_image'] ?>" width="50" height="50" alt="">
            </a>
            <h5 class="text-primary-emphasis fw-semibold m-auto ms-2"><?php echo $userName;?></h5>
          </div>
          <!-- <div class="ms-3">
            <a href="registration_system/logout.php" class="">Logout</a> 
          </div> -->

        
</div>
<!-- Login User Name and image Section End -->