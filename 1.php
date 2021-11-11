<?php
$categories = [
    [
        "id" => 1,
        "title" => "Обувь",
        'children' => [
            [
                'id' => 2,
                'title' => 'Ботинки',
                'children' => [
                    ['id' => 3, 'title' => 'Кожа'],
                    ['id' => 4, 'title' => 'Текстиль'],
                ],
            ],
            ['id' => 5, 'title' => 'Кроссовки',],
        ]
    ],
    [
        "id" => 6,
        "title" => "Спорт",
        'children' => [
            [
                'id' => 7,
                'title' => 'Мячи'
            ]
        ]
    ],
];

function searchCategory($categories, $id) {
    // checking for emptiness
    if (!empty($categories) && !empty($id)) {
        foreach ($categories as $category) {
            if ($id == $category['id']) {
                echo $category['title'];
            } elseif (!empty($category['children'])) {
                echo searchCategory($category['children'], $id);
            }
        }
    }

}
echo searchCategory($categories, 1);
