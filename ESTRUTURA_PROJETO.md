# 📁 Estrutura do Projeto Eletroposto

**Data:** 2025-01-11
**Versão:** 1.0

---

## 🎯 Visão Geral

Este documento descreve a organização completa do projeto Eletroposto, incluindo a estrutura dos diretórios, as convenções de nomenclatura e as recomendações de organização.

---

## 📂 Árvore Completa

```
Thor projet/                                 # Raiz do projeto
│
├── 📄 DOCUMENTAÇÃO RAIZ
│   ├── README.md                           # Ponto de entrada principal
│   ├── ROADMAP.md                          # Plano estratégico 24 meses ⭐
│   ├── PROJECT_STRUCTURE.md                # Organização (versão FR)
│   ├── ESTRUTURA_PROJETO.md                # Este arquivo - Organização (PT-BR)
│   ├── PROJECT_SUMMARY.md                  # Resumo executivo
│   ├── QUICK_START.md                      # Guia início rápido
│   ├── CONTRIBUTING.md                     # Guia contribuição
│   ├── LICENSE                             # Licença MIT
│   ├── CLAUDE.md                           # Instruções Claude AI
│   ├── DOCUMENTS_CREES_SESSION2.md         # Histórico sessões
│   └── RECAP_SESSION.md                    # Recapitulação sessões
│
├── 📚 docs/                                # Documentação completa
│   │
│   ├── 📋 planning/                        # Visão e estratégia global
│   │   ├── VISAO_PROJETO.md               # ⭐ Visão produto
│   │   ├── ESTUDO_MERCADO.md              # ⭐ Estudo mercado brasileiro
│   │   ├── phase1-planejamento/           # Planos Fase 1
│   │   ├── phase2-desenvolvimento/        # Planos Fase 2
│   │   ├── phase3-instalacao/             # Planos Fase 3
│   │   ├── phase4-operacao/               # Planos Fase 4
│   │   └── phase5-expansao/               # Planos Fase 5
│   │
│   ├── 💼 management/                      # Gestão de projeto
│   │   ├── PLANNING_6_MOIS.md             # ⭐ Planejamento detalhado Fase 2 (FR)
│   │   ├── GUIDE_ACHAT_COMPOSANTS.md      # ⭐ Guia compras material (FR)
│   │   ├── USER_STORIES.md                # Stories usuários
│   │   │
│   │   ├── pt-br/                         # Versões português BR
│   │   │   ├── PLANEJAMENTO_6_MESES.md
│   │   │   └── GUIA_COMPRA_COMPONENTES.md
│   │   │
│   │   ├── budget/                        # Gestão orçamentária
│   │   │   ├── ORCAMENTO_DETALHADO.md     # Orçamento detalhado
│   │   │   └── financial_projections.xlsx # Projeções (a criar)
│   │   │
│   │   ├── risks/                         # Gestão dos riscos
│   │   │   ├── ANALISE_RISCOS.md          # Análise riscos
│   │   │   └── risk_register.xlsx         # Registro riscos (a criar)
│   │   │
│   │   ├── marketing/                     # Estratégia marketing
│   │   │   ├── ESTRATEGIA_MARKETING.md
│   │   │   └── campaigns/                 # Campanhas marketing
│   │   │
│   │   ├── stakeholders/                  # Gestão partes interessadas
│   │   │   └── stakeholder_map.md         # (a criar)
│   │   │
│   │   └── communication/                 # Comunicação projeto
│   │       └── weekly_reports/            # Relatórios semanais (a criar)
│   │
│   ├── 🔧 technical/                       # Documentação técnica
│   │   ├── ESPECIFICACOES_TECNICAS.md     # ⭐ Especificações técnicas globais
│   │   ├── FABRICATION_BORNES_DIY.md      # ⭐ Viabilidade DIY (FR)
│   │   ├── GUIDE_SOUDURE_ASSEMBLAGE.md    # ⭐ Guia soldagem PCB (FR)
│   │   ├── GUIDE_TEST_VALIDATION.md       # ⭐ Protocolos testes IEC (FR)
│   │   ├── OUTILS_CONCEPTION_SCHEMAS.md   # ⭐ Guia ferramentas EDA (FR)
│   │   │
│   │   ├── pt-br/                         # Versões português BR
│   │   │   ├── GUIA_SOLDAGEM_MONTAGEM.md
│   │   │   └── GUIA_TESTE_VALIDACAO.md
│   │   │
│   │   ├── architecture/                  # Arquitetura sistema
│   │   │   ├── ARQUITETURA_SISTEMA.md     # ⭐ Arquitetura global
│   │   │   ├── ARQUITETURA_SYLIUS.md      # Arquitetura e-commerce
│   │   │   ├── DATABASE_SCHEMA.md         # ⭐ Schema banco de dados
│   │   │   └── diagrams/                  # Diagramas UML/C4
│   │   │       ├── system_context.puml
│   │   │       ├── container.puml
│   │   │       └── component.puml
│   │   │
│   │   ├── api/                           # Documentação API
│   │   │   ├── API_DOCUMENTATION.md       # Doc API REST
│   │   │   ├── openapi.yaml               # Spec OpenAPI (a criar)
│   │   │   └── postman/                   # Collections Postman
│   │   │
│   │   ├── ocpp/                          # Protocolo OCPP
│   │   │   ├── ocpp_implementation.md     # (a criar)
│   │   │   ├── message_flows.md           # (a criar)
│   │   │   └── compliance_matrix.md       # (a criar)
│   │   │
│   │   ├── database/                      # Banco de dados
│   │   │   ├── migrations/                # Scripts migração
│   │   │   └── seeds/                     # Dados teste
│   │   │
│   │   ├── security/                      # Segurança
│   │   │   ├── security_policy.md         # (a criar)
│   │   │   ├── penetration_tests.md       # (a criar)
│   │   │   └── vulnerability_scan.md      # (a criar)
│   │   │
│   │   ├── DEPLOYMENT_GUIDE.md            # Guia implantação
│   │   ├── MONITORING_OBSERVABILITY.md    # Monitoramento sistema
│   │   └── QA_TEST_PLAN.md                # Plano de testes QA
│   │
│   ├── ⚖️ legal/                           # Aspectos legais
│   │   ├── LGPD_COMPLIANCE.md             # Conformidade LGPD
│   │   ├── terms_of_service.md            # (a criar)
│   │   ├── privacy_policy.md              # (a criar)
│   │   └── contracts/                     # Contratos tipos
│   │
│   └── 🏭 operations/                      # Operações
│       ├── maintenance/                   # Manutenção
│       │   ├── preventive_plan.md         # (a criar)
│       │   └── troubleshooting.md         # (a criar)
│       │
│       ├── procedures/                    # Procedimentos operacionais
│       │   ├── installation_sop.md        # (a criar)
│       │   ├── commissioning_sop.md       # (a criar)
│       │   └── incident_response.md       # (a criar)
│       │
│       └── training/                      # Formação
│           ├── operator_manual.md         # (a criar)
│           └── technician_training.md     # (a criar)
│
├── ⚡ hardware/                            # Concepção eletrônica
│   └── kicad_examples/                    # ⭐ Projeto KiCad principal
│       ├── eletroposto_charger.kicad_pro  # Projeto KiCad
│       ├── eletroposto_charger.kicad_sch  # Esquema eletrônico
│       ├── eletroposto_charger.kicad_pcb  # Layout PCB
│       ├── pilot_signal_example.kicad_sch # Exemplo Pilot Signal
│       ├── generate_fabrication.sh        # ⭐ Script automação
│       │
│       ├── fabrication/                   # Outputs fabricação
│       │   ├── gerber/                    # Arquivos Gerber
│       │   │   ├── *-F_Cu.gbr
│       │   │   ├── *-B_Cu.gbr
│       │   │   └── ...
│       │   │
│       │   ├── drill/                     # Arquivos furação
│       │   │   ├── *-PTH.drl
│       │   │   └── *-NPTH.drl
│       │   │
│       │   ├── bom/                       # Bill of Materials
│       │   │   └── bom.csv
│       │   │
│       │   ├── assembly/                  # Arquivos montagem
│       │   │   ├── top_pos.csv
│       │   │   └── bottom_pos.csv
│       │   │
│       │   ├── documentation/             # Documentação fabricação
│       │   │   ├── schematic.pdf
│       │   │   └── assembly_drawing.pdf
│       │   │
│       │   └── archives/                  # Arquivos por versão
│       │       └── v1.0_2025-01-08.zip
│       │
│       ├── libraries/                     # Bibliotecas KiCad custom
│       │   ├── symbols/                   # Símbolos
│       │   ├── footprints/                # Footprints
│       │   └── 3d_models/                 # Modelos 3D
│       │
│       ├── datasheets/                    # Datasheets componentes
│       │   ├── STM32F407VGT6.pdf
│       │   ├── MCP2515.pdf
│       │   └── ...
│       │
│       ├── QUICK_START.md                 # ⭐ Guia início rápido KiCad
│       ├── README.md                      # Documentação hardware
│       └── RESULTATS_TEST.md              # Resultados testes
│
├── 💻 backend/                            # Backend Symfony
│   ├── src/                               # Código fonte
│   │   ├── Entity/                        # Entidades Doctrine
│   │   │   ├── Charging/                  # Domínio charging
│   │   │   │   ├── Station.php            # ⭐ Entidade Station
│   │   │   │   ├── Charger.php            # ⭐ Entidade Charger
│   │   │   │   ├── ChargingSession.php    # ⭐ Entidade Session
│   │   │   │   ├── Vehicle.php            # ⭐ Entidade Vehicle
│   │   │   │   └── MeterValue.php         # ⭐ Entidade MeterValue
│   │   │   │
│   │   │   ├── User/                      # Domínio usuário
│   │   │   ├── Payment/                   # Domínio pagamento
│   │   │   └── Notification/              # Domínio notificação
│   │   │
│   │   ├── Repository/                    # Repositories Doctrine
│   │   │   └── Charging/                  # ⭐ Repositories charging
│   │   │       ├── StationRepository.php
│   │   │       ├── ChargerRepository.php
│   │   │       ├── ChargingSessionRepository.php
│   │   │       ├── VehicleRepository.php
│   │   │       └── MeterValueRepository.php
│   │   │
│   │   ├── Controller/                    # Controllers API
│   │   │   ├── Api/
│   │   │   │   ├── StationController.php
│   │   │   │   ├── ChargerController.php
│   │   │   │   └── SessionController.php
│   │   │   └── Ocpp/
│   │   │       └── OcppController.php
│   │   │
│   │   ├── Service/                       # Serviços negócio
│   │   │   ├── Charging/
│   │   │   ├── Ocpp/
│   │   │   ├── Payment/
│   │   │   └── Notification/
│   │   │
│   │   ├── EventListener/                 # Event listeners
│   │   ├── Command/                       # Commands console
│   │   ├── Security/                      # Segurança
│   │   └── Validator/                     # Validadores custom
│   │
│   ├── config/                            # ⭐ Configuração Symfony
│   │   ├── packages/                      # Config packages
│   │   │   ├── api_platform.yaml
│   │   │   ├── doctrine.yaml
│   │   │   ├── framework.yaml
│   │   │   ├── messenger.yaml
│   │   │   └── security.yaml
│   │   │
│   │   ├── routes.yaml                    # Roteamento
│   │   ├── services.yaml                  # Serviços
│   │   └── routes/
│   │       └── api.yaml
│   │
│   ├── migrations/                        # Migrações Doctrine
│   ├── templates/                         # Templates Twig
│   ├── translations/                      # Traduções
│   ├── var/                               # Arquivos temporários
│   ├── vendor/                            # Dependências Composer
│   │
│   ├── .env                               # Variáveis ambiente
│   ├── .env.local                         # Variáveis locais
│   ├── composer.json                      # ⭐ Dependências PHP
│   ├── composer.lock                      # Lock dependências
│   ├── symfony.lock                       # Lock Symfony Flex
│   └── phpunit.xml.dist                   # Config PHPUnit
│
├── 🎨 frontend/                           # Frontend Web
│   ├── src/                               # Código fonte React
│   │   ├── components/                    # Componentes React
│   │   │   ├── common/                    # Componentes comuns
│   │   │   ├── stations/                  # Componentes estações
│   │   │   ├── charging/                  # Componentes carregamento
│   │   │   └── dashboard/                 # Dashboard
│   │   │
│   │   ├── pages/                         # Páginas
│   │   ├── services/                      # Serviços API
│   │   ├── hooks/                         # Custom hooks
│   │   ├── utils/                         # Utilitários
│   │   ├── types/                         # Tipos TypeScript
│   │   └── App.tsx                        # App principal
│   │
│   ├── public/                            # Assets públicos
│   ├── package.json                       # Dependências npm
│   ├── tsconfig.json                      # Config TypeScript
│   ├── vite.config.ts                     # Config Vite
│   └── tailwind.config.js                 # Config Tailwind
│
├── 📱 mobile/                             # Aplicativo mobile
│   ├── src/                               # Código React Native
│   │   ├── screens/                       # Telas
│   │   ├── components/                    # Componentes
│   │   ├── navigation/                    # Navegação
│   │   ├── services/                      # Serviços API
│   │   └── App.tsx                        # App principal
│   │
│   ├── android/                           # Config Android
│   ├── ios/                               # Config iOS
│   ├── package.json                       # Dependências
│   └── app.json                           # Config Expo
│
├── 🐳 infrastructure/                     # Infraestrutura & DevOps
│   ├── docker/                            # ⭐ Configuração Docker
│   │   ├── Dockerfile.php                 # Imagem PHP-FPM
│   │   ├── Dockerfile.websocket           # Imagem WebSocket
│   │   ├── Dockerfile.frontend            # Imagem frontend
│   │   │
│   │   ├── nginx/                         # Config Nginx
│   │   │   └── default.conf
│   │   │
│   │   └── php/                           # Config PHP
│   │       ├── php-fpm.conf
│   │       └── php.ini
│   │
│   ├── kubernetes/                        # Manifests K8s
│   │   ├── namespace.yaml
│   │   ├── deployment.yaml
│   │   ├── service.yaml
│   │   └── ingress.yaml
│   │
│   ├── terraform/                         # Infrastructure as Code
│   │   ├── main.tf
│   │   ├── variables.tf
│   │   └── modules/
│   │
│   ├── ansible/                           # Provisionamento
│   │   └── playbooks/
│   │
│   └── monitoring/                        # Monitoramento
│       ├── prometheus/
│       │   └── prometheus.yml
│       │
│       ├── grafana/
│       │   └── dashboards/
│       │
│       └── loki/
│           └── loki-config.yaml
│
├── 🔧 scripts/                            # Scripts utilitários
│   ├── setup/                             # Scripts instalação
│   │   ├── setup_dev.sh
│   │   └── install_deps.sh
│   │
│   ├── deploy/                            # Scripts implantação
│   │   ├── deploy_staging.sh
│   │   └── deploy_production.sh
│   │
│   ├── database/                          # Scripts BD
│   │   ├── backup.sh
│   │   └── restore.sh
│   │
│   └── testing/                           # Scripts testes
│       ├── run_all_tests.sh
│       └── e2e_tests.sh
│
├── 🧪 tests/                              # Testes
│   ├── Unit/                              # Testes unitários
│   ├── Integration/                       # Testes integração
│   ├── Functional/                        # Testes funcionais
│   ├── E2E/                               # Testes end-to-end
│   └── fixtures/                          # Fixtures
│
├── 📦 .github/                            # GitHub Actions
│   ├── workflows/                         # CI/CD workflows
│   │   ├── ci.yml                         # Integração contínua
│   │   ├── deploy.yml                     # Implantação
│   │   └── test.yml                       # Testes
│   │
│   └── ISSUE_TEMPLATE/                    # Templates issues
│       ├── bug_report.md
│       └── feature_request.md
│
├── 🔐 .gitignore                          # Arquivos ignorados Git
├── 📝 Makefile                            # ⭐ Comandos Make
├── 🐳 docker-compose.yml                  # ⭐ Stack Docker local
├── 🐳 docker-compose.prod.yml             # Stack produção
└── 📄 pdf_9ad542c9.pdf                    # Documento projeto

```

---

## 📊 Estatísticas Projeto

### Documentação
- **Total arquivos MD:** 24 documentos
- **Linhas documentação:** ~10.000 linhas
- **Idiomas:** Francês, Português BR
- **Completude:** 85%

### Código
- **Backend:** Symfony 6.4, PHP 8.3
- **Frontend:** A desenvolver (React + TS)
- **Mobile:** A desenvolver (React Native)
- **Hardware:** KiCad 9.0, exemplo funcional

### Infraestrutura
- **Containerização:** Docker + Docker Compose
- **Orquestração:** Kubernetes (previsto)
- **CI/CD:** GitHub Actions (previsto)
- **Monitoramento:** Prometheus + Grafana (previsto)

---

## 🎯 Organização Por Tipo de Arquivo

### Documentação Estratégica ⭐
```
ROADMAP.md                                  # Plano 24 meses
docs/planning/VISAO_PROJETO.md              # Visão
docs/planning/ESTUDO_MERCADO.md             # Mercado
docs/management/PLANNING_6_MOIS.md          # Planejamento Fase 2
```

### Documentação Técnica ⭐
```
docs/technical/ESPECIFICACOES_TECNICAS.md   # Especificações
docs/technical/FABRICATION_BORNES_DIY.md    # DIY
docs/technical/GUIDE_SOUDURE_ASSEMBLAGE.md  # Soldagem
docs/technical/GUIDE_TEST_VALIDATION.md     # Testes
docs/technical/architecture/ARQUITETURA_SISTEMA.md
```

### Código Backend ⭐
```
backend/src/Entity/Charging/*.php           # Entidades
backend/src/Repository/Charging/*.php       # Repositories
backend/config/                             # Configuração
```

### Hardware ⭐
```
hardware/kicad_examples/*.kicad_*           # Projeto KiCad
hardware/kicad_examples/generate_fabrication.sh  # Automação
hardware/kicad_examples/fabrication/        # Outputs
```

### Infraestrutura ⭐
```
infrastructure/docker/                      # Configs Docker
docker-compose.yml                          # Stack local
Makefile                                    # Comandos
```

---

## 🏷️ Convenções de Nomenclatura

### Arquivos Documentação
- **Francês:** `GUIDE_NOM_DOCUMENT.md` (MAIÚSCULAS)
- **Português:** `GUIA_NOME_DOCUMENTO.md` (MAIÚSCULAS)
- **Inglês:** `document_name.md` (minúsculas) para código

### Código Backend
- **Classes:** `PascalCase` (ex: `ChargingSession.php`)
- **Métodos:** `camelCase` (ex: `startChargingSession()`)
- **Variáveis:** `camelCase` (ex: `$sessionId`)
- **Constantes:** `SNAKE_CASE` (ex: `MAX_POWER_KW`)

### Hardware
- **Projetos KiCad:** `nome_projeto.kicad_*`
- **Scripts:** `snake_case.sh`
- **Outputs:** Organização por tipo em `/fabrication`

### Git
- **Branches:** `feature/nome-feature`, `bugfix/nome-bug`
- **Commits:** Convenção Conventional Commits
  - `feat: nova funcionalidade`
  - `fix: correção bug`
  - `docs: documentação`
  - `refactor: refatoração`

---

## 📁 Diretórios a Criar (TODO)

### Curto prazo (Fase 1)
```
docs/management/communication/weekly_reports/
docs/management/stakeholders/
docs/technical/api/postman/
scripts/setup/
scripts/database/
.github/workflows/
```

### Médio prazo (Fase 2-3)
```
frontend/src/
mobile/src/
infrastructure/kubernetes/
infrastructure/terraform/
tests/Unit/
tests/Integration/
hardware/kicad_examples/libraries/
hardware/kicad_examples/datasheets/
```

### Longo prazo (Fase 4-6)
```
docs/operations/maintenance/
docs/operations/procedures/
docs/operations/training/
infrastructure/monitoring/grafana/dashboards/
scripts/deploy/
```

---

## 🔍 Arquivos Chave Por Fase

### Fase 1: Planejamento
- ✅ `ROADMAP.md`
- ✅ `docs/planning/VISAO_PROJETO.md`
- ✅ `docs/management/PLANNING_6_MOIS.md`
- ⬜ `business_plan_2025-2027.md` (a criar)
- ⬜ `pitch_deck.pdf` (a criar)

### Fase 2: Hardware
- ✅ `hardware/kicad_examples/eletroposto_charger.*`
- ✅ `hardware/kicad_examples/generate_fabrication.sh`
- ✅ `docs/technical/GUIDE_SOUDURE_ASSEMBLAGE.md`
- ✅ `docs/technical/GUIDE_TEST_VALIDATION.md`
- ⬜ `hardware/kicad_examples/fabrication/v2.0/` (a criar)

### Fase 3: Software
- ✅ `backend/src/Entity/Charging/*.php`
- ⬜ `backend/src/Controller/Api/*.php` (a desenvolver)
- ⬜ `backend/src/Service/Ocpp/*.php` (a desenvolver)
- ⬜ `frontend/src/` (a desenvolver)
- ⬜ `mobile/src/` (a desenvolver)

### Fase 4: Certificação
- ⬜ `docs/certification/dossier_inmetro/` (a criar)
- ⬜ `docs/certification/test_reports/` (a criar)
- ⬜ `docs/certification/compliance_matrix.md` (a criar)

### Fase 5-6: Implantação
- ⬜ `infrastructure/kubernetes/production/` (a criar)
- ⬜ `docs/operations/installation_sop.md` (a criar)
- ⬜ `docs/operations/operator_manual.md` (a criar)

---

## 🎨 Códigos de Cor e Emojis

### Por Tipo de Documento
- 📄 Documentação geral
- 📚 Documentação detalhada
- 📋 Planejamento e gestão
- 💼 Management
- 🔧 Técnico
- ⚡ Hardware/Eletrônica
- 💻 Software/Código
- 🎨 Frontend
- 📱 Mobile
- 🐳 Infraestrutura
- 🔐 Segurança
- ⚖️ Legal
- 🏭 Operações

### Por Status
- ✅ Completo
- 🔄 Em andamento
- ⏳ Planejado
- ⬜ A fazer
- ❌ Não iniciado
- ⚠️ Atenção requerida
- 🎯 Prioritário
- ⭐ Crítico/Importante

---

## 📝 Notas de Migração

### Estrutura Antiga → Estrutura Nova

Nenhuma migração necessária atualmente. A estrutura atual está bem organizada.

### Melhorias Sugeridas

1. **Criar `/docs/certification/`**
   - Para centralizar docs certificação INMETRO

2. **Criar `/hardware/kicad_examples/libraries/`**
   - Para símbolos/footprints personalizados

3. **Criar `/scripts/`**
   - Para scripts automação diversos

4. **Adicionar `.github/workflows/`**
   - Para CI/CD GitHub Actions

5. **Criar `/docs/api/postman/`**
   - Collections Postman para testes API

---

## 🔗 Links Rápidos

### Documentação Essencial
- [Roadmap 24 meses](./ROADMAP.md)
- [README Principal](./README.md)
- [Quick Start](./QUICK_START.md)

### Hardware
- [Hardware README](./hardware/kicad_examples/README.md)
- [Quick Start KiCad](./hardware/kicad_examples/QUICK_START.md)
- [Script Fabricação](./hardware/kicad_examples/generate_fabrication.sh)

### Backend
- [Entidades](./backend/src/Entity/Charging/)
- [Configuração](./backend/config/)
- [Composer](./backend/composer.json)

### Documentação PT-BR
- [Planejamento 6 Meses](./docs/management/pt-br/PLANEJAMENTO_6_MESES.md)
- [Guia Soldagem](./docs/technical/pt-br/GUIA_SOLDAGEM_MONTAGEM.md)
- [Guia Testes](./docs/technical/pt-br/GUIA_TESTE_VALIDACAO.md)

---

## ✅ Checklist Organização

### Arquivos Raiz
- [x] README.md completo
- [x] ROADMAP.md criado
- [x] PROJECT_STRUCTURE.md criado
- [x] ESTRUTURA_PROJETO.md criado (PT-BR)
- [x] CONTRIBUTING.md presente
- [x] LICENSE presente
- [x] .gitignore configurado
- [x] Makefile com comandos

### Documentação
- [x] Planejamento completo
- [x] Guias técnicos (FR + PT)
- [x] Arquitetura documentada
- [ ] API documentada (Postman/OpenAPI)
- [ ] Procedimentos operacionais

### Código
- [x] Entidades backend criadas
- [x] Repositories criados
- [ ] Controllers API desenvolvidos
- [ ] Testes unitários
- [ ] Frontend desenvolvido

### Infraestrutura
- [x] Docker Compose configurado
- [x] Dockerfiles criados
- [ ] Manifests K8s
- [ ] Pipeline CI/CD
- [ ] Setup Monitoramento

---

**Documento criado por:** Equipe Eletroposto
**Última atualização:** 2025-01-11
**Próxima revisão:** 2025-02-11

🗂️ **Estrutura clara = Projeto eficiente!** 📁
