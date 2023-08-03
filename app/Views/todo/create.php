<!-- app/Views/todo/index.php -->
<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<section class="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <?php if (session()->getFlashdata('msg')) : ?>
            <!-- Move this hidden input inside a form if you're planning to use it for deletion -->
            <input type="hidden" name="flash-msg" id="flash-msg" data-flash="<?= session()->getFlashdata('msg'); ?>">
        <?php endif; ?>

        <h1>Add New Task</h1>
        <form action="<?= base_url('TodoController/store') ?>" method="post">
            <label>Task:</label>
            <input type="text" name="task" required>
            <input type="submit" value="Add">
        </form>
        <a href="<?= base_url('TodoController/') ?>">Back to To-Do List</a>
    </div>

    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</section>
<!-- Don't add the closing </body> and </html> tags here since they are included in the layout template -->
<?= $this->endSection(); ?>
