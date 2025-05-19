### Create a RESTful web service for a Library. The service must have the following API endpoints

- [x] Create a new Book
- [x] Read existing Books
- [ ] Update an existing Book
- [ ] Delete an existing Book

### A Book entity has the following properties

- [x] Author (mandatory)
- [x] Title (mandatory)
- [x] ISBN (mandatory)
- [x] Release Date

### Goals

- [x] Code must be covered with unit tests
- [x] Clean, easy to understand and maintainable
- [x] Be RESTful
- [x] Validate inputs
- [x] Demonstrates ability to write clean, well-structured code without relying on frameworks, highlighting core programming skills and deep understanding of software fundamentals.
- [x] Endpoints covered with system/functional tests
- [x] API documented (OpenAPI)
- [ ] Dockerize your application, i.e. besides the GitHub code repo please also host it and
give us a demo link [you can use a trial account of AWS/GCP/Azure to do this]

### Todo

- [ ] Validation to stop multiple books of same isbn (done to database alone)
- [x] Make release date nullable on validation and DB schema
- [x] Create a setup guide
- [x] Explain thought process
- [x] Mention design patterns used across the application and links
- [x] How to execute test effectively
- [x] Make Database use test connection while testing
- [x] Add php.xml.dist configuration settings  
  
  <br />

## App Solution description

The entire application is built around the MVC design pattern (partially, as the model class is missing in this context), the request first hits the 
front controller represented by `index.php`, then the front-controller bootstraps the
application by first auto-loading all the classes in their proper namespaces using composer, then loading
`bootstrap.php` which binds the; `config`, `database connection` and `validation rules` to the `App container`.  

### Data Access

 For data access, I access the data though raw sql queries, without the need for a ORM, I store the queries in the 
 repositories for reusability and abstraction of the data access on the data-access layer. Link on [repository pattern](https://makingloops.com/why-should-you-use-the-repository-pattern/) 

### Business Logic

 The business logic on the application layer is stored in the service classes for reusability accross the application
 and also to maintain a clean controller. Link on [Service classes](http://www.imperativedesign.net/insights/what-is-a-service-class-in-php/)

### Request validation

 For the validation the app uses the strategy pattern to use multiple algorithm implementing the same interface.
 Link to [strategy pattern](https://refactoring.guru/design-patterns/strategy/php/example#lang-features)

### Testing

 For testing the app uses [PHPUnit](https://phpunit.de/) for running unit tests and [DBunit](https://phpunit.de/manual/6.5/en/database.html) for testing the data-access layer.

 To run the test execute this code at the root directory of the app:  
    ``./vendor/bin/phpunit --testdox tests`` (Make sure app is setup and running before running test)

### API Documentation

Api is documented with swagger openApi documentation. To access the API in json format hit this route on tbe app
`api/docs/json`

## Setup Guide

To start up the application locally, follow these steps mentioned.

### Assumptions

1. You have a PHP environment set up
2. You have a MySQL server setup
3. You have PHP version ^7.4

### Guide

1. Clone application locally: `git clone git@github.com:Thirdwrist/shoppinpal.git`
2. Install composer on your system.
3. Go to root of application and run `composer install`.
4. Create a project db.
5. Create your own copy of `config.php.example` and name it `config.php`, then fill it with the appropriate values.
6. Pick up all migrations from the migrations folder and run it on your created project db.
7. Create your own copy of `phpunit.xml.dist` and name it `phpunit.xml` then fill with the appropriate values.
8. Run app from project root on the terminal with: `php -S localhost:8000`.
