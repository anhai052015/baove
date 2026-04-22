<?php
if (isset($_GET['mode']) && $_GET['mode'] == 'admin') {
    $action = $_GET['action'] ?? '/';
    match ($action) {
        '/' => (new AdminController)->index(),
        'create' => (new AdminController)->create(),
        'add' => (new AdminController)->add(),
        'delete' => (new AdminController)->delete(),
        'edit' => (new AdminController)->edit(),
        'update' => (new AdminController)->update(),
        'userlist' => (new AdminController)->userlist(),
        'deleteUser' => (new AdminController)->deleteUser(),
        'detail' => (new AdminController)->detail(),
        default => (new AdminController)->index(),
    };
} else {
    $action = $_GET['action'] ?? '/';

    match ($action) {
        '/' => (new ClientController)->index(),
        'detail' => (new ClientController)->detail(),
        'category' => (new ClientController)->index(),

        'register' => (new ClientController)->register(),
        'check' => (new ClientController)->check(),
        'login' => (new ClientController)->login(),
        'logout' => (new ClientController)->logout(),
        'into_admin' => (new ClientController)->into_admin(),
        'admin' => (new ClientController)->check_admin(),
        'lienhe' => (new ClientController)->lienhe(),
        'comment' => (new ClientController)->comment(),
        'search' => (new ClientController)->search(),
        'add_to_cart' => (new ClientController)->addToCart(),
        'cart' => (new ClientController)->cart(),
        // --------------------------------------

        default => (new ClientController)->index(),
    };
}
?>