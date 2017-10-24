<script type="text/javascript">
$(document).ready(function(e) {
    

$('INPUT[type="file"]').change(function () {
  //alert('sdfdsfds');
    var ext = this.value.match(/\.(.+)$/)[1];
    switch (ext) {
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'gif':
            $('#add_about').attr('disabled', false);
            break;
        default:
            alert('This is not an allowed file type.');
      $('#add_about').attr('disabled', true);
            this.value = '';
    }
});

});
</script>

<script type="text/javascript" src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
<form name="add_about" method="post" action="controller/process_add_about.php" enctype="multipart/form-data">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add About</h3>
            </div>
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="abouttitle">Title</label>
                  <input type="text" class="form-control" id="about_title" name="about_title" placeholder="Enter About Title" required="required">
                </div>
                <div class="form-group">
                  <label for="aboutdesc">Description</label>
                  <textarea class="form-control" id="about_desc" name="about_desc" placeholder="Enter About Description" required="required"></textarea>
                </div>
                <div class="form-group">
                  <label for="aboutthumbnail">Image</label>
                  <input type="file" class="form-control" name="about_thumbnail" id="about_thumbnail" required="required" />
                </div>
              <div class="box-footer">
                <input type="hidden" name="about_id" id="about_id">
                <button type="submit" class="btn btn-primary" name="add_about">Submit</button>
              </div>
            </form>
          </div>
      </form>