docker-down:
	docker-compose down -v

docker-up:
	docker-compose up -d

docker-restart: docker-down docker-up