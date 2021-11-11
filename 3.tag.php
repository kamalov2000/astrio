<?php
function check($input){
    $open_tag = array();  // Создаем масив для открывающихся тегов

    foreach ($input as $item){
        //Проверяем или тег открывающийся
        if (strpos($item, '/') === false){
            // Если открывающийся добавляем его в масив
            $open_tag[] = $item;
        } else{
            // Если тег закрывающийся берем последний елемент масива $open
            $item_close = array_pop($open_tag);
            // Трансформируем закрывающийся тег в открывающийся
            $check_tag = str_replace("/", "", $item);
            // Проверяем совпадают ли теги
            if($item_close != $check_tag){
                return 'This document is invalid!'; // Если не совпали масив не валиден
            }
        }
    }
    if(sizeof($open_tag) == 0){  //Проверяем масив если он пуст то значит он валидный
        return 'This document is valid!';
    } else{
        return 'This document is invalid!';
    }
}

$test = ['<td>', '<tr>', '</tr>', '<tr>', '</tr>', '<tr>', '</tr>', '<tr>', '</tr>', '</td>', '<td>', '<tr>', '</tr>', '<tr>', '</tr>', '<tr>', '</tr>', '</td>', ];
echo check($test);
