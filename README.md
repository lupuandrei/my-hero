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

4) Routes:

- **BASE_URL**: hero.lh
- Home: **/**  or **/home**
- About: **/home/about** 
- API Battle: **/api/battle**


### Technical

1. Dependencies:
    1. [Bootstrap](https://getbootstrap.com/docs/4.6/components/badge/)
    2. [AngularJS](https://docs.angularjs.org/)
    3. [Toastr](https://www.npmjs.com/package/angular-toastr)
2. Chaining methods
3. API JSON 

```
{
  "hero": {
    "name": "Orderus",
    "health": 84,
    "strength": 70,
    "defence": 51,
    "speed": 40,
    "luck": 29
  },
  "monster": {
    "name": "Lucifer",
    "health": 92,
    "strength": 80,
    "defence": 49,
    "speed": 42,
    "luck": 12
  },
  "winner": {
    "name": "Orderus",
    "health": 12,
    "strength": 70,
    "defence": 51,
    "speed": 40,
    "luck": 29
  },
  "numberOfTurnsPlayed": 12,
  "rounds": [
    {
      "turnNumber": 1,
      "attackerName": "Lucifer",
      "defenderName": "Orderus",
      "damage": null,
      "hero": {
        "name": "Orderus",
        "health": 84,
        "strength": 70,
        "defence": 51,
        "speed": 40,
        "luck": 29
      },
      "monster": {
        "name": "Lucifer",
        "health": 92,
        "strength": 80,
        "defence": 49,
        "speed": 42,
        "luck": 12
      },
      "hasDefenderSkippedAttack": true
    },
    ...
  ]
}
```

### Known issues
1. 404 NOT FOUND for API/WEB
2. Better compare method for AbstractPlayer
3. Adjust path from */home/about* to */about* 
