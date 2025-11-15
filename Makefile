# Makefile para gestão do projeto Eletroposto
# Facilita comandos comuns do Docker e Symfony

.PHONY: help build up down restart logs shell composer console cache-clear db-create db-migrate db-seed test install

# Variáveis
DOCKER_COMPOSE = docker-compose
DOCKER_PHP = $(DOCKER_COMPOSE) exec php
CONSOLE = $(DOCKER_PHP) php bin/console
COMPOSER = $(DOCKER_PHP) composer

# Cores para output
GREEN = \033[0;32m
YELLOW = \033[0;33m
RED = \033[0;31m
NC = \033[0m # No Color

##
## 🚀 Projeto Eletroposto - Comandos Docker + Sylius
##

help: ## Exibe esta ajuda
	@echo "$(GREEN)Comandos disponíveis:$(NC)"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  $(YELLOW)%-20s$(NC) %s\n", $$1, $$2}'

##
## 🐳 Docker
##

build: ## Build dos containers Docker
	@echo "$(GREEN)🔨 Building containers...$(NC)"
	$(DOCKER_COMPOSE) build --no-cache

up: ## Inicia todos os containers
	@echo "$(GREEN)🚀 Starting containers...$(NC)"
	$(DOCKER_COMPOSE) up -d
	@echo "$(GREEN)✅ Containers iniciados!$(NC)"
	@echo "$(YELLOW)🌐 Aplicação: http://localhost$(NC)"
	@echo "$(YELLOW)📧 MailHog: http://localhost:8025$(NC)"
	@echo "$(YELLOW)🗄️  Adminer: http://localhost:8080$(NC)"

down: ## Para todos os containers
	@echo "$(RED)🛑 Stopping containers...$(NC)"
	$(DOCKER_COMPOSE) down

restart: down up ## Reinicia todos os containers

logs: ## Exibe logs dos containers
	$(DOCKER_COMPOSE) logs -f

logs-php: ## Exibe logs do PHP
	$(DOCKER_COMPOSE) logs -f php

logs-nginx: ## Exibe logs do Nginx
	$(DOCKER_COMPOSE) logs -f nginx

logs-websocket: ## Exibe logs do WebSocket
	$(DOCKER_COMPOSE) logs -f websocket

ps: ## Lista containers em execução
	$(DOCKER_COMPOSE) ps

##
## 🔧 Shell e acesso
##

shell: ## Acessa shell do container PHP
	$(DOCKER_PHP) sh

shell-root: ## Acessa shell do container PHP como root
	$(DOCKER_COMPOSE) exec -u root php sh

shell-db: ## Acessa shell do PostgreSQL
	$(DOCKER_COMPOSE) exec postgres psql -U sylius -d eletroposto

##
## 📦 Composer
##

composer: ## Executa comando Composer (use: make composer ARGS="require vendor/package")
	$(COMPOSER) $(ARGS)

composer-install: ## Instala dependências do Composer
	@echo "$(GREEN)📦 Installing Composer dependencies...$(NC)"
	$(COMPOSER) install --no-interaction --prefer-dist

composer-update: ## Atualiza dependências do Composer
	$(COMPOSER) update

composer-dump: ## Dump autoload do Composer
	$(COMPOSER) dump-autoload --optimize

##
## 🎵 Symfony Console
##

console: ## Executa comando Symfony (use: make console ARGS="debug:router")
	$(CONSOLE) $(ARGS)

cache-clear: ## Limpa cache do Symfony
	@echo "$(GREEN)🧹 Clearing cache...$(NC)"
	$(CONSOLE) cache:clear
	$(CONSOLE) cache:warmup

cache-clear-prod: ## Limpa cache de produção
	@echo "$(GREEN)🧹 Clearing production cache...$(NC)"
	$(CONSOLE) cache:clear --env=prod
	$(CONSOLE) cache:warmup --env=prod

##
## 🗄️  Base de Dados
##

db-create: ## Cria a base de dados
	@echo "$(GREEN)🗄️  Creating database...$(NC)"
	$(CONSOLE) doctrine:database:create --if-not-exists

db-drop: ## Remove a base de dados (CUIDADO!)
	@echo "$(RED)⚠️  Dropping database...$(NC)"
	$(CONSOLE) doctrine:database:drop --force --if-exists

db-migrate: ## Executa migrations
	@echo "$(GREEN)📊 Running migrations...$(NC)"
	$(CONSOLE) doctrine:migrations:migrate --no-interaction

db-migration-create: ## Cria nova migration
	$(CONSOLE) doctrine:migrations:generate

db-schema-update: ## Atualiza schema (apenas dev)
	@echo "$(YELLOW)⚠️  Atualizando schema (não usar em produção)$(NC)"
	$(CONSOLE) doctrine:schema:update --force

db-schema-validate: ## Valida schema
	$(CONSOLE) doctrine:schema:validate

db-seed: ## Carrega dados de teste (fixtures)
	@echo "$(GREEN)🌱 Loading fixtures...$(NC)"
	$(CONSOLE) sylius:fixtures:load --no-interaction

db-reset: db-drop db-create db-migrate db-seed ## Reset completo da BD

##
## 🛍️  Sylius
##

sylius-install: ## Instala Sylius completo
	@echo "$(GREEN)🛍️  Installing Sylius...$(NC)"
	$(COMPOSER) install
	$(CONSOLE) sylius:install --no-interaction
	@echo "$(GREEN)✅ Sylius instalado!$(NC)"
	@echo "$(YELLOW)👤 Admin: $(SYLIUS_ADMIN_EMAIL)$(NC)"

sylius-assets: ## Instala assets do Sylius
	$(CONSOLE) sylius:install:assets
	$(CONSOLE) assets:install

sylius-theme-assets: ## Compila assets do tema
	$(DOCKER_COMPOSE) exec node npm run build

##
## 🧪 Testes
##

test: ## Executa todos os testes
	$(DOCKER_PHP) php bin/phpunit

test-unit: ## Executa testes unitários
	$(DOCKER_PHP) php bin/phpunit --testsuite=unit

test-integration: ## Executa testes de integração
	$(DOCKER_PHP) php bin/phpunit --testsuite=integration

test-coverage: ## Executa testes com coverage
	$(DOCKER_PHP) php bin/phpunit --coverage-html var/coverage

phpstan: ## Executa PHPStan
	$(DOCKER_PHP) vendor/bin/phpstan analyse

cs-fix: ## Corrige code style (PHP-CS-Fixer)
	$(DOCKER_PHP) vendor/bin/php-cs-fixer fix

##
## 📦 Instalação completa
##

install: ## Instalação completa do projeto (primeira vez)
	@echo "$(GREEN)🚀 Instalando projeto Eletroposto...$(NC)"
	@if [ ! -f .env ]; then \
		echo "$(YELLOW)📝 Copiando .env.dist para .env$(NC)"; \
		cp .env.dist .env; \
	fi
	@echo "$(GREEN)🐳 Building containers...$(NC)"
	$(DOCKER_COMPOSE) build
	@echo "$(GREEN)🚀 Starting containers...$(NC)"
	$(DOCKER_COMPOSE) up -d
	@echo "$(GREEN)⏳ Aguardando PostgreSQL...$(NC)"
	@sleep 10
	@echo "$(GREEN)📦 Installing dependencies...$(NC)"
	$(COMPOSER) install --no-interaction
	@echo "$(GREEN)🗄️  Setting up database...$(NC)"
	$(CONSOLE) doctrine:database:create --if-not-exists
	$(CONSOLE) doctrine:migrations:migrate --no-interaction
	@echo "$(GREEN)🌱 Loading fixtures...$(NC)"
	$(CONSOLE) sylius:fixtures:load --no-interaction
	@echo "$(GREEN)🎨 Installing assets...$(NC)"
	$(CONSOLE) assets:install
	@echo "$(GREEN)✅ Instalação completa!$(NC)"
	@echo ""
	@echo "$(GREEN)🌐 Acesse: http://localhost$(NC)"
	@echo "$(GREEN)👤 Admin: /admin (admin@eletroposto.com.br / admin123)$(NC)"

clean: ## Remove containers, volumes e cache
	@echo "$(RED)🧹 Cleaning project...$(NC)"
	$(DOCKER_COMPOSE) down -v
	rm -rf var/cache/* var/log/*
	@echo "$(GREEN)✅ Limpeza concluída!$(NC)"

##
## 📊 Monitoramento
##

status: ## Status dos serviços
	@echo "$(GREEN)📊 Status dos serviços:$(NC)"
	@echo ""
	@echo "$(YELLOW)🐳 Docker Containers:$(NC)"
	@$(DOCKER_COMPOSE) ps
	@echo ""
	@echo "$(YELLOW)🌐 URLs:$(NC)"
	@echo "  Aplicação:    http://localhost"
	@echo "  Admin:        http://localhost/admin"
	@echo "  API Docs:     http://localhost/api/docs"
	@echo "  MailHog:      http://localhost:8025"
	@echo "  Adminer:      http://localhost:8080"
	@echo "  WebSocket:    ws://localhost:9000"

health: ## Verifica saúde dos serviços
	@echo "$(GREEN)🏥 Health check:$(NC)"
	@curl -s http://localhost/health || echo "$(RED)❌ App não está respondendo$(NC)"
	@echo ""

##
## 🔐 Segurança
##

generate-jwt-keys: ## Gera chaves JWT
	@echo "$(GREEN)🔐 Generating JWT keys...$(NC)"
	$(CONSOLE) lexik:jwt:generate-keypair --skip-if-exists

security-check: ## Verifica vulnerabilidades
	$(COMPOSER) audit

##
## 🚀 Deploy (Produção)
##

deploy-prod: ## Deploy para produção
	@echo "$(RED)🚀 Deploying to production...$(NC)"
	@echo "$(YELLOW)⚠️  Certifique-se de ter backup da BD!$(NC)"
	git pull origin main
	$(COMPOSER) install --no-dev --optimize-autoloader
	$(CONSOLE) cache:clear --env=prod
	$(CONSOLE) doctrine:migrations:migrate --no-interaction --env=prod
	$(CONSOLE) assets:install --env=prod
	@echo "$(GREEN)✅ Deploy concluído!$(NC)"
