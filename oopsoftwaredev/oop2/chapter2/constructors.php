<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page</title>
</head>
<body>

  <?php
      require_once 'Comment/Comment.php';

      $comment = new Comment('This is some comment text', 10);

  ?>
  <p><?= $comment->text ?> by user <?= $comment->userId ?></p>
</body>
</html>

