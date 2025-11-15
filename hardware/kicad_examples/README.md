# Exemples KiCad - Eletroposto

Ce dossier contient des exemples de fichiers KiCad et scripts d'automation pour le projet Eletroposto.

## 📁 Contenu

### 1. `pilot_signal_example.kicad_sch`

Exemple de schéma électronique KiCad pour le circuit Pilot Signal (IEC 61851-1).

**Composants inclus:**
- STM32F407VG (microcontrôleur principal)
- Résistance 1kΩ (limitation courant)
- MOSFET 2N7000 (switch PWM)
- Diode Zener 15V (protection surtension)
- Connecteur CP output

**Comment l'ouvrir:**
```bash
# Installer KiCad si nécessaire:
sudo apt install kicad  # Ubuntu/Debian
brew install --cask kicad  # macOS

# Ouvrir le fichier:
kicad pilot_signal_example.kicad_sch
```

**Format:**
- Fichier texte S-expression (lisible humain)
- Versionnable avec Git
- Compatible KiCad 6.0+

### 2. `generate_fabrication.sh`

Script Bash d'automation complète pour générer tous les fichiers de fabrication.

**Fonctionnalités:**
- ✅ Export Gerber files (tous layers)
- ✅ Export Drill files (Excellon format)
- ✅ Export BOM (Bill of Materials CSV)
- ✅ Export Pick & Place (positions composants)
- ✅ Export PDF schéma
- ✅ Export 3D STEP model
- ✅ Création archives ZIP pour fabricants
- ✅ Génération README fabricant
- ✅ Rapport complet de génération

**Utilisation:**
```bash
# Se placer dans le dossier du projet KiCad:
cd /path/to/your/kicad/project

# Copier le script:
cp /path/to/generate_fabrication.sh .

# Rendre exécutable:
chmod +x generate_fabrication.sh

# Éditer le nom du projet (ligne 9):
nano generate_fabrication.sh
# Changer: PROJECT_NAME="eletroposto_charger"
# En:      PROJECT_NAME="votre_projet"

# Exécuter:
./generate_fabrication.sh
```

**Résultat:**
```
fabrication/
├── gerber/                  # Gerber files (.gbr)
├── drill/                   # Drill files (.drl)
├── bom/                     # Bill of Materials (.csv)
├── assembly/                # Pick & Place (.csv)
├── documentation/           # PDF schéma + STEP 3D
├── archives/                # ZIP pour upload fabricant
└── README_FABRICANT.md      # Instructions fabricant
```

**Upload JLCPCB:**
```bash
# Upload ce fichier sur https://jlcpcb.com/quote :
fabrication/archives/eletroposto_charger_v1.0_fabrication_YYYYMMDD.zip
```

## 🎓 Tutoriels Recommandés

### Débutant (0-2h)
1. **Getting Started with KiCad**
   - https://docs.kicad.org/9.0/en/getting_started_in_kicad/
   - Créer premier schéma + PCB

### Intermédiaire (2-5h)
2. **DigiKey: Getting to Blinky**
   - https://www.youtube.com/watch?v=vaCVh2SAZY4
   - Série complète KiCad

### Avancé (5h+)
3. **Phil's Lab: STM32 PCB Design**
   - https://www.youtube.com/c/PhilsLab
   - High-speed design, EMI

## 📚 Documentation

- **Guide complet:** Voir `/docs/technical/OUTILS_CONCEPTION_SCHEMAS.md`
- **Analyse DIY:** Voir `/docs/technical/FABRICATION_BORNES_DIY.md`

## 🔧 Prérequis

### KiCad 9.0+
```bash
# Ubuntu/Debian:
sudo add-apt-repository ppa:kicad/kicad-9.0-releases
sudo apt update && sudo apt install kicad

# macOS:
brew install --cask kicad

# Windows:
# Télécharger depuis: https://www.kicad.org/download/windows/
```

### Outils optionnels
```bash
# GerbView (visualisation Gerber):
sudo apt install gerbv  # Linux
brew install gerbv      # macOS

# tree (affichage arborescence):
sudo apt install tree   # Linux
brew install tree       # macOS
```

## 🚀 Quick Start

### Créer votre premier schéma

1. **Lancer KiCad:**
   ```bash
   kicad
   ```

2. **Nouveau projet:**
   - File > New Project
   - Nom: `mon_circuit`
   - Localisation: choisir dossier

3. **Ouvrir Schematic Editor:**
   - Double-clic sur `mon_circuit.kicad_sch`

4. **Placer composants:**
   - Touche `A` → chercher composant
   - Exemple: "R" (résistance), "C" (condensateur), "LED"

5. **Connecter (wires):**
   - Touche `W` → tracer fils
   - Touche `L` → ajouter labels

6. **Annoter:**
   - Tools > Annotate Schematic
   - Génère R1, R2, C1, etc.

7. **Assigner footprints:**
   - Tools > Assign Footprints
   - R → R_0805_2012Metric
   - C → C_0805_2012Metric

8. **Vérifier:**
   - Inspect > Electrical Rules Checker (ERC)
   - Corriger erreurs

9. **Créer PCB:**
   - Tools > Update PCB from Schematic
   - Ouvre PCB Editor

10. **Générer fabrication:**
    ```bash
    ./generate_fabrication.sh
    ```

## 📊 Exemple: Circuit LED Simple

Voici un exemple ultra-simple pour commencer:

```
Schéma:

    +5V ─┬─── R1 (330Ω) ─── LED1 (rouge) ─── GND
         │
         └─── C1 (100nF) ─────────────────── GND

Composants:
- R1: Résistance 330Ω, 0805
- LED1: LED rouge 3mm
- C1: Condensateur 100nF, 0805
```

**Dans KiCad:**
1. Placer composants (A): Device:R, Device:LED, Device:C
2. Annoter (Tools > Annotate)
3. Connecter avec wires (W)
4. Footprints:
   - R1 → Resistor_SMD:R_0805_2012Metric
   - C1 → Capacitor_SMD:C_0805_2012Metric
   - LED1 → LED_THT:LED_D3.0mm
5. Exporter netlist → PCB

## 🎯 Prochaines Étapes

Après maîtrise des bases:

1. **Créer circuit Pilot Signal complet**
   - Reprendre schéma `pilot_signal_example.kicad_sch`
   - Ajouter tous composants (voir FABRICATION_BORNES_DIY.md)
   - Router PCB 4 layers

2. **Commande prototype**
   - Générer fichiers avec `generate_fabrication.sh`
   - Upload JLCPCB
   - 5 PCB ~R$ 125 (shipping inclus)

3. **Tests et validation**
   - Assembler prototype
   - Tester PWM 1kHz
   - Valider états A/B/C/D

4. **Production série**
   - Optimisations design
   - Commande 100 PCB
   - Assemblage local ou JLCPCB SMT

## 📞 Support

**Questions KiCad:**
- Forum: https://forum.kicad.info/
- Discord: https://discord.gg/kicad
- Docs: https://docs.kicad.org/

**Projet Eletroposto:**
- GitHub: (votre repo)
- Email: technique@eletroposto.com.br

---

**Auteur:** Équipe Technique Eletroposto
**Licence:** MIT
**Dernière mise à jour:** 2025-01-08
