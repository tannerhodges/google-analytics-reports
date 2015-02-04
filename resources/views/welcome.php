<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Google Analytics Reports</title>
</head>
<body>
    <div>
        <h3>Free eBooks by Henry David Thoreau:</h3>
        <ul>
            <?php foreach ($results as $item) : ?>
            <li><?php echo $item['volumeInfo']['title']; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>