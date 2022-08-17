<?php
  include_once 'header_warden.php';
?>

<form class="form-horizontal" action="includes/approve-inc.php" method="post">
<div class="container">
    <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th>Student</th>
              <th>From date</th>
              <th>To date</th>
              <th>Reason</th>
            </tr>
          </thead>
          <tbody>
            <?php
              require_once 'includes/dbh-inc.php';
              $sql="SELECT g_id,regno,name,from_date,to_date,reason FROM gatepass WHERE stat='PENDING' ORDER BY(g_id);";
              $result=mysqli_query($conn,$sql);
              if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                  ?>
                  <tr>
                    <td><div class="form-check">
                    <input class="form-check-input" type="checkbox" value= <?php echo $row["g_id"] ?> name="selected[]"></td>
                    <td><?php echo $row["regno"] ."-" . $row["name"] ?></td>
                    <td><?php echo $row["from_date"] ?></td>
                    <td><?php echo $row["to_date"] ?></td>
                    <td><?php echo $row["reason"] ?></td>
                  </tr>
                  <?php
                }
              }
            ?>
          </tbody>
        </table>
      </div>
</div>
<div class="col-sm-offset-2 col-sm-8">
  <button class="btn btn-primary" type="submit" name="approve">APPROVE</button>
  <button class="btn btn-primary" type="submit" name="deny">DENY</button>         
</div>
<?php
	if(isset($_GET["error"])){
    if($_GET["error"]=="stmtfailed"){
			echo "<p id='errormsg'>Something went wrong, retry again!</p>" ;
		}
	}
	?>
</body>
</html>