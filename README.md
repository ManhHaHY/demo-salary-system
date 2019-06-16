# ManhHaHY/demo-salary-system

[![Build Status](https://img.shields.io/travis/ManhHaHY/demo-salary-system/master.svg?style=flat-square)](https://travis-ci.org/ManhHaHY/demo-salary-system)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
[![Github All Releases](https://img.shields.io/github/downloads/ManhHaHY/demo-salary-system/total.svg)](https://github.com/ManhHaHY/demo-salary-system/releases)

This project `ManhHaHY/demo-salary-system` defines a simple starting point, PSR-4-compliant project skeleton for PHP development.


## Installation

For the starting point, just check out the git project

```sh
git clone https://github.com/ManhHaHY/demo-salary-system.git
```

or using `composer`

```sh
composer create-project ManhHaHY/demo-salary-system your-project-name
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