<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'FrontEndController@index')->name('home');
Route::get('/contact', 'FrontEndController@contact')->name('contact');
Route::get('/about', 'FrontEndController@about')->name('about');
Route::get('/faq', 'FrontEndController@faq')->name('faq');
Route::get('/career', 'FrontEndController@jobs')->name('career');
Route::get('/properties', 'FrontEndController@lisitng')->name('listing');
Route::get('buy/properties', 'FrontEndController@lisitng')->name('buy');
Route::get('rent/properties', 'FrontEndController@lisitng')->name('rent');
Route::get('projects/properties', 'FrontEndController@lisitng')->name('projects');
Route::get('blogs/', 'FrontEndController@blogs')->name('blog');
Route::get('blogs/{slug}', 'FrontEndController@blogDetail')->name('blogDetail');
Route::get('developers', 'FrontEndController@developers')->name('developers');


Route::get('properties/{slug}', 'FrontEndController@property')->name('property');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }
    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    Route::delete('jobopenings/{jobOpening}', 'JobOpeningController@destroy')->name('jobopenings.destroy');
    Route::get('jobopenings/{jobOpening}/edit', 'JobOpeningController@edit')->name('jobopenings.edit');
    Route::put('jobopenings/{jobOpening}', 'JobOpeningController@update')->name('jobopenings.update');
    Route::resource('jobopenings', 'JobOpeningController');

    Route::get('job-applications', 'JobApplicationController@index')->name('job-applications.index');
    Route::get('job-applications/{id}', 'JobApplicationController@show')->name('job-applications.show');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::post('contacts/media', 'ContactController@storeMedia')->name('contacts.storeMedia');
    Route::post('contacts/ckmedia', 'ContactController@storeCKEditorImages')->name('contacts.storeCKEditorImages');
    Route::resource('contacts', 'ContactController', ['except' => ['create', 'store']]);

    // Faq
    Route::delete('faqs/destroy', 'FaqController@massDestroy')->name('faqs.massDestroy');
    Route::resource('faqs', 'FaqController');

    // Blog
    Route::delete('blogs/destroy', 'BlogController@massDestroy')->name('blogs.massDestroy');
    Route::post('blogs/media', 'BlogController@storeMedia')->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', 'BlogController@storeCKEditorImages')->name('blogs.storeCKEditorImages');
    Route::resource('blogs', 'BlogController');

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Sale
    Route::delete('sales/destroy', 'SaleController@massDestroy')->name('sales.massDestroy');
    Route::post('sales/media', 'SaleController@storeMedia')->name('sales.storeMedia');
    Route::post('sales/ckmedia', 'SaleController@storeCKEditorImages')->name('sales.storeCKEditorImages');
    Route::post('sales/parse-csv-import', 'SaleController@parseCsvImport')->name('sales.parseCsvImport');
    Route::post('sales/process-csv-import', 'SaleController@processCsvImport')->name('sales.processCsvImport');
    Route::resource('sales', 'SaleController');

    // For Rent
    Route::delete('for-rents/destroy', 'ForRentController@massDestroy')->name('for-rents.massDestroy');
    Route::resource('for-rents', 'ForRentController');

    // Property Type
    Route::delete('property-types/destroy', 'PropertyTypeController@massDestroy')->name('property-types.massDestroy');
    Route::post('property-types/media', 'PropertyTypeController@storeMedia')->name('property-types.storeMedia');
    Route::post('property-types/ckmedia', 'PropertyTypeController@storeCKEditorImages')->name('property-types.storeCKEditorImages');
    Route::resource('property-types', 'PropertyTypeController');

    // Developer
    Route::delete('developers/destroy', 'DeveloperController@massDestroy')->name('developers.massDestroy');
    Route::post('developers/media', 'DeveloperController@storeMedia')->name('developers.storeMedia');
    Route::post('developers/ckmedia', 'DeveloperController@storeCKEditorImages')->name('developers.storeCKEditorImages');
    Route::resource('developers', 'DeveloperController');
    // Amenities
    Route::delete('amenities/destroy', 'AmenitiesController@massDestroy')->name('amenities.massDestroy');
    Route::post('amenities/media', 'AmenitiesController@storeMedia')->name('amenities.storeMedia');
    Route::post('amenities/ckmedia', 'AmenitiesController@storeCKEditorImages')->name('amenities.storeCKEditorImages');
    Route::resource('amenities', 'AmenitiesController');

    // New Project
    Route::delete('new-projects/destroy', 'NewProjectController@massDestroy')->name('new-projects.massDestroy');
    Route::resource('new-projects', 'NewProjectController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::post('teams/media', 'TeamController@storeMedia')->name('teams.storeMedia');
    Route::post('teams/ckmedia', 'TeamController@storeCKEditorImages')->name('teams.storeCKEditorImages');
    Route::resource('teams', 'TeamController');

    // Our Services
    Route::delete('our-services/destroy', 'OurServicesController@massDestroy')->name('our-services.massDestroy');
    Route::post('our-services/media', 'OurServicesController@storeMedia')->name('our-services.storeMedia');
    Route::post('our-services/ckmedia', 'OurServicesController@storeCKEditorImages')->name('our-services.storeCKEditorImages');
    Route::resource('our-services', 'OurServicesController');

    // Viewings
    Route::delete('viewings/destroy', 'ViewingsController@massDestroy')->name('viewings.massDestroy');
    Route::resource('viewings', 'ViewingsController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
