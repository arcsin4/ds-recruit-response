.PHONY: all tests

all: composer-update

composer := composer.phar

$(composer):
	curl -sS https://getcomposer.org/installer | php

composer-update: $(composer)
	php composer.phar update

tests: composer-update
	./vendor/bin/phpunit --testdox tests


# 容器开发环境
## 启动开发环境
# 王少强：此处添加了composer的安装和组件库更新
dev-build: composer-update
	docker-compose build

dev-up: dev-build
	docker-compose --compatibility up -d --remove-orphans

## 连接进入开发环境
dev-attach: dev-up
	docker-compose exec recruit sh

## 关闭开发环境
dev-down:
	docker-compose --compatibility down --remove-orphans

## 清除开发环境
dev-clean: dev-down
	docker-compose rm -fv
	docker container prune -f
	docker image prune -f


# 最终测试用命令
dev-tests: dev-up
#   王少强：docker镜像里没有make工具，所以此处修改为直接执行phpunit命令
# 	docker-compose exec recruit make tests
	docker-compose exec recruit ./vendor/bin/phpunit --testdox tests
