<?php

require_once '../../functions/helpers.php';
require_once '../../functions/pdo_connection.php';

// $success = null;

// if (!isset($_GET['cat_id'])) {
//     redirect('admin/category');
// }

// $query = "SELECT * FROM categories WHERE id = ?";
// $statement = $conn->prepare($query);
// $statement->execute([$_GET['cat_id']]);
// $category = $statement->fetch();

// if ($category == false) {
//     redirect('admin/category');
// }

// if (isset($_POST['name']) && $_POST['name'] != "") {

//     $query = "UPDATE categories SET name = ?, updated_at = now() WHERE id = ?";
//     $statement = $conn->prepare($query);
//     $statement->execute([$_POST['name'], $_GET['cat_id']]);
//     $success = true;
//     redirect('admin/category');
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP panel</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
    <link rel="stylesheet" href="<?= asset("assets/css/bootstrap.min.css") ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset("assets/css/style.css") ?>" media="all" type="text/css">
</head>

<body>
    <section id="app">

        <?php require_once '../layout/top-nav.php'; ?>

        <section class="container-fluid">
            <section class="row">
                <section class="col-md-2 p-0">
                    <?php require_once '../layout/sidebar.php'; ?>
                </section>
                <section class="col-md-10 pt-3">


                    <form action="<?= url('admin/menus/edit.php?id=') . $menu->id ?>" method="post">
                        <section class="form-group">
                            <label for="name">title</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="name ..." value="<?= $category->name ?>">
                            <label for="name">sort</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="name ..." value="<?= $category->name ?>">
                            <label for="name">status</label>
                            
                        </section>
                        <section class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </section>
                    </form>


                </section>
            </section>
        </section>

    </section>

</body>
    <?php if ($success) { ?>
        <script>
        Swal.fire(
            'Good job!',
            'ثبت نام با موفقیت انجام شد.',
            'success'
        )
    </script>
    <?php } ?>

    <script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>

</html>