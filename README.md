Silex SKE Sandbox
=================

This project is a sample or a bootstrap silex application.
You can use it for your next php application.

A Silex Edition based on http://lyrixx.github.com/Silex-Kitchen-Edition.

Clone
-----

    ~$ git clone https://github.com/ooXei1sh/silex-ske-sandbox.git

Install
-------

Run the following within terminal

    ~$ composer install

    ~$ npm install

    ~$ bower install

    ~$ grunt

Or

    ~$ composer install && npm install && bower install && grunt

Configure
---------

All configuration is located in `resources/config` directory.

    ~$ cp resources/config/params.php.dist resources/config/params.php

Database
--------

    ~$ vim resources/config/params.php

    ~$ ./console orm:info

    ~$ ./console orm:schema-tool:update --dump-sql 

    ~$ ./console orm:schema-tool:update --force
