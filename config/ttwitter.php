<?php

return [
	'debug'               => function_exists('env') ? env('APP_DEBUG', false) : false,

	'API_URL'             => 'api.twitter.com',
	'UPLOAD_URL'          => 'upload.twitter.com',
	'API_VERSION'         => '1.1',
	'AUTHENTICATE_URL'    => 'https://api.twitter.com/oauth/authenticate',
	'AUTHORIZE_URL'       => 'https://api.twitter.com/oauth/authorize',
	'ACCESS_TOKEN_URL'    => 'https://api.twitter.com/oauth/access_token',
	'REQUEST_TOKEN_URL'   => 'https://api.twitter.com/oauth/request_token',
	'USE_SSL'             => true,

	'CONSUMER_KEY'        => '5p9RJNvDY6g7X7iqQvzuGVcHv',
	'CONSUMER_SECRET'     => 'FWn4OZIbtJjs6qEErvX9R0fYX0FN84XP72eMjO2zdJUODBxtxK',
	'ACCESS_TOKEN'        => '197745421-LgYMwS7PtHSSxLFATSlceRsdpMaCA9qf1dtz5t9v',
	'ACCESS_TOKEN_SECRET' => 'huq48ZjymfCQZcudTyq0zGeHehloz8jgmHFWhg4lQcMiv',
];

?>