### How to use
1) Clone the git repository with the command:
```
    git clone https://github.com/lupuandrei/my-hero.git
```

2) Install PHP 7.3

3) Create a virtual host 

3.1) MacOS
You can follow the steps from: [here](https://coolestguidesontheplanet.com/set-virtual-hosts-apache-mac-osx-10-9-mavericks-osx-10-8-mountain-lion/). 
But be careful when you edit **httpd-vhosts.conf** for the macOS 11 you have to add new settings. e.g:
```
<VirtualHost *:80>
    ServerName hero.lh
    ServerAlias www. hero.lh
    DocumentRoot "/your-path/emag"
    ErrorLog "/private/var/log/apache2/hero.lh-error_log"
    CustomLog "/private/var/log/apache2/hero.lh-access_log" common
    <Directory "/your-path/emag">
          RewriteBase /
          Options Indexes FollowSymLinks
          AllowOverride All
          Order allow,deny
          Allow from all
          Require all granted
    </Directory>
</VirtualHost>
```

### Technical
1. Libraries: Bootstrap, AngularJS
2. Chaining methods

### Known issues
1. 404 NOT FOUND for API/WEB
2. Better compare method for AbstractPlayer
