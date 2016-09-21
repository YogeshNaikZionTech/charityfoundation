##Chatity Foundation website build instructions.

##Step 1:
**Pre-Requisites : PHP, MySql, phpmyadmin, Apache Installation.**
* Make sure your msql password and user name are "root" and "root" respectively.(dont worry if its different incase you dint chage.)
* Above pre-req can be installed by following this <a href="https://www.youtube.com/watch?v=dfly7eNym4Y">video<a/>
* Next, install **composer** by following this <a href="https://www.youtube.com/watch?v=ZocYVPP3nQY">Video</a> (you dont need to write any compose.json like show in the end of the video, Just make sure you get composer welcome test when you type "composer" on cmd.)

## Step 2:
* Install Git by following instruction <a href="https://help.github.com/articles/set-up-git/#platform-windows">here</a>

* Issue following command in your desired directory **git clone https://github.com/YogeshNaikZionTech/charityfoundation.git**
*change to a new branch once everything is done(do not work on master).

## Step 3:
## Build commands after git clone
* Open browser got to **http://localhost/phpmyadmin/**. Enter you password adn username (it should be root and root if you think you gave a different name and password please let me know i will help you in editing in project settings).
* create a database name charityFoundation.
* Go to your charityFoundation project folder using cmd and issue following command.
* **composer update** <br>
* **php artisan migrate** --> if you put your put you database name and password as root and also your database name as **charityFoundation** you will find the table and data created for you.
**php artisan db:seed** ---> this will create default user for 
* Next on cmd **php artisan serve** --> go to browser and type **localhost:8000** you should see charity site up and running.
   
**Once everything is set create your own dummy user by using the sign-up page.



