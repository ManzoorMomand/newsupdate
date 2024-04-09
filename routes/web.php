<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\SubCategoryController;
use App\Http\Controllers\Admin\AdminAdvertisementController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminSubCotegoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\controllers\Admin\AdminPageController;
use App\Http\controllers\Admin\AdminOnlinPollController;
use App\Http\controllers\Admin\AdminLiveChannelController;
use App\Http\controllers\Admin\AdminSocialItemController;
use App\Http\controllers\Admin\AdminAuthorController;
use App\Http\controllers\Front\loginController;
use App\Http\controllers\Author\AuthorHomeController;
use App\Http\controllers\Author\AuthorLoginController;
use App\Http\controllers\Author\AuthorProfileController;
use App\Http\controllers\Author\AuthorPostController;
use App\Http\controllers\ContactController;





Route::get('/', function () {
    return view('welcome');
});
/* front end */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/subcategory-by-category/{id}', [HomeController::class, 'get_subcategory_by_category'])
->name('subcategory-by-category');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/news-detail/{id}', [PostController::class, 'detail'])->name('post_detail');
Route::get('/news-category/{id}', [SubCategoryController::class, 'index'])->name('category');
Route::get('/photo/', [HomeController::class, 'photo'])->name('photo');
Route::get('/Video/', [HomeController::class, 'Video'])->name('video');
Route::get('/search/result', [HomeController::class, 'search'])->name('search_result');

Route::post('/poll/', [HomeController::class, 'poll'])->name('online_poll');
Route::get('/poll-result/', [HomeController::class, 'poll_result'])->name('poll');
Route::get('/tag/{tag_name}/', [HomeController::class, 'tag'])->name('tag_show');

Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/admin/contact', [ContactController::class, 'index'])->name('contact.index');
Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
Route::get('/admin/contact/show', [ContactController::class, 'show'])->name('admin_contact_show')->middleware('admin:admin');


/* Admin */
Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home')->middleware('admin:admin');
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
Route::get('/admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
Route::post('/admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');

//Author
Route::get('/login/', [loginController::class, 'index'])->name('login');


Route::get('/author/home', [AuthorHomeController::class, 'index'])->name('author_home')->middleware('author:author');
Route::get('/author/login', [AuthorLoginController::class, 'index'])->name('author_login');
Route::post('/author/login-submit', [AuthorLoginController::class, 'login_submit'])->name('author_login_submit');
Route::get('/author/logout', [AuthorLoginController::class, 'logout'])->name('author_logout');
Route::get('/author/forget-password', [AuthorLoginController::class, 'forget_password'])->name('author_forget_password');
Route::post('/author/forget-password-submit', [AuthorLoginController::class, 'forget_password_submit'])->name('author_forget_password_submit');
Route::get('/author/reset-password/{token}/{email}', [AuthorLoginController::class, 'reset_password'])->name('author_reset_password');
Route::post('/author/reset-password-submit', [AuthorLoginController::class, 'reset_password_submit'])->name('author_reset_password_submit');
Route::get('/author/edit-profile', [AuthorProfileController::class, 'index'])->name('author_profile')->middleware('author:author');
Route::post('/author/edit-profile-submit', [AuthorProfileController::class, 'profile_submit'])->name('author_profile_submit');
Route::get('/author/Post/tag/delete/{id}/{id1}', [AuthorLoginController::class, 'delete_tag'])
    ->name('author_post_delete_tag')
    ->middleware('author:author');



Route::get('/admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_profile')->middleware('admin:admin');
Route::post('/admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');
Route::get('/admin/home-advertisement', [AdminAdvertisementController::class, 'home_ad_show'])->name('admin_home_ad_show')->middleware('admin:admin');
Route::post('/admin/home-advertisement-update', [AdminAdvertisementController::class, 'home_ad_update'])->name('admin_home_ad_update');

Route::get('/admin/top-advertisement', [AdminAdvertisementController::class, 'top_ad_show'])->name('admin_top_ad_show')->middleware('admin:admin');
Route::post('/admin/top-advertisement-update', [AdminAdvertisementController::class, 'top_ad_update'])->name('admin_top_ad_update');


Route::get('/admin/sidebar-advertisement', [AdminAdvertisementController::class, 'sidebar_ad_show'])->name('admin_sidebar_ad_show')->middleware('admin:admin');
Route::get('/admin/sidebar-advertisement_create', [AdminAdvertisementController::class, 'sidebar_ad_create'])->name('admin_sidebar_ad_create')->middleware('admin:admin');
Route::post('/admin/sidebar-advertisement-store', [AdminAdvertisementController::class, 'sidebar_ad_store'])->name('admin_sidebar_ad_store');

Route::get('/admin/sidebar-advertisement-edit/{id}', [AdminAdvertisementController::class, 'sidebar_ad_edit'])->name('admin_sidebar_ad_edit')->middleware('admin:admin');
Route::post('/admin/sidebar-advertisement-update/{id}', [AdminAdvertisementController::class, 'sidebar_ad_update'])->name('admin_sidebar_ad_update');
Route::get('/admin/sidebar-advertisement-Delete/{id}', [AdminAdvertisementController::class, 'sidebar_ad_delete'])->name('admin_sidebar_ad_delete')->middleware('admin:admin');

Route::get('/admin/category/show', [AdminCategoryController::class, 'category_show'])->name('admin_category_show')->middleware('admin:admin');
Route::get('/admin/category/create', [AdminCategoryController::class, 'category_create'])->name('admin_category_create')->middleware('admin:admin');


Route::post('/admin/Category-store', [AdminCategoryController::class, 'category_store'])->name('admin_category_store');
Route::get('/admin/Category-edit/{id}', [AdminCategoryController::class, 'Category_edit'])->name('admin_Category_edit')->middleware('admin:admin');
Route::post('/admin/Category-update/{id}', [AdminCategoryController::class, 'Category_update'])->name('admin_Category_update');
Route::get('/admin/Category-Delete/{id}', [AdminCategoryController::class, 'Category_delete'])->name('admin_Category_delete')->middleware('admin:admin');


Route::get('/admin/sub-category/show', [AdminSubCotegoryController::class, 'sub_ategory_show'])->name('admin_sub_category_show')->middleware('admin:admin');
Route::get('/admin/sub-category/create', [AdminSubCotegoryController::class, 'sub_category_create'])->name('admin_sub_category_create')->middleware('admin:admin');


Route::post('/admin/sub-Category-store', [AdminSubCotegoryController::class, 'sub_category_store'])->name('admin_sub_category_store');
Route::get('/admin/sub-Category-edit/{id}', [AdminSubCotegoryController::class, 'sub_Category_edit'])->name('admin_sub_Category_edit')->middleware('admin:admin');
Route::post('/admin/sub-Category-update/{id}', [AdminSubCotegoryController::class, 'sub_Category_update'])->name('admin_sub_Category_update');
Route::get('/admin/sub-Category-Delete/{id}', [AdminSubCotegoryController::class, 'sub_Category_delete'])->name('admin_sub_Category_delete')->middleware('admin:admin');


Route::get('/admin/Post/show', [AdminPostController::class, 'post_show_ajax'])->name('admin_post_show_ajax')->middleware('admin:admin');
Route::post('/admin/Post-store', [AdminPostController::class, 'post_store_ajax'])->name('admin_post_store_ajax');


Route::get('/admin/Post-edit/{id}', [AdminPostController::class, 'post_edit_ajax'])->name('admin_post_edit_ajax')->middleware('admin:admin');
Route::get('/admin/Post-create', [AdminPostController::class, 'post_create_ajax'])->name('admin_post_create_ajax')->middleware('admin:admin');
Route::post('/admin/Post-update/{id}', [AdminPostController::class, 'post_update_ajax'])->name('admin_post_update_ajax');
Route::get('/admin/Post-Delete/{id}', [AdminPostController::class, 'post_delete_ajax'])->name('admin_post_delete_ajax')->middleware('admin:admin');


Route::get('/admin/Post/tag/delete/{id}/{id1}', [AdminPostController::class, 'delete_tag'])
    ->name('admin_post_delete_tag')
    ->middleware('admin:admin');

Route::get('/admin/setting', [AdminSettingController::class, 'index'])->name('admin_setting')->middleware('admin:admin');
Route::post('/admin/setting-update/{id}', [AdminSettingController::class, 'update'])->name('admin_setting_update');

//photo

Route::get('/admin/photo/show', [AdminPhotoController::class, 'show'])->name('admin_photo_show')->middleware('admin:admin');
Route::get('/admin/photo/create', [AdminPhotoController::class, 'create'])->name('admin_photo_create')->middleware('admin:admin');
Route::post('/admin/photo-store', [AdminPhotoController::class, 'store'])->name('admin_photo_store');
Route::get('/admin/photo-edit/{id}', [AdminPhotoController::class, 'edit'])->name('admin_photo_edit')->middleware('admin:admin');
Route::post('/admin/photo-update/{id}', [AdminPhotoController::class, 'update'])->name('admin_photo_update');
Route::get('/admin/photo-Delete/{id}', [AdminPhotoController::class, 'delete'])->name('admin_photo_delete')->middleware('admin:admin');

//video

Route::get('/admin/video/show', [AdminVideoController::class, 'show'])->name('admin_video_show')->middleware('admin:admin');
Route::get('/admin/video/create', [AdminVideoController::class, 'create'])->name('admin_video_create')->middleware('admin:admin');
Route::post('/admin/video-store', [AdminVideoController::class, 'store'])->name('admin_video_store');
Route::get('/admin/video-edit/{id}', [AdminVideoController::class, 'edit'])->name('admin_video_edit')->middleware('admin:admin');
Route::post('/admin/video-update/{id}', [AdminVideoController::class, 'update'])->name('admin_video_update');
Route::get('/admin/video-Delete/{id}', [AdminVideoController::class, 'delete'])->name('admin_video_delete')->middleware('admin:admin');

//online poll

Route::get('/admin/online-poll/show', [AdminOnlinPollController::class, 'show'])->name('admin_online_poll_show')->middleware('admin:admin');
Route::get('/admin/online-poll/create', [AdminOnlinPollController::class, 'create'])->name('admin_online_poll_create')->middleware('admin:admin');
Route::post('/admin/online-poll-store', [AdminOnlinPollController::class, 'store'])->name('admin_online_poll_store');
Route::get('/admin/online-poll-edit/{id}', [AdminOnlinPollController::class, 'edit'])->name('admin_online_poll_edit')->middleware('admin:admin');
Route::post('/admin/online-poll-update/{id}', [AdminOnlinPollController::class, 'update'])->name('admin_online_poll_update');
Route::get('/admin/online-poll-Delete/{id}', [AdminOnlinPollController::class, 'delete'])->name('admin_online_poll_delete')->middleware('admin:admin');

//live channel

Route::get('/admin/live/show', [AdminLiveChannelController::class, 'show'])->name('admin_live_show')->middleware('admin:admin');
Route::get('/admin/live/create', [AdminLiveChannelController::class, 'create'])->name('admin_live_create')->middleware('admin:admin');
Route::post('/admin/live-store', [AdminLiveChannelController::class, 'store'])->name('admin_live_store');
Route::get('/admin/live-edit/{id}', [AdminLiveChannelController::class, 'edit'])->name('admin_live_edit')->middleware('admin:admin');
Route::post('/admin/live-update/{id}', [AdminLiveChannelController::class, 'update'])->name('admin_live_update');
Route::get('/admin/live-Delete/{id}', [AdminLiveChannelController::class, 'delete'])->name('admin_live_delete')->middleware('admin:admin');

// social media 
Route::get('/admin/social/show', [AdminSocialItemController::class, 'show'])->name('admin_social_item_show')->middleware('admin:admin');
Route::get('/admin/social/create', [AdminSocialItemController::class, 'create'])->name('admin_social_item_create')->middleware('admin:admin');
Route::post('/admin/social-store', [AdminSocialItemController::class, 'store'])->name('admin_social_item_store');
Route::get('/admin/social-edit/{id}', [AdminSocialItemController::class, 'edit'])->name('admin_social_item_edit')->middleware('admin:admin');
Route::post('/admin/social-update/{id}', [AdminSocialItemController::class, 'update'])->name('admin_social_item_update');
Route::get('/admin/social-Delete/{id}', [AdminSocialItemController::class, 'delete'])->name('admin_social_item_delete')->middleware('admin:admin');


//pages
Route::get('/admin/page/show', [AdminPageController::class, 'about_show'])->name('admin_page_show')->middleware('admin:admin');
Route::post('/admin/page/{id}/update', [AdminPageController::class, 'update'])->name('admin_page_update');

//faq
Route::get('/admin/faq/show', [AdminPageController::class, 'faq_show'])->name('admin_faq_show')->middleware('admin:admin');
Route::post('/admin/faq/{id}/update', [AdminPageController::class, 'faq_update'])->name('admin_faq_update');

//Terms and Condition 
Route::get('/admin/terms/show', [AdminPageController::class, 'term_show'])->name('admin_term_show')->middleware('admin:admin');
Route::post('/admin/terms/{id}/update', [AdminPageController::class, 'term_update'])->name('admin_terms_update');

//Privacy policy  
Route::get('/admin/privacy-palicy/show', [AdminPageController::class, 'policy_show'])->name('admin_policy_show')->middleware('admin:admin');
Route::post('/admin/privacy-palicy/{id}/update', [AdminPageController::class, 'policy_update'])->name('admin_policy_update');


//Disclaimer   
Route::get('/admin/disclaimer/show', [AdminPageController::class, 'disclaimer_show'])->name('admin_disclaimer_show')->middleware('admin:admin');
Route::post('/admin/disclaimer/{id}/update', [AdminPageController::class, 'disclaimer_update'])->name('admin_disclaimer_update');


//Login   
Route::get('/admin/login/show', [AdminPageController::class, 'login_show'])->name('admin_login_show')->middleware('admin:admin');
Route::post('/admin/login/{id}/update', [AdminPageController::class, 'login_update'])->name('admin_login_update');

//Contact   
Route::get('/admin/contact/show', [AdminPageController::class, 'contact_show'])->name('admin_contact_show')->middleware('admin:admin');
Route::post('/admin/contact/{id}/update', [AdminPageController::class, 'contact_update'])->name('admin_contact_update');
//author
Route::get('/admin/author/show/user', [AdminAuthorController::class, 'show'])->name('admin_author_user_show')->middleware('admin:admin');
Route::get('/admin/author/create', [AdminAuthorController::class, 'create'])->name('admin_author_create')->middleware('admin:admin');
Route::post('/admin/author/store', [AdminAuthorController::class, 'store'])->name('admin_author_store');
Route::get('/admin/author-edit/{id}', [AdminAuthorController::class, 'edit'])->name('admin_author_edit')->middleware('admin:admin');
Route::post('/admin/author-update/{id}', [AdminAuthorController::class, 'update'])->name('admin_author_update');
Route::get('/admin/authorl-Delete/{id}', [AdminAuthorController::class, 'delete'])->name('admin_author_delete')->middleware('admin:admin');

//author post 

Route::get('/author/Post/show', [AuthorPostController::class, 'post_show'])->name('author_post_show')->middleware('author:author');
Route::get('/author/Post/create', [AuthorPostController::class, 'post_create'])->name('author_post_create')->middleware('author:author');

Route::post('/author/Post-store', [AuthorPostController::class, 'post_store'])->name('author_post_store');
Route::get('/author/Post-edit/{id}', [AuthorPostController::class, 'post_edit'])->name('author_post_edit')->middleware('author:author');
Route::post('/author/Post-update/{id}', [AuthorPostController::class, 'post_update'])->name('author_post_update');
Route::get('/author/Post-Delete/{id}', [AuthorPostController::class, 'post_delete'])->name('author_post_delete')->middleware('author:author');
// Route::get('delete-post/{id}/{id1}', 'App\Http\Controllers\AdminPostController@delete_tag')
// ->name('author_post_delete_tag');