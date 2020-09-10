<?php

return [
	// MainController
	'' => [
		'controller' => 'main',
		'action' => 'index',
	],
	'main/index/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'index',
	],
	'register' => [
		'controller' => 'main',
		'action' => 'register',
	],
    'logout' => [
        'controller' => 'main',
        'action' => 'logout',
    ],
	'post/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'post',
	],

    // GuestController
    'guestbook' => [
        'controller' => 'guest',
        'action' => 'guestbook',
    ],

    // LoginController
    'login' => [
        'controller' => 'login',
        'action' => 'login',
    ],

    // ContactController
    'contact' => [
        'controller' => 'contact',
        'action' => 'contact',
    ],
];