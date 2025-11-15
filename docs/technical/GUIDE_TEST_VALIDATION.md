# Guide de Test et Validation - Circuit Pilot Signal Eletroposto

## 📋 Sommaire

1. [Vue d'Ensemble](#vue-ensemble)
2. [Tests Électriques de Base](#tests-base)
3. [Tests Conformité IEC 61851-1](#tests-iec)
4. [Tests Sécurité](#tests-securite)
5. [Tests Performance](#tests-performance)
6. [Validation Complète](#validation)
7. [Certification](#certification)

---

## 🎯 Vue d'Ensemble {#vue-ensemble}

### Objectifs des Tests

Le circuit Pilot Signal doit être testé et validé selon:
- ✅ **IEC 61851-1** (norme internationale)
- ✅ **ABNT NBR IEC 61851-1** (norme brésilienne)
- ✅ **Portaria INMETRO 301/2019**

### Niveaux de Test

```
Niveau 1: Tests Électriques de Base
    ↓ (si OK)
Niveau 2: Tests Conformité IEC 61851-1
    ↓ (si OK)
Niveau 3: Tests Sécurité
    ↓ (si OK)
Niveau 4: Tests Performance
    ↓ (si OK)
Niveau 5: Validation Complète
    ↓ (si OK)
Certification INMETRO
```

---

## ⚡ Tests Électriques de Base {#tests-base}

### Test 1.1: Inspection Visuelle

**Équipement:** Loupe 10x, lumière LED

**Checklist:**
- [ ] PCB propre, pas de résidus flux
- [ ] Tous composants présents (vs BOM)
- [ ] Polarité correcte (diodes, LEDs, ICs)
- [ ] Pas de ponts soudure
- [ ] Pas de composants endommagés

**Critère d'acceptation:** Aucun défaut visuel

---

### Test 1.2: Continuité et Court-Circuits

**Équipement:** Multimètre mode continuité

```bash
# Test GND Plane
1. Mesurer tous points GND
   ✓ PASS: Continuité (bip) entre tous points
   ✗ FAIL: Pas de continuité

# Test VCC Rails
2. Mesurer tous points +12V
   ✓ PASS: Continuité entre tous points +12V
   ✗ FAIL: Pas de continuité

# Test Isolation
3. Mesurer GND ↔ +12V
   ✓ PASS: PAS de continuité (silence)
   ✗ FAIL: Bip = court-circuit!

4. Mesurer GND ↔ +5V
   ✓ PASS: PAS de continuité
   ✗ FAIL: Court-circuit

5. Mesurer GND ↔ +3.3V
   ✓ PASS: PAS de continuité
   ✗ FAIL: Court-circuit
```

**Résultat:** ____ / 5 tests passés

---

### Test 1.3: Résistance

**Équipement:** Multimètre mode Ohm

```bash
# Résistance GND ↔ VCC
Mesure: _______ kΩ
✓ PASS: >10 kΩ
✗ FAIL: <10 kΩ (fuite ou court-circuit)

# Résistances Individuelles (R1, R2, etc.)
R1 (1kΩ):   Mesuré ______ Ω  ✓/✗ (920-1080Ω)
R2 (2kΩ):   Mesuré ______ Ω  ✓/✗ (1.8k-2.2kΩ)
R3 (330Ω):  Mesuré ______ Ω  ✓/✗ (300-360Ω)
```

---

### Test 1.4: Première Mise Sous Tension (Alimentation Limitée)

**Équipement:**
- Alimentation DC réglable
- Multimètre mode Ampère

**Setup Sécurisé:**
```
PSU (12V, 100mA limit)
      │
   [Ampèremètre]
      │
    [PCB]
      │
    GND
```

**Procédure:**
```bash
1. Régler PSU: 12V, limite courant 100mA
2. Connecter ampèremètre en série
3. Alimenter progressivement

# Observation Courant
Courant mesuré: ______ mA

✓ PASS: <50mA (normal)
⚠ WARNING: 50-80mA (vérifier)
✗ FAIL: >80mA (problème! Couper!)

# Si >80mA:
- Couper immédiatement
- Toucher composants: chaud = problème
- Inspecter court-circuits
- NE PAS continuer
```

---

### Test 1.5: Tensions Rails

**Équipement:** Multimètre mode Volt DC

**Alimentation normale (limite 500mA):**

```bash
# Mesures
VCC (+12V):  Mesuré ______ V  ✓/✗ (11.4-12.6V)
+5V rail:    Mesuré ______ V  ✓/✗ (4.75-5.25V)
+3.3V rail:  Mesuré ______ V  ✓/✗ (3.13-3.47V)
GND:         Mesuré ______ V  ✓/✗ (0V)

# Stabilité
Variations: _______ mV
✓ PASS: <100mV
✗ FAIL: >100mV (instable)
```

**Résultat Test 1:**
- [ ] PASS - Passer au Test 2
- [ ] FAIL - Dépanner et re-tester

---

## 🔌 Tests Conformité IEC 61851-1 {#tests-iec}

### Test 2.1: Signal Pilot - Forme d'Onde PWM

**Équipement:** Oscilloscope (100 MHz min)

**Setup:**
```
Oscilloscope
  CH1 → Signal CP (Pilot)
  CH2 → GND

Trigger: Edge, CH1, rising, 0V
```

**Mesures:**

#### A. Fréquence
```bash
Fréquence mesurée: _______ Hz

✓ PASS: 990-1010 Hz (±1%)
✗ FAIL: Hors tolérances
```

#### B. Amplitude
```bash
Avec charge simulée véhicule (2.74kΩ // 1µF):

V_high mesuré: ______ V
✓ PASS: +11.4 à +12.6V

V_low mesuré: ______ V
✓ PASS: -11.4 à -12.6V

Amplitude P-P: ______ V
✓ PASS: 22.8-25.2V (±5%)
✗ FAIL: Hors tolérances
```

#### C. Duty Cycle
```bash
# Tester différents courants max

6A → DC mesuré: ______ %  ✓/✗ (9.5-10.5%)
12A → DC mesuré: ______ %  ✓/✗ (19-21%)
16A → DC mesuré: ______ %  ✓/✗ (25-27%)
20A → DC mesuré: ______ %  ✓/✗ (31-34%)
32A → DC mesuré: ______ %  ✓/✗ (51-54%)

Formule: I_max = DC(%) × 0.6
```

#### D. Temps de montée/descente
```bash
Rise time: ______ µs  ✓/✗ (<50µs)
Fall time: ______ µs  ✓/✗ (<50µs)
```

**Screenshot oscilloscope requis!**

---

### Test 2.2: Détection États Véhicule

**Équipement:**
- Résistances de test (2.74kΩ, 882Ω, 246Ω)
- Multimètre

**Charge Simulée:**
```
[PCB CP] ─── [R test] ─── [GND]
                │
            [Voltmètre]
```

#### État A: Pas de Véhicule
```bash
R_load: ∞ (déconnecté)
Tension CP mesurée: ______ V

✓ PASS: +12V DC (±0.6V)
✗ FAIL: Autre tension
```

#### État B: Véhicule Connecté
```bash
R_load: 2.74kΩ (±5%)
Tension CP mesurée: ______ V

✓ PASS: +9V PWM (±0.6V)
✗ FAIL: Autre tension
```

#### État C: Charge Demandée
```bash
R_load: 882Ω (±5%)
Tension CP mesurée: ______ V

✓ PASS: +6V PWM (±0.6V)
✗ FAIL: Autre tension
```

#### État D: Charge + Ventilation
```bash
R_load: 246Ω (±5%)
Tension CP mesurée: ______ V

✓ PASS: +3V PWM (±0.6V)
✗ FAIL: Autre tension
```

#### État E: Erreur (Court-Circuit)
```bash
R_load: 0Ω (court-circuit)
Tension CP mesurée: ______ V

✓ PASS: 0V (détection erreur)
⚠ Vérifier: Protection activée?
```

---

### Test 2.3: Temps de Réponse

**Équipement:** Oscilloscope + switch rapide

**Test transition État A → B:**
```bash
1. État A (déconnecté)
2. Connecter R=2.74kΩ
3. Mesurer temps jusqu'à changement

Temps mesuré: ______ ms

✓ PASS: <100ms
✗ FAIL: >100ms
```

**Test transition État B → C:**
```bash
1. État B (R=2.74kΩ)
2. Changer à R=882Ω
3. Mesurer temps changement

Temps mesuré: ______ ms

✓ PASS: <100ms
✗ FAIL: >100ms
```

---

### Test 2.4: Impédance Source

**Équipement:** Pont d'impédance ou méthode division tension

**Procédure:**
```bash
1. Mesurer V_CP sans charge: V1 = ______ V
2. Connecter R=1kΩ, mesurer: V2 = ______ V
3. Calculer: Z_source = R × (V1-V2)/V2

Z_source calculé: ______ Ω

✓ PASS: 880-1200Ω (norme: 1kΩ ±20%)
✗ FAIL: Hors tolérances
```

---

## 🛡️ Tests Sécurité {#tests-securite}

### Test 3.1: Isolation Galvanique

**Équipement:** Megohmmètre 500VDC

```bash
# Test entre circuit et châssis métallique
Résistance isolation: _______ MΩ

✓ PASS: >5 MΩ
✗ FAIL: <5 MΩ (problème isolation!)
```

---

### Test 3.2: Protection Surtension

**Équipement:**
- Alimentation réglable 0-30V
- Oscilloscope

**Test Diode Zener:**
```bash
1. Augmenter tension entrée graduellement
2. Observer tension sortie

V_in = 15V → V_out = ______ V ✓/✗ (<15.6V)
V_in = 18V → V_out = ______ V ✓/✗ (<15.6V)
V_in = 24V → V_out = ______ V ✓/✗ (<15.6V)

✓ PASS: Zener écrête à 15V ±3%
✗ FAIL: Tension sort dépasse 15.6V
```

---

### Test 3.3: Courant de Fuite à la Terre

**Équipement:** Ampèremètre µA

```bash
Courant fuite mesuré: ______ µA

✓ PASS: <30µA (Type A, AC+DC)
✗ FAIL: >30µA (DANGER!)
```

⚠️ **CRITIQUE POUR SÉCURITÉ PERSONNES**

---

### Test 3.4: Protection Court-Circuit

**⚠️ Test DESTRUCTIF potentiel - Prototype uniquement!**

```bash
1. Alimenter normalement
2. Court-circuiter CP → GND
3. Observer:

Fusible/protection déclenche: ✓/✗
Temps réaction: ______ ms  ✓/✗ (<100ms)
Composants endommagés: Oui/Non

✓ PASS: Protection fonctionne, pas de dommage
✗ FAIL: Composants brûlés
```

---

### Test 3.5: Température Composants

**Équipement:** Thermomètre infrarouge ou caméra thermique

**Fonctionnement continu 1 heure, courant max:**

```bash
Temp ambiante: ______ °C

MOSFET:        ______ °C  ✓/✗ (<85°C)
Régulateur 5V: ______ °C  ✓/✗ (<85°C)
Résistances:   ______ °C  ✓/✗ (<70°C)
MCU:           ______ °C  ✓/✗ (<70°C)

✓ PASS: Toutes temp OK
✗ FAIL: Surchauffe détectée
```

---

## 🚀 Tests Performance {#tests-performance}

### Test 4.1: Précision Duty Cycle

**Équipement:** Fréquencemètre précision

**Test 10 réglages différents:**

| Courant | DC Théorique | DC Mesuré | Erreur | Pass/Fail |
|---------|--------------|-----------|--------|-----------|
| 6A | 10% | ____% | ____% | ✓/✗ |
| 8A | 13.3% | ____% | ____% | ✓/✗ |
| 10A | 16.7% | ____% | ____% | ✓/✗ |
| 13A | 21.7% | ____% | ____% | ✓/✗ |
| 16A | 26.7% | ____% | ____% | ✓/✗ |
| 20A | 33.3% | ____% | ____% | ✓/✗ |
| 25A | 41.7% | ____% | ____% | ✓/✗ |
| 32A | 53.3% | ____% | ____% | ✓/✗ |
| 40A | 66.7% | ____% | ____% | ✓/✗ |
| 63A | 96% | ____% | ____% | ✓/✗ |

**Critère:** Erreur <±2% sur toute plage

---

### Test 4.2: Stabilité Fréquence

**Équipement:** Fréquencemètre + enregistreur

**Mesure continue 24h:**

```bash
Fréquence min: ______ Hz
Fréquence max: ______ Hz
Fréquence moy: ______ Hz
Dérive: ______ Hz

✓ PASS: Dérive <±5 Hz
✗ FAIL: Dérive >±5 Hz
```

---

### Test 4.3: Bruit et Interférences EMI

**Équipement:**
- Analyseur spectre ou oscilloscope FFT
- Cage Faraday (optionnel)

```bash
# Harmoniques PWM
Fondamentale 1kHz: ______ dBm
2ème harmonique 2kHz: ______ dBm  ✓/✗ (<-20dBc)
3ème harmonique 3kHz: ______ dBm  ✓/✗ (<-30dBc)

# Bruit haute fréquence
Bruit 10-100kHz: ______ mVpp  ✓/✗ (<50mVpp)
Bruit 100kHz-1MHz: ______ mVpp  ✓/✗ (<20mVpp)
```

---

### Test 4.4: Consommation Énergétique

**Équipement:** Wattmètre

```bash
# Idle (standby)
Puissance: ______ mW  ✓/✗ (<500mW)

# Actif (PWM on, pas de charge)
Puissance: ______ W  ✓/✗ (<2W)

# Charge maximale (63A signalé)
Puissance circuit: ______ W  ✓/✗ (<5W)
```

---

### Test 4.5: Fiabilité - Cycles ON/OFF

**Test automatisé:**

```bash
Programme test:
1. ON 10s, OFF 2s
2. Répéter 10.000 cycles
3. Vérifier fonctionnement

Cycles complétés: ______ / 10.000
Défaillances: ______

✓ PASS: 10.000 cycles, 0 défaut
✗ FAIL: Défaut avant 10.000
```

---

## ✅ Validation Complète {#validation}

### Test 5.1: Intégration avec Véhicule Réel

**⚠️ Test avec VRAI véhicule électrique**

**Véhicules testés:**

| Véhicule | Connecteur | État B | État C | Charge OK | Pass/Fail |
|----------|-----------|--------|--------|-----------|-----------|
| Nissan Leaf | Type 1 | ✓/✗ | ✓/✗ | ✓/✗ | ✓/✗ |
| Chevrolet Bolt | Type 1 | ✓/✗ | ✓/✗ | ✓/✗ | ✓/✗ |
| BMW i3 | Type 2 | ✓/✗ | ✓/✗ | ✓/✗ | ✓/✗ |
| Tesla Model 3 | Type 2 | ✓/✗ | ✓/✗ | ✓/✗ | ✓/✗ |
| BYD Dolphin | Type 2 | ✓/✗ | ✓/✗ | ✓/✗ | ✓/✗ |

**Critère:** Minimum 5 véhicules différents, 100% succès

---

### Test 5.2: Endurance 1000 Heures

**Test continu sous conditions:**

```bash
Température: 40°C
Humidité: 85%
Cycles: ON/OFF toutes les 4h

Durée: _______ heures complétées / 1000h
Défaillances: _______

✓ PASS: 1000h sans défaut
✗ FAIL: Défaut avant 1000h
```

---

### Test 5.3: Environnement Sévère

#### Température:
```bash
Test -10°C: ✓/✗ (fonctionne)
Test +50°C: ✓/✗ (fonctionne)
Test +85°C stockage: ✓/✗ (survit)
```

#### Humidité:
```bash
Test 95% RH, 40°C, 24h: ✓/✗
Pas de condensation: ✓/✗
```

#### Vibrations:
```bash
Test 5-500Hz, 2g, 1h: ✓/✗
Pas de déconnexions: ✓/✗
```

---

## 🏆 Certification {#certification}

### Checklist Pré-Certification

**Tests obligatoires passés:**
- [ ] Tous tests électriques de base (1.1-1.5)
- [ ] Tous tests IEC 61851-1 (2.1-2.4)
- [ ] Tous tests sécurité (3.1-3.5)
- [ ] Tests performance (4.1-4.5)
- [ ] Validation véhicules réels (5.1)
- [ ] Test endurance 1000h (5.2)
- [ ] Tests environnement (5.3)

**Documentation requise:**
- [ ] Schémas électroniques complets
- [ ] BOM avec composants certifiés
- [ ] Datasheet tous composants critiques
- [ ] Rapports tests (tous avec photos/screenshots)
- [ ] Manuel technique
- [ ] Manuel utilisateur (portugais)
- [ ] Analyse de risques (FMEA)

---

### Organismes Certification Brésil

#### 1. INMETRO
**Site:** https://www.gov.br/inmetro

**Process:**
1. Pré-audit documentation
2. Envoi échantillons (3-5 unités)
3. Tests laboratoire accrédité
4. Audit fabrication
5. Certification délivrée

**Coût:** R$ 50.000 - R$ 120.000
**Délai:** 6-12 mois

#### 2. ANATEL (Modules Sans-Fil)
**Site:** https://www.gov.br/anatel

**Si 4G/WiFi présent:**
- Certification modules RF
- Tests SAR
- Tests EMC

**Coût:** R$ 15.000 - R$ 30.000
**Délai:** 3-6 mois

---

### Laboratoires Accrédités

| Laboratoire | Localisation | Contact | Spécialité |
|-------------|--------------|---------|------------|
| **IPT** | São Paulo | www.ipt.br | Elétrico |
| **Lactec** | Curitiba | www.lactec.org.br | Energia |
| **Labelo** | São Paulo | labelo.org.br | EMC/Segurança |
| **Cepel** | Rio | www.cepel.br | Elétrico |

---

## 📊 Rapport de Test - Template

### Identification

```
Projeto: Eletroposto - Circuit Pilot Signal
Versão PCB: v_____
Número Série: _____________
Data Teste: ____/____/2025
Testeur: ___________________
```

### Résumé Résultats

| Catégorie | Tests Total | Passés | Échoués | Taux Succès |
|-----------|-------------|--------|---------|-------------|
| Électrique Base | 5 | ___ | ___ | ___% |
| IEC 61851-1 | 4 | ___ | ___ | ___% |
| Sécurité | 5 | ___ | ___ | ___% |
| Performance | 5 | ___ | ___ | ___% |
| Validation | 3 | ___ | ___ | ___% |
| **TOTAL** | **22** | ___ | ___ | ___% |

### Verdict Final

- [ ] **PASS** - Produit conforme, prêt certification
- [ ] **PASS avec réserves** - Corrections mineures nécessaires
- [ ] **FAIL** - Corrections majeures requises
- [ ] **FAIL critique** - Reprendre design

### Commentaires
```
_________________________________________________
_________________________________________________
_________________________________________________
```

### Signatures

```
Testeur: ________________  Date: __________

Responsable Qualité: ________________  Date: __________

Ingénieur Chef: ________________  Date: __________
```

---

## 📚 Ressources

### Normes (Achat)

- **ABNT NBR IEC 61851-1:2022** (~R$ 400)
  - https://www.abntcatalogo.com.br/

### Équipement Recommandé

| Équipement | Prix | Nécessité |
|------------|------|-----------|
| Oscilloscope 100MHz | R$ 2.000-5.000 | Obligatoire |
| Multimètre précision | R$ 300-800 | Obligatoire |
| Alimentation DC | R$ 400-1.200 | Obligatoire |
| Résistances test | R$ 100 | Obligatoire |
| Thermomètre IR | R$ 150-400 | Recommandé |
| Analyseur spectre | R$ 5.000+ | Optionnel |

---

**Document créé par:** Équipe Technique Eletroposto
**Version:** 1.0
**Date:** 2025-01-08
**Licence:** MIT

✅ **Bonne chance avec vos tests!**
