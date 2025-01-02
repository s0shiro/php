<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Basics</title>
</head>
<body>

    <h1>Recommended Books</h1>

    <ul>
        <?php foreach ($filteredBooks as $book): ?>
        <li>
            <a href="<?= $book['url'] ?>">
                <?= $book['name']; ?>(<?= $book['year'] ?> - By <?= $book['author'] ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>