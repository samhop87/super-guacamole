## APOCALYPSE CONCEPT
- Required:
    - Fix game logic. The luck score will be decided at random at the start of the game.
    - Luck will determine the outcome of each choice.
    - Each choice will now have two outcomes, not one. And they will be supplied to the frontend in the resource, pre-determined.
    - This will be done as a new method on the outcome model. It will receive the luck score, and calculate which outcome to
    return. Maybe with a scoped relation or something?
      - Add new outcomes to match all existing outcomes, change the relation to be hasMany
    - Change login page styles, they currently don't work correctly.
# 

- Future:
    - Make admin a part of the same vue instance / link to login auth route
    - If we remake the project, using inertia we can have the game be the default route and the admin be the auth login.

## Setup and notes
- heroku run php artisan (for commands)
- remember that the db is linked with live by default
- git push heroku master (for deployment)
- app name is idiot-survival
