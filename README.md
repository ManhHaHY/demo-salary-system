# ManhHaHY/demo-salary-system

[![Build Status](https://travis-ci.org/ManhHaHY/demo-salary-system.svg?branch=master&style=flat-square)](https://travis-ci.org/ManhHaHY/demo-salary-system)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
[![Github All Releases](https://img.shields.io/github/downloads/ManhHaHY/demo-salary-system/total.svg)](https://github.com/ManhHaHY/demo-salary-system/releases)

This project `ManhHaHY/demo-salary-system` defines a simple calculate salary, PSR-4 and mvc project skeleton for PHP development.

## Install Requirement

PHP 7.x

Nginx

Mysql or Mariadb

composer

## Installation

For the starting point, just check out the git project

```sh
git clone https://github.com/ManhHaHY/demo-salary-system.git
```

Then, get into the newly created folder and issue the command `composer install` to retrieve necessary packages for your development and testing environment.

The PHP sources will be in `src` and the test files will be in `tests`. These folders are configured with PSR-4 autoloading using Composer. More namespaces / sources can be easily added with appropriate changes to `composer.json`.

```json
"autoload": {
    "psr-4": {
      "Core\\": "Core/",
      "App\\": "App/"
    }
}
```

and 

```json
"autoload-dev": {
    "psr-4": {
      "App\\": "tests/App/"
    }
 }
```

## Install docker

install docker and docker-compose before run project.

Run cmd in root folder of project and run command:

```docker
docker-compose up -d
```

After setup docker and start success you can open link:

```
http://localhost:81
```

You can change port of host in file:

```
docker-compose.yml at line port: "81:80" change 81 to any port you like
```

 ssh into docker with command:

```docker
docker-compose exec app bash
```

## Run test

exec to container app and run test with command:

```
docker-compose exec app php vendor/phpunit/phpunit/phpunit
```