<?php 
  include ROOT.DS.'views'.DS."header.php";
  include ROOT.DS.'views'.DS."header-menu.php";

  if($user->isloggedin() ){
    $id = $_SESSION['id'];
  } else {
    $user->redirect('login');
    exit();
  }
  $userList = $user->getAll();
  
?>

<div class="container">
  <form>
    <div class="form-box">
      <div class="row">
        <div class="col-md-6"><h3>Contact</h3></div>
        <div class="col-md-6 text-right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-user"><i class="fas fa-plus"></i> Add User</button></div>
      </div><!-- end of row -->
    <br>
      <div class="row"> 
       
      <div class="col-md-12">
      <table id="myTable" class="table table-bordered">
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Company</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>ACTION</th>
              </tr>
          </thead>
          <tbody>
          <?php if(!empty($userList)) { foreach ($userList as $key => $userListing) { if ($userListing->id == $id ) { ?>
            <tr class="table-danger d-none" >
              <td><?php echo (!empty($userListing->name)) ? $userListing->name : ''; ?></td>
              <td><?php echo (!empty($userListing->company)) ? $userListing->company : ''; ?></td>
              <td><?php echo (!empty($userListing->phone)) ? $userListing->phone : ''; ?></td>
              <td><?php echo (!empty($userListing->email)) ? $userListing->email : ''; ?></td>
              <td>
                <button disabled type="button" class="btn btn-info" data-tooltip="tooltip" data-placement="top" title="Edit" data-toggle="modal" data-target="#update-user<?php echo (!empty($userListing->id)) ? $userListing->id : ''; ?>"><i class="fas fa-pencil-alt"></i></button>&nbsp;
                <button disabled type="submit" class="btn btn-danger btn-delete" id="btnDelete<?php echo (!empty($userListing->id)) ? $userListing->id : ''; ?>" value="<?php echo (!empty($userListing->id)) ? $userListing->id : ''; ?>" data-tooltip="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>
              </td>
            </tr>
          <?php } else { ?>
            <tr>
              <td><?php echo (!empty($userListing->name)) ? $userListing->name : ''; ?></td>
              <td><?php echo (!empty($userListing->company)) ? $userListing->company : ''; ?></td>
              <td><?php echo (!empty($userListing->phone)) ? $userListing->phone : ''; ?></td>
              <td><?php echo (!empty($userListing->email)) ? $userListing->email : ''; ?></td>
              <td>
                <button type="button" class="btn btn-info" data-tooltip="tooltip" data-placement="top" title="Edit" data-toggle="modal" data-target="#update-user<?php echo (!empty($userListing->id)) ? $userListing->id : ''; ?>"><i class="fas fa-pencil-alt"></i></button>&nbsp;
                <button type="submit" class="btn btn-danger btn-delete" id="btnDelete<?php echo (!empty($userListing->id)) ? $userListing->id : ''; ?>" value="<?php echo (!empty($userListing->id)) ? $userListing->id : ''; ?>" data-tooltip="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>
              </td>
            </tr>
          <?php }  ?>
            <!-- update modal -->
            <div class="modal fade" id="update-user<?php echo (!empty($userListing->id)) ? $userListing->id : ''; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong><?php echo (!empty($userListing->name)) ? $userListing->name .' Information' : ''; ?></strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name_<?php echo (!empty($userListing->id)) ? $userListing->id : ''; ?>" value="<?php echo (!empty($userListing->name)) ? $userListing->name : ''; ?>">
                          </div><!-- end of form group -->

                          <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" id="email_<?php echo (!empty($userListing->id)) ? $userListing->id : ''; ?>" value="<?php echo (!empty($userListing->email)) ? $userListing->email : ''; ?>">
                          </div><!-- end of form group -->
                      </div><!-- end of col-md-6 left-->

                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" class="form-control" id="company_<?php echo (!empty($userListing->id)) ? $userListing->id : ''; ?>" value="<?php echo (!empty($userListing->company)) ? $userListing->company : ''; ?>">
                          </div><!-- end of form group -->
                          
                          <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" class="form-control" id="phone_<?php echo (!empty($userListing->id)) ? $userListing->id : ''; ?>" value="<?php echo (!empty($userListing->phone)) ? $userListing->phone : ''; ?>">
                          </div><!-- end of form group -->
                      </div><!-- end of col-md-6 right -->
                    
                    <!-- get user id -->
                      <div class="col-md-6">
                          <div class="form-group">
                            <input type="hidden" class="form-control" id="uID_<?php echo (!empty($userListing->id)) ? $userListing->id : ''; ?>" value="<?php echo (!empty($userListing->id)) ? $userListing->id : ''; ?>">
                          </div><!-- end of form group -->
                      </div><!-- end of col-md-6 left-->
                      <!-- end of get user id  -->

                    </div><!-- end of row -->
                  </div><!-- end of modal-body -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-listing" user-id="<?php echo (!empty($userListing->id)) ? $userListing->id : ''; ?>">Update</button>
                  </div><!-- end of modal-footer -->
                </div>
              </div>
            </div><!-- end update modal -->
            <?php } } ?>
          </tbody>
      </table>
      </div>

      </div><!-- end of row -->
    </div><!-- end of form-box -->


    <!-- add user modal -->
    <div class="modal fade" id="add-user" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"><strong>Add User</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="row">
        <div class="col-md-6">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name">
            </div><!-- end of form group -->

            <div class="form-group">
              <label for="company">Company</label>
              <input type="text" class="form-control" id="company">
            </div><!-- end of form group -->
        </div><!-- end of col-md-6 left-->

        <div class="col-md-6">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email">
            </div><!-- end of form group -->

            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="number" class="form-control" id="phone">
            </div><!-- end of form group -->
        </div><!-- end of col-md-6 right -->
      </div><!-- end of row -->

      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password">
            </div><!-- end of form group -->
        </div><!-- end of col-md-6 left-->

        <div class="col-md-6">
          <div class="form-group">
              <label for="confirmPassword">Confirm Password</label>
              <input type="password" class="form-control" id="confirmPassword">
            </div><!-- end of form group -->
        </div><!-- end of col-md-6 right -->
      </div><!-- end of row -->
          </div><!-- end of modal-body -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn-add-user" >Add</button>
          </div><!-- end of modal-footer -->
        </div>
      </div>
    </div><!-- end add user modal -->
  </form>
</div><!-- end of container -->

<?php 
  include ROOT.DS.'views'.DS."footer.php";
?>