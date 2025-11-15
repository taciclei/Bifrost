# Guia de Soldagem e Montagem PCB - Eletroposto

## 📋 Sumário

1. [Material Necessário](#material)
2. [Preparação](#preparacao)
3. [Soldagem Componentes SMD](#smd)
4. [Soldagem Componentes Through-Hole](#through-hole)
5. [Inspeção Visual](#inspecao)
6. [Testes Elétricos](#testes)
7. [Troubleshooting](#troubleshooting)

---

## 🛠️ Material Necessário {#material}

### Estação de Soldagem

| Equipamento | Especificações | Preço Estimado | Fornecedor |
|-------------|----------------|----------------|------------|
| **Estação de soldagem** | 60-80W, temperatura ajustável | R$ 300-800 | Mercado Livre |
| **Ferro de solda** | Ponta fina (0.5-1mm) | Incluso | - |
| **Pontas de reposição** | Kit 5 pontas (cônica, bisel) | R$ 50-100 | - |
| **Sugador de solda** | Bomba manual | R$ 30-60 | - |
| **Malha dessoldadora** | Largura 2-3mm | R$ 15-30 | - |

**Estação recomendada:**
- **Entrada:** Yaxun 878D (~R$ 300)
- **Intermediária:** Hakko FX-888D (~R$ 600)
- **Profissional:** JBC CD-2SE (~R$ 2.000)

---

### Consumíveis

| Item | Especificações | Preço | Duração |
|------|----------------|-------|---------|
| **Solda** | Sn63/Pb37, 0.6mm, com fluxo | R$ 40/100g | ~50 PCBs |
| **Pasta de fluxo** | No-clean flux pen | R$ 30 | ~100 PCBs |
| **Álcool isopropílico** | 99%, limpeza | R$ 20/L | ~200 PCBs |
| **Lenços** | Sem fiapos | R$ 15/100 | - |
| **Fita Kapton** | Fita alta temperatura | R$ 25/rolo | - |

---

### Ferramentas de Precisão

| Ferramenta | Uso | Preço |
|------------|-----|-------|
| **Pinça de precisão** | Manipulação componentes SMD | R$ 30-80 |
| **Lupa iluminada** | Inspeção (5-10x) | R$ 100-200 |
| **Multímetro** | Testes continuidade, tensão | R$ 80-300 |
| **Microscópio USB** | Inspeção fina (opcional) | R$ 150-400 |
| **Tapete antiestático** | Proteção ESD | R$ 40-100 |
| **Pulseira antiestática** | Proteção ESD | R$ 15-30 |

---

### Equipamento Avançado (Opcional)

| Equipamento | Uso | Preço |
|-------------|-----|-------|
| **Estação ar quente** | Dessoldagem/soldagem SMD | R$ 400-1.200 |
| **Forno de refusão** | Soldagem automática SMD | R$ 1.500-5.000 |
| **Pasta de solda** | Soldagem SMD no forno | R$ 80/pote |
| **Stencil PCB** | Aplicação pasta (JLCPCB) | R$ 40-100 |

---

## 🔧 Preparação {#preparacao}

### 1. Espaço de Trabalho

**Checklist:**
- [ ] Superfície limpa e bem iluminada (>1000 lux)
- [ ] Tapete antiestático conectado ao terra
- [ ] Pulseira antiestática usada
- [ ] Ventilação adequada (fumaça de solda)
- [ ] Ferro de solda pré-aquecido (350°C)
- [ ] Componentes organizados por valor

**Disposição recomendada:**
```
┌─────────────────────────────────────────┐
│  ESTAÇÃO DE SOLDAGEM                    │
│                                         │
│  [Lupa]    [Suporte PCB]    [Ferro]    │
│                                         │
│  [Componentes]  [Fluxo]  [Solda]       │
│                                         │
│  [Ferramentas]     [Multímetro]        │
│                                         │
└─────────────────────────────────────────┘
```

---

### 2. Inspeção PCB

Antes da montagem:
- [ ] Verificar visual PCB (sem riscos, trilhas cortadas)
- [ ] Testar continuidade plano GND (multímetro modo bip)
- [ ] Verificar ausência curtos-circuitos entre trilhas
- [ ] Limpar com álcool isopropílico se necessário

---

### 3. Ordem de Montagem

**Regra de ouro:** Do menor ao maior, do mais plano ao mais alto

```
1. Componentes SMD (0805, SOT-23, etc.)
   ↓
2. CIs SMD (SOIC, TSSOP, QFN)
   ↓
3. Componentes through-hole planos (resistores, diodos)
   ↓
4. Componentes through-hole médios (capacitores, CIs DIP)
   ↓
5. Componentes altos (conectores, relés, bornes)
```

---

## 🔬 Soldagem Componentes SMD {#smd}

### Técnica 1: Soldagem Manual (Ferro)

#### Resistores e Capacitores 0805

**Método:**
```
1. Aplicar fluxo nos pads
2. Estanhar UM pad com ponto de solda
3. Com pinça, posicionar componente alinhado
4. Reaquecer ponto de solda, componente se posiciona
5. Manter, retirar ferro (2-3 seg)
6. Soldar o outro lado adequadamente
7. Re-soldar primeiro lado se necessário
```

**Parâmetros:**
- Temperatura: 350°C
- Tempo contato: 2-3 segundos
- Solda: fio 0.6mm

**Vídeo tutorial:**
- "How to Solder SMD Components" - EEVblog (YouTube)

---

#### CIs SOIC/TSSOP

**Método Drag Soldering:**
```
1. Aplicar fluxo generosamente em todos os pads
2. Alinhar e manter CI com pinça ou fita
3. Soldar UM pino nos cantos opostos (fixação)
4. Verificar alinhamento, corrigir se necessário
5. Aplicar solda em todos os pinos (arrastar)
6. Limpar excesso solda com malha
7. Inspecionar com lupa (sem pontes)
```

**Dicas:**
- Fluxo = chave do sucesso
- Não economizar na quantidade de solda
- Malha dessoldadora resolve pontes

---

#### QFN/MLF (Componentes sem pinos)

**⚠️ Difícil!** Recomendado: Estação ar quente ou forno de refusão

**Método Ar Quente:**
```
1. Aplicar pasta de solda nos pads PCB
2. Posicionar componente alinhado (lupa!)
3. Ar quente 350°C, movimento circular
4. Observar refusão pasta (componente auto-alinha)
5. Retirar calor assim que pasta ficar brilhante
6. Deixar esfriar naturalmente
```

---

### Técnica 2: Pasta de Solda + Forno

**Para produção em série (>10 PCBs):**

#### Material:
- Stencil laser-cut (pedir com PCB na JLCPCB: +R$ 40)
- Pasta de solda Sn63/Pb37 (R$ 80/pote)
- Espátula
- Forno de refusão (ou forno de cozinha modificado!)

#### Processo:
```
1. Alinhar stencil no PCB
2. Aplicar pasta de solda com espátula
3. Retirar stencil delicadamente
4. Posicionar componentes SMD com pinça
5. Forno: Perfil de temperatura
   - Pré-aquecimento: 150°C, 60-90 seg
   - Pico: 220-240°C, 30-60 seg
   - Resfriamento natural
```

**Perfil temperatura:**
```
Temp (°C)
    │
240 │         ╱───╲        Pico (30-60s)
    │        ╱     ╲
180 │    ───╯       ╲      Patamar (60-90s)
    │   ╱            ╲
 25 │──╯              ╲──
    └────────────────────▶ Tempo
       2min  3min  5min
```

---

## 🔩 Soldagem Componentes Through-Hole {#through-hole}

### Técnica Padrão

**Para resistores, capacitores, diodos:**

```
1. Inserir componente nos furos PCB
2. Dobrar levemente pinos lado solda (fixação)
3. Ferro 350°C, tocar pino + pad simultaneamente (2s)
4. Aplicar solda (não no ferro, na junção!)
5. Solda deve "fluir" e formar cone
6. Retirar ferro, deixar esfriar 3 seg
7. Cortar excesso pino com alicate de corte
```

**Solda perfeita:**
```
     Componente
        │
    ────┴────  ← Cone regular, brilhante
        │
    ════════  PCB
```

**Solda ruim:**
```
  Bola         Pouco       Fria
    ●              │       ╱──╲
    │              │      │    │
  ══════       ══════   ════════
  (demais)     (contato  (opaca,
                ruim)     quebradiça)
```

---

### CIs DIP (Soquetes Recomendados)

**Por que soquete:**
- Permite substituição fácil
- Evita calor no CI
- Facilita troubleshooting

**Soldagem soquete:**
```
1. Inserir soquete (respeitar orientação entalhe)
2. Fixar com fita lado componentes
3. Virar PCB
4. Soldar 4 cantos em diagonal
5. Verificar planicidade
6. Soldar todos os pinos
7. Inserir CI no soquete (após testes!)
```

---

### Conectores e Bornes

**Conselho:** Soldar por último (altura)

```
1. Inserir conector
2. Verificar esquadro/perpendicular
3. Soldar 2 pinos opostos
4. Verificar alinhamento
5. Soldar todos os pinos
6. Trilhas largas = mais solda OK
```

---

## 🔍 Inspeção Visual {#inspecao}

### Checklist Pós-Soldagem

#### Inspeção Geral
- [ ] Todos componentes colocados (comparar BOM)
- [ ] Orientação correta (polaridade diodos, LEDs, CIs)
- [ ] Sem componentes faltando
- [ ] Sem componentes danificados

#### Inspeção Soldas SMD
- [ ] Sem pontes entre pinos CIs
- [ ] Junções brilhantes (não opacas = fria)
- [ ] Componentes bem alinhados
- [ ] Sem solda no verniz soldável

#### Inspeção Through-Hole
- [ ] Todos furos preenchidos com solda
- [ ] Cones regulares
- [ ] Sem bolas de solda isoladas
- [ ] Pinos cortados adequadamente

---

### Inspeção Lupa/Microscópio

**Pontos críticos a verificar:**

1. **CIs SMD (TSSOP, QFN):**
   - Zoom 10x mínimo
   - Cada pino conectado
   - Sem pontes invisíveis a olho nu

2. **Componentes 0805:**
   - Bem centralizados nos pads
   - Solda nos dois lados

3. **Trilhas finas:**
   - Sem cortes
   - Sem solda transbordando

---

## ⚡ Testes Elétricos {#testes}

### Teste 1: Continuidade (ANTES de Energizar)

**⚠️ CRÍTICO - NÃO PULAR**

```bash
# Multímetro em modo continuidade (bip)

1. Teste GND:
   ✓ Todos pontos GND conectados (bip)
   ✗ Sem continuidade GND ↔ VCC (silêncio!)

2. Teste VCC:
   ✓ Todos pontos VCC conectados
   ✗ Sem continuidade VCC ↔ GND

3. Teste curtos-circuitos:
   ✗ Sem bip entre pinos adjacentes CIs
```

**Se curto-circuito detectado:**
- Inspecionar com lupa
- Malha dessoldadora
- Álcool + escova
- Re-testar

---

### Teste 2: Resistência

```bash
# Multímetro em modo Ohm

1. Resistência GND ↔ VCC:
   ✓ >10kΩ (bom)
   ✗ <100Ω (curto-circuito!)

2. Resistores individuais:
   ✓ Valor ±5% (código de cores)
```

---

### Teste 3: Primeira Energização

**⚠️ COM FONTE LIMITADA EM CORRENTE**

**Setup seguro:**
```
Fonte DC         Multímetro
  (12V, 100mA)      (Ampère)
       │                │
       └────[A]─────────┤
                        │
                      [PCB]
                        │
                       GND
```

**Procedimento:**
```
1. Ajustar fonte: 12V, limite 100mA
2. Conectar amperímetro em série
3. Conectar GND
4. Conectar VCC progressivamente
5. Observar corrente:
   ✓ <50mA em repouso = OK
   ✗ >100mA = problema! Desligar imediatamente!
6. Medir tensões:
   ✓ VCC = 12V ±5%
   ✓ Rail 5V = 5V ±5% (se regulador)
   ✓ Rail 3.3V = 3.3V ±5%
```

---

### Teste 4: Funcional

**Uma vez testes básicos OK:**

#### Teste LED indicador:
```
Se LED power:
✓ Aceso
✗ Apagado → verificar R limitador, polaridade
```

#### Teste microcontrolador:
```
Programar firmware teste (LED pisca)
✓ LED pisca → MCU OK
✗ Nada → verificar oscilador, alimentação
```

#### Teste circuito Pilot:
```
Medir sinal CP:
✓ PWM 1kHz ±12V
✗ Verificar MOSFET, driver PWM
```

---

## 🔧 Troubleshooting {#troubleshooting}

### Problema 1: Curto-Circuito

**Sintomas:**
- Fonte limita corrente imediatamente
- Componentes esquentam

**Diagnóstico:**
```
1. Desligar fonte!
2. Multímetro: testar resistência GND ↔ VCC
   Se <10Ω → curto-circuito
3. Inspecionar com lupa:
   - Pontes solda CIs
   - Gotas solda perdidas
   - Trilhas se tocando
4. Limpar álcool + escova
5. Malha dessoldadora se necessário
6. Re-testar
```

---

### Problema 2: Componente Não Funciona

**Resistor:**
```
1. Dessoldar um pino
2. Medir resistência fora do circuito
3. Se >±10% valor → substituir
```

**CI:**
```
1. Verificar alimentação no pino VCC
2. Verificar GND
3. Verificar sinal clock (se aplicável)
4. Programar firmware (se MCU)
5. Se ainda morto → substituir
```

---

### Problema 3: Solda Fria

**Sintomas:**
- Junção opaca, granulada
- Fissuras
- Intermitente

**Solução:**
```
1. Fluxo na junção
2. Reaquecer ferro 350°C
3. Re-soldar adequadamente
4. Deve ficar brilhante
```

---

### Problema 4: Ponte Solda CI

**Solução malha:**
```
1. Fluxo na ponte
2. Malha sobre ponte
3. Ferro sobre malha (350°C)
4. Malha absorve solda excesso
5. Inspecionar com lupa
6. Repetir se necessário
```

---

## 📊 Tempo de Montagem Estimado

### PCB Simples (LED + Resistor)

| Etapa | Tempo | Comentário |
|-------|-------|------------|
| Preparação | 5 min | Setup estação |
| Soldagem | 5 min | 2 componentes |
| Inspeção | 5 min | Visual + testes |
| **Total** | **15 min** | Iniciante: 30 min |

---

### PCB Circuito Pilot Signal (20 componentes)

| Etapa | Tempo | Comentário |
|-------|-------|------------|
| Preparação | 10 min | Organização |
| SMD (15 comp.) | 45 min | 3 min/componente |
| Through-hole (5) | 15 min | 3 min/componente |
| Inspeção | 20 min | Lupa + testes |
| Testes elét. | 30 min | Continuidade + funcional |
| **Total** | **2h** | Iniciante: 4h |

---

### Produção 10 PCBs

**Com forno de refusão:**

| Etapa | Tempo Total | Por PCB |
|-------|-------------|---------|
| Stencil + pasta | 1h | 6 min |
| Colocação SMD | 2h | 12 min |
| Forno | 1h | 6 min |
| Through-hole | 2h | 12 min |
| Testes | 3h | 18 min |
| **Total** | **9h** | **54 min** |

**Economia:** 40% vs soldagem manual

---

## 🎓 Treinamento e Prática

### Progressão Recomendada

#### Semana 1: Básico
- [ ] Vídeos tutoriais (EEVblog, Great Scott)
- [ ] Kit soldagem iniciante (R$ 50)
- [ ] Praticar through-hole em PCB teste
- [ ] Objetivo: Soldas limpas e confiáveis

#### Semana 2: SMD
- [ ] Tutoriais soldagem SMD
- [ ] Kit SMD iniciante (0805, SOIC)
- [ ] Praticar em PCB teste
- [ ] Objetivo: Dominar 0805 + SOIC

#### Semana 3: Avançado
- [ ] TSSOP, QFN (se necessário)
- [ ] Estação ar quente
- [ ] PCBs complexos

#### Semana 4: Produção
- [ ] Montar primeiro PCB projeto
- [ ] Testar e validar
- [ ] Otimizar processo

---

## 📚 Recursos Aprendizado

### Vídeos YouTube (GRÁTIS)

1. **EEVblog - Soldering Tutorial**
   - https://www.youtube.com/watch?v=J5Sb21qbpEQ
   - Duração: 30 min
   - ⭐⭐⭐⭐⭐

2. **Great Scott - SMD Soldering**
   - https://www.youtube.com/watch?v=3NN7UGWYmBY
   - Duração: 10 min
   - ⭐⭐⭐⭐

3. **Pace - Hand Soldering Training**
   - Série profissional
   - 5 vídeos x 15 min
   - ⭐⭐⭐⭐⭐

---

### Kits Prática

| Kit | Conteúdo | Preço | Fornecedor |
|-----|----------|-------|------------|
| **Kit iniciante** | PCB + componentes through-hole | R$ 30-50 | Mercado Livre |
| **Kit SMD** | PCB + 0805 + SOIC | R$ 50-80 | AliExpress |
| **Kit completo** | Tudo incluso + estação | R$ 500+ | - |

---

## ✅ Checklist Montagem PCB

### Antes de Começar
- [ ] Estação soldagem pré-aquecida (350°C)
- [ ] Pulseira antiestática usada
- [ ] Todos componentes verificados (valores, quantidade)
- [ ] PCB inspecionado (sem defeitos)
- [ ] Espaço limpo e organizado
- [ ] Lupa/microscópio pronto

### Durante Montagem
- [ ] Respeitar ordem (SMD → through-hole)
- [ ] Verificar polaridade cada componente
- [ ] Soldar adequadamente (brilhante, sem pontes)
- [ ] Inspecionar após cada CI
- [ ] Limpar resíduos fluxo regularmente

### Após Montagem
- [ ] Inspeção visual completa (lupa)
- [ ] Teste continuidade GND
- [ ] Teste curtos-circuitos
- [ ] Teste resistência GND ↔ VCC (>10kΩ)
- [ ] Primeira energização (limitada 100mA)
- [ ] Medida tensões rails
- [ ] Testes funcionais

### Validação Final
- [ ] Todos testes passados
- [ ] Documentação montagem completada
- [ ] Fotos tiradas (referência futura)
- [ ] PCB etiquetado (versão, data)
- [ ] Pronto para integração sistema

---

**Documento criado por:** Equipe Técnica Eletroposto
**Versão:** 1.0
**Data:** 2025-01-08
**Licença:** MIT

---

## 📞 Suporte

**Problemas soldagem:**
- Fórum EEVblog: https://www.eevblog.com/forum/
- Reddit r/soldering: https://www.reddit.com/r/soldering/

**Compra material Brasil:**
- Mercado Livre
- Usinainfo.com.br
- Baudaeletronica.com.br

🔥 **Boa soldagem!**
