<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM books WHERE id=$id");
$book = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_name = $_POST['book_name'];
    $author_name = $_POST['author_name'];
    $published_date = $_POST['published_date'];

    $sql = "UPDATE books 
            SET book_name='$book_name', author_name='$author_name', published_date='$published_date' 
            WHERE id=$id";
    $conn->query($sql);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Update Book</h1>
    <form method="POST">
        <label>Book Name:</label>
        <input type="text" name="book_name" value="<?php echo $book['book_name']; ?>" required>
        
        <label>Author Name:</label>
        <input type="text" name="author_name" value="<?php echo $book['author_name']; ?>" required>
        
        <label>Date Published:</label>
        <input type="date" name="published_date" value="<?php echo $book['published_date']; ?>" required>
        
        <button type="submit">Update Book</button>
    </form>
</body>
</html>
