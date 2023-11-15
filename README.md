# AsianFoodBlog - Guillaume Macquart de Terline

School Project in PHP

There shouldn't be any problems to solve. The website works. Follow the routes shown afterwards to access everything. Missing authentification. Otherwise, everything should be there. ( No images unfortunately :( )

[color=#FF0000]Important : pour lancer le serveur, bien penser à éxecuter la cmd **cd ./AsianFoodBlog**[/color]


# Asian Food Blog Documentation

## Introduction

Asian Food Blog is a web application, similar to a blog, that allows users to share and explore Asian food experiences. The platform focuses on connecting members, discovering galleries (Regions of food in our case), managing kitchens (each member has one kitchen), and showcasing delicious meals.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Routes](#routes)
  - [_preview_error_](#_preview_error_)
  - [_wdt_](#_wdt_)
  - [_profiler_home_](#_profiler_home_)
  - [_profiler_search_](#_profiler_search_)
  - [_profiler_search_bar_](#_profiler_search_bar_)
  - [_profiler_phpinfo_](#_profiler_phpinfo_)
  - [_profiler_xdebug_](#_profiler_xdebug_)
  - [_profiler_search_results_](#_profiler_search_results_)
  - [_profiler_open_file_](#_profiler_open_file_)
  - [_profiler_](#_profiler_)
  - [_profiler_router_](#_profiler_router_)
  - [_profiler_exception_](#_profiler_exception_)
  - [_profiler_exception_css_](#_profiler_exception_css_)
  - [admin](#admin)
  - [app_kitchen](#app_kitchen)
  - [app_kitchen_new](#app_kitchen_new)
  - [kitchen_index](#kitchen_index)
  - [kitchen_show](#kitchen_show)
  - [meal_show](#meal_show)
  - [app_member_index](#app_member_index)
  - [app_member_show](#app_member_show)
  - [app_region_index](#app_region_index)
  - [app_region_new](#app_region_new)
  - [app_region_show](#app_region_show)
  - [app_region_meal_show](#app_region_meal_show)
  - [app_region_edit](#app_region_edit)
  - [app_region_delete](#app_region_delete)

## Installation

To run the Asian Food Blog application locally, follow these steps:

1. Navigate to the project directory: `cd asian-food-blog`
2. Install dependencies: `composer install`
3. Create the database: `php bin/console doctrine:database:create`
4. Update it: `php bin/console doctrine:database:update --force`
7. Start the Symfony server: `symfony server:start`

## Usage

Asian Food Blog provides the following features:

- **Member Management:** Explore and view information about different members.
- **Kitchen Management:** Manage your kitchen and its meals.
- **Gallery Management:** Display your food according to the regions they come from.
- **Meal Display:** View details about specific meals.

## Routes

- http://127.0.0.1:8000

### _preview_error_

- **Method:** ANY
- **Path:** /_error/{code}.{_format}

### _wdt_

- **Method:** ANY
- **Path:** /_wdt/{token}

### _profiler_home_

- **Method:** ANY
- **Path:** /_profiler/

### _profiler_search_

- **Method:** ANY
- **Path:** /_profiler/search

### _profiler_search_bar_

- **Method:** ANY
- **Path:** /_profiler/search_bar

### _profiler_phpinfo_

- **Method:** ANY
- **Path:** /_profiler/phpinfo

### _profiler_xdebug_

- **Method:** ANY
- **Path:** /_profiler/xdebug

### _profiler_search_results_

- **Method:** ANY
- **Path:** /_profiler/{token}/search/results

### _profiler_open_file_

- **Method:** ANY
- **Path:** /_profiler/open

### _profiler_

- **Method:** ANY
- **Path:** /_profiler/{token}

### _profiler_router_

- **Method:** ANY
- **Path:** /_profiler/{token}/router

### _profiler_exception_

- **Method:** ANY
- **Path:** /_profiler/{token}/exception

### _profiler_exception_css_

- **Method:** ANY
- **Path:** /_profiler/{token}/exception.css

### admin

- **Method:** ANY
- **Path:** /admin

### app_kitchen

- **Method:** ANY
- **Path:** /kitchen

### app_kitchen_new

- **Method:** GET|POST
- **Path:** /kitchen/new/{id}

### kitchen_index

- **Method:** GET
- **Path:** /kitchen/list

### kitchen_show

- **Method:** ANY
- **Path:** /kitchen/{id}

### meal_show

- **Method:** ANY
- **Path:** /meal/{id}

### app_member_index

- **Method:** GET
- **Path:** /member

### app_member_show

- **Method:** GET
- **Path:** /member/{id}

### app_region_index

- **Method:** GET
- **Path:** /region

### app_region_new

- **Method:** GET|POST
- **Path:** /region/new/{memberId}

### app_region_show

- **Method:** ANY
- **Path:** /region/{id}

### app_region_meal_show

- **Method:** GET
- **Path:** /{region_id}/meal/{meal_id}

### app_region_edit

- **Method:** GET|POST
- **Path:** /region/{id}/edit

### app_region_delete

- **Method:** POST
- **Path:** /region/{id}