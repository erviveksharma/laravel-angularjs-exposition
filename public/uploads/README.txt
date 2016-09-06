Virtual Exposition Application
A virtual world events management application for companies and visitors.

Complete Installation Instruction:-
The application is developed using homestead improved so preferred installation method is via homestead and vagrant. But application can be directly uploaded to LAMP server and setup easily.

Direct Server Setup :-
1. Copy and extract the zip file on server
2. Setup the domain so it should point to expoApp/public directory as root path.
eg. expoApp.provisdemo.com  points to provisdemo.com/expoApp/public directory
3. create database and import the mysql dump file ( given with the complete zip )
4. create .env file from .env example and update Database details and Mail server details

Homestead Improved setup :-
1. Install vagrant , virtual box , homestead improved. This link gives all necessary details to get homestead running https://www.sitepoint.com/quick-tip-get-homestead-vagrant-vm-running/

2. Copy and Extract the source zip in homestead Project/public directory or add as a new site in homestead.yaml eg.

sites:
    - map: homestead.app
      to: /home/vagrant/Code/Project/public
    - map: expo.app
      to: /home/vagrant/Code/expoApp/public

IMP: - the site should map to public directory inside the expoApp

3. vagrant up and vagrant provision if necessary

4. vagrant ssh and cd /home/vagrant/Code/expoApp/public ( please change path respective to your directory )

5. create database ( user :- homestead pass:- secret )
mysql -u homestead -p
create database if not exists expo_db;

6. create .env file from .env example and update Database details and Mail server details

5. Run following commands
composer update
php artisan key:generate
php artisan jwt:generate
php artisan migrate

All set now you can visit the page on browser at http://expo.app.

Database Setup and Configuration :-

Please find the attached expoApp.sql mysql database script. This project requires a mysql database.
1. If you are installing on LAMP server. please go to your hosting panel and create database. Then import current database script into the newly created database.
2. If you are using homestead then you just need to create database as explained in installation section. and then php artisan migrate will create and fill database

Application Configuration :-

Project require .env file to be created and placed in the root folder.
command line : php -r “copy(‘.env.example’, ’.env’)”;
Database details and Mail Server Details needs to be updated in the .env file

DB_HOST=localhost 
DB_DATABASE=expoApp_db 
DB_USERNAME=homestead 
DB_PASSWORD=secret

MAIL_DRIVER=smtp 
MAIL_HOST=smtp.zoho.com 
MAIL_PORT=465 
MAIL_USERNAME=yourusername 
MAIL_PASSWORD=yourpassword 
MAIL_ENCRYPTION=ssl

Assumption or Missing Requirements :-

There are some assumption made to fulfil the requirements of application
1. There is a backend section where events can be created and managed to application
2. There is a backend section where stands can be created and managed to application
3. Currently all events and stand data is auto fill by database table script or migrations.
4. A cron is set to run every day which will call the following script to send email to the company admins about there stand in a event
http://your-domain-name/reports
you can manually run it by visiting this url in browser
5. There should be a company admin login to update / manage his uploaded information for a stand.
6. The stand can have a purchase module so company had to buy it before it gets assigned to the company in the application.
