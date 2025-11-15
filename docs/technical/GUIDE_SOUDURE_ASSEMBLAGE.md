# Guide de Soudure et Assemblage PCB - Eletroposto

## 📋 Sommaire

1. [Matériel Nécessaire](#materiel)
2. [Préparation](#preparation)
3. [Soudure Composants SMD](#smd)
4. [Soudure Composants Traversants](#through-hole)
5. [Inspection Visuelle](#inspection)
6. [Tests Électriques](#tests)
7. [Dépannage](#depannage)

---

## 🛠️ Matériel Nécessaire {#materiel}

### Station de Soudure

| Équipement | Spécifications | Prix Estimé | Fournisseur |
|------------|----------------|-------------|-------------|
| **Station soudure** | 60-80W, température réglable | R$ 300-800 | Mercado Livre |
| **Fer à souder** | Panne fine (0.5-1mm) | Inclus | - |
| **Pannes de rechange** | Set 5 pannes (conique, biseauté) | R$ 50-100 | - |
| **Aspirateur à dessouder** | Pompe manuelle | R$ 30-60 | - |
| **Tresse à dessouder** | Largeur 2-3mm | R$ 15-30 | - |

**Station recommandée:**
- **Entrée de gamme:** Yaxun 878D (~R$ 300)
- **Moyenne gamme:** Hakko FX-888D (~R$ 600)
- **Pro:** JBC CD-2SE (~R$ 2.000)

---

### Consommables

| Item | Spécifications | Prix | Durée |
|------|----------------|------|-------|
| **Soudure** | Sn63/Pb37, 0.6mm, avec flux | R$ 40/100g | ~50 PCB |
| **Flux** | No-clean flux pen | R$ 30 | ~100 PCB |
| **Alcool isopropylique** | 99%, nettoyage | R$ 20/L | ~200 PCB |
| **Lingettes** | Sans peluche | R$ 15/100 | - |
| **Kapton tape** | Ruban haute température | R$ 25/rouleau | - |

---

### Outils de Précision

| Outil | Usage | Prix |
|-------|-------|------|
| **Pince brucelles** | Manipulation composants SMD | R$ 30-80 |
| **Loupe éclairée** | Inspection (5-10x) | R$ 100-200 |
| **Multimètre** | Tests continuité, tension | R$ 80-300 |
| **Microscope USB** | Inspection fine (optionnel) | R$ 150-400 |
| **Tapis antistatique** | Protection ESD | R$ 40-100 |
| **Bracelet antistatique** | Protection ESD | R$ 15-30 |

---

### Équipement Avancé (Optionnel)

| Équipement | Usage | Prix |
|------------|-------|------|
| **Station air chaud** | Dessoudage/soudage SMD | R$ 400-1.200 |
| **Four à refusion** | Soudage automatique SMD | R$ 1.500-5.000 |
| **Pâte à braser** | Soudage SMD au four | R$ 80/pot |
| **Stencil PCB** | Application pâte (JLCPCB) | R$ 40-100 |

---

## 🔧 Préparation {#preparation}

### 1. Espace de Travail

**Checklist:**
- [ ] Surface propre et bien éclairée (>1000 lux)
- [ ] Tapis antistatique connecté à la terre
- [ ] Bracelet antistatique porté
- [ ] Ventilation adéquate (fumées soudure)
- [ ] Fer à souder préchauffé (350°C)
- [ ] Composants organisés par valeur

**Disposition recommandée:**
```
┌─────────────────────────────────────────┐
│  STATION DE SOUDURE                     │
│                                         │
│  [Loupe]    [PCB Holder]    [Fer]     │
│                                         │
│  [Composants]  [Flux]  [Soudure]       │
│                                         │
│  [Outils]     [Multimètre]             │
│                                         │
└─────────────────────────────────────────┘
```

---

### 2. Inspection PCB

Avant assemblage:
- [ ] Vérifier visuel PCB (pas de rayures, traces coupées)
- [ ] Tester continuité GND plane (multimètre mode bip)
- [ ] Vérifier absence court-circuits entre pistes
- [ ] Nettoyer avec alcool isopropylique si nécessaire

---

### 3. Ordre d'Assemblage

**Règle d'or:** Du plus petit au plus grand, du plus plat au plus haut

```
1. Composants SMD (0805, SOT-23, etc.)
   ↓
2. ICs SMD (SOIC, TSSOP, QFN)
   ↓
3. Composants traversants plats (résistances, diodes)
   ↓
4. Composants traversants moyens (condensateurs, ICs DIP)
   ↓
5. Composants hauts (connecteurs, relais, borniers)
```

---

## 🔬 Soudure Composants SMD {#smd}

### Technique 1: Soudure Manuelle (Fer)

#### Résistances et Condensateurs 0805

**Méthode:**
```
1. Appliquer flux sur les pads
2. Étamer UN pad avec point de soudure
3. Avec pince, placer composant aligné
4. Réchauffer point de soudure, composant se positionne
5. Maintenir, retirer fer (2-3 sec)
6. Souder l'autre côté proprement
7. Re-souder premier côté si nécessaire
```

**Paramètres:**
- Température: 350°C
- Temps contact: 2-3 secondes
- Soudure: fil 0.6mm

**Vidéo tutoriel:**
- "How to Solder SMD Components" - EEVblog (YouTube)

---

#### ICs SOIC/TSSOP

**Méthode Drag Soldering:**
```
1. Appliquer flux généreusement sur tous les pads
2. Aligner et maintenir IC avec pince ou tape
3. Souder UNE patte aux coins opposés (fixation)
4. Vérifier alignement, corriger si nécessaire
5. Appliquer soudure sur toutes les pattes (drag)
6. Nettoyer excès soudure avec tresse
7. Inspecter à la loupe (pas de ponts)
```

**Astuces:**
- Flux = clé du succès
- Ne pas hésiter sur la quantité de soudure
- Tresse à dessouder résout les ponts

---

#### QFN/MLF (Composants sans pattes)

**⚠️ Difficile!** Recommandé: Station air chaud ou four à refusion

**Méthode Air Chaud:**
```
1. Appliquer pâte à braser sur pads PCB
2. Placer composant aligné (loupe!)
3. Air chaud 350°C, mouvement circulaire
4. Observer refusion pâte (composant s'auto-aligne)
5. Retirer chaleur dès que pâte devient brillante
6. Laisser refroidir naturellement
```

---

### Technique 2: Pâte à Braser + Four

**Pour production série (>10 PCB):**

#### Matériel:
- Stencil laser-cut (commander avec PCB sur JLCPCB: +R$ 40)
- Pâte à braser Sn63/Pb37 (R$ 80/pot)
- Spatule
- Four à refusion (ou four de cuisine modifié!)

#### Process:
```
1. Aligner stencil sur PCB
2. Appliquer pâte à braser avec spatule
3. Retirer stencil délicatement
4. Placer composants SMD avec pince
5. Four: Profil de température
   - Pré-chauffe: 150°C, 60-90 sec
   - Pic: 220-240°C, 30-60 sec
   - Refroidissement naturel
```

**Profil température:**
```
Temp (°C)
    │
240 │         ╱───╲        Peak (30-60s)
    │        ╱     ╲
180 │    ───╯       ╲      Soak (60-90s)
    │   ╱            ╲
 25 │──╯              ╲──
    └────────────────────▶ Time
       2min  3min  5min
```

---

## 🔩 Soudure Composants Traversants {#through-hole}

### Technique Standard

**Pour résistances, condensateurs, diodes:**

```
1. Insérer composant dans trous PCB
2. Plier légèrement pattes côté soudure (maintien)
3. Fer 350°C, toucher patte + pad simultanément (2s)
4. Appliquer soudure (pas sur fer, sur joint!)
5. Soudure doit "couler" et former cône
6. Retirer fer, laisser refroidir 3 sec
7. Couper excès patte avec pince coupante
```

**Soudure parfaite:**
```
     Composant
        │
    ────┴────  ← Cône régulier, brillant
        │
    ════════  PCB
```

**Mauvaise soudure:**
```
  Boule         Pas assez       Froid
    ●              │           ╱──╲
    │              │          │    │
  ══════       ══════       ════════
  (trop)       (contact      (terne,
               mauvais)       cassant)
```

---

### ICs DIP (Sockets Recommandés)

**Pourquoi socket:**
- Permet remplacement facile
- Évite chaleur sur IC
- Facilite dépannage

**Soudure socket:**
```
1. Insérer socket (respecter orientation encoche)
2. Fixer avec tape côté composants
3. Retourner PCB
4. Souder 4 coins en diagonal
5. Vérifier planéité
6. Souder toutes les pattes
7. Insérer IC dans socket (après tests!)
```

---

### Connecteurs et Borniers

**Conseil:** Souder en dernier (hauteur)

```
1. Insérer connecteur
2. Vérifier équerre/perpendiculaire
3. Souder 2 pattes opposées
4. Vérifier alignement
5. Souder toutes les pattes
6. Pistes large = plus de soudure OK
```

---

## 🔍 Inspection Visuelle {#inspection}

### Checklist Post-Soudure

#### Inspection Générale
- [ ] Tous composants placés (comparer BOM)
- [ ] Orientation correcte (polarité diodes, LEDs, ICs)
- [ ] Pas de composants manquants
- [ ] Pas de composants endommagés

#### Inspection Soudures SMD
- [ ] Pas de ponts entre pattes ICs
- [ ] Joints brillants (pas ternes = froid)
- [ ] Composants bien alignés
- [ ] Pas de soudure sur vernis épargne

#### Inspection Traversants
- [ ] Tous trous remplis de soudure
- [ ] Cônes réguliers
- [ ] Pas de boules de soudure isolées
- [ ] Pattes coupées proprement

---

### Inspection Loupe/Microscope

**Points critiques à vérifier:**

1. **ICs SMD (TSSOP, QFN):**
   - Zoom 10x minimum
   - Chaque patte connectée
   - Pas de ponts invisibles à l'œil nu

2. **Composants 0805:**
   - Bien centrés sur pads
   - Soudure sur les deux côtés

3. **Pistes fines:**
   - Pas de coupures
   - Pas de soudure qui déborde

---

## ⚡ Tests Électriques {#tests}

### Test 1: Continuité (AVANT Mise Sous Tension)

**⚠️ CRITIQUE - NE PAS SAUTER**

```bash
# Multimètre en mode continuité (bip)

1. Test GND:
   ✓ Tous points GND connectés (bip)
   ✗ Pas de continuité GND ↔ VCC (silence!)

2. Test VCC:
   ✓ Tous points VCC connectés
   ✗ Pas de continuité VCC ↔ GND

3. Test court-circuits:
   ✗ Pas de bip entre pattes adjacentes ICs
```

**Si court-circuit détecté:**
- Inspecter loupe
- Tresse à dessouder
- Alcool + brosse
- Re-tester

---

### Test 2: Résistance

```bash
# Multimètre en mode Ohm

1. Résistance GND ↔ VCC:
   ✓ >10kΩ (bon)
   ✗ <100Ω (court-circuit!)

2. Résistances individuelles:
   ✓ Valeur ±5% (code couleur)
```

---

### Test 3: Première Mise Sous Tension

**⚠️ AVEC ALIMENTATION LIMITÉE EN COURANT**

**Setup sécurisé:**
```
Alimentation DC    Multimètre
  (12V, 100mA)        (Ampère)
       │                │
       └────[A]─────────┤
                        │
                      [PCB]
                        │
                       GND
```

**Procédure:**
```
1. Réglez alimentation: 12V, limite 100mA
2. Brancher ampèremètre en série
3. Connecter GND
4. Connecter VCC progressivement
5. Observer courant:
   ✓ <50mA au repos = OK
   ✗ >100mA = problème! Couper immédiatement!
6. Mesurer tensions:
   ✓ VCC = 12V ±5%
   ✓ 5V rail = 5V ±5% (si régulateur)
   ✓ 3.3V rail = 3.3V ±5%
```

---

### Test 4: Fonctionnel

**Une fois tests de base OK:**

#### Test LED indicateur:
```
Si LED power:
✓ Allumée
✗ Éteinte → vérifier R limitation, polarité
```

#### Test microcontrôleur:
```
Programmer firmware test (LED blink)
✓ LED clignote → MCU OK
✗ Rien → vérifier oscillateur, alimentation
```

#### Test circuit Pilot:
```
Mesurer signal CP:
✓ PWM 1kHz ±12V
✗ Vérifier MOSFET, driver PWM
```

---

## 🔧 Dépannage {#depannage}

### Problème 1: Court-Circuit

**Symptômes:**
- Alimentation limite courant immédiatement
- Composants chauffent

**Diagnostic:**
```
1. Couper alimentation!
2. Multimètre: tester résistance GND ↔ VCC
   Si <10Ω → court-circuit
3. Inspecter loupe:
   - Ponts soudure ICs
   - Gouttes soudure égarées
   - Pistes touchant
4. Nettoyer alcool + brosse
5. Tresse à dessouder si besoin
6. Re-tester
```

---

### Problème 2: Composant Ne Fonctionne Pas

**Résistance:**
```
1. Dessouder une patte
2. Mesurer résistance hors circuit
3. Si >±10% valeur → remplacer
```

**IC:**
```
1. Vérifier alimentation sur pin VCC
2. Vérifier GND
3. Vérifier signal horloge (si applicable)
4. Programmer firmware (si MCU)
5. Si toujours mort → remplacer
```

---

### Problème 3: Soudure Froide

**Symptômes:**
- Joint terne, granuleux
- Fissures
- Intermittent

**Solution:**
```
1. Flux sur joint
2. Réchauffer fer 350°C
3. Re-souder proprement
4. Doit être brillant
```

---

### Problème 4: Pont Soudure IC

**Solution tresse:**
```
1. Flux sur pont
2. Tresse sur pont
3. Fer sur tresse (350°C)
4. Tresse absorbe soudure excès
5. Inspecter loupe
6. Répéter si nécessaire
```

---

## 📊 Temps d'Assemblage Estimé

### PCB Simple (LED + Résistance)

| Étape | Temps | Commentaire |
|-------|-------|-------------|
| Préparation | 5 min | Setup station |
| Soudure | 5 min | 2 composants |
| Inspection | 5 min | Visuelle + tests |
| **Total** | **15 min** | Débutant: 30 min |

---

### PCB Circuit Pilot Signal (20 composants)

| Étape | Temps | Commentaire |
|-------|-------|-------------|
| Préparation | 10 min | Organisation |
| SMD (15 comp.) | 45 min | 3 min/composant |
| Traversants (5) | 15 min | 3 min/composant |
| Inspection | 20 min | Loupe + tests |
| Tests élec. | 30 min | Continuité + fonctionnel |
| **Total** | **2h** | Débutant: 4h |

---

### Production 10 PCB

**Avec four à refusion:**

| Étape | Temps Total | Par PCB |
|-------|-------------|---------|
| Stencil + pâte | 1h | 6 min |
| Placement SMD | 2h | 12 min |
| Four | 1h | 6 min |
| Traversants | 2h | 12 min |
| Tests | 3h | 18 min |
| **Total** | **9h** | **54 min** |

**Économie:** 40% vs soudure manuelle

---

## 🎓 Formation et Pratique

### Progression Recommandée

#### Semaine 1: Bases
- [ ] Vidéos tutoriels (EEVblog, Great Scott)
- [ ] Kit soudure débutant (R$ 50)
- [ ] Pratiquer traversants sur PCB test
- [ ] Objectif: Soudures propres et fiables

#### Semaine 2: SMD
- [ ] Tutoriels soudure SMD
- [ ] Kit SMD débutant (0805, SOIC)
- [ ] Pratiquer sur PCB test
- [ ] Objectif: Maîtriser 0805 + SOIC

#### Semaine 3: Avancé
- [ ] TSSOP, QFN (si nécessaire)
- [ ] Station air chaud
- [ ] PCB complexes

#### Semaine 4: Production
- [ ] Assembler premier PCB projet
- [ ] Tester et valider
- [ ] Optimiser process

---

## 📚 Ressources Apprentissage

### Vidéos YouTube (GRATUIT)

1. **EEVblog - Soldering Tutorial**
   - https://www.youtube.com/watch?v=J5Sb21qbpEQ
   - Durée: 30 min
   - ⭐⭐⭐⭐⭐

2. **Great Scott - SMD Soldering**
   - https://www.youtube.com/watch?v=3NN7UGWYmBY
   - Durée: 10 min
   - ⭐⭐⭐⭐

3. **Pace - Hand Soldering Training**
   - Série professionnelle
   - 5 vidéos x 15 min
   - ⭐⭐⭐⭐⭐

---

### Kits Pratique

| Kit | Contenu | Prix | Fournisseur |
|-----|---------|------|-------------|
| **Kit débutant** | PCB + composants traversants | R$ 30-50 | Mercado Livre |
| **Kit SMD** | PCB + 0805 + SOIC | R$ 50-80 | AliExpress |
| **Kit complet** | Tout inclus + station | R$ 500+ | - |

---

## ✅ Checklist Assemblage PCB

### Avant de Commencer
- [ ] Station soudure préchauffée (350°C)
- [ ] Bracelet antistatique porté
- [ ] Tous composants vérifiés (valeurs, quantité)
- [ ] PCB inspecté (pas de défauts)
- [ ] Espace propre et organisé
- [ ] Loupe/microscope prêt

### Pendant Assemblage
- [ ] Respecter ordre (SMD → traversants)
- [ ] Vérifier polarité chaque composant
- [ ] Souder proprement (brillant, pas de ponts)
- [ ] Inspecter après chaque IC
- [ ] Nettoyer résidus flux régulièrement

### Après Assemblage
- [ ] Inspection visuelle complète (loupe)
- [ ] Test continuité GND
- [ ] Test court-circuits
- [ ] Test résistance GND ↔ VCC (>10kΩ)
- [ ] Première mise sous tension (limitée 100mA)
- [ ] Mesure tensions rails
- [ ] Tests fonctionnels

### Validation Finale
- [ ] Tous tests passés
- [ ] Documentation assemblage complétée
- [ ] Photos prises (référence future)
- [ ] PCB étiqueté (version, date)
- [ ] Prêt pour intégration système

---

**Document créé par:** Équipe Technique Eletroposto
**Version:** 1.0
**Date:** 2025-01-08
**Licence:** MIT

---

## 📞 Support

**Problèmes soudure:**
- Forum EEVblog: https://www.eevblog.com/forum/
- Reddit r/soldering: https://www.reddit.com/r/soldering/

**Achat matériel Brésil:**
- Mercado Livre
- Usinainfo.com.br
- Baudaeletronica.com.br

🔥 **Bonne soudure!**
