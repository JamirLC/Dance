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

</html>