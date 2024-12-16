<!-- updateclass.php -->
<?php include APP_DIR.'views/templates/header.php'; ?>

<body>
  <div id="app">
    <?php include APP_DIR.'views/templates/nav.php'; ?>

    <div class="container-fluid">
      <h1>Update Class</h1>
      <form method="POST" action="<?= site_url('classes/update/' . $class['class_id']); ?>">
        <div class="form-group">
          <label for="class_name">Class Name</label>
          <input type="text" class="form-control" id="class_name" name="class_name"
            value="<?= htmlspecialchars($class['class_name']); ?>" required>
        </div>
        <div class="form-group">
          <label for="instructor_name">Instructor Name</label>
          <input type="text" class="form-control" id="instructor_name" name="instructor_name"
            value="<?= htmlspecialchars($class['instructor_name']); ?>" required>
        </div>
        <div class="form-group">
          <label for="class_time">Class Time</label>
          <input type="text" class="form-control" id="class_time" name="class_time"
            value="<?= htmlspecialchars($class['class_time']); ?>" required>
        </div>
        <div class="form-group">
          <label for="available_slots">Available Slots</label>
          <input type="number" class="form-control" id="available_slots" name="available_slots"
            value="<?= htmlspecialchars($class['available_slots']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Class</button>
      </form>
    </div>
  </div>
</body>
<style>
/* General Body and Container Styles */
body {
  font-family: 'Arial', sans-serif;
  background-color: #f8f9fa;
  margin: 0;
  padding: 0;
}

.container-fluid {
  max-width: 800px;
  margin: 50px auto;
  background-color: #ffffff;
  padding: 30px;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Heading Styling */
h1 {
  text-align: center;
  font-size: 2.5rem;
  color: #4a4a4a;
  margin-bottom: 30px;
}

/* Form Elements Styling */
.form-group {
  margin-bottom: 1.5rem;
}

label {
  font-size: 1.1rem;
  color: #555;
  font-weight: bold;
  display: block;
  margin-bottom: 8px;
}

/* Input Fields Styling */
input[type="text"],
input[type="number"] {
  width: 100%;
  padding: 12px;
  border-radius: 4px;
  border: 1px solid #ccc;
  font-size: 1rem;
  color: #333;
  background-color: #fafafa;
  transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="number"]:focus {
  border-color: #007bff;
  outline: none;
  background-color: #fff;
}


input[required]:invalid {
  border-color: #dc3545;
}

/* Button Styling */
button[type="submit"] {
  background-color: #007bff;
  color: #ffffff;
  border: none;
  padding: 12px 25px;
  font-size: 1.1rem;
  border-radius: 5px;
  cursor: pointer;
  width: 100%;
  transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
  background-color: #0056b3;
}

/* Responsive Styling */
@media (max-width: 767px) {
  .container-fluid {
    padding: 20px;
  }

  h1 {
    font-size: 2rem;
  }

  .form-group {
    margin-bottom: 1rem;
  }

  button[type="submit"] {
    font-size: 1rem;
  }
}
</style>

</html>