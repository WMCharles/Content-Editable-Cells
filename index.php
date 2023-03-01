<?php
require_once('db.php');
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">
  <title>Editable Cells!</title>
</head>

<body>
  <div class="content mt-4">
    <h1>Botwa Farm</h1>
    <table class="table" id="editable_table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">customerName</th>
          <th scope="col">phone</th>
          <th scope="col">addressLine1</th>
          <th scope="col">creditLimit</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
              <th scope="row" contenteditable="true"><?php echo $row['customerNumber']; ?></th>
              <td contenteditable="true" onfocus="changeBackground(this);" onblur="saveData(this, '<?php echo $row["customerNumber"]; ?>', 'customerName');"><?php echo $row['customerName']; ?></td>
              <td contenteditable="true" onfocus="changeBackground(this);" onblur="saveData(this, '<?php echo $row["customerNumber"]; ?>', 'phone');"><?php echo $row['phone']; ?></td>
              <td contenteditable="true" onfocus="changeBackground(this);" onblur="saveData(this, '<?php echo $row["customerNumber"]; ?>', 'addressLine1');"><?php echo $row['addressLine1']; ?></td>
              <td contenteditable="true" onfocus="changeBackground(this);" onblur="saveData(this, '<?php echo $row["customerNumber"]; ?>', 'creditLimit');"><?php echo $row['creditLimit']; ?></td>
            </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="./assets/js/jquery-3.6.3.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="./assets/js/main.js"></script>
</body>

</html>