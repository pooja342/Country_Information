<?php
include_once("database-connection.php");
  if(isset($_GET['id']))
  {
     $id = $_GET['id'];
     $sql = "select * from tbl_states where country_id = '$id' ";
     $result = mysqli_query($con, $sql);
      if($result->num_rows > 0)
      {
        echo '<option value="">Select State</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }
      }
      else
      {
        echo '<option value="">Select State</option>';
        echo '<option value="' . $row['id'] . '"> Not FOUND </option>';
      }
  }
  elseif (isset($_GET['sid'])) {
    $id = $_GET['sid'];
    $sql = "select * from tbl_cities  where state_id = '$id'";
    $result1 = mysqli_query($con, $sql);
    if ($result1->num_rows > 0) {
        echo '<option value="">Select city</option>';
        while ($row = mysqli_fetch_assoc($result1)) {
            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }
    }
    else
    {
         echo '<option value="">Select State</option>';
        echo '<option > Not FOUND </option>';
    }
}

  
?>