# AsianFoodBlog

School Project in PHP

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



