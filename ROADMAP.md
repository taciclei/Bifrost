# 🗺️ Roadmap Projeto Eletroposto

**Version:** 2.0
**Dernière mise à jour:** 2025-01-11
**Statut:** En développement actif

---

## 📋 Table des Matières

1. [Vue d'Ensemble](#vue-ensemble)
2. [Structure du Projet](#structure-projet)
3. [Phase 0: Fondations (COMPLÉTÉ ✅)](#phase-0)
4. [Phase 1: Planejamento Estratégico (EN COURS 🔄)](#phase-1)
5. [Phase 2: Desenvolvimento Hardware (6 mois)](#phase-2)
6. [Phase 3: Desenvolvimento Software (Parallèle)](#phase-3)
7. [Phase 4: Certificação e Validação (6 mois)](#phase-4)
8. [Phase 5: Instalação Piloto (3 mois)](#phase-5)
9. [Phase 6: Operação e Expansão (12+ mois)](#phase-6)
10. [Chronologie Globale](#chronologie)
11. [Dépendances Entre Phases](#dependances)
12. [Budget Global](#budget)
13. [Risques et Mitigations](#risques)

---

## 🎯 Vue d'Ensemble {#vue-ensemble}

### Mission
Développer et déployer un réseau de bornes de recharge pour véhicules électriques (Eletroposto) au Brésil, avec une approche DIY pour réduire les coûts de 86% vs solutions commerciales.

### Vision
Devenir le leader des solutions de recharge EV accessibles au Brésil d'ici 2027, avec 100+ stations déployées.

### Objectifs Stratégiques
- ✅ **Court terme (6 mois):** Prototypes validés et testés
- 🔄 **Moyen terme (12 mois):** Certification INMETRO + 5 stations pilotes
- 🎯 **Long terme (24 mois):** 100 stations opérationnelles

---

## 🏗️ Structure du Projet {#structure-projet}

### Architecture Actuelle

```
Thor projet/
├── 📄 Documentation Racine
│   ├── README.md                    # Documentation principale
│   ├── ROADMAP.md                   # Ce fichier - Plan global
│   ├── PROJECT_SUMMARY.md           # Résumé exécutif
│   ├── QUICK_START.md               # Guide démarrage rapide
│   ├── CONTRIBUTING.md              # Guide contribution
│   └── DOCUMENTS_CREES_SESSION2.md  # Historique session
│
├── 📚 docs/ - Documentation Complète
│   ├── planning/                    # Vision et stratégie
│   │   ├── VISAO_PROJETO.md        # Vision globale
│   │   ├── ESTUDO_MERCADO.md       # Étude marché brésilien
│   │   └── phase[1-5]-*/           # Plans par phase
│   │
│   ├── management/                  # Gestion projet
│   │   ├── PLANNING_6_MOIS.md      # Planning détaillé 6 mois
│   │   ├── GUIDE_ACHAT_COMPOSANTS.md # Guide achats
│   │   ├── USER_STORIES.md         # Stories utilisateurs
│   │   ├── pt-br/                  # Versions portugaises
│   │   ├── budget/
│   │   │   └── ORCAMENTO_DETALHADO.md
│   │   ├── risks/
│   │   │   └── ANALISE_RISCOS.md
│   │   └── marketing/
│   │       └── ESTRATEGIA_MARKETING.md
│   │
│   ├── technical/                   # Documentation technique
│   │   ├── ESPECIFICACOES_TECNICAS.md
│   │   ├── FABRICATION_BORNES_DIY.md
│   │   ├── GUIDE_SOUDURE_ASSEMBLAGE.md
│   │   ├── GUIDE_TEST_VALIDATION.md
│   │   ├── OUTILS_CONCEPTION_SCHEMAS.md
│   │   ├── pt-br/                  # Versions portugaises
│   │   ├── architecture/
│   │   │   ├── ARQUITETURA_SISTEMA.md
│   │   │   ├── ARQUITETURA_SYLIUS.md
│   │   │   └── DATABASE_SCHEMA.md
│   │   ├── API_DOCUMENTATION.md
│   │   ├── DEPLOYMENT_GUIDE.md
│   │   ├── MONITORING_OBSERVABILITY.md
│   │   └── QA_TEST_PLAN.md
│   │
│   ├── legal/
│   │   └── LGPD_COMPLIANCE.md
│   │
│   └── operations/
│       ├── maintenance/
│       ├── procedures/
│       └── training/
│
├── ⚡ hardware/ - Conception Électronique
│   └── kicad_examples/
│       ├── eletroposto_charger.kicad_*  # Projet KiCad principal
│       ├── pilot_signal_example.kicad_sch
│       ├── generate_fabrication.sh      # Script automatisation
│       ├── fabrication/                 # Outputs Gerbers/BOM
│       │   ├── gerber/
│       │   ├── drill/
│       │   ├── bom/
│       │   ├── assembly/
│       │   └── documentation/
│       ├── QUICK_START.md
│       ├── README.md
│       └── RESULTATS_TEST.md
│
├── 💻 backend/ - Backend Symfony
│   ├── src/
│   │   ├── Entity/Charging/         # Entités métier
│   │   │   ├── Station.php
│   │   │   ├── Charger.php
│   │   │   ├── ChargingSession.php
│   │   │   ├── Vehicle.php
│   │   │   └── MeterValue.php
│   │   └── Repository/Charging/     # Repositories
│   ├── config/                      # Configuration Symfony
│   │   ├── packages/
│   │   ├── routes.yaml
│   │   └── services.yaml
│   └── tests/
│
├── 🎨 frontend/ - Interface Web
│
├── 🐳 infrastructure/ - Docker & Deploy
│   └── docker/
│       ├── Dockerfile.php
│       ├── Dockerfile.websocket
│       ├── nginx/
│       └── php/
│
└── 🔧 scripts/ - Scripts automatisation
```

### État des Composants

| Composant | Statut | Complétude | Priorité |
|-----------|--------|------------|----------|
| **Documentation Planning** | ✅ Complet | 100% | Haute |
| **Documentation Technique** | ✅ Complet | 95% | Haute |
| **Hardware KiCad** | ✅ Exemple OK | 60% | Critique |
| **Backend Entities** | ✅ Base OK | 40% | Haute |
| **Backend API** | ⚠️ À développer | 10% | Haute |
| **Frontend** | ❌ Non démarré | 0% | Moyenne |
| **Infrastructure** | ✅ Base OK | 50% | Moyenne |
| **Tests** | ⚠️ Partiel | 20% | Haute |

---

## ✅ Phase 0: Fondations (COMPLÉTÉ) {#phase-0}

**Durée:** Novembre 2024
**Budget:** R$ 0 (documentation)
**Statut:** ✅ 100% Complété

### Réalisations

#### Session 1 (Nov 2024)
- ✅ Structure projet initialisée
- ✅ Documentation stratégique créée
  - Vision projet, étude marché
  - Architecture système, specs techniques
  - Analyse risques, budget détaillé
  - Marketing, compliance LGPD
- ✅ Entités Symfony créées (Station, Charger, etc.)
- ✅ Infrastructure Docker configurée
- ✅ Configuration Symfony + API Platform

#### Session 2 (Jan 2025)
- ✅ Guides techniques pratiques (FR + PT-BR)
  - Guide soudure et assemblage
  - Guide tests et validation IEC 61851-1
  - Guide achat composants
  - Planning 6 mois détaillé
- ✅ Projet KiCad exemple fonctionnel
- ✅ Script automatisation fabrication
- ✅ Tests script validés ✓

### Livrables Session 0
- 📄 16 documents techniques complets (~5.700 lignes)
- 🔧 Projet KiCad exemple + 12 Gerbers
- 📦 Script generate_fabrication.sh fonctionnel
- 💾 Entités backend + repositories

---

## 🔄 Phase 1: Planejamento Estratégico (EN COURS) {#phase-1}

**Durée:** Janvier 2025 (2-4 semaines)
**Budget:** R$ 10.000
**Statut:** 🔄 70% Complété

### Objectifs
- Finaliser tous documents stratégiques
- Définir feuille de route détaillée
- Sécuriser budget initial
- Former équipe core

### Tâches

#### 1.1 Finalisation Documentation Stratégique
- [x] Roadmap globale projet (ce document)
- [ ] Business plan détaillé 2025-2027
- [ ] Plan levée de fonds (R$ 500k seed)
- [ ] Pitch deck investisseurs
- [ ] Analyse concurrence approfondie

#### 1.2 Structuration Légale
- [ ] Constitution entreprise (LTDA ou SA)
- [ ] Inscription CNPJ
- [ ] Contrats partenaires/fournisseurs
- [ ] Contrat équipe
- [ ] Assurances projets

#### 1.3 Formation Équipe Core
- [ ] Recrutement Eng. Électronique Sênior
- [ ] Recrutement Dev Firmware STM32
- [ ] Formation KiCad avancé (2j)
- [ ] Formation STM32 (3j)
- [ ] Formation IEC 61851-1 (1j)

#### 1.4 Setup Infrastructure Développement
- [ ] Serveur développement (AWS/Azure)
- [ ] Repository privé (GitHub/GitLab)
- [ ] CI/CD pipeline
- [ ] Outils gestion projet (Jira/Linear)
- [ ] Licences logiciels (KiCad Pro, etc.)

### Livrables Phase 1
- [ ] Entreprise constituée et opérationnelle
- [ ] Équipe de 5 personnes formée
- [ ] Infrastructure dev opérationnelle
- [ ] Budget seed sécurisé (R$ 500k)

### Budget Phase 1
| Item | Coût |
|------|------|
| Frais légaux constitution | R$ 3.000 |
| Formations équipe | R$ 6.100 |
| Infrastructure (1 mois) | R$ 900 |
| **TOTAL** | **R$ 10.000** |

---

## ⚡ Phase 2: Desenvolvimento Hardware (6 mois) {#phase-2}

**Durée:** Février - Juillet 2025
**Budget:** R$ 470.350
**Statut:** ⏳ Planifié

### Objectifs
- Développer circuit Pilot Signal IEC 61851-1 complet
- Prototypes validés et testés
- Firmware fonctionnel
- Dossier certification préparé

### Timeline Détaillée

Voir **PLANNING_6_MOIS.md** pour détails complets.

#### Mois 1-2: Conception et Design
**Semaines 1-8**

- ✅ Spécifications techniques finalisées
- ⬜ Schéma électronique complet (KiCad)
- ⬜ PCB 4-layer design finalisé
- ⬜ BOM avec références exactes
- ⬜ Firmware initial (30% complété)
- ⬜ Commande PCB + composants

**Budget M1-2:** R$ 68.850

#### Mois 3: Prototypage
**Semaines 9-13**

- ⬜ Réception PCB et composants
- ⬜ Assemblage 2 prototypes
- ⬜ Tests électriques de base
- ⬜ Flash firmware sur PCB
- ⬜ Validation PWM 1kHz

**Budget M3:** R$ 67.500

#### Mois 4: Tests et Validation
**Semaines 14-17**

- ⬜ Tests IEC 61851-1 complets (22 tests)
- ⬜ Tests sécurité (isolation, fuite, etc.)
- ⬜ Identification problèmes
- ⬜ Corrections et prototypes v2 si nécessaire

**Budget M4:** R$ 66.000

#### Mois 5: Optimisation
**Semaines 18-22**

- ⬜ Assemblage prototypes v2
- ⬜ Tests performance
- ⬜ **Tests véhicules réels** (Nissan Leaf, Bolt, BMW i3)
- ⬜ Test endurance 168h

**Budget M5:** R$ 66.000

#### Mois 6: Certification
**Semaines 23-26**

- ⬜ Compilation dossier technique
- ⬜ Contact laboratoires accrédités (IPT, Lactec)
- ⬜ Documentation finale (manuels PT)
- ⬜ Présentation résultats
- ⬜ Échantillons envoyés laboratoire

**Budget M6:** R$ 136.000 (incluant R$ 50k pré-certification)

### Critères de Succès Phase 2
- [ ] PWM 1kHz ±1% validé oscilloscope
- [ ] États A/B/C/D détectés (IEC 61851-1)
- [ ] 22/22 tests IEC 61851-1 passés
- [ ] Isolation >5MΩ (sécurité)
- [ ] 3+ véhicules réels chargent sans erreur
- [ ] Test endurance 168h: zéro défaillance
- [ ] Dossier certification INMETRO prêt

### Livrables Phase 2
- PCB v2 finalisé (Gerbers + sources KiCad)
- Firmware v1.0 (code source + binaire)
- BOM production avec MPN
- 5 prototypes fonctionnels
- Rapports tests complets (IEC + sécurité)
- Manual Técnico Eletroposto (PT)
- Manual do Usuário (PT)
- Dossier certification complet

### Équipe Phase 2
| Rôle | Allocation | Coût/mois |
|------|-----------|-----------|
| Eng. Électronique Sênior | 100% | R$ 18.000 |
| Dev Firmware STM32 | 100% | R$ 12.000 |
| Técnico Assemblage | 100% | R$ 6.000 |
| Eng. Tests | 50% | R$ 4.500 |
| Chef Projet | 50% | R$ 7.500 |
| **TOTAL** | | **R$ 48.000/mois** |

### Risques Phase 2
| Risque | Mitigation |
|--------|------------|
| Retard shipping PCB | Commander 2 semaines avant |
| Échec tests IEC | Double vérification design pré-commande |
| Problème véhicule réel | Tester avec 5 véhicules différents |
| Composant défectueux | Commander 20% extra |

---

## 💻 Phase 3: Desenvolvimento Software (Parallèle) {#phase-3}

**Durée:** Mars - Août 2025 (6 mois)
**Budget:** R$ 180.000
**Statut:** ⏳ Planifié

### Objectifs
- Backend API complet (OCPP 1.6 + 2.0.1)
- Frontend web pour gestion stations
- Application mobile utilisateurs
- Système monitoring temps réel
- Intégration paiement

### Timeline

#### Mois 1-2: Backend API Core
**Mars - Avril 2025**

- ⬜ API REST complète (Symfony + API Platform)
- ⬜ Implémentation OCPP 1.6 (WebSocket)
- ⬜ CRUD stations, chargers, sessions
- ⬜ Système authentification (JWT)
- ⬜ Tests unitaires + intégration (80% coverage)

**Livrables:**
- API REST complète documentée
- OCPP 1.6 fonctionnel
- Tests automatisés

#### Mois 3-4: Frontend Web
**Mai - Juin 2025**

- ⬜ Dashboard admin (React/Vue.js)
- ⬜ Gestion stations et chargers
- ⬜ Visualisation sessions en temps réel
- ⬜ Rapports et analytics
- ⬜ Interface opérateur

**Livrables:**
- Dashboard web fonctionnel
- Interface responsive
- Documentation utilisateur

#### Mois 5: Application Mobile
**Juillet 2025**

- ⬜ App React Native (iOS + Android)
- ⬜ Localisation stations
- ⬜ QR code start charging
- ⬜ Paiement intégré
- ⬜ Historique sessions

**Livrables:**
- App mobile beta (iOS + Android)
- Intégration paiement

#### Mois 6: Monitoring & Déploiement
**Août 2025**

- ⬜ Monitoring Prometheus + Grafana
- ⬜ Logging centralisé (ELK)
- ⬜ Alertes incidents
- ⬜ CI/CD pipeline complet
- ⬜ Déploiement production

**Livrables:**
- Système monitoring opérationnel
- Alertes configurées
- Pipeline CI/CD

### Équipe Phase 3
| Rôle | Allocation | Coût/mois |
|------|-----------|-----------|
| Backend Dev Senior | 100% | R$ 15.000 |
| Frontend Dev | 100% | R$ 12.000 |
| Mobile Dev | 75% | R$ 9.000 |
| DevOps | 50% | R$ 6.000 |
| QA Engineer | 50% | R$ 3.000 |
| **TOTAL** | | **R$ 45.000/mois** |

### Technologies Stack

**Backend:**
- Symfony 6.4 + API Platform 3.2
- PHP 8.3
- PostgreSQL 16
- Redis (cache)
- Mercure (real-time)

**Frontend:**
- React 18 + TypeScript
- Tailwind CSS
- React Query
- Recharts (graphs)

**Mobile:**
- React Native 0.73
- Expo
- React Navigation

**Infrastructure:**
- Docker + Kubernetes
- AWS/Azure
- Terraform
- GitHub Actions

### Budget Phase 3
| Item | Coût |
|------|------|
| Salários (6 mois) | R$ 270.000 |
| Infraestrutura cloud | R$ 30.000 |
| Licenças e tools | R$ 10.000 |
| Serviços externos (payment) | R$ 20.000 |
| **TOTAL** | **R$ 330.000** |

---

## 🏆 Phase 4: Certificação e Validação (6 mois) {#phase-4}

**Durée:** Août 2025 - Janvier 2026
**Budget:** R$ 150.000
**Statut:** ⏳ Planifié

### Objectifs
- Certification INMETRO obtenue
- Certification ANATEL (si WiFi/4G)
- Homologação complète
- Conformité totale IEC 61851-1

### Timeline

#### Mois 7-8: Pré-Auditoria INMETRO
**Août - Septembre 2025**

- ⬜ Envoi dossier complet INMETRO
- ⬜ Pré-audit documentation
- ⬜ Corrections mineures demandées
- ⬜ Préparation 5 échantillons certifiés

#### Mois 9-10: Testes Laboratório
**Octobre - Novembre 2025**

- ⬜ Tests IPT ou Lactec (laboratoire accrédité)
  - Tests électriques complets
  - Tests sécurité
  - Tests EMC
  - Tests environnementaux
- ⬜ Rapport résultats laboratoire

#### Mois 11: Correções Finais
**Décembre 2025**

- ⬜ Corrections selon rapport labo
- ⬜ Re-tests si nécessaire
- ⬜ Validation finale

#### Mois 12: Certificação
**Janvier 2026**

- ⬜ Certificat INMETRO émis
- ⬜ Certificat ANATEL (si applicable)
- ⬜ Homologação complète
- ⬜ Publication registres officiels

### Laboratoires Accrédités

| Laboratoire | Localisation | Spécialité | Coût Estimé |
|-------------|--------------|------------|-------------|
| **IPT** | São Paulo | Elétrico | R$ 40-60k |
| **Lactec** | Curitiba | Energia | R$ 50-70k |
| **Labelo** | São Paulo | EMC/Sécurité | R$ 30-50k |

### Budget Phase 4
| Item | Coût |
|------|------|
| Tests laboratoire accrédité | R$ 60.000 |
| Frais INMETRO | R$ 50.000 |
| Frais ANATEL (si applicable) | R$ 20.000 |
| Corrections et re-tests | R$ 10.000 |
| Consultants spécialisés | R$ 10.000 |
| **TOTAL** | **R$ 150.000** |

### Critères de Succès Phase 4
- [ ] Certificat INMETRO Portaria 301/2019 obtenu
- [ ] Certificat ANATEL (si modules RF)
- [ ] Conformité 100% IEC 61851-1
- [ ] Homologação véhicules 5+ marques
- [ ] Autorisation commercialisation

---

## 🚀 Phase 5: Instalação Piloto (3 mois) {#phase-5}

**Durée:** Février - Avril 2026
**Budget:** R$ 250.000
**Statut:** ⏳ Planifié

### Objectifs
- Installer 5 stations pilotes
- Valider en conditions réelles
- Collecter données usage
- Ajuster modèle opérationnel

### Stations Pilotes

| Station | Localisation | Type | Chargers | Investissement |
|---------|--------------|------|----------|----------------|
| **Piloto 1** | São Paulo - Shopping | Public | 4x 22kW | R$ 80.000 |
| **Piloto 2** | São Paulo - Condominium | Privé | 2x 7kW | R$ 40.000 |
| **Piloto 3** | Rio - Entreprise | Commercial | 3x 22kW | R$ 60.000 |
| **Piloto 4** | Curitiba - Parking | Public | 4x 22kW | R$ 80.000 |
| **Piloto 5** | Brasília - Hôtel | Commercial | 2x 22kW | R$ 50.000 |

### Timeline

#### Mois 1: Préparation
**Février 2026**

- ⬜ Sélection emplacements finaux
- ⬜ Négociation contrats
- ⬜ Études électriques sites
- ⬜ Permis et autorisations
- ⬜ Commande équipements (100 PCB)

#### Mois 2: Installation
**Mars 2026**

- ⬜ Travaux génie civil
- ⬜ Installation électrique
- ⬜ Montage bornes
- ⬜ Configuration réseau
- ⬜ Tests commissioning

#### Mois 3: Exploitation Pilote
**Avril 2026**

- ⬜ Ouverture au public
- ⬜ Monitoring 24/7
- ⬜ Support utilisateurs
- ⬜ Collecte métriques
- ⬜ Ajustements opérationnels

### Métriques Pilote

Objectifs à mesurer:
- **Uptime:** >98%
- **Sessions/jour:** >30
- **Satisfaction:** >4.5/5
- **Temps résolution incidents:** <4h
- **Revenus/station:** >R$ 2.000/mois

### Budget Phase 5

| Item | Coût |
|------|------|
| Production 100 PCB assemblés | R$ 46.000 |
| Génie civil + électrique (5 sites) | R$ 100.000 |
| Équipements complémentaires | R$ 50.000 |
| Installation et commissioning | R$ 30.000 |
| Marketing lancement | R$ 15.000 |
| Contingence 10% | R$ 24.000 |
| **TOTAL** | **R$ 265.000** |

---

## 📈 Phase 6: Operação e Expansão (12+ mois) {#phase-6}

**Durée:** Mai 2026 - Décembre 2027
**Budget:** R$ 3.500.000 (100 stations)
**Statut:** ⏳ Planifié

### Objectifs
- Déploiement 100 stations
- Opération rentable
- Expansion territoriale
- Levée Série A

### Timeline Expansion

#### Semestre 1: Consolidation
**Mai - Octobre 2026**

- ⬜ Optimisation opérations pilotes
- ⬜ Déploiement 20 nouvelles stations
- ⬜ Équipe opérations 10 personnes
- ⬜ Centre support client
- ⬜ Revenu récurrent établi

**Objectifs S1:**
- 25 stations totales
- 500 sessions/mois
- R$ 50k revenus/mois

#### Semestre 2: Accélération
**Novembre 2026 - Avril 2027**

- ⬜ Déploiement 30 stations
- ⬜ Expansion nouvelles villes (RJ, BH, Curitiba)
- ⬜ Partenariats stratégiques (flottes)
- ⬜ Levée Série A (R$ 5M)

**Objectifs S2:**
- 55 stations totales
- 2.000 sessions/mois
- R$ 200k revenus/mois
- Break-even opérationnel

#### Année 2: Croissance
**Mai - Décembre 2027**

- ⬜ Déploiement 45 stations
- ⬜ Expansion nationale
- ⬜ Fast charging 150kW
- ⬜ Offres corporate

**Objectifs Y2:**
- 100 stations totales
- 8.000 sessions/mois
- R$ 800k revenus/mois
- EBITDA positif

### Modèle Opérationnel

**Équipe Opérations (100 stations):**
- Directeur opérations: 1
- Chefs régionaux: 3
- Techniciens maintenance: 10
- Support client: 5
- Commercial: 3
- Marketing: 2
- Admin/financier: 2
- **Total:** 26 personnes

**Coût opérationnel mensuel:**
- Salaires équipe: R$ 180.000
- Maintenance préventive: R$ 30.000
- Électricité: R$ 50.000
- Connectivité: R$ 10.000
- Support IT: R$ 15.000
- Marketing: R$ 25.000
- **Total:** R$ 310.000/mois

**Revenus projetés (100 stations):**
- Prix moyen/kWh: R$ 1.50
- Sessions/mois/station: 80
- kWh moyen/session: 25
- **Revenu/station/mois:** R$ 3.000
- **Revenu total/mois:** R$ 300.000

**Rentabilité:**
- Revenus: R$ 300k/mois
- Coûts opérations: R$ 310k/mois
- **EBITDA:** -R$ 10k/mois (break-even proche)
- **Avec 120 stations:** +R$ 50k/mois EBITDA

### Budget Phase 6

| Item | Coût Total |
|------|------------|
| Déploiement 95 nouvelles stations | R$ 2.850.000 |
| Opérations 18 mois | R$ 5.580.000 |
| Marketing | R$ 450.000 |
| Levée Série A (coûts) | R$ 200.000 |
| Contingence | R$ 420.000 |
| **TOTAL** | **R$ 9.500.000** |

**Financement:**
- Cashflow opérationnel: R$ 2.000.000
- Série A: R$ 5.000.000
- Financement équipements: R$ 2.500.000

---

## 📅 Chronologie Globale {#chronologie}

### Vue 24 Mois

```
2025
├── JAN  ✅ Phase 0 complété + Phase 1 démarré
├── FEV  🔄 Phase 1 + Phase 2 démarrage
├── MAR  ⚡ Phase 2 + Phase 3 (parallèle)
├── ABR  ⚡ Phase 2 Mois 2
├── MAI  ⚡ Phase 2 Mois 3 + Phase 3
├── JUN  ⚡ Phase 2 Mois 4 + Phase 3
├── JUL  ⚡ Phase 2 Mois 5 + Phase 3
├── AOÛ  ⚡ Phase 2 Mois 6 + Phase 3 + Phase 4 démarrage
├── SEP  🏆 Phase 4 Certification
├── OCT  🏆 Phase 4 Tests labo
├── NOV  🏆 Phase 4 Tests labo
└── DEC  🏆 Phase 4 Corrections

2026
├── JAN  🏆 Phase 4 Certificats obtenus
├── FEV  🚀 Phase 5 Piloto démarrage
├── MAR  🚀 Phase 5 Installation
├── ABR  🚀 Phase 5 Exploitation pilote
├── MAI  📈 Phase 6 Expansion démarrage
├── JUN  📈 Phase 6 Déploiement S1
├── JUL  📈 Phase 6
├── AOÛ  📈 Phase 6
├── SEP  📈 Phase 6
├── OCT  📈 Phase 6 (25 stations)
├── NOV  📈 Phase 6 Expansion S2
└── DEC  📈 Phase 6

2027
├── JAN-ABR  📈 Phase 6 S2 (55 stations)
├── MAI-DEC  📈 Phase 6 Croissance (100 stations)
└── DEC      🎯 Objectif 100 stations atteint
```

### Jalons Critiques

| Date | Jalon | Description |
|------|-------|-------------|
| **Jan 2025** | ✅ M0 | Documentation complète + KiCad exemple |
| **Fev 2025** | 🎯 M1 | Équipe formée + entreprise constituée |
| **Jul 2025** | 🎯 M2 | Prototypes validés + firmware v1.0 |
| **Ago 2025** | 🎯 M3 | Dossier certification déposé |
| **Jan 2026** | 🎯 M4 | Certificat INMETRO obtenu |
| **Abr 2026** | 🎯 M5 | 5 stations pilotes opérationnelles |
| **Out 2026** | 🎯 M6 | 25 stations + break-even |
| **Abr 2027** | 🎯 M7 | 55 stations + Série A |
| **Dez 2027** | 🎯 M8 | 100 stations + rentabilité |

---

## 🔗 Dépendances Entre Phases {#dependances}

### Diagramme de Dépendances

```
Phase 0: Fondations (COMPLÉTÉ ✅)
    │
    ├─→ Phase 1: Planejamento (EN COURS 🔄)
    │       │
    │       └─→ Phase 2: Hardware (6 mois) ⚡
    │               │
    │               ├─→ Phase 4: Certificação (6 mois) 🏆
    │               │       │
    │               │       └─→ Phase 5: Piloto (3 mois) 🚀
    │               │               │
    │               │               └─→ Phase 6: Expansão 📈
    │               │
    │               └─→ Fourniture specs pour Phase 3
    │
    └─→ Phase 3: Software (6 mois, parallèle) 💻
            │
            └─→ Nécessaire pour Phase 5 et 6
```

### Dépendances Critiques

**Phase 2 → Phase 4:**
- Prototypes validés requis avant certification
- Dossier technique complet nécessaire
- ⚠️ Risque: Retard Phase 2 = retard certification de 1:1

**Phase 2 + Phase 4 → Phase 5:**
- Certification INMETRO obligatoire avant installation
- PCB production nécessite design finalisé
- ⚠️ Risque: Sans certification = impossible d'installer

**Phase 3 → Phase 5:**
- Backend OCPP fonctionnel requis
- App mobile pour utilisateurs nécessaire
- Dashboard opérateur indispensable
- ⚠️ Risque: Software non prêt = stations non opérationnelles

**Phase 5 → Phase 6:**
- Succès pilote valide modèle
- Métriques pilote informent expansion
- ⚠️ Risque: Échec pilote = pivot nécessaire

---

## 💰 Budget Global {#budget}

### Récapitulatif Par Phase

| Phase | Durée | Budget | Statut |
|-------|-------|--------|--------|
| **Phase 0: Fondations** | Nov 2024 | R$ 0 | ✅ Complété |
| **Phase 1: Planejamento** | Jan 2025 | R$ 10.000 | 🔄 En cours |
| **Phase 2: Hardware** | 6 mois | R$ 470.350 | ⏳ Planifié |
| **Phase 3: Software** | 6 mois | R$ 330.000 | ⏳ Planifié |
| **Phase 4: Certificação** | 6 mois | R$ 150.000 | ⏳ Planifié |
| **Phase 5: Piloto** | 3 mois | R$ 265.000 | ⏳ Planifié |
| **Phase 6: Expansão** | 18 mois | R$ 3.500.000 | ⏳ Planifié |
| **TOTAL 24 MOIS** | | **R$ 4.725.350** | |

### Répartition Budget Total

```
Budget Total: R$ 4.725.350

Développement (Phase 1-3):     R$ 810.350  (17%)
├─ Hardware                     R$ 470.350
├─ Software                     R$ 330.000
└─ Planejamento                 R$ 10.000

Certification (Phase 4):        R$ 150.000  (3%)

Déploiement (Phase 5-6):        R$ 3.765.000 (80%)
├─ Piloto (5 stations)          R$ 265.000
└─ Expansão (95 stations)       R$ 3.500.000
```

### Financement Par Phase

**Seed Round (Phase 1-4):** R$ 1.000.000
- Bootstrapping: R$ 50.000
- Angels/FFF: R$ 200.000
- Seed VC: R$ 750.000

**Série A (Phase 5-6):** R$ 5.000.000
- Lead investor: R$ 3.000.000
- Co-investors: R$ 2.000.000

**Financement équipements:** R$ 2.500.000
- Banques: R$ 1.500.000
- Leasing: R$ 1.000.000

**Total levé:** R$ 8.500.000

### ROI et Rentabilité

**Investissement total:** R$ 4.725.350
**Revenu mensuel (100 stations):** R$ 300.000
**Coûts opérationnels mensuels:** R$ 310.000

**Break-even:** 120 stations (~30 mois)
**ROI 5 ans:** 280% (station rentable après 18 mois)

**Valuation projetée:**
- Seed (2025): R$ 5M
- Série A (2027): R$ 50M
- Exit/IPO (2030): R$ 500M+ (objectif)

---

## ⚠️ Risques et Mitigations {#risques}

### Matrice de Risques

| Catégorie | Risque | Probabilité | Impact | Mitigation |
|-----------|--------|-------------|--------|------------|
| **Technique** | Échec certification INMETRO | Moyen (20%) | Critique | Double validation design, consultant expert |
| **Technique** | Problème compatibilité véhicules | Moyen (25%) | Élevé | Tests avec 10+ modèles différents |
| **Financier** | Dépassement budget 30%+ | Élevé (40%) | Élevé | Contingence 20%, budget conservateur |
| **Opérationnel** | Panne critique stations | Élevé (50%) | Moyen | Monitoring 24/7, pièces détachées |
| **Commercial** | Adoption lente marché | Moyen (30%) | Critique | Marketing agressif, prix compétitifs |
| **Régulateur** | Changement régulation | Faible (10%) | Élevé | Veille réglementaire, lobbying |
| **Supply Chain** | Retard composants | Élevé (40%) | Moyen | Stock tampon, fournisseurs multiples |
| **Humain** | Départ key person | Moyen (20%) | Élevé | Documentation, formation croisée |
| **Concurrence** | Entrée gros acteur | Moyen (30%) | Élevé | Innovation continue, fidélisation |
| **Technologique** | Obsolescence rapide | Faible (15%) | Moyen | Architecture modulaire, updates |

### Plans de Contingence

#### Échec Certification
- **Action:** Consultant expert certification embauché dès Phase 2
- **Budget:** +R$ 30k
- **Délai:** +2 mois

#### Retard Supply Chain Critique
- **Action:** Commander composants critiques 3 mois avant
- **Budget:** +R$ 50k stock
- **Délai:** +1 mois

#### Adoption Marché Lente
- **Action:** Pivot B2B corporate, partenariats flottes
- **Budget:** -30% revenus Y1
- **Délai:** -6 mois break-even

---

## 📍 Points de Décision Go/No-Go

### Checkpoint 1: Fin Phase 2 (Juillet 2025)
**Critères:**
- [ ] Prototypes validés 3+ véhicules différents
- [ ] Tests IEC 61851-1: 22/22 passés
- [ ] Budget Phase 2 ≤ R$ 550k (budget + 15%)
- [ ] Équipe stable (0 départ)

**Décision:** GO → Phase 4 Certification / NO-GO → Pivot ou arrêt

### Checkpoint 2: Fin Phase 4 (Janvier 2026)
**Critères:**
- [ ] Certificat INMETRO obtenu
- [ ] Backend + App fonctionnels
- [ ] Budget Phases 2-4 ≤ R$ 1.1M
- [ ] Contrats pilotes signés (3 minimum)

**Décision:** GO → Phase 5 Piloto / NO-GO → Re-certification ou pivot

### Checkpoint 3: Fin Phase 5 (Avril 2026)
**Critères:**
- [ ] 5 stations opérationnelles
- [ ] Uptime >95%
- [ ] Satisfaction >4.0/5
- [ ] R$ 10k+ revenus/mois
- [ ] Série A pipeline solide

**Décision:** GO → Phase 6 Expansion / NO-GO → Optimisation pilotes 3 mois

---

## 📚 Documentation Associée

### Documents Stratégiques
- `/docs/planning/VISAO_PROJETO.md` - Vision globale
- `/docs/planning/ESTUDO_MERCADO.md` - Étude marché brésilien
- `/PROJECT_SUMMARY.md` - Résumé exécutif

### Gestion et Budget
- `/docs/management/PLANNING_6_MOIS.md` - Planning détaillé Phase 2
- `/docs/management/GUIDE_ACHAT_COMPOSANTS.md` - Guide achats
- `/docs/management/budget/ORCAMENTO_DETALHADO.md` - Budget détaillé
- `/docs/management/risks/ANALISE_RISCOS.md` - Analyse risques

### Technique Hardware
- `/docs/technical/FABRICATION_BORNES_DIY.md` - Faisabilité DIY
- `/docs/technical/GUIDE_SOUDURE_ASSEMBLAGE.md` - Guide assemblage
- `/docs/technical/GUIDE_TEST_VALIDATION.md` - Protocoles tests
- `/docs/technical/OUTILS_CONCEPTION_SCHEMAS.md` - Guide outils
- `/hardware/kicad_examples/README.md` - Documentation KiCad

### Technique Software
- `/docs/technical/architecture/ARQUITETURA_SISTEMA.md` - Architecture système
- `/docs/technical/API_DOCUMENTATION.md` - Documentation API
- `/docs/technical/DEPLOYMENT_GUIDE.md` - Guide déploiement
- `/docs/technical/MONITORING_OBSERVABILITY.md` - Monitoring

### Versions Portugais (PT-BR)
- `/docs/management/pt-br/PLANEJAMENTO_6_MESES.md`
- `/docs/management/pt-br/GUIA_COMPRA_COMPONENTES.md`
- `/docs/technical/pt-br/GUIA_SOLDAGEM_MONTAGEM.md`
- `/docs/technical/pt-br/GUIA_TESTE_VALIDACAO.md`

---

## 🎯 Prochaines Actions Immédiates

### Cette Semaine (Jan 2025)
1. [x] Créer cette roadmap
2. [ ] Finaliser business plan 2025-2027
3. [ ] Préparer pitch deck investisseurs
4. [ ] Lister candidats équipe core (5 personnes)
5. [ ] Identifier 3 laboratoires certification

### Ce Mois (Janvier 2025)
1. [ ] Constituer entreprise (LTDA)
2. [ ] Recruter Eng. Électronique + Dev Firmware
3. [ ] Sécuriser R$ 200k seed initial
4. [ ] Setup infrastructure développement
5. [ ] Lancer Phase 2 (Hardware)

### Ce Trimestre (Q1 2025)
1. [ ] Phase 1 complétée à 100%
2. [ ] Phase 2 lancée (M1-2 complétés)
3. [ ] Phase 3 démarrée (backend)
4. [ ] Seed round bouclé (R$ 500k)
5. [ ] Schéma électronique + PCB design finalisés

---

## 📞 Contact et Gouvernance

### Équipe Leadership

**Founder/CEO:** [À définir]
**CTO Hardware:** [À recruter]
**CTO Software:** [À recruter]
**CFO:** [À recruter]
**COO:** [À recruter]

### Advisors

**Advisor Certification:** [Expert INMETRO]
**Advisor Hardware:** [Expert automotive electronics]
**Advisor Software:** [Expert OCPP/EV charging]
**Advisor Business:** [Expert mobilité électrique BR]

### Board

- Founder/CEO
- Lead Investor (post-seed)
- Independent board member (expert EV)

---

## 📊 KPIs Globaux Projet

### Phase 2-3 (Développement)
- Respect planning: ±10%
- Respect budget: ±15%
- Tests passés: 100%
- Code coverage: >80%

### Phase 4 (Certification)
- Délai certification: <8 mois
- Taux succès tests labo: 100%
- Budget certification: ≤R$ 150k

### Phase 5-6 (Déploiement)
- Uptime stations: >98%
- Satisfaction client: >4.5/5
- Temps résolution: <4h
- Revenus/station: >R$ 3k/mois

### Financier Global
- Burn rate mensuel: <budget +10%
- CAC (coût acquisition client): <R$ 50
- LTV/CAC ratio: >3:1
- Mois jusqu'à break-even: <30

---

**Document créé par:** Équipe Eletroposto
**Version:** 2.0
**Date:** 2025-01-11
**Prochaine révision:** 2025-02-11 (mensuelle)

---

🚀 **Let's build the future of EV charging in Brazil!** ⚡🇧🇷
