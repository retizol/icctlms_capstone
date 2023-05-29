
  <div>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-hover" id="">
      <thead>
        <tr>
          <th>Date</th>
          <th>Title</th>
          <th></th>
          <th></th>
          <!--th></th-->

        </tr>
      </thead>
      <tbody>

        <?php
        $query = mysqli_query($conn,"SELECT * FROM assignment WHERE class_id = '$get_id' and teacher_id = '$usrid' ORDER BY date_added DESC")or die(mysqli_error());
        while($row = mysqli_fetch_array($query)){
          $idz  = $row['assignment_id'];
          $floc  = $row['floc'];
          $datez = $row['date_added'];
          $datesub = substr($datez, -14, 11);
          ?>
          <tr>
            <td><?php echo $datesub; ?></td>
            <td><?php echo $row['title']; ?></td>
            <!--td><!?php echo $row['instruction']; ?></td-->
            <td class="pr-0" style="width: 3.75rem">
              <form method="post" action="view_submit_assignment.php<?php echo '?id='.$get_id ?>&<?php echo 'post_id='.$idz ?>" >
                <button title="View submitted assignments" id="<?php echo $idz; ?>view" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
              </form></td>
              <!--td class="pr-0" style="width: 3.75rem">
              <a title="Delete" id="<!?php echo $idz; ?>remove" class="btn btn-danger" href="#<!?php echo $idz;?>" data-toggle="modal"><i class="fa fa-trash-o" aria-hidden="true"></i></a-->
              <!--?php include 'delete_assigment_modal.php';?-->
              </td>
              <td  style="width: 3.75rem">
                <?php
                if ($floc == ""){}else{
                ?>
                <a title="Download" id="<?php echo $idz;?>download"  class="btn btn-info" href="<?php echo $row['floc'];?>" target=”_blank”><i class="fa fa-download" aria-hidden="true"></i></a>
                <?php } ?>
              </td>
          </tr>
  <?php } ?>

</tbody>
</table>
  </div>
