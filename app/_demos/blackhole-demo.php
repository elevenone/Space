<?php

echo '<pre>';

echo '9 8 7 6 5 4 3 2 1 0';
echo '<hr/>';
echo 'blackbox / mongolite demo: ';


// BlackHole test


use BlackHole\MongoLite\Client;

$entry = [
    [
        "_created"=>1594827278,
        "_modified"=>1594827278,
        "slug"=>"project-slug",
        "title"=>"Project name",
        "description"=>"Project description",
        "images"=>
        [
            [
                "title"=>"Image 01",
                "description"=>"image 01 description",
                "filename"=>"image_01.png"
            ],
            [            
                "title"=>"Image 02",
                "description"=>"image 02 description",
                "filename"=>"image_02.png"
            ]
        ],
        "tags"=>
        [
            'this',
            'that',
            'other'
        ],
        "published"=>true
    ]
];

$client     = new Client('app/databases');   // path to writeable folder
$database   = $client->database;             // database name / withoult the extension
$collection = $database->projects;           // table name

// write $entry to database
// $collection->insert($entry);

// Find many by slug
$criteria = [
    "slug" => "project-slug-2"
];
$all_projects = $collection->findOne($criteria);

print_r($all_projects);

echo '<hr/>';

// Find many by tag
$criteria = [
    "tags" =>"zorro",
];
// $all_projects = $collection->find($criteria2 && $criteria3)->toArray();
$all_projects = $collection->find($criteria)->toArray();


print_r($all_projects);





















echo '</pre>';
