<?php

require_once '../../functions/helpers.php';
require_once '../../functions/pdo_connection.php';

if(isset($_POST['title']) && $_POST['title'] != '' && isset($_POST['sort']) && $_POST['sort'] != '' && 
isset($_POST['radio']) && $_POST['radio'] != ''){

    $query = "INSERT INTO menu (title , sort , status , created_at) VALUES (? , ? , ? , now());";
    $statement = $conn->prepare($query);
    $statement->execute([$_POST['title'] , $_POST['sort'] , $_POST['radio']]);
    redirect('admin/menus');

}


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


                    <form action="<?= url('admin/menus/create.php') ?>" method="post">
                        <section class="form-group">
                            <label for="name">title</label>
                            <input type="text" class="form-control" name="title" id="name" placeholder="title ..." value="">
                            <label for="name">sort</label>
                            <input type="text" class="form-control" name="sort" id="name" placeholder="sort ..." value=""><br>
                            <label for="name">status</label>
                            <div>
                            <input value="1" name="radio" type="radio">                    
                            <label for="">فعال</label><br>
                            <input value="0" name="radio" type="radio">                      
                            <label for="">غیر فعال</label>
                            </div>
                        </section>
                        <section class="form-group">
                            <button name="submit" type="submit" class="btn btn-primary">Create</button>
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