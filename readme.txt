**************************************************************************
** PHP Chat                                                             **
** Free Module for 123 Flash Chat Server Software                       **
** ==============================================                       **
**                                                                      **
** Copyright (c) by TopCMM  Software Corp                               **
** http://www.topcmm.com                                                **
** http://www.123flashchat.com                                          **
**************************************************************************



1. Requirements 

PHP chat has a few requirements which must be met before you are able to install and use it. 

* A webserver or web hosting account running on any major Operating System with support for PHP 

* PHP 5.0.0+  (>5.x.x, >6.0-dev )

* If you want integration for database.A SQL database system, one of: 

MySQL 3.23 or above 
MS SQL Server 2000 or above 
Oracle



2. Quick install 

1), Decompress the php chat archive to a local directory on your system.

2), Upload all files in the folder: "upload" to your web server by ftp.

3), Change the permissions on the following directories to be writable by all:

./configure/, ./install/


4), Using your web browser visit the location you placed phpchat , e.g. 
http://www.mydomain.com/phpchat/

5), Click the INSTALL NOW button, follow the steps and fill out all the requested information.





3. Advanced Install 
3.1 Select integration module 

PHP Chat According to your requirement to the website chat room, PHP chat will offer you three integrated modules for you to choose.

1), Enter the installation page, click the "install now" button, and then it will take you to the selection page. 
2), If your website comply with the cms, forum,.etc and its type is included in modules selection lists, we recommend you to use 3rd party module for integration because the particular 3rd party module can save your efforts in integration.

3),Please select your website type, click "download" so as to download relevant module installation package. Please integrate it according to the readme.txt after uncompressed.

4), module installation package to integrate, it is unnecessary for you to install php chat integrated package. Otherwise, please click "Others" to enter and view the php chat integ module page.


3.2 Select PHP Chat integrated mode 

1), Chat server hosted by 123flashchat free of charge(Free mode). If you select this mode, all you need to do is configure, fill in your room name and complete installation, then 123flash.com will offer a free chat room for your website.

2), Chat server hosted by 123flashchat(Host mode). If so, it is very easy for you to integrate host chat room to your website so long as you write your host address and the relevant database information Host mode install instruction

3),  Chat server hosted by your own(Local mode).If you select this mode, you need to download 123 Flash Chat, fill in your 123 Flash Chat installation address and the relevant database info to integrate the local 123 Flash Chat to your website. Local mode install instruction


3.3 Free mode install instruction 

1), In Select php chat integrated module page please select "Chat server hosted by 123flashchat free of charge" (Free mode).

2), Fill in your favorable room name and click "next" to complete installation.

3.4 Host mode install instruction 

1), In Select php chat integrated module page, please select "Chat server hosted by 123flashchat" (Host mode)

2), The host address format is as follows.

http://yourHostServerAddress/yourHostName/
e.g: http://host71200.123flashchat.com/phpchat/ 

If you fill in it with a wrong format, you cannot do the next operation. 


3.5 Local mode install instruction 

3.5.1 123 Flash Chat installation address filling declaration 

1), In Select PHP Chat Integrate Module page, please select "Host chat room on local server" (Local mode).

2), Please download and install 123 Flash Chat, we recommend you to use the version contain JRE

Chat Client Path filling format is as below

http://www.mydomain.com:35555/


3.6 If you use Host Mode or Local mode, you need to add these code to configure/config.php for auto login chat.

$select_db = 'mysql';	// mysql,mssql,oracle,dbal
$param_db_host = 'localhost';	//default : localhost
$param_db_port = '3306';	//database port
$param_db_name = '';		//dabase name
$param_db_user = 'root';	//database user
$param_db_password = '';	//database password
$param_db_user_table = '';	//user table
$param_username_field = 'username';	//user field
$param_pw_field = 'password';		//password filed
$enablemd5 = 'Off';			// enable md5 (Off,On)

Please configure login_chat.php address to the chat admin panel

Log into chat admin panel -> Server Settings -> Integration -> DataBase -> URL -> fill login_chat.php URL into 'URL' blank -> save it.

Server Management -> Restart -> Restart Server.


6. API for Developers

If you're running 123FlashChat server side by yourself or host 123FlashChat chat room by 123flashchat.com,

and you're ready to integrate chat room with your existing user databases, you can configure the PHP Chat API

after you finish installing the PHP Chat. If you¡¯re using the free chat room provided by us, please ignore

this chapter.


PHP chat offers two API files and they are located in phpchat/api/.


1). Transfer Username and Password API for auto login.

During the PHP chat installing process, if you have already selected and integrated your website database,

you can use this API, no matter you choosing Database integrated mode or URL integrated mode.

Api_user_session.php API files are used to transfer the username and password for the user who have logon

into your website.

Once you pass the current user¡¯s username and password to the variables of $username and $password

respectively in Api_user_session.php which is called by 123flashchat.php, you don't need to login twice to

access 123FlashChat chat room.


Sample code:

//code begin
//After the user login into your website, Their username and password can be gained from your website's

"Session" or "Cookie".

The Api_user_session.php need gain the login user's username and password, you should rewrite the script to

pass the values to the variables of $username and $password respectively for the calling of 123flashchat.php.

For doing so, there is no need for the user to type its password again to log in the chat room when he or she

visits the pages of 123flashchat.php.

session_start();
$username = $_SESSION[username];
$password = $_SESSION[password];
//code end



2). Password encryption method API for authentication.

After the PHP chat is installed, only when you chose the URL integrated mode can you use the API.


Api_password_encrypt.php API file is used to add your website special password encrypt algorithms helped to

identify the encrypted password. Here we use API to pass the name of encrypted method then login_chat.php

will call this function to validate the password. If you change the path of Api_password_encrypt.php, you

also need to change Api_password_encrypt.php include path in login_chat.php

For password authentication, if your encryption method is not MD5, you may need to add your encryption

algorithm into API, and assign the function name of your encryption method to password_encrypt_function_name,

your encryption method will be called automatically to be used to authenticate user¡¯s account.



Sample code:

//code begin
//assume the following function is your website's special password encrypt algorithms

function hash_pw($password){
$salt = "phpchat";
return md5($password.$salt);
}
$password_encrypt_function_name = "hash_pw";
//code end




