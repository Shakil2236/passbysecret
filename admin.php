<?php 
    require_once('./admin-component/db.php');
    if(!isset($_SESSION['user'])){
        header('location:./admin-login.php');
    }
    $message = $_GET['message'] ?? '';
    
require_once('./admin-component/admin-head.php');
?>


<div class="m-3 p-2">
        <div class='d-flex justify-content-between'>
            <h3 class="display-5">Password list</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add new Password
    </button>
    </div>
<br>
<p class="text-primary"><?php echo $message; ?></p>
<br>
<div id="modalabc"></div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method='POST' action='./admin-component/api.php'>
                <div class="form-group">
                    <label for="exampleInputEmail1">file password</label>
                    <input type="text" name='title' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter file password...">
                </div>
                <div class="form-group">
                    <label for="pass1">file title</label>
                    <input type="text" name='password' class="form-control" id="pass1" placeholder="enter file title">
                </div>
               
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name='add-new' value=1 class="btn btn-primary">Add</button>
                </div>
        </form>
      </div>
    </div>
  </div>

</div>
    <table class="table" id='data-table1'>
    <thead class="thead-light">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Token/Password</th>
        <th scope="col">On</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    </table>
</div>

<?php 
require_once('./admin-component/admin-footer.php');
?>