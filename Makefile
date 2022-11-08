composer-install:
	docker-compose run php-cli composer install --working-dir=/app/symfony

composer-update:
	docker-compose run php-cli composer update --working-dir=/app/symfony

docker-build:
	docker-compose build --pull

docker-down:
	docker-compose down -v

docker-up:
	docker-compose up -d

docker-up-foreground:
	docker-compose up

docker-restart: docker-down docker-up

migrate: docker-up
	docker-compose run php-cli php /app/symfony/bin/console doctrine:migrations:migrate

test: docker-up
	docker-compose run php-cli php /app/symfony/bin/phpunit