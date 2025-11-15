# 🌈⚡ Bifrost - Docker Infrastructure Documentation

## 📋 Visão Geral

A plataforma Bifrost utiliza uma arquitetura de microserviços baseada em **API Platform + Hydra**, com Docker Compose para orquestração local e Kubernetes para produção.

### Arquitetura

```
┌─────────────────────────────────────────────────────────────────┐
│                         Bifrost Platform                         │
├─────────────────────────────────────────────────────────────────┤
│                                                                   │
│  ┌──────────────┐     ┌──────────────┐     ┌──────────────┐    │
│  │              │     │              │     │              │    │
│  │  PWA (Next)  │────▶│  FrankenPHP  │◀────│ OCPP Server  │    │
│  │  Frontend    │     │ API Platform │     │  WebSocket   │    │
│  │              │     │   + Sylius   │     │              │    │
│  └──────────────┘     └──────┬───────┘     └──────────────┘    │
│                              │                                   │
│                              │                                   │
│  ┌──────────────┐     ┌──────▼───────┐     ┌──────────────┐    │
│  │              │     │              │     │              │    │
│  │   Keycloak   │     │  PostgreSQL  │     │    Redis     │    │
│  │  Auth OIDC   │     │   Database   │     │    Cache     │    │
│  │              │     │              │     │              │    │
│  └──────────────┘     └──────────────┘     └──────────────┘    │
│                                                                   │
└─────────────────────────────────────────────────────────────────┘
```

## 🚀 Serviços

### 1. PHP + FrankenPHP (Porta 80, 443, 2019)

**Tecnologias:** PHP 8.3, FrankenPHP, Caddy, API Platform 4.x, Sylius 1.13+

**Características:**
- Servidor HTTP moderno com HTTP/2, HTTP/3 (QUIC)
- Worker mode: aplicação persistente em memória
- Mercure Hub integrado (Server-Sent Events)
- Compressão Zstandard + Gzip
- Vulcain (HTTP/2 Server Push)

**Health Check:** `http://localhost:2019/metrics`

**Endpoints:**
- `http://localhost/` - API entrypoint (Hydra)
- `http://localhost/api` - API resources
- `http://localhost/admin` - Sylius admin
- `http://localhost/.well-known/mercure` - Mercure hub
- `http://localhost:2019/metrics` - Prometheus metrics

### 2. PostgreSQL 16 (Porta 5432)

**Database principal** para Sylius, OCPP, transações

**Características:**
- Encoding UTF-8, locale pt_BR
- Health checks automáticos
- Backup automatizado (produção)

**Conexão:**
```bash
psql -h localhost -U bifrost -d bifrost
```

### 3. Redis 7 (Porta 6379)

**Cache & Session Storage**

**Características:**
- Persistência AOF (Append-Only File)
- Política LRU para eviction
- 512MB em dev, 2GB em produção

**Conexão:**
```bash
redis-cli -h localhost
```

### 4. PWA - Next.js (Porta 3000)

**Frontend headless** consumindo API Hydra

**Características:**
- Next.js 15+ com React Server Components
- NextAuth para autenticação OIDC
- Hot reload em desenvolvimento
- Standalone build para produção

**URL:** `http://localhost:3000`

### 5. OCPP WebSocket Server (Portas 9000, 9443)

**Servidor OCPP 1.6 / 2.0.1** para charge points

**Características:**
- WebSocket (ws://) na porta 9000
- WebSocket Secure (wss://) na porta 9443
- Autenticação TLS com certificados cliente
- Logging estruturado de mensagens

**Conexão:**
```bash
# Test WebSocket
websocat ws://localhost:9000/CP001
```

### 6. Keycloak (Porta 8080)

**OIDC/OAuth2 Authentication Server**

**Características:**
- Realms customizados
- Client credentials para PWA
- User federation
- Multi-factor authentication

**Admin Console:** `http://localhost:8080`
- **Usuário:** `admin`
- **Senha:** `admin` (dev) / `${KEYCLOAK_ADMIN_PASSWORD}` (prod)

### 7. MailHog (Portas 1025, 8025)

**SMTP testing server** (apenas desenvolvimento)

**Web UI:** `http://localhost:8025`

### 8. pgAdmin (Porta 5050)

**PostgreSQL Management** (apenas desenvolvimento)

**URL:** `http://localhost:5050`
- **Email:** `admin@bifrost.local`
- **Senha:** `bifrost`

### 9. Messenger Consumer

**Symfony Messenger** para processamento assíncrono

**Características:**
- Consome mensagens da fila Doctrine
- Retry automático em caso de erro
- Logging detalhado

## 📦 Instalação

### Pré-requisitos

```bash
- Docker 24.x+
- Docker Compose 2.x+
- 8GB RAM mínimo (16GB recomendado)
- 20GB espaço em disco
```

### Setup Inicial

```bash
# 1. Clonar repositório
git clone https://github.com/taciclei/Bifrost.git
cd Bifrost

# 2. Copiar variáveis de ambiente
cp .env.example .env

# 3. Editar variáveis (opcional)
nano .env

# 4. Iniciar containers
docker compose up -d

# 5. Aguardar health checks
docker compose ps

# 6. Instalar dependências Sylius
docker compose exec php composer install

# 7. Criar database
docker compose exec php bin/console doctrine:database:create

# 8. Executar migrações
docker compose exec php bin/console doctrine:migrations:migrate -n

# 9. Instalar Sylius
docker compose exec php bin/console sylius:install -n

# 10. (Opcional) Carregar dados de exemplo
docker compose exec php bin/console sylius:fixtures:load -n
```

### Acessar Aplicação

- **API:** `http://localhost/api`
- **API Docs:** `http://localhost/docs`
- **Admin Sylius:** `http://localhost/admin` (sylius@example.com / sylius)
- **PWA:** `http://localhost:3000`
- **Keycloak:** `http://localhost:8080`
- **MailHog:** `http://localhost:8025`
- **pgAdmin:** `http://localhost:5050`

## 🛠️ Comandos Úteis

### Docker Compose

```bash
# Iniciar todos os serviços
docker compose up -d

# Ver logs de todos os serviços
docker compose logs -f

# Ver logs de um serviço específico
docker compose logs -f php

# Parar todos os serviços
docker compose down

# Parar e remover volumes (CUIDADO: apaga database!)
docker compose down -v

# Rebuild de imagens
docker compose build --no-cache

# Ver status dos containers
docker compose ps

# Ver uso de recursos
docker stats
```

### Symfony Console (PHP)

```bash
# Acessar console
docker compose exec php bin/console

# Cache
docker compose exec php bin/console cache:clear
docker compose exec php bin/console cache:warmup

# Database
docker compose exec php bin/console doctrine:database:create
docker compose exec php bin/console doctrine:migrations:migrate -n
docker compose exec php bin/console doctrine:schema:validate

# Fixtures
docker compose exec php bin/console doctrine:fixtures:load -n
docker compose exec php bin/console sylius:fixtures:load -n

# Messenger
docker compose exec php bin/console messenger:consume async -vv
docker compose exec php bin/console messenger:failed:show

# OCPP (custom commands)
docker compose exec php bin/console ocpp:server:start
docker compose exec php bin/console ocpp:charge-point:list
docker compose exec php bin/console ocpp:send-command RemoteStart CP001
```

### Acesso aos Containers

```bash
# Acessar shell do container PHP
docker compose exec php sh

# Acessar bash do PostgreSQL
docker compose exec database psql -U bifrost

# Acessar Redis CLI
docker compose exec redis redis-cli

# Acessar shell do PWA
docker compose exec pwa sh
```

## 🔧 Desenvolvimento

### Hot Reload

**PHP/Symfony:**
- Código em `./app` é montado como volume
- Mudanças refletidas instantaneamente
- Sem rebuild necessário

**Next.js/PWA:**
- Código em `./pwa` é montado como volume
- Hot Module Replacement (HMR) ativo
- Mudanças refletidas no navegador

### Debugging

**XDebug (PHP):**

```bash
# Habilitar XDebug
export XDEBUG_MODE=debug
docker compose up -d php

# Configurar IDE (VSCode/PHPStorm) para port 9003
```

**Next.js Debugging:**

```bash
# Dev tools nativos do navegador
# ou Node.js inspector na porta 9229
```

### Testes

```bash
# PHPUnit (backend)
docker compose exec php vendor/bin/phpunit

# Behat (BDD)
docker compose exec php vendor/bin/behat

# PHPStan (static analysis)
docker compose exec php vendor/bin/phpstan analyse

# Jest (frontend - quando configurado)
docker compose exec pwa pnpm test
```

## 🚀 Produção

### Build de Imagens Produção

```bash
# Build com docker-compose.prod.yml
docker compose -f docker-compose.yml -f docker-compose.prod.yml build

# Push para registry
docker compose -f docker-compose.yml -f docker-compose.prod.yml push
```

### Deploy

```bash
# Usando docker-compose.prod.yml
docker compose -f docker-compose.yml -f docker-compose.prod.yml up -d

# Ou Kubernetes (ver helm charts)
helm install bifrost ./helm/bifrost
```

### Variáveis de Ambiente Produção

**Obrigatório alterar:**
```bash
APP_SECRET=<gerado com: openssl rand -base64 32>
DATABASE_URL=postgresql://user:pass@host:5432/db
POSTGRES_PASSWORD=<senha forte>
REDIS_PASSWORD=<senha forte>
MERCURE_JWT_SECRET=<gerado com: openssl rand -base64 32>
NEXTAUTH_SECRET=<gerado com: openssl rand -base64 32>
KEYCLOAK_ADMIN_PASSWORD=<senha forte>
OCPP_REQUIRE_AUTH=true
```

## 📊 Monitoramento

### Metrics (Prometheus)

**Caddy metrics:**
```bash
curl http://localhost:2019/metrics
```

**Métricas disponíveis:**
- `caddy_http_requests_total`
- `caddy_http_request_duration_seconds`
- `caddy_http_response_size_bytes`
- Custom: `ocpp_messages_total`, `ocpp_connections_total`

### Health Checks

```bash
# PHP/FrankenPHP
curl http://localhost/health

# Database
docker compose exec database pg_isready -U bifrost

# Redis
docker compose exec redis redis-cli ping

# PWA
curl http://localhost:3000/api/health

# OCPP
nc -zv localhost 9000
```

### Logs

```bash
# Logs centralizados
docker compose logs -f --tail=100

# Logs estruturados (JSON em produção)
docker compose exec php tail -f /app/var/log/prod.log

# Logs OCPP
docker compose exec ocpp tail -f /app/var/log/ocpp.log
```

## 🔐 Segurança

### TLS/HTTPS

**Desenvolvimento:**
- Certificados self-signed gerados automaticamente pelo Caddy
- Trust no navegador necessário

**Produção:**
- Let's Encrypt automático via Caddy
- HSTS headers
- HTTP/3 (QUIC) habilitado

### Secrets Management

**Desenvolvimento:**
- Arquivo `.env` local

**Produção:**
- Docker Secrets
- Kubernetes Secrets
- HashiCorp Vault (opcional)

## 🐛 Troubleshooting

### Container não inicia

```bash
# Ver logs detalhados
docker compose logs <service>

# Verificar health checks
docker inspect <container> | grep Health

# Rebuild sem cache
docker compose build --no-cache <service>
```

### Database connection failed

```bash
# Verificar se PostgreSQL está rodando
docker compose ps database

# Testar conexão
docker compose exec database pg_isready

# Verificar URL no .env
cat .env | grep DATABASE_URL
```

### Permissões negadas (var/)

```bash
# Dar permissões corretas
docker compose exec php chown -R www-data:www-data var/
docker compose exec php chmod -R 775 var/
```

### Cache não limpa

```bash
# Limpar cache manualmente
docker compose exec php rm -rf var/cache/*
docker compose exec php bin/console cache:clear
```

### OCPP WebSocket não conecta

```bash
# Verificar se servidor está rodando
docker compose logs ocpp

# Testar porta
nc -zv localhost 9000

# Ver logs de conexão
docker compose exec ocpp tail -f var/log/ocpp.log
```

## 📚 Referências

### Documentação Oficial

- **API Platform:** https://api-platform.com/docs/
- **Sylius:** https://docs.sylius.com
- **FrankenPHP:** https://frankenphp.dev
- **Mercure:** https://mercure.rocks
- **Caddy:** https://caddyserver.com/docs/
- **Next.js:** https://nextjs.org/docs
- **Keycloak:** https://www.keycloak.org/documentation

### Bifrost Específico

- **Business Plan:** [BUSINESS_PLAN.md](./BUSINESS_PLAN.md)
- **Roadmap:** [ROTEIRO_PT-BR.md](./ROTEIRO_PT-BR.md)
- **Gitflow:** [GITFLOW.md](./GITFLOW.md)
- **README:** [README.md](./README.md)

---

**Desenvolvido por:** Equipe Bifrost
**Última atualização:** 15 de Novembro de 2025

🌈⚡ **Bifrost - A ponte para o futuro elétrico**
