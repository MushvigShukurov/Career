<?php
// $data = file_get_contents('https://jsonplaceholder.typicode.com/posts');
// if (file_exists('http://localhost/pagination/instruments/me.json')) {
//     $data = file_get_contents('http://localhost/pagination/instruments/me.json');
//     $data = json_decode($data);

//     $newData = [];

//     foreach ($data as $dataItem) {
//         $item = [
//             'id'      => $dataItem->id,
//             'userId'  => $dataItem->userId,
//             'title'   => $dataItem->title,
//             'body'    => $dataItem->body
//         ];
//         array_push($newData, $item);
//     }
// };


if (file_get_contents('https://jsonplaceholder.typicode.com/posts')) {
    $data = file_get_contents('https://jsonplaceholder.typicode.com/posts');
    $data = json_decode($data);

    $newData = [];

    foreach ($data as $dataItem) {
        $item = [
            'id'      => $dataItem->id,
            'userId'  => $dataItem->userId,
            'title'   => $dataItem->title,
            'body'    => $dataItem->body
        ];
        array_push($newData, $item);
    }
};