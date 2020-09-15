<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d,a',
            'categories' => 'c,r,u,d,a',
            'sub_categories' => 'c,r,u,d,a',
            'products' => 'c,r,u,d,a',
            'tags' => 'c,r,u,d,a',
            'comments' => 'r,u,d,a',
        ],

        'admin' => [

        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'a' => 'active'
    ]
];
