<?php
include 'db.php';
$result = $conn->query("SELECT * FROM books");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Books</h1>
    <a href="create.php" class="btn">Add New Book</a>
    <table>
        <thead>
            <tr>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Date Published</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['book_name']; ?></td>
                <td><?php echo $row['author_name']; ?></td>
                <td><?php echo $row['published_date']; ?></td>
                <td>
                    <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
