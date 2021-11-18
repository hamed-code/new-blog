<?php

require_once '../../functions/helpers.php';
require_once '../../functions/pdo_connection.php';
require_once 'delete.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP panel</title>
    <script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

                    <section class="mb-2 d-flex justify-content-between align-items-center">
                        <h2 class="h4">Menus</h2>
                        <a href="<?= url('admin/menus/create.php') ?>" class="btn btn-sm btn-success">Create</a>
                    </section>

                    <section class="table-responsive">
                        <table class="table table-striped table-">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>title</th>
                                    <th>sort</th>
                                    <th>status</th>
                                    <th>setting</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $query = "SELECT * FROM menu;";
                                $statement = $conn->query($query);
                                $statement->execute();
                                $menus = $statement->fetchAll();

                                foreach ($menus as $menu) {

                                ?>
                                    <tr>
                                        <td><?= $menu->id ?></td> 
                                        <td><?= $menu->title ?></td>
                                        <td><?= $menu->sort ?></td>
                                        <td>
                                            <?php if($menu->status == 1) { ?>
                                            <button class="btn btn-success">فعال</button>
                                            <?php }else{ ?>
                                            <button class="btn btn-danger">غیر فعال</button>
                                            <?php } ?>
                                        </td>
                                        <td><a href="<?= url('admin/menus/edit.php?menu_id=') . $menu->id ?>" class="btn btn-info btn-sm">Edit</a>

                                            <input type="hidden" class="delete_id_value" value="<?= $menu->id ?>">
                                            <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger btn-sm">Confirm Delete</a>
                                        </td>
                                    </tr>

                                <?php } ?>


                            </tbody>
                        </table>
                    </section>


                </section>
            </section>
        </section>





    </section>
    <script>
        $(document).ready(function() {
            $('.delete_btn_ajax').click(function(e) {
                e.preventDefault();
                // console.log("helloman");
                var deleteid = $(this).closest("tr").find(".delete_id_value").val();
                // console.log(deleteid);
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                           $.ajax({
                                type: "POST",
                                url: "index.php",
                                data: {
                                    "delete_btn_set":1,
                                    "delete_id": deleteid,
                                },
                                success: function (response){
                                    swal("Data Deleted Successfuly..", {
                                        icon: "success",
                                    }).then((result) => {
                                        location.reload();
                                    });
                                }
                           });
                        } 
                    });
            });
        });
    </script>
    <script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>