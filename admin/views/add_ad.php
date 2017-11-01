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
<form name="add_ad" method="post" action="controller/process_add_ad.php" enctype="multipart/form-data">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add advertisement</h3>
            </div>
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="adcompany">Company</label>
                  <input type="text" class="form-control" id="ad_company" name="ad_company" placeholder="Enter advertisement Company" required="required">
                </div>
                <div class="form-group">
                  <label for="adlink">Link</label>
                  <input type="text" class="form-control" id="ad_url" name="ad_url" placeholder="Enter Url" required="required">
                </div>
                <div class="form-group">
                  <label for="adpackage">Package</label>
                    <select class="form-control" id="ad_package" name="ad_package" required="required">
                      <option value="0">Weekly</option>
                      <option value="1">Monthly</option>
                      <option value="2">6 Month</option>
                      <option value="3">Yearly</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="adimage">Image</label>
                  <input type="file" class="form-control" name="ad_image" id="ad_image" required="required" />
                </div>
              <div class="box-footer">
                <input type="hidden" name="ad_id" id="ad_id">
                <button type="submit" class="btn btn-primary" name="add_ad">Submit</button>
              </div>
            </form>
          </div>
      </form>
