# Hotellisting app

## Description

The application is for displaying htel's offers in a paginated list. The offers is stored in a table, and refreshed every 20 minutes with a cronjob.

## Database

The databse is created by migrate file

`php spark migrate -all`


## Cronjob

The cronjob needs to be enabled

`php spark cronjob:enable`

After this, you need to add a row to the crontab

Syntax:

`* * * * * cd /path-to-your-project && php spark cronjob:run >> /dev/null 2>&1`

Example:

`* * * * * cd /var/www/html/dev/codeigniter-4 && php spark cronjob:run >> /dev/null 2>&1`

If you using windows, the crontab is not availabe for you, but you can setup a windows task scheduler.
I provide a litle script that need to be exetuded with powershell. Change the directory path to the directory where you cloned the app
