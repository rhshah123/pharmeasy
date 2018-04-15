# PharmEasy Assignment
## Requirements

- Laravel 5.4
- PHP 7.0.10
- MySQL 5.7.14
- Composer


## Installation

#### Code

- Run following command 
- ```git clone https://github.com/rhshah123/pharmeasy.git```
- After succesfully downloading the repo, go to the root directory and run following command
- ``` composer update ```

#### Database

- create database 'pharmeasy'
- make user 'pharmeasy' with password 'pharmeasy'
- give global privelges to this user on the above db.

#### Creating tables and Seeding Data 

- Run following command from the root directory of the project :
- 'php artisan migrate:refresh --seed'
- This will create all the tables and initial data
- Now you will have following Roles and users available 

| Role |
| ---------- |
| patient |
| doctor |
| pharmacist |

| User | Role | Email | Password |
| ------------- | ----------| ---------- | --------- |
| Raju | patient | raju@example.com | secret |
| Dr. Shrikant | doctor | shawan@example.com | secret |
| Shawan | pharmacist | shawan@example.com | secret |

#### Login Details

- go to http://localhost/pharmeasy/public to access the site.
- Login using any of the email and password mentioned above
- You can also register new user, all new user will be registered as 'patient' by default.

#### SiteFlow

- Patient will able to add records, view past records and approve request from doctor/pharmacist.
- Doctor will be able to see all patients, request for medical and prescriptions, and view approved records.
- Pharmacist will be able to see all patients, request for prescriptions only, and view approved records.