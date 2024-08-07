BIN = ./vendor/bin
SAIL = $(BIN)/sail

# Docker --------------------------------------------------------------------- #
start:
	$(SAIL) up -d

stop:
	$(SAIL) up -d

down:
	$(SAIL) down

rebuild:
	make down;
	$(SAIL) build --no-cache;
	make restart;

sh:
	docker exec -it restaurant-reservation-laravel.test-1 bash

restart:
	make down; make up;

# App ------------------------------------------------------------------------ #
local-setup:
	cp .env.example .env
	composer install;
	make start;
	$(SAIL) artisan key:generate;
	$(SAIL) artisan storage:link;
	make migrate;

migrate:
	$(SAIL) artisan migrate:fresh --seed;

clean:
	$(SAIL) artisan view:clear;
	$(SAIL) artisan config:clear;
	$(SAIL) artisan optimize:clear;
	$(SAIL) artisan route:clear;

test:
	$(SAIL) artisan migrate:fresh --seed --env=testing
	$(SAIL) artisan test;

ecs: ## Runs the ECS checker and fixes anything it can
	@$(SAIL) php $(BIN)/ecs --fix

phpstan:
	@$(SAIL) php $(BIN)/phpstan analyse --level=max app/
