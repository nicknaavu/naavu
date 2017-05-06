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

Use App\User;
Use Illuminate\Http\Request;

//HOME
Route::get('/', function(){
    return redirect('/profile');
  })->middleware('auth');
Route::get('/home', 'HomeController@index');


//SKILLS
Route::get('/edit_skill','skills@edit_skill')->name('edit_skill');
Route::post('/update_skill','skills@update_skill')->name('update_skill');
Route::post('/delete_skill','skills@delete_skill')->name('delete_skill');

//INTERESTS
Route::get('/edit_interest','interests@edit_interest')->name('edit_interest');
Route::post('/update_interest','interests@update_interest')->name('update_interest');
Route::post('/delete_interest','interests@delete_interest')->name('delete_interest');

//PROFILE
Route::get('/profile/{id}','public_pages@profile')->name('profile_by_id');
Route::get('/profile','profile@profile')->name('profile');
Route::get('/edit_profile','profile@edit_profile')->name('edit_profile');
Route::post('update_profile','profile@update_profile')->name('update_profile');

//SEARCH AND MATCHING
Route::get('/find_users','search@find_users')->name('find_users');
Route::get('/find_projects','search@find_projects')->name('find_projects');

//PROJECTS
Route::get('/project/{id}','public_pages@project')->name('project');
Route::get('/new_project','projects@new_project')->name('new_project');
Route::post('/create_project','projects@create_project')->name('create_project');
Route::get('edit_project/{id}','projects@edit_project')->name('edit_project');
Route::get('/edit_team/{id}','projects@edit_team')->name('edit_team');
Route::get('/edit_project_skills/{id}','projects@edit_project_skills')->name('edit_project_skills');
Route::post('/update_project','projects@update_project')->name('update_project');
Route::post('/update_project_skill','projects@update_project_skill')->name('update_project_skill');

//MESSAGES
Route::get('/compose_message','messaging@compose_message')->name('compose_message');
Route::post('/create_thread','messaging@create_thread')->name('create_thread');
Route::get('/view_threads','messaging@view_threads')->name('view_threads');
Route::get('/thread/{id}','messaging@thread');
Route::post('thread/add_message','messaging@add_message')->name('add_message');

//INVITATIONS / NOTIFICATIONS
Route::get('/view_notifications','notifications@view_notifications')->name('view_notifications');
Route::post('/invite_to_project','notifications@invite_to_project')->name('invite_to_project');
Route::get('/accept_invitation','notifications@accept_invitation')->name('accept_invitation');

//POSTS
Route::get('/post/{id}','posts@post')->name('post');
Route::get('/compose_post/{id}','posts@compose_post')->name('compose_post_with_id');
Route::get('/compose_post','posts@compose_post')->name('compose_post');
Route::post('/create_post','posts@create_post')->name('create_post');


//AUTH
Auth::routes();
Route::get('/logout', function(){
  Auth::logout();
  return redirect("/");
});
