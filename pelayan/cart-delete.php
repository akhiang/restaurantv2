<?php
    require_once "../conn.php";

    $id = $_POST['id'];
    $user_id = $_POST['user_id'];

    $q = $conn->query("SELECT menu_id, qty FROM tb_cart_detail WHERE id = '$id' AND user_id = '$user_id'");
    $menu = $q->fetch_assoc();
    // var_dump($menu);
    $q2 = $conn->query("SELECT ingredient_id, use_qty FROM tb_menu_ingredient WHERE menu_id = '$menu[menu_id]'");
    if ($q2->num_rows > 0) {
        foreach ($q2 as $key => $row) {
            // var_dump($row);
            $menu_ing_id = $row['ingredient_id'];
            $use_qty = $row['use_qty'];
            
            $q3 = $conn->query("SELECT qty FROM tb_bahan WHERE id = '$menu_ing_id'");
            $ingre = $q3->fetch_assoc();
            
            $return_qty = $ingre['qty'] + ($use_qty * $menu['qty']);
            // var_dump($return_qty);
            $conn->query("UPDATE tb_bahan SET qty = '$return_qty' WHERE id = '$menu_ing_id'");
        }
    }    
    $q = $conn->query("DELETE FROM tb_cart_detail WHERE id = '$id' AND user_id = '$user_id'");
?>