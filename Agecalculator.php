<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Calculator in PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">Age Calculator in PHP</div>
            <div class="card-body">
                <form action="Agecalculator.php" method="post" class="form-group">
                    <div class="row mb-4">
                        <div class="col-md-5">
                            <select name="day" class="form-control">
                                <?php 
                                for ($i = 1; $i <= 31; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <select name="month" class="form-control">
                                <?php 
                                for ($i = 1; $i <= 12; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <select name="year" class="form-control">
                                <?php 
                                $currentYear = date('Y');
                                for ($i = 1900; $i <= $currentYear; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="submit" name="submit" class="btn btn-primary" value="Check the Age">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php
        if (isset($_POST['submit'])) {
            $day = $_POST['day'];
            $month = $_POST['month'];
            $year = $_POST['year'];

            // Validate date of birth
            $dob = $day . '-' . $month . '-' . $year;
            $dobDateTime = DateTime::createFromFormat('d-m-Y', $dob);

            if ($dobDateTime > new DateTime()) {
                echo "<p class='text-danger'>Invalid date of birth (future date).</p>";
            } else {
                // Calculate age
                $age = $dobDateTime->diff(new DateTime);
                
                echo "<br>";
                echo "<b>Your Date of Birth is</b>: $dob";
                echo "<br>";
                echo "<b>Your Age is</b>: {$age->y} years, {$age->m} months, {$age->d} days";
            }
        } 
        ?>
    </div>
</body>
</html>
