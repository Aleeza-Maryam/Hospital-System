<?php
// Name: Tumhara Naam | Roll No: XXXX

$clinic_name      = "City Care Clinic";
$established_year = 2005;
$consultation_fee = 500.00;
$is_open          = true;

$current_year    = (int) date("Y");
$years_operating = $current_year - $established_year;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>City Care Clinic</title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f4f8;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .card {
      background: white;
      border-radius: 16px;
      padding: 40px;
      max-width: 480px;
      width: 100%;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      text-align: center;
    }
    .card h1 {
      color: #1a73e8;
      font-size: 28px;
      margin-bottom: 8px;
    }
    .card .subtitle {
      color: #888;
      font-size: 14px;
      margin-bottom: 30px;
    }
    .info-row {
      display: flex;
      justify-content: space-between;
      padding: 12px 0;
      border-bottom: 1px solid #f0f0f0;
      font-size: 15px;
    }
    .info-row .label { color: #555; }
    .info-row .value { font-weight: 600; color: #222; }
    .status-open {
      margin-top: 24px;
      background: #e6f9f0;
      color: #1a7a4a;
      border: 1px solid #a3d9bc;
      border-radius: 10px;
      padding: 14px;
      font-weight: 600;
      font-size: 15px;
    }
    .status-closed {
      margin-top: 24px;
      background: #fdecea;
      color: #c0392b;
      border: 1px solid #f5a49c;
      border-radius: 10px;
      padding: 14px;
      font-weight: 600;
      font-size: 15px;
    }
  </style>
</head>
<body>
  <div class="card">
    <h1><?php echo $clinic_name; ?></h1>
    <p class="subtitle">Your Health, Our Priority</p>

    <div class="info-row">
      <span class="label">Established</span>
      <span class="value"><?php echo $established_year; ?> (<?php echo $years_operating; ?> years in service)</span>
    </div>
    <div class="info-row">
      <span class="label">Consultation Fee</span>
      <span class="value">Rs. <?php echo number_format($consultation_fee, 2); ?></span>
    </div>

    <?php if ($is_open): ?>
      <div class="status-open">✅ Clinic is OPEN today — Walk-ins Welcome</div>
    <?php else: ?>
      <div class="status-closed">❌ Clinic is CLOSED today — Please call ahead</div>
    <?php endif; ?>
  </div>
</body>
</html>