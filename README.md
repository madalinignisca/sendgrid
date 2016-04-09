# Sendgrid plugin for CakePHP
details on installation tbd

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require madalinignisca/sendgrid
```

Add to config/bootstrap.php above
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

For manually overriding them I'd be happy for sugestions, just I'm used to load configs by with [dotenv](https://github.com/josegonzalez/php-dotenv)
and helps a lot when deploying on PaaS systems.
