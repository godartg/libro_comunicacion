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
        'administrador' => [
            'user' => 'c,r,u,d',
            'curso' => 'c,r,u,d',
            'salon' => 'c,r,u,d',
            'lista_alumno' => 'c,r,u,d',
        ],
        'docente' => [
            'material' => 'c,r,u,d',
            'unidad' => 'c,r,u,d',
            'actividad' => 'c,r,u,d',
            'curso' => 'r',
            'evaluacion' => 'c,r,u,d',
            'pregunta' => 'c,r,u,d',
            'alternativa' => 'c,r,u,d',
            'calificacion' => 'r'
        ],
        'alumno' => [
            'curso' => 'r',
            'evaluacion' => 'r,e',
            'calificacion' => 'r'
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'e' => 'ejecutar'
    ]
];
