<?php
return [
    'doctrine' => [
        'driver' => [
            'Bookstore_driver' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    0 => './module/Bookstore/src/V1/Entity',
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    'Bookstore' => 'Bookstore_driver',
                ],
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'bookstore.rest.doctrine.books' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/books[/:books_id]',
                    'defaults' => [
                        'controller' => 'Bookstore\\V1\\Rest\\Books\\Controller',
                    ],
                ],
            ],
            'bookstore.rest.doctrine.authors' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/authors[/:authors_id]',
                    'defaults' => [
                        'controller' => 'Bookstore\\V1\\Rest\\Authors\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'bookstore.rest.doctrine.books',
            1 => 'bookstore.rest.doctrine.authors',
        ],
    ],
    'zf-rest' => [
        'Bookstore\\V1\\Rest\\Books\\Controller' => [
            'listener' => \Bookstore\V1\Rest\Books\BooksResource::class,
            'route_name' => 'bookstore.rest.doctrine.books',
            'route_identifier_name' => 'books_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'books',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Bookstore\V1\Entity\Books::class,
            'collection_class' => \Bookstore\V1\Rest\Books\BooksCollection::class,
            'service_name' => 'Books',
        ],
        'Bookstore\\V1\\Rest\\Authors\\Controller' => [
            'listener' => \Bookstore\V1\Rest\Authors\AuthorsResource::class,
            'route_name' => 'bookstore.rest.doctrine.authors',
            'route_identifier_name' => 'authors_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'authors',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Bookstore\V1\Entity\Authors::class,
            'collection_class' => \Bookstore\V1\Rest\Authors\AuthorsCollection::class,
            'service_name' => 'Authors',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Bookstore\\V1\\Rest\\Books\\Controller' => 'HalJson',
            'Bookstore\\V1\\Rest\\Authors\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Bookstore\\V1\\Rest\\Books\\Controller' => [
                0 => 'application/vnd.bookstore.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Bookstore\\V1\\Rest\\Authors\\Controller' => [
                0 => 'application/vnd.bookstore.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Bookstore\\V1\\Rest\\Books\\Controller' => [
                0 => 'application/vnd.bookstore.v1+json',
                1 => 'application/json',
            ],
            'Bookstore\\V1\\Rest\\Authors\\Controller' => [
                0 => 'application/vnd.bookstore.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Bookstore\V1\Entity\Books::class => [
                'route_identifier_name' => 'books_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'bookstore.rest.doctrine.books',
                'hydrator' => 'Bookstore\\V1\\Rest\\Books\\BooksHydrator',
            ],
            \Bookstore\V1\Rest\Books\BooksCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'bookstore.rest.doctrine.books',
                'is_collection' => true,
            ],
            \Bookstore\V1\Entity\Authors::class => [
                'route_identifier_name' => 'authors_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'bookstore.rest.doctrine.authors',
                'hydrator' => 'Bookstore\\V1\\Rest\\Authors\\AuthorsHydrator',
            ],
            \Bookstore\V1\Rest\Authors\AuthorsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'bookstore.rest.doctrine.authors',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'doctrine-connected' => [
            \Bookstore\V1\Rest\Books\BooksResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Bookstore\\V1\\Rest\\Books\\BooksHydrator',
            ],
            \Bookstore\V1\Rest\Authors\AuthorsResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Bookstore\\V1\\Rest\\Authors\\AuthorsHydrator',
            ],
        ],
    ],
    'doctrine-hydrator' => [
        'Bookstore\\V1\\Rest\\Books\\BooksHydrator' => [
            'entity_class' => \Bookstore\V1\Entity\Books::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'Bookstore\\V1\\Rest\\Authors\\AuthorsHydrator' => [
            'entity_class' => \Bookstore\V1\Entity\Authors::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
    ],
    'zf-content-validation' => [
        'Bookstore\\V1\\Rest\\Books\\Controller' => [
            'input_filter' => 'Bookstore\\V1\\Rest\\Books\\Validator',
        ],
        'Bookstore\\V1\\Rest\\Authors\\Controller' => [
            'input_filter' => 'Bookstore\\V1\\Rest\\Authors\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Bookstore\\V1\\Rest\\Books\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 45,
                        ],
                    ],
                ],
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'author',
                'description' => 'Id of the author',
                'field_type' => 'int',
            ],
        ],
        'Bookstore\\V1\\Rest\\Authors\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 45,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [],
    ],
    'zf-rpc' => [],
];
