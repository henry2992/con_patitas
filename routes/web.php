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

Route::group(['middleware' => ['web']], function () {

    Route::auth();
    Route::get('/', function(){
        $text = \App\Text::first();
        return view("home/home",array('text'=>$text));
    });



    Route::get("/login",'Auth\FrontLoginController@showLoginForm');
    Route::post("/login",'Auth\FrontLoginController@login')->name("login");
    Route::get("/signup",'Auth\FrontLoginController@showRegisterForm')->name('viewSignUpForm');
    Route::post("/signup",'Auth\FrontLoginController@register')->name("signup");
    Route::get("/signout",'Auth\FrontLoginController@logout');
    Route::get('/email_verify/{token}','Auth\FrontLoginController@confirmation')->name("confirmation");
    Route::get('error',function(){return view('404_page.404');});

/*  Pets    */

    Route::get( 'pets/register','Pet\RegisterPetProfileController@showRegistrationForm')->name('petRegistrationForm');
    Route::post('pets/register','Pet\RegisterPetProfileController@register')->name('add_pet');
    Route::get( 'pets','Pet\RegisterPetProfileController@show')->name('show_pet');
    Route::post('pets/edit','Pet\RegisterPetProfileController@edit')->name('edit_pet');
    Route::post('pets/update','Pet\RegisterPetProfileController@update')->name('update_pet');
    Route::get( 'pets/delete','Pet\RegisterPetProfileController@delete')->name('delete_pet');
    Route::get( 'pets/found','Pet\PetController@showFoundForm');
    Route::get( 'pets/tag/{id}','Pet\PetController@foundPet')->name('foundPet');
    Route::post('pets/found/email','Pet\PetController@sendEmail')->name('emailOwner');
    Route::post('pets/found/location','Pet\PetController@sendLocation')->name('sendLocation');
    Route::post('pets/report','Pet\RegisterPetProfileController@report')->name('report');
    Route::post('pets/found_report','Pet\RegisterPetProfileController@foundReport')->name('found_report');
    Route::post('pets/sendsms','Pet\PetController@sendSms');

    /* End pets*/
    Route::get('recaptcha','Auth\FrontLoginController@recaptcha');
    Route::get('recaptcha_pets','Pet\RegisterPetProfileController@recaptcha');
    /* Upload files */
    Route::post('/uploadFile/{type}/{size}','FileUploadController@uploadFiles')->name('upload');
   /*      */
    Route::post('/providers/register/{petId}/{providerName}','ProviderController@saveProviderToPetProfile')->name('saveProvider');

    Route::get('profile/edit','UserProfileController@showProfileForm');
    Route::post('profile/update','UserProfileController@updateProfile')->name('updateProfile');
    Route::get('profile/change_email','UserProfileController@showChangeEmailForm');
    Route::post('profile/change_email','UserProfileController@changeEmail');
    Route::get('profile/change_password','UserProfileController@showChangePasswordForm');
    Route::post('profile/change_email/{token}','UserProfileController@confirmationEmail')->name('confirmChangedEamil');
    Route::post('profile/change_password','UserProfileController@changePassword')->name("changePassword");

    Route::get('notification/view/{id}','Notification\Notification@showNotification')->name('notification_view');
    Route::get('notification/list/{page}','Notification\Notification@listNotification')->name('list_notifications');
    Route::post('notification/delete','Notification\Notification@deleteNotification')->name('delete_notification');

    Route::post('blog/post','BlogController@savePost')->name('save_post');
    Route::get('blog/{page}','HomeController@showBlogs');

    Route::get('/contact',function(){ return view('contactus.contactus'); });
    Route::post('contact/submit','ContactController@submitData')->name('contact.submit');

    Route::get('/outreach', function () {return view('home.outreach');});
    Route::get('/privacy', function () {return view('home.privacy');});
    Route::get('/outreach/ourstory', function () {return view('home.ourstory');});
    Route::get('/outreach/program', function () {return view('home.10program');});
    Route::get('/outreach/company', function () {return view('home.company');});

    Route::get('/upgrade', function () {return view('upgrade.index');});

    Route::get('/support', function () {return view('support.main');});
    Route::get('/support/freetag', function () {return view('support.get_freeTag');});
    Route::get('/support/getreader', function () {return view('support.qrcode_reader');});
    Route::get('/support/mobile', function () {return view('support.getmobileapp');});
    Route::get('support/common_questions', function () {return view('support.common_questions');});
    Route::get('support/shipping', function () {return view('support.shipping_return');});

    Route::get('cart/account','CartController@upgradeAccount');
    Route::post('cart/add','CartController@add');
    Route::get('cart/view','CartController@view')->middleware('auth:web');
     Route::post('cart/delete','CartController@delete');

    Route::post('cart/checkout','CartController@checkout');
    Route::get('shop/{type}/{page}/{order}','ShopController@show')->name('product-client-view');
    Route::get('shop/detail/{id}','ShopController@detail');
    Route::post('shop/markup','ShopController@markup');

});



//  Admin routes
Route::prefix('admin')->group(function(){

    Route::get('/','Admin\AdminAuthController@showLoginForm');
    Route::post('/login', 'Admin\AdminAuthController@login')->name('admin.login');
    Route::get('/logout', 'Admin\AdminAuthController@logout')->name('admin.logout');

    Route::get('/register', 'Admin\AdminAuthController@showRegisterForm')->name('admin.register');
    Route::post('register', 'Admin\AdminAuthController@register');

    Route::get('/password/change', 'Admin\HomeController@showChangePasswordForm')->name('admin.showLinkRequestForm');
    Route::post('/password/change', 'Admin\HomeController@changePassword')->name('admin.change.password');

    Route::get('/dashboard','Admin\HomeController@index');

    Route::get('/adstext/show','Admin\HomeController@showAds')->name('admin.ads.show');
    Route::post('/adstext/update','Admin\HomeController@updateAds')->name('admin.ads.update');

    Route::get('contact/view','Admin\HomeController@showInbox')->name('view_inbox');
    Route::post('contact/delete','Admin\HomeController@deleteInbox')->name('delete_inbox');

    Route::get('shop/view/{page}/{order}','Admin\ShopController@view')->name('product_view');
    Route::post('shop/add','Admin\ShopController@add');
    Route::get('shop/delete/{id}','Admin\ShopController@delete');
    Route::get('shop/search/{keyword}','Admin\ShopController@search');

    Route::get('qrtag/view/{page}/{order}','Admin\QrtagController@viewFrom')->name('tag-view');
    Route::post('qrtag/generation','Admin\QrtagController@generation');
    Route::get('qrtag/delete/{id}','Admin\QrtagController@delete');
    Route::get('qrtag/search/{keyword}','Admin\QrtagController@search');

    Route::post('/uploadFile/{type}/{size}','Admin\AdminFileUploadController@uploadFiles');
    
    
    Route::get('order/view/{page}/{order}','Admin\OrderController@view')->name('order_view');;
     Route::post('order/add','Admin\OrderController@add');
    Route::get('order/delete/{id}','Admin\OrderController@delete');
    Route::get('order/search/{keyword}','Admin\OrderController@search');
});
