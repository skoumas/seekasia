# SEEK ASIA EMAIL SYSTEM

## Introduction
This system sends emails automatically based on the activity of registered and last logged users.
The system can actually send emails already as it is linked to a demo SendGrid account.

## How to start
- Have docker and docker-compose installed at your machine
- Go to the root directory and run ` docker-compose up -d`
- Run the command `docker exec -it seekasia.app service cron start` to start the cron service
- Connect to the database using the user: seekasia and password: CABinNYQRwu8XqcRqxdxQEAG post: 3306
- Import the `sql.sql` file from the root directory
- The `sql.sql` contains two users and also `demo` data of failed jobs, send jobs and email that have been sent.
- Go to the root directory and run `npm install`. This is will install the gulp files.
- Run `gulp`. This will work in the background for you to edit the files. Use that if you would like to see how the SCSS and JS files are being compiled. More info at the `gulpfile.js`.
- Navigate to http://localhost:81/
- To go to the admin panel simply type http://localhost:81/admin but you need to be logged in as `skoumas.net@gmail.com` who has admin rights.

## Admin Login
- Url: http://localhost:81/admin
- Username: skoumas.net@gmail.com
- Password: 123123

## Cron job
After running `docker-compose up -d` the schedule task should operate daily while the Laravel queue should be also running without any issues.

## Folder Structure
- _build: Contains the docker scripts and relative files
- _data: Contains the mySQL data
- app: Laravel files
- bootstrap: Laravel files
- config: Laravel configuration
- database: Laravel files
- node_modules: For the gulp files (not included in the git)
- public: Laravel files
- resources: Here we have all the laravel views
- routes: Laravel Routes
- storage: Laravel Logs
- tests: PHP Tests
- vendor: Laravel libraries not included in the git.
- cronlog: Contains all the cron execution logs
- gulpfile.js: Contains the gulp scripts for creating the SCSS and JS compiled files

## Admin Panel
- /admin: The main administration screen
- /admin/users: Displays all the users
- /admin/jobs: Displays all the jobs in queue waiting to be executed
- /admin/jobs/failed: Displays all the failed jobs
- /admin/process: Runs the daily script manually on the spot
- /admin/emails: Here you can see all the emails that where sent

## Support
If any issues please contact me a `skoumas.net@gmail.com` or `60179180`

## Variables
The variables for the application are under .env file as follow:
- EMAIL_F_FOR_ACTIVE : The frequency of emails for the active user
- EMAIL_F_FOR_INACTIVE: The frequency of emails for the in-active user
- DAYS_TO_NOTRESPONSIVE: Days need to pass to make an account not responsive
- DAYS_TO_NONACTIVE: Days need to pass to make an account not active

## TODO
- Tests
- System Health Panel at the administration system.