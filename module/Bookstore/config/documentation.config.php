<?php
return [
    'Bookstore\\V1\\Rest\\Books\\Controller' => [
        'description' => '',
        'entity' => [
            'description' => 'Book',
            'GET' => [
                'response' => '{
   "_links": {
       "self": {
           "href": "/books[/:books_id]"
       }
   }
   "name": "",
   "author": "Id of the author"
}',
                'description' => 'Fetch one Book',
            ],
        ],
    ],
    'Bookstore\\V1\\Rest\\Authors\\Controller' => [
        'entity' => [
            'GET' => [
                'response' => '{
   "_links": {
       "self": {
           "href": "/authors[/:authors_id]"
       }
   }
   "name": ""
}',
                'description' => 'Fetch one Author',
            ],
            'description' => 'Author',
        ],
    ],
];
