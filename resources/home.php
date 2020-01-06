<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <?php
    foreach ($books as $book) {
        echo "<h1>".$book['title']."</h1>";
        echo "<p>".$book['description']."</p>";
      }
    ?>    
    
</body>
</html>