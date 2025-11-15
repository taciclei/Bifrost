# Planning Détaillé 6 Mois - Projet Eletroposto

## 📅 Vue d'Ensemble

**Objectif:** Développer et valider le circuit Pilot Signal pour borne de recharge EV

**Durée:** 6 mois (26 semaines)
**Budget:** R$ 200.000
**Équipe:** 5 personnes

---

## 👥 Équipe Projet

| Rôle | Responsabilités | Allocation | Coût/mois |
|------|-----------------|------------|-----------|
| **Ingénieur Électronique Senior** | Design PCB, validation | 100% | R$ 18.000 |
| **Développeur Firmware** | Code STM32, OCPP | 100% | R$ 12.000 |
| **Technicien Assemblage** | Soudure, tests | 100% | R$ 6.000 |
| **Ingénieur Tests** | Validation, certification | 50% | R$ 4.500 |
| **Chef de Projet** | Coordination, planning | 50% | R$ 7.500 |

**Total équipe:** R$ 48.000/mois

---

## 📊 Budget Global 6 Mois

| Catégorie | Montant | % |
|-----------|---------|---|
| **Salaires équipe** | R$ 288.000 | 72% |
| **Équipement** | R$ 15.000 | 3.8% |
| **Prototypes (5 séries)** | R$ 10.000 | 2.5% |
| **Composants** | R$ 5.000 | 1.3% |
| **Tests laboratoire** | R$ 20.000 | 5% |
| **Certification préliminaire** | R$ 50.000 | 12.5% |
| **Divers (10%)** | R$ 12.000 | 3% |
| **TOTAL** | **R$ 400.000** | 100% |

---

## 📈 Phases du Projet

```
MOIS 1-2: Conception et Design
           ↓
MOIS 3-4: Prototypage et Tests
           ↓
MOIS 5: Validation et Optimisation
           ↓
MOIS 6: Certification et Documentation
```

---

## 🗓️ MOIS 1: Spécifications et Design (Semaines 1-4)

### Semaine 1: Kick-off et Spécifications

**Objectifs:**
- Réunion kick-off équipe
- Revue cahier des charges
- Setup environnement développement

**Livrables:**
- [ ] Document spécifications techniques v1.0
- [ ] Planning détaillé validé
- [ ] Équipe formée et roles assignés
- [ ] Environnement dev configuré

**Budget:** R$ 66.000 (salaires)

---

### Semaine 2: Étude et Recherche

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Analyse norme IEC 61851-1 | Ing. Senior | 3j | ⬜ |
| Étude circuits existants | Ing. Senior | 2j | ⬜ |
| Sélection composants clés | Ing. Senior | 2j | ⬜ |
| Recherche MCU optimal | Dev Firmware | 2j | ⬜ |
| Setup KiCad + bibliothèques | Ing. Senior | 1j | ⬜ |

**Livrables:**
- [ ] Rapport étude comparative circuits
- [ ] Liste composants présélectionnés
- [ ] Architecture système v1.0

---

### Semaine 3: Schéma Électronique

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Schéma bloc système | Ing. Senior | 1j | ⬜ |
| Schéma circuit Pilot | Ing. Senior | 2j | ⬜ |
| Schéma alimentation | Ing. Senior | 1j | ⬜ |
| Schéma MCU + périphériques | Ing. Senior | 2j | ⬜ |
| Revue schéma équipe | Tous | 0.5j | ⬜ |
| ERC (Electrical Rules Check) | Ing. Senior | 0.5j | ⬜ |

**Livrables:**
- [ ] Schéma complet KiCad (.kicad_sch)
- [ ] BOM préliminaire
- [ ] Document architecture électronique

---

### Semaine 4: Design PCB Layer 1

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Placement composants | Ing. Senior | 2j | ⬜ |
| Définition stackup 4-layer | Ing. Senior | 0.5j | ⬜ |
| Design rules setup | Ing. Senior | 0.5j | ⬜ |
| Routage power traces | Ing. Senior | 1j | ⬜ |
| Routage signaux critiques | Ing. Senior | 1j | ⬜ |

**Livrables:**
- [ ] PCB layout 50% complété
- [ ] Stackup 4-layer défini

**Jalons Mois 1:**
- ✅ Schéma électronique validé
- ✅ PCB layout démarré
- Budget consommé: R$ 66.000

---

## 🗓️ MOIS 2: Finalisation Design et Commande (Semaines 5-8)

### Semaine 5: Finalisation PCB

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Routage 100% PCB | Ing. Senior | 2j | ⬜ |
| Placement vias | Ing. Senior | 0.5j | ⬜ |
| GND plane (layer 2) | Ing. Senior | 0.5j | ⬜ |
| Power planes (layer 3) | Ing. Senior | 0.5j | ⬜ |
| DRC (Design Rules Check) | Ing. Senior | 0.5j | ⬜ |
| Corrections erreurs | Ing. Senior | 1j | ⬜ |

---

### Semaine 6: Vérification et Génération Fabrication

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Revue 3D PCB | Ing. Senior | 0.5j | ⬜ |
| Vérification dimensions | Ing. Senior | 0.5j | ⬜ |
| Export Gerbers | Ing. Senior | 0.5j | ⬜ |
| Export Drill files | Ing. Senior | 0.5j | ⬜ |
| Génération BOM finale | Ing. Senior | 1j | ⬜ |
| Génération Pick&Place | Ing. Senior | 0.5j | ⬜ |
| Vérification GerbView | Ing. Senior | 0.5j | ⬜ |

**Livrables:**
- [ ] PCB finalisé (.kicad_pcb)
- [ ] Gerbers + Drill files
- [ ] BOM finale avec MPN
- [ ] Pick & Place CSV

---

### Semaine 7: Commande PCB et Composants

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Upload Gerbers JLCPCB | Ing. Senior | 0.5j | ⬜ |
| Configuration fabrication | Ing. Senior | 0.5j | ⬜ |
| Commande 10 PCB | Chef Projet | 0.5j | ⬜ |
| Commande composants DigiKey | Chef Projet | 1j | ⬜ |
| Commande composants LCSC | Chef Projet | 1j | ⬜ |
| **ATTENTE FABRICATION** | - | - | - |

**Coûts Semaine 7:**
- PCB (10 unités): R$ 550
- Composants (10 sets): R$ 2.000
- Shipping: R$ 300
- **Total:** R$ 2.850

---

### Semaine 8: Développement Firmware (Parallèle)

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Setup STM32CubeIDE | Dev Firmware | 0.5j | ⬜ |
| Init projet STM32F407 | Dev Firmware | 0.5j | ⬜ |
| Driver PWM 1kHz | Dev Firmware | 1j | ⬜ |
| Driver ADC (CP sense) | Dev Firmware | 1j | ⬜ |
| Machine états IEC 61851 | Dev Firmware | 2j | ⬜ |

**Livrables:**
- [ ] Projet firmware STM32 initialisé
- [ ] Code PWM + ADC fonctionnel (simulation)

**Jalons Mois 2:**
- ✅ PCB commandé (production 2 semaines)
- ✅ Composants commandés
- ✅ Firmware 30% complété
- Budget consommé: R$ 66.000 + R$ 2.850 = R$ 68.850

---

## 🗓️ MOIS 3: Prototypage et Assemblage (Semaines 9-13)

### Semaine 9-10: Réception et Inspection

**Timeline:**
- Jour 1-7: Attente shipping PCB/composants
- Jour 8: Réception
- Jour 9-10: Inspection

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Réception PCB | Technicien | 0.5j | ⬜ |
| Inspection visuelle PCB | Technicien | 0.5j | ⬜ |
| Test continuité PCB | Technicien | 0.5j | ⬜ |
| Inventaire composants | Technicien | 0.5j | ⬜ |
| Vérification valeurs | Technicien | 1j | ⬜ |

---

### Semaine 11: Assemblage Prototype 1

**Objectif:** Assembler 2 PCB complets

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Soudure composants SMD | Technicien | 2j | ⬜ |
| Soudure composants traversants | Technicien | 0.5j | ⬜ |
| Inspection loupe | Technicien | 0.5j | ⬜ |
| Nettoyage flux | Technicien | 0.5j | ⬜ |
| Tests électriques base | Technicien | 1j | ⬜ |

**Livrables:**
- [ ] 2 PCB assemblés
- [ ] Rapport assemblage avec photos

---

### Semaine 12: Tests Électriques Initiaux

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Test continuité | Ing. Tests | 0.5j | ⬜ |
| Test court-circuits | Ing. Tests | 0.5j | ⬜ |
| Première mise sous tension | Ing. Tests | 0.5j | ⬜ |
| Mesure tensions rails | Ing. Tests | 0.5j | ⬜ |
| Tests composants individuels | Ing. Tests | 1j | ⬜ |
| Debug si problèmes | Ing. Senior | 2j | ⬜ |

**Résultats attendus:**
- [ ] PCB s'alimente correctement
- [ ] Tous rails tensions OK
- [ ] Pas de fumée magique! 🔥

---

### Semaine 13: Programmation Firmware

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Flash firmware sur PCB | Dev Firmware | 0.5j | ⬜ |
| Test LED blink | Dev Firmware | 0.5j | ⬜ |
| Test PWM oscilloscope | Dev Firmware | 1j | ⬜ |
| Calibration fréquence | Dev Firmware | 1j | ⬜ |
| Test machine états | Dev Firmware | 2j | ⬜ |

**Livrables:**
- [ ] Firmware flashé et fonctionnel
- [ ] PWM 1kHz ±1% validé
- [ ] États A/B/C détectés

**Jalons Mois 3:**
- ✅ Prototype 1 assemblé et fonctionnel
- ✅ Tests électriques passés
- ✅ Firmware basique OK
- Budget consommé cumulé: R$ 134.850

---

## 🗓️ MOIS 4: Tests et Validation (Semaines 14-17)

### Semaine 14: Tests Conformité IEC 61851-1

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Test signal Pilot forme d'onde | Ing. Tests | 1j | ⬜ |
| Test duty cycles (6-63A) | Ing. Tests | 1j | ⬜ |
| Test détection états véhicule | Ing. Tests | 1j | ⬜ |
| Test temps de réponse | Ing. Tests | 0.5j | ⬜ |
| Test impédance source | Ing. Tests | 0.5j | ⬜ |

**Équipement requis:**
- Oscilloscope 100MHz
- Résistances test (2.74kΩ, 882Ω, 246Ω)
- Multimètre précision

---

### Semaine 15: Tests Sécurité

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Test isolation galvanique | Ing. Tests | 0.5j | ⬜ |
| Test protection surtension | Ing. Tests | 1j | ⬜ |
| Test courant fuite terre | Ing. Tests | 0.5j | ⬜ |
| Test protection court-circuit | Ing. Tests | 1j | ⬜ |
| Test température composants | Ing. Tests | 1j | ⬜ |

**⚠️ Tests destructifs sur PCB dédié**

---

### Semaine 16: Identification Problèmes et Corrections

**Analyse résultats tests:**

**Si problèmes détectés:**
| Type Problème | Action | Responsable | Durée |
|---------------|--------|-------------|-------|
| Hardware mineur | Modification PCB | Ing. Senior | 2j |
| Hardware majeur | Redesign PCB | Ing. Senior | 1 semaine |
| Firmware | Correction code | Dev Firmware | 2j |
| Composant défectueux | Remplacement | Technicien | 0.5j |

**Livrables:**
- [ ] Liste problèmes identifiés
- [ ] Plan d'action corrections
- [ ] Modifications design si nécessaire

---

### Semaine 17: Prototype v2 (si nécessaire)

**Si corrections hardware requises:**

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Modifications schéma | Ing. Senior | 1j | ⬜ |
| Modifications PCB | Ing. Senior | 2j | ⬜ |
| Génération Gerbers v2 | Ing. Senior | 0.5j | ⬜ |
| Commande PCB v2 | Chef Projet | 0.5j | ⬜ |
| **ATTENTE 2 semaines** | - | - | - |

**Coût Prototype v2:** R$ 1.500

**Jalons Mois 4:**
- ✅ Tests IEC 61851-1 complétés
- ✅ Tests sécurité passés
- ✅ Problèmes identifiés et corrigés
- Budget consommé cumulé: R$ 202.350

---

## 🗓️ MOIS 5: Optimisation et Validation (Semaines 18-22)

### Semaine 18-19: Assemblage et Tests Prototype v2

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Assemblage 3 PCB v2 | Technicien | 2j | ⬜ |
| Tests électriques | Ing. Tests | 1j | ⬜ |
| Tests IEC 61851-1 | Ing. Tests | 2j | ⬜ |
| Tests sécurité | Ing. Tests | 2j | ⬜ |
| Validation corrections | Ing. Senior | 1j | ⬜ |

---

### Semaine 20: Tests Performance

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Précision duty cycle | Ing. Tests | 1j | ⬜ |
| Stabilité fréquence 24h | Ing. Tests | 1j | ⬜ |
| Tests EMI/bruit | Ing. Tests | 1j | ⬜ |
| Consommation énergétique | Ing. Tests | 0.5j | ⬜ |
| Tests cycles ON/OFF | Ing. Tests | 1j | ⬜ |

---

### Semaine 21: Tests avec Véhicule Réel

**🚗 TEST CRITIQUE - Intégration véhicule**

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Setup installation test | Ing. Senior | 0.5j | ⬜ |
| Test véhicule 1 (Nissan Leaf) | Tous | 1j | ⬜ |
| Test véhicule 2 (Chevrolet Bolt) | Tous | 1j | ⬜ |
| Test véhicule 3 (BMW i3) | Tous | 1j | ⬜ |
| Analyse résultats | Ing. Senior | 1j | ⬜ |

**Lieu:** Estacionamento Eletroposto ou concession

**Critère succès:** 3/3 véhicules chargent sans erreur

---

### Semaine 22: Test Endurance

**Objectif:** 168h fonctionnement continu (1 semaine)

**Setup:**
```
Temperature: 40°C (chambre climatique)
Charge simulée: Résistance 882Ω (État C)
Cycles: ON 4h / OFF 10min
Monitoring: Température, tensions, forme d'onde
```

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Setup test endurance | Technicien | 0.5j | ⬜ |
| Monitoring continu | Technicien | 7j | ⬜ |
| Analyse résultats | Ing. Tests | 1j | ⬜ |

**Livrables:**
- [ ] Rapport test 168h
- [ ] Graphiques température/tensions
- [ ] Zéro défaillance constatée

**Jalons Mois 5:**
- ✅ Prototype v2 validé
- ✅ Tests véhicules réels OK
- ✅ Test endurance 168h passé
- Budget consommé cumulé: R$ 268.350

---

## 🗓️ MOIS 6: Certification et Documentation (Semaines 23-26)

### Semaine 23: Préparation Certification

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Compilation dossier technique | Ing. Senior | 2j | ⬜ |
| Rédaction rapports tests | Ing. Tests | 2j | ⬜ |
| Photos et vidéos démos | Technicien | 1j | ⬜ |
| Datasheet composants | Technicien | 1j | ⬜ |

**Documents requis:**
- [ ] Schémas électroniques complets
- [ ] BOM avec MPN tous composants
- [ ] Rapports tests (IEC, sécurité, performance)
- [ ] Manuel technique
- [ ] Analyse risques (FMEA)

---

### Semaine 24: Contact Laboratoire Accrédité

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Recherche labo accrédité | Chef Projet | 1j | ⬜ |
| Demande devis (IPT, Lactec) | Chef Projet | 1j | ⬜ |
| Envoi dossier pré-audit | Ing. Senior | 1j | ⬜ |
| Réunion labo (visio) | Tous | 0.5j | ⬜ |
| Préparation échantillons (5 PCB) | Technicien | 1j | ⬜ |

**Laboratoires contactés:**
- [ ] IPT (São Paulo)
- [ ] Lactec (Curitiba)
- [ ] Labelo (São Paulo)

**Coût tests laboratoire:** R$ 20.000 - R$ 50.000

---

### Semaine 25: Documentation Finale

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Manuel technique (PT) | Ing. Senior | 2j | ⬜ |
| Manuel utilisateur (PT) | Dev Firmware | 1j | ⬜ |
| Guide installation | Technicien | 1j | ⬜ |
| Procédures tests | Ing. Tests | 1j | ⬜ |
| Documentation code firmware | Dev Firmware | 1j | ⬜ |

**Livrables:**
- [ ] Manuel Técnico Eletroposto v1.0 (PDF)
- [ ] Manual do Usuário v1.0 (PDF)
- [ ] Guia de Instalação v1.0 (PDF)
- [ ] Procedimentos de Teste v1.0 (PDF)
- [ ] Code firmware commenté + README

---

### Semaine 26: Clôture Projet et Présentation

**Activités:**
| Tâche | Responsable | Durée | Statut |
|-------|-------------|-------|--------|
| Rapport final projet | Chef Projet | 2j | ⬜ |
| Présentation résultats | Chef Projet | 1j | ⬜ |
| Réunion stakeholders | Tous | 0.5j | ⬜ |
| Archivage documentation | Chef Projet | 0.5j | ⬜ |
| Celebration équipe! 🎉 | Tous | 1j | ⬜ |

**Présentation finale:**
- Résultats techniques
- Budget vs réel
- Planning vs réel
- Prochaines étapes (certification INMETRO)
- Recommandations production série

**Jalons Mois 6:**
- ✅ Documentation complète
- ✅ Dossier certification prêt
- ✅ Échantillons envoyés labo
- ✅ Projet clôturé
- Budget consommé cumulé: R$ 334.350

---

## 📊 Suivi Budget Mensuel

| Mois | Salaires | Matériel | Tests | Certif | Total | Cumulé |
|------|----------|----------|-------|--------|-------|--------|
| M1 | R$ 66.000 | R$ 0 | R$ 0 | R$ 0 | R$ 66.000 | R$ 66.000 |
| M2 | R$ 66.000 | R$ 2.850 | R$ 0 | R$ 0 | R$ 68.850 | R$ 134.850 |
| M3 | R$ 66.000 | R$ 1.500 | R$ 0 | R$ 0 | R$ 67.500 | R$ 202.350 |
| M4 | R$ 66.000 | R$ 0 | R$ 0 | R$ 0 | R$ 66.000 | R$ 268.350 |
| M5 | R$ 66.000 | R$ 0 | R$ 0 | R$ 0 | R$ 66.000 | R$ 334.350 |
| M6 | R$ 66.000 | R$ 0 | R$ 20.000 | R$ 50.000 | R$ 136.000 | R$ 470.350 |
| **TOTAL** | **R$ 396.000** | **R$ 4.350** | **R$ 20.000** | **R$ 50.000** | **R$ 470.350** | |

**Note:** Budget légèrement dépassé (+17.6%) - prévoir contingence

---

## 🚨 Risques et Mitigation

| Risque | Probabilité | Impact | Mitigation | Contingence |
|--------|-------------|--------|------------|-------------|
| **Retard shipping PCB** | Élevé (40%) | Moyen | Commander 2 semaines avant | +R$ 500 Fedex express |
| **Composant défectueux** | Moyen (25%) | Faible | Commander 20% extra | +R$ 500 |
| **Échec tests IEC** | Moyen (30%) | Élevé | Double vérification design | +1 mois, +R$ 20k |
| **Problème véhicule réel** | Faible (15%) | Critique | Tests avec 5 véhicules | +2 semaines |
| **Départ membre équipe** | Faible (10%) | Élevé | Documentation continue | Recrutement +R$ 30k |

---

## ✅ Critères de Succès

### Techniques
- [ ] PWM 1kHz ±1% validé
- [ ] États A/B/C/D détectés correctement
- [ ] Tests IEC 61851-1 passés (22/22)
- [ ] Tests sécurité OK (isolation >5MΩ)
- [ ] 3+ véhicules réels chargent sans erreur
- [ ] Test endurance 168h sans défaillance

### Budget et Planning
- [ ] Budget ≤ R$ 500.000 (marge 25%)
- [ ] Délai 6 mois ±2 semaines
- [ ] Zéro accident de travail

### Documentation
- [ ] Tous documents techniques complétés
- [ ] Code firmware commenté >50%
- [ ] Dossier certification prêt

---

## 🎯 Après les 6 Mois

### Mois 7-12: Certification INMETRO

**Planning:**
- M7-8: Pré-audit INMETRO
- M9-10: Tests laboratoire accrédité
- M11: Corrections si nécessaire
- M12: Certificat délivré

**Budget:** R$ 100.000 - R$ 150.000
**Durée:** 6 mois supplémentaires

---

### Mois 13+: Production Série

**Objectifs:**
- Commande 100 PCB assemblés (JLCPCB SMT)
- Setup ligne assemblage locale
- Formation équipe production
- Début installation bornes

**Budget:** R$ 200.000 (100 PCB + assemblage)

---

## 📞 Réunions et Communication

### Réunions Hebdomadaires

**Stand-up quotidien:**
- Durée: 15 min
- Horaire: 9h00
- Format: Chacun répond:
  - Ce que j'ai fait hier
  - Ce que je fais aujourd'hui
  - Mes blocages

**Réunion hebdomadaire:**
- Durée: 1h
- Horaire: Vendredi 14h
- Agenda:
  - Revue avancement vs planning
  - Revue budget dépensé
  - Identification blocages
  - Planning semaine suivante

---

### Rapports Mensuels

**Format rapport:**
```markdown
# Rapport Mois [X] - Projet Eletroposto

## Résumé Exécutif
[2-3 lignes]

## Accomplissements
- Item 1
- Item 2

## Jalons Atteints
- [ ] Jalon 1
- [x] Jalon 2

## Problèmes Rencontrés
- Problème 1: [description]
  - Solution: [action]

## Budget
- Prévu: R$ XX.XXX
- Réel: R$ XX.XXX
- Écart: [%]

## Planning
- Avancement: [%]
- Retard/Avance: [jours]

## Prochaines Étapes
1. Étape 1
2. Étape 2
```

---

## 📊 Indicateurs de Performance (KPI)

| KPI | Objectif | Mesure | Fréquence |
|-----|----------|--------|-----------|
| **Respect planning** | ±5% | Jours d'écart | Hebdo |
| **Respect budget** | ±10% | Écart budget | Mensuel |
| **Tests passés** | 100% | % tests OK | Par phase |
| **Bugs ouverts** | <5 | Nombre bugs | Hebdo |
| **Documentation** | 100% | % docs complétés | Mensuel |

---

## 🎓 Formation Équipe

### Formations Requises

| Formation | Durée | Coût | Participants | Timing |
|-----------|-------|------|--------------|--------|
| **KiCad Avancé** | 2j | R$ 1.500 | Ing. Senior | Avant M1 |
| **STM32 Firmware** | 3j | R$ 2.000 | Dev Firmware | Avant M1 |
| **IEC 61851-1** | 1j | R$ 800 | Tous | Semaine 1 |
| **Soudure SMD** | 2j | R$ 600 | Technicien | Avant M3 |
| **Tests électroniques** | 2j | R$ 1.200 | Ing. Tests | Avant M4 |

**Total formations:** R$ 6.100

---

## ✅ Checklist Clôture Projet

### Livrables Techniques
- [ ] PCB finalisé et validé (Gerbers + sources KiCad)
- [ ] Firmware version 1.0 (code source + binaire)
- [ ] BOM production avec MPN
- [ ] Rapports tests complets (IEC + sécurité + performance)
- [ ] 5 prototypes fonctionnels livrés

### Documentation
- [ ] Manuel Técnico Eletroposto (PDF)
- [ ] Manual do Usuário (PDF)
- [ ] Guia de Instalação (PDF)
- [ ] Procedimentos de Teste (PDF)
- [ ] Código firmware documentado (Doxygen)
- [ ] Dossier certification INMETRO prêt

### Administratif
- [ ] Rapport final projet
- [ ] Revue post-mortem équipe
- [ ] Archivage tous documents
- [ ] Présentation stakeholders
- [ ] Budget final réconcilié

---

**Document créé par:** Équipe Gestion Eletroposto
**Version:** 1.0
**Date:** 2025-01-08
**Licence:** MIT

🚀 **Bon projet!**
