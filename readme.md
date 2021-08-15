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
- [ ] API documented (OpenAPI)
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
- [ ] Create a setup guide
- [ ] Explain thought process
- [ ] Mention design patterns used across the application and links
- [ ] How to execute test effectively
- [x] Make Database use test connection while testing
- [x] Add php.xml.dist configuration settings
