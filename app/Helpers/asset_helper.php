<?php

if (!function_exists('asset_url')) {
    function asset_url($path = '') {
        return base_url('assets/' . $path);
    }
}

if (!function_exists('auth_asset_url')) {
    function auth_asset_url($path = '') {
        return base_url('auth_assets/' . $path);
    }
}

if (!function_exists('guest_asset_url')) {
    function guest_asset_url($path = '') {
        return base_url('guest_assets/' . $path);
    }
}

if (!function_exists('dashboard_asset_url')) {
    function dashboard_asset_url($path = '') {
        return base_url('dashboard_assets/' . $path);
    }
}