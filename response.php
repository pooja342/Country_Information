<?php
include_once("database-connection.php");
  if(isset($_GET['id']))
  {
     $id = $_GET['id'];
     $query = "select *  from Users where  country = '$id'";
     $result = mysqli_query($con, $query);
     if($result->num_rows > 0)
     {
         $sql ="SELECT tbl_countries.name as countryname,tbl_states.name as statename, tbl_cities.name as cityname 
         FROM tbl_countries INNER JOIN tbl_states ON tbl_countries.id = tbl_states.country_id 
         INNER JOIN tbl_cities ON tbl_states.id = tbl_cities.state_id INNER JOIN Users ON Users.state = tbl_states.id 
         where ( Users.country = tbl_countries.id AND Users.state = tbl_states.id AND Users.cities = tbl_cities.id )";
         
         $result = mysqli_query($con, $sql);
         echo '<option value="">Select State</option>';
         $row = mysqli_fetch_assoc($result);
         echo '<option value="' . $row['id'] . '">' . $row['statename'] . '</option>';
     }
     else
     {
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
  }
  elseif (isset($_GET['sid'])) {
    $id = $_GET['sid'];
    $query = "select *  from Users where  state = '$id'";
    $result = mysqli_query($con, $query);
    if($result->num_rows > 0)
    {
        $sql ="SELECT tbl_countries.name as countryname,tbl_states.name as statename, tbl_cities.name as cityname
              FROM tbl_countries INNER JOIN tbl_states ON tbl_countries.id = tbl_states.country_id 
              INNER JOIN tbl_cities ON tbl_states.id = tbl_cities.state_id INNER JOIN Users ON Users.state = tbl_states.id 
              where ( Users.country = tbl_countries.id AND Users.state = tbl_states.id AND Users.cities = tbl_cities.id )";

        $result = mysqli_query($con, $sql);
        echo '<option value="">Select State</option>';
        $row = mysqli_fetch_assoc($result);
        echo '<option value="' . $row['id'] . '">' . $row['cityname'] . '</option>';
    }
    else
    {
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
  
}

  
?>