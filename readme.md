# Shoppinpal Test

## Requirements

### Create a RESTful web service for a Library. The service must have the following API endpoints:

- [x] Create a new Book
- [x] Read existing Books
- [ ] Update an existing Book
- [ ] Delete an existing Book

### A Book entity has the following properties

- [x] Author (mandatory)
- [x] Title (mandatory)
- [x] ISBN (mandatory)
- [x] Release Date

### MUST HAVE Requirements (we will not consider your submission if these are not met)

- [x] Code must be covered with unit tests
- [x] Clean, easy to understand and maintainable
- [x] Be RESTful
- [x] Validate inputs
- [x] Avoid using frameworks (e.g. Laravel, Sprint Boot) -- we’d like to see all code written
from the ground up to understand your abilities regardless of a framework

### Bonus / Nice to have

- [x] Endpoints covered with system/functional tests
- [x] API documented (OpenAPI)
- [ ] Dockerize your application, i.e. besides the GitHub code repo please also host it and
give us a demo link [you can use a trial account of AWS/GCP/Azure to do this]

### Please Note Footnote

- You could choose to do this test preferably in NodeJS, 2nd preference Golang, or if
neither is possible go with PHP.
- Provide a code you can be proud of, something that fully reflects your knowledge of
development, unit testing, DevOps, scalability and security.
- We are not curious about if you know how to use existing frameworks, but we’d like to
assess your real coding skills.
If you feel the task takes too much time, implement only a part of it (like one or two
endpoints only), but what you implement should meet every requirement from the must
have list above.

### Todo

- [ ] Validation to stop multiple books of same isbn
- [x] Remove Database credentials in version control
- [ ] Make release date nullable on validation and DB schema
- [x] Create a setup guide
- [x] Explain thought process
- [x] Mention design patterns used across the application and links
- [x] How to execute test effectively
- [x] Make Database use test connection while testing
- [x] Add php.xml.dist configuration settings  
  
  <br />

## ShoppinPal App Solution description

The entire application is built around the MVC design pattern (partially, as the model class is missing in this context), the request first hits the 
front controller represented by `index.php`, then the front-controller bootstraps the 
application by first auto-loading all the classes in their proper namespaces using composer, then loading
`bootstrap.php` which binds the; `config`, `database connection` and `validation rules` to the `App container`.  

## Data Access

 For data access, I access the data though raw sql queries, without the need for a ORM, I store the queries in the 
 repositories for reusability and abstraction of the data access on the data-access layer. Link on [repository pattern](https://makingloops.com/why-should-you-use-the-repository-pattern/) 

## Business Logic

 The business logic on the application layer is stored in the service classes for reusability accross the application
 and also to maintain a clean controller. Link on [Service classes](http://www.imperativedesign.net/insights/what-is-a-service-class-in-php/)

## Request validation

 For the validation the app uses the strategy pattern to use multiple algorithm implementing the same interface.
 Link to [strategy pattern](https://refactoring.guru/design-patterns/strategy/php/example#lang-features)

## Testing

 For testing the app uses [PHPUnit](https://phpunit.de/) for running unit tests and [DBunit](https://phpunit.de/manual/6.5/en/database.html) for testing the data-access layer.

 To run the test execcute this code at the root directory of the app:  
    ``./vendor/bin/phpunit --testdox tests``
