<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


//Route Default
Route::get('/', function () {
    return view('welcome');
})->name('welcome');


//Route User



Route::get('/userhome','userController@dashboard')->name('userhome');
Route::get('buy/{id}','userBuy@tampilanproduk');
Route::get('/registeruser', 'AuthUserController@getRegisterUser')->middleware('guest');
Route::post('/registeruser', 'AuthUserController@postRegisterUser')->name('registeruser')->middleware('guest');
Route::post('/user/cart/checkout','userBuy@checkout');
Route::get('/user/transactionview','userBuy@transactionview');

Route::get('/user/comment/{id}','userBuy@comment');
Route::post('/user/comment/{id}','userBuy@commentpost');
Route::post('/user/proofment','userBuy@proofment');

Route::get('user/notification/{id}','userBuy@notification');
Route::get('user/mark/{id}','userBuy@mark');

// AJAX
Route::get('/user/city/{prov}','userBuy@city');
Route::get('/user/cost/{prov}/{city}/{kurir}/{weight}','userBuy@cost');


Route::get('/loginuser', 'AuthUserController@getLoginUser')->middleware('guest');
Route::post('/loginuser', 'AuthUserController@postLoginUser')->name('loginuser')->middleware('guest');
Route::get('user/cartview','userBuy@cartview')->middleware('auth:user');
Route::get('user/cart','userBuy@cart')->middleware('auth:user');
Route::get('user/del/{id_item}','userBuy@delete');
Route::get('/logout/user', 'AuthUserController@logout')->name('logout')->middleware('auth:user');
Route::post('user/transaction','userBuy@transaction');


//Route Admin
Route::get('/adminhome', function () {
    return view('adminHome');
})->middleware('auth:admin')->name('adminhome');

Route::get('/registeradmin', 'AuthAdminController@getRegisterAdmin')->middleware('guest');
Route::post('/registeradmin', 'AuthAdminController@postRegisterAdmin')->name('registeradmin')->middleware('guest');

Route::get('/loginadmin', 'AuthAdminController@getLoginAdmin')->middleware('guest');
Route::post('/loginadmin', 'AuthAdminController@postLoginAdmin')->name('loginadmin')->middleware('guest');

Route::get('/logout/admin', 'AuthAdminController@logout')->name('logoutadmin')->middleware('auth:admin');




//Route Courier
Route::get('admin/courier', 'CourierController@index')->middleware('admin:admin')->name('allCourier');

Route::get('courier/create', 'CourierController@create')->middleware('admin:admin')->name('addCourier');

Route::post('courier/new', 'CourierController@store')->middleware('admin:admin')->name('newCourier');

Route::delete('admin/courier/{courier}', 'CourierController@destroy')->middleware('admin:admin')->name('deleteCourier');

Route::get('courier/{courier}/edit', 'CourierController@edit')->middleware('admin:admin')->name('editCourier');

Route::patch('courier/{courier}', 'CourierController@update')->middleware('admin:admin')->name('updateCourier');




//Route Discount
Route::get('admin/discount', 'DiscountController@index')->middleware('admin:admin')->name('allDiscount');

Route::get('discount/create', 'DiscountController@create')->middleware('admin:admin')->name('addDiscount');

Route::post('discount/new', 'DiscountController@store')->middleware('admin:admin')->name('newDiscount');

Route::delete('admin/discount/{discount}', 'DiscountController@destroy')->middleware('admin:admin')->name('deleteDiscount');

Route::get('discount/{discount}/edit', 'DiscountController@edit')->middleware('admin:admin')->name('editDiscount');

Route::patch('discount/{discount}', 'DiscountController@update')->middleware('admin:admin')->name('updateDiscount');




//Route Productcategori
Route::get('admin/productcategorie', 'ProductCategorieController@index')->middleware('admin:admin')->name('allProductCategorie');

Route::get('productcategorie/create', 'ProductCategorieController@create')->middleware('admin:admin')->name('addProductcategorie');

Route::post('productcategorie/new', 'ProductCategorieController@store')->middleware('admin:admin')->name('newProductCategorie');

Route::delete('admin/productcategorie/{product_categorie}', 'ProductCategorieController@destroy')->middleware('admin:admin')->name('deleteProductCategorie');

Route::get('productcategorie/{product_categorie}/edit', 'ProductCategorieController@edit')->middleware('admin:admin')->name('editProductCategorie');

Route::patch('productcategorie/{product_categorie}', 'ProductCategorieController@update')->middleware('admin:admin')->name('updateProductCategorie');




//Route Productcategoridetail
Route::get('admin/productcategorydetail', 'ProductCategoryDetailController@index')->middleware('admin:admin')->name('allProductCategoryDetail');

Route::get('productcategorydetail/create', 'ProductCategoryDetailController@create')->middleware('admin:admin')->name('addProductcategoryDetail');

Route::post('productcategorydetail/new', 'ProductCategoryDetailController@store')->middleware('admin:admin')->name('newProductCategoryDetail');

Route::delete('admin/productcategorydetail/{product_category_detail}', 'ProductCategoryDetailController@destroy')->middleware('admin:admin')->name('deleteProductCategoryDetail');

Route::get('productcategorydetail/{product_category_detail}/edit', 'ProductCategoryDetailController@edit')->middleware('admin:admin')->name('editProductCategoryDetail');

Route::patch('productcategorydetail/{product_category_detail}', 'ProductCategoryDetailController@update')->middleware('admin:admin')->name('updateProductCategoryDetail');




//product
Route::get('admin/product', 'ProductController@index')->middleware('admin:admin')->name('allProduct');

Route::get('product/create', 'ProductController@create')->middleware('admin:admin')->name('addProduct');

Route::post('product/new', 'ProductController@store')->middleware('admin:admin')->name('newProduct');

Route::delete('admin/product/{product}', 'ProductController@destroy')->middleware('admin:admin')->name('deleteProduct');

Route::get('product/{product}/edit', 'ProductController@edit')->middleware('admin:admin')->name('editProduct');

Route::patch('product/{product}', 'ProductController@update')->middleware('admin:admin')->name('updateProduct');




//product image
Route::get('admin/productimage', 'ProductImageController@index')->middleware('admin:admin')->name('allProductImage');

Route::get('productimage/create', 'ProductImageController@create')->middleware('admin:admin')->name('addProductImage');

Route::post('productimage/new', 'ProductImageController@store')->middleware('admin:admin')->name('newProductImage');

Route::delete('admin/productimage/{product_image}', 'ProductImageController@destroy')->middleware('admin:admin')->name('deleteProductImage');

Route::get('productimage/{product_image}/edit', 'ProductImageController@edit')->middleware('admin:admin')->name('editProductImage');

Route::patch('productimage/{produc_timage}', 'ProductImageController@update')->middleware('admin:admin')->name('updateProductImage');





//test route 25 maret 2020
Route::get('/test', function () {
    return view('test');
});

Route::get('/report', function () {
    return view('/user/transaction_report_view');
});
