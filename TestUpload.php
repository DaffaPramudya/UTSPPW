<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload File ke Server</title>
</head>
<body>
  <h1>Upload File</h1>
  <form action="funcproduk.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="condition" value="insert" required>
    <label for="fileUpload">Pilih file untuk diunggah:</label>
    <input type="file" name="fotoproduk" required>
    <br><br>
    <button type="submit">Unggah File</button>
  </form>
</body>
</html>
