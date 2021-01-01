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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/admin')->namespace('Admin')->group(function(){

  Route::match(['get','post'],'/','AdminController@login');

  Route::group(['Middleware'=>['admin']],function(){

    Route::get('index','AdminController@index');
    Route::get('settings','AdminController@settings');
    Route::get('logout','AdminController@logout');
    Route::post('check-current-pass','AdminController@chkCurrentPassword');
    Route::post('update-current-pass','AdminController@updateCurrentPassword');
    Route::match(['get','post'],'update-admin-details','AdminController@updateAdminDetails');

    // dito ang mga rota sa kategorya
    Route::get('categories','CategoryController@categories');
    Route::post('update-category-status','CategoryController@updateCategoryStatus');
    Route::match(['get','post'],'add-edit-category/{id?}','CategoryController@addEditCategory');
    Route::get('delete-category/{id}','CategoryController@deleteCategory');

    // dito ang mga rota sa anak ng kategorya
    Route::get('subcategories','SubcategoryController@subcategories');
    Route::post('update-subcategory-status','SubcategoryController@updateSubcategoryStatus');
    Route::match(['get','post'],'add-edit-subcategory/{id?}','SubcategoryController@addEditSubcategory');
    Route::get('delete-subcategory-image/{id}','SubcategoryController@deleteSubcategoryImage');
    Route::get('delete-subcategory/{id}','SubcategoryController@deleteSubcategory');

    //dito ang mga produkto
    Route::get('products','ProductsController@products'); 
    Route::post('update-product-status','ProductsController@updateProductStatus');
    Route::get('delete-product/{id}','ProductsController@deleteProduct');
    Route::match(['get','post'],'add-edit-product/{id?}','ProductsController@addEditProduct');
    Route::get('delete-product-image/{id}','ProductsController@deleteProductImage');

    //dito ang mga anak ng produkto
    Route::match(['get','post'],'add-attributes/{id}','ProductsController@addAttributes');
    Route::post('edit-attributes/{id}','ProductsController@editAttributes');
    Route::post('update-attribute-status','ProductsController@updateAttributeStatus');
    Route::get('delete-attribute/{id}','ProductsController@deleteAttribute');

    //pag dagdag ng imahe
    Route::match(['get','post'],'add-images/{id}','ProductsController@addImages');
    Route::post('update-image-status','ProductsController@updateImageStatus');
    Route::get('delete-image/{id}','ProductsController@deleteImage');

    //baner
    Route::get('banners','BannersController@banners');
    Route::match(['get','post'],'add-edit-banner/{id?}','BannersController@addeditBanner');
    Route::post('update-banner-status','BannersController@updateBannerStatus');
    Route::get('delete-banner/{id}','BannersController@deleteBanner');

  });
});

Route::namespace('Front')->group(function(){
  //bahay pahina
  Route::get('/','IndexController@index');
  //routa sa pahina ng mga produkto
  Route::get('/{url}','ProductsController@listing');
});
