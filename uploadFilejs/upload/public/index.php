<?php

$files = $_FILES;

print_r($_FILES);
if (! empty($files['file'])) {
    print_r($files['file']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload And Resize image</title>
</head>
<body>

<!-- Upload image -->
<input type="file" id="input" accept=".jpg, .jpeg, .png">
<!--/ End Upload image -->


<!-- Preview Uploaded Image -->
<div id="wrapper">

</div>

<script src="app.js"></script>
</body>
</html>
