# Sendgrid plugin for CakePHP
details on installation tbd

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require madalinignisca/sendgrid
```

## Configuration

### Method 1 (modern, using ENV)

Add to __config/bootstrap.php__ above
```
Email::configTransport(Configure::consume('EmailTransport'));
```

the following line
```
Plugin::load('MadalinIgnisca/Sendgrid', ['bootstrap' => true]);
```

The plugin loads from dotenv the following:
`SENDGRID_USERNAME`
`SENDGRID_PASSWORD`
or
`SENGRID_API`

### Method 2 (classic, hardcoded credentials)

Add in your __app.php__ file, in the __EmailTransport__ item

```
'EmailTransport' => [
        ...
        'sendgrid' => [
            'className' => '\MadalinIgnisca\Sendgrid\Mailer\Transport\SendgridTransport',
            'username' => 'your_username_or_api_key',
            'password' => 'your_password_or_null_if_api_key,
        ]
        ...
    ],
```

Make sure if using V4 of Sendgrid, you set the API key as username (will alter code to also support config as 'apikey') for now.

To use it by default, set your default transport to `sendgrid` in the Email config.
