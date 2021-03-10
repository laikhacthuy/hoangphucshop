<?php
//use App\Http\Controllers\AdminCintroller;
use Illuminate\Support\Facades\Route;
//use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
/*Test relationship table laravel */
/*table category relationship table brand
1 category has many brand

Route::get('admin/1', function () {
    $result = App\Models\Pro_Category::where('category_id',1)->first()->Brand->toArray();
    print_r($result);
});
table brand relationship table category
1 brand belong to 1 category
Route::get('admin/2', function () {
    $resultt = App\Models\Pro_Brand::where('brand_id',5)->first()->Category->toArray();
    print_r($resultt);
});

/*Font-end*/
Route::get('/','HomeController@index')->name('home');
Route::get('/quychehoatdong','HomeController@quychehoatdong');
Route::get('/noiquysieuthi','HomeController@noiquysieuthi');
Route::get('/chatluongphucvu','HomeController@chatluongphucvu');
Route::get('/chinhsachbaohanh','HomeController@chinhsachbaohanh');
/*Category*/
Route::get('/Danhmucsanpham/{name_category?}','HomeController@danhmucsanpham')->name('danhmucsanpham');
Route::get('/check_type_category/{category_id}/{name_product}','HomeController@Check_type_category')->name('check_type_category');
Route::get('/Dienthoai/{name_product?}','HomeController@chitietsanpham_dt')->name('chitietsanpham');
Route::get('/Laptop/{name_product?}','HomeController@chitietsanpham_lt')->name('chitietsanphamlt');
Route::get('/Table/{name_product?}','HomeController@chitietsanpham_tb')->name('chitietsanphamtb');
/*cart */
Route::get('/giohangcuaban','CartController@index')->name('giohang');
Route::post('/add_cart/{namepro?}', 'CartController@Add_Cart')->name('addcart');
Route::get('/remove_cart/{idrow?}', 'CartController@Remove_Cart')->name('removecart');
Route::get('/updatecart/{qty?}/{rowId?}', 'CartController@Update_Cart')->name('updatecart');
/*customer */
Route::post('/register_customer','CustomerController@Register_Customer')->name('register_customer');
Route::post('/login_customer','CustomerController@Login_Customer')->name('login_customer');
Route::get('/logout_customer','CustomerController@Logout_Customer')->name('logout_customer');
Route::post('/save_customer','CustomerController@Save_Customer')->name('save_customer');
/*Order product */
Route::post('/check_login_home','CustomerController@Check_login_home')->name('Check_login_home');
Route::get('/thongtinkhachhang','CustomerController@Create_Customer_info')->name('thongtinkhachhang')->middleware('check_home');
Route::get('/thanhtoan', 'OrderController@add_order')->name('addorder')->middleware('check_home');
Route::get('/lichsumuahang/{customer_id?}', 'OrderController@History_Order')->name('historyorder')->middleware('check_home');
/*Brand */
Route::get('/thuonghieu/{thuonghieusp?}','HomeController@Thuonghieusanpham')->name('thuonghieu');/*note*/
/*Search product */
Route::get('/search','HomeController@Search')->name('search');
Route::get('/resetpassword','HomeController@Reset_Password')->name('resetpassword');

/*Back-end*/
/*Tạo từ controller trắng */
Route::get('/admin','AdminController@login')->name('login');
Route::post('/checklogin','AdminController@checklogin');
Route::get('/logout','AdminController@logout')->name('logout');
/*Product Category*/
/*
Tạo từ controller resource
Except using all method except in Except
*/
Route::group(['middleware' => 'login'], function () {
    Route::get('admin/dashboard','AdminController@index')->name('dashboard');
    /*Product Category*/
    Route::resource('/admin/Product_Category', 'ProCate_Controller')->except(['edit'])->middleware('role');
    /*Product Brand*/
    Route::resource('/admin/Product_Brand', 'ProBrand_Controller')->except(['edit'])->middleware('role');
    /*Product*/
    Route::resource('/admin/Product', 'Product_Controller')->except(['edit']);
    /*User*/
    Route::resource('/admin/User', 'UserController')->except('edit')->middleware('role');
    /*Product Specefi */
    Route::get('/admin/Product_Specifi/{id?}/{name?}','Pro_Specifi_Controller@index')->name('specifi');
    Route::post('/admin/Product_Specifi/save','Pro_Specifi_Controller@specefi_save')->name('specifi_save');
});

