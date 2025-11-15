# Fabrication de Bornes de Recharge DIY - Analyse de Rentabilité

## 📋 Sommaire Exécutif

**Question principale:** Est-il rentable de fabriquer nos propres bornes de recharge en achetant les composants en Chine?

**Réponse courte:** **OUI, potentiellement 60-75% d'économies!**

- **Borne commerciale (clé en main):** R$ 15.000 - R$ 45.000 (AC 7-22kW)
- **Borne DIY (composants Chine):** R$ 4.500 - R$ 12.000 (AC 7-22kW)
- **Économie moyenne:** R$ 10.500 - R$ 33.000 par borne (70%)

**Pour 100 bornes:** Économie potentielle de **R$ 1.050.000 - R$ 3.300.000**

---

## 🎯 Avantages et Inconvénients

### ✅ Avantages

| Avantage | Impact |
|----------|--------|
| **Coût réduit de 60-75%** | Économie massive sur capital initial |
| **Marges bénéficiaires accrues** | ROI plus rapide (12-18 mois vs 24-36 mois) |
| **Contrôle total** | Personnalisation hardware/software |
| **Maintenance simplifiée** | Connaissance complète du système |
| **Indépendance fournisseurs** | Pas de lock-in commercial |
| **Stock de pièces détachées** | Réparations rapides et économiques |
| **Innovation possible** | Développement de fonctionnalités uniques |

### ❌ Inconvénients et Risques

| Risque | Mitigation |
|--------|------------|
| **Homologation INMETRO** | Budget R$ 50k-100k certification, délai 6-12 mois |
| **Responsabilité produit** | Assurance RC produits (R$ 10k-20k/an) |
| **Expertise technique** | Embaucher ingénieur électronique senior |
| **Temps de développement** | 6-9 mois avant production série |
| **Garantie et SAV** | Stock pièces + équipe technique dédiée |
| **Conformité NR-10** | Formation obligatoire électriciens |
| **Défauts de fabrication** | Tests rigoureux + contrôle qualité |

---

## 🔧 Liste Complète des Composants (Borne AC 22kW Type 2)

### 1. Module de Contrôle Principal

| Composant | Spécifications | Prix Unitaire (USD) | Fournisseur |
|-----------|----------------|---------------------|-------------|
| **Carte OCPP Controller** | OCPP 1.6J/2.0.1, WiFi/4G/Ethernet, RS485 | $180-250 | Alibaba (Chine) |
| **Microcontrôleur** | STM32F4/ESP32, 32-bit ARM | $15-35 | AliExpress |
| **Module 4G LTE** | Quectel EC25/SIM7600, Cat-4 | $25-40 | Alibaba |
| **Module WiFi** | ESP32-WROOM, dual-band | $8-15 | AliExpress |
| **Lecteur RFID/NFC** | 13.56MHz, ISO14443A/B | $12-25 | Alibaba |
| **Écran LCD/LED** | 7" touchscreen, 800x480 | $35-60 | Alibaba |
| **RTC (Real-Time Clock)** | DS3231, batterie backup | $3-8 | AliExpress |

**Sous-total Module Contrôle:** $278-433 (R$ 1.390 - R$ 2.165)

---

### 2. Module de Puissance

| Composant | Spécifications | Prix Unitaire (USD) | Fournisseur |
|-----------|----------------|---------------------|-------------|
| **Contacteur principal** | 40A, 3-phase, AC-3, bobine 230V | $45-80 | Alibaba |
| **Relais auxiliaires** | 2x 30A SPDT, 12V/24V DC | $8-15 (x2) | AliExpress |
| **Disjoncteur triphasé** | 32A/40A, courbe C, 6kA | $25-45 | Alibaba |
| **Différentiel 30mA** | Type A, 40A, 30mA AC+DC | $35-60 | Alibaba |
| **Parafoudre Type 2** | 3P+N, 20kA, classe II | $30-55 | Alibaba |
| **Transformateur isolement** | Optionnel, 22kW galvanique | $120-200 | Alibaba |

**Sous-total Module Puissance:** $271-455 (R$ 1.355 - R$ 2.275)

---

### 3. Connecteurs et Câbles

| Composant | Spécifications | Prix Unitaire (USD) | Fournisseur |
|-----------|----------------|---------------------|-------------|
| **Câble Type 2 attaché** | 5m, 32A triphasé, cuivre 6mm² | $85-150 | Alibaba |
| **Prise Type 2 (socket)** | IEC 62196-2, 32A, IP54 | $65-120 | Alibaba |
| **Connecteur entrée** | 3P+N+T, 40A industrial | $15-30 | Alibaba |
| **Câble alimentation** | 5m, 6mm², triphasé flexible | $25-45 | Alibaba |

**Sous-total Connecteurs:** $190-345 (R$ 950 - R$ 1.725)

---

### 4. Mesure et Protection

| Composant | Spécifications | Prix Unitaire (USD) | Fournisseur |
|-----------|----------------|---------------------|-------------|
| **Compteur énergie (kWh meter)** | DIN-rail, Modbus RTU, MID certified | $40-75 | Alibaba |
| **Capteur courant** | 3x CT 100A/5A, précision 0.5% | $18-35 (x3) | AliExpress |
| **Capteur tension** | 3-phase voltage sensor, ZMPT101B | $8-15 | AliExpress |
| **Capteur température** | 3x DS18B20 waterproof | $5-10 (x3) | AliExpress |
| **Détecteur fuite à la terre** | RCD 30mA AC/DC module | $25-45 | Alibaba |
| **Earth leakage relay** | Protection différentielle programmable | $35-60 | Alibaba |

**Sous-total Mesure:** $131-240 (R$ 655 - R$ 1.200)

---

### 5. Boîtier et Mécanique

| Composant | Spécifications | Prix Unitaire (USD) | Fournisseur |
|-----------|----------------|---------------------|-------------|
| **Boîtier métallique** | IP54/IP65, 600x400x250mm, acier galva | $80-150 | Alibaba |
| **Support mural** | Acier inox, ajustable | $25-45 | Alibaba |
| **Serrure électronique** | Contrôle accès maintenance | $15-30 | AliExpress |
| **Joints d'étanchéité** | IP65 cable glands | $10-20 | AliExpress |
| **Ventilation** | 2x ventilateurs 120mm, IP54 | $15-25 (x2) | AliExpress |
| **Peinture/finition** | Powder coating, couleur custom | $20-40 | Local |

**Sous-total Boîtier:** $165-310 (R$ 825 - R$ 1.550)

---

### 6. Alimentation et Électronique Auxiliaire

| Composant | Spécifications | Prix Unitaire (USD) | Fournisseur |
|-----------|----------------|---------------------|-------------|
| **Alimentation 24V DC** | 5A DIN-rail, 100-240VAC input | $18-35 | AliExpress |
| **Alimentation 12V DC** | 3A pour LCD/modules | $12-22 | AliExpress |
| **Batterie backup** | 12V 7Ah, maintien 4h | $15-28 | AliExpress |
| **PCB custom** | Circuit pilot signal + safety | $30-60 | PCBWay/JLCPCB |
| **Câblage interne** | Fils 1.5-6mm², cosses, dominos | $25-45 | Local |
| **LED indicateurs** | RGB multi-état, étanche IP65 | $8-15 | AliExpress |

**Sous-total Alimentation:** $108-205 (R$ 540 - R$ 1.025)

---

### 7. Logiciel et Certification (non-matériel)

| Item | Description | Coût (USD) |
|------|-------------|-----------|
| **Firmware OCPP** | Open source (SteVe, MicroOcpp) ou custom | $0-500 |
| **Interface utilisateur** | Écran LCD custom UI | $200-800 |
| **Tests et prototypes** | 3-5 prototypes complets | $1.500-3.000 |
| **Certification INMETRO** | Tests conformité Portaria 301/2019 | $10.000-20.000 |
| **Homologation ANATEL** | Modules sans-fil (obrigatoire) | $3.000-8.000 |

**Sous-total Software/Certif:** $14.700-32.300 (R$ 73.500 - R$ 161.500)

---

## 💰 Analyse de Coûts - Comparaison

### Borne AC 22kW Type 2 (Prix en Reais R$)

| Catégorie | DIY Chine | Commercial Brésil | Économie |
|-----------|-----------|-------------------|----------|
| **Composants électroniques** | R$ 6.630 | R$ 18.000 | **64% ↓** |
| **Assemblage (50h x R$ 80/h)** | R$ 4.000 | Inclus | - |
| **Certification/Tests** | R$ 120.000* | Inclus | - |
| **Transport Chine** | R$ 1.200 | - | - |
| **Imposition (60% II+IPI+ICMS)** | R$ 3.978 | - | - |
| **Marge sécurité 20%** | R$ 1.326 | - | - |
| **TOTAL par borne (série)** | **R$ 11.830** | **R$ 35.000** | **66% ↓** |
| **TOTAL 100 bornes** | **R$ 1.183.000** | **R$ 3.500.000** | **R$ 2.317.000** |

**Notes importantes:**
- *Certification R$ 120k amortie sur 100 bornes = R$ 1.200/borne
- Prix DIY valable pour commande >50 unités (économies d'échelle)
- Prix commercial inclut garantie 2 ans + SAV

---

### Modèle Borne AC 7kW (Entry-level)

| Composant | DIY | Commercial | Différence |
|-----------|-----|------------|------------|
| Contrôleur (monophasé) | R$ 900 | - | - |
| Module puissance | R$ 800 | - | - |
| Câble Type 2 3.5m | R$ 600 | - | - |
| Boîtier compact | R$ 500 | - | - |
| Autres composants | R$ 1.200 | - | - |
| **Total composants** | **R$ 4.000** | R$ 15.000 | **73% ↓** |
| Assemblage + certif | R$ 3.500 | Inclus | - |
| **TOTAL** | **R$ 7.500** | **R$ 15.000** | **50% ↓** |

---

## 🏗️ Schéma Technique - Architecture Borne AC 22kW

```
┌─────────────────────────────────────────────────────────────────┐
│                    ALIMENTATION RÉSEAU 3-PHASE                  │
│                    400VAC / 32A (L1, L2, L3, N, PE)            │
└────────────────────────────┬────────────────────────────────────┘
                             │
                    ┌────────▼─────────┐
                    │   DISJONCTEUR    │  40A Courbe C
                    │   TRIPOLAIRE     │  (Protection surcharge)
                    └────────┬─────────┘
                             │
                    ┌────────▼─────────┐
                    │  DIFFÉRENTIEL    │  40A / 30mA Type A
                    │   (RCD/GFCI)     │  (Protection personnes)
                    └────────┬─────────┘
                             │
                    ┌────────▼─────────┐
                    │   PARAFOUDRE     │  Type 2 (20kA)
                    │    (SPD)         │  (Protection foudre)
                    └────────┬─────────┘
                             │
        ┌────────────────────┼────────────────────┐
        │                    │                    │
        │           ┌────────▼─────────┐          │
        │           │   COMPTEUR kWh   │          │
        │           │   (MID Certified) │          │
        │           │   Modbus RTU     │          │
        │           └────────┬─────────┘          │
        │                    │                    │
        │           ┌────────▼─────────┐          │
        │           │   CONTACTEUR     │          │
        │           │   PRINCIPAL      │◄─────────┼───┐
        │           │   40A / 3-phase  │          │   │
        │           └────────┬─────────┘          │   │
        │                    │                    │   │
        │         ┌──────────▼──────────┐         │   │
        │         │  CÂBLE TYPE 2       │         │   │ Commande 24VDC
        │         │  5m / 32A           │         │   │
        │         │  7 broches (3P+N+PE │         │   │
        │         │          +CP+PP)    │         │   │
        │         └──────────┬──────────┘         │   │
        │                    │                    │   │
        │              ┌─────▼──────┐             │   │
        │              │  VÉHICULE  │             │   │
        │              │  ÉLECTRIQUE│             │   │
        │              └────────────┘             │   │
        │                                         │   │
┌───────┴─────────────────────────────────────────┴───┴─────────┐
│                    MODULE DE CONTRÔLE                          │
├────────────────────────────────────────────────────────────────┤
│                                                                │
│  ┌──────────────┐      ┌─────────────┐      ┌──────────────┐ │
│  │ MICROCONTR.  │◄────►│   ÉCRAN     │      │  LECTEUR     │ │
│  │  STM32F4     │      │   LCD 7"    │      │  RFID/NFC    │ │
│  │  (Principal) │      │  Tactile    │      │  13.56MHz    │ │
│  └──────┬───────┘      └─────────────┘      └──────────────┘ │
│         │                                                     │
│         ├─────────┬────────────┬─────────────┬───────────┐   │
│         │         │            │             │           │   │
│    ┌────▼───┐ ┌──▼─────┐  ┌───▼────┐   ┌────▼────┐  ┌───▼───┐│
│    │ Module │ │ Module │  │Compteur│   │Capteurs │  │Circuit││
│    │  4G/   │ │  WiFi  │  │ kWh    │   │Courant/ │  │ Pilot ││
│    │  LTE   │ │ESP32   │  │(RS485) │   │Tension  │  │ (CP)  ││
│    └────┬───┘ └────────┘  └────────┘   └─────────┘  └───┬───┘│
│         │                                                 │    │
│    ┌────▼─────────────────────────────────────────┐      │    │
│    │         BACKEND OCPP 1.6J/2.0.1              │      │    │
│    │      (WebSocket + HTTPS)                     │      │    │
│    │   • RemoteStartTransaction                   │      │    │
│    │   • MeterValues (temps réel)                 │      │    │
│    │   • StatusNotification                       │      │    │
│    └──────────────────────────────────────────────┘      │    │
│                                                           │    │
│  ┌────────────────────────────────────────────────────────▼──┐│
│  │              CIRCUIT PILOT SIGNAL (IEC 61851-1)          ││
│  │                                                           ││
│  │  PWM 1kHz ±12V:                                          ││
│  │  • Duty Cycle 10-96% → Courant max (6-80A)              ││
│  │  • Détection véhicule (résistance 2.74kΩ / 882Ω)        ││
│  │  • États: A (standby), B (connected), C (charging),     ││
│  │            D (ventilation), E/F (error)                  ││
│  └───────────────────────────────────────────────────────────┘│
│                                                                │
│  ┌──────────────────────────────────────────────────────────┐ │
│  │            SÉCURITÉS INTÉGRÉES                           │ │
│  │  ✓ Détection fuite terre (30mA, Type A AC+DC)           │ │
│  │  ✓ Surchauffe câble (DS18B20 >80°C → arrêt)             │ │
│  │  ✓ Surintensité (>105% courant nominal)                 │ │
│  │  ✓ Surtension/Sous-tension réseau (±15%)                │ │
│  │  ✓ Perte communication OCPP (mode dégradé local)        │ │
│  │  ✓ Watchdog hardware (reset auto si freeze)             │ │
│  └──────────────────────────────────────────────────────────┘ │
│                                                                │
│  ┌──────────────┐   ┌──────────────┐   ┌──────────────┐      │
│  │ ALIM 24VDC   │   │ ALIM 12VDC   │   │  BATTERIE    │      │
│  │ 5A (relais)  │   │ 3A (LCD/MCU) │   │  12V 7Ah     │      │
│  └──────────────┘   └──────────────┘   └──────────────┘      │
│                                                                │
└────────────────────────────────────────────────────────────────┘

LÉGENDE:
  ──────  Puissance AC (400VAC triphasé)
  ◄────►  Communication données (RS485, SPI, I2C)
  ──┬──   Connexion commune
```

---

## 🔌 Circuit Pilot Signal (CP) - Détail Technique

Le signal Pilot est **l'élément clé** de la communication véhicule ↔ borne selon IEC 61851-1.

### Principe de Fonctionnement

```
BORNE                           CÂBLE CP              VÉHICULE
┌─────────────┐                                    ┌──────────────┐
│             │                                    │              │
│   +12V ─────┼────────┬───────── CP Pin ─────────┼──┐           │
│             │        │                          │  │ Résistance│
│   PWM GEN   │      ┌─┴─┐                        │  │  State    │
│   1kHz      │      │1kΩ│                        │  └───┬───────┤
│   (MCU)     │      └─┬─┘                        │      │       │
│             │        │                          │   ┌──┴──┐    │
│   -12V ─────┼────────┴───────── PE Pin ─────────┼───│ GND │    │
│             │                                    │   └─────┘    │
└─────────────┘                                    └──────────────┘

Duty Cycle PWM:
  10% = 6A max
  20% = 12A max
  30% = 18A max
  40% = 24A max
  50% = 30A max
  60% = 36A max
  96% = 80A max

Formule: I_max (A) = Duty_Cycle (%) × 0.6
```

### États du Pilot Signal

| État | Résistance Véhicule | Tension CP | Signification | Action Borne |
|------|---------------------|------------|---------------|--------------|
| **A** | ∞ (déconnecté) | +12V DC | Aucun véhicule | Contacteur OUVERT |
| **B** | 2.74kΩ | +9V PWM | Véhicule connecté, prêt | PWM actif, attente auth |
| **C** | 882Ω | +6V PWM | Charge demandée | Contacteur FERMÉ |
| **D** | 246Ω | +3V PWM | Charge + ventilation | Contacteur FERMÉ + ventil |
| **E** | 0Ω (court-circuit) | 0V | **ERREUR** | Arrêt immédiat |
| **F** | - | -12V | **DÉFAUT BORNE** | Diagnostic interne |

---

## 📐 Schéma PCB Custom - Circuit Pilot + Safety

```
┌──────────────────────────────────────────────────────────────┐
│              PCB CONTRÔLE PILOT & SÉCURITÉ                   │
│                    (Version Rev 1.0)                         │
├──────────────────────────────────────────────────────────────┤
│                                                              │
│   ┌──────── ENTRÉE MICROCONTRÔLEUR ────────┐                │
│   │  PWM_OUT (GPIO, 1kHz, 3.3V logic)      │                │
│   │  CP_SENSE (ADC, mesure tension)        │                │
│   │  RELAY_CMD (GPIO, commande contacteur) │                │
│   └──────────────┬──────────────────────────┘                │
│                  │                                           │
│   ┌──────────────▼───────────────────────────────┐          │
│   │     DRIVER PWM +12V/-12V                     │          │
│   │     (TC4420 + Level Shifter)                 │          │
│   │                                               │          │
│   │   +12V ──┬──[1kΩ]──┬── CP_OUT                │          │
│   │          │          │                         │          │
│   │        ┌─┴─┐      ┌─┴─┐                       │          │
│   │        │2N2│      │2N7│ MOSFET N              │          │
│   │        │222│      │000│ (PWM switching)       │          │
│   │        └─┬─┘      └─┬─┘                       │          │
│   │          │          │                         │          │
│   │   -12V ──┴──────────┴─────────────────        │          │
│   └───────────────────────┬──────────────────────┘          │
│                           │ CP_OUT                           │
│                           │                                  │
│   ┌───────────────────────▼──────────────────────┐          │
│   │     MESURE TENSION CP (Diviseur + ADC)       │          │
│   │                                               │          │
│   │   CP_OUT ──[22kΩ]──┬──[10kΩ]── GND          │          │
│   │                     │                         │          │
│   │                     └─► ADC_IN (0-3.3V)      │          │
│   │                        (STM32 12-bit ADC)     │          │
│   └───────────────────────────────────────────────┘          │
│                                                              │
│   ┌─────────── PROTECTION SURTENSION ──────────┐            │
│   │   CP_OUT ──[TVS 15V]── GND                 │            │
│   │            (Bidirectionnel)                 │            │
│   └─────────────────────────────────────────────┘            │
│                                                              │
│   ┌─────────── RELAIS CONTACTEUR ──────────────┐            │
│   │                                             │            │
│   │   RELAY_CMD ──[1kΩ]──┬──► Optocoupleur     │            │
│   │                       │     (4N35)          │            │
│   │                     ┌─┴─┐                   │            │
│   │              GND ───┤LED├── +24V            │            │
│   │                     └───┘                   │            │
│   │                       │                     │            │
│   │                       └──► MOSFET IRF540    │            │
│   │                           (Commande 24VDC)  │            │
│   │                           │                 │            │
│   │                           └─► BOBINE        │            │
│   │                               CONTACTEUR    │            │
│   └─────────────────────────────────────────────┘            │
│                                                              │
│   ┌────────── DÉTECTION COURANT FUITE ─────────┐            │
│   │                                             │            │
│   │   TORE FERRITE (L1+L2+L3+N traversent)     │            │
│   │         │                                   │            │
│   │         └─► Bobine secondaire 1000:1       │            │
│   │                  │                          │            │
│   │                  └─► Amplificateur OP07    │            │
│   │                       (Gain x1000)          │            │
│   │                       │                     │            │
│   │                       └─► Comparateur       │            │
│   │                           (Seuil 30mA)      │            │
│   │                           │                 │            │
│   │                           └─► INT_FAULT     │            │
│   │                               (vers MCU)    │            │
│   └─────────────────────────────────────────────┘            │
│                                                              │
│   ┌──────── CAPTEUR TEMPÉRATURE ───────────────┐            │
│   │   DS18B20 x3 (1-Wire)                      │            │
│   │   • Câble Type 2 (extrémité)               │            │
│   │   • Contacteur (bobine)                    │            │
│   │   • Boîtier interne                        │            │
│   └─────────────────────────────────────────────┘            │
│                                                              │
└──────────────────────────────────────────────────────────────┘

PCB: 2-layer, FR4 1.6mm, HAL lead-free
Coût fabrication: $2-5/pièce (JLCPCB, qty 100)
```

---

## 🏭 Process de Fabrication - Étapes

### Phase 1: Développement & Prototypage (Mois 1-3)

| Étape | Durée | Coût | Responsable |
|-------|-------|------|-------------|
| **1. Spécifications techniques** | 2 semaines | R$ 15.000 | Ingénieur senior |
| **2. Schémas électriques** | 3 semaines | R$ 20.000 | Ingénieur électronique |
| **3. Design PCB custom** | 2 semaines | R$ 12.000 | PCB Designer |
| **4. Commande composants** | 1 semaine | R$ 15.000 | Acheteur |
| **5. Fabrication PCB (JLCPCB)** | 2 semaines | R$ 3.000 | Externe Chine |
| **6. Assemblage prototype 1** | 1 semaine | R$ 8.000 | Technicien |
| **7. Tests fonctionnels** | 2 semaines | R$ 10.000 | QA Engineer |
| **8. Debug & itérations** | 3 semaines | R$ 18.000 | Équipe complète |

**Total Phase 1:** R$ 101.000

---

### Phase 2: Certification & Homologation (Mois 4-9)

| Étape | Durée | Coût | Organisme |
|-------|-------|------|-----------|
| **1. Tests préliminaires** | 3 semaines | R$ 12.000 | Laboratoire interne |
| **2. Dossier technique INMETRO** | 2 semaines | R$ 8.000 | Consultante |
| **3. Tests INMETRO (Portaria 301)** | 8-12 semaines | R$ 50.000 | INMETRO accrédité |
| **4. Homologation ANATEL (4G)** | 6-8 semaines | R$ 15.000 | ANATEL |
| **5. Certification IP54/IP65** | 4 semaines | R$ 8.000 | IPX Testing |
| **6. Tests EMC/EMI** | 3 semaines | R$ 12.000 | Lab EMC |
| **7. Validation sécurité IEC 61851** | 4 semaines | R$ 18.000 | TÜV/Bureau Veritas |

**Total Phase 2:** R$ 123.000

---

### Phase 3: Production Série (Mois 10-12)

| Étape | Quantité | Coût Unitaire | Coût Total |
|-------|----------|---------------|------------|
| **1. Commande composants (100 bornes)** | Lot China | R$ 6.630 | R$ 663.000 |
| **2. Import & douanes (60%)** | - | - | R$ 397.800 |
| **3. Fabrication PCB custom (100)** | JLCPCB | R$ 150 | R$ 15.000 |
| **4. Boîtiers métalliques (100)** | Locale | R$ 800 | R$ 80.000 |
| **5. Assemblage (50h x 100)** | Techniciens | R$ 80/h | R$ 400.000 |
| **6. Tests qualité 100%** | QA | R$ 200 | R$ 20.000 |
| **7. Emballage & logistique** | - | R$ 150 | R$ 15.000 |

**Total Phase 3 (100 bornes):** R$ 1.590.800

**Coût par borne en série:** R$ 15.908

---

### Phase 4: Infrastructure Support (Récurrent)

| Item | Fréquence | Coût Annuel |
|------|-----------|-------------|
| **Stock pièces détachées** | Continue | R$ 80.000 |
| **Équipe SAV (2 techniciens)** | Mensuel | R$ 144.000 |
| **Assurance RC Produit** | Annuel | R$ 25.000 |
| **Renouvellement certifications** | Annuel | R$ 15.000 |
| **R&D amélioration continue** | Mensuel | R$ 60.000 |

**Total Annuel Support:** R$ 324.000

---

## 📊 Analyse de Rentabilité - Scénarios

### Scénario 1: Production 100 Bornes (Première Série)

| Item | Valeur |
|------|--------|
| **Investissement initial** | |
| - Développement & prototypage | R$ 101.000 |
| - Certification & homologation | R$ 123.000 |
| - Production 100 bornes | R$ 1.590.800 |
| **TOTAL INVESTISSEMENT** | **R$ 1.814.800** |
| | |
| **Coût par borne (amorti)** | R$ 18.148 |
| **Prix vente borne DIY** | R$ 28.000 |
| **Marge unitaire** | R$ 9.852 (35%) |
| **Revenu total (100 bornes)** | R$ 2.800.000 |
| **Profit net** | **R$ 985.200** |
| **ROI** | **54%** |

---

### Scénario 2: Production 500 Bornes (Économies d'Échelle)

| Item | Série 1 (100) | Séries 2-6 (400) | Total |
|------|---------------|------------------|-------|
| **Développement** (one-time) | R$ 101.000 | R$ 0 | R$ 101.000 |
| **Certification** (one-time) | R$ 123.000 | R$ 0 | R$ 123.000 |
| **Production composants** | R$ 1.060.800 | R$ 3.816.000 | R$ 4.876.800 |
| **Assemblage (négocié -20%)** | R$ 400.000 | R$ 1.280.000 | R$ 1.680.000 |
| **Tests & logistique** | R$ 35.000 | R$ 120.000 | R$ 155.000 |
| **TOTAL** | R$ 1.719.800 | R$ 5.216.000 | **R$ 6.935.800** |
| | | | |
| **Coût/borne** | R$ 17.198 | R$ 13.040 | R$ 13.871 |
| **Prix vente** | R$ 28.000 | R$ 26.000 | R$ 26.400 |
| **Marge unitaire** | R$ 10.802 | R$ 12.960 | R$ 12.529 |
| **Profit total** | R$ 1.080.200 | R$ 5.184.000 | **R$ 6.264.200** |
| **ROI global** | | | **90%** |

---

### Scénario 3: Comparaison avec Achat Commercial

| Métrique | 100 Bornes DIY | 100 Bornes Commerciales | Différence |
|----------|----------------|-------------------------|------------|
| **Investissement initial** | R$ 1.814.800 | R$ 3.500.000 | **-48%** |
| **Coût/borne** | R$ 18.148 | R$ 35.000 | **-48%** |
| **Garantie** | 2 ans (DIY support) | 2 ans (fournisseur) | = |
| **Délai livraison** | 12 mois | 3-6 mois | +6-9 mois |
| **Personnalisation** | Totale | Limitée | ++ |
| **Dépendance** | Aucune | Fournisseur unique | ++ |
| **Pièces détachées** | Stock propre | Délai fournisseur | ++ |
| **Mise à jour firmware** | Contrôle total | Dépend fournisseur | ++ |

**Économie nette (100 bornes):** R$ 1.685.200

---

## ⚖️ Analyse Risques vs Bénéfices

### Risques Critiques

| Risque | Probabilité | Impact | Mitigation | Coût Mitigation |
|--------|-------------|--------|------------|-----------------|
| **Échec certification INMETRO** | Moyen (30%) | CRITIQUE | 2 prototypes testés avant soumission | R$ 50.000 |
| **Défaut série (recall)** | Faible (10%) | TRÈS ÉLEVÉ | Tests 100% + période beta 50 bornes | R$ 80.000 |
| **Retard développement** | Élevé (50%) | Moyen | Buffer 30% timeline + équipe senior | R$ 40.000 |
| **Composants défectueux Chine** | Moyen (25%) | Élevé | Double sourcing + inspection qualité | R$ 30.000 |
| **Obsolescence composants** | Faible (15%) | Moyen | Stock 2 ans pièces critiques | R$ 100.000 |
| **Accident utilisateur** | Faible (5%) | CRITIQUE | Assurance RC R$ 5M + tests exhaustifs | R$ 25.000/an |

**Budget total gestion risques:** R$ 300.000 (one-time) + R$ 25.000/an

---

### Bénéfices Stratégiques

| Bénéfice | Valeur Quantifiée | Avantage Compétitif |
|----------|-------------------|---------------------|
| **Économie d'échelle croissante** | -24% coût sur 500 bornes | Marge = 50% vs 25% commercial |
| **Délai réparation réduit** | 24h vs 7-15j | Uptime 99.5% vs 97% |
| **Différenciation produit** | Features custom | Premium pricing +15% |
| **Indépendance stratégique** | Pas de lock-in | Résilience supply chain |
| **Propriété intellectuelle** | Brevets possibles | Licence à tiers = R$ 500k+ |
| **Évolution rapide** | Firmware OTA mensuel | Nouvelles fonctions = fidélisation |

---

## 🎓 Expertise Requise - Équipe Minimum

### Phase Développement (6 mois)

| Rôle | Expérience | Coût/mois | Total 6 mois |
|------|------------|-----------|--------------|
| **Ingénieur électronique senior** | 10+ ans, certif IEC 61851 | R$ 18.000 | R$ 108.000 |
| **Développeur firmware embedded** | 5+ ans, C/C++, RTOS | R$ 12.000 | R$ 72.000 |
| **PCB Designer** | 5+ ans, Altium/KiCad | R$ 10.000 | R$ 60.000 |
| **Ingénieur tests & QA** | 3+ ans, certification produit | R$ 9.000 | R$ 54.000 |
| **Project Manager** | 5+ ans, hardware projects | R$ 15.000 | R$ 90.000 |

**Total équipe dev:** R$ 384.000

### Phase Production (continu)

| Rôle | Effectif | Coût/mois | Total annuel |
|------|----------|-----------|--------------|
| **Technicien assemblage** | 2 | R$ 5.000 | R$ 120.000 |
| **QA/Tests** | 1 | R$ 6.000 | R$ 72.000 |
| **Support technique** | 2 | R$ 6.000 | R$ 144.000 |
| **Acheteur/Logistique** | 1 | R$ 7.000 | R$ 84.000 |

**Total équipe prod:** R$ 420.000/an

---

## 📋 Checklist Conformité Réglementaire Brésil

### INMETRO - Portaria 301/2019

- [ ] **Puissance nominale déclarée** (±5% tolérance)
- [ ] **Efficacité énergétique** (>90% AC Level 2)
- [ ] **Protection IP** (minimum IP54 externe)
- [ ] **Température fonctionnement** (-10°C à +50°C)
- [ ] **Isolation galvanique** (>5 MΩ à 500VDC)
- [ ] **Courant de fuite** (<30mA AC+DC)
- [ ] **Étiquetage énergétique** (classe A minimum)
- [ ] **Manuel utilisateur** (portugais BR)
- [ ] **Déclaration conformité** (assinée responsable técnico)

### ANATEL - Homologation Sans-Fil

- [ ] **Module 4G/LTE certifié** (ou certification dédiée)
- [ ] **Émissions RF** (<2.4 GHz compliance)
- [ ] **SAR (si applicable)** (exposition humaine)
- [ ] **Marquage ANATEL** (numéro homologação visible)

### NR-10 - Segurança em Instalações Elétricas

- [ ] **Électriciens certifiés NR-10** (installation)
- [ ] **Schéma unifilaire** (fourni avec borne)
- [ ] **Mise à la terre** (<10Ω résistance)
- [ ] **Signalisation sécurité** (pictos obligatoires)
- [ ] **Procédures lockout/tagout** (maintenance)

### ABNT NBR IEC 61851-1 - Norme Technique

- [ ] **Modes de charge** (Mode 3 obligatoire)
- [ ] **Signal Pilot conformité** (±12V, 1kHz ±1%)
- [ ] **Séquence démarrage** (selon état diagram)
- [ ] **Protection amont** (disjoncteur + différentiel)
- [ ] **Résistance terre véhicule** (continuité vérifiée)

### Responsabilidade Civil

- [ ] **Assurance RC Produit** (min R$ 5.000.000)
- [ ] **Rastreabilidade** (numéro série + batch)
- [ ] **Registro ART/CREA** (responsable technique)
- [ ] **Garantia legal** (90 jours Code Consommateur + 12-24 mois contractuelle)

---

## 🚀 Recommandation Finale

### ✅ **OUI, LA FABRICATION DIY EST RENTABLE SI:**

1. **Volume ≥ 100 bornes** (amortissement certification)
2. **Horizon 2-3 ans** (ROI acceptable)
3. **Équipe technique compétente** (ingénieurs seniors)
4. **Budget initial R$ 1.8M - R$ 2.5M** disponible
5. **Acceptation risque technique** modéré

### 📈 **Bénéfices Clés**

- **Économie 48-66%** vs commercial (R$ 1.7M sur 100 bornes)
- **Marges bénéficiaires 35-50%** vs 20-25% commercial
- **ROI 18-24 mois** (vs 30-36 mois commercial)
- **Contrôle total** produit/évolution
- **Avantage concurrentiel** features custom

### ⚠️ **Conditions de Succès**

1. **Embaucher ingénieur électronique senior** (IEC 61851 experience)
2. **Partenariat laboratoire accrédité INMETRO** (pré-tests)
3. **Double sourcing composants critiques** (Chine + backup)
4. **Phase beta 50 bornes** (identifier défauts avant série)
5. **Assurance RC Produit R$ 5M** (obligatoire)

### 🎯 **Prochaines Étapes Concrètes**

| Étape | Deadline | Budget | Responsable |
|-------|----------|--------|-------------|
| 1. Recruter ingénieur senior | Semaine 4 | R$ 18k/mois | RH |
| 2. Contacter labo INMETRO | Semaine 2 | R$ 5k audit | Qualité |
| 3. Demander devis JLCPCB | Semaine 1 | Gratuit | Achats |
| 4. Sourcing Alibaba (3 fournisseurs) | Semaine 2 | Gratuit | Achats |
| 5. Business plan détaillé | Semaine 6 | R$ 15k consultant | Finance |
| 6. Approbation Board investissement | Semaine 8 | - | CEO |

---

## 📞 Contacts Utiles

### Certification
- **INMETRO:** https://www.gov.br/inmetro
  - Portaria 301/2019: Requisitos de Avaliação da Conformidade para Eletropostos
  - Telefone: 0800 285 1818

### Fournisseurs Composants Chine
- **Alibaba.com** (B2B wholesale)
- **Made-in-China.com** (alternative)
- **JLCPCB** (fabrication PCB): https://jlcpcb.com
- **PCBWay** (alternative PCB): https://www.pcbway.com

### Laboratoires Tests Brésil
- **IPT (Instituto de Pesquisas Tecnológicas):** https://www.ipt.br
- **Lactec:** https://www.lactec.org.br
- **Labelo:** https://labelo.org.br

### Assurance
- **AIG Brasil** (RC Produit)
- **Zurich Brasil**
- **Liberty Seguros**

---

**Document créé le:** 2025-01-08
**Version:** 1.0
**Auteur:** Équipe Technique Eletroposto
**Prochaine révision:** Après Phase Prototype 1

---

*Note: Tous les prix sont indicatifs basés sur recherche marché Jan 2025. Prix réels peuvent varier ±20%. Taux de change utilisé: 1 USD = R$ 5.00*
