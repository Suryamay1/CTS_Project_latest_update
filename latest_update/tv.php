<?php

$db_host = "localhost";
$db_name = "timesheet";
$db_user = "Surya";
$db_pass = "z)5tik0NW_]E@-P2";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_error()){
  echo mysqli_connect_error();
  exit;
}

$sql = "SELECT * FROM test2 ORDER BY Employee_ID;";

$results = mysqli_query($conn, $sql);

if($results === false){
  echo myslqi_error($conn);
}
else{
  $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);

}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Timesheet </title>
    <meta charset="utf-8">
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
 width: 60%;
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
    </style>
</head>
<body>
  <header>
    <h1>Timesheet </h1>
  </header>

  <main>
    <table>
              <tr>
              <th>Employee_ID</th>
              <th>Project_ID</th>
              <th>Week</th>
              <th>Monday </th>
              <th>Tuesday </th>
              <th>Wednesday</th>
              <th>Thursday</th>
              <th>Friday</th>
              </tr>
      <?php foreach ($articles as $article): ?>

          <tr>
          <td><?= $article['Employee_ID'];?></td>
          <td><?= $article['Project_ID'];?></td>
          <td><?= $article['Week'];?></td>
          <td><?= $article['Monday'];?></td>
          <td><?= $article['Tuesday'];?></td>
          <td><?= $article['Wednesday'];?></td>
          <td><?= $article['Thursday'];?></td>
          <td><?= $article['Friday'];?></td>
          </tr>

      <?php endforeach; ?>
      </table>
      <a href="index.html">HOME</a>
  </main>
</body>
</html>
