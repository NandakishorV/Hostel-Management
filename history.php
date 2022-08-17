<?php
  include_once 'header_student.php';
?>

<div class="container">
    <div class="row">
      <div>
        <table class="table">
          <thead>
            <tr>
              <th>Gatepass No.</th>
              <th>From date</th>
              <th>To date</th>
              <th>status</th>
            </tr>
          </thead>
          <tbody>
            <?php
              require_once 'includes/dbh-inc.php';
              $current_user=$_SESSION['userId'];
              $sql="SELECT g_id,from_date,to_date,stat FROM gatepass WHERE regno = ? ORDER BY(g_id) DESC;";
              $stmt = mysqli_stmt_init($conn);
              mysqli_stmt_prepare($stmt, $sql);
              mysqli_stmt_bind_param($stmt,"i",$current_user);
              mysqli_stmt_execute($stmt);
              $resultData=mysqli_stmt_get_result($stmt);
              if(mysqli_num_rows($resultData)>0){
                while($row=mysqli_fetch_assoc($resultData)){
                  ?>
                  <tr>
                    <td><?php echo $row["g_id"] ?></td>
                    <td><?php echo $row["from_date"] ?></td>
                    <td><?php echo $row["to_date"] ?></td>
                    <td><?php if($row["stat"]=="APPROVED"){?>
                                <a href="includes/pdf-inc.php?gate_pass_no=<?php echo $row["g_id"] ?>">APPROVED</a>
                              <?php }
                              else{
                                echo $row["stat"];
                              } ?></td>
                  </tr>
                  <?php
                }
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
</div>


</body>
</html>