<?php
// Name: Tumhara Naam | Roll No: XXXX

$errors = [];
$success = false;
$patient_name = $doctor = $date = $time = $reason = "";
$emergency = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = trim($_POST['patient_name']);
    $doctor       = $_POST['doctor'];
    $date         = $_POST['date'];
    $time         = $_POST['time'];
    $reason       = trim($_POST['reason']);
    $emergency    = isset($_POST['emergency']);

    if (strlen($patient_name) < 3)
        $errors[] = "Patient name must be at least 3 characters.";
    if (empty($date) || $date < date("Y-m-d"))
        $errors[] = "Appointment date cannot be in the past.";
    if (strlen($reason) > 200)
        $errors[] = "Reason must not exceed 200 characters.";

    if (empty($errors)) $success = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Appointment</title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Segoe UI', sans-serif; background: #f0f4f8; padding: 40px 20px; }
    .card {
      background: white; border-radius: 16px; padding: 36px;
      max-width: 520px; margin: auto; box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    h2 { color: #231b9a; margin-bottom: 6px; }
    .subtitle { color: #888; font-size: 13px; margin-bottom: 24px; }
    .error-box {
      background: #fdecea; border: 1px solid #f5a49c;
      border-radius: 10px; padding: 14px; margin-bottom: 20px;
    }
    .error-box p { color: #08176b; font-size: 14px; margin: 4px 0; }
    .success-box {
      background: #e6f9f0; border: 1px solid #a3d9bc;
      border-radius: 10px; padding: 16px; margin-bottom: 20px;
    }
    .success-box h3 { color: #1a7a4a; margin-bottom: 8px; }
    .success-box p { color: #2d6a4f; font-size: 14px; margin: 4px 0; }
    label { display: block; font-size: 13px; color: #555; margin: 14px 0 4px; font-weight: 600; }
    input, select, textarea {
      width: 100%; padding: 10px 14px; border: 1px solid #ddd;
      border-radius: 8px; font-size: 14px; outline: none; transition: border 0.2s;
    }
    input:focus, select:focus, textarea:focus { border-color: #231b9a; }
    textarea { resize: vertical; height: 90px; }
    .checkbox-row { display: flex; align-items: center; gap: 10px; margin-top: 14px; font-size: 14px; }
    .checkbox-row input { width: auto; }
    button {
      margin-top: 24px; width: 100%; padding: 13px;
      background: #231b9a; color: white; border: none;
      border-radius: 10px; font-size: 15px; cursor: pointer; transition: background 0.2s;
    }
    button:hover { background: #242fca; }
  </style>
</head>
<body>
  <div class="card">
    <h2>Book Appointment</h2>
    <p class="subtitle">City Care Clinic — Fill the form below</p>

    <?php if (!empty($errors)): ?>
      <div class="error-box">
        <?php foreach ($errors as $e): ?>
          <p>⚠ <?php echo $e; ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if ($success): ?>
      <div class="success-box">
        <h3>✅ Appointment Confirmed!</h3>
        <p><strong>Patient:</strong> <?php echo htmlspecialchars($patient_name); ?></p>
        <p><strong>Doctor:</strong> <?php echo $doctor; ?></p>
        <p><strong>Date:</strong> <?php echo $date; ?></p>
        <p><strong>Time:</strong> <?php echo $time; ?></p>
        <p><strong>Emergency:</strong> <?php echo $emergency ? 'Yes' : 'No'; ?></p>
      </div>
    <?php endif; ?>

    <form method="POST" action="">
      <label>Patient Name</label>
      <input type="text" name="patient_name" value="<?php echo htmlspecialchars($patient_name); ?>" placeholder="Full name">

      <label>Doctor</label>
      <select name="doctor">
        <option value="">-- Select Doctor --</option>
        <?php
          $doctors = ["Dr. Ahmed - Cardiology","Dr. Sara - Pediatrics","Dr. Usman - General","Dr. Nadia - Dermatology"];
          foreach ($doctors as $d) {
            $sel = ($d == $doctor) ? 'selected' : '';
            echo "<option $sel>$d</option>";
          }
        ?>
      </select>

      <label>Appointment Date</label>
      <input type="date" name="date" value="<?php echo $date; ?>" min="<?php echo date('Y-m-d'); ?>">

      <label>Appointment Time</label>
      <select name="time">
        <?php
          $slots = ["Morning 9am–12pm","Afternoon 1pm-4pm","Evening 5pm-8pm"];
          foreach ($slots as $s) {
            $sel = ($s == $time) ? 'selected' : '';
            echo "<option $sel>$s</option>";
          }
        ?>
      </select>

      <label>Reason for Visit <span style="color:#aaa;font-weight:400">(max 200 chars)</span></label>
      <textarea name="reason" maxlength="200" placeholder="Describe your symptoms..."><?php echo htmlspecialchars($reason); ?></textarea>

      <div class="checkbox-row">
        <input type="checkbox" name="emergency" id="em" <?php echo $emergency ? 'checked' : ''; ?>>
        <label for="em" style="margin:0;font-weight:normal;">This is an Emergency Case</label>
      </div>

      <button type="submit">Book Appointment</button>
    </form>
  </div>
</body>
</html>