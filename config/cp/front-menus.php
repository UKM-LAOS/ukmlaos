<?php 
return [
    [
        'title' => 'Home',
        'route' => 'cp.home.index',
    ],
    [
        'title' => 'Blog',
        'route' => 'cp.blog.index',
        'active' => 'cp.blog*',
    ],
    [
        'title' => 'Produk',
        'children' => [
            [
                'title' => 'LAOS Course',
                'route' => 'course.index',
            ],
        ],
    ],
    // [
    //     'title' => 'Program',
    //     'route' => 'cp.program.index',
    //     'active' => 'cp.program*',
    // ],
    // [
    //     'title' => 'Tentang',
    //     'route' => 'cp.tentang.index',
    // ]
]
?>