<?php 
  $conn = mysqli_connect("localhost","root","");
  mysqli_select_db($conn, "phpmysqli");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Hello, world!</title>
  </head>
  <body>

  <div class="jumbotron jumbotron-fluid bg-dark">
    <div class="container">
      <h1 class="display-4 text-white">Php Mysqli</h1>
      <p class="lead text-white">insert update delete display and search operation</p>
    </div>
  </div>

  <div class="container">
    <form method="post">
      <div class="form-group">
        <!-- <label for="exampleName">Enter Name</label> -->
        <input type="text" class="form-control" id="exampleName" placeholder="Enter Name" name= "name">
        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
      </div>
      <div class="form-group">
        <!-- <label for="exampleCity">Enter City</label> -->
        <input type="text" class="form-control" id="exampleCity" placeholder="Enter City" name= "city">
      </div>
      <!-- <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div> -->
      <button type="submit" class="btn btn-success" name="insert">insert</button>
      <button type="submit" class="btn btn-danger" name="delete">delete</button>
      <button type="submit" class="btn btn-warning" name="update">update</button>
      <button type="submit" class="btn btn-info" name="display">display</button>
      <button type="submit" class="btn btn-primary" name="search">search</button>
    </form>
    <br>
    
  
    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
    </tr>
   -->


  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>

<?php
  if(isset($_POST["insert"])){
    $name = $_POST["name"];
    $city = $_POST["city"]; 
    mysqli_query($conn,"insert into table1 values('$name', '$city')");
  }

  if(isset($_POST["delete"])){
    $name = $_POST["name"];
    $city = $_POST["city"];
    mysqli_query($conn,"delete from table1 where name='$name'");
  }

  if(isset($_POST["update"])){
    $name = $_POST["name"];
    $city = $_POST["city"];
    mysqli_query($conn,"update table1 set name='$name' where city = '$city'");
  }

  if(isset($_POST["display"])){
    $name = $_POST["name"];
    $city = $_POST["city"];
    $data = mysqli_query($conn,"SELECT * FROM table1");

    echo "<table class='table table-striped table-dark'>";
    echo "<thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Name</th>
      <th scope='col'>City</th>
    </tr>
  </thead>
  <tbody>";
    while($row = mysqli_fetch_array($data)){
      $id = 0;
      echo "<tr>";
      echo "<th scope='row'>";echo $id+1;echo "</th>";
      echo "<td>"; echo $row["name"]; echo "</td>";
      echo "<td>"; echo $row["city"]; echo "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
  }

  if(isset($_POST["search"])){
    $name = $_POST["name"];
    $city = $_POST["city"];
    $data = mysqli_query($conn,"SELECT * FROM table1 where name = '$name'");

    echo "<table class='table table-striped table-dark'>";
    echo "<thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Name</th>
      <th scope='col'>City</th>
    </tr>
  </thead>
  <tbody>";
    while($row = mysqli_fetch_array($data)){
      $id = 0;
      echo "<tr>";
      echo "<th scope='row'>";echo $id+1;echo "</th>";
      echo "<td>"; echo $row["name"]; echo "</td>";
      echo "<td>"; echo $row["city"]; echo "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
  }
?>