<?php
   include("navbar.php");
?>
<html>

<head>
    <title>Country</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
   <script>
       $(document).ready(function(){
            $("#country").click(function(){
                var countryid =  $(this).val();
                $.ajax({
                    method: "get",
                    url: "response.php",
                    data: {
                     id: countryid
                    },
                        datatype: "html",
                        success: function(data) {
                        $("#state").html(data);
                        $("#city").html('<option value="">Select city</option');

                    }
                });
                // alert(stateid);
            });
            $("#state").on('change', function() {
                var stateid = $(this).val();
                $.ajax({
                    method: "get",
                    url: "response.php",
                    data: {
                    sid: stateid
                },
                    datatype: "html",
                    success: function(data) {
                    $("#city").html(data);
                }

                });
            });
            $('button').bind('click', function (event) { 
            event.preventDefault();
            var countryid =  $("#country").val();
            var stateid =  $("#state").val();
            var cityid =  $("#city").val();
              $.ajax({
                    method: "get",
                    url: "post.php",
                    data: {
                        cid:countryid,
                        sid: stateid,
                        cityid : cityid
                     },
                     success: function(data) {
                      alert(data);
                  }
               });
            });
        });
   </script>
    <div class="container  col-md-4 " style="margin:100px 0px 0px 450px; border: 1px solid #ccc">
        <form method ="get" action ="index.php">
            <div class="form-group py-2">
                <h4>SElECT STATES</h4>
                <label for="country"> Country</label>
                <select class="form-select" id="country">
                    <option value=""> Select Country</option>
                    <?php
                        $sql = "select * from tbl_countries";
                        $data=mysqli_query($con,$sql);
                        if($data->num_rows > 0)
                        {
                            echo '<option value="">Select State</option>';
                            while ($row = mysqli_fetch_assoc($data)) {
                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="form-group py-2">
                <label for="country"> State</label>
                <select class="form-select" id="state">
                    <option value="">select State</option>
                </select>
            </div>
            <div class="form-group py-2 ">
                <label for="country"> City</label>
                <select class="form-select" id="city">
                    <option value="">select City</option>
                </select>
            </div>
            <button type="submit" id="submit"  class="btn btn-success">Success</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>