<?php 
  session_start();

  $eventId = $_GET['eventId'];

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
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/add_event.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  </head>
  <body>
    <div class="container my-4 border border-dark rounded position-relative main-container w-75">
      <!-- change -->
      <form enctype="multipart/form-data" action="edit_add_product_operation.php?id=<?php echo $eventId?>" method="post">
        <button class="btn btn-danger position-absolute end-0 me-2 mt-2" onclick="discardChanges()">Back</button>
        <h1 class="mt-1 title">Add product</h1>
        <hr>
        <label class="form-label mb-1 fw-bold" for="name">Product Name:</label>
        <br>
        <input type="text" class="w-100 ps-2" id="name" required maxlength="70" name="name">
        <label class="form-label mt-3 mb-1 fw-bold" for="url">Url:</label>
        <br>
        <input type="text" class="w-100 ps-2" id="url" name="url" required>
        <label class="form-label mt-3 mb-1 fw-bold" for="description">Description:</label>
        <br>
        <textarea name="description" id="description" cols="30" rows="3" class="w-100 mb-1 ps-2" required></textarea>
        <label class="form-label mt-2 mb-1 fw-bold" for="description">Image:</label>
        <br>
        <input type="file" class="mb-3" id="image" name="image" accept="image/*" required>
        <br>
        <input type="submit" value="ADD" class="btn btn-primary d-block mx-auto w-25 my-3" name="add">
      </form>
    </div>
    <script>
      const discardChanges = () => {
        const name = document.getElementById("name");
        const url = document.getElementById("url");
        const description = document.getElementById("description");
        const image = document.getElementById("image");

        if(name.value || description.value || image.value || url.value) {
          const result = confirm("Discard changes?");
          if(result) {
            window.location.href="edit.php?id=<?php echo $eventId?>";
          }
        }else {
          window.location.href="edit.php?id=<?php echo $eventId?>";
        }
        
      }
    </script>
  </body>
</html>

<?php 
  }
?>