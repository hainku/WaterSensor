<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <?php include_once 'Assets/include.php'; ?>
</head>
<body>
<?php include_once 'Res/navbar.php'; ?>

<?php
require_once 'Class/Reading.php';
$r = new Reading();
$data = null;

if (isset($_POST['btndisplay'])) {
    $from = $_POST['from'] . " 00:00:00"; // start of day
    $to   = $_POST['to'] . " 23:59:59";   // end of day
    $data = $r->showhistory($from, $to);
}
?>

<div class="container mt-3">
    <form method="POST">
        <div class="row">
            <div class="col-md-3">
                <label for="from">From <i class="text-danger">*</i></label>
                <input type="date" class="form-control" name="from" id="from" required>
            </div>
            <div class="col-md-3">
                <label for="to">To <i class="text-danger">*</i></label>
                <input type="date" class="form-control" name="to" id="to" required>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button class="btn btn-primary form-control" name="btndisplay">
                    <i class="fa-solid fa-eye"></i> Display
                </button>
            </div>
        </div>
    </form>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-8">
            <?php if ($data && $data->num_rows > 0): ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Lowest Reading</th>
                            <th>Highest Reading</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        while ($row = $data->fetch_assoc()):
                        ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= htmlspecialchars($row['reading_date']) ?></td>
                            <td><?= number_format($row['lowest_reading'], 2) ?></td>
                            <td><?= number_format($row['highest_reading'], 2) ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php elseif (isset($data)): ?>
                <div class="alert alert-info">No data found for the selected date range.</div>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>
