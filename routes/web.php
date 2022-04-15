<?php

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\MailController;
use App\Admin;
use App\User;

Route::get('/', function(){
	return redirect('/');
});

// Site
Route::get('/', 'Velhopper\AppFaceController@index');
Route::get('/backoffice', 'Velhopper\AppFaceController@backoffice');

// Register User
Route::post('/register-user', 'Velhopper\RegisterUserController@create');
// Route::post('/register-carlo-user', 'Filimon\RegisterUserController@createUser');

// Manage Bus Units
Route::get('/manage_bus_units', 'Velhopper\ManageBusUnitsController@index')->middleware('authenticated');
Route::get('/bus_units_datatables', 'Velhopper\ManageBusUnitsController@busUnitsDtAjax');
Route::post('/add_bus_units', 'Velhopper\ManageBusUnitsController@addBusUnits')->middleware('authenticated');
Route::post('/edit_bus_units', 'Velhopper\ManageBusUnitsController@editBusUnits')->middleware('authenticated');
Route::post('/delete_bus_units', 'Velhopper\ManageBusUnitsController@deleteBusUnits')->middleware('authenticated');
Route::post('/add_trips', 'Velhopper\ManageBusUnitsController@createTrips')->middleware('authenticated');
Route::get('/trip_drivers', 'Velhopper\ManageBusUnitsController@getTripDrivers')->middleware('authenticated');
Route::get('/trip_conductors', 'Velhopper\ManageBusUnitsController@getTripConductors')->middleware('authenticated');

// Manage Travels
Route::get('/manage_schedules', 'Velhopper\ManageSchedulesController@index')->middleware('authenticated');
Route::get('/schedules_datatables', 'Velhopper\ManageSchedulesController@schedulesDtAjax');
Route::post('/add_schedules', 'Velhopper\ManageSchedulesController@addSchedules')->middleware('authenticated');
Route::post('/edit_schedules', 'Velhopper\ManageSchedulesController@editSchedules')->middleware('authenticated');
Route::post('/delete_schedules', 'Velhopper\ManageSchedulesController@deleteSchedules')->middleware('authenticated');

// Search Trips
Route::post('/search_trips', 'Velhopper\SearchTripsController@callSearchTrips');
//  Select Trip Seat
Route::get('/select_trip_seat/{id}', 'Velhopper\SelectTripSeatController@callSelectTripSeat');

// Manage Employees
Route::get('/manage_employees', 'Velhopper\ManageEmployeesController@index')->middleware('authenticated');
Route::get('/employees_datatables', 'Velhopper\ManageEmployeesController@employeesDtAjax');
Route::post('/add_employees', 'Velhopper\ManageEmployeesController@addEmployees')->middleware('authenticated');
Route::post('/edit_employees', 'Velhopper\ManageEmployeesController@editEmployees')->middleware('authenticated');
Route::post('/delete_employees', 'Velhopper\ManageEmployeesController@deleteEmployees')->middleware('authenticated');

// Manage Application
Route::get('/applications', 'Carlo\ApplicationsController@index')->middleware('authenticated');
Route::get('/applications-datatables', 'Carlo\ApplicationsController@applicationsDtAjax')->middleware('authenticated');
Route::get('/applications-form', 'Carlo\ApplicationsController@applicationsForm');
Route::get('/view-applications-form/{id}', 'Carlo\ApplicationsController@viewApplicationsForm');
Route::post('/save-applications', 'Carlo\ApplicationsController@saveApplications');
Route::post('/save_upload_application_files', 'Carlo\ApplicationsController@saveUploadApplicationFiles');

// Manage Jobs
Route::get('/manage-jobs', 'Recruitment\ManageJobsController@index')->middleware('authenticated');
Route::get('/jobs-datatables', 'Recruitment\ManageJobsController@jobsDtAjax');
Route::post('/add-job', 'Recruitment\ManageJobsController@addJob')->middleware('authenticated');
Route::post('/edit-job', 'Recruitment\ManageJobsController@editJob')->middleware('authenticated');
Route::post('/delete-job', 'Recruitment\ManageJobsController@deleteJob')->middleware('authenticated');

// Industry and Skill Filters
Route::post('/skill_filters', 'Filters\FiltersController@skillFilters');

// Manage Users
Route::get('/manage-users', 'Velhopper\ManageUsersController@index')->middleware('authenticated');
Route::get('/users-datatables', 'Velhopper\ManageUsersController@usersDtAjax')->middleware('authenticated');
Route::post('/search-users', 'Velhopper\ManageUsersController@searchUsers')->middleware('authenticated');
Route::post('/users-datatables', 'Velhopper\ManageUsersController@usersDtAjax')->middleware('authenticated');
Route::post('/edit-users', 'Velhopper\ManageUsersController@editUsers')->middleware('authenticated');
Route::post('/delete-users', 'Velhopper\ManageUsersController@deleteUsers')->middleware('authenticated');

// Manage Profile, Avatar and Documents
Route::get('/view-profile', 'Velhopper\ManageProfileController@viewProfile')->middleware('authenticated');
Route::get('/update-profile-page', 'Velhopper\ManageProfileController@updateProfilePage')->middleware('authenticated');
Route::post('/save-updated-profile', 'Velhopper\ManageProfileController@saveUpdatedProfile')->middleware('authenticated');
Route::post('/rd-edit-avatar', 'Velhopper\ManageProfileController@editAvatar')->middleware('authenticated');
Route::get('/list-of-documents', 'Velhopper\ManageProfileController@listOfDocuments');
Route::post('/rd-add-documents', 'Velhopper\ManageProfileController@addDocuments')->middleware('authenticated');
Route::post('/rd-edit-documents', 'Velhopper\ManageProfileController@editDocuments')->middleware('authenticated');
Route::post('/rd-delete-documents', 'Velhopper\ManageProfileController@deleteDocuments')->middleware('authenticated');
Route::get('/documents-datatables', 'Velhopper\ManageProfileController@documentsDtAjax')->middleware('authenticated');

// Dasboard
Route::get('/dashboard', 'UserController@dashboard')->middleware('authenticated');
Route::get('/preferences', 'UserController@full_profile');
Route::post('/preferences', 'UserController@update_avatar');

// Check email in Rergistration
Route::post('/check-email', 'CheckEmailController@emailHandler');
Route::post('/check-client-email', 'CheckEmailController@clientEmailHandler');
Route::post('/checkCredentials', 'CheckCredsController@credentialsHandler');


// Preferences
Route::get('/goToChangeAvatar', 'UserController@goToChangeAvatar');
Route::get('/profile', 'UserController@profile');

// Update Profile
Route::get('/goToEditProfile', 'UserController@edit_profile');
Route::post('/update_user', 'UserController@update_user')->middleware('authenticated');

// Update Username and Password
Route::get('/update-username-and-password', 'UserController@editUsernamePassword')->middleware('authenticated');
Route::post('/save-updated-username-and-password', 'UserController@saveUpdatedUsernamePassword')->middleware('authenticated');

// Route::get('/upload-avatar', 'UserController@profile');
Route::post('/upload-avatar', 'UserController@update_avatar')->middleware('authenticated');

// Users and Admin 
Route::prefix('admin')->group(function() {
// Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
// Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

// Users 
Route::get('/list-of-users', 'Auth\AdminPreferencesController@listOfUsers')->middleware('authenticated');
Route::post('/save-edited-users', 'Auth\AdminPreferencesController@saveEditedUsers')->middleware('authenticated');
Route::post('/delete-users', 'Auth\AdminPreferencesController@deleteUsers')->middleware('authenticated');

// Admin Preferences
Route::get('/admin_dashboard', 'Auth\AdminPreferencesController@index')->middleware('authenticated');
Route::get('/admin_skills_page', 'Auth\AdminPreferencesController@addSkillsPage')->middleware('authenticated');
Route::post('/admin-add-skills', 'Auth\AdminPreferencesController@addSkills')->middleware('authenticated');
Route::get('/list-of-skills', 'Auth\AdminPreferencesController@listOfSkills')->middleware('authenticated');
Route::get('/list-of-services-details', 'Auth\AdminPreferencesController@listOfServicesDetails')->middleware('authenticated');
Route::post('/save-edited-skills', 'Auth\AdminPreferencesController@saveEditedSkills')->middleware('authenticated');
Route::post('/delete-skill-service', 'Auth\AdminPreferencesController@deleteSkills')->middleware('authenticated');

// Create Client Account
Route::post('/create-client-account', 'Transactions\BtTransactionsController@createClientAccount');

// Count Transactions and Notifications
Route::get('/count-book-notifications', 'Transactions\CountBookingsController@countBookNotifications')->middleware('authenticated');
Route::get('/drop-down-list-of-notifications', 'Transactions\CountBookingsController@dropDownListOfBookings')->middleware('authenticated');

Route::get('/booking-per-customer/{id}', 'Transactions\CountBookingsController@bookingPerCustomer')->middleware('authenticated');
Route::post('/read-customer-booking/{id}', 'Transactions\CountBookingsController@readCustomerBooking')->middleware('authenticated');
Route::post('/save-accepted-booking', 'Transactions\CountBookingsController@saveAcceptedBooking')->middleware('authenticated');

//Count Customer Notifications
Route::get('/cust-count-book-notifications', 'Transactions\CountBookingsController@customerCountBookNotifications')->middleware('authenticated');
Route::get('/cust-drop-down-list-of-notifications', 'Transactions\CountBookingsController@customerDropDownListOfBookings')->middleware('authenticated');
Route::post('/cust-read-customer-booking/{id}', 'Transactions\CountBookingsController@custReadCustomerBooking')->middleware('authenticated');
Route::post('/cust-save-accepted-booking', 'Transactions\CountBookingsController@custSaveAcceptedBooking')->middleware('authenticated');

// Forgot Password
Route::post('/password-email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email_reset');
Route::get('/forgot-password', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/reset-forgot-password', 'Auth\ResetPasswordController@reset');
Route::post('/reset-forgot-password/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

// Mail
// Route::get('email', [App\Http\Controllers\MailController::class, 'mailView'])->name('mailView');
// Route::post('/send-mail', [MailController::class, 'mailSend'])->name('mailSend');

Route::get('/mail', 'MailController@mailView');
Route::post('/send-mail', 'MailController@mailSend')->name('mailSend');

// Send Email
Route::get('/application-mail', 'ApplicationMailController@applicationMailView');
Route::post('/application-send-mail', 'ApplicationMailController@applicationMailSend')->name('applicationMailSend');

Route::get('/application-mail', 'ApplicationMailController@applicationMailView');
Route::post('/application-send-mail', 'ApplicationMailController@applicationMailSend')->name('applicationMailSend');

Route::get('/survey-mail', 'SurveyMailController@surveyMailView');
Route::post('/survey-send-mail', 'SurveyMailController@surveyMailSend')->name('surveyMailSend');

Auth::routes();






