# Outils Open Source pour Création de Schémas Électroniques

## 📋 Guide Complet des Logiciels EDA (Electronic Design Automation)

Ce document liste tous les outils **gratuits et open source** pour créer des schémas électroniques professionnels, concevoir des PCB et visualiser vos circuits pour le projet Eletroposto.

---

## 🎯 Sommaire

1. [Comparaison Rapide des Outils](#comparaison-rapide)
2. [KiCad - Recommandé ⭐](#kicad)
3. [Autres Outils Open Source](#autres-outils)
4. [Formats de Fichiers](#formats-fichiers)
5. [Installation et Configuration](#installation)
6. [Tutoriels et Ressources](#tutoriels)
7. [Workflow Complet pour Notre Borne](#workflow)

---

## 🔍 Comparaison Rapide des Outils {#comparaison-rapide}

| Outil | Type | Licence | Niveau | 3D Viewer | Simulation | Meilleur Pour |
|-------|------|---------|--------|-----------|------------|---------------|
| **KiCad** ⭐ | Desktop | GPL (100% gratuit) | Pro | ✅ Excellent | ✅ ngspice | PCB professionnels |
| **EasyEDA** | Web | Gratuit (propriétaire) | Débutant | ✅ Bon | ✅ Basique | Prototypes rapides |
| **LibrePCB** | Desktop | GPL | Intermédiaire | ✅ Bon | ❌ | Design simple |
| **Fritzing** | Desktop | Payant €8 | Débutant | ❌ | ❌ | Breadboard/éducation |
| **CircuitJS** | Web | GPL | Débutant | ❌ | ✅ Temps réel | Simulation rapide |
| **ngspice** | CLI | BSD | Pro | ❌ | ✅ Avancé | Simulation SPICE |
| **Qucs** | Desktop | GPL | Intermédiaire | ❌ | ✅ RF | Circuits RF/micro-ondes |

### 🏆 **Recommandation pour Eletroposto:**

**KiCad** est le choix #1 pour notre projet car:
- ✅ 100% gratuit et open source (pas de limitations)
- ✅ Qualité professionnelle (utilisé par l'industrie)
- ✅ Support complet: schéma → PCB → fabrication
- ✅ Visualisation 3D intégrée
- ✅ Exportation STEP pour mécanique
- ✅ Bibliothèques massives (millions de composants)
- ✅ Compatible avec fabricants (JLCPCB, PCBWay, etc.)

---

## ⭐ KiCad - L'Outil Professionnel Open Source {#kicad}

### 📖 Description

**KiCad** est la suite EDA open source de référence, développée par le CERN et soutenue par des sponsors comme Google, Linux Foundation et NextPCB.

- **Site officiel:** https://www.kicad.org/
- **GitHub:** https://github.com/KiCad/kicad-source-mirror
- **Version actuelle:** KiCad 9.0.4 (Janvier 2025)
- **Licence:** GPL v3+ (100% open source, gratuit à vie)
- **Plateformes:** Windows, macOS, Linux

### 🎨 Modules Inclus

KiCad est une suite complète avec 5 modules principaux:

```
┌──────────────────────────────────────────────────────────┐
│                    KICAD SUITE 9.0                       │
├──────────────────────────────────────────────────────────┤
│                                                          │
│  1. ÉDITEUR DE SCHÉMAS (Schematic Editor)               │
│     → Dessiner circuits électroniques                   │
│     → Annotations automatiques                          │
│     → ERC (Electrical Rules Check)                      │
│     → Export netlist                                    │
│                                                          │
│  2. ÉDITEUR DE SYMBOLES (Symbol Editor)                 │
│     → Créer/modifier composants schéma                  │
│     → Bibliothèques personnalisées                      │
│                                                          │
│  3. ÉDITEUR PCB (PCB Editor - Pcbnew)                   │
│     → Layout placement composants                       │
│     → Routage automatique/manuel                        │
│     → DRC (Design Rules Check)                          │
│     → Export Gerber/fabrication                         │
│                                                          │
│  4. ÉDITEUR D'EMPREINTES (Footprint Editor)             │
│     → Créer/modifier footprints                         │
│     → Import STEP 3D models                             │
│                                                          │
│  5. VISUALISEUR 3D (3D Viewer)                          │
│     → Rendu photoréaliste PCB                           │
│     → Vérification collisions mécanique                 │
│     → Export STEP/VRML/X3D                              │
│                                                          │
│  6. GESTIONNAIRE PROJETS (Project Manager)              │
│     → Organisation fichiers                             │
│     → Gestion versions                                  │
│                                                          │
│  7. SIMULATEUR (Spice Simulator)                        │
│     → Simulation ngspice intégrée                       │
│     → Analyse AC/DC/transitoire                         │
│     → Courbes I/V, FFT, bode plots                      │
│                                                          │
└──────────────────────────────────────────────────────────┘
```

### 📁 Formats de Fichiers KiCad

| Extension | Type | Description |
|-----------|------|-------------|
| `.kicad_pro` | Projet | Fichier projet principal (JSON) |
| `.kicad_sch` | Schéma | Schéma électrique (texte S-expression) |
| `.kicad_pcb` | PCB | Layout PCB (texte S-expression) |
| `.kicad_sym` | Symbole | Bibliothèque symboles schéma |
| `.kicad_mod` | Empreinte | Footprint composant |
| `.kicad_wks` | Worksheet | Modèle cartouche page |
| `.step` / `.stp` | 3D | Modèle 3D (standard CAO) |
| `.wrl` | 3D | Modèle 3D VRML (legacy) |

**Tous les fichiers sont en texte brut** → Parfait pour Git versioning!

### 🚀 Installation KiCad

#### Windows
```bash
# Télécharger installateur depuis:
https://www.kicad.org/download/windows/

# Ou via Chocolatey:
choco install kicad
```

#### macOS
```bash
# Télécharger DMG depuis:
https://www.kicad.org/download/macos/

# Ou via Homebrew:
brew install --cask kicad
```

#### Linux (Ubuntu/Debian)
```bash
# Ajouter PPA officiel KiCad:
sudo add-apt-repository ppa:kicad/kicad-9.0-releases
sudo apt update
sudo apt install kicad

# Alternative Flatpak (toutes distros):
flatpak install flathub org.kicad.KiCad
```

### 📚 Bibliothèques de Composants

KiCad inclut des **millions de composants** gratuits:

#### 1. Bibliothèques Officielles (incluses)
- **Symboles:** ~10.000 composants standards
- **Empreintes:** ~20.000 footprints
- **Modèles 3D:** ~8.000 modèles STEP

#### 2. Bibliothèques Communautaires

| Source | URL | Composants | Format |
|--------|-----|------------|--------|
| **SnapEDA** | https://www.snapeda.com/ | 10M+ | KiCad direct |
| **Ultra Librarian** | https://www.ultralibrarian.com/ | 20M+ | Export KiCad |
| **Component Search Engine** | https://componentsearchengine.com/ | 15M+ | KiCad plugin |
| **SamacSys** | https://www.samacsys.com/ | 20M+ | Ecad.io |
| **KiCad Library** (GitHub) | https://kicad.github.io/ | Officiel | Git |

#### 3. Importation Fabricants

Composants directement depuis:
- Texas Instruments
- STMicroelectronics
- Microchip
- Analog Devices
- Infineon
- NXP

**Plugin recommandé:**
- **DigiKey KiCad Library** (plugin gratuit, accès instantané à 100K+ composants)

### 🎓 Tutoriels KiCad

#### Débutant (0-2h)

1. **Tutoriel Officiel KiCad**
   - https://docs.kicad.org/9.0/en/getting_started_in_kicad/
   - Créer premier schéma + PCB LED simple
   - Durée: ~1h30

2. **Getting to Blinky (DigiKey)**
   - https://www.youtube.com/watch?v=vaCVh2SAZY4
   - Série vidéo complète KiCad
   - Circuit Arduino clone
   - Durée: ~5h total

#### Intermédiaire (2-10h)

3. **KiCad 9.0 Complete Course (Coursera)**
   - https://www.coursera.org/learn/mastering-kicad-open-source-pcb-design-for-beginners
   - GRATUIT (audit mode)
   - Certificat payant optionnel

4. **PCB Design Tutorial (Phil's Lab)**
   - https://www.youtube.com/c/PhilsLab
   - STM32 PCB design
   - Impedance control, EMI

#### Avancé (10h+)

5. **High-Speed Design with KiCad**
   - https://www.fedevel.com/
   - DDR3/DDR4, USB 3.0, PCIe
   - Cours payant mais excellent

### 💡 Exemple: Créer Schéma Circuit Pilot

Voici un exemple simple du circuit Pilot Signal en KiCad:

#### Fichier: `pilot_signal.kicad_sch` (extrait)

```lisp
(kicad_sch (version 20231120) (generator "kicad")

  (paper "A4")

  (title_block
    (title "ELETROPOSTO - Circuit Pilot Signal")
    (date "2025-01-08")
    (rev "1.0")
    (company "Eletroposto Belém")
  )

  (lib_symbols
    (symbol "Device:R" (pin_numbers hide) (pin_names (offset 0))
      (property "Reference" "R" (id 0) (at 2.032 0 90))
      (property "Value" "R" (id 1) (at 0 0 90))
      (property "Footprint" "" (id 2) (at -1.778 0 90))
    )

    (symbol "Device:D_Zener" (pin_numbers hide) (pin_names (offset 1.016) hide)
      (property "Reference" "D" (id 0) (at 0 2.54 0))
      (property "Value" "D_Zener" (id 1) (at 0 -2.54 0))
    )

    (symbol "MCU_ST_STM32F4:STM32F407VGTx"
      (property "Reference" "U" (id 0) (at -15.24 64.77 0))
      (property "Value" "STM32F407VGTx" (id 1) (at 12.7 64.77 0))
    )
  )

  (wire (pts (xy 50.8 50.8) (xy 60.96 50.8)) (stroke (width 0.5)))

  (symbol (lib_id "Device:R") (at 66.04 50.8 90) (unit 1)
    (uuid "12345678-1234-1234-1234-123456789abc")
    (property "Reference" "R1" (at 66.04 45.72 90))
    (property "Value" "1k" (at 66.04 55.88 90))
    (property "Footprint" "Resistor_SMD:R_0805_2012Metric" (at 66.04 52.578 90))
  )

  (symbol (lib_id "MCU_ST_STM32F4:STM32F407VGTx") (at 100.33 80.01 0) (unit 1)
    (uuid "abcdef12-3456-7890-abcd-ef1234567890")
    (property "Reference" "U1" (at 90.17 25.4 0))
    (property "Value" "STM32F407VG" (at 110.49 25.4 0))
  )
)
```

**Ce fichier est lisible en texte brut** et peut être versionné avec Git!

---

## 🛠️ Autres Outils Open Source {#autres-outils}

### 1. EasyEDA (Web-Based)

**Site:** https://easyeda.com/

#### Avantages ✅
- **Gratuit, zéro installation** (fonctionne dans navigateur)
- Interface très intuitive (parfait débutants)
- Intégration JLCPCB (commande PCB en 1 clic)
- Bibliothèque massive LCSC (500K+ composants)
- Simulation SPICE intégrée
- Collaboration temps réel

#### Inconvénients ❌
- Propriétaire (pas open source)
- Nécessite connexion internet
- Fichiers stockés cloud (privacy)
- Moins de contrôle que KiCad

#### Formats Fichiers
- `.json` (EasyEDA propriétaire)
- Export: Gerber, PDF, PNG, SVG
- Import: Altium, Eagle, KiCad (limité)

#### Cas d'Usage
Excellent pour **prototypage rapide** et commande PCB express depuis LCSC/JLCPCB.

---

### 2. LibrePCB

**Site:** https://librepcb.org/

#### Description
Alternative open source moderne à KiCad, focus sur simplicité et portabilité.

#### Avantages ✅
- 100% gratuit et open source (GPL)
- Interface moderne et claire
- Multilingue (22 langues dont portugais)
- DRC temps réel
- Bibliothèques partagées en ligne

#### Inconvénients ❌
- Moins mature que KiCad
- Bibliothèques plus petites
- Communauté plus réduite
- Pas de simulation intégrée

#### Formats Fichiers
- `.lp` (projet LibrePCB)
- `.lppz` (projet compressé)
- Export: Gerber, PDF

---

### 3. Fritzing (⚠️ Payant maintenant)

**Site:** https://fritzing.org/

#### Description
Outil éducatif pour breadboard virtuels et schémas simplifiés.

#### Avantages ✅
- Interface ultra-simple (enfants/débutants)
- Vue breadboard (idéal documentation)
- Belles illustrations colorées

#### Inconvénients ❌
- **Payant €8** depuis 2019 (était gratuit avant)
- Open source mais binaires payants
- Pas professionnel (schémas non-standards)
- Pas de simulation
- Limité pour production

#### Formats Fichiers
- `.fzz` (Fritzing archive)
- Export: PNG, PDF, SVG, Gerber

#### Note
**Ne pas utiliser pour Eletroposto** - uniquement pour éducation/hobby.

---

### 4. Qucs (Quite Universal Circuit Simulator)

**Site:** https://qucs.sourceforge.net/

#### Description
Simulateur de circuits avec GUI, excellent pour RF et micro-ondes.

#### Avantages ✅
- Simulation rapide et précise
- Excellent pour circuits RF
- Visualisation courbes avancée
- Équations mathématiques intégrées

#### Inconvénients ❌
- Pas d'éditeur PCB
- Interface vieillotte
- Pas de 3D viewer

#### Formats Fichiers
- `.sch` (schéma Qucs)
- Export: netlist, CSV, touchstone

---

### 5. CircuitJS (Simulateur Temps Réel Web)

**Site:** https://www.falstad.com/circuit/

#### Description
Simulateur interactif en temps réel dans navigateur.

#### Avantages ✅
- Gratuit, zéro installation
- Simulation **instantanée** (temps réel)
- Excellent pour **apprendre** circuits
- Très intuitif

#### Inconvénients ❌
- Pas de PCB design
- Pas professionnel
- Pas d'export fabrication

#### Cas d'Usage
Parfait pour **valider concept** circuit Pilot Signal avant dessiner dans KiCad.

**Exemple:** Tester PWM 1kHz et diviseur résistif en 2 minutes!

---

### 6. ngspice (Simulateur SPICE Ligne de Commande)

**Site:** https://ngspice.sourceforge.io/

#### Description
Le moteur de simulation SPICE utilisé par KiCad.

#### Avantages ✅
- Simulation ultra-précise
- Scriptable (automation)
- Utilisé par industrie
- Gratuit et open source

#### Inconvénients ❌
- CLI uniquement (pas de GUI)
- Courbe apprentissage élevée
- Nécessite écrire netlist manuellement

#### Formats Fichiers
- `.cir` (netlist SPICE)
- `.raw` (résultats simulation)

---

## 📄 Formats de Fichiers - Guide Complet {#formats-fichiers}

### Formats Schémas Électroniques

| Format | Type | Logiciels | Éditable | Versionnable Git |
|--------|------|-----------|----------|------------------|
| `.kicad_sch` | Texte S-expr | KiCad 6+ | ✅ | ✅ Excellent |
| `.sch` | Texte/Binaire | KiCad 5, Eagle, Altium | ⚠️ | ⚠️ Dépend version |
| `.fzz` | ZIP/XML | Fritzing | ✅ | ⚠️ Moyen |
| `.json` | JSON | EasyEDA | ✅ | ✅ Bon |
| `.asc` | Texte | LTspice | ✅ | ✅ Bon |
| `.cir` | Texte | ngspice | ✅ | ✅ Excellent |
| `.net` | Texte | Netlist universel | ✅ | ✅ Bon |

### Formats PCB Layout

| Format | Type | Description | Standard Industrie |
|--------|------|-------------|--------------------|
| `.kicad_pcb` | Texte | Layout KiCad | ✅ Open source |
| `.brd` | Binaire | Eagle board | ✅ Très répandu |
| `PcbDoc` | Binaire | Altium Designer | ✅ Industrie Pro |
| `.fzz` | ZIP | Fritzing PCB | ❌ Hobby |

### Formats Fabrication PCB

| Format | Extension | Usage | Requis Fabrication |
|--------|-----------|-------|---------------------|
| **Gerber RS-274X** | `.gbr`, `.gtl`, `.gbl` | Couches cuivre, masque, sérigraphie | ✅ OBLIGATOIRE |
| **Excellon Drill** | `.drl`, `.xln` | Fichiers perçage | ✅ OBLIGATOIRE |
| **NC Drill** | `.txt` | Perçage alternative | ⚠️ Selon fabricant |
| **IPC-2581** | `.xml` | Format moderne (remplace Gerber) | ⚠️ Adoption croissante |
| **ODB++** | Dossier | Mentor Graphics | ⚠️ Pro uniquement |
| **Pick & Place** | `.pos`, `.csv` | Placement composants SMD | ✅ Si assemblage |
| **BOM (Bill of Materials)** | `.csv`, `.xlsx` | Liste composants | ✅ Si assemblage |

### Formats 3D

| Format | Extension | Logiciels | Usage |
|--------|-----------|-----------|-------|
| **STEP** | `.step`, `.stp` | Tous CAO (SolidWorks, Fusion360) | ✅ Standard industrie |
| **IGES** | `.igs`, `.iges` | CAO legacy | ⚠️ Ancien |
| **VRML** | `.wrl` | KiCad legacy | ❌ Obsolète |
| **X3D** | `.x3d` | KiCad, web | ⚠️ Web 3D |
| **STL** | `.stl` | Impression 3D | ⚠️ Boîtiers |

### Formats Documentation

| Format | Usage | Outil |
|--------|-------|-------|
| **PDF** | Documentation finale | Tout |
| **SVG** | Schémas vectoriels web | Inkscape, navigateurs |
| **PNG/JPG** | Images raster | Tout |
| **BOM CSV** | Liste composants Excel | Excel, LibreOffice |

---

## 🔧 Installation et Configuration {#installation}

### Configuration KiCad Recommandée pour Eletroposto

#### 1. Installation Base

```bash
# Ubuntu/Debian:
sudo apt install kicad kicad-libraries kicad-doc-en kicad-doc-pt

# Vérifier version:
kicad-cli --version
# Devrait afficher: KiCad 9.0.4 ou supérieur
```

#### 2. Installer Bibliothèques Additionnelles

```bash
# Cloner bibliothèques officielles:
cd ~/Documents
git clone https://github.com/KiCad/kicad-symbols.git
git clone https://github.com/KiCad/kicad-footprints.git
git clone https://github.com/KiCad/kicad-packages3D.git

# Dans KiCad: Préférences > Manage Symbol Libraries
# Ajouter chemin: ~/Documents/kicad-symbols
```

#### 3. Plugins Essentiels

| Plugin | Fonction | Installation |
|--------|----------|--------------|
| **KiCad StepUp** | Export 3D vers FreeCAD | Via Plugin Manager |
| **Interactive HTML BOM** | BOM interactif web | GitHub: qu1ck/InteractiveHtmlBom |
| **KiBot** | Automation fabrication | `pip install kibot` |
| **DigiKey Search** | Recherche composants | Via Plugin Manager |

#### 4. Configurer Git pour KiCad

Créer `.gitignore` pour projet KiCad:

```gitignore
# KiCad .gitignore pour Eletroposto

# Fichiers temporaires
*.bak
*.bck
*-save.kicad_pcb
*-save.kicad_sch
fp-info-cache
*.kicad_prl
*.sch-bak

# Fichiers de build
gerber/
fabrication/
*.zip

# Fichiers système
.DS_Store
Thumbs.db

# NE PAS ignorer (important):
!*.kicad_pro
!*.kicad_sch
!*.kicad_pcb
!*.kicad_sym
!*.kicad_mod
```

#### 5. Template Projet Eletroposto

Structure dossiers recommandée:

```
eletroposto-charger-pcb/
├── eletroposto.kicad_pro          # Fichier projet
├── eletroposto.kicad_sch          # Schéma principal
├── pilot_signal.kicad_sch         # Sous-schéma circuit pilot
├── power_module.kicad_sch         # Sous-schéma module puissance
├── eletroposto.kicad_pcb          # Layout PCB
├── libraries/                     # Bibliothèques custom
│   ├── eletroposto.kicad_sym     # Symboles custom
│   └── eletroposto.pretty/       # Footprints custom
│       ├── CONTACTOR_40A.kicad_mod
│       └── TYPE2_CONNECTOR.kicad_mod
├── 3d_models/                     # Modèles 3D custom
│   └── contactor_40a.step
├── datasheets/                    # PDFs composants
│   ├── STM32F407VG.pdf
│   └── CONTACTOR_40A.pdf
├── fabrication/                   # Fichiers fabrication
│   ├── gerber/                   # Gerbers
│   ├── drill/                    # Drill files
│   ├── bom/                      # Bill of Materials
│   │   └── eletroposto_bom.csv
│   └── assembly/                 # Pick & place
│       └── eletroposto_positions.csv
├── simulation/                    # Fichiers simulation
│   └── pilot_signal_test.cir
├── documentation/                 # Docs générées
│   ├── schematic.pdf
│   ├── pcb_3d_view.png
│   └── assembly_drawing.pdf
├── README.md
└── .gitignore
```

---

## 📚 Tutoriels et Ressources {#tutoriels}

### Vidéos Recommandées (Français)

| Chaîne | Titre | Lien | Durée |
|--------|-------|------|-------|
| **Zorin Electronique** | KiCad 8.0 Tutorial Complet | YouTube | 3h |
| **Électronique Pratique** | Concevoir PCB avec KiCad | YouTube | 1h30 |
| **PoBot** | KiCad pour Robotique | YouTube | 2h |

### Vidéos Recommandées (Anglais)

| Chaîne | Titre | Qualité |
|--------|-------|---------|
| **DigiKey** | KiCad 6 STM32 Hardware Design | ⭐⭐⭐⭐⭐ |
| **Phil's Lab** | 4-Layer STM32 PCB Design | ⭐⭐⭐⭐⭐ |
| **Robert Feranec** | Advanced KiCad Techniques | ⭐⭐⭐⭐⭐ |
| **Contextual Electronics** | Getting to Blinky | ⭐⭐⭐⭐ |

### Documentation Officielle

| Resource | URL |
|----------|-----|
| **KiCad Docs (EN)** | https://docs.kicad.org/ |
| **KiCad Docs (PT)** | https://docs.kicad.org/master/pt/ |
| **KiCad Forum** | https://forum.kicad.info/ |
| **KiCad Discord** | https://discord.gg/kicad |

### Livres (Gratuits)

1. **"KiCad Like a Pro"** (Peter Dalmaris)
   - https://www.amazon.com/KiCad-Like-Pro-production-ready/dp/1907920617
   - Version eBook souvent gratuite

2. **"Getting Started with KiCad"** (Official)
   - Inclus dans installation KiCad
   - Chemin: Help > Getting Started with KiCad

---

## 🔄 Workflow Complet pour Notre Borne {#workflow}

### Processus de Conception Circuit Pilot Signal

Voici le workflow complet de A à Z pour créer le circuit Pilot Signal de la borne Eletroposto:

```
┌─────────────────────────────────────────────────────────────┐
│  PHASE 1: CONCEPTION SCHÉMA (KiCad Schematic Editor)       │
└────────────────────┬────────────────────────────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 1. Créer nouveau projet          │
    │    File > New Project             │
    │    Nom: eletroposto_pilot        │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 2. Placer composants              │
    │    • Rechercher symboles (A)      │
    │    • STM32F407VG                  │
    │    • Résistances 1kΩ, 2kΩ        │
    │    • MOSFET 2N7000                │
    │    • Diode Zener 15V              │
    │    • Connecteurs                  │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 3. Connecter (fils)               │
    │    • Touche W: placer wire        │
    │    • Labels (L): noms nets        │
    │    • PWM_OUT, CP_SENSE, etc.      │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 4. Annotations                    │
    │    Tools > Annotate Schematic     │
    │    → R1, R2, U1, etc.             │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 5. Assigner footprints            │
    │    Tools > Assign Footprints      │
    │    R1 → R_0805_2012Metric         │
    │    U1 → LQFP-100_14x14mm          │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 6. ERC (Electrical Rules Check)  │
    │    Inspect > Electrical Rules     │
    │    → Corriger erreurs             │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 7. Générer netlist                │
    │    Tools > Generate Netlist       │
    │    → eletroposto.net              │
    └────────────────┬─────────────────┘
                     │
┌────────────────────▼────────────────────────────────────────┐
│  PHASE 2: SIMULATION (ngspice intégré)                      │
└────────────────────┬────────────────────────────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 1. Ajouter modèles SPICE          │
    │    • Télécharger models:          │
    │      - STM32 (simplified)         │
    │      - 2N7000 (Infineon)          │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 2. Configure simulation           │
    │    Inspect > Simulator            │
    │    • Transient: 0-10ms            │
    │    • AC analysis: 100Hz-100kHz    │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 3. Run & Analyze                  │
    │    • Vérifier PWM 1kHz            │
    │    • Amplitude ±12V               │
    │    • Duty cycle 10-96%            │
    └────────────────┬─────────────────┘
                     │
┌────────────────────▼────────────────────────────────────────┐
│  PHASE 3: PCB LAYOUT (KiCad PCB Editor)                     │
└────────────────────┬────────────────────────────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 1. Import netlist                 │
    │    Tools > Update PCB from Sch.   │
    │    → Composants apparaissent      │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 2. Définir stackup                │
    │    File > Board Setup             │
    │    • 4 layers: Signal/GND/PWR/Sig │
    │    • FR-4 1.6mm                   │
    │    • Cuivre 35µm (1oz)            │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 3. Design rules                   │
    │    • Track width: 0.3mm min       │
    │    • Clearance: 0.2mm             │
    │    • Via: 0.6mm drill / 1mm pad   │
    │    • High current: 2mm+ tracks    │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 4. Placement composants           │
    │    • MCU au centre                │
    │    • Connecteurs bords            │
    │    • Power stage séparé           │
    │    • Découplage près IC           │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 5. Routage                        │
    │    • Route > Interactive Router   │
    │    • GND plane sur layer 2        │
    │    • Power plane sur layer 3      │
    │    • Signal top + bottom          │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 6. Zones copper pour                │
    │    • GND polygon (layer 2)        │
    │    • +12V polygon (layer 3)       │
    │    • Thermal reliefs (0.3mm)      │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 7. DRC (Design Rules Check)       │
    │    Inspect > Design Rules Checker │
    │    → 0 erreurs requises!          │
    └────────────────┬─────────────────┘
                     │
┌────────────────────▼────────────────────────────────────────┐
│  PHASE 4: VÉRIFICATION 3D                                    │
└────────────────────┬────────────────────────────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 1. Ouvrir 3D Viewer               │
    │    View > 3D Viewer (Alt+3)       │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 2. Vérifier                       │
    │    • Hauteur composants OK        │
    │    • Pas de collisions            │
    │    • Connecteurs accessibles      │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 3. Export STEP                    │
    │    File > Export > STEP           │
    │    → Pour FreeCAD/SolidWorks      │
    └────────────────┬─────────────────┘
                     │
┌────────────────────▼────────────────────────────────────────┐
│  PHASE 5: GÉNÉRATION FICHIERS FABRICATION                   │
└────────────────────┬────────────────────────────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 1. Gerber files                   │
    │    File > Fabrication Outputs     │
    │          > Gerbers (.gbr)         │
    │    Layers:                        │
    │    ✓ F.Cu (top copper)            │
    │    ✓ B.Cu (bottom copper)         │
    │    ✓ In1.Cu, In2.Cu (internes)    │
    │    ✓ F.Paste (pâte à braser)      │
    │    ✓ B.Paste                      │
    │    ✓ F.Silkscreen (sérigraphie)   │
    │    ✓ B.Silkscreen                 │
    │    ✓ F.Mask (vernis épargne)      │
    │    ✓ B.Mask                       │
    │    ✓ Edge.Cuts (contour)          │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 2. Drill files                    │
    │    File > Fabrication Outputs     │
    │          > Drill Files (.drl)     │
    │    Format: Excellon               │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 3. BOM (Bill of Materials)        │
    │    Tools > Generate BOM           │
    │    Plugin: bom_csv_grouped_by_value│
    │    → eletroposto_bom.csv          │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 4. Pick & Place (assemblage)      │
    │    File > Fabrication Outputs     │
    │          > Footprint Positions    │
    │    Format: CSV                    │
    │    → eletroposto_positions.csv    │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 5. Vérifier avec GerbView         │
    │    Tools > View Gerber Files      │
    │    • Charger tous .gbr            │
    │    • Vérifier chaque layer        │
    │    • Mesurer dimensions           │
    └────────────────┬─────────────────┘
                     │
┌────────────────────▼────────────────────────────────────────┐
│  PHASE 6: COMMANDE FABRICATION                              │
└────────────────────┬────────────────────────────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 1. Zipper fichiers                │
    │    gerber/                        │
    │    ├── *.gbr (tous layers)        │
    │    ├── *.drl (drill)              │
    │    └── README.txt (specs)         │
    │    → eletroposto_v1.0_gerber.zip  │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 2. Upload JLCPCB                  │
    │    https://jlcpcb.com/            │
    │    • Upload ZIP                   │
    │    • Specs:                       │
    │      - Layers: 4                  │
    │      - Thickness: 1.6mm           │
    │      - Surface: HASL lead-free    │
    │      - Solder mask: Vert          │
    │      - Silkscreen: Blanc          │
    │    • Assemblage SMT (optionnel)   │
    │      - Upload BOM CSV             │
    │      - Upload Positions CSV       │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 3. Révision fabricant             │
    │    • Vérifier aperçu 3D           │
    │    • Confirmer specs              │
    │    • Payer (carte/PayPal)         │
    └────────────────┬─────────────────┘
                     │
    ┌────────────────▼─────────────────┐
    │ 4. Production                     │
    │    • Fabrication: 2 jours         │
    │    • Assemblage: +3 jours         │
    │    • Shipping Brésil: 15-25 jours │
    │    TOTAL: ~1 mois                 │
    └────────────────┬─────────────────┘
                     │
                ┌────▼─────┐
                │ PCB REÇU │
                └──────────┘
```

### Checklist Avant Commande

- [ ] **Schéma vérifié** (ERC 0 erreurs)
- [ ] **Simulation OK** (PWM 1kHz ±12V validé)
- [ ] **PCB routé 100%** (0 airwires)
- [ ] **DRC passé** (0 erreurs design rules)
- [ ] **3D viewer** (pas de collisions)
- [ ] **Gerbers générés** (tous layers)
- [ ] **Drill files générés** (Excellon)
- [ ] **BOM complète** (tous composants sourcés)
- [ ] **Pick & Place** (si assemblage)
- [ ] **GerbView vérification** (aperçu final)
- [ ] **Peer review** (2e paire d'yeux)
- [ ] **Backup Git** (commit + push)

---

## 💻 Commandes KiCad CLI (Automation)

KiCad 9+ inclut CLI pour automation:

### Générer Gerbers en Ligne de Commande

```bash
# Export Gerbers automatique:
kicad-cli pcb export gerbers \
  --output fabrication/gerber/ \
  --layers F.Cu,B.Cu,In1.Cu,In2.Cu,F.Paste,B.Paste,F.Silkscreen,B.Silkscreen,F.Mask,B.Mask,Edge.Cuts \
  eletroposto.kicad_pcb

# Export Drill:
kicad-cli pcb export drill \
  --output fabrication/drill/ \
  --format excellon \
  eletroposto.kicad_pcb

# Export PDF Schéma:
kicad-cli sch export pdf \
  --output documentation/schematic.pdf \
  eletroposto.kicad_sch

# Export BOM:
kicad-cli sch export bom \
  --output fabrication/bom/bom.csv \
  --format-preset "Grouped By Value" \
  eletroposto.kicad_sch
```

### Script Automation Complet

Créer `generate_fabrication.sh`:

```bash
#!/bin/bash
# Script automation fabrication Eletroposto

PROJECT="eletroposto"
VERSION="v1.0"

echo "🚀 Génération fichiers fabrication ${PROJECT} ${VERSION}"

# Créer dossiers
mkdir -p fabrication/{gerber,drill,bom,assembly,documentation}

# Gerbers
echo "📐 Export Gerbers..."
kicad-cli pcb export gerbers \
  --output fabrication/gerber/ \
  ${PROJECT}.kicad_pcb

# Drill
echo "🔨 Export Drill..."
kicad-cli pcb export drill \
  --output fabrication/drill/ \
  ${PROJECT}.kicad_pcb

# BOM
echo "📋 Export BOM..."
kicad-cli sch export bom \
  --output fabrication/bom/${PROJECT}_bom.csv \
  ${PROJECT}.kicad_sch

# Position (Pick & Place)
echo "📍 Export Positions..."
kicad-cli pcb export pos \
  --output fabrication/assembly/${PROJECT}_positions.csv \
  ${PROJECT}.kicad_pcb

# PDF Documentation
echo "📄 Export PDF..."
kicad-cli sch export pdf \
  --output fabrication/documentation/${PROJECT}_schematic.pdf \
  ${PROJECT}.kicad_sch

# ZIP pour fabricant
echo "📦 Création ZIP..."
cd fabrication/gerber && zip -r ../${PROJECT}_${VERSION}_gerber.zip * && cd ../..
cd fabrication/drill && zip -r ../${PROJECT}_${VERSION}_drill.zip * && cd ../..

echo "✅ Fichiers générés dans: fabrication/"
echo "📤 Upload fabrication/${PROJECT}_${VERSION}_gerber.zip sur JLCPCB"
```

Rendre exécutable et lancer:
```bash
chmod +x generate_fabrication.sh
./generate_fabrication.sh
```

---

## 🎯 Prochaines Étapes

### Pour Démarrer Immédiatement

1. **Installer KiCad 9.0+**
   ```bash
   # Ubuntu:
   sudo add-apt-repository ppa:kicad/kicad-9.0-releases
   sudo apt update && sudo apt install kicad
   ```

2. **Suivre tutoriel "Getting to Blinky"**
   - https://www.youtube.com/watch?v=vaCVh2SAZY4
   - Durée: 1h30
   - Créer premier PCB fonctionnel

3. **Créer projet Eletroposto Pilot Signal**
   - File > New Project > `eletroposto_pilot`
   - Dessiner schéma circuit Pilot
   - Simuler avec ngspice

4. **Commande PCB prototype JLCPCB**
   - 5 PCB 10x10cm: ~$5 USD
   - Livraison Brésil: ~$20 USD
   - Total: ~R$ 125 pour 5 PCB prototypes

### Ressources Additionnelles

- **Forum Eletroposto KiCad:** Créer canal Discord pour questions
- **Templates KiCad:** Partager dans repo Git équipe
- **Bibliothèques custom:** Centraliser composants spécifiques

---

## 📞 Support et Communauté

### KiCad Brésil
- **Telegram:** https://t.me/kicadbrasil
- **Facebook:** Grupo KiCad Brasil

### Support Officiel
- **Forum:** https://forum.kicad.info/
- **Discord:** https://discord.gg/kicad
- **GitLab Issues:** https://gitlab.com/kicad/code/kicad/-/issues

### Fabricants PCB (Support)
- **JLCPCB:** https://jlcpcb.com/help (chat 24/7)
- **PCBWay:** https://www.pcbway.com/helpcenter/

---

**Document créé le:** 2025-01-08
**Version:** 1.0
**Auteur:** Équipe Technique Eletroposto
**Prochaine révision:** Après premier PCB prototype

---

## ✅ Résumé Final

**Pour créer les vrais schémas de la borne Eletroposto:**

1. ✅ **Utiliser KiCad 9.0+** (gratuit, open source, professionnel)
2. ✅ **Format fichiers:** `.kicad_sch` (schéma), `.kicad_pcb` (PCB)
3. ✅ **Visualisation:** Intégrée dans KiCad (3D viewer inclus)
4. ✅ **Export:** Gerber, STEP, PDF, BOM
5. ✅ **Fabrication:** JLCPCB (5 PCB ~R$ 125)

**Temps estimé maîtrise KiCad:** 10-20 heures tutoriels + pratique

**Prêt à créer le premier schéma du circuit Pilot Signal!** 🚀
