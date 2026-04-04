<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: register.php");
    exit();
}

$name        = $_POST['name'];
$age         = (int) $_POST['age'];
$gender      = $_POST['gender'];
$blood_group = $_POST['blood_group'];
$contact     = $_POST['contact'];
$allergies   = $_POST['allergies'];

if ($age < 13)           $category = "Child";
elseif ($age <= 17)      $category = "Teenager";
elseif ($age <= 59)      $category = "Adult";
else                     $category = "Senior Citizen";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration Confirmed</title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Segoe UI', sans-serif; background: #f0f4f8; padding: 40px 20px; }
    .card {
      background: white; border-radius: 16px; padding: 36px;
      max-width: 500px; margin: auto; box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    .success-banner {
      background: #e6f9f0; border: 1px solid #a3d9bc;
      color: #1a7a4a; border-radius: 10px;
      padding: 14px; text-align: center;
      font-weight: 600; margin-bottom: 28px; font-size: 16px;
    }
    h2 { color: #1a73e8; margin-bottom: 20px; }
    .row {
      display: flex; justify-content: space-between;
      padding: 11px 0; border-bottom: 1px solid #f0f0f0; font-size: 14px;
    }
    .row .label { color: #777; }
    .row .value { font-weight: 600; color: #222; }
    .badge {
      display: inline-block; padding: 4px 12px;
      border-radius: 20px; font-size: 12px; font-weight: 600;
    }
    .badge-child    { background: #fff3e0; color: #e65100; }
    .badge-teen     { background: #e8f5e9; color: #2e7d32; }
    .badge-adult    { background: #e3f2fd; color: #1565c0; }
    .badge-senior   { background: #f3e5f5; color: #6a1b9a; }
    .back-btn {
      display: block; margin-top: 24px; text-align: center;
      background: #1a73e8; color: white; padding: 12px;
      border-radius: 10px; text-decoration: none; font-size: 15px;
    }
    .back-btn:hover { background: #1558c0; }
  </style>
</head>
<body>
  <div class="card">
    <div class="success-banner">✅ Patient Registered Successfully!</div>
    <h2>Patient Details</h2>

    <div class="row"><span class="label">Full Name</span><span class="value"><?php echo htmlspecialchars($name); ?></span></div>

    <div class="row">
      <span class="label">Age</span>
      <span class="value">
        <?php echo $age; ?> yrs &nbsp;
        <?php
          $cls = match($category) {
            'Child'          => 'badge-child',
            'Teenager'       => 'badge-teen',
            'Adult'          => 'badge-adult',
            'Senior Citizen' => 'badge-senior',
          };
        ?>
        <span class="badge <?php echo $cls; ?>"><?php echo $category; ?></span>
      </span>
    </div>

    <div class="row"><span class="label">Gender</span><span class="value"><?php echo $gender; ?></span></div>
    <div class="row"><span class="label">Blood Group</span><span class="value"><?php echo $blood_group; ?></span></div>
    <div class="row"><span class="label">Contact</span><span class="value"><?php echo htmlspecialchars($contact); ?></span></div>
    <div class="row"><span class="label">Allergies</span><span class="value"><?php echo $allergies ? htmlspecialchars($allergies) : 'None'; ?></span></div>

    <a class="back-btn" href="register.php">← Register Another Patient</a>
  </div>
</body>
</html>