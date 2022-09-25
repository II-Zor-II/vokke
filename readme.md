## Requirements:
* Docker

Run this commands within the root of the project:

```shell
docker-compose up

docker-compose exec vokke.test composer install

docker-compose exec vokke.test php artisan migrate:fresh --seed 

```

default user for 
http://vokke.test/login
```shell
u: user@gmail.com
p: password
```

## Notes:

Not a production ready project.

env file was removed from .gitignore to easily
test/setup the project 

