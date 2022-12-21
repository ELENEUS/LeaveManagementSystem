
<?php require_once('sidebar.php') ?>
<?php
error_reporting(0);

$id = $_GET['feedback_no'];
$_SESSION['id'] = $id;

$id2 = $_SESSION['id'];

?>

<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
<center>
    <button class="btn mu-btn" style="width: 70%;;">
          <table class="table table-spried">
              <form class="form-control" action="feedback_confirmation_action.php" method="POST">
                  	<tr>
                      <td colspan="4"> <center>
                        <h2>LEAVE PERMISSION FORM</h2>
                      </td>
                    </tr>
                    <tr> 
                      <th> COMMENT</th> 
                         <td>
                          <textarea name="comment" class="form-control">
                          </textarea>
                        </td>
                    </tr>
                    <tr> 
                    <th> ACTION </th>
                       <td>
                          <select name = "active" class="form-control">
                          	  <option selected disabled>Select action....</option>
                          	 	<option value="ACCEPTED">Acept</option>
                          		<option value="REJECTED">Reject</option>
                          </select> 
                      </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                          <button  class="btn btn-success" name="send_feedback">SEND FEEDBACK</button>
                        </td>
                    </tr>
              </form>
          </table>
    </button>
</center>
</body>
</html>