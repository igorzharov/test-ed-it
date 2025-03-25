php:
	docker-compose exec php-fpm sh

php-root:
	docker-compose exec --user root php-fpm php sh

nginx:
	docker-compose exec nginx sh

nginx-build:
	docker-compose stop;
	docker-compose rm -f nginx;
	docker-compose build nginx;
	docker-compose up -d;

mysql:
	docker-compose exec db sh

mysql-root:
	docker-compose exec --user root db sh

stop:
	docker-compose stop

up:
	docker-compose up -d
