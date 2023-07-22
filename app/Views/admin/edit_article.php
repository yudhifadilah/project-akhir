<!-- form untuk mengedit artikel -->
<form method="post" enctype="multipart/form-data" action="<?= site_url('admin/articles/update/'.$article['id']) ?>">
    <input type="text" name="title" value="<?= $article['title'] ?>" required><br>
    <textarea name="content" required><?= $article['content'] ?></textarea><br>
    <!-- Tampilkan preview gambar jika ada -->
    <?php if ($article['image_filename']) : ?>
        <img src="<?= base_url('assets/img/postingan/'.$article['image_filename']) ?>" width="100">
    <?php endif; ?>
    <input type="file" name="image" accept="image/*"><br>
    <button type="submit">Update</button>
</form>
