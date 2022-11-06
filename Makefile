docker-down:
	docker-compose down -v

docker-up:
	docker-compose up -d

docker-up-foreground:
	docker-compose up

docker-restart: docker-down docker-up

migrate: docker-up
	docker-compose exec php-cli php /app/symfony/bin/console doctrine:migrations:migrate

test: docker-up
	docker-compose exec php-cli php /app/symfony/bin/phpunit