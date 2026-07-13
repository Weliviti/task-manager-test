<?php
/**
 * Reusable helper functions
 */

// Escape HTML output safely to prevent XSS
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// Redirect with a message
function redirect_with_msg($url, $msg) {
    header('Location: ' . $url . '?msg=' . urlencode($msg));
    exit;
}
