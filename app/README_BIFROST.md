# 🌈⚡ Bifrost App - Sylius E-commerce + OCPP Platform

**Backend da Plataforma Bifrost**

---

## 📋 Sobre este Diretório

Este diretório contém a **aplicação backend** da plataforma Bifrost, baseada em **Sylius** (e-commerce headless em PHP/Symfony) integrada com o protocolo **OCPP** para gestão de estações de recarga VE.

### Tecnologias

- **Sylius 1.13+** - E-commerce framework
- **Symfony 7.0+** - PHP framework
- **PHP 8.2+** - Linguagem
- **PostgreSQL 16** - Database
- **API Platform 3.2** - REST/GraphQL API
- **Docker** - Containerização

---

## 🏗️ Estrutura do Projeto

```
app/
├── assets/              # Frontend assets (JS, CSS, images)
├── bin/                 # Executáveis (console)
├── config/              # Configurações Symfony
│   ├── packages/       # Configuração de bundles
│   ├── routes/         # Rotas da aplicação
│   └── services.yaml   # Serviços customizados
├── features/            # Testes Behat (BDD)
├── migrations/          # Migrações database
├── public/              # Documentos públicos (index.php)
├── src/                 # Código fonte
│   ├── Entity/         # Entidades Doctrine
│   ├── Repository/     # Repositórios
│   └── Kernel.php      # Kernel da aplicação
├── templates/           # Templates Twig
├── tests/               # Testes PHPUnit
├── translations/        # Arquivos de tradução
├── var/                 # Cache, logs (não versionado)
├── compose.yml          # Docker Compose
└── .env                 # Variáveis de ambiente
```

---

## 🚀 Instalação

### Pré-requisitos

```bash
- Docker + Docker Compose
- PHP 8.2+ (para desenvolvimento local)
- Composer 2.x
- Node.js 18+ e Yarn
```

### Setup com Docker (Recomendado)

```bash
# 1. Navegar para o diretório app
cd app/

# 2. Copiar arquivo de ambiente
cp .env .env.local
# Editar .env.local com suas configurações

# 3. Iniciar containers Docker
docker compose up -d

# 4. Instalar dependências PHP
docker compose exec php composer install

# 5. Instalar dependências Node
docker compose exec nodejs yarn install

# 6. Criar database
docker compose exec php bin/console doctrine:database:create

# 7. Executar migrações
docker compose exec php bin/console doctrine:migrations:migrate -n

# 8. Instalar Sylius (dados iniciais)
docker compose exec php bin/console sylius:install -n

# 9. Compilar assets
docker compose exec nodejs yarn build

# 10. Acessar a aplicação
# Frontend Shop: http://localhost
# Admin Panel: http://localhost/admin
# API: http://localhost/api
```

**Credenciais padrão Sylius:**
- **Admin:** sylius@example.com / sylius

### Setup Local (Sem Docker)

```bash
# 1. Instalar dependências
composer install
yarn install

# 2. Configurar database no .env.local
DATABASE_URL="postgresql://user:pass@localhost:5432/bifrost?serverVersion=16&charset=utf8"

# 3. Criar database
php bin/console doctrine:database:create

# 4. Executar migrações
php bin/console doctrine:migrations:migrate

# 5. Instalar Sylius
php bin/console sylius:install

# 6. Compilar assets
yarn build

# 7. Iniciar servidor local
symfony server:start

# Acessar: http://localhost:8000
```

---

## 🔌 Customizações Bifrost

### Entidades Customizadas

O projeto Bifrost adiciona as seguintes entidades ao Sylius base:

```
src/Entity/Charging/
├── Station.php           # Estações de recarga
├── Charger.php           # Carregadores individuais
├── ChargingSession.php   # Sessões de recarga
├── MeterValue.php        # Medições de consumo
└── Vehicle.php           # Veículos dos usuários
```

### Bundles Customizados (Futuro)

```
src/Bundle/
├── ChargingBundle/       # Gestão de sessões de recarga
├── OcppBundle/           # Servidor OCPP
└── AnalyticsBundle/      # Métricas e dashboards
```

### APIs Customizadas

```
/api/charging/stations          # GET, POST - Estações
/api/charging/sessions          # GET, POST - Sessões
/api/ocpp/websocket             # WebSocket - OCPP 1.6/2.0.1
/api/analytics/dashboard        # GET - Métricas
```

---

## 🧪 Testes

### Executar Todos os Testes

```bash
# PHPUnit (Unit tests)
docker compose exec php vendor/bin/phpunit

# Behat (BDD tests)
docker compose exec php vendor/bin/behat

# PHPStan (Static analysis)
docker compose exec php vendor/bin/phpstan analyse
```

### Testes Específicos

```bash
# Testar entidade específica
docker compose exec php vendor/bin/phpunit tests/Entity/ChargingSessionTest.php

# Testar feature específica
docker compose exec php vendor/bin/behat features/charging/create_session.feature
```

---

## 📚 Comandos Úteis

### Symfony Console

```bash
# Listar todos comandos
docker compose exec php bin/console

# Criar nova entidade
docker compose exec php bin/console make:entity

# Criar migração
docker compose exec php bin/console make:migration
docker compose exec php bin/console doctrine:migrations:migrate

# Limpar cache
docker compose exec php bin/console cache:clear

# Listar rotas
docker compose exec php bin/console debug:router
```

### Database

```bash
# Resetar database (CUIDADO: apaga tudo!)
docker compose exec php bin/console doctrine:database:drop --force
docker compose exec php bin/console doctrine:database:create
docker compose exec php bin/console doctrine:migrations:migrate -n
docker compose exec php bin/console sylius:install -n

# Backup database
docker compose exec postgres pg_dump -U sylius sylius > backup.sql

# Restaurar backup
docker compose exec -T postgres psql -U sylius sylius < backup.sql
```

### Assets

```bash
# Compilar assets (desenvolvimento)
docker compose exec nodejs yarn dev

# Compilar assets (produção)
docker compose exec nodejs yarn build

# Watch mode (auto-recompila)
docker compose exec nodejs yarn watch
```

---

## 🔧 Configuração

### Variáveis de Ambiente Principais

Editar `.env.local`:

```bash
# App
APP_ENV=dev
APP_SECRET=change_me

# Database
DATABASE_URL="postgresql://sylius:sylius@postgres:5432/sylius?serverVersion=16&charset=utf8"

# Mailer
MAILER_DSN=smtp://mailhog:1025

# Stripe (Pagamentos)
STRIPE_SECRET_KEY=sk_test_...
STRIPE_PUBLIC_KEY=pk_test_...

# OCPP Server
OCPP_WEBSOCKET_PORT=9000

# API
CORS_ALLOW_ORIGIN=^https?://(localhost|127\.0\.0\.1)(:[0-9]+)?$
```

### Configuração OCPP (Bifrost Específico)

Criar `config/packages/bifrost_ocpp.yaml`:

```yaml
bifrost_ocpp:
    websocket:
        host: '0.0.0.0'
        port: 9000
    protocol:
        version: '1.6'
        supported_versions: ['1.6', '2.0.1']
    timeout:
        connection: 30
        response: 10
```

---

## 🐳 Docker

### Containers

```bash
# Ver containers rodando
docker compose ps

# Logs de container específico
docker compose logs -f php
docker compose logs -f postgres
docker compose logs -f nodejs

# Acessar container
docker compose exec php bash
docker compose exec postgres psql -U sylius

# Parar containers
docker compose down

# Parar e remover volumes (CUIDADO: apaga database!)
docker compose down -v
```

### Compose Override

Para desenvolvimento local, criar `compose.override.yml`:

```yaml
version: '3.8'

services:
  php:
    volumes:
      - ./:/app
    environment:
      APP_ENV: dev
      APP_DEBUG: 1

  postgres:
    ports:
      - "5432:5432"
```

---

## 📖 Documentação de Referência

### Sylius

- **Docs Oficiais:** https://docs.sylius.com
- **Cookbook:** https://docs.sylius.com/en/latest/cookbook/
- **API Platform:** https://api-platform.com/docs/

### Symfony

- **Docs:** https://symfony.com/doc/current/index.html
- **Best Practices:** https://symfony.com/doc/current/best_practices.html

### OCPP

- **Especificação 1.6:** https://www.openchargealliance.org/protocols/ocpp-16/
- **Especificação 2.0.1:** https://www.openchargealliance.org/protocols/ocpp-201/

---

## 🚧 Desenvolvimento

### Workflow

```bash
# 1. Criar feature branch (na raiz do projeto, não aqui!)
cd ..
git flow feature start backend-ocpp-server

# 2. Desenvolver no diretório app/
cd app/
# ... fazer mudanças ...

# 3. Testar
docker compose exec php vendor/bin/phpunit
docker compose exec php vendor/bin/behat

# 4. Commit (na raiz do projeto!)
cd ..
git add app/
git commit -m "feat(backend): Implementar servidor OCPP WebSocket"

# 5. Finalizar feature
git flow feature finish backend-ocpp-server
```

### Code Style

```bash
# Verificar code style
docker compose exec php vendor/bin/ecs check

# Corrigir automaticamente
docker compose exec php vendor/bin/ecs check --fix
```

---

## 🔐 Segurança

### Boas Práticas

1. **Nunca commitar `.env` com dados sensíveis**
2. **Usar `.env.local` para configurações locais**
3. **Rodar `composer audit` regularmente**
4. **Manter Sylius e dependências atualizadas**

```bash
# Verificar vulnerabilidades
docker compose exec php composer audit

# Atualizar dependências (com cuidado!)
docker compose exec php composer update
```

---

## 🆘 Troubleshooting

### Problema: Cache não limpa

```bash
# Limpar cache manualmente
rm -rf var/cache/*
docker compose exec php bin/console cache:clear
```

### Problema: Permissões

```bash
# Dar permissões corretas
docker compose exec php chown -R www-data:www-data var/
docker compose exec php chmod -R 775 var/
```

### Problema: Database connection failed

```bash
# Verificar se postgres está rodando
docker compose ps postgres

# Verificar logs
docker compose logs postgres

# Recrear database
docker compose exec php bin/console doctrine:database:drop --force
docker compose exec php bin/console doctrine:database:create
docker compose exec php bin/console doctrine:migrations:migrate -n
```

### Problema: Composer install falha

```bash
# Limpar cache do composer
docker compose exec php composer clear-cache

# Reinstalar com --no-scripts
docker compose exec php composer install --no-scripts
```

---

## 📞 Suporte

### Issues

Para problemas específicos da **aplicação Bifrost**:
- **Issues:** https://github.com/taciclei/Bifrost/issues

Para problemas com **Sylius**:
- **Sylius Issues:** https://github.com/Sylius/Sylius/issues
- **Sylius Slack:** https://sylius.com/slack

---

## 📜 Licença

Este projeto (Bifrost) está licenciado sob a **Licença MIT**.

Sylius é licenciado sob a **Licença MIT**.

---

**Desenvolvido por:** Equipe Bifrost
**Baseado em:** Sylius/Sylius-Standard
**Última atualização:** 15 de Novembro de 2025

🌈⚡ **Bifrost - A ponte para o futuro elétrico**
