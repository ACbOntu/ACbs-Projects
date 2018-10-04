<?php
/**
 * User Routes
 */
Route::get('/', 'Frontend\PageController@index')->name('index');
Route::get('/find-consultant', 'Frontend\PageController@findConsultantForm')->name('findConsultantForm');
Route::post('/consultant-list', 'Frontend\PageController@consultantList')->name('consultantList');
Route::get('/consultant/{username}', 'Frontend\PageController@singleDoctor')->name('singleDoctor');
Route::get('/take-appoinment/{username}', 'Frontend\AppointmentController@takeAppointment')->name('takeAppointment');
Route::post('/take-appoinment', 'Frontend\AppointmentController@submitAppoinment')->name('submitAppoinment');
Route::get('/notice/{slug}', 'Frontend\NoticeController@singleNotice')->name('singleNotice');
Route::get('/circular/{slug}', 'Frontend\NoticeController@singleCircular')->name('singleCircular');
Route::get('/department/{dept_name}', 'Frontend\PageController@department')->name('department');
//Route::get('/department/{slug}', 'Frontend\DoctorController@departmentDoctor')->name('departmentDoctor');
Route::get('/branch/{id}', 'Frontend\PageController@branch')->name('branch');
// Route::get('/branch/{branch_id}/{dept_id}', 'Frontend\PageController@departmentBranch')->name('branchDepartment');
Route::get('/query','Frontend\PageController@query')->name('query');
Route::post('/query-submit','Frontend\PageController@querySubmit')->name('patient.query.submit');
Route::get('/circular','Frontend\PageController@circular')->name('circular');






/**
 * Patient Routes
 */
Route::group(['prefix' => 'patient'], function(){
  Route::get('/login', 'Auth\Patient\LoginController@showLoginForm')->name('patient.login');
  Route::post('/login', 'Auth\Patient\LoginController@login')->name('patient.login.submit');
  
  Route::post('/logout', 'Auth\Patient\LoginController@logout')->name('patient.logout');
  Route::get('/registration', 'Auth\Patient\RegisterController@patientRegistration')->name('patient.registration');
  Route::post('/register', 'Auth\Patient\RegisterController@register')->name('patient.register.submit');

  //Password resets routes
  Route::post('/password/email', 'Auth\Patient\ForgotPasswordController@sendResetLinkEmail')->name('patient.password.email');
  Route::get('/password/reset', 'Auth\Patient\ForgotPasswordController@showLinkRequestForm')->name('patient.password.request');
  Route::post('/password/reset', 'Auth\Patient\ResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\Patient\ResetPasswordController@showResetForm')->name('patient.password.reset');

  Route::get('/', 'Frontend\PatientController@index')->name('patient.dashboard');
});



/**
* Admin Routes
*/
Route::group(['prefix' => 'admin'], function(){
  Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
  Route::post('/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');
  Route::get('/messages/{id}', 'Backend\PageController@messages')->name('admin.messages');
  //Password resets routes
  Route::post('/password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

  Route::get('/', 'Backend\PageController@index')->name('admin.dashboard');


  // Branch Route
  Route::group(['prefix' => 'branch'], function(){
    Route::get('/', 'Backend\BranchController@index')->name('admin.branch.index');
    Route::post('/add', 'Backend\BranchController@store')->name('admin.branch.store');
    Route::post('/edit/{id}', 'Backend\BranchController@update')->name('admin.branch.update');
    Route::post('/delete/{id}', 'Backend\BranchController@destroy')->name('admin.branch.delete');
  });

  // Department Route
  Route::group(['prefix' => 'department'], function(){
    Route::get('/', 'Backend\DepartmentController@index')->name('admin.department.index');
    Route::post('/add', 'Backend\DepartmentController@store')->name('admin.department.store');
    Route::post('/edit/{id}', 'Backend\DepartmentController@update')->name('admin.department.update');
    Route::post('/delete/{id}', 'Backend\DepartmentController@destroy')->name('admin.department.delete');
  });

  // Notice Route
  Route::group(['prefix' => 'notice'], function(){
    Route::get('/', 'Backend\NewsCircularController@index')->name('admin.news.index');
    Route::get('/add', 'Backend\NewsCircularController@create')->name('admin.news.create');
    Route::post('/add', 'Backend\NewsCircularController@store')->name('admin.news.store');
    Route::get('/edit/{id}', 'Backend\NewsCircularController@edit')->name('admin.news.edit');
    Route::post('/edit/{id}', 'Backend\NewsCircularController@update')->name('admin.news.update');
    Route::post('/delete/{id}', 'Backend\NewsCircularController@destroy')->name('admin.news.delete');
    Route::get('/hide/{id}', 'Backend\NewsCircularController@hide')->name('admin.news.hide');
    Route::get('/publish/{id}', 'Backend\NewsCircularController@publish')->name('admin.news.publish');
  });

  // Department Route
  Route::group(['prefix' => 'about'], function(){
    Route::get('/', 'Backend\AboutController@index')->name('admin.about.index');
    Route::post('/add', 'Backend\AboutController@store')->name('admin.about.store');
    Route::post('/edit/{id}', 'Backend\AboutController@update')->name('admin.about.update');
    Route::post('/delete/{id}', 'Backend\AboutController@destroy')->name('admin.about.delete');
  });

  // Staff Route
  Route::group(['prefix' => 'staff'], function(){
    Route::get('/', 'Backend\StaffController@index')->name('admin.staff.index');
    Route::get('/add', 'Backend\StaffController@create')->name('admin.staff.create');
    Route::post('/add', 'Backend\StaffController@store')->name('admin.staff.store');
    Route::get('/edit/{id}', 'Backend\StaffController@edit')->name('admin.staff.edit');
    Route::post('/edit/{id}', 'Backend\StaffController@update')->name('admin.staff.update');
    Route::post('/delete/{id}', 'Backend\StaffController@destroy')->name('admin.staff.delete');
  });

  // Doctor Route
  Route::group(['prefix' => 'doctor'], function(){
    Route::get('/', 'Backend\DoctorController@index')->name('admin.doctor.index');
    Route::get('/add', 'Backend\DoctorController@create')->name('admin.doctor.create');
    Route::post('/add', 'Backend\DoctorController@store')->name('admin.doctor.store');
    Route::get('/edit/{id}', 'Backend\DoctorController@edit')->name('admin.doctor.edit');
    Route::post('/edit/{id}', 'Backend\DoctorController@update')->name('admin.doctor.update');
    Route::post('/delete/{id}', 'Backend\DoctorController@destroy')->name('admin.doctor.delete');
  });

  // Contact Route
  Route::group(['prefix' => 'contact'], function(){
    Route::get('/', 'Backend\ContactController@index')->name('admin.contact.index');
    Route::post('/reply', 'Backend\ContactController@replyMessage')->name('replyMessage');
    Route::post('/delete/{id}', 'Backend\ContactController@destroy')->name('admin.contact.delete');
  });

  // Appointment Route
  Route::group(['prefix' => 'appointment'], function(){
    Route::get('/completed', 'Backend\AppointmentController@completed')->name('admin.appointment.completed');
    Route::get('/uncompleted', 'Backend\AppointmentController@uncompleted')->name('admin.appointment.uncompleted');
    Route::get('/complete/{id}', 'Backend\AppointmentController@completeService')->name('admin.appointment.completeService');
    Route::get('/uncomplete/{id}', 'Backend\AppointmentController@uncompleteService')->name('admin.appointment.uncompleteService');
    Route::post('/delete/{id}', 'Backend\AppointmentController@destroy')->name('admin.appointment.delete');
  });

});
