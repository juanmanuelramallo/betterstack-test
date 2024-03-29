# PHP Test Project

### Description
This is a very simple one-page application consisting of a single table and a form for creating new rows. To make it a little more complicated, we have written a 'framework' you have to use. Below is a set of simple tasks to perform. Please write a production-ready code.

### Installation
1. Create a private GitHub repository and invite @jurajmasar and @gyfis as collaborators
2. Create a new MySQL database
3. Rename `config/database` to `config/database.php` and configure your database connection settings in this file
4. Import `database/schema.sql` into your database

### Tasks to perform
1. Style the page using [Bootstrap](http://getbootstrap.com/) or [Tailwind](http://tailwind.com/)
  * Every other table row should be highlighted.
  * Use Bootstrap’s form-horizontal or equivalent to style the form.
  * Please make any other styling changes based on your preferences to make the interface look presentable.
2. Add a validation of new records.
3. Create a JS functionality to filter rows by city.
4. Implement submission of the form using AJAX.
5. Add a phone number column to the table.
6. Please deploy the project to any freehosting and send us the production link.

Thank you! 🙏

# Notes

## How to test?

Go to [https://betterstack-test.dokku.1ma.dev/](https://betterstack-test.dokku.1ma.dev/).

To test the AJAX submission [append the `ajax=true` query string](https://betterstack-test.dokku.1ma.dev/?ajax=true).

## Installation

```sql
CREATE DATABASE test_project_main;
```

```bash
mysql test_project_main -u root < database/schema.sql
```

## Run the app

```
foreman start -f Procfile.dev
```

## Run migrations

```
mysql test_project_main -u root < database/migrations/20240309_add_phone_to_users.sql
```

## Deployment

With Dokku installed in a VM, in the VM run:

```
dokku apps:create betterstack-test
dokku mysql:create betterstack-test
dokku mysql:link betterstack-test betterstack-test
```

Check the DATABASE_URL env var and set the required env vars:
```
dokku config:show betterstack-test
dokku config:set betterstack-test --no-restart DB_ADDRESS= DB_USERNAME= DB_PASSWORD= DB_DATABASE=
```

Locally:
```
git remote add dokku dokku@dokku.1ma.dev:betterstack-test
git push dokku master
```

In the VM:
```
dokku letsencrypt:enable betterstack-test
```

Fin.
