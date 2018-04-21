<?php
    
Route::get('/', 'HomeController@show');
Route::put('/hasil', 'HomeController@process');

Route::get('/homeTimeline', function()
{
    return Twitter::getMentionsTimeline([ 'count' => 20, 'format' => 'json']);
});

?>
