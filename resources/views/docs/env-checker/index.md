# Check keys are available across all the .envs

![image](https://github.com/user-attachments/assets/8f80ef4a-a777-46ed-bc49-e70e3c1bec60)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/msamgan/laravel-env-keys-checker.svg?style=flat-square)](https://packagist.org/packages/msamgan/laravel-env-keys-checker)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/msamgan/laravel-env-keys-checker/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/msamgan/laravel-env-keys-checker/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/msamgan/laravel-env-keys-checker.svg?style=flat-square)](https://packagist.org/packages/msamgan/laravel-env-keys-checker)

This package checks if all the keys are available across all the .env files. This package is useful when you have
multiple .env files and want to ensure all the keys are available across all the .env files.

With a team of developers, it is possible that some developers might forget to add the keys they used in their .env file
to the .env.example file or the other way around.

## Features

- Check if all the keys are available across all the .env files.
- Add the missing keys to the .env files automatically (configurable) considering the line numbers and empty lines.
- Check if the .env and other provided files are present in .gitignore, so that they are not committed to git by
  mistake.
- Sync all the available keys by line across all the .env files. Referencing the master .env file. (Configurable, default is .env)

## Installation

You can install the package via composer:

```bash
composer require msamgan/laravel-env-keys-checker --dev
```

To configure this package, you can add environment variables to your `.env` files. See
the [config file](config/env-keys-checker.php) for details. Please make sure that you refresh the config cache after
adding/updating the environment variables. `php artisan config:cache`

If you prefer, you can also publish the config file with:

```bash
php artisan vendor:publish --tag="env-keys-checker-config"
```

## Usage

### To check if all the keys are available across all the .env files.

```bash
php artisan env:keys-check
```

#### Options

`--auto-add`: This option will add the missing keys to the .env files automatically.
The possible values are `ask`,
`auto`, and `none`.
The default value is `ask`.

`--no-progress`: This option will disable the progress bar.

`--no-display`: This option will disable all output.

### To check if the .env and other provided files are present in .gitignore.

```bash
php artisan env:in-git-ignore
```

### To sync all the available keys by line across all the .env files.

```bash
php artisan env:sync-keys
```

## In Test

You can also use this package in your test cases to make sure the required feature is working as expected.

### To check if all the keys are available across all the .env files.

Add the following code to your test case.

Make sure to add `--auto-add=none` to override the default configuration.

```php
it('tests that the .env key are same across all .env files.', function () {
    $this->artisan('env:keys-check --auto-add=none')->assertExitCode(0);
});
```

### To check if the .env and other provided files are present in .gitignore.

Add the following code to your test case.

```php
it('tests that the .env and other provided files are present in .gitignore.', function () {
    $this->artisan('env:in-git-ignore')->assertExitCode(0);
});
```

## Configuration

You can configure the package by publishing the configuration file.

```php
# config/env-keys-checker.php
# List of all the .env files to ignore while checking the env keys
# .env key: KEYS_CHECKER_IGNORE_FILES (coma separated string)

'ignore_files' => [],
```

```php
# config/env-keys-checker.php
# List of all the .env keys to ignore while checking the env keys
# .env key: KEYS_CHECKER_IGNORE_KEYS (coma separated string)

'ignore_keys' => [],
```

```php
# config/env-keys-checker.php
# strategy to add the missing keys to the .env file
# ask: will ask the user to add the missing keys
# auto: will add the missing keys automatically
# none: will not add the missing keys
# .env key: KEYS_CHECKER_AUTO_ADD (string)

'auto_add' => 'ask',
```

```php
# config/env-keys-checker.php
# List of all the .env.* files to be checked if they
# are present in the .gitignore file.
# .env key: KEYS_CHECKER_GITIGNORE_FILES (coma separated string)
# note: if you are adding this key (KEYS_CHECKER_GITIGNORE_FILES) to the .env file, make sure to add the .env as value else it will take "" as default value.

'gitignore_files' => ['.env'],
```

```php
# Master .env file to be used for syncing the keys
'master_env' => env('MASTER_ENV', '.env'),
```

## Testing

```bash
composer test
```
