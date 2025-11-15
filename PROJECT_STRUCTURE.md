# 📁 Structure du Projet Eletroposto

**Date:** 2025-01-11
**Version:** 1.0

---

## 🎯 Vue d'Ensemble

Ce document décrit l'organisation complète du projet Eletroposto, incluant la structure des répertoires, les conventions de nommage, et les recommandations d'organisation.

---

## 📂 Arborescence Complète

```
Thor projet/                                 # Racine du projet
│
├── 📄 DOCUMENTATION RACINE
│   ├── README.md                           # Point d'entrée principal
│   ├── ROADMAP.md                          # Plan stratégique 24 mois ⭐
│   ├── PROJECT_STRUCTURE.md                # Ce fichier - Organisation
│   ├── PROJECT_SUMMARY.md                  # Résumé exécutif
│   ├── QUICK_START.md                      # Guide démarrage rapide
│   ├── CONTRIBUTING.md                     # Guide contribution
│   ├── LICENSE                             # Licence MIT
│   ├── CLAUDE.md                           # Instructions Claude AI
│   ├── DOCUMENTS_CREES_SESSION2.md         # Historique sessions
│   └── RECAP_SESSION.md                    # Récapitulatif sessions
│
├── 📚 docs/                                # Documentation complète
│   │
│   ├── 📋 planning/                        # Vision et stratégie globale
│   │   ├── VISAO_PROJETO.md               # ⭐ Vision produit
│   │   ├── ESTUDO_MERCADO.md              # ⭐ Étude marché brésilien
│   │   ├── phase1-planejamento/           # Plans Phase 1
│   │   ├── phase2-desenvolvimento/        # Plans Phase 2
│   │   ├── phase3-instalacao/             # Plans Phase 3
│   │   ├── phase4-operacao/               # Plans Phase 4
│   │   └── phase5-expansao/               # Plans Phase 5
│   │
│   ├── 💼 management/                      # Gestion de projet
│   │   ├── PLANNING_6_MOIS.md             # ⭐ Planning détaillé Phase 2
│   │   ├── GUIDE_ACHAT_COMPOSANTS.md      # ⭐ Guide achats matériel
│   │   ├── USER_STORIES.md                # Stories utilisateurs
│   │   │
│   │   ├── pt-br/                         # Versions portugais BR
│   │   │   ├── PLANEJAMENTO_6_MESES.md
│   │   │   └── GUIA_COMPRA_COMPONENTES.md
│   │   │
│   │   ├── budget/                        # Gestion budgétaire
│   │   │   ├── ORCAMENTO_DETALHADO.md     # Budget détaillé
│   │   │   └── financial_projections.xlsx # Projections (à créer)
│   │   │
│   │   ├── risks/                         # Gestion des risques
│   │   │   ├── ANALISE_RISCOS.md          # Analyse risques
│   │   │   └── risk_register.xlsx         # Registre risques (à créer)
│   │   │
│   │   ├── marketing/                     # Stratégie marketing
│   │   │   ├── ESTRATEGIA_MARKETING.md
│   │   │   └── campaigns/                 # Campagnes marketing
│   │   │
│   │   ├── stakeholders/                  # Gestion parties prenantes
│   │   │   └── stakeholder_map.md         # (à créer)
│   │   │
│   │   └── communication/                 # Communication projet
│   │       └── weekly_reports/            # Rapports hebdo (à créer)
│   │
│   ├── 🔧 technical/                       # Documentation technique
│   │   ├── ESPECIFICACOES_TECNICAS.md     # ⭐ Specs techniques globales
│   │   ├── FABRICATION_BORNES_DIY.md      # ⭐ Faisabilité DIY
│   │   ├── GUIDE_SOUDURE_ASSEMBLAGE.md    # ⭐ Guide soudure PCB
│   │   ├── GUIDE_TEST_VALIDATION.md       # ⭐ Protocoles tests IEC
│   │   ├── OUTILS_CONCEPTION_SCHEMAS.md   # ⭐ Guide outils EDA
│   │   │
│   │   ├── pt-br/                         # Versions portugais BR
│   │   │   ├── GUIA_SOLDAGEM_MONTAGEM.md
│   │   │   └── GUIA_TESTE_VALIDACAO.md
│   │   │
│   │   ├── architecture/                  # Architecture système
│   │   │   ├── ARQUITETURA_SISTEMA.md     # ⭐ Architecture globale
│   │   │   ├── ARQUITETURA_SYLIUS.md      # Architecture e-commerce
│   │   │   ├── DATABASE_SCHEMA.md         # ⭐ Schéma base de données
│   │   │   └── diagrams/                  # Diagrammes UML/C4
│   │   │       ├── system_context.puml
│   │   │       ├── container.puml
│   │   │       └── component.puml
│   │   │
│   │   ├── api/                           # Documentation API
│   │   │   ├── API_DOCUMENTATION.md       # Doc API REST
│   │   │   ├── openapi.yaml               # Spec OpenAPI (à créer)
│   │   │   └── postman/                   # Collections Postman
│   │   │
│   │   ├── ocpp/                          # OCPP Protocol
│   │   │   ├── ocpp_implementation.md     # (à créer)
│   │   │   ├── message_flows.md           # (à créer)
│   │   │   └── compliance_matrix.md       # (à créer)
│   │   │
│   │   ├── database/                      # Base de données
│   │   │   ├── migrations/                # Scripts migration
│   │   │   └── seeds/                     # Données test
│   │   │
│   │   ├── security/                      # Sécurité
│   │   │   ├── security_policy.md         # (à créer)
│   │   │   ├── penetration_tests.md       # (à créer)
│   │   │   └── vulnerability_scan.md      # (à créer)
│   │   │
│   │   ├── DEPLOYMENT_GUIDE.md            # Guide déploiement
│   │   ├── MONITORING_OBSERVABILITY.md    # Monitoring système
│   │   └── QA_TEST_PLAN.md                # Plan de tests QA
│   │
│   ├── ⚖️ legal/                           # Aspects légaux
│   │   ├── LGPD_COMPLIANCE.md             # Conformité LGPD
│   │   ├── terms_of_service.md            # (à créer)
│   │   ├── privacy_policy.md              # (à créer)
│   │   └── contracts/                     # Contrats types
│   │
│   └── 🏭 operations/                      # Opérations
│       ├── maintenance/                   # Maintenance
│       │   ├── preventive_plan.md         # (à créer)
│       │   └── troubleshooting.md         # (à créer)
│       │
│       ├── procedures/                    # Procédures opérationnelles
│       │   ├── installation_sop.md        # (à créer)
│       │   ├── commissioning_sop.md       # (à créer)
│       │   └── incident_response.md       # (à créer)
│       │
│       └── training/                      # Formation
│           ├── operator_manual.md         # (à créer)
│           └── technician_training.md     # (à créer)
│
├── ⚡ hardware/                            # Conception électronique
│   └── kicad_examples/                    # ⭐ Projet KiCad principal
│       ├── eletroposto_charger.kicad_pro  # Projet KiCad
│       ├── eletroposto_charger.kicad_sch  # Schéma électronique
│       ├── eletroposto_charger.kicad_pcb  # Layout PCB
│       ├── pilot_signal_example.kicad_sch # Exemple Pilot Signal
│       ├── generate_fabrication.sh        # ⭐ Script automatisation
│       │
│       ├── fabrication/                   # Outputs fabrication
│       │   ├── gerber/                    # Fichiers Gerber
│       │   │   ├── *-F_Cu.gbr
│       │   │   ├── *-B_Cu.gbr
│       │   │   └── ...
│       │   │
│       │   ├── drill/                     # Fichiers perçage
│       │   │   ├── *-PTH.drl
│       │   │   └── *-NPTH.drl
│       │   │
│       │   ├── bom/                       # Bill of Materials
│       │   │   └── bom.csv
│       │   │
│       │   ├── assembly/                  # Fichiers assemblage
│       │   │   ├── top_pos.csv
│       │   │   └── bottom_pos.csv
│       │   │
│       │   ├── documentation/             # Documentation fabrication
│       │   │   ├── schematic.pdf
│       │   │   └── assembly_drawing.pdf
│       │   │
│       │   └── archives/                  # Archives par version
│       │       └── v1.0_2025-01-08.zip
│       │
│       ├── libraries/                     # Bibliothèques KiCad custom
│       │   ├── symbols/                   # Symboles
│       │   ├── footprints/                # Empreintes
│       │   └── 3d_models/                 # Modèles 3D
│       │
│       ├── datasheets/                    # Datasheets composants
│       │   ├── STM32F407VGT6.pdf
│       │   ├── MCP2515.pdf
│       │   └── ...
│       │
│       ├── QUICK_START.md                 # ⭐ Guide démarrage KiCad
│       ├── README.md                      # Documentation hardware
│       └── RESULTATS_TEST.md              # Résultats tests
│
├── 💻 backend/                            # Backend Symfony
│   ├── src/                               # Code source
│   │   ├── Entity/                        # Entités Doctrine
│   │   │   ├── Charging/                  # Domaine charging
│   │   │   │   ├── Station.php            # ⭐ Entité Station
│   │   │   │   ├── Charger.php            # ⭐ Entité Charger
│   │   │   │   ├── ChargingSession.php    # ⭐ Entité Session
│   │   │   │   ├── Vehicle.php            # ⭐ Entité Vehicle
│   │   │   │   └── MeterValue.php         # ⭐ Entité MeterValue
│   │   │   │
│   │   │   ├── User/                      # Domaine utilisateur
│   │   │   ├── Payment/                   # Domaine paiement
│   │   │   └── Notification/              # Domaine notification
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
│   │   ├── Service/                       # Services métier
│   │   │   ├── Charging/
│   │   │   ├── Ocpp/
│   │   │   ├── Payment/
│   │   │   └── Notification/
│   │   │
│   │   ├── EventListener/                 # Event listeners
│   │   ├── Command/                       # Commands console
│   │   ├── Security/                      # Sécurité
│   │   └── Validator/                     # Validateurs custom
│   │
│   ├── config/                            # ⭐ Configuration Symfony
│   │   ├── packages/                      # Config packages
│   │   │   ├── api_platform.yaml
│   │   │   ├── doctrine.yaml
│   │   │   ├── framework.yaml
│   │   │   ├── messenger.yaml
│   │   │   └── security.yaml
│   │   │
│   │   ├── routes.yaml                    # Routing
│   │   ├── services.yaml                  # Services
│   │   └── routes/
│   │       └── api.yaml
│   │
│   ├── migrations/                        # Migrations Doctrine
│   ├── templates/                         # Templates Twig
│   ├── translations/                      # Traductions
│   ├── var/                               # Fichiers temporaires
│   ├── vendor/                            # Dépendances Composer
│   │
│   ├── .env                               # Variables environnement
│   ├── .env.local                         # Variables locales
│   ├── composer.json                      # ⭐ Dépendances PHP
│   ├── composer.lock                      # Lock dépendances
│   ├── symfony.lock                       # Lock Symfony Flex
│   └── phpunit.xml.dist                   # Config PHPUnit
│
├── 🎨 frontend/                           # Frontend Web
│   ├── src/                               # Code source React
│   │   ├── components/                    # Composants React
│   │   │   ├── common/                    # Composants communs
│   │   │   ├── stations/                  # Composants stations
│   │   │   ├── charging/                  # Composants charging
│   │   │   └── dashboard/                 # Dashboard
│   │   │
│   │   ├── pages/                         # Pages
│   │   ├── services/                      # Services API
│   │   ├── hooks/                         # Custom hooks
│   │   ├── utils/                         # Utilitaires
│   │   ├── types/                         # Types TypeScript
│   │   └── App.tsx                        # App principale
│   │
│   ├── public/                            # Assets publics
│   ├── package.json                       # Dépendances npm
│   ├── tsconfig.json                      # Config TypeScript
│   ├── vite.config.ts                     # Config Vite
│   └── tailwind.config.js                 # Config Tailwind
│
├── 📱 mobile/                             # Application mobile
│   ├── src/                               # Code React Native
│   │   ├── screens/                       # Écrans
│   │   ├── components/                    # Composants
│   │   ├── navigation/                    # Navigation
│   │   ├── services/                      # Services API
│   │   └── App.tsx                        # App principale
│   │
│   ├── android/                           # Config Android
│   ├── ios/                               # Config iOS
│   ├── package.json                       # Dépendances
│   └── app.json                           # Config Expo
│
├── 🐳 infrastructure/                     # Infrastructure & DevOps
│   ├── docker/                            # ⭐ Configuration Docker
│   │   ├── Dockerfile.php                 # Image PHP-FPM
│   │   ├── Dockerfile.websocket           # Image WebSocket
│   │   ├── Dockerfile.frontend            # Image frontend
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
│   ├── ansible/                           # Provisioning
│   │   └── playbooks/
│   │
│   └── monitoring/                        # Monitoring
│       ├── prometheus/
│       │   └── prometheus.yml
│       │
│       ├── grafana/
│       │   └── dashboards/
│       │
│       └── loki/
│           └── loki-config.yaml
│
├── 🔧 scripts/                            # Scripts utilitaires
│   ├── setup/                             # Scripts installation
│   │   ├── setup_dev.sh
│   │   └── install_deps.sh
│   │
│   ├── deploy/                            # Scripts déploiement
│   │   ├── deploy_staging.sh
│   │   └── deploy_production.sh
│   │
│   ├── database/                          # Scripts BD
│   │   ├── backup.sh
│   │   └── restore.sh
│   │
│   └── testing/                           # Scripts tests
│       ├── run_all_tests.sh
│       └── e2e_tests.sh
│
├── 🧪 tests/                              # Tests
│   ├── Unit/                              # Tests unitaires
│   ├── Integration/                       # Tests intégration
│   ├── Functional/                        # Tests fonctionnels
│   ├── E2E/                               # Tests end-to-end
│   └── fixtures/                          # Fixtures
│
├── 📦 .github/                            # GitHub Actions
│   ├── workflows/                         # CI/CD workflows
│   │   ├── ci.yml                         # Integration continue
│   │   ├── deploy.yml                     # Déploiement
│   │   └── test.yml                       # Tests
│   │
│   └── ISSUE_TEMPLATE/                    # Templates issues
│       ├── bug_report.md
│       └── feature_request.md
│
├── 🔐 .gitignore                          # Fichiers ignorés Git
├── 📝 Makefile                            # ⭐ Commandes Make
├── 🐳 docker-compose.yml                  # ⭐ Stack Docker locale
├── 🐳 docker-compose.prod.yml             # Stack production
└── 📄 pdf_9ad542c9.pdf                    # Document projet

```

---

## 📊 Statistiques Projet

### Documentation
- **Total fichiers MD:** 24 documents
- **Lignes documentation:** ~10.000 lignes
- **Langues:** Français, Portugais BR
- **Complétude:** 85%

### Code
- **Backend:** Symfony 6.4, PHP 8.3
- **Frontend:** À développer (React + TS)
- **Mobile:** À développer (React Native)
- **Hardware:** KiCad 9.0, exemple fonctionnel

### Infrastructure
- **Containerization:** Docker + Docker Compose
- **Orchestration:** Kubernetes (prévu)
- **CI/CD:** GitHub Actions (prévu)
- **Monitoring:** Prometheus + Grafana (prévu)

---

## 🎯 Organisation Par Type de Fichier

### Documentation Stratégique ⭐
```
ROADMAP.md                                  # Plan 24 mois
docs/planning/VISAO_PROJETO.md              # Vision
docs/planning/ESTUDO_MERCADO.md             # Marché
docs/management/PLANNING_6_MOIS.md          # Planning Phase 2
```

### Documentation Technique ⭐
```
docs/technical/ESPECIFICACOES_TECNICAS.md   # Specs
docs/technical/FABRICATION_BORNES_DIY.md    # DIY
docs/technical/GUIDE_SOUDURE_ASSEMBLAGE.md  # Soudure
docs/technical/GUIDE_TEST_VALIDATION.md     # Tests
docs/technical/architecture/ARQUITETURA_SISTEMA.md
```

### Code Backend ⭐
```
backend/src/Entity/Charging/*.php           # Entités
backend/src/Repository/Charging/*.php       # Repositories
backend/config/                             # Configuration
```

### Hardware ⭐
```
hardware/kicad_examples/*.kicad_*           # KiCad projet
hardware/kicad_examples/generate_fabrication.sh  # Automation
hardware/kicad_examples/fabrication/        # Outputs
```

### Infrastructure ⭐
```
infrastructure/docker/                      # Docker configs
docker-compose.yml                          # Stack locale
Makefile                                    # Commandes
```

---

## 🏷️ Conventions de Nommage

### Fichiers Documentation
- **Français:** `GUIDE_NOM_DOCUMENT.md` (UPPERCASE)
- **Portugais:** `GUIA_NOME_DOCUMENTO.md` (UPPERCASE)
- **Anglais:** `document_name.md` (lowercase) pour code

### Code Backend
- **Classes:** `PascalCase` (ex: `ChargingSession.php`)
- **Méthodes:** `camelCase` (ex: `startChargingSession()`)
- **Variables:** `camelCase` (ex: `$sessionId`)
- **Constants:** `SNAKE_CASE` (ex: `MAX_POWER_KW`)

### Hardware
- **Projets KiCad:** `nom_projet.kicad_*`
- **Scripts:** `snake_case.sh`
- **Outputs:** Organisation par type dans `/fabrication`

### Git
- **Branches:** `feature/nom-feature`, `bugfix/nom-bug`
- **Commits:** Convention Conventional Commits
  - `feat: nouvelle fonctionnalité`
  - `fix: correction bug`
  - `docs: documentation`
  - `refactor: refactoring`

---

## 📁 Répertoires à Créer (TODO)

### Court terme (Phase 1)
```
docs/management/communication/weekly_reports/
docs/management/stakeholders/
docs/technical/api/postman/
scripts/setup/
scripts/database/
.github/workflows/
```

### Moyen terme (Phase 2-3)
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

### Long terme (Phase 4-6)
```
docs/operations/maintenance/
docs/operations/procedures/
docs/operations/training/
infrastructure/monitoring/grafana/dashboards/
scripts/deploy/
```

---

## 🔍 Fichiers Clés Par Phase

### Phase 1: Planejamento
- ✅ `ROADMAP.md`
- ✅ `docs/planning/VISAO_PROJETO.md`
- ✅ `docs/management/PLANNING_6_MOIS.md`
- ⬜ `business_plan_2025-2027.md` (à créer)
- ⬜ `pitch_deck.pdf` (à créer)

### Phase 2: Hardware
- ✅ `hardware/kicad_examples/eletroposto_charger.*`
- ✅ `hardware/kicad_examples/generate_fabrication.sh`
- ✅ `docs/technical/GUIDE_SOUDURE_ASSEMBLAGE.md`
- ✅ `docs/technical/GUIDE_TEST_VALIDATION.md`
- ⬜ `hardware/kicad_examples/fabrication/v2.0/` (à créer)

### Phase 3: Software
- ✅ `backend/src/Entity/Charging/*.php`
- ⬜ `backend/src/Controller/Api/*.php` (à développer)
- ⬜ `backend/src/Service/Ocpp/*.php` (à développer)
- ⬜ `frontend/src/` (à développer)
- ⬜ `mobile/src/` (à développer)

### Phase 4: Certificação
- ⬜ `docs/certification/dossier_inmetro/` (à créer)
- ⬜ `docs/certification/test_reports/` (à créer)
- ⬜ `docs/certification/compliance_matrix.md` (à créer)

### Phase 5-6: Déploiement
- ⬜ `infrastructure/kubernetes/production/` (à créer)
- ⬜ `docs/operations/installation_sop.md` (à créer)
- ⬜ `docs/operations/operator_manual.md` (à créer)

---

## 🎨 Codes Couleur et Emojis

### Par Type de Document
- 📄 Documentation générale
- 📚 Documentation détaillée
- 📋 Planning et gestion
- 💼 Management
- 🔧 Technique
- ⚡ Hardware/Électronique
- 💻 Software/Code
- 🎨 Frontend
- 📱 Mobile
- 🐳 Infrastructure
- 🔐 Sécurité
- ⚖️ Légal
- 🏭 Opérations

### Par Statut
- ✅ Complété
- 🔄 En cours
- ⏳ Planifié
- ⬜ À faire
- ❌ Non démarré
- ⚠️ Attention requise
- 🎯 Prioritaire
- ⭐ Critique/Important

---

## 📝 Notes de Migration

### Ancienne Structure → Nouvelle Structure

Aucune migration nécessaire actuellement. La structure actuelle est bien organisée.

### Améliorations Suggérées

1. **Créer `/docs/certification/`**
   - Pour centraliser docs certification INMETRO

2. **Créer `/hardware/kicad_examples/libraries/`**
   - Pour symboles/footprints custom

3. **Créer `/scripts/`**
   - Pour scripts automation divers

4. **Ajouter `.github/workflows/`**
   - Pour CI/CD GitHub Actions

5. **Créer `/docs/api/postman/`**
   - Collections Postman pour tests API

---

## 🔗 Liens Rapides

### Documentation Essentielle
- [Roadmap 24 mois](./ROADMAP.md)
- [README Principal](./README.md)
- [Quick Start](./QUICK_START.md)

### Hardware
- [Hardware README](./hardware/kicad_examples/README.md)
- [Quick Start KiCad](./hardware/kicad_examples/QUICK_START.md)
- [Script Fabrication](./hardware/kicad_examples/generate_fabrication.sh)

### Backend
- [Entities](./backend/src/Entity/Charging/)
- [Configuration](./backend/config/)
- [Composer](./backend/composer.json)

### Documentation PT-BR
- [Planejamento 6 Meses](./docs/management/pt-br/PLANEJAMENTO_6_MESES.md)
- [Guia Soldagem](./docs/technical/pt-br/GUIA_SOLDAGEM_MONTAGEM.md)
- [Guia Testes](./docs/technical/pt-br/GUIA_TESTE_VALIDACAO.md)

---

## ✅ Checklist Organisation

### Fichiers Racine
- [x] README.md complet
- [x] ROADMAP.md créé
- [x] PROJECT_STRUCTURE.md créé
- [x] CONTRIBUTING.md présent
- [x] LICENSE présent
- [x] .gitignore configuré
- [x] Makefile avec commandes

### Documentation
- [x] Planning complet
- [x] Guides techniques (FR + PT)
- [x] Architecture documentée
- [ ] API documentée (Postman/OpenAPI)
- [ ] Procédures opérationnelles

### Code
- [x] Entities backend créées
- [x] Repositories créés
- [ ] Controllers API développés
- [ ] Tests unitaires
- [ ] Frontend développé

### Infrastructure
- [x] Docker Compose configuré
- [x] Dockerfiles créés
- [ ] K8s manifests
- [ ] CI/CD pipeline
- [ ] Monitoring setup

---

**Document créé par:** Équipe Eletroposto
**Dernière mise à jour:** 2025-01-11
**Prochaine révision:** 2025-02-11

🗂️ **Structure claire = Projet efficient!** 📁
