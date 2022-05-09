# Has To Be Code Challenge

## How to execute the program:

To config for first time follow below structures:
- `composer install`
- `docker-compose up -d` | `sudo docker-compose up -d`
- `Copy .env.example to make .env`



#### You can also run test inside docker container

- **`sudo docker exec -it has-to-be_has_to_be_app_1 bash`**
- `php artisan key:generate`
- **`php artisan test`**


#### Request url
`localhost/api/calculate`
<hr>

##Suggestion of Api Design

<br>

#####There are many good API design tools for good documentation, such as:

-  API Blueprint
-  Swagger

It's better set language in header and according to each language set dedicated Currency
for example implement middleware for check language
