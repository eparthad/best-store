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

Route::get('/', 'WelcomeController@index');
Route::get('/category-view/{id}/{categoryName}', 'WelcomeController@category');
Route::get('/product-details/{id}/{productName}', 'WelcomeController@productDetails');



/*    Login Registration Route   */
Auth::routes();
//Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('/admin/login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//
Route::get('/dashboard', 'HomeController@index');




/**  Product Cart Information **/

Route::get('/cart/show', 'CartController@showCart');
Route::post('/add-to-cart/{productId}', 'CartController@add_to_cart');
Route::get('/add-to-cart/{productId}', 'CartController@add_to_cart');
Route::post('/update-cart', 'CartController@update_cart');
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');

Route::get('/check-out', 'CartController@checkOut');
Route::get('/ajax-cart-update/', 'WelcomeController@ajaxCartUpdate');


Route::get('/ajax-email-check/{email}', 'CheckoutController@ajaxEmailCheck');
Route::get('/ajax-password-check/{pass}/{passAgain}', 'CheckoutController@ajaxPassCheck');
Route::post('/customer-login','CheckoutController@loginCustomer');
Route::post('/customer-save','CheckoutController@saveCustomer');
Route::get('/shipping-address','CheckoutController@shippingAddress');
Route::post('/save-shipping','CheckoutController@saveShipping');
Route::post('/place-order','CheckoutController@placeOrder');
Route::get('/payment','CheckoutController@payment');
Route::get('/order-successfull','CheckoutController@order_successfull');
//    Route::post('/product/store', 'ProductController@storeProduct');

/**  End of Cart Route Information **/



/**  Middleware Group For Authorized Access  **/

Route::group(['middleware'=>'AuthenticateMiddleware'], function(){




    /**  User Route Information **/

    Route::get('/user/manage-user', 'UserController@manageUser');
    Route::get('/user/{id}/edit', 'UserController@editUser');
    Route::post('/user/update', 'UserController@updateUser');
    Route::get('/user/{id}/delete', 'UserController@deleteUser');



    /**  End of User Route Information **/


    /**  Category Route Information **/

    Route::get('/category/index', 'CategoryController@index');
    Route::get('/category/add', 'CategoryController@createCategory');
    Route::post('/category/store', 'CategoryController@storeCategory');
    Route::get('/category/manage-category', 'CategoryController@manageCategory');
    Route::get('/category/{id}/edit', 'CategoryController@editCategory');
    Route::post('/category/update', 'CategoryController@updateCategory');
    Route::get('/category/{id}/delete', 'CategoryController@deleteCategory');



    /**  End of Category Route Information **/


    /**  Manufacturer Route Information **/

    Route::get('/manufacturer/add', 'ManufacturerController@createManufacturer');
    Route::post('/manufacturer/store', 'ManufacturerController@storeManufacturer');
    Route::get('/manufacturer/manage-manufacturer', 'ManufacturerController@manageManufacturer');
    Route::get('/manufacturer/{id}/edit', 'ManufacturerController@editManufacturer');
    Route::post('/manufacturer/update', 'ManufacturerController@updateManufacturer');
    Route::get('/manufacturer/{id}/delete', 'ManufacturerController@deleteManufacturer');



    /**  End of Manufacturer Route Information **/


    /**  Product Route Information **/

    Route::get('/product/add', 'ProductController@createProduct');
    Route::post('/product/store', 'ProductController@storeProduct');
    Route::get('/product/manage-product', 'ProductController@manageProduct');
    Route::get('/product/{id}/view', 'ProductController@viewProduct');
    Route::get('/product/{id}/edit', 'ProductController@editProduct');
    Route::post('/product/update', 'ProductController@updateProduct');
    Route::get('/product/{id}/delete', 'ProductController@deleteProduct');



    /**  End of Product Route Information **/

    /**  Orders Information **/
    Route::get('/manage-order', 'OrderController@manage_order');
    Route::get('/view-invoice/{id}', 'OrderController@view_invoice');
    Route::get('/order/{id}/edit', 'OrderController@editOrder');
    Route::post('/order/update', 'OrderController@updateOrder');
    Route::get('/order/{id}/delete', 'OrderController@deleteOrder');


    /**  End of Order Information **/





});