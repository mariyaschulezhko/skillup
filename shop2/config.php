<?php
//var_dump(password_hash('2222',  PASSWORD_BCRYPT));exit;




return [
    'baseDir' => __DIR__,
    'webRout' =>'/shop2',
    'users' =>[
        'admin777' => '$2y$10$sgyMHrFKPQ1VDo16FUgbrOE2Lbq8bwB9/NnJt6RRKHyBKJqpjv89q',
        'admin' => '$2y$10$httGVn7/39nitJ2yrb5k9uWEdMkVreC2cH2Ueov730B7/7mLjvCaW',
    ],
    'db' => [
        'host' => 'zj406228.mysql.tools',
        'user' => 'zj406228_skillupshop2',
        'password' => 'Fz4-~x2pM6',
        'db' => 'zj406228_skillupshop2',
    ],
];

//password=2222, 1111,