<?php
session_start();

class StateManager {
    // Cookie Management
    public static function setCookie($name, $value, $expiry = 86400) {
        setcookie($name, $value, time() + $expiry, '/');
    }

    public static function getCookie($name) {
        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
    }

    public static function deleteCookie($name) {
        setcookie($name, '', time() - 3600, '/');
    }

    // Session Management
    public static function checkLogin() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ../../index.php");
            exit;
        }
    }

    public static function setSessionData($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function getSessionData($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    // Last Activity Tracking
    public static function updateLastActivity() {
        self::setCookie('last_activity', date('Y-m-d H:i:s'));
    }

    public static function getLastActivity() {
        return self::getCookie('last_activity');
    }
}

// Check login status
StateManager::checkLogin();

// Update last activity
StateManager::updateLastActivity();
?>