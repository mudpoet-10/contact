<?php 
  include ROOT.DS.'views'.DS."header.php";
  include ROOT.DS.'views'.DS."header-menu.php";

  if($user->isloggedin()){
    $id = $_SESSION['id'];
  } else {
    $user->redirect('members');
    exit();
  }
?>

 
<div class="container">
  <form>
    <div class="form-box">
      <div class="row">
        <div class="col-md-6"> <h3>Profile</h3></div>
        <div class="col-md-6 text-right">
          <button type="submit" class="btn btn-danger btn-delete-account" id="btnDeleteAccount<?php echo (!empty($id)) ? $id : ''; ?>" value="<?php echo (!empty($id)) ? $id : ''; ?>" data-tooltip="tooltip" data-placement="top" title="Delete Account"><i class="fas fa-trash-alt"></i></button>
        </div>
      </div><!-- end of row -->
      <br>
    
      <div class="row">
       
        <div class="col-md-6">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" value="<?php echo (!empty($userID[0]->name)) ? $userID[0]->name : '' ?>">
            </div><!-- end of form group -->

            <div class="form-group">
              <label for="Email">Email</label>
              <input type="email" class="form-control" id="email" value="<?php echo (!empty($userID[0]->email)) ? $userID[0]->email : '' ?>">
            </div><!-- end of form group -->

            <div class="form-group">
              <label for="Password">Password</label>
              <input type="password" class="form-control" id="password">
            </div><!-- end of form group -->
        </div><!-- end of col-md-6 left-->

        <div class="col-md-6">
            <div class="form-group">
              <label for="company">Company</label>
              <input type="text" class="form-control" id="company" value="<?php echo (!empty($userID[0]->company)) ? $userID[0]->company : '' ?>">
            </div><!-- end of form group -->

            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="number" class="form-control" id="phone" value="<?php echo (!empty($userID[0]->phone)) ? $userID[0]->phone : '' ?>">
            </div><!-- end of form group -->
        </div><!-- end of col-md-6 right -->

      </div><!-- end of row -->

      <div class="row">
       
        <div class="col-md-6">
            <div class="form-group">
              <input type="hidden" class="form-control" id="uID" value="<?php echo (!empty($userID[0]->id)) ? $userID[0]->id : '' ?>">
            </div><!-- end of form group -->
        </div><!-- end of col-md-6 left-->

        <div class="col-md-12 text-right">
        <button type="reset" class="btn btn-danger">Clear</button>
          <button type="submit" class="btn btn-primary" id="btn-update">Update</button>
        </div><!-- end of col-md-12 -->

      </div><!-- end of row -->
    </div><!-- end of form-box-->
  </form>
</div><!-- end of container -->

<?php 
  include ROOT.DS.'views'.DS."footer.php";
?>