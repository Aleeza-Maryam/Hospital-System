<!-- Aleeza Maryam #232201025 -->
<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Patient Registration</title>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Segoe UI', sans-serif; background: #f0f4f8; padding: 40px 20px; }
    .card {
      background: white; border-radius: 16px; padding: 36px;
      max-width: 520px; margin: auto; box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    h2 { color: #1a73e8; margin-bottom: 6px; }
    .subtitle { color: #888; font-size: 13px; margin-bottom: 28px; }
    label { display: block; font-size: 13px; color: #555; margin-bottom: 4px; margin-top: 14px; font-weight: 600; }
    input[type="text"], input[type="number"], select, textarea {
      width: 100%; padding: 10px 14px; border: 1px solid #ddd;
      border-radius: 8px; font-size: 14px; outline: none;
      transition: border 0.2s;
    }
    input:focus, select:focus, textarea:focus { border-color: #1a73e8; }
    .radio-group { display: flex; gap: 20px; margin-top: 6px; }
    .radio-group label { margin: 0; font-weight: normal; display: flex; align-items: center; gap: 6px; cursor: pointer; }
    textarea { resize: vertical; height: 90px; }
    button {
      margin-top: 24px; width: 100%; padding: 13px;
      background: #1a73e8; color: white; border: none;
      border-radius: 10px; font-size: 15px; cursor: pointer;
      transition: background 0.2s;
    }
    button:hover { background: #1558c0; }
  </style>
</head>
<body>
  <div class="card">
    <h2>Patient Registration</h2>
    <p class="subtitle">City Care Clinic — Fill all fields below</p>

    <form action="process_register.php" method="POST">
      <label>Patient Full Name</label>
      <input type="text" name="name" placeholder="e.g. Ahmed Khan" required>

      <label>Age</label>
      <input type="number" name="age" min="0" max="120" placeholder="e.g. 25" required>

      <label>Gender</label>
      <div class="radio-group">
        <label><input type="radio" name="gender" value="Male" required> Male</label>
        <label><input type="radio" name="gender" value="Female"> Female</label>
        <label><input type="radio" name="gender" value="Other"> Other</label>
      </div>

      <label>Blood Group</label>
      <select name="blood_group" required>
        <option value="">-- Select Blood Group --</option>
        <option>A+</option><option>A-</option>
        <option>B+</option><option>B-</option>
        <option>O+</option><option>O-</option>
        <option>AB+</option><option>AB-</option>
      </select>

      <label>Contact Number</label>
      <input type="text" name="contact" placeholder="e.g. 0300-1234567" required>

      <label>Known Allergies</label>
      <textarea name="allergies" placeholder="List any known allergies..."></textarea>

      <button type="submit">Register Patient</button>
    </form>
  </div>
</body>
</html>