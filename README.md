# Restaurant Reservation API

## Overview

The Restaurant Reservation API is designed to manage restaurant reservations, table availability, orders, and payments. It supports operations like checking table availability, reserving tables, listing menu items, placing orders, and handling payments. The API also supports different checkout methods and handles customer waiting lists when the table capacity is reached.

## ERD Design

### Tables

- **Meals**: `id`, `price`, `description`, `available_quantity`, `discount`
- **Tables**: `id`, `capacity`
- **Customers**: `id`, `name`, `phone`
- **Reservations**: `id`, `table_id`, `customer_id`, `from_time`, `to_time`
- **Orders**: `id`, `table_id`, `reservation_id`, `customer_id`, `user_id (waiter)`, `total`, `paid`, `date`
- **Order Details**: `id`, `order_id`, `meal_id`, `amount_to_pay`
- **Waiting List**: `id`, `customer_id`

## API Endpoints

### Authentication

All API endpoints require authentication via the `api` guard.

### Endpoints

### navigate to http://localhost/api/documentation for Swagger Documentation

## Setup and Installation

### Prerequisites

- PHP 8.x
- Composer
- Docker

### Installation Steps

1. **Clone the Repository**

   ```bash
   git clone https://github.com/AbdElmoneimMohamed/restaurant-reservation.git
   cd restaurant-reservation
   make local-setup

## Usage

| Command             | Meaning                                            |
|---------------------|----------------------------------------------------|
| `make local-setup`  | setup local environment in one step for first time |
| `make up`           | build docker sail                                  |
| `make down`         | stop docker with remove images                     |
| `make rebuild`      | rebuild without cache                              |
| `make restart`      | restart docker                                     |
| `make migrate`      | run migration                                      |
| `make test`         | run unitTest                                       | 
| `make ecs`          | run cs-fixer                                       |
| `make clear`        | clear cache                                        |


    
