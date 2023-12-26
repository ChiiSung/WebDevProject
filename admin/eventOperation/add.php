<?php 
  session_start();

  if(!isset($_SESSION['admin'])) {
    echo 'Please login first <br>';
    echo 'Click <a href="index.php">here<a/> to login';
  }else {
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  </head>
  <body>
    <div class="container my-3 border border-secondary rounded-3" style="max-width: 540px;">
      <div class="row">
        <form action="save_event.php" class="w-100 py-2 position-relative" id="eventForm" method="post" enctype="multipart/form-data">
          <h1>Add Event</h1>
          <button class="btn btn-danger position-absolute end-0 top-0 me-2 mt-2" onclick="discardChanges()">Back</button>
          <hr class="my-3">
          <div class="container">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control border-secondary" name="title" id="title" aria-descri required>
            <div class="row mt-3">
              <div class="col-6">
                <label for="date" class="form-label">Date</label>
              </div>
              <div class="col-6">
                <label for="time" class="form-label">Time</label>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <input type="date" class="form-control border-secondary" name="date" id="date" required>
              </div>
              <div class="col-6">
                <input type="time" class="form-control border-secondary" name="time" id="time" required>
              </div>
            </div>
            <label for="description" class="col-form-label mt-3">Description</label>
            <textarea name="description" id="description" rows="4" class="w-100 border-secondary rounded ps-1" maxlength="255" style="resize: none;" required></textarea>
            <div class="row mt-3 align-items-center">
              <div class="col-1 me-4">
                <label for="image" class="form-label">Image</label>
              </div>
              <div class="col-3">
                <input type="file" id="image" name="image" accept="image/*" required>
              </div>
            </div>
            <p class="mt-3">Note: You are not allowed to come back to this page once you click next button. Make sure all data are correct.</p>
          </div>
          <input type="submit" value="NEXT" class="btn btn-primary d-block mx-auto mt-3 mb-2 w-25" name="next">
        </form>
      </div>
      <script>
        const discardChanges = () => {
          const title = document.getElementById("title");
          const date = document.getElementById("date");
          const time = document.getElementById("time");
          const description = document.getElementById("description");
          const image = document.getElementById("image");

          if(title.value || date.value || time.value || description.value || image.value) {
            const result = confirm("Discard changes?");
            if(result) {
              window.location.href="../event.php";
            }
          }else {
            window.location.href="../event.php";
          }
          
        }
      </script>
    </div>
  </body>
</html>

<?php 
  }
?>