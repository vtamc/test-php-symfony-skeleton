composer-install:
	docker-compose run php-cli composer install

composer-update:
	docker-compose run php-cli composer update

docker-build:
	docker-compose build --pull

docker-down:
	docker-compose down

docker-up:
	docker-compose up -d

docker-up-foreground:
	docker-compose up

docker-restart: docker-down docker-up

migrate:
	docker-compose run php-cli php bin/console doctrine:migrations:migrate

test:
	docker-compose run php-cli php bin/phpunit

check:
	docker-compose run php-cli php vendor/bin/phpstan