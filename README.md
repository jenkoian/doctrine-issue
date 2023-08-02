# Doctrine issue

Issues noticed in 2.16.0 due to change made in https://github.com/doctrine/orm/pull/10785

## Setup

`composer install`

`bin/doctrine orm:schema-tool:drop --force`

`bin/doctrine orm:schema-tool:create`

## Issue 1

`php issue1.php`

* If we have an entity (Product in this case) with a manually set identifier
* We then delete the entity from the database (I'm doing it here via a raw query but could just easily be done by another app/direct in the DB etc.)
* We attempt to find the entity but it doesn't exist so we attempt to create it
* Will get an error where as before this would work

## Issue 2

`php issue2.php`

* If we have an entity (Product in this case) the identifier is set manually in this example but don't think it matters
* Get a proxy version of the entity
* Attempt to get a value from the entity
* Will get an error where as before this would work
