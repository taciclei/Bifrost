#!/bin/bash
# Script d'automation génération fichiers fabrication
# Projet: Eletroposto - Borne de Recharge EV
# Version: 1.0
# Date: 2025-01-08

set -e  # Arrêt si erreur

# Configuration
PROJECT_NAME="eletroposto_charger"
VERSION="v1.0"
DATE=$(date +%Y%m%d)

# Couleurs pour output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Fonctions helper
print_header() {
    echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo -e "${BLUE}  $1${NC}"
    echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
}

print_success() {
    echo -e "${GREEN}✅ $1${NC}"
}

print_error() {
    echo -e "${RED}❌ ERREUR: $1${NC}"
}

print_warning() {
    echo -e "${YELLOW}⚠️  $1${NC}"
}

print_info() {
    echo -e "${BLUE}ℹ️  $1${NC}"
}

# Vérification KiCad CLI installé
check_kicad() {
    if ! command -v kicad-cli &> /dev/null; then
        print_error "KiCad CLI non trouvé!"
        print_info "Installation:"
        print_info "  Ubuntu: sudo apt install kicad"
        print_info "  macOS:  brew install --cask kicad"
        print_info "  Windows: https://www.kicad.org/download/"
        exit 1
    fi

    KICAD_VERSION=$(kicad-cli --version | head -n1)
    print_success "KiCad trouvé: $KICAD_VERSION"
}

# Vérification fichiers projet
check_project_files() {
    if [ ! -f "${PROJECT_NAME}.kicad_pro" ]; then
        print_error "Fichier projet ${PROJECT_NAME}.kicad_pro non trouvé!"
        print_info "Assurez-vous d'être dans le dossier du projet KiCad"
        exit 1
    fi

    if [ ! -f "${PROJECT_NAME}.kicad_sch" ]; then
        print_warning "Fichier schéma ${PROJECT_NAME}.kicad_sch non trouvé"
    else
        print_success "Fichier schéma trouvé"
    fi

    if [ ! -f "${PROJECT_NAME}.kicad_pcb" ]; then
        print_warning "Fichier PCB ${PROJECT_NAME}.kicad_pcb non trouvé"
    else
        print_success "Fichier PCB trouvé"
    fi
}

# Création structure dossiers
create_directories() {
    print_header "Création structure dossiers"

    mkdir -p fabrication/{gerber,drill,bom,assembly,documentation,archives}

    print_success "Dossiers créés:"
    tree -L 2 fabrication/ 2>/dev/null || ls -R fabrication/
}

# Export Gerber files
export_gerbers() {
    print_header "Export Gerber Files"

    if [ ! -f "${PROJECT_NAME}.kicad_pcb" ]; then
        print_warning "Pas de fichier PCB, skip export Gerber"
        return
    fi

    print_info "Export des layers Gerber..."

    kicad-cli pcb export gerbers \
        --output fabrication/gerber/ \
        --layers F.Cu,B.Cu,In1.Cu,In2.Cu,F.Paste,B.Paste,F.Silkscreen,B.Silkscreen,F.Mask,B.Mask,Edge.Cuts \
        --no-x2 \
        --no-netlist \
        --subtract-soldermask \
        "${PROJECT_NAME}.kicad_pcb"

    GERBER_COUNT=$(ls fabrication/gerber/*.gbr 2>/dev/null | wc -l)
    print_success "Gerbers exportés: ${GERBER_COUNT} fichiers"

    # Liste des fichiers
    print_info "Fichiers générés:"
    ls -lh fabrication/gerber/
}

# Export Drill files
export_drill() {
    print_header "Export Drill Files"

    if [ ! -f "${PROJECT_NAME}.kicad_pcb" ]; then
        print_warning "Pas de fichier PCB, skip export Drill"
        return
    fi

    print_info "Export fichiers perçage..."

    kicad-cli pcb export drill \
        --output fabrication/drill/ \
        --format excellon \
        --excellon-zeros-format decimal \
        --excellon-units mm \
        --excellon-separate-th \
        "${PROJECT_NAME}.kicad_pcb"

    DRILL_COUNT=$(ls fabrication/drill/*.drl 2>/dev/null | wc -l)
    print_success "Drill files exportés: ${DRILL_COUNT} fichiers"

    ls -lh fabrication/drill/
}

# Export BOM (Bill of Materials)
export_bom() {
    print_header "Export BOM (Bill of Materials)"

    if [ ! -f "${PROJECT_NAME}.kicad_sch" ]; then
        print_warning "Pas de fichier schéma, skip export BOM"
        return
    fi

    print_info "Export BOM CSV..."

    kicad-cli sch export bom \
        --output "fabrication/bom/${PROJECT_NAME}_bom_${DATE}.csv" \
        --fields "Reference,Value,Footprint,Quantity,Manufacturer,MPN" \
        --labels "Référence,Valeur,Empreinte,Quantité,Fabricant,Numéro de pièce" \
        --group-by value \
        --sort-field Reference \
        "${PROJECT_NAME}.kicad_sch"

    print_success "BOM exporté: fabrication/bom/${PROJECT_NAME}_bom_${DATE}.csv"

    # Afficher aperçu
    print_info "Aperçu BOM (10 premières lignes):"
    head -n 10 "fabrication/bom/${PROJECT_NAME}_bom_${DATE}.csv"
}

# Export Position files (Pick & Place)
export_positions() {
    print_header "Export Position Files (Pick & Place)"

    if [ ! -f "${PROJECT_NAME}.kicad_pcb" ]; then
        print_warning "Pas de fichier PCB, skip export Positions"
        return
    fi

    print_info "Export fichiers de positionnement..."

    kicad-cli pcb export pos \
        --output "fabrication/assembly/${PROJECT_NAME}_positions_${DATE}.csv" \
        --format csv \
        --units mm \
        --side both \
        --use-drill-file-origin \
        "${PROJECT_NAME}.kicad_pcb"

    print_success "Position file exporté: fabrication/assembly/${PROJECT_NAME}_positions_${DATE}.csv"

    # Compter composants
    COMPONENT_COUNT=$(tail -n +2 "fabrication/assembly/${PROJECT_NAME}_positions_${DATE}.csv" | wc -l)
    print_info "Nombre de composants: ${COMPONENT_COUNT}"
}

# Export PDF Schematic
export_schematic_pdf() {
    print_header "Export PDF Schéma"

    if [ ! -f "${PROJECT_NAME}.kicad_sch" ]; then
        print_warning "Pas de fichier schéma, skip export PDF"
        return
    fi

    print_info "Export schéma en PDF..."

    kicad-cli sch export pdf \
        --output "fabrication/documentation/${PROJECT_NAME}_schematic_${VERSION}_${DATE}.pdf" \
        --no-background-color \
        "${PROJECT_NAME}.kicad_sch"

    PDF_SIZE=$(du -h "fabrication/documentation/${PROJECT_NAME}_schematic_${VERSION}_${DATE}.pdf" | cut -f1)
    print_success "PDF schéma exporté: ${PDF_SIZE}"
}

# Export 3D STEP model
export_step() {
    print_header "Export Modèle 3D STEP"

    if [ ! -f "${PROJECT_NAME}.kicad_pcb" ]; then
        print_warning "Pas de fichier PCB, skip export STEP"
        return
    fi

    print_info "Export modèle 3D STEP..."

    kicad-cli pcb export step \
        --output "fabrication/documentation/${PROJECT_NAME}_3d_${VERSION}.step" \
        --subst-models \
        "${PROJECT_NAME}.kicad_pcb"

    STEP_SIZE=$(du -h "fabrication/documentation/${PROJECT_NAME}_3d_${VERSION}.step" | cut -f1)
    print_success "STEP exporté: ${STEP_SIZE}"
}

# Création archives ZIP pour fabricants
create_archives() {
    print_header "Création Archives ZIP"

    # Archive Gerber + Drill (pour fabricant PCB)
    if [ -d "fabrication/gerber" ] && [ "$(ls -A fabrication/gerber)" ]; then
        print_info "Création archive Gerber..."

        cd fabrication/gerber
        zip -q -r "../archives/${PROJECT_NAME}_${VERSION}_gerber_${DATE}.zip" ./*.gbr
        cd ../drill
        zip -q -r "../archives/${PROJECT_NAME}_${VERSION}_drill_${DATE}.zip" ./*.drl
        cd ../..

        # ZIP combiné Gerber + Drill (format JLCPCB)
        cd fabrication
        zip -q -r "archives/${PROJECT_NAME}_${VERSION}_fabrication_${DATE}.zip" gerber/*.gbr drill/*.drl
        cd ..

        ZIP_SIZE=$(du -h "fabrication/archives/${PROJECT_NAME}_${VERSION}_fabrication_${DATE}.zip" | cut -f1)
        print_success "Archive fabrication créée: ${ZIP_SIZE}"
    fi

    # Archive BOM + Positions (pour assemblage)
    if [ -d "fabrication/bom" ] && [ -d "fabrication/assembly" ]; then
        print_info "Création archive assemblage..."

        cd fabrication
        zip -q -r "archives/${PROJECT_NAME}_${VERSION}_assembly_${DATE}.zip" \
            bom/*.csv \
            assembly/*.csv
        cd ..

        print_success "Archive assemblage créée"
    fi

    # Archive complète
    print_info "Création archive complète..."
    zip -q -r "fabrication/archives/${PROJECT_NAME}_${VERSION}_complete_${DATE}.zip" \
        fabrication/gerber \
        fabrication/drill \
        fabrication/bom \
        fabrication/assembly \
        fabrication/documentation

    COMPLETE_SIZE=$(du -h "fabrication/archives/${PROJECT_NAME}_${VERSION}_complete_${DATE}.zip" | cut -f1)
    print_success "Archive complète créée: ${COMPLETE_SIZE}"
}

# Génération fichier README pour fabricant
generate_readme() {
    print_header "Génération README Fabrication"

    cat > fabrication/README_FABRICANT.md << EOF
# ${PROJECT_NAME} - Fichiers de Fabrication

**Projet:** Eletroposto - Borne de Recharge Véhicules Électriques
**Version:** ${VERSION}
**Date génération:** ${DATE}
**Société:** Eletroposto Belém, Pará, Brasil

---

## 📋 Contenu du Package

### Gerber Files (\`gerber/\`)
Fichiers pour fabrication PCB:
- \`*.F.Cu.gbr\` - Couche cuivre supérieure
- \`*.B.Cu.gbr\` - Couche cuivre inférieure
- \`*.In1.Cu.gbr\` - Couche interne 1 (si 4-layer)
- \`*.In2.Cu.gbr\` - Couche interne 2 (si 4-layer)
- \`*.F.Paste.gbr\` - Pâte à braser face supérieure
- \`*.B.Paste.gbr\` - Pâte à braser face inférieure
- \`*.F.Silkscreen.gbr\` - Sérigraphie supérieure
- \`*.B.Silkscreen.gbr\` - Sérigraphie inférieure
- \`*.F.Mask.gbr\` - Vernis épargne supérieur
- \`*.B.Mask.gbr\` - Vernis épargne inférieur
- \`*.Edge.Cuts.gbr\` - Contour PCB

### Drill Files (\`drill/\`)
Fichiers de perçage:
- \`*.drl\` - Fichiers Excellon (trous métallisés + non-métallisés)

### BOM (\`bom/\`)
Bill of Materials (liste composants):
- Format: CSV
- Colonnes: Référence, Valeur, Empreinte, Quantité, Fabricant, MPN

### Assembly (\`assembly/\`)
Fichiers Pick & Place pour assemblage automatique:
- Format: CSV
- Coordonnées XY, rotation, face (top/bottom)

### Documentation (\`documentation/\`)
- Schéma PDF
- Modèle 3D STEP

---

## ⚙️ Spécifications PCB

### Paramètres Recommandés

| Paramètre | Valeur |
|-----------|--------|
| **Nombre de couches** | 4 layers |
| **Épaisseur PCB** | 1.6mm |
| **Épaisseur cuivre** | 35µm (1oz) outer, 17.5µm (0.5oz) inner |
| **Finition surface** | HASL lead-free (ou ENIG si budget) |
| **Couleur vernis épargne** | Vert |
| **Couleur sérigraphie** | Blanc |
| **Largeur piste minimale** | 0.2mm (signal), 1.0mm+ (power) |
| **Clearance minimale** | 0.2mm |
| **Diamètre via** | 0.6mm drill / 1.0mm pad |
| **Dimensions PCB** | Voir fichier Edge.Cuts |

### Stack-up 4 Layers (si applicable)
\`\`\`
Layer 1 (F.Cu)     : Signaux + composants top
Layer 2 (In1.Cu)   : GND plane
Layer 3 (In2.Cu)   : Power planes (+12V, +5V, +3.3V)
Layer 4 (B.Cu)     : Signaux + composants bottom
\`\`\`

---

## 📦 Quantité Commande

**Quantité prototype:** 5 PCB
**Quantité production:** 100 PCB (selon budget)

---

## 🏭 Fabricants Recommandés

### JLCPCB (Chine) - Économique
- Site: https://jlcpcb.com/
- Prix 5 PCB (10x10cm, 4L): ~$20 USD
- Délai: 2 jours fabrication + 15-25 jours shipping
- Assemblage SMT disponible

### PCBWay (Chine) - Qualité
- Site: https://www.pcbway.com/
- Prix similaire JLCPCB
- Support client excellent
- Prototypes couleurs custom

### Eurocircuits (Europe) - Premium
- Site: https://www.eurocircuits.com/
- Plus cher mais qualité garantie
- Délai rapide Europe

---

## 📝 Instructions Upload JLCPCB

1. Aller sur https://jlcpcb.com/quote
2. Cliquer "Add gerber file"
3. Upload: \`${PROJECT_NAME}_${VERSION}_fabrication_${DATE}.zip\`
4. Vérifier paramètres:
   - Layers: **4**
   - PCB Thickness: **1.6**
   - Surface Finish: **HASL lead-free**
   - Confirm production file: **Oui**
5. Si assemblage SMT:
   - Activer "SMT Assembly"
   - Upload BOM: \`fabrication/bom/*.csv\`
   - Upload CPL: \`fabrication/assembly/*_positions*.csv\`
6. Payer et commander

---

## ✅ Checklist Avant Commande

- [ ] Vérifier aperçu Gerber sur site fabricant
- [ ] Confirmer nombre de couches (2 ou 4)
- [ ] Vérifier dimensions PCB correctes
- [ ] Confirmer finition surface
- [ ] Si assemblage: vérifier BOM et positions
- [ ] Vérifier adresse livraison Brésil
- [ ] Calculer coûts import/taxes (~60% valeur)

---

## 📞 Contact

**Projet:** Eletroposto
**Email:** technique@eletroposto.com.br
**Localisation:** Belém, Pará, Brasil

---

*Fichiers générés automatiquement avec KiCad CLI v9.0+*
*Script: generate_fabrication.sh*
EOF

    print_success "README fabricant créé: fabrication/README_FABRICANT.md"
}

# Rapport final
generate_report() {
    print_header "Rapport de Génération"

    echo ""
    echo "📊 RÉSUMÉ:"
    echo ""

    # Compter fichiers
    GERBER_FILES=$(find fabrication/gerber -name "*.gbr" 2>/dev/null | wc -l)
    DRILL_FILES=$(find fabrication/drill -name "*.drl" 2>/dev/null | wc -l)
    BOM_FILES=$(find fabrication/bom -name "*.csv" 2>/dev/null | wc -l)
    POS_FILES=$(find fabrication/assembly -name "*.csv" 2>/dev/null | wc -l)
    DOC_FILES=$(find fabrication/documentation -type f 2>/dev/null | wc -l)
    ZIP_FILES=$(find fabrication/archives -name "*.zip" 2>/dev/null | wc -l)

    echo "  Gerber files:      ${GERBER_FILES}"
    echo "  Drill files:       ${DRILL_FILES}"
    echo "  BOM files:         ${BOM_FILES}"
    echo "  Position files:    ${POS_FILES}"
    echo "  Documentation:     ${DOC_FILES}"
    echo "  Archives ZIP:      ${ZIP_FILES}"
    echo ""

    # Taille totale
    TOTAL_SIZE=$(du -sh fabrication/ | cut -f1)
    echo "  Taille totale:     ${TOTAL_SIZE}"
    echo ""

    print_success "Génération complète!"
    echo ""
    print_info "📤 Prochaines étapes:"
    echo "  1. Vérifier fichiers dans: fabrication/"
    echo "  2. Upload sur JLCPCB: fabrication/archives/*_fabrication_*.zip"
    echo "  3. Lire: fabrication/README_FABRICANT.md"
    echo ""
}

# ═══════════════════════════════════════════════════════════
# MAIN EXECUTION
# ═══════════════════════════════════════════════════════════

main() {
    clear

    print_header "ELETROPOSTO - Génération Fichiers Fabrication"
    echo "Projet: ${PROJECT_NAME}"
    echo "Version: ${VERSION}"
    echo "Date: ${DATE}"
    echo ""

    # Vérifications
    check_kicad
    check_project_files
    echo ""

    # Génération
    create_directories
    export_gerbers
    export_drill
    export_bom
    export_positions
    export_schematic_pdf
    export_step
    create_archives
    generate_readme

    # Rapport
    generate_report
}

# Exécution
main "$@"
