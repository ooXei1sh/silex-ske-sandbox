Silex SKE Sandbox
=================

This project is a sample or a bootstrap silex application.
You can use it for your next php application.

A Silex Edition based on http://lyrixx.github.com/Silex-Kitchen-Edition.

Install
-------

    ~$ composer install

    ~$ npm install

    ~$ bower install

    ~$ grunt

Configure
---------

All configuration is located in `resources/config` directory.

    ~$ cp resources/config/params.php.dist resources/config/params.php

Database
--------

To configure the database edit the `resources/config/params.php` file and the `resources/config/prod.php` file.

    ~$ ./console orm:schema-tool:update --dump-sql 

    ~$ ./console orm:schema-tool:update --force
