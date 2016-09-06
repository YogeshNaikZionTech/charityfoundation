# Chatity Foundation website build instructions.

## Pre-Requisites

# PHP, MySql, phpmyadmin, Apache.
# Make sure your msql password and user name are "root" and "root" respectively.(dont worry if its different incase you dint chage.)
* Above pre-req can be installed by following this <a href="https://www.youtube.com/watch?v=dfly7eNym4Y">video<a/>
* Next, install **composer** by following this <a href="https://www.youtube.com/watch?v=ZocYVPP3nQY">Video</a> (you dont need to write any compose.json like show in the end of the video, Just make sure you get composer welcome test when you type "composer" on cmd.)
* once your composer is working, issue cmd **composer global require "laravel/installer"** (type exact same.)

## Install Git and clone the repo to you directory.
**https://github.com/YogeshNaikZionTech/charityfoundation.git**


## Build commands after git clone
* Open browser got to **http://localhost/phpmyadmin/**. Enter you password adn username (it should be root and root if you think you gave a different name and password please let me know i will help you in editing in project settings.).
* create a database name charityFoundation.
* Go to your charityFoundation project folder using cmd and issue following command.
**composer update**
**php artisan migrate** --> if you put your put you database name and password as root and also your database name as **charityFoundation** you will find the table and data created for you.
**php artisan db:seed** ---> this will create deafult user for 
* Next **php artisan serve** --> go to broswer and type **localhost:8000** you should see charity site up and running.


###Use this to explore.
*Default user name ->light@gmail.com<br>
*Default password -> password.



