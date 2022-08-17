<?php
  include_once 'header_student.php';
?>
    <div id="maincontent" class="container appl">
        <form action="includes/apply-inc.php" method="post">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="validationCustom01">Name</label>
                    <input type="text" class="form-control" name="user_name" placeholder="Name" value="" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="validationCustom01">Register No.</label>
                    <input type="text" class="form-control" name="regno" placeholder="Register No." value="" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-6 col-xs-6">
                    <label for="floatingSelect">Hostel Number</label>
                    <div class="form-floating">
                        <select class="form-select" name="hostel_no" required>
                        <option value="" selected disabled hidden>select</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                    <label for="validationCustom03">Room Number</label>
                    <input type="text" class="form-control" name="room_no" placeholder="Number" value="" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <label for="validationCustom04">From Date</label>
                    <div class="input-container">
                        <input id="effective-date" type="date" name="from_date" minlength="1" maxlength="64" placeholder=" " autocomplete="nope" required="required"></input>
                        <span class="bar"></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <label for="validationCustom05">From Time</label>
                    <input type="time" class="form-control" name="from_time" placeholder="Time" value="00:00" required>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <label for="validationCustom06">To Date</label>
                    <div class="input-container">
                        <input id="effective-date" type="date" name="to_date" minlength="1" maxlength="64" placeholder=" " autocomplete="nope" required="required"></input>
                        <span class="bar"></span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <label for="validationCustom07">To Time</label>
                    <input type="time" class="form-control" name="to_time" placeholder="Time" value="00:00" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <label for="validationCustom08">Reason</label>
                    <input type="text" class="form-control" name="reason" placeholder="Reason" value="" required>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                    All the information provided are correct
                    </label>
                    <div class="invalid-feedback">
                    You must agree before submitting.
                    </div>
                </div>
                </div>
                <button class="btn btn-primary" type="submit" name="apply">Submit form</button>
        </form>
        <?php
	    if(isset($_GET["error"])){
		    if($_GET["error"]=="incorrectDate"){
			    echo "<p>Invalid Dates!</p>";
		    }
            else if($_GET["error"]=="invalidData"){
			    echo "<p>Incorrect Info!</p>";
		    }
            else if($_GET["error"]=="stmtfailed"){
                echo "<p>Something went wrong, retry again!</p>" ;
            }
	    }
	    ?>
    </div>
    </body>
</html>