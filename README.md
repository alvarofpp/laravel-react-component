# react-component
[![Packagist Version](https://img.shields.io/packagist/v/alvarofpp/react-component)](https://packagist.org/packages/alvarofpp/react-component)
[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](https://github.com/alvarofpp/laravel-react-component/blob/master/LICENSE)

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

Open the `config/app.php` file and add the following line to register the service provider:
```php
'providers' => [
    // ...

    Alvarofpp\ReactComponent\ReactComponentServiceProvider::class,

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
To add the component in `app.js`, use the `--require` option.

## Contributing
Contributions are more than welcome. Fork, improve and make a pull request. For bugs, ideas for improvement or other, please create an [issue](https://github.com/alvarofpp/laravel-react-components/issues).
