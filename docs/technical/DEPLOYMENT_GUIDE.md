# 🚀 Guia de Deployment - Eletroposto

**Versão:** 1.0
**Última Atualização:** Janeiro 2025

---

## 📑 Índice

1. [Pré-requisitos](#pré-requisitos)
2. [Ambientes](#ambientes)
3. [Deployment em Staging](#deployment-em-staging)
4. [Deployment em Produção](#deployment-em-produção)
5. [Rollback](#rollback)
6. [Monitoramento Pós-Deploy](#monitoramento-pós-deploy)
7. [Troubleshooting](#troubleshooting)

---

## 🎯 Pré-requisitos

### Ferramentas Necessárias

```bash
# Docker
docker --version  # ≥ 24.0

# Docker Compose
docker-compose --version  # ≥ 2.20

# AWS CLI (se usar AWS)
aws --version  # ≥ 2.13

# kubectl (se usar Kubernetes)
kubectl version --client  # ≥ 1.28

# Terraform (Infrastructure as Code)
terraform --version  # ≥ 1.6
```

### Credenciais Necessárias

- [ ] Acesso SSH aos servidores
- [ ] Credenciais AWS (Access Key + Secret)
- [ ] Credenciais Docker Registry
- [ ] Chaves SSL/TLS (Let's Encrypt ou compradas)
- [ ] Tokens de API (Stripe, Mercado Pago, SendGrid)

---

## 🌍 Ambientes

### Estrutura de Ambientes

```
┌─────────────────────┐
│   Development       │  Local (Docker Compose)
│   localhost:80      │
└─────────────────────┘
          ↓
┌─────────────────────┐
│   Staging           │  AWS EC2 / DigitalOcean
│   staging.eletro... │
└─────────────────────┘
          ↓
┌─────────────────────┐
│   Production        │  AWS / DigitalOcean
│   api.eletroposto...│
└─────────────────────┘
```

### Configuração por Ambiente

| Variável | Development | Staging | Production |
|----------|-------------|---------|------------|
| `APP_ENV` | `dev` | `staging` | `prod` |
| `APP_DEBUG` | `true` | `true` | `false` |
| `DATABASE_URL` | `postgres:5432` | RDS endpoint | RDS endpoint |
| `REDIS_URL` | `redis:6379` | ElastiCache | ElastiCache |
| `CORS_ALLOW_ORIGIN` | `*` | `staging.eletro...` | `eletroposto.com.br` |

---

## 🧪 Deployment em Staging

### 1. Preparação

```bash
# Clone ou pull latest code
git checkout develop
git pull origin develop

# Verificar se todos os testes passam
make test

# Build da imagem Docker
docker build -t eletroposto:staging-$(git rev-parse --short HEAD) .
```

### 2. Push para Docker Registry

```bash
# Login no Docker Hub (ou AWS ECR)
docker login

# Tag da imagem
docker tag eletroposto:staging-abc123 \
  seu-usuario/eletroposto:staging-abc123

# Push
docker push seu-usuario/eletroposto:staging-abc123
```

### 3. Deploy no Servidor Staging

#### Opção A: Docker Compose (Simples)

```bash
# SSH no servidor
ssh ubuntu@staging.eletroposto.com.br

# Pull latest code
cd /var/www/eletroposto
git pull origin develop

# Pull nova imagem
docker-compose pull

# Restart services
docker-compose up -d

# Migrations
docker-compose exec php php bin/console doctrine:migrations:migrate --no-interaction

# Clear cache
docker-compose exec php php bin/console cache:clear
```

#### Opção B: Kubernetes (Avançado)

```bash
# Apply latest manifests
kubectl apply -f k8s/staging/

# Verificar rollout
kubectl rollout status deployment/eletroposto-api -n staging

# Verificar pods
kubectl get pods -n staging
```

### 4. Smoke Tests

```bash
# Health check
curl https://staging.eletroposto.com.br/health

# Test API endpoint
curl -X POST https://staging.eletroposto.com.br/api/login \
  -H "Content-Type: application/json" \
  -d '{"email":"test@example.com","password":"test123"}'

# Verificar logs
docker-compose logs -f --tail=100
```

---

## 🚀 Deployment em Produção

### Checklist Pré-Deploy

- [ ] Todos os testes passando (unit, integration, e2e)
- [ ] PHPStan level 8 sem erros
- [ ] Code review aprovado
- [ ] Staging testado e aprovado pelo QA
- [ ] Migrations testadas em staging
- [ ] Backup da base de dados
- [ ] Comunicação para stakeholders (janela de manutenção)
- [ ] Rollback plan documentado

### 1. Criar Release Tag

```bash
# Merge develop → main
git checkout main
git merge develop

# Criar tag semântica
git tag -a v1.2.0 -m "Release 1.2.0: Add OCPP heartbeat support"

# Push tag
git push origin v1.2.0
```

### 2. Build Produção

```bash
# Build otimizado para produção
docker build \
  --build-arg APP_ENV=prod \
  --build-arg BUILD_DATE=$(date -u +'%Y-%m-%dT%H:%M:%SZ') \
  --build-arg VCS_REF=$(git rev-parse --short HEAD) \
  -t eletroposto:v1.2.0 \
  .

# Tag para registry
docker tag eletroposto:v1.2.0 \
  seu-usuario/eletroposto:v1.2.0

docker tag eletroposto:v1.2.0 \
  seu-usuario/eletroposto:latest

# Push
docker push seu-usuario/eletroposto:v1.2.0
docker push seu-usuario/eletroposto:latest
```

### 3. Backup da Base de Dados

```bash
# Conectar ao servidor de produção
ssh ubuntu@prod.eletroposto.com.br

# Backup PostgreSQL
docker exec eletroposto_db pg_dump \
  -U sylius \
  eletroposto \
  | gzip > /backups/eletroposto_$(date +%Y%m%d_%H%M%S).sql.gz

# Verificar backup
ls -lh /backups/

# Upload para S3 (opcional)
aws s3 cp /backups/eletroposto_*.sql.gz \
  s3://eletroposto-backups/production/
```

### 4. Ativar Modo de Manutenção

```bash
# Criar arquivo de manutenção
docker-compose exec php touch public/maintenance.flag

# Ou via Nginx
sudo cp /etc/nginx/maintenance.html /var/www/html/public/maintenance.html
sudo nginx -s reload
```

### 5. Deploy da Nova Versão

```bash
# Pull nova versão
docker-compose pull

# Stop containers antigos
docker-compose down

# Start com nova versão
docker-compose up -d

# Aguardar containers iniciarem
sleep 30

# Executar migrations
docker-compose exec php php bin/console \
  doctrine:migrations:migrate --no-interaction --allow-no-migration

# Clear cache produção
docker-compose exec php php bin/console cache:clear --env=prod

# Warmup cache
docker-compose exec php php bin/console cache:warmup --env=prod
```

### 6. Verificar Deploy

```bash
# Health check
curl https://api.eletroposto.com.br/health

# Verificar versão
curl https://api.eletroposto.com.br/api/version

# Logs em tempo real
docker-compose logs -f --tail=100

# Verificar métricas
# (Prometheus, Grafana, New Relic, etc.)
```

### 7. Desativar Modo de Manutenção

```bash
# Remover flag de manutenção
docker-compose exec php rm public/maintenance.flag

# Ou via Nginx
sudo rm /var/www/html/public/maintenance.html
sudo nginx -s reload
```

### 8. Monitoramento Pós-Deploy (1 hora)

```bash
# Monitorar logs
docker-compose logs -f

# Verificar métricas:
# - Taxa de erro (< 0.5%)
# - Latência (p95 < 300ms)
# - CPU/Memory usage
# - Database connections

# Verificar alertas no Slack/PagerDuty
```

---

## ⏪ Rollback

### Quando Fazer Rollback?

- ❌ Taxa de erro > 1%
- ❌ Latência p95 > 1000ms
- ❌ Downtime > 5 minutos
- ❌ Bugs críticos em produção
- ❌ Perda de dados

### Procedimento de Rollback

#### 1. Rollback de Código

```bash
# Voltar para versão anterior
docker-compose down

# Pull versão anterior (exemplo: v1.1.9)
docker pull seu-usuario/eletroposto:v1.1.9

# Editar docker-compose.yml
# Alterar image: eletroposto:v1.2.0 → eletroposto:v1.1.9

# Restart
docker-compose up -d
```

#### 2. Rollback de Database (se necessário)

```bash
# Restore do backup
docker exec -i eletroposto_db psql \
  -U sylius \
  -d eletroposto \
  < /backups/eletroposto_20250108_100000.sql

# Ou reverter migrations específicas
docker-compose exec php php bin/console \
  doctrine:migrations:migrate prev --no-interaction
```

#### 3. Verificar Rollback

```bash
# Health check
curl https://api.eletroposto.com.br/health

# Verificar versão
curl https://api.eletroposto.com.br/api/version

# Logs
docker-compose logs -f
```

---

## 📊 Monitoramento Pós-Deploy

### Métricas Críticas (Primeiras 24h)

#### Application Performance

```bash
# Latência média (deve ser < 200ms)
# Latência p95 (deve ser < 500ms)
# Taxa de erro (deve ser < 0.5%)
# Throughput (req/s)
```

#### Infrastructure

```bash
# CPU usage (deve ser < 70%)
docker stats --no-stream

# Memory usage (deve ser < 80%)
docker stats --no-stream

# Disk usage
df -h

# Network I/O
iftop
```

#### Database

```sql
-- Conexões ativas (deve ser < 80% do pool)
SELECT count(*) FROM pg_stat_activity;

-- Queries lentas (> 1s)
SELECT query, query_start, state
FROM pg_stat_activity
WHERE state = 'active'
AND now() - query_start > interval '1 second';

-- Tamanho do banco
SELECT pg_size_pretty(pg_database_size('eletroposto'));
```

### Alertas Configurados

| Métrica | Threshold | Ação |
|---------|-----------|------|
| Taxa de erro | > 1% | PagerDuty alert |
| Latência p95 | > 1000ms | Slack warning |
| CPU | > 85% | Auto-scale |
| Memory | > 90% | PagerDuty alert |
| Disk | > 80% | Slack warning |
| PostgreSQL connections | > 80 | Slack warning |

---

## 🐛 Troubleshooting

### Problema: Containers não iniciam

```bash
# Verificar logs
docker-compose logs

# Verificar configurações
docker-compose config

# Verificar recursos
docker system df
docker system prune  # Liberar espaço

# Reconstruir do zero
docker-compose down -v
docker-compose build --no-cache
docker-compose up -d
```

### Problema: Database connection errors

```bash
# Verificar se PostgreSQL está rodando
docker-compose ps

# Logs do PostgreSQL
docker-compose logs postgres

# Testar conexão manualmente
docker-compose exec php php bin/console doctrine:query:sql "SELECT 1"

# Verificar variáveis de ambiente
docker-compose exec php env | grep DATABASE
```

### Problema: 502 Bad Gateway (Nginx)

```bash
# Verificar se PHP-FPM está rodando
docker-compose ps php

# Logs do Nginx
docker-compose logs nginx

# Logs do PHP
docker-compose logs php

# Testar PHP-FPM diretamente
docker-compose exec php php-fpm -t

# Reiniciar PHP-FPM
docker-compose restart php
```

### Problema: Performance degradada

```bash
# Verificar queries lentas
docker-compose exec postgres psql -U sylius -d eletroposto

SELECT * FROM pg_stat_statements
ORDER BY mean_exec_time DESC
LIMIT 10;

# Clear cache
docker-compose exec php php bin/console cache:clear

# Verificar índices faltantes
docker-compose exec php php bin/console doctrine:schema:validate

# Analisar queries N+1 (Symfony Profiler)
# Acessar: /_profiler
```

### Problema: Sessões OCPP não conectam

```bash
# Verificar WebSocket server
docker-compose logs websocket

# Testar conexão WebSocket
wscat -c ws://localhost:9000

# Verificar firewall
sudo ufw status

# Verificar porta aberta
netstat -tulpn | grep 9000

# Logs detalhados
docker-compose exec websocket tail -f /var/log/ocpp.log
```

---

## 🔐 Segurança em Produção

### Checklist de Segurança

- [ ] HTTPS habilitado (TLS 1.3)
- [ ] Certificado SSL válido (Let's Encrypt ou comercial)
- [ ] Firewall configurado (apenas portas 80, 443, 9000)
- [ ] SSH apenas com chave (senha desabilitada)
- [ ] Secrets em variáveis de ambiente (não no código)
- [ ] Rate limiting configurado
- [ ] CORS restrito (apenas domínios autorizados)
- [ ] Database em rede privada (não exposta)
- [ ] Backups automáticos diários
- [ ] Logs centralizados (ELK ou CloudWatch)
- [ ] Monitoring ativo (Prometheus + Grafana)
- [ ] Alertas configurados (PagerDuty)

### Renovar Certificado SSL

```bash
# Let's Encrypt (automático)
docker-compose exec nginx certbot renew

# Ou manual
sudo certbot renew --nginx

# Verificar expiração
echo | openssl s_client -servername api.eletroposto.com.br \
  -connect api.eletroposto.com.br:443 2>/dev/null \
  | openssl x509 -noout -dates
```

---

## 📅 Cronograma de Manutenção

### Diário
- [ ] Verificar logs de erro
- [ ] Verificar métricas de performance
- [ ] Verificar alertas

### Semanal
- [ ] Review de capacity (CPU, Memory, Disk)
- [ ] Atualizar dependências menores (patches)
- [ ] Verificar backups

### Mensal
- [ ] Atualizar dependências (minor versions)
- [ ] Review de segurança (scan de vulnerabilidades)
- [ ] Otimização de queries lentas
- [ ] Cleanup de logs antigos

### Trimestral
- [ ] Atualizar framework (Symfony)
- [ ] Disaster recovery drill (testar restore)
- [ ] Capacity planning (previsão 6 meses)
- [ ] Review de arquitetura

---

## 🤖 CI/CD Automation (GitHub Actions)

### Arquivo: `.github/workflows/deploy.yml`

```yaml
name: Deploy to Production

on:
  push:
    tags:
      - 'v*'

jobs:
  test:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.3'

      - name: Install dependencies
        run: composer install --prefer-dist --no-progress

      - name: Run tests
        run: php bin/phpunit

      - name: PHPStan
        run: vendor/bin/phpstan analyse

  build:
    needs: test
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4

      - name: Build Docker image
        run: |
          docker build -t eletroposto:${{ github.ref_name }} .
          docker tag eletroposto:${{ github.ref_name }} \
            ${{ secrets.DOCKER_USERNAME }}/eletroposto:${{ github.ref_name }}

      - name: Push to Docker Hub
        run: |
          echo ${{ secrets.DOCKER_PASSWORD }} | docker login -u ${{ secrets.DOCKER_USERNAME }} --password-stdin
          docker push ${{ secrets.DOCKER_USERNAME }}/eletroposto:${{ github.ref_name }}

  deploy:
    needs: build
    runs-on: ubuntu-latest
    steps:
      - name: Deploy to production
        uses: appleboy/ssh-action@master
        with:
          host: ${{ secrets.PROD_HOST }}
          username: ${{ secrets.PROD_USER }}
          key: ${{ secrets.SSH_PRIVATE_KEY }}
          script: |
            cd /var/www/eletroposto
            docker-compose pull
            docker-compose up -d
            docker-compose exec php php bin/console doctrine:migrations:migrate --no-interaction
            docker-compose exec php php bin/console cache:clear --env=prod

  notify:
    needs: deploy
    runs-on: ubuntu-latest
    steps:
      - name: Notify Slack
        uses: 8398a7/action-slack@v3
        with:
          status: ${{ job.status }}
          text: 'Deploy ${{ github.ref_name }} to production completed!'
          webhook_url: ${{ secrets.SLACK_WEBHOOK }}
```

---

## 📞 Contatos de Emergência

| Papel | Nome | Telefone | Email |
|-------|------|----------|-------|
| **On-Call DevOps** | - | - | oncall@eletroposto.com.br |
| **CTO** | - | - | cto@eletroposto.com.br |
| **AWS Support** | - | - | Premium Support |
| **Database Admin** | - | - | dba@eletroposto.com.br |

---

**Última revisão:** Janeiro 2025
**Próxima revisão:** Abril 2025
**Responsável:** Equipe DevOps
