# PHP test

############# Exam Code ###############

## 1. Installation

  - create an empty database named "phptest" on your MySQL server
  - import the dbdump.sql in the "phptest" database

## 2. Exam code repo 
  - Clone the code from my public github repo - https://github.com/krokodileman/PHP_Test_Optimy/tree/refactor-done
  - checkout to "refactor-done" repository name
  - create a .env file in your root directory and copy the vars from .env.example
  - put your sql server credentials in .env file vars
 
## 3. Composer install
  - At the root directory, run composer install to add the dependencies found at composer.json file, if composer is not yet installed, please install using this link. - https://getcomposer.org/

## 4. Display data / Run functionalities
  - Naviate to "public" folder
  - Run the demo script in your shell:/public>  "php index.php"
  - Output should be the same format like with that of the old code


## 5. Verison/library and implementations

This simple application works with refactored codebase

  - PHP version used : 8.1.0
  - library used are the ffolowing 
    - "illuminate/database": "^11.24",
    - "vlucas/phpdotenv": "^5.6",
    - "psr/container": "^2.0",
    - "nesbot/carbon": "^3.8",
    - "laravel/serializable-closure": "^1.3"
  
  - used composer for installing libraries
  - used container to resolve dependency injections
  - used simple singleton container wrapper that can be accessed anywhere in the app
  - implemented simple repository pattern
  - implemented eloquent query to simplify queries; promote less code
  - refactored the the DTO classes 

  PS: 
  - Did not implement migration library due to short time, I want to add migration just to add the lacking columns "updated_at" on both news and comment tables
  - Did not do feature/unit test as well due to time
   

