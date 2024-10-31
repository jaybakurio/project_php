<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_name = $_POST['book_name'];
    $author_name = $_POST['author_name'];
    $published_date = $_POST['published_date'];

    $sql = "INSERT INTO books (book_name, author_name, published_date) 
            VALUES ('$book_name', '$author_name', '$published_date')";
    $conn->query($sql);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add New Book</h1>
    <form method="POST">
        <label>Book Name:</label>
        <input type="text" name="book_name" required>
        
        <label>Author Name:</label>
        <input type="text" name="author_name" required>
        
        <label>Date Published:</label>
        <input type="date" name="published_date" required>
        
        <button type="submit">Add Book</button>
    </form>
</body>
</html>
