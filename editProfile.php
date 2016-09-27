<!DOCTYPE html>
<?php include('controllers/templates.php'); ?>

<html lang="en">
  <?php head("Edit Profile"); ?>

  <body>
    <?= navbar(); ?>
    <div class="page-container wow fadeInUp">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading"><h4>Edit Profile</h4></div>
            <div class="panel-body">
              <form>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="desc">Description</label>
                  <textarea id="desc" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label>Gender</label>
                  <select class="form-control">
                    <option>Female</option>
                    <option>Male</option>
                  </select>
                </div>
                <button class="primary-line-btn" type="submit">Update</button>
              </form>
              <hr/>
              <form>
                <div class="form-group">
                  <label>Old Password</label>
                  <input type="password" class="form-control">
                </div>
                <div class="form-group">
                  <label>New Password</label>
                  <input type="password" class="form-control">
                </div>
                <div class="form-group">
                  <label>Confirm New Password</label>
                  <input type="password" class="form-control">
                </div>
                <button class="primary-line-btn" type="submit">Change Password</button>
              </form>
            </div>
            <div class="panel-footer"></div>
          </div>
        </div>
      </div><!-- ./row -->

    </div>

    <?= footer(); ?>
  </body>

</html>
