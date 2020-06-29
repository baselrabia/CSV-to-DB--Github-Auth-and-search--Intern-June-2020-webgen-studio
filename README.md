# Import-CSV-to-DB---verified-login---Github-Auth-and-User-search-Interns-June-2020-webgen-studio-
Import CSV to DB - verified login  - Github Auth and User search ( Interns June 2020 https://webgenstudio.com/ )

## Setting up


### Requirements
- [PHP >= 7.2](http://php.net/)
- [Composer](https://getcomposer.org/)
- [Xampp](https://www.apachefriends.org/)
- [Git](https://git-scm.com/)


### Clone GitHub repo for this project locally

`git clone https://github.com/baselrabia/CSV-to-DB--Github-Auth-and-search--Intern-June-2020-webgen-studio.git`

- `cd CSV-to-DB--Github-Auth-and-search--Intern-June-2020-webgen-studio`
- `composer install`
- `cp .env.example .env`
- `php artisan key:generate`

## Linking Mysql Database to the Project

- Open your local `PhpMyAdmin` 
- create new database for the application 
- create another new database for the migration of the csv files  
- edit the configration of the two database in the `.env` file 
- Run the command line for making the migration of the database -> `php artisan migrate`

## starting the application 

now everthing is almost done just one step more to start your App
-  Run this command line forserveing the App to your localhost ->  `php artisan serve` 
##
# About the tasks

the tasks is a group of 3 tasks i will talk about a short preview for each one of them

## First Task 

to import CSV from Google Drive into
a database (SQL or NoSQL), then present all the imported data on a basic frontend
contains :-
- * Create a basic user interface.
- * Create a button to set up the database you will use ahead.
- * Create a button to upload the CSV file.
- * Create a button to get all the data from the CSV file and import it
to the created database.
- * Present all the data as one table in the frontend with pagination.
- * Create a button to reset all (drop the database including all its
data).

## Second Task 
to make registration and login 
- * Create a simple registration form submission and save it into
the database
- * Expected user to fill up a form that contains name, email,
password, phone number and address
- * Upon the submission, verify the user input
- * Save the user registration detail into a user table
- * Display thank you information for successful registration
- * Take the user to login page
- * Expected user to login using the registered email address and
password
- * Display "Welcome {name}"

## Third Task 

Create a simple application to search GitHub users base one GitHub
RESTful API
- * Expect user to connect/login with GitHub or enter their
GitHub token.
- * Expect user to see the search input box after the 1st step.
- * On user submission, perform Ajax to search the user.
- * Only display the first 10 of the search result,
- * Add simple styling into the application.
