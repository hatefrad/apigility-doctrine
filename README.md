Apigility & Doctrine ReSTful Application
==============================

A REST API built in Apigility and Doctrine.

## Quick start

Install composer:   
`composer install`

Enable composer development mode:   
`composer development-enable`

Make a copy of `local.php.dist` & `doctrine.local.php.dist` files (under config
directory) removing the `.dist` extension from the end.

By default this repository includes a SQLite example with a few tables for
Oauth2 authentication and some tables for the Bookstore module.

## APIs
```
GET
http://<apigility URL>/public/authors/{id}

Returns one author and all their books
```

```
POST
http://<apigility URL>/public/authors

{
    "name": "<name of the author>"
}

Creates one author
```

```
GET
http://<apigility URL>/public/books/{id}

Returns one book and its author
```

```
POST
http://<apigility URL>/public/books

{
    "name": "<name of the book>",
    "author": <id of the author>
}

Creates one book and associates it with an author
```
