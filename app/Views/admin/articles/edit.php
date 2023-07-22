<!DOCTYPE html>
<html>
<head>
    <title>Edit Article</title>
</head>
<body>
    <h1>Edit Article</h1>
    <form method="post" action="/admin/articles/update/<?php echo $article['id']; ?>" enctype="multipart/form-data">
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $article['title']; ?>" required><br>
        <label>Content:</label>
        <textarea name="content" required><?php echo $article['content']; ?></textarea><br>
        <label>Image:</label>
        <input type="file" name="image"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
