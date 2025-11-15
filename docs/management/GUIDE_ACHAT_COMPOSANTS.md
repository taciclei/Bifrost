# Guide d'Achat Composants - Projet Eletroposto

## 📋 Sommaire

1. [Fournisseurs Recommandés](#fournisseurs)
2. [Liste Shopping Prototype](#prototype)
3. [Liste Shopping Production](#production)
4. [Outils et Équipement](#outils)
5. [Comparaison Prix](#comparaison)
6. [Import Chine - Guide](#import)

---

## 🏪 Fournisseurs Recommandés {#fournisseurs}

### Brésil (Livraison Rapide)

| Fournisseur | Spécialité | Délai | Shipping | Site |
|-------------|-----------|-------|----------|------|
| **DigiKey BR** | Tout, qualité pro | 3-7 dias | R$ 30-80 | https://www.digikey.com.br/ |
| **Mouser BR** | Tout, qualité pro | 3-7 dias | R$ 30-80 | https://br.mouser.com/ |
| **Usinainfo** | Hobby, dev boards | 5-10 dias | Varie | https://www.usinainfo.com.br/ |
| **Baudaeletronica** | Componentes gerais | 5-12 dias | R$ 15-40 | https://www.baudaeletronica.com.br/ |
| **Multcomercial** | Eletrônica geral | 7-15 dias | R$ 20-50 | https://www.multcomercial.com.br/ |

---

### Internacional (Meilleur Prix)

| Fournisseur | Spécialité | Délai | Shipping | Site |
|-------------|-----------|-------|----------|------|
| **LCSC** ⭐ | Tout, prix imbattables | 15-25 dias | $15-30 | https://lcsc.com/ |
| **Alibaba** | Gros volumes | 20-35 dias | Varie | https://www.alibaba.com/ |
| **AliExpress** | Petits volumes | 20-45 dias | Gratuit | https://www.aliexpress.com/ |
| **JLCPCB Parts** | Assemblage PCB | Avec PCB | Inclus | https://jlcpcb.com/ |
| **Digi-Key US** | Tout, très rapide | 7-10 dias | $25-50 | https://www.digikey.com/ |
| **Mouser US** | Tout, très rapide | 7-10 dias | $25-50 | https://www.mouser.com/ |

---

### Comparaison Prix (Exemple Résistance 1kΩ 0805)

| Fournisseur | Prix Unitaire | Qté Min | Shipping | Total 100 pcs |
|-------------|---------------|---------|----------|---------------|
| **DigiKey BR** | R$ 0.15 | 1 | R$ 40 | R$ 55 |
| **Usinainfo** | R$ 0.10 | 10 | R$ 20 | R$ 30 |
| **LCSC** | $0.001 (~R$ 0.005) | 1 | $20 (~R$ 100) | **R$ 100.50** ⭐ |
| **AliExpress** | $0.01 (~R$ 0.05) | 100 | Gratuit | R$ 5 ⭐⭐ |

**Verdict:**
- Prototypage (petites qté): DigiKey BR
- Production (>100): LCSC ou AliExpress

---

## 🛒 Liste Shopping Prototype (1 PCB) {#prototype}

### Kit Apprendre Soudure

**Pour s'entraîner AVANT le vrai projet:**

| Item | Qté | Prix Unit | Total | Fournisseur |
|------|-----|-----------|-------|-------------|
| Kit soudure débutant | 1 | R$ 40 | R$ 40 | Mercado Livre |
| PCB test SMD | 1 | R$ 30 | R$ 30 | AliExpress |
| Résistances 0805 mix | 1 kit | R$ 50 | R$ 50 | DigiKey BR |
| LEDs 0805 coloridas | 1 kit | R$ 40 | R$ 40 | Usinainfo |
| **Sous-total apprentissage** | | | **R$ 160** | |

---

### Composants Circuit Pilot Signal (1 Prototype)

#### Microcontrôleur et Logique

| Référence | Description | Qté | Prix Unit | Total | Fournisseur | Part Number |
|-----------|-------------|-----|-----------|-------|-------------|-------------|
| **U1** | STM32F407VGT6 LQFP-100 | 1 | R$ 85 | R$ 85 | DigiKey BR | STM32F407VGT6 |
| **U2** | MCP2515 CAN Controller | 1 | R$ 18 | R$ 18 | Mouser BR | MCP2515-I/SO |
| **U3** | TJA1050 CAN Transceiver | 1 | R$ 12 | R$ 12 | DigiKey BR | TJA1050T/CM |
| **U4** | LM2596 Buck 5V 3A | 1 | R$ 8 | R$ 8 | Usinainfo | LM2596S-5.0 |
| **U5** | AMS1117-3.3 LDO | 1 | R$ 3 | R$ 3 | Baudaeletronica | AMS1117-3.3 |

---

#### Transistors et Diodes

| Référence | Description | Qté | Prix Unit | Total | MPN |
|-----------|-------------|-----|-----------|-------|-----|
| **Q1** | MOSFET N 2N7000 TO-92 | 2 | R$ 1.50 | R$ 3 | 2N7000 |
| **Q2** | MOSFET N IRF540N TO-220 | 1 | R$ 5 | R$ 5 | IRF540N |
| **Q3** | Transistor NPN BC547 | 3 | R$ 0.30 | R$ 0.90 | BC547B |
| **D1** | Diode Zener 15V 1W | 2 | R$ 0.80 | R$ 1.60 | 1N4744A |
| **D2** | Diode Schottky 1N5819 | 3 | R$ 0.50 | R$ 1.50 | 1N5819 |
| **D3-D5** | LED 0805 (R, G, B) | 3 | R$ 0.20 | R$ 0.60 | Genérico |

---

#### Résistances 0805 (5%)

| Valeur | Qté | Prix Unit | Total | Usage |
|--------|-----|-----------|-------|-------|
| 1kΩ | 10 | R$ 0.10 | R$ 1 | Pilot signal |
| 2.2kΩ | 5 | R$ 0.10 | R$ 0.50 | Pull-up |
| 330Ω | 5 | R$ 0.10 | R$ 0.50 | LED |
| 10kΩ | 10 | R$ 0.10 | R$ 1 | Divers |
| 100Ω | 5 | R$ 0.10 | R$ 0.50 | Current sense |
| 47Ω | 5 | R$ 0.10 | R$ 0.50 | Série |

**Sous-total résistances:** R$ 4.00

---

#### Condensateurs

| Référence | Description | Qté | Prix Unit | Total |
|-----------|-------------|-----|-----------|-------|
| **C1-C5** | 100nF 0805 50V X7R | 10 | R$ 0.15 | R$ 1.50 |
| **C6-C8** | 10µF 0805 16V X5R | 5 | R$ 0.30 | R$ 1.50 |
| **C9** | 100µF electrolytic 25V | 2 | R$ 0.50 | R$ 1.00 |
| **C10** | 1µF 0805 50V | 3 | R$ 0.20 | R$ 0.60 |
| **C11** | 22pF 0805 NP0 | 4 | R$ 0.15 | R$ 0.60 |

**Sous-total condensateurs:** R$ 5.20

---

#### Oscillateurs et Timing

| Référence | Description | Qté | Prix Unit | Total |
|-----------|-------------|-----|-----------|-------|
| **Y1** | Crystal 8MHz HC-49S | 1 | R$ 2.50 | R$ 2.50 |
| **Y2** | Crystal 16MHz HC-49S | 1 | R$ 2.80 | R$ 2.80 |

---

#### Connecteurs

| Référence | Description | Qté | Prix Unit | Total | MPN |
|-----------|-------------|-----|-----------|-------|-----|
| **J1** | USB Mini-B | 1 | R$ 3.50 | R$ 3.50 | Genérico |
| **J2** | Header 2x5 pins (SWD) | 1 | R$ 1.20 | R$ 1.20 | PinHeader |
| **J3** | Terminal block 2pos | 2 | R$ 2.00 | R$ 4.00 | Würth |
| **J4** | Pin header 1x6 | 2 | R$ 0.50 | R$ 1.00 | Genérico |

**Sous-total connecteurs:** R$ 9.70

---

#### Divers

| Item | Qté | Prix Unit | Total |
|------|-----|-----------|-------|
| Fusible 5x20mm 2A | 5 | R$ 0.80 | R$ 4.00 |
| Holder fusível PCB | 2 | R$ 1.50 | R$ 3.00 |
| Jumpers 2.54mm | 10 | R$ 0.30 | R$ 3.00 |

---

### 📊 Récapitulatif Prototype (1 PCB)

| Catégorie | Coût |
|-----------|------|
| Microcontrôleurs et ICs | R$ 126.00 |
| Transistors et Diodes | R$ 12.60 |
| Résistances | R$ 4.00 |
| Condensateurs | R$ 5.20 |
| Oscillateurs | R$ 5.30 |
| Connecteurs | R$ 9.70 |
| Divers | R$ 10.00 |
| **Sous-total composants** | **R$ 172.80** |
| PCB (5 unités JLCPCB) | R$ 110.00 |
| Shipping | R$ 40.00 |
| **TOTAL 1 PROTOTYPE** | **R$ 322.80** |

**Note:** Vous aurez 5 PCB mais composants pour 1 seul.

---

## 📦 Liste Shopping Production (100 Bornes) {#production}

### Strategy d'Achat

**Recommandation:** Acheter composants sur **LCSC** (intégré JLCPCB)

**Avantages:**
- Prix imbattables
- Intégration assemblage PCB
- Shipping groupé avec PCB
- Stock énorme (millions références)

---

### BOM Production (100 Unités)

| Catégorie | Description | Qté Total | Prix Unit | Total | LCSC Part # |
|-----------|-------------|-----------|-----------|-------|-------------|
| **MCU** | STM32F407VGT6 | 110 | $8.50 | $935 | C13305 |
| **CAN** | MCP2515-I/SO | 110 | $1.80 | $198 | C10664 |
| **CAN Trans** | TJA1050T | 110 | $0.85 | $93.50 | C7820 |
| **Buck 5V** | LM2596S-5.0 | 110 | $0.60 | $66 | C12310 |
| **LDO 3.3V** | AMS1117-3.3 | 110 | $0.15 | $16.50 | C6186 |
| **MOSFET** | 2N7000 | 220 | $0.08 | $17.60 | C20760 |
| **MOSFET Power** | IRF540N | 110 | $0.45 | $49.50 | C38281 |
| **Transistor** | BC547B | 330 | $0.02 | $6.60 | C37107 |
| **Zener 15V** | 1N4744A | 220 | $0.05 | $11 | C78492 |
| **Diode** | 1N5819 | 330 | $0.03 | $9.90 | C8598 |
| **LED 0805** | Rouge/Vert/Bleu | 330 | $0.01 | $3.30 | C2286 |
| **Résistances 0805** | Mix valeurs | 5000 | $0.001 | $5 | Divers |
| **Condensateurs 0805** | Mix valeurs | 3000 | $0.005 | $15 | Divers |
| **Crystal 8MHz** | HC-49S | 110 | $0.15 | $16.50 | C7982 |
| **Connecteurs** | Divers | 550 | $0.30 | $165 | Divers |

**Sous-total composants (100 bornes):** $1.608,40 (~**R$ 8.042**)

**Marge sécurité 10%:** R$ 804

**TOTAL composants:** **R$ 8.846**

---

### Avec Assemblage JLCPCB

| Service | Qté | Prix | Total |
|---------|-----|------|-------|
| **PCB 4-layer** | 100 | $8/pc | $800 |
| **Assemblage SMT** | 100 | $15/pc | $1.500 |
| **Composants** | - | - | $1.608 |
| **Shipping** | 1 | $150 | $150 |
| **TOTAL USD** | | | **$4.058** |
| **TOTAL BRL** (x5.0) | | | **R$ 20.290** |

**vs Composants seuls + assemblage local:** R$ 8.846 + R$ 12.000 = R$ 20.846

**Verdict:** JLCPCB assemblage = prix similaire + gain de temps!

---

## 🛠️ Outils et Équipement {#outils}

### Station Soudure (Essentiel)

| Item | Spec | Prix | Fournisseur | Lien |
|------|------|------|-------------|------|
| **Station Yaxun 878D** | 60W, air chaud | R$ 350 | Mercado Livre | Chercher "Yaxun 878D" |
| **Hakko FX-888D** | 70W, précision | R$ 650 | Importado | eBay/Amazon |
| **Pannes rechange** | Set 5 types | R$ 60 | Mercado Livre | - |
| **Soudure Sn63/Pb37** | 0.6mm, flux | R$ 40/100g | Usinainfo | - |
| **Flux no-clean** | Stylo 10ml | R$ 30 | Baudaeletronica | - |

**Sous-total soudure:** R$ 1.130

---

### Outils Manuels

| Outil | Prix | Fournisseur |
|-------|------|-------------|
| Pince brucelles ESD | R$ 40 | Mercado Livre |
| Pince coupante flush | R$ 35 | Mercado Livre |
| Pince à bec courbe | R$ 30 | Mercado Livre |
| Tournevis précision set | R$ 45 | Usinainfo |
| Loupe éclairée LED | R$ 120 | Mercado Livre |
| Tapis antistatique | R$ 60 | Mercado Livre |
| Bracelet ESD | R$ 20 | Baudaeletronica |

**Sous-total outils:** R$ 350

---

### Équipement Test (Critique)

| Équipement | Spec | Prix | Fournisseur | Recommandation |
|------------|------|------|-------------|----------------|
| **Multimètre** | Brymen BM235 | R$ 350 | Mercado Livre | Budget |
| **Multimètre Pro** | Fluke 87V | R$ 2.200 | Importado | Pro ⭐ |
| **Oscilloscope** | Rigol DS1054Z | R$ 2.800 | Mercado Livre | ⭐⭐⭐ |
| **Oscilloscope Budget** | Hantek DSO2D10 | R$ 1.200 | AliExpress | Budget OK |
| **Alimentation DC** | 30V 10A réglable | R$ 450 | Mercado Livre | Essentiel |
| **Fer à souder portable** | TS100 | R$ 250 | AliExpress | Backup |

**Sous-total test (minimum):** R$ 4.600

**Sous-total test (recommandé pro):** R$ 5.700

---

### Optionnel mais Utile

| Item | Prix | Usage |
|------|------|-------|
| Microscope USB | R$ 200 | Inspection fine SMD |
| Station air chaud seule | R$ 400 | Dessoudage QFN |
| Four reflow T962A | R$ 1.800 | Production série |
| Caméra thermique | R$ 1.200 | Debug surchauffe |
| Analyseur logique | R$ 350 | Debug SPI/I2C |

---

## 💰 Comparaison Prix Fournisseurs {#comparaison}

### Exemple: BOM Circuit Test (LED + Résistance)

| Item | DigiKey BR | Usinainfo | LCSC | AliExpress |
|------|-----------|-----------|------|------------|
| R 330Ω 0805 (10 pcs) | R$ 2.00 | R$ 1.00 | R$ 0.50 | R$ 3.00/100 |
| LED 0805 Rouge (5 pcs) | R$ 1.50 | R$ 1.00 | R$ 0.25 | R$ 2.00/50 |
| Shipping | R$ 40 | R$ 20 | R$ 100 | Gratuit |
| **TOTAL** | **R$ 43.50** | **R$ 22** | **R$ 100.75** | **R$ 5** ⭐ |

**Mais:** AliExpress = 30-45 jours vs 5-7 jours Brésil

---

### Stratégie Optimale

**Prototypage rapide (1-5 PCB):**
```
1. PCB: JLCPCB (5 pcs, R$ 110, 3 semaines)
2. Composants urgents: DigiKey BR (3-5 dias, R$ 200)
3. Composants non-critiques: LCSC (com PCB, économise shipping)
```

**Production (50-100 PCB):**
```
1. PCB + Assemblage: JLCPCB SMT (tout inclus)
2. Composants: LCSC (avec PCB)
3. Quelques pièces: DigiKey BR (backup si manque)
```

---

## 📦 Import Chine - Guide Pratique {#import}

### Taxes et Frais

**Importation Brésil:**
```
Valor produto:     $100
+ Shipping:        $20
= Total fatura:    $120

Impostos (60%):    $72  (II 60% + ICMS + Taxa)
= Valor pagar:     $192

Em BRL (x5.0):     R$ 960
```

**Cálculo simplificado:** Valor produto × 1.92 × taxa câmbio

---

### Dicas Economizar

1. **Grouper commandes**
   - 1 commande R$ 500 > 5 commandes R$ 100
   - Shipping mutualisé

2. **Composants vs PCB assemblé**
   - Componentes brutos: 60% imposto
   - PCB montado: 60% imposto
   - **Melhor:** Enviar com PCB (JLCPCB)

3. **Declaração douane**
   - Valor real sempre
   - Ne pas sous-déclarer (risque saisie)

4. **Fedex vs Correios**
   - Fedex: 7-10 dias, mas taxa extra R$ 100
   - Correios: 20-30 dias, mais barato
   - **Prototipo:** Correios OK
   - **Production:** Fedex

---

### Process Commande LCSC + JLCPCB

**Étape par étape:**

```bash
# 1. Créer compte JLCPCB
https://jlcpcb.com/

# 2. Upload Gerbers
- Drag & drop ZIP gerbers
- Configure: 4-layer, 1.6mm, HASL

# 3. Activer SMT Assembly
- Click "SMT Assembly"
- Upload BOM CSV
- Upload CPL (positions)

# 4. Sélectionner composants
- JLCPCB suggère LCSC parts
- Confirmer stock disponible
- Alternative si manque

# 5. Réviser et payer
- Vérifier aperçu 3D
- Confirmer BOM
- Payer carte/PayPal

# 6. Production
- PCB: 2 jours
- Assemblage: 3 jours
- Shipping: 15-25 jours Brésil

# 7. Réception
- Correios/Fedex
- Payer taxes douane (60%)
- Recevoir!
```

---

## 🎯 Budget Total Démarrage Projet

### Option 1: Apprentissage + 1 Prototype

| Item | Coût |
|------|------|
| Kit apprentissage soudure | R$ 160 |
| Station soudure Yaxun | R$ 350 |
| Outils manuels | R$ 350 |
| Multimètre | R$ 350 |
| Oscilloscope budget | R$ 1.200 |
| Alimentation DC | R$ 450 |
| **Équipement total** | **R$ 2.860** |
| | |
| Composants 1 prototype | R$ 173 |
| PCB 5 unités | R$ 110 |
| Shipping | R$ 40 |
| **Prototype total** | **R$ 323** |
| | |
| **TOTAL OPTION 1** | **R$ 3.183** |

---

### Option 2: Production 100 Bornes

| Item | Coût |
|------|------|
| Équipement (comme option 1) | R$ 2.860 |
| Oscilloscope pro (Rigol) | R$ 2.800 |
| **Équipement total** | **R$ 5.660** |
| | |
| PCB 100 unités (JLCPCB) | R$ 20.000 |
| Assemblage SMT inclus | Inclus |
| Composants | R$ 8.000 |
| Shipping | R$ 750 |
| Taxes import (60%) | R$ 17.250 |
| **Production total** | **R$ 46.000** |
| | |
| Certification INMETRO | R$ 100.000 |
| Tests laboratoire | R$ 20.000 |
| **Certification total** | **R$ 120.000** |
| | |
| **TOTAL OPTION 2** | **R$ 171.660** |

**vs Achat 100 bornes commerciales:** R$ 3.500.000

**Économie:** R$ 3.328.340 (95%!) 🎉

---

## 📞 Contacts Fournisseurs

### Brésil

**DigiKey Brasil**
- Site: https://www.digikey.com.br/
- Email: brazilcs@digikey.com
- Telefone: 0800-770-0643

**Mouser Brasil**
- Site: https://br.mouser.com/
- Email: brasil@mouser.com

**Usinainfo**
- Site: https://www.usinainfo.com.br/
- Telefone: (11) 2924-6850
- WhatsApp: (11) 97156-8849

---

### Internacional

**LCSC**
- Site: https://lcsc.com/
- Support: service@lcsc.com
- Chat 24/7

**JLCPCB**
- Site: https://jlcpcb.com/
- Support: support@jlcpcb.com
- Chat 24/7

---

## ✅ Checklist Avant Commande

### Prototypage
- [ ] BOM vérifiée (toutes valeurs correctes)
- [ ] Stock vérifié chez fournisseur
- [ ] Footprints compatibles (0805, SOIC, etc.)
- [ ] Budget approuvé
- [ ] Délai acceptable (3-4 semaines OK?)

### Production
- [ ] BOM finalisée et validée
- [ ] Tests prototype OK
- [ ] Modifications design complétées
- [ ] LCSC parts confirmés disponibles
- [ ] Budget production approuvé (R$ 170k)
- [ ] Planning certification démarré
- [ ] Équipe assemblage formée

---

**Document créé par:** Équipe Technique Eletroposto
**Version:** 1.0
**Date:** 2025-01-08
**Licence:** MIT

🛒 **Bon shopping!**
