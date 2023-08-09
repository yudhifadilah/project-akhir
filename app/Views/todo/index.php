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
        <h1 class="mt-4">Agenda RW</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-white">Todo</h4>
                        <div class="add-items d-flex">
                            <form action="<?= base_url('TodoController/store') ?>" method="post" class="form-inline">
                                <input type="text" class="form-control mr-2" name="task" placeholder="What do you need to do today?" required>
                                <button class="btn btn-primary font-weight-bold" type="submit" id="add-task">Add</button>
                            </form>
                        </div>
                        <div class="list-wrapper mt-4">
                            <ul class="list-group">
                                <?php foreach ($todos as $todo) : ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center <?= $todo['completed'] ? 'completed' : '' ?>">
                                        <form action="<?= base_url('TodoController/update/' . $todo['id']) ?>" method="post" class="form-inline">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" <?= $todo['completed'] ? 'checked' : '' ?> onchange="this.form.submit()">
                                                <label class="form-check-label"><?= $todo['task'] ?></label>
                                            </div>
                                        </form>
                                        <div>
                                            <a href="<?= base_url('TodoController/edit/' . $todo['id']) ?>" class="btn btn-sm btn-secondary mr-2">Edit</a>
                                            <a href="<?= base_url('TodoController/delete/' . $todo['id']) ?>" class="btn btn-sm btn-danger remove-btn">Delete</a>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>
    <!-- Add Bootstrap JS and jQuery links here (optional) -->
    <!-- This is to include Bootstrap's JavaScript and jQuery for interactive features, like tooltips and modals -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Your custom JavaScript can be added here -->
    <script>
        // Custom JavaScript can be added here (optional)
        // For example, you can add code to handle confirmations before deleting tasks.
        // You may also add other interactive features using Bootstrap and/or custom JavaScript.
        document.querySelectorAll('.remove-btn').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                if (!confirm('Are you sure you want to delete this task?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
