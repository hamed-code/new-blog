<?php

    if(isset($_POST['delete_btn_set'])){
        $del_id = $_POST['delete_id'];

        $query = "DELETE FROM categories WHERE id = ?";
        $statement = $conn->prepare($query);
        $statement->execute([$del_id]);
    }