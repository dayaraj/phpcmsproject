<?php include'includes/admin_header.php';  ?>
<?php
 if(isset($_SESSION['username'])){
   $username = $_SESSION['username'];
  $query = "SELECT * FROM users WHERE username = '{$username}'";
  $select_user_profile_query = mysqli_query($connection,$query);
  while($row=mysqli_fetch_assoc($select_user_profile_query)){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_email = $row['user_email'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_role = $row['user_role'];

  }



 }


?>
<?php 
  if(isset($_POST['edit_user'])){
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_email = $_POST['user_email'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    // $user_image = $row['user_image'];
  

    

  $query="UPDATE `users` SET `user_id`='{$user_id}', `username`='{$username}',`user_password`='{$user_password}',`user_email`='{$user_email}',`user_firstname`='{$user_firstname}',`user_lastname`='{$user_lastname}',`user_role`='{$user_role}' WHERE username= '{$username}'";
    $edit_user_query = mysqli_query($connection,$query);
    confirmQuery($edit_user_query);

  } 


 
?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include'includes/admin_navigation.php';  ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>

                        
<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="user_firstname">Firstname</label>
<input type="text" value="<?php echo $user_firstname;   ?>" class="form-control" name="user_firstname">
</div>
<div class="form-group">
<label for="user_lastname">Lastname</label>
<input type="text" value="<?php echo $user_lastname;   ?>" class="form-control" name="user_lastname">
</div>


<div class="form-group">
<select name="user_role" id="">
<option value="subscriber"><?php echo $user_role;  ?></option>
<?php
 
 if($user_role == 'admin'){
    echo "<option value='subscriber'>subscriber</option>";
   
 }else{
    echo "<option value='admin'>admin</option>";
 }

?>





</select>
</div>

<!-- 
<div class="form-group">
<label for="post_image">Post Image</label>
<input type="file" name="image">
</div> -->

<div class="form-group">
<label for="username">Username</label>
<input type="text" value="<?php echo $username;   ?>" class="form-control" name="username">
</div>

<div class="form-group">
<label for="user_email">Email</label>
<input type="email" value="<?php echo $user_email;   ?>" class="form-control" name="user_email">
</div>

<div class="form-group">
<label for="user_password">Password</label>
<input type="password" value="<?php echo $user_password;   ?>" class="form-control" name="user_password">
</div>


<div class="form-group">
<input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
</div>
</form>

                           
                    

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php  include'includes/admin_footer.php'; ?>
