# Stuff

Company and Employee manager

## Auth

Basic laravel scaffolded (`make:auth`)

## Companies

DB Structure:

* id (use unsigned integer instead of bigInteger)
* user (foreign key to users table)
* name (string, required)
* city (string, required)
* logo (store the uploaded file's path as string, optional, nullable in db)
* website (string, optional)

A company belongs to a logged in user. A company has one or more employees. Use the appropriate relationship type for both of them. (https://laravel.com/docs/5.8/eloquent-relationships)

## Employees

* id (use unsigned integer instead of bigInteger)
* name (string, required)
* company (foreign key to companies table)
* email (string, unique, required)
* phone (string, optional, nullable in database)

Belongs to one company.

## Sitemap

* login
* register
* listing of companies
  * only show max 10 company. use laravel's pagination to create paginatable list (https://laravel.com/docs/5.8/pagination)
* create new company
  * there should be a file input to upload a logo (`<input type="file">`) (https://laravel.com/docs/5.8/filesystem#file-uploads)
* company detail page
  * list employees - use a html `<table>`
  * employees can be created, edited and deleted. no detail page is necessary
  * the create employee button should navigate to an employee creation form. the company field should be automatically filled out (`<select>` input). (use /companies/3/employees routing style, that way you can get the selected company's ID and fill out the field)
  * make sure only the user who owns the company can edit it and it's members (use FormRequest's authorize method: https://laravel.com/docs/5.7/validation#authorizing-form-requests)
* edit a company (the owning user can edit a company)
* delete a company (the owning user can delete a company)

Use the automatically generated layout that comes with a new Laravel project.