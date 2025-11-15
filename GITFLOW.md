# 🌊 Gitflow - Bifrost Workflow

**Versão:** 1.0
**Data:** 11 de Janeiro de 2025

---

## 📋 Visão Geral

O projeto **Bifrost** utiliza o **Gitflow** como estratégia de branching para organizar o desenvolvimento, releases e hotfixes de forma estruturada e profissional.

---

## 🌳 Estrutura de Branches

### Branches Principais (Permanentes)

#### 1. `main` (Production)

**Propósito:** Código em produção, sempre estável

**Características:**
- ✅ Sempre deployable
- ✅ Reflete o estado atual em produção
- ✅ Apenas aceita merges de `release/*` ou `hotfix/*`
- ✅ Cada commit é uma versão de produção
- ✅ Protegida (não permite push direto)

**Regras:**
- ❌ NUNCA fazer commit direto em `main`
- ❌ NUNCA fazer push forçado
- ✅ Sempre tagueada com versão semântica (v1.0.0, v1.1.0, etc.)

```bash
# Visualizar histórico main
git log main --oneline --graph

# Verificar última versão
git describe --tags --abbrev=0 main
```

---

#### 2. `develop` (Development)

**Propósito:** Branch de integração para desenvolvimento

**Características:**
- ✅ Contém features completas aguardando release
- ✅ Base para criar `feature/*` branches
- ✅ Sempre deve compilar/rodar sem erros críticos
- ✅ CI/CD roda automaticamente

**Regras:**
- ❌ Não fazer commit direto (exceto pequenos fixes)
- ✅ Aceita merges de `feature/*`
- ✅ Base para criar `release/*`

```bash
# Mudar para develop
git checkout develop

# Atualizar develop
git pull origin develop

# Ver features integradas
git log develop --oneline --graph
```

---

### Branches de Suporte (Temporárias)

#### 3. `feature/*` (Feature Branches)

**Propósito:** Desenvolver novas funcionalidades

**Nomenclatura:**
```
feature/nome-da-funcionalidade
feature/backend-ocpp-server
feature/frontend-dashboard
feature/hardware-pcb-v2
```

**Ciclo de vida:**

```bash
# 1. Criar feature a partir de develop
git flow feature start backend-ocpp-server
# Cria: feature/backend-ocpp-server

# 2. Desenvolver (commits normais)
git add .
git commit -m "feat: Implementar servidor OCPP WebSocket"

# 3. Publicar feature no GitHub (colaboração)
git flow feature publish backend-ocpp-server

# 4. Finalizar feature (merge em develop)
git flow feature finish backend-ocpp-server
# Merge em develop + deleta branch local
```

**Boas práticas:**
- ✅ Uma feature = uma funcionalidade completa
- ✅ Commits descritivos (conventional commits)
- ✅ Testar localmente antes de finalizar
- ✅ Pull request para code review (opcional mas recomendado)

---

#### 4. `release/*` (Release Branches)

**Propósito:** Preparar nova versão para produção

**Nomenclatura:**
```
release/1.0.0
release/1.1.0
release/2.0.0-beta
```

**Quando criar:**
- Quando `develop` tem features suficientes para release
- Quando aproxima-se de um milestone importante
- Quando precisa congelar features e focar em estabilização

**Ciclo de vida:**

```bash
# 1. Criar release a partir de develop
git flow release start 1.0.0
# Cria: release/1.0.0

# 2. Ajustes finais (apenas bugfixes, documentação, versioning)
# Atualizar versão em package.json, composer.json, etc.
git commit -m "chore: Bump version to 1.0.0"

# Corrigir bugs críticos encontrados em QA
git commit -m "fix: Corrigir erro de validação em charging session"

# 3. Finalizar release
git flow release finish 1.0.0
# Isso faz:
#   - Merge em main
#   - Tag v1.0.0 em main
#   - Merge back em develop
#   - Deleta branch release/1.0.0

# 4. Push de tudo
git push origin main develop --tags
```

**O que fazer em release:**
- ✅ Bugfixes menores
- ✅ Atualizar changelog
- ✅ Bump de versão
- ✅ Atualizar documentação
- ❌ NUNCA adicionar novas features

---

#### 5. `hotfix/*` (Hotfix Branches)

**Propósito:** Corrigir bugs críticos em produção

**Nomenclatura:**
```
hotfix/1.0.1
hotfix/critical-payment-bug
```

**Quando usar:**
- ⚠️ Bug crítico em produção
- ⚠️ Segurança comprometida
- ⚠️ Perda de dados
- ⚠️ Sistema fora do ar

**Ciclo de vida:**

```bash
# 1. Criar hotfix a partir de main (urgente!)
git flow hotfix start 1.0.1
# Cria: hotfix/1.0.1 baseado em main

# 2. Corrigir bug
git commit -m "fix: Corrigir divisão por zero em cálculo tarifário"

# 3. Testar rigorosamente

# 4. Finalizar hotfix
git flow hotfix finish 1.0.1
# Isso faz:
#   - Merge em main
#   - Tag v1.0.1 em main
#   - Merge back em develop (para não perder fix)
#   - Deleta branch hotfix/1.0.1

# 5. Deploy imediato para produção
git push origin main develop --tags
```

**Diferença entre hotfix e release:**
- Hotfix: baseado em `main` (urgência)
- Release: baseado em `develop` (planejado)

---

## 🎯 Workflow Visual

```
main (production)         v1.0.0 ──────── v1.0.1 ───── v1.1.0
                              │             ▲            ▲
                              │             │            │
                         release/1.0.0   hotfix/    release/1.1.0
                              │           1.0.1          │
                              ▼             │            ▼
develop (integration)    ────┴─────────────┴────────────┴────
                         ▲   ▲   ▲                  ▲   ▲
                         │   │   │                  │   │
feature/hardware-v2  ────┘   │   │                  │   │
feature/ocpp-server  ────────┘   │                  │   │
feature/dashboard    ────────────┘                  │   │
feature/mobile-app   ───────────────────────────────┘   │
feature/franchising  ───────────────────────────────────┘
```

---

## 📝 Conventional Commits

Usamos **Conventional Commits** para mensagens padronizadas:

### Formato

```
<type>(<scope>): <subject>

<body>

<footer>
```

### Types

| Type | Quando usar | Exemplo |
|------|-------------|---------|
| **feat** | Nova funcionalidade | `feat(backend): Adicionar endpoint de autenticação` |
| **fix** | Correção de bug | `fix(hardware): Corrigir circuito RCD` |
| **docs** | Documentação | `docs(readme): Atualizar instruções de instalação` |
| **style** | Formatação | `style(frontend): Formatar código com Prettier` |
| **refactor** | Refatoração | `refactor(ocpp): Simplificar handler de mensagens` |
| **test** | Testes | `test(backend): Adicionar testes de integração OCPP` |
| **chore** | Manutenção | `chore: Atualizar dependências` |
| **perf** | Performance | `perf(database): Otimizar query de sessões` |
| **ci** | CI/CD | `ci: Adicionar GitHub Actions workflow` |
| **build** | Build | `build: Configurar Webpack` |
| **revert** | Reverter | `revert: Reverter commit abc123` |

### Scopes (Bifrost)

```
backend      - Backend Symfony
frontend     - Frontend React
mobile       - Mobile React Native
hardware     - Hardware KiCad/PCB
firmware     - Firmware STM32
ocpp         - Protocolo OCPP
database     - Schema/migrations
docker       - Docker/infraestrutura
docs         - Documentação
tests        - Testes
```

### Exemplos Reais

```bash
# Feature nova
git commit -m "feat(ocpp): Implementar StartTransaction handler"

# Bugfix
git commit -m "fix(backend): Corrigir cálculo de consumo em kWh"

# Documentação
git commit -m "docs(business-plan): Adicionar projeção 5 anos"

# Breaking change
git commit -m "feat(api)!: Mudar endpoint de /sessions para /charging-sessions

BREAKING CHANGE: API endpoint renomeado de /sessions para /charging-sessions
para evitar conflito com autenticação.

Clientes devem atualizar URLs."

# Múltiplas mudanças
git commit -m "chore: Preparar release v1.0.0

- Bump version em package.json
- Atualizar CHANGELOG.md
- Atualizar README com badges"
```

---

## 🚀 Comandos Gitflow

### Instalação

```bash
# macOS
brew install git-flow

# Linux (Debian/Ubuntu)
sudo apt-get install git-flow

# Verificar instalação
git flow version
```

### Inicialização (já feito no projeto)

```bash
git flow init
# Usar defaults:
# - Production: main
# - Development: develop
# - Feature prefix: feature/
# - Release prefix: release/
# - Hotfix prefix: hotfix/
```

### Features

```bash
# Listar features
git flow feature list

# Criar feature
git flow feature start nome-feature

# Publicar feature (GitHub)
git flow feature publish nome-feature

# Pull de feature publicada
git flow feature pull origin nome-feature

# Finalizar feature
git flow feature finish nome-feature

# Deletar feature remota
git push origin --delete feature/nome-feature
```

### Releases

```bash
# Criar release
git flow release start 1.0.0

# Publicar release
git flow release publish 1.0.0

# Finalizar release
git flow release finish 1.0.0
# Vai pedir mensagem para tag v1.0.0

# Push após release
git push origin main develop --tags
```

### Hotfixes

```bash
# Criar hotfix
git flow hotfix start 1.0.1

# Finalizar hotfix
git flow hotfix finish 1.0.1

# Push após hotfix
git push origin main develop --tags
```

---

## 📦 Versionamento Semântico

Usamos **Semantic Versioning (SemVer)**: `MAJOR.MINOR.PATCH`

### Formato: `v1.2.3`

- **MAJOR (1):** Breaking changes (incompatível com versão anterior)
- **MINOR (2):** Novas funcionalidades (backward compatible)
- **PATCH (3):** Bugfixes (backward compatible)

### Exemplos Bifrost

```
v0.1.0 - Protótipo inicial (Phase 1)
v0.2.0 - Protótipos validados (Phase 2)
v0.3.0 - Certificação INMETRO em andamento
v1.0.0 - Primeira versão produção (5 pilotos)
v1.1.0 - Adicionar franchising
v1.1.1 - Bugfix crítico pagamentos
v1.2.0 - Suporte OCPP 2.0.1
v2.0.0 - Nova arquitetura (breaking change)
```

### Pre-releases

```
v1.0.0-alpha.1   - Versão alpha 1
v1.0.0-beta.1    - Versão beta 1
v1.0.0-rc.1      - Release candidate 1
v1.0.0           - Produção final
```

---

## 🔒 Proteção de Branches

### GitHub Branch Protection Rules

**Para `main`:**
```yaml
Protection Rules:
  ✅ Require pull request before merging
  ✅ Require approvals: 1
  ✅ Dismiss stale reviews
  ✅ Require status checks (CI/CD)
  ✅ Require conversation resolution
  ✅ Require signed commits (opcional)
  ✅ Include administrators
  ❌ Allow force pushes: NEVER
  ❌ Allow deletions: NEVER
```

**Para `develop`:**
```yaml
Protection Rules:
  ✅ Require pull request before merging
  ✅ Require approvals: 1 (pode ser menos)
  ✅ Require status checks (CI/CD)
  ❌ Allow force pushes: Only admins
```

### Configurar no GitHub

```bash
# Settings → Branches → Branch protection rules
# Add rule: main
# Add rule: develop
```

---

## 👥 Workflow em Equipe

### Cenário 1: Desenvolvedor cria feature

```bash
# 1. Atualizar develop local
git checkout develop
git pull origin develop

# 2. Criar feature
git flow feature start minha-feature

# 3. Desenvolver
# ... código ...
git add .
git commit -m "feat(scope): Descrição"

# 4. Publicar para code review
git flow feature publish minha-feature

# 5. Criar Pull Request no GitHub
# develop ← feature/minha-feature

# 6. Após aprovação, finalizar
git flow feature finish minha-feature
```

### Cenário 2: Code Review

```bash
# Reviewer baixa feature
git fetch
git checkout feature/minha-feature

# Testa localmente
npm test
docker-compose up -d

# Comenta no GitHub PR
# Aprova ou solicita mudanças
```

### Cenário 3: Release Manager

```bash
# Quando develop está pronto
git checkout develop
git pull origin develop

# Criar release
git flow release start 1.1.0

# Ajustes finais
vim CHANGELOG.md
vim package.json  # version: "1.1.0"
git commit -m "chore: Bump version to 1.1.0"

# QA testing
npm test
npm run build

# Finalizar release
git flow release finish 1.1.0
# Mensagem da tag: "Release v1.1.0 - Descrição das mudanças"

# Push
git push origin main develop --tags

# Deploy automático via CI/CD
```

### Cenário 4: Hotfix Urgente

```bash
# Bug crítico reportado em produção!

# 1. Criar hotfix
git flow hotfix start 1.1.1

# 2. Corrigir bug
# ... fix code ...
git commit -m "fix(critical): Corrigir bug de pagamento duplicado"

# 3. Testar rigorosamente
npm test

# 4. Finalizar
git flow hotfix finish 1.1.1

# 5. Push e deploy
git push origin main develop --tags
```

---

## 🤖 Integração CI/CD

### GitHub Actions Workflow

**`.github/workflows/ci.yml`:**

```yaml
name: CI/CD Pipeline

on:
  push:
    branches: [main, develop]
  pull_request:
    branches: [develop]

jobs:
  test:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3

      - name: Setup Node.js
        uses: actions/setup-node@v3
        with:
          node-version: '18'

      - name: Install dependencies
        run: npm ci

      - name: Run tests
        run: npm test

      - name: Run linter
        run: npm run lint

  deploy-staging:
    needs: test
    if: github.ref == 'refs/heads/develop'
    runs-on: ubuntu-latest
    steps:
      - name: Deploy to staging
        run: echo "Deploy to staging environment"

  deploy-production:
    needs: test
    if: github.ref == 'refs/heads/main'
    runs-on: ubuntu-latest
    steps:
      - name: Deploy to production
        run: echo "Deploy to production environment"
```

---

## 📊 Visualização de Branches

### Ver histórico gráfico

```bash
# Simples
git log --oneline --graph --all

# Detalhado
git log --graph --all --decorate --oneline

# Com datas
git log --graph --all --format="%h %ad | %s%d [%an]" --date=short

# Apenas últimas 10
git log --oneline --graph --all -10
```

### Alias úteis (.gitconfig)

```bash
git config --global alias.lg "log --graph --pretty=format:'%Cred%h%Creset -%C(yellow)%d%Creset %s %Cgreen(%cr) %C(bold blue)<%an>%Creset' --abbrev-commit --date=relative"

git config --global alias.st "status -sb"
git config --global alias.co "checkout"
git config --global alias.br "branch -v"
git config --global alias.ci "commit"

# Usar:
git lg
git st
```

---

## 🎓 Boas Práticas

### ✅ DO's

1. **Sempre criar features a partir de `develop` atualizado**
   ```bash
   git checkout develop
   git pull origin develop
   git flow feature start nova-feature
   ```

2. **Commits pequenos e frequentes**
   - Melhor: 10 commits pequenos
   - Pior: 1 commit gigante

3. **Mensagens descritivas**
   - Bom: `feat(ocpp): Implementar handler de MeterValues`
   - Ruim: `fix bug`

4. **Testar antes de finalizar feature**
   ```bash
   npm test
   npm run lint
   ```

5. **Code review sempre que possível**
   - Usar Pull Requests no GitHub
   - Pelo menos 1 aprovação

6. **Sincronizar develop frequentemente**
   ```bash
   git checkout develop
   git pull origin develop
   git checkout feature/minha-feature
   git merge develop  # Ou: git rebase develop
   ```

### ❌ DON'Ts

1. **NUNCA commit direto em `main`**
   ```bash
   # ERRADO:
   git checkout main
   git commit -m "quick fix"  # ❌

   # CERTO:
   git flow hotfix start fix-nome
   git commit -m "fix: Descrição"
   git flow hotfix finish fix-nome
   ```

2. **NUNCA force push em branches compartilhadas**
   ```bash
   # ERRADO em main/develop:
   git push -f origin main  # ❌

   # OK apenas em feature própria:
   git push -f origin feature/minha-feature  # ✅ (se sozinho)
   ```

3. **NUNCA features gigantes**
   - Quebrar em features menores
   - Max 3-5 dias de trabalho por feature

4. **NUNCA misturar features em uma branch**
   ```bash
   # ERRADO:
   feature/backend-ocpp-e-frontend-dashboard  # ❌

   # CERTO:
   feature/backend-ocpp
   feature/frontend-dashboard
   ```

5. **NUNCA esquecer de sincronizar `develop` com `main`**
   - Após release ou hotfix, `develop` é atualizado automaticamente
   - Sempre pull antes de criar feature

---

## 🆘 Troubleshooting

### Problema 1: Esqueci de criar feature, comitei em develop

```bash
# Estou em develop com commits não commitados ainda

# Criar feature agora
git checkout -b feature/nome-feature

# Commits já estão na feature
git push origin feature/nome-feature

# Voltar develop e resetar
git checkout develop
git reset --hard origin/develop
```

### Problema 2: Conflitos ao finalizar feature

```bash
# Ao fazer: git flow feature finish minha-feature
# Deu conflito!

# 1. Cancelar finish
git merge --abort

# 2. Atualizar develop
git checkout develop
git pull origin develop

# 3. Voltar para feature
git checkout feature/minha-feature

# 4. Merge develop na feature
git merge develop

# 5. Resolver conflitos manualmente
# ... editar arquivos ...
git add .
git commit -m "chore: Resolver conflitos com develop"

# 6. Tentar finalizar novamente
git flow feature finish minha-feature
```

### Problema 3: Preciso desfazer um commit

```bash
# Último commit (ainda não fez push)
git reset --soft HEAD~1  # Mantém mudanças
git reset --hard HEAD~1  # Descarta mudanças

# Já fez push (criar commit reverso)
git revert HEAD
git push origin feature/minha-feature
```

### Problema 4: Branch desatualizada

```bash
# Sincronizar feature com develop
git checkout feature/minha-feature
git merge develop

# Ou usar rebase (reescreve histórico - cuidado!)
git rebase develop
```

---

## 📅 Roadmap de Releases - Bifrost

### v0.1.0 (Janeiro 2025) - MVP Planning ✅
- Business plan completo
- Pitch deck
- Documentação estratégica

### v0.2.0 (Março 2025) - Protótipos
- 10 PCBs fabricadas
- Firmware básico
- Backend OCPP

### v0.3.0 (Junho 2025) - Validação
- 5 pilotos instalados
- Certificação INMETRO submetida

### v1.0.0 (Setembro 2025) - Produção
- Certificação aprovada
- 50 estações vendidas

### v1.1.0 (Dezembro 2025) - Growth
- 100 estações
- App mobile completo

### v2.0.0 (2026) - Scale
- 200+ estações
- OCPP 2.0.1
- Network próprio

---

## 📚 Referências

**Gitflow:**
- https://nvie.com/posts/a-successful-git-branching-model/
- https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow

**Conventional Commits:**
- https://www.conventionalcommits.org/

**Semantic Versioning:**
- https://semver.org/

**Git Flow Cheatsheet:**
- https://danielkummer.github.io/git-flow-cheatsheet/

---

## ✅ Checklist Setup Gitflow

- [x] Git flow instalado
- [x] Repositório inicializado com gitflow
- [x] Branch `main` criada
- [x] Branch `develop` criada
- [x] `.gitignore` configurado
- [x] Conventional commits documentado
- [ ] GitHub branch protection configurado
- [ ] CI/CD pipeline configurado
- [ ] Equipe treinada em gitflow

---

**Documento criado por:** Equipe Bifrost
**Data:** 11 de Janeiro de 2025
**Versão:** 1.0

🌊 **Gitflow configurado - Workflow profissional pronto!** 🚀
