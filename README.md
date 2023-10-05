# AsianFoodBlog - Guillaume Macquart de Terline

School Project in PHP

There shouldn't be any problems to solve. The website works. Follow the routes shown afterwards to access stuff.

Reminder : run "symfony server:start" in order to access the website using the following URL : http://127.0.0.1:8000

# Entities

- [object] **meal**
- [inventory] **kitchen**
- [galery] **display**

## Kitchen properties

| Title | Type | Constraint | Comments |
|:---------:|:-----------:|:----------:|:--------:|
| Meal_name | String | notnull | |

## meal properties

| Title | Type | Constraint | Comments |
|:---------:|:-----------:|:----------:|:--------:|
| meal_name | String | notnull | |

## links between Kitchen and meal

kitchen(1) — (0..n)meal : OneToMany

## Controllers

- KitchenController
- DashboardController

## CrudControllers

- KitchenCrudController
- MealCrudController

## Routes 

- To access main page :
    http://127.0.0.1:8000

- To access EasyAdmin :
    http://127.0.0.1:8000/admin

- To access KitchenController page :
    http://127.0.0.1:8000/kitchen

- To access Inventory list :
    http://127.0.0.1:8000/kitchen/list



