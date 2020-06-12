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

Route::get('/', function() {
    return view('landing');
}) ->name('landing');

Route::group(['middleware' => ['auth']], function () {

    // Search

    Route::get('search', function () {

        return view('Search/index');
    });

    // Trips

    Route::get('trip/create', "Trip\TripController@create")->name('trip.create');

    Route::get('trip/{id}', "Trip\TripController@show")->name('trip.show');

    Route::post('trip/store', "Trip\TripController@store")->name('trip.store');

    Route::get('trip/{id}/edit', "Trip\TripController@edit")->middleware('checkTrip')->name('trip.edit');

    Route::put('trip/{id}', "Trip\TripController@update")->name('trip.update');

    Route::delete('trip/{id}', "Trip\TripController@destroy")->name('trip.destroy');

    Route::get('trip/{tripId}/confirm/{userId}', 'Trip\TripController@confirmPresence')->name('trip.confirmPresence');

    Route::get('trip/{tripId}/accept/{userId}', 'Trip\TripController@acceptPresence')->name('trip.acceptPresence');

    Route::get('trip/{tripId}/cancel/{userId}', 'Trip\TripController@cancelPresence')->name('trip.cancelPresence');

    Route::get('trip/{id}/members', 'Trip\TripController@tripMembersIndex')->name('trip.membersIndex');

    Route::get ('groupsandtrips', 'User\UserController@listGroupsAndTrips')->name('user.listGroupsAndTrips');

    Route::get('timeline', 'Trip\TripController@timeline')->name('trip.timeline');

    // User

    Route::get ('/home', 'User\UserController@home')->name('home');

    Route::get ('/profile/{id}', 'User\UserController@show')->name('user.show');

    Route::get('/profile/{id}/edit' , 'User\UserController@edit')->middleware('checkUser')->name('user.edit');

    Route::get('profile/trips/index', "Trip\TripController@index")->name('user.trips.index');

    Route::get('profile/groups/index', "Group\GroupController@index")->name('user.groups.index');

    Route::put('/profile/{id}' , 'User\UserController@update')->name('user.update');

    Route::delete('/profile/{id}/delete', 'User\UserController@destroy')->name('user.delete');

    Route::get('/profile/friendship/add/{requestedUserID}', 'User\UserController@friendshipAdd')->name('friendship.add');

    Route::get('/profile/friendship/{requestedUserID}/accept', 'User\UserController@friendshipAccept')->name('friendship.accept');

    Route::get('/profile/friendship/cancel/{requestedUserID}', 'User\UserController@friendshipCancel')->name('friendship.cancel');

    Route::get('/profile/friendship/{requestedUserID}/delete', 'User\UserController@friendshipDelete')->name('friendship.delete');

    Route::get('/profile/{id}/friendship/index/', 'User\UserController@friendshipIndex')->name('friendship.index');

    // Groups

    Route::get('group/create', 'Group\GroupController@create')->name('group.create');

    Route::post('group/store', 'Group\GroupController@store')->name('group.store');

    Route::get('group/{id}/edit', 'Group\GroupController@edit')->name('group.edit');;

    Route::get('group/{id}', 'Group\GroupController@show')->name('group.show');;

    Route::put('group/{id}', 'Group\GroupController@update')->name('group.update');

    Route::delete('group/{id}', "Group\GroupController@destroy")->name('group.destroy');

    Route::get('group/{groupId}/confirm/{userId}', 'Group\GroupController@confirmPresence')->name('group.confirmPresence');

    Route::get('group/{groupId}/accept/{userId}', 'Group\GroupController@acceptPresence')->name('group.acceptPresence');

    Route::get('group/{groupId}/cancel/{userId}', 'Group\GroupController@cancelPresence')->name('group.cancelPresence');

    Route::get('/group/{id}/members', 'Group\GroupController@groupMembersIndex')->name('group.membersIndex');

    // Topics

    Route::get('{group_id}/topic/index', 'Group\TopicController@index')->name('topic.index');

    Route::post('{group_id}/topic/store', 'Group\TopicController@store')->name('topic.store');

    Route::get('topicLike/{id}', 'Group\TopicController@likeTopic')->name('topic.like');

    Route::get('topicDislike/{id}', 'Group\TopicController@dislikeTopic')->name('topic.dislike');

    Route::get('topic/{id}/edit', 'Group\TopicController@edit')->name('topic.edit');

    Route::put('topic/{id}', 'Group\TopicController@update')->name('topic.update');

    Route::delete('topic/{id}', 'Group\TopicController@destroy')->name('topic.destroy');

    Route::get('topic/{id}', 'Group\TopicController@show')->name('topic.show');

    // Topic Messages

    Route::get('topicMessageLike/{id}', 'Group\TopicMessageController@likeTopicMessage')->name('topicMessage.like');

    Route::get('topicMessageDislike/{id}', 'Group\TopicMessageController@dislikeTopicMessage')->name('topicMessage.dislike');

    Route::post('{topic_id}/topicMessage/store', 'Group\TopicMessageController@store')->name('topicMessage.store');

    Route::get('topicMessage/{id}/edit', 'Group\TopicMessageController@edit')->name('topicMessage.edit');

    Route::put('topicMessage/{id}', 'Group\TopicMessageController@update')->name('topicMessage.update');

    Route::delete('{topic_id}/topicMessage/{id}', 'Group\TopicMessageController@destroy')->name('topicMessage.destroy');

    // Search

    Route::get('search/', 'Search\SearchController@show')->name('search.show');

    // Achievements
    Route::get('/classificacao', function() {
        return view('Achievements/show');
    });


});



// Route::get('/classificacao', function() {
//     return view('Achievements/show');
// });

// Route::get('/mensagens', function() {
//     $footer = 'true';
//     return view('/user/messages/create', compact('footer'));
// });

// Route::get('/notificacoes', function() {
//     return view('user/notificacoes');
// });

// Route::get('/novaMensagem', function() {
//     return view('user/messages/create');
// });

// Route::get('/verMensagem', function() {
//     return view('user/messages/index');
// });

Auth::routes();


