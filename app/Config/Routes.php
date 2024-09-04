<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public Routes (Guest Views)
$routes->get('/', 'HomeController::index');
$routes->get('about', 'AboutController::index');
$routes->get('services', 'ServicesController::index');
$routes->get('contact', 'ContactController::index');

// Authentication Routes
$routes->group('auth', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('login', 'AuthController::login', ['as' => 'login']);
    $routes->post('login', 'AuthController::attemptLogin');
    $routes->get('logout', 'AuthController::logout', ['as' => 'logout']);
    $routes->get('register', 'AuthController::register', ['as' => 'register']);
    $routes->post('register', 'AuthController::attemptRegister');
    $routes->get('forgot-password', 'AuthController::forgotPassword', ['as' => 'forgot_password']);
    $routes->post('forgot-password', 'AuthController::handleForgotPassword');
    $routes->get('reset-password/(:segment)', 'AuthController::resetPassword/$1', ['as' => 'reset_password']);
    $routes->post('reset-password', 'AuthController::handleResetPassword');
});

// Routes that require authentication
$routes->group('', ['namespace' => 'App\Controllers', 'filter' => 'auth'], function($routes) {

    // Admin Routes
    $routes->group('admin', ['filter' => 'role:admin'], function($routes) {
        $routes->get('/', 'AdminController::index', ['as' => 'admin_dashboard']);
        $routes->get('users', 'AdminController::manageUsers', ['as' => 'manage_users']);
        $routes->get('roles', 'AdminController::manageRoles', ['as' => 'manage_roles']);
        $routes->get('permissions', 'AdminController::managePermissions', ['as' => 'manage_permissions']);
    });

    // Manager Routes
    $routes->group('manager', ['filter' => 'role:manager'], function($routes) {
        $routes->get('/', 'ManagerController::index', ['as' => 'manager_dashboard']);
        $routes->get('tasks', 'ManagerController::manageTasks', ['as' => 'manage_tasks']);
        $routes->get('reports', 'ManagerController::viewReports', ['as' => 'view_reports']);
    });

    // Staff Routes
    $routes->group('staff', ['filter' => 'role:staff'], function($routes) {
        $routes->get('/', 'StaffController::index', ['as' => 'staff_dashboard']);
        $routes->get('tasks', 'StaffController::viewTasks', ['as' => 'view_tasks']);
        $routes->post('tasks/complete', 'StaffController::completeTask', ['as' => 'complete_task']);
    });

    // Content Manager Routes
    $routes->group('content-manager', ['filter' => 'role:content_manager'], function($routes) {
        $routes->get('/', 'ContentManagerController::index', ['as' => 'content_manager_dashboard']);
        $routes->get('manage-content', 'ContentManagerController::manageContent', ['as' => 'manage_content']);
    });
});