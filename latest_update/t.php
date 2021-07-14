<?php
$db_host = "localhost";
$db_name = "timesheet";
$db_user = "Surya";
$db_pass = "z)5tik0NW_]E@-P2";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if ($_SERVER["REQUEST_METHOD"] == "POST") {



    $sql = "INSERT INTO test2 (Employee_ID, Project_ID, Week, Monday, Tuesday, Wednesday, Thursday, Friday)
            VALUES ('" . $_POST['Employee_ID'] . "','"
                       . $_POST['Project_ID'] . "','"
                       . $_POST['Week'] . "','"
                       . $_POST['hours_1'] ."','"
                       . $_POST['hours_2'] ."','"
                       . $_POST['hours_3'] ."','"
                       . $_POST['hours_4'] ."','"
                       . $_POST['hours_5'] ."')";

    $results = mysqli_query($conn, $sql);

    if ($results === false) {

        echo mysqli_error($conn);

    } else {

        $id = mysqli_insert_id($conn);
        echo "Inserted record with ID: $id";

    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Time sheet Demo</title>
    <script src="script/script.js"></script>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto');
  *{
  margin:0;
  padding: 0;
  outline: 0;
  }
  .filter{
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  z-index: 1;
  background: rgb(233,76,161);
  background: -moz-linear-gradient(90deg, rgba(233,76,161,1) 0%, rgba(199,74,233,1) 100%);
  background: -webkit-linear-gradient(90deg, rgba(233,76,161,1) 0%, rgba(199,74,233,1) 100%);
  background: linear-gradient(90deg, rgba(233,76,161,1) 0%, rgba(199,74,233,1) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#e94ca1",endColorstr="#c74ae9",GradientType=1);
  opacity: .7;
  }
  table{
  position: absolute;
  z-index: 2;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
  width: 90%;
  border-collapse: collapse;
  border-spacing: 0;
  box-shadow: 0 2px 15px rgba(64,64,64,.7);
  border-radius: 12px 12px 0 0;
  overflow: hidden;

  }
  td , th{
  padding: 15px 20px;
  text-align: center;


  }
  th{
  background-color: #ba68c8;
  color: #fafafa;
  font-family: 'Open Sans',Sans-serif;
  font-weight: 200;
  text-transform: uppercase;

  }
  tr{
  width: 100%;
  background-color: #fafafa;
  font-family: 'Montserrat', sans-serif;
  }
  tr:nth-child(even){
  background-color: #eeeeee;
  }
  .button {
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
 
}
.button2 {
  background-color: white;
  color: black;
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}
    </style>
</head>
<body>
  <p style="font-family: 'Open Sans',Sans-serif;text-align:center;font-size: 40px;padding: 60px 20px;">TIMESHEET</P>
<form method = "post">
  <p style="font-family: 'Open Sans',Sans-serif;text-align:center;padding: 10px 50px;">
  Employee_ID:
  <input name="Employee_ID" type="number" id="Employee_ID">
  &emsp;&emsp;&emsp;Project_ID:
    <input name="Project_ID" type="text" id="Project_ID">
    <label for="week">&emsp;&emsp;&emsp;Select a week:</label>
    <input name="Week" type="week" id="week" name="week">
  </p>
    <table border="1">
        <tr style="background-color: #29465B;color: #fafafa;font-family: 'Open Sans',Sans-serif;">
            <td>
                Date
            </td>
            <td>
                Start
            </td>
            <td>
                End
            </td>
            <td>
                Hours
            </td>
            <td>
                Hour Type
            </td>
            <td>
                Hour Cost
            </td>
            <td>
                Total
            </td>

        </tr>
        <tr>
            <td>
                Monday
            </td>
            <td>
                <input type="time" id="start_1" onchange="re_compute()">
            </td>
            <td>
                <input type="time" id="end_1" onchange="re_compute()">
            </td>
            <td>
                <input name="hours_1" type="number" id="hours_1" onchange="re_compute()">
            </td>
            <td>
                <select id="type_1" onchange="re_compute()">
                <option value="Normal" selected>Normal</option>
                  <option value="Extra" >Extra</option>
                </select>
            </td>
            <td id="cost_1">

            </td>
            <td id="total_1">

            </td>

        </tr>

        <tr>
            <td>
                Tuesday
            </td>
            <td>
                <input type="time" id="start_2" onchange="re_compute()">
            </td>
            <td>
                <input type="time" id="end_2" onchange="re_compute()">
            </td>
            <td>
                <input name = "hours_2" type="number" id="hours_2" onchange="re_compute()">
            </td>
            <td>
                <select id="type_2" onchange="re_compute()">
                  <option value="Normal" selected>Normal</option>
                  <option value="Extra" >Extra</option>
                </select>
            </td>
            <td id="cost_2">

            </td>
            <td id="total_2">

            </td>

        </tr>

        <tr>
            <td>
                Wednesday
            </td>
            <td>
                <input type="time" id="start_3" onchange="re_compute()">
            </td>
            <td>
                <input type="time" id="end_3" onchange="re_compute()">
            </td>
            <td>
                <input name = "hours_3" type="number" id="hours_3" onchange="re_compute()">
            </td>
            <td>
                <select id="type_3" onchange="re_compute()">
                <option value="Normal" selected>Normal</option>
                  <option value="Extra" >Extra</option>
                </select>
            </td>
            <td id="cost_3">

            </td>
            <td id="total_3">

            </td>

        </tr>

        <tr>
            <td>
                Thursday
            </td>
            <td>
                <input type="time" id="start_4" onchange="re_compute()">
            </td>
            <td>
                <input type="time" id="end_4" onchange="re_compute()">
            </td>
            <td>
                <input name = "hours_4" type="number" id="hours_4" onchange="re_compute()">
            </td>
            <td>
                <select id="type_4" onchange="re_compute()">
                <option value="Normal" selected>Normal</option>
                  <option value="Extra" >Extra</option>
                </select>
            </td>
            <td id="cost_4">

            </td>
            <td id="total_4">

            </td>

        </tr>

        <tr>
            <td>
                Friday
            </td>
            <td>
                <input type="time" id="start_5" onchange="re_compute()">
            </td>
            <td>
                <input type="time" id="end_5" onchange="re_compute()">
            </td>
            <td>
                <input name = "hours_5" type="number" id="hours_5" onchange="re_compute()">
            </td>
            <td>
                <select id="type_5" onchange="re_compute()">
                <option value="Normal" selected>Normal</option>
                  <option value="Extra" >Extra</option>
                </select>
            </td>
            <td id="cost_5">

            </td>
            <td id="total_5">

            </td>

        </tr>

        <tr>
            <td colspan="5">
            </td>
            <td>
                Total Hours
            </td>
            <td>
                Total Cost
            </td>
        </tr>

        <tr>
            <td colspan="5">
            </td>
            <td id="total_hours">

            </td>
            <td id="total_cost">

            </td>
        </tr>

    </table>
<button class="button button2" style="font-size: 20px;font-family: 'Open Sans',Sans-serif;text-align:center;padding: 15px 70px;top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(400%, 820%);">SUBMIT</button>
</form>
<a href="index.html">
    <span class="button button2" style="font-size: 20px;font-family: 'Open Sans',Sans-serif;text-align:center;padding: 15px 70px;top: 50%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(800%, -400%);">
        HOME
    </span>
</a>

</html>

