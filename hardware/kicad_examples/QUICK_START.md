# 🚀 Quick Start - KiCad pour Eletroposto

## En 5 Minutes Chrono!

### 1️⃣ Installer KiCad (1 min)

```bash
# macOS:
brew install --cask kicad

# Linux Ubuntu/Debian:
sudo apt install kicad

# Windows:
# Télécharger: https://www.kicad.org/download/
```

Vérifier installation:
```bash
kicad-cli --version
# Devrait afficher: 9.0.6 ou supérieur
```

---

### 2️⃣ Tester avec Exemple (2 min)

```bash
# Se placer dans les exemples:
cd "/Users/tsousa/Sites/Thor projet/hardware/kicad_examples"

# Ouvrir KiCad:
kicad eletroposto_charger.kicad_pro
```

**Dans KiCad:**
- Double-clic `eletroposto_charger.kicad_sch` → Voir schéma LED
- Double-clic `eletroposto_charger.kicad_pcb` → Voir PCB
- View > 3D Viewer (Alt+3) → Voir en 3D

---

### 3️⃣ Générer Fichiers Fabrication (1 min)

```bash
# Exécuter le script magique:
./generate_fabrication.sh
```

**Résultat:**
```
fabrication/
├── gerber/          → 10 fichiers pour fabricant PCB
├── drill/           → 2 fichiers perçage
├── bom/             → Liste composants CSV
├── assembly/        → Positions composants
└── documentation/   → PDF schéma + 3D STEP
```

---

### 4️⃣ Commander PCB sur JLCPCB (1 min)

1. Aller sur: https://jlcpcb.com/quote
2. Upload: `fabrication/gerber/*.gbr` (zipper avant)
3. Configurer:
   - Layers: **2**
   - Thickness: **1.6mm**
   - Quantity: **5**
4. Payer: ~**R$ 110** (PCB + shipping Brésil)

**Délai:** 3-4 semaines livraison

---

## 🎯 Résumé: De Zéro à PCB Fabriqué

```
JOUR 1:
  09h00 → Installer KiCad (5 min)
  09h05 → Tutoriel "Getting to Blinky" (1h30)
  10h35 → Dessiner votre premier circuit (30 min)
  11h05 → Router PCB simple 2-layers (1h)
  
  12h05 → ☕ Pause déjeuner
  
  13h00 → Vérifications DRC/ERC (15 min)
  13h15 → ./generate_fabrication.sh (1 min)
  13h16 → Vérifier Gerbers (10 min)
  13h26 → Commander JLCPCB (5 min)
  
  13h31 → ✅ COMMANDE PASSÉE!

JOUR 2-3:
  Fabrication JLCPCB (2 jours)

JOUR 4-28:
  Shipping Chine → Brésil (15-25 jours)

JOUR 28:
  🎉 Réception PCB!
```

---

## 📚 Tutoriel Recommandé (GRATUIT)

**DigiKey: Getting to Blinky 5.0**
- https://www.youtube.com/watch?v=vaCVh2SAZY4
- Durée: 5h (divisible en sessions 30min)
- Projet: STM32 PCB complet

**Programme:**
1. Introduction KiCad (30 min)
2. Schematic capture (1h)
3. PCB layout (2h)
4. Fabrication files (30 min)
5. Assembly (1h)

---

## 🔧 Votre Premier Projet

### Circuit LED Simple (30 min)

**Objectif:** Créer circuit LED + résistance

```
Schéma:
  +5V ─── [R 330Ω] ─── [LED rouge] ─── GND
```

**Étapes:**
1. File > New Project > `mon_led`
2. Schematic Editor:
   - Touche A: chercher "R" → placer R1
   - Touche A: chercher "LED" → placer D1
   - Touche W: connecter avec fils
   - Tools > Annotate Schematic
3. Assign Footprints:
   - R1 → R_0805_2012Metric
   - D1 → LED_0805_2012Metric
4. PCB Editor:
   - Tools > Update PCB from Schematic
   - Placer composants
   - Route > Interactive Router (tracer pistes)
5. Générer Gerbers:
   ```bash
   ./generate_fabrication.sh
   ```

**Temps total:** 30 min
**Coût PCB:** R$ 110 (5 PCB)

---

## ⚡ Raccourcis Clavier Essentiels

### Schematic Editor
- `A` → Add symbol (ajouter composant)
- `W` → Wire (tracer fil)
- `L` → Label (nommer net)
- `M` → Move
- `R` → Rotate
- `Del` → Delete
- `Ctrl+Z` → Undo

### PCB Editor
- `X` → Route track (tracer piste)
- `V` → Add via
- `D` → Drag
- `F` → Flip (retourner composant)
- `Alt+3` → 3D Viewer

---

## 🎓 Progression Apprentissage

### Semaine 1: Bases (5h)
- [ ] Installer KiCad
- [ ] Tutoriel "Getting Started" (1h30)
- [ ] Circuit LED simple (30 min)
- [ ] Commander premier PCB (5 min)
- [ ] Tutoriel "Getting to Blinky" (3h)

### Semaine 2: Intermédiaire (8h)
- [ ] Circuit microcontrôleur (STM32, ESP32)
- [ ] PCB 2-layers
- [ ] Design rules check
- [ ] Simulation ngspice

### Semaine 3: Avancé (10h)
- [ ] PCB 4-layers
- [ ] Impedance control
- [ ] High-speed design
- [ ] EMI considerations

### Semaine 4: Projet Eletroposto (15h)
- [ ] Circuit Pilot Signal complet
- [ ] PCB 4-layers avec power planes
- [ ] Tests et validation
- [ ] Production prototype

---

## 📦 Composants à Commander (Premier Projet)

Pour tester votre premier PCB:

**DigiKey / Mouser:**
- Résistances 0805: Kit assortiment (~R$ 50)
- LEDs 0805: Kit couleurs (~R$ 40)
- Condensateurs 0805: Kit assortiment (~R$ 60)

**Total:** ~R$ 150

**Alternative LCSC (moins cher):**
- Même kit: ~R$ 80 (mais shipping Chine)

---

## 🆘 Aide et Support

### Problème Installation
- Forum KiCad: https://forum.kicad.info/
- Discord: https://discord.gg/kicad

### Problème Design
- YouTube: chercher "KiCad [votre problème]"
- Stack Exchange: https://electronics.stackexchange.com/

### Problème Fabrication
- JLCPCB Support: https://jlcpcb.com/help
- Chat 24/7 disponible

---

## ✅ Checklist Premier Projet

- [ ] KiCad installé et testé
- [ ] Tutoriel "Getting Started" terminé
- [ ] Premier circuit LED dessiné
- [ ] PCB routé (0 airwires)
- [ ] DRC passé (0 erreurs)
- [ ] Gerbers générés avec script
- [ ] Gerbers vérifiés dans viewer
- [ ] Compte JLCPCB créé
- [ ] Adresse Brésil configurée
- [ ] Commande PCB passée
- [ ] Composants commandés (DigiKey/LCSC)

**Une fois tout coché → Félicitations! 🎉**
Vous êtes capable de créer des PCB professionnels!

---

## 🚀 Prochaines Étapes

1. **Pendant que PCB est fabriqué (3-4 semaines):**
   - Apprendre soudure SMD
   - Commander composants
   - Préparer station soudure
   - Tutoriels avancés KiCad

2. **Réception PCB:**
   - Inspection visuelle
   - Tests continuité
   - Assemblage composants
   - Tests électriques

3. **Après validation:**
   - Itérations design si nécessaire
   - Version v2.0
   - Production série

---

**Créé par:** Équipe Technique Eletroposto
**Date:** 2025-11-08
**Licence:** MIT

🎯 **Objectif:** Maîtriser KiCad en 1 mois et créer le PCB de la borne Eletroposto!
