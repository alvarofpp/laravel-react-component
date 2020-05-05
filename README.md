# react-component
[![Latest Stable Version](https://img.shields.io/packagist/v/alvarofpp/react-component.svg)](//packagist.org/packages/alvarofpp/react-component)
[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](//packagist.org/packages/alvarofpp/react-component)

A package to make it easy to manipulate your react components.

## Contents
  - [Install](#install)
  - [Usage](#usage)
  - [Contributing](#contributing)

## Install
Install via composer:
```bash
composer require alvarofpp/react-component
```

Edit the `config/app.php` file and add the following line to register the service provider:
```php
'providers' => [
    // ...

    ReactComponent\ReactComponentServiceProvider::class,

    // ...
],
```

## Usage
This package currently contains one command: `make:react-component`.

### `make:react-component`
Create a new React component file.

```bash
php artisan make:react-component Users/UsersList
```

Will create a file called `UsersList.js` at `resources/js/components/Users/`.

## Contributing
Contributions are more than welcome. Fork, improve and make a pull request. For bugs, ideas for improvement or other, please create an [issue](https://github.com/alvarofpp/laravel-react-components/issues).
