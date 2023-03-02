<?php
require_once('db.php');
$sql = "SELECT customerNumber, customerName, phone, addressLine1, creditLimit FROM customers";
$result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>DataTables</title>
</head>

<body>
    <div class="content mt-4">
        <h2 class="font-weight-bold mb-4">Inline Editing - PHP | AJAX | MySQLi </h2>
        <table class="table table-bordered" id="editable_table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
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

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#editable_table').DataTable();
        });
    </script>
    <script src="./assets/js/main.js"></script>
</body>

</html>