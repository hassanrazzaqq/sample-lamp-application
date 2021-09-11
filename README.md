# Installing LAMP Server on Ubuntu

LAMP stack is a popular open source web platform commonly used to run dynamic web sites and servers. 
It includes Linux, Apache, MySQL, and PHP and is considered by many the platform of choice for development 
and deployment of high performance web applications which require a solid and reliable foundation.

```
sudo apt-get update
sudo apt install git
```
### Install Apache
```
sudo apt-get install apache2
sudo service apache2 start
```
### Install Mysql
```
sudo apt-get install mysql-server mysql-client
```
### Install PHP
```
sudo apt install php libapache2-mod-php php-common php-mbstring php-xmlrpc php-soap php-gd php-xml php-intl php-mysql php-cli php-zip php-curl
```

# Deploying SAMPLE LAMP APPLICATION

This repository contains php based applications, which is connected to mysql database, that is used to store and view books and movies data.

### Cloning GIT Repository
```
cd /var/www/
sudo git clone https://github.com/hassanrazzaqq/sample-lamp-application.git
```
### Setting up Databases
* The *.sql files are located in the mySqlDB folder.
* Create mysql custom user
* Create two databases and name it "bookstore" and "moviedb"

```
mysql -u root -p
< Enter password used at time of installation>

mysql> CREATE USER 'mysql_user'@'%' IDENTIFIED BY 'mysql_user';
mysql> GRANT ALL PRIVILEGES ON * . * TO 'mysql_user'@'%';
mysql> FLUSH PRIVILEGES;

mysql> create database bookstore;
mysql> create database moviedb;
mysql> exit;
```
* "Import" the "mySqlDB/movieDB.sql" and "mySqlDB/bookDB.sql" files, it will create the tables and populate the tables with initial data.

```
mysql -u mysql_user -p bookstore < mySqlDB/bookDB.sql
mysql -u mysql_user -p moviedb < mySqlDB/movieDB.sql
```

### Setting up Webserver (Apache2)
* In order for Apache to find the file and serve it correctly, it must be saved to a very specific directory, which is called the "web root". In Ubuntu 16.04, this directory is located at /var/www/html/ -- copy the git source code inside it. Folder Structure will be like below.

```
sudo nano /etc/apache2/sites-available/000-default.conf

Replace DocumentRoot Path with your cloned path "/var/www/sample-lamp-application"

Ctrl + o 
(Enter Key)
Ctrl + x 
```
![Alt text](apache-conf.png?raw=true "Apache conf")


### Supporting links
#### Nano Editor
http://staffwww.fullcoll.edu/sedwards/nano/UsefulNanoKeyCommands.html
