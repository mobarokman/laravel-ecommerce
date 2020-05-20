<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

//Customer Route::
Route::group(['as' => 'customer.', 'namespace' => 'Customer'], function () {

    Route::get('/', 'MainController@index')->name('home');

    Route::get('cart', 'CartController@viewCart')->name('cart');
    Route::post('cart', 'CartController@storeCart')->name('cart.store');

    Route::get('shipping', 'OrderController@shipping')->name('shipping');
    Route::post('shipping', 'OrderController@shippingStore')->name('shipping.store');

    //Route::get('order', 'OrderController@order')->name('order');

    // Route::post('order', 'OrderController@orderStore')->name('order.store');

    Route::get('payment', 'PaymentController@paymentMethod')->name('paymentMethod');
    Route::post('confirm-order', 'PaymentController@paymentConfirm')->name('paymentConfirm');
    Route::get('order-confirmation', 'PaymentController@orderConfirmation')->name('orderConfirmation');
    Route::get('product/{product}', 'ProductController@show')->name('product.show');

});

// "as is route name", "prefix is url prfix"
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

    //login
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login.post');
    Route::post('logout', 'LoginController@logout')->name('logout');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::resource('category', 'CategoryController');
        Route::get('category-data', 'CategoryController@categoryData')->name('categoryData');
    
        Route::resource('tag', 'TagController');
        Route::get('tag-data', 'TagController@tagData')->name('tagData');
    
        Route::resource('supplier', 'SupplierController');
        Route::get('supplier-data', 'SupplierController@supplierData')->name('supplierData');
    
        Route::resource('product', 'ProductController');
        Route::get('product-data', 'ProductController@productData')->name('productData');
    
        Route::resource('product-unit', 'ProductUnitController');
        Route::get('product-unit-list', 'ProductUnitController@unitList')->name('product-unit.list');
        Route::get('product-unit/delete/{product}', 'ProductUnitController@getDeleteModal')->name('product-unit.delete');
    

        // Rbac
        Route::resource('/permissions', 'Rbac\PermissionController');
        Route::get('/permission-list', 'Rbac\PermissionController@permissionList')->name('permissionList');

        Route::resource('/roles', 'Rbac\RoleController');
        Route::get('role-list', 'Rbac\RoleController@roleList')->name('roleList');
        Route::get('assign-remove-permission/{role_id}', 'Rbac\RoleController@getAssignOrRemovePermission')->name('getAssignOrRemovePermission');
        Route::post('assign-remove-permission/{role_id}', 'Rbac\RoleController@postAssignOrRemovePermission')->name('postAssignOrRemovePermission');

        Route::resource('admin-access', 'Rbac\AdminAccessController');
        Route::get('admin-role', 'Rbac\AdminAccessController@giveRoleToUser')->name('giveRoleToUser');
        Route::post('admin-role', 'Rbac\AdminAccessController@postGiveRoleToUser')->name('postGiveRoleToUser');
        Route::get('admin-with-role', 'Rbac\AdminAccessController@adminWithRole')->name('adminWithRole');

        Route::resource('admin-management', 'Rbac\AdminManagementController');
        Route::get('admin-list', 'Rbac\AdminManagementController@adminList')->name('adminList');
        //Rbac end

        Route::resource('/posts', 'PostController');
        Route::resource('apple', 'AppleCon');


    });

});
