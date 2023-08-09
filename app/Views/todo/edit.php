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
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <h1 class="mt-4">Edit Task</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('TodoController/update/' . $todo['id']) ?>" method="post" class="form-inline">
                            <div class="form-group">
                                <label for="task">Task:</label>
                                <input type="text" class="form-control mx-sm-3" name="task" value="<?= $todo['task'] ?>" required>
                            </div>
                            <div class="form-check mx-sm-3">
                                <input class="form-check-input" type="checkbox" name="completed" <?= $todo['completed'] ? 'checked' : '' ?>>
                                <label class="form-check-label" for="completed">Completed</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <a href="<?= base_url('todo') ?>" class="btn btn-secondary mt-2">Back to To-Do List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>

    <!-- Add Bootstrap JS and jQuery links here (optional) -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
