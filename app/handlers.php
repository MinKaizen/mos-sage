<?php declare(strict_types=1);

namespace App\Handler;

function update_user_mis() {
    if (isset( $_POST['_wpnonce'] ) &&
        isset( $_POST['slug'] ) &&
        wp_verify_nonce( $_POST['_wpnonce'], "save_mis_" . $_POST['slug'] )
    ) {
        $user_id = isset($_POST['user_id']) ? (int) $_POST['user_id'] : 0;
        $meta_key = isset($_POST['meta_key']) ? $_POST['meta_key'] : '';
        $value = isset($_POST['value']) ? $_POST['value'] : '';
        update_user_meta( $user_id, $meta_key, $value );
    }

    $redirect = isset($_POST['redirect']) ? $_POST['redirect'] : '';
    wp_redirect( $redirect );
    exit;
}
