# 🚀 Guia de Início Rápido - Eletroposto

Guia prático para configurar e executar o sistema de gestão de eletropostos em 15 minutos.

## 📋 Pré-requisitos

Antes de começar, certifique-se de ter instalado:

- **Docker** 24.0+ ([Instalar Docker](https://docs.docker.com/get-docker/))
- **Docker Compose** 2.20+ (geralmente incluído com Docker Desktop)
- **Git** 2.30+
- **Make** (opcional, facilita comandos)

### Verificar instalação:

```bash
docker --version          # Docker version 24.0.0+
docker-compose --version  # Docker Compose version v2.20.0+
git --version             # git version 2.30.0+
make --version            # GNU Make 4.3+
```

## 🎯 Instalação Rápida (3 passos)

### 1️⃣ Clonar o Repositório

```bash
git clone https://github.com/seu-usuario/eletroposto.git
cd eletroposto
```

### 2️⃣ Configurar Variáveis de Ambiente

```bash
# Copiar arquivo de exemplo
cp .env.dist .env

# Editar configurações (opcional para desenvolvimento)
nano .env  # ou seu editor preferido
```

**Configurações mínimas para desenvolvimento:**
- `APP_SECRET`: Já está configurado, pode manter
- `DATABASE_URL`: Já está configurado para Docker
- `SYLIUS_ADMIN_EMAIL`: admin@eletroposto.com.br
- `SYLIUS_ADMIN_PASSWORD`: admin123 (MUDAR EM PRODUÇÃO!)

### 3️⃣ Iniciar o Projeto

**Com Make (recomendado):**
```bash
make install
```

**Ou manualmente:**
```bash
# Build dos containers
docker-compose build

# Iniciar containers
docker-compose up -d

# Aguardar PostgreSQL iniciar (10 segundos)
sleep 10

# Instalar dependências
docker-compose exec php composer install

# Criar base de dados e executar migrations
docker-compose exec php php bin/console doctrine:database:create --if-not-exists
docker-compose exec php php bin/console doctrine:migrations:migrate --no-interaction

# Carregar dados de exemplo
docker-compose exec php php bin/console sylius:fixtures:load --no-interaction

# Instalar assets
docker-compose exec php php bin/console assets:install
```

## ✅ Verificar Instalação

### Acessar URLs:

| Serviço | URL | Credenciais |
|---------|-----|-------------|
| **Aplicação Principal** | http://localhost | N/A |
| **Painel Admin** | http://localhost/admin | admin@eletroposto.com.br / admin123 |
| **API Docs** | http://localhost/api/docs | N/A |
| **MailHog (E-mails)** | http://localhost:8025 | N/A |
| **Adminer (BD)** | http://localhost:8080 | postgres: sylius/sylius_password |
| **WebSocket (OCPP)** | ws://localhost:9000 | N/A |

### Testar saúde dos serviços:

```bash
# Verificar containers
docker-compose ps

# Verificar saúde
curl http://localhost/health

# Ou com Make
make status
```

## 🛠️ Comandos Úteis

### Docker

```bash
make up          # Iniciar containers
make down        # Parar containers
make restart     # Reiniciar containers
make logs        # Ver logs de todos os serviços
make logs-php    # Ver logs do PHP
make shell       # Acessar shell do container PHP
```

### Base de Dados

```bash
make db-migrate         # Executar migrations
make db-seed           # Carregar dados de teste
make db-reset          # Reset completo (drop + create + migrate + seed)
make shell-db          # Acessar PostgreSQL CLI
```

### Symfony/Sylius

```bash
make console ARGS="debug:router"              # Executar comando Symfony
make cache-clear                              # Limpar cache
make composer ARGS="require vendor/package"   # Instalar pacote
```

### Testes

```bash
make test              # Executar todos os testes
make test-unit         # Testes unitários
make phpstan           # Análise estática
make cs-fix            # Corrigir code style
```

## 📦 Estrutura do Projeto

```
eletroposto/
├── config/              # Configurações Symfony/Sylius
├── docs/                # Documentação completa
│   ├── planning/        # Estudos de mercado e visão
│   ├── technical/       # Arquitetura e BD
│   └── management/      # Orçamento e gestão
├── infrastructure/
│   ├── docker/          # Dockerfiles e configs
│   └── database/        # Scripts SQL
├── src/                 # Código-fonte PHP
│   ├── Entity/          # Entidades Doctrine
│   ├── Repository/      # Repositórios
│   ├── Controller/      # Controladores
│   ├── Service/         # Serviços de negócio
│   └── WebSocket/       # Servidor OCPP
├── tests/               # Testes automatizados
├── public/              # Assets públicos
├── var/                 # Cache e logs
├── docker-compose.yml   # Orquestração Docker
├── Makefile            # Comandos facilitados
└── README.md           # Documentação principal
```

## 🔧 Resolução de Problemas

### Problema: Containers não iniciam

```bash
# Verificar logs
docker-compose logs

# Verificar portas ocupadas
netstat -an | grep -E '80|5432|6379|9000'

# Reiniciar Docker
# macOS/Windows: Reiniciar Docker Desktop
# Linux:
sudo systemctl restart docker
```

### Problema: Erro de permissões

```bash
# Dar permissões aos diretórios
chmod -R 777 var/cache var/log

# Ou com Docker
docker-compose exec -u root php chmod -R 777 var/cache var/log
```

### Problema: Base de dados não conecta

```bash
# Verificar se PostgreSQL está pronto
docker-compose exec postgres pg_isready -U sylius

# Recriar BD
make db-reset
```

### Problema: Assets não carregam

```bash
# Reinstalar assets
docker-compose exec php php bin/console assets:install --symlink

# Limpar cache
make cache-clear
```

### Problema: Composer muito lento

```bash
# Usar mirror brasileiro
docker-compose exec php composer config repositories.packagist composer https://packagist.com.br
```

## 🎨 Próximos Passos

Após a instalação, explore:

1. **[README.md](README.md)** - Visão geral completa do projeto
2. **[docs/technical/architecture/ARQUITETURA_SYLIUS.md](docs/technical/architecture/ARQUITETURA_SYLIUS.md)** - Arquitetura detalhada
3. **[docs/technical/architecture/DATABASE_SCHEMA.md](docs/technical/architecture/DATABASE_SCHEMA.md)** - Schema da base de dados
4. **[docs/planning/ESTUDO_MERCADO.md](docs/planning/ESTUDO_MERCADO.md)** - Análise de mercado

### Tarefas de desenvolvimento:

```bash
# 1. Criar primeiro usuário admin personalizado
docker-compose exec php php bin/console sylius:admin:create

# 2. Explorar API
curl http://localhost/api/docs

# 3. Testar WebSocket OCPP
# Usar ferramenta como wscat:
# npm install -g wscat
# wscat -c ws://localhost:9000

# 4. Ver e-mails enviados
# Acessar: http://localhost:8025
```

## 📚 Documentação Completa

- **[Arquitetura do Sistema](docs/technical/architecture/ARQUITETURA_SISTEMA.md)**
- **[Integração OCPP 1.6](docs/technical/architecture/ARQUITETURA_SYLIUS.md#servidor-ocpp-16)**
- **[Schema de Base de Dados](docs/technical/architecture/DATABASE_SCHEMA.md)**
- **[Orçamento Detalhado](docs/management/budget/ORCAMENTO_DETALHADO.md)**
- **[Estudo de Mercado](docs/planning/ESTUDO_MERCADO.md)**

## 🤝 Contribuir

Para contribuir com o projeto:

1. Fork o repositório
2. Crie uma branch: `git checkout -b feature/nova-funcionalidade`
3. Commit suas mudanças: `git commit -m 'Add: nova funcionalidade'`
4. Push para a branch: `git push origin feature/nova-funcionalidade`
5. Abra um Pull Request

## 📞 Suporte

- **Documentação**: Consulte a pasta `docs/`
- **Issues**: Abra uma issue no GitHub
- **E-mail**: suporte@eletroposto.com.br

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

**Desenvolvido para impulsionar a mobilidade elétrica em Belém do Pará 🌱⚡**

COP30 2025 | Belém - PA - Brasil
