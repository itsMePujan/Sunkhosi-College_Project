<?php 
require $_SERVER['DOCUMENT_ROOT'].'/config/init.php';
loggedin_check();

require CMS_CSS;
require SIDE_TOP;
require HEADER;
echo TITLE;
 $News = new NewsEvent();
$info = $News->getAllperosnalinfo();
?>

<?php flash();?>

<!-- main contain -->
<div class="overview">
  &nbsp; &nbsp;
  <button  class="au-btn au-btn-icon au-btn--blue" > <a href="<?php echo CMS_URL.'/newsandevent_add.php' ?>" style="color: white;">+ Add Event</a>
  </button>
</div>
<div class="row">
  <div class="table-responsive table-responsive-data2">
    <table class="table table-data2">
      <thead>
        <tr>
          <th >S.N</th>
          <th>Name</th>
          <th>Description</th>
          <th>image</th>
          <th>news or event</th>
          <th>Date</th>
          <th>action</th>
        </tr>
      </thead>
        <?php
                if (@$info) {
                    foreach (@$info as $key => $details) {
                        ?>
      <tbody>
        <tr>
        <td><?php echo @$details->id; ?></td>
        <td><?php echo @$details->title; ?></td>
        <td>
          <span ><?php echo @$details->description; ?></span>
        </td>
        <td><?php echo @$details->image; ?></td>
        <td><?php echo @$details->NorE; ?></td>
        <td><?php echo @$details->date; ?></td>
        <td>
          <a class="btn btn-sm btn-success" href="<?php echo CMS_URL.'/newsandevent_add.php?id='.@$details->id; ?>">Edit</a>
         <form method="post" action="<?php echo CMS_URL.'/process/newsandevent.php' ?>" >
          <button id="payment-button" type="submit"  class="btn btn-sm btn-danger" type="submit" name="value" value="<?php echo @$details->id.',Delete'; ?>" >Delete</button>
          <input type="hidden" name="Action" value="Update">
        </form>
        </td>
        </tr>
      </tbody>
                          <?php
                    }
                }
                ?>
</table>
</div>
</div>
<?php 
require CMS_JS;