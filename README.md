## Setup

```shell
git clone https://github.com/AbdElmoneimMohamed/restaurant-reservation.git
```

- run `make local-setup`

- navigate to http://localhost/api/documentation for Swagger Documentation

## Usage

| Command             | Meaning                                 |
|---------------------|-----------------------------------------|
| `make local-setup`  | setup local environment for first time  |
| `make up`           | build docker sail                       |
| `make down`         | stop docker with remove images          |
| `make rebuild`      | rebuild without cache                   |
| `make restart`      | restart docker                          |
| `make migrate`      | run migration                           |
| `make test`         | run unitTest                            | 
| `make ecs`          | run cs-fixer                            |
| `make clear`        | clear cache                             |


    
