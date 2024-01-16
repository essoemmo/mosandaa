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
            'admins'       => 'c,r,u,d',
            'roles'        => 'c,r,u,d',
            'sections'     => 'c,r,u,d',
            'categories'     => 'c,r,u,d',
            'rates'        => 'c,r,u,d',
            'request_jobs' => 'c,r,u,d',
            'request_service' => 'c,r,u,d',
            'ads'          => 'c,r,u,d',
            'branches'     => 'c,r,u,d',
            'consults'     => 'c,r,u,d',
            'cons_details' => 'c,r,u,d',
            'settings'     => 'r,u',
            'contactus'    => 'r,d',
        ],
        // 'role_name' => [
        //     'module_1_name' => 'c,r,u,d',
        // ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
