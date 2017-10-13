<script type="text/javascript" src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
<form name="add_cateogory" method="post" action="controller/process_add_category.php">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Movie Hall</h3>
            </div>
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="categoryname">Movie Hall Name</label>
                  <input type="text" class="form-control" id="movie_hall_name" name="movie_hall_name" placeholder="Enter Movie Hall Name" required="required">
                </div>
                <div class="form-group">
                  <label for="categoryname">Movie Hall Address</label>
                  <input type="text" class="form-control" id="movie_hall_name" name="movie_hall_address" placeholder="Enter Movie Hall Address" required="required">
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="add_category">Submit</button>
              </div>
            </form>
          </div>
      </form>