
<!--div>
  <!?php $queryx = mysqli_query($conn,"SELECT * FROM assignment WHERE class_id = '$get_id'  ORDER BY date_added DESC");
  $countz  = mysqli_num_rows($queryx);
  ?>
  <div id="" class="muted pull-right"><span class=""><!?php echo $countz; ?></span></div>
</div-->
<div>
  <div>
    <?php
    $queryw = mysqli_query($conn,"SELECT * FROM assignment WHERE class_id = '$get_id' ORDER BY date_added DESC");
    $countw = mysqli_num_rows($queryw);
    if ($countw == '0'){?>
      <div class="alert alert-info">No Assignment</div>
      <?php
    }else{
      ?>
      <table cellpadding="0" cellspacing="0" border="0" class="table">
        <thead>
          <tr>
            <th>Date Upload</th>
            <th>Assignment</th>
            <!--th>Description</th-->
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $queryd = mysqli_query($conn,"SELECT * FROM assignment WHERE class_id = '$get_id' ORDER BY date_added DESC");
          while($roww = mysqli_fetch_array($queryd)){
            $id  = $roww['assignment_id'];
            $floc = $roww['floc'];
            ?>
            <tr>
              <td><?php echo $roww['date_added']; ?></td>
              <td><?php  echo $roww['title']; ?></td>
              <!--td><!?php echo $roww['instruction']; ?></td-->
              <td width="150">
                <form id="assign" method="POST" action="turnin.php<?php echo '?id='.$get_id ?>&<?php echo 'post_id='.$id ?>">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <!--?php
                  if ($floc == ""){
                  }else{
                    ?-->
                    <!--a data-placement="bottom" title="Download" id="<!?php echo $id; ?>download"  class="btn btn-info" href="../class/<!?php echo $roww['floc']; ?>" target=”_blank”><i class="fa fa-download" aria-hidden="true"></i></a-->
                  <!--?php } ?-->
                  <button  data-placement="bottom" title="Submit Assignment" id="<?php echo $id; ?>submit" class="btn btn-success" name="btn_assign"><i class="fa fa-upload" aria-hidden="true"></i> Turn In</button>
                </form>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } ?>
  </div>
</div>
