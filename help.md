Import from https://code.google.com/p/postimer

Simple Web Site to display Re-inforcement Timers for Eve online Structures.

The application is based on the Yii framework and requires this to function. Download Yii from http://www.yiiframework.com/ See the help and tutorials on the Yii site for help on configuring. It is recommended that you get the simple example website "hangman" working to ensure that your Yii framework is correctly installed.

New Release Version 2.2.0 on 12-10-2011 This version is tested with Yii framework version 1.1.8.

Installation Notes:

If you have an existing installation back up your database. Note your original database username, password and other modified settings in /protected/config/main.php You may wish to print a copy of the config file for reference. Delete your existing installation files (Do NOT delete your database) From version 2.2.0 onwards, all configuration settings have been moved to /protected/config/settings.ini
Upload the software to your web site and expand. Remember to set read and execute permissions on the software.
New Installation: Create a new mySQL database called 'postimer' using phpMyAdmin and import the SQL file in /protected/data/postimer.sql If you choose to use a different database name you will need to configure this in step 5
Upgrade from Previous Versions:
Prior to version 1.2 Modify the database using the SQL file in /protected/data/update_V1_1_2_to_V1_2_0.sql
Version 1.2 to version 2.0.0 Modify the database using the SQL file in /protected/data/update_V1_2_0_to_V2_0_0.sql
Version 2.0.0 to 2.1.0 - there are no database changes.
If this is a new installation, copy /protected/config/settings.ini.template to /protected/config/settings.ini

Changes will be required in the following lines of /protected/config/settings.ini
dbname = "postimer"
dbuser = "your_mysql_username"
dbpassword = "your_mysql_password"
You should now be able to log in
If you have problems connecting to the database, Check the configuration file in /protected/config/settings.ini to ensure you are connecting to the correct database with the right username, password, and table prefix.
Note: Table names and field names are CASE SENSITIVE in some unix installations. e.g. authitem and AuthItem are NOT the same.
The default database should have 4 sample POS timers and login details for "Admin" and "Demo"
Admin Password is stored in the the "User" table. Default initial log ins are "admin / admin" and "demo / demo". Login as Admin and "Manage Users" to give Superuser privileges to any additional superuser accounts. Once you have a working superuser account you should set the "admin" and "demo" user status to "Banned". Note that "superuser" rights are no longer required to create POS Timers.
To send e-mail alerts configure a cron job to run every hour using the command : php \path\to\protected\yiic.php timerEmail sendMail

If you have problems e-mailing check the database configuration in /protected/config/console.php
Other options can be configured using the "settings" option from the top menu. You can optionally require users to log in to be able to see pos timer information.
Optional : If you are upgrading from a previous version, go to "Manage Users" -> "Manage Profile Fields". Delete the "isEditor" field. This field is no longer used.
Assign Roles to users

Superuser accounts have rights to manage other user accounts with the "Manage Users" menu.
Superusers cannot create, modify or delete POS timers.
Superusers can assign rights to other users
To allow a user to post and update POS timers a superuser must assign Access Rights
Login with a superuser account
Select "Access Rights" from the top menu
Select a user from the list of user names
Select "Create and Delete POS Timers" from the Drop Box
Click the Assign Button
Donations of ISK can be made to "Kossaw". If you require support then uncomment lines 93 and 97 in /protected/config/main.php to enable the de-bugger and eve-mail me a link to the web site. Include your version numbers of PhP and MySQL and a donation of ISK.

Notes for users on a shared hosting service.

Some users on shared hosting services may be required to install the Yii framework in the same directory structure as the POSTimer application. In this case, the POSTimer application files should be uploaded to your host before installing the Yii framework.

Upload the POSTimer files to a new folder on your web host. You will end up with directories something like ...
/mytimersite/assets/

/mytimersite/css/

/mytimersite/images/

/mytimersite/protected/

/mytimersite/themes/

/mytimersite/index.php

Now install the Yii framework directory into the same root as the application. You will end up with a directory something like ...
/mytimersite/framework/yii.php <- this is the important startup file

/mytimersite/framework/base/

/mytimersite/framework/ - lots more files -

Modify /mytimersite/index.php line 4 to point to the Yii install directory and the Yii startup file.
$yii=dirname(FILE).'/framework/yii.php';

should work (I haven't tested it) otherwise try

$yii=/mytimersite/framework/yii.php;
