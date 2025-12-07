<?php
include "registration_system/connection.php";

$id = $_GET['editid'];
$query = "SELECT * FROM users WHERE u_id = $id";
$run = mysqli_query($con , $query);
$row = mysqli_fetch_array($run);

// Image Change Btn Work Start
if(isset($_POST['imgchange'])){
    $image = $_FILES['uimage']['name'];
    $tmppath = $_FILES['uimage']['tmp_name'];
    move_uploaded_file($tmppath,'registration_system/images/'.$image);

    $query1 = "UPDATE users SET u_img = '$image' WHERE u_id = $id;";
    $run1 = mysqli_query($con , $query1);
    if($run1){
        echo "
        <script>
        alert('Image Change Successfully');
        window.location.href='Index.php';
        </script>
        ";
    }
}
// Image Change Btn Work End

// Input field btn Start
if(isset($_POST['editprofile'])){
    $name = $_POST['uname'];
    $email = $_POST['uemail'];
    $password = $_POST['upassword'];

    $updateQuery = "UPDATE users SET u_name = '$name' , u_email = '$email' , u_password = '$password' WHERE u_id = $id;";  
    $run2 = mysqli_query($con , $updateQuery);
    if($run2){
        echo "
        <script>
        alert('profile has been updated');
        window.location.href='index.php';
        </script>
        ";
    }
}
// Input field btn End

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit Profile</title>
    <style>

   .input-field{
        position: relative;
        }
        .input-field input,select
        {
        width: 100%;
        height: 60px;
        /* border-radius: 6px; */
        font-size: 18px;
        padding: 0 15px;
        border: none;
        border-bottom: 1px solid #000000;
        background: transparent;
        color: #000000;
        outline: none;
        }
        .input-field label{
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #000000;
        font-size: 16px;
        pointer-events: none;
        transition: 0.3s;
        }
        input:focus ~ label,
        input:valid ~ label{
        top: 0;
        left: 15px;
        font-size: 16px;
        padding: 0 2px;
        /* background: #060b23; */
        }

        

    </style>
</head>

<body>
<?php
include "navbar.php";
?>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <!-- <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold">Edogaru</span>
                <span class="text-black-50">edogaru@mail.com.my</span>
                <span> </span>
            </div>
        </div> -->


<!-- Profile picture card-->
<div class="col-md-4 m-auto">
    <form method="POST" enctype="multipart/form-data">
    <div class="text-center">
        <!-- Profile picture image-->
        <img class="img-account-profile rounded-circle" src="<?php echo "registration_system/images/".$row['u_img'];?>" width="220" height="220" alt="">
        <br><br>
        <input type="file" name="uimage"><br><br>
        <input class="btn btn-primary" type="submit" value="Change Image" name="imgchange">    
    </div>
    </form>
</div>






        
        <div class="col-md-8 border-right">
        <form method="POST">
        <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right text-primary-emphasis fw-semibold">Edit Profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 my-4">
                        <div class="input-field">
                            <input type="text" name="uname"  required spellcheck="false" value="<?php echo $row['u_name']?>">
                            <label class="labels">Name</label>
                        </div>
                    </div>

                    <div class="col-md-6 my-4">
                        <div class="input-field">
                            <input type="email" name="uemail"  required spellcheck="false" value="<?php echo $row['u_email']?>">
                            <label class="labels">Email</label>
                        </div>
                    </div>
                    <div class="col-md-6 my-4">
                        <div class="input-field">
                            <input type="text" name="upassword" required spellcheck="false" value="<?php echo $row['u_password']?>" >
                            <label class="labels">Password</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                   
                </div>
               
                
                <div class="mt-5 text-center">
                   <input class="btn btn-primary" type="submit" value="Edit Profile" name="editprofile">
                </div>
            </div>
            </form>
        </div>
        
    </div>
</div>
<!-- FOOTER SECTION Start -->
<?php include "footer.php";?>
<!-- FOOTER SECTION End-->
</body>
</html>