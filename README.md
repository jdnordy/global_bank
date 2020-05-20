## SOURCE

Learning PHP with MySQL. A project based off this course on Lynda: PHP with MySQL Essential Training: 1 The Basics.

## SETUP

### MySQL configuration

### Apache Server Configuration

**_NOTE: You'll need to do these configurations in sudo_**

#### 1. Configure apache to use virtual hosts by editing httpd.conf

On macOS file is located: `/etc/apache2`

Make a copy of the file so you have the original.

```
sudo cp /etc/apache2/httpd.conf /ect/apahce2/httpd-og.conf
```

Edit the file to include httpd-vhosts.conf and use php 7

1. Either uncomment or write in `Include /private/etc/apache2/extra/httpd-vhosts.conf`
2. Either uncomment or add in `LoadModule php7_module libexec/apache2/libphp7.so`

#### 2. Edit apache2 http-vhost.conf

On macOS file is located: `/etc/apache2/extra`

Make a copy of the file (as done with httpd.conf)

```
sudo cp /etc/apache2/extra/httpd-vhosts.conf /ect/apahce2/extra/httpd-vhosts-og.conf
```

Edit the file to configure apaphe to server the global_bank public directory

```
<VirtualHost *:80>
    ServerAdmin <your name or email>
    DocumentRoot "<path/to/project>/globe_bank/public"
    ServerName globe_bank
    ErrorLog "/private/var/log/apache2/globe_bank.error.log"
    CustomLog "/private/var/log/apache2/globe_bank.access.log" common

    #documents
    <Directory "<path/to/project>/globe_bank/public">
      Require all granted
    </Directory>

    #redirect
    DirectoryIndex /index.php

</VirtualHost>
```

#### 3. configure hosts file to access vhost server

Edit your host file `sudo nano /etc/hosts`

Add in a global_bank domain name for localhost (127.0.0.1)

```
##
# Host Database
#
# localhost is used to configure the loopback interface
# when the system is booting.  Do not change this entry.
##
127.0.0.1       localhost
255.255.255.255 broadcasthost
::1             localhost

### ADD THIS SECTION IN

# Apache Servers
127.0.0.1       globe_bank

### END OF ADDED SECTION

# End of section

```

Hit `ctrl o` and then `enter` to save.
Then `ctrl x` to exit

**_NOTE: Make sure that the domain name added in hosts matches exactly the serverName specified in the httpd-vhosts.conf file_**

#### 4. start apache server

Run command `sudo apachectl start`

Visit `http://globe_bank/` in brower
