<?php
require_once __DIR__ .'/bootstrap/app.php';

//dd($capsule);
return[
    'paths' =>[
      'migrations'=>'database/migrations',
        'seeds' => 'database/seeding'
    ],
    'migration_base_class' =>'App\Database\Migrations\Migration',
    'templates' =>[
        'file' =>'app/Database/Migrations/MigrationStub.php'
    ],
    'environments' => [
        'default_migration_table' =>'migrations',
        'default' =>[
            'adapter' =>$capsule->getConnection()->getConfig('driver'),
            'host' => $capsule->getConnection()->getConfig('host'),
            'port' => '3306',
            'name' =>$capsule->getConnection()->getConfig('database'),
            'user' =>$capsule->getConnection()->getConfig('username'),
            'pass' => $capsule->getConnection()->getConfig('password')
        ]
    ]
];
