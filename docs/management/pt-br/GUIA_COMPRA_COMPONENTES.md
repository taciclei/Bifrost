# Guia de Compra Componentes - Projeto Eletroposto

## 📋 Sumário

1. [Fornecedores Recomendados](#fornecedores)
2. [Lista Compras Protótipo](#prototipo)
3. [Lista Compras Produção](#producao)
4. [Ferramentas e Equipamento](#ferramentas)
5. [Comparação Preços](#comparacao)
6. [Importação China - Guia](#importacao)

---

## 🏪 Fornecedores Recomendados {#fornecedores}

### Brasil (Entrega Rápida)

| Fornecedor | Especialidade | Prazo | Frete | Site |
|------------|---------------|-------|-------|------|
| **DigiKey BR** | Tudo, qualidade pro | 3-7 dias | R$ 30-80 | https://www.digikey.com.br/ |
| **Mouser BR** | Tudo, qualidade pro | 3-7 dias | R$ 30-80 | https://br.mouser.com/ |
| **Usinainfo** | Hobby, dev boards | 5-10 dias | Varia | https://www.usinainfo.com.br/ |
| **Baudaeletronica** | Componentes gerais | 5-12 dias | R$ 15-40 | https://www.baudaeletronica.com.br/ |
| **Multcomercial** | Eletrônica geral | 7-15 dias | R$ 20-50 | https://www.multcomercial.com.br/ |

---

### Internacional (Melhor Preço)

| Fornecedor | Especialidade | Prazo | Frete | Site |
|------------|---------------|-------|-------|------|
| **LCSC** ⭐ | Tudo, preços imbatíveis | 15-25 dias | $15-30 | https://lcsc.com/ |
| **Alibaba** | Grandes volumes | 20-35 dias | Varia | https://www.alibaba.com/ |
| **AliExpress** | Pequenos volumes | 20-45 dias | Grátis | https://www.aliexpress.com/ |
| **JLCPCB Parts** | Montagem PCB | Com PCB | Incluso | https://jlcpcb.com/ |
| **Digi-Key US** | Tudo, muito rápido | 7-10 dias | $25-50 | https://www.digikey.com/ |
| **Mouser US** | Tudo, muito rápido | 7-10 dias | $25-50 | https://www.mouser.com/ |

---

### Comparação Preços (Exemplo Resistor 1kΩ 0805)

| Fornecedor | Preço Unitário | Qtd Min | Frete | Total 100 pcs |
|------------|----------------|---------|-------|---------------|
| **DigiKey BR** | R$ 0.15 | 1 | R$ 40 | R$ 55 |
| **Usinainfo** | R$ 0.10 | 10 | R$ 20 | R$ 30 |
| **LCSC** | $0.001 (~R$ 0.005) | 1 | $20 (~R$ 100) | **R$ 100.50** ⭐ |
| **AliExpress** | $0.01 (~R$ 0.05) | 100 | Grátis | R$ 5 ⭐⭐ |

**Veredicto:**
- Prototipagem (pequenas qtd): DigiKey BR
- Produção (>100): LCSC ou AliExpress

---

## 🛒 Lista Compras Protótipo (1 PCB) {#prototipo}

### Kit Aprender Soldagem

**Para treinar ANTES do projeto real:**

| Item | Qtd | Preço Unit | Total | Fornecedor |
|------|-----|-----------|-------|------------|
| Kit soldagem iniciante | 1 | R$ 40 | R$ 40 | Mercado Livre |
| PCB teste SMD | 1 | R$ 30 | R$ 30 | AliExpress |
| Resistores 0805 mix | 1 kit | R$ 50 | R$ 50 | DigiKey BR |
| LEDs 0805 coloridos | 1 kit | R$ 40 | R$ 40 | Usinainfo |
| **Subtotal aprendizagem** | | | **R$ 160** | |

---

### Componentes Circuito Pilot Signal (1 Protótipo)

#### Microcontrolador e Lógica

| Referência | Descrição | Qtd | Preço Unit | Total | Fornecedor | Part Number |
|-----------|-----------|-----|-----------|-------|------------|-------------|
| **U1** | STM32F407VGT6 LQFP-100 | 1 | R$ 85 | R$ 85 | DigiKey BR | STM32F407VGT6 |
| **U2** | MCP2515 CAN Controller | 1 | R$ 18 | R$ 18 | Mouser BR | MCP2515-I/SO |
| **U3** | TJA1050 CAN Transceiver | 1 | R$ 12 | R$ 12 | DigiKey BR | TJA1050T/CM |
| **U4** | LM2596 Buck 5V 3A | 1 | R$ 8 | R$ 8 | Usinainfo | LM2596S-5.0 |
| **U5** | AMS1117-3.3 LDO | 1 | R$ 3 | R$ 3 | Baudaeletronica | AMS1117-3.3 |

---

#### Transistores e Diodos

| Referência | Descrição | Qtd | Preço Unit | Total | MPN |
|-----------|-----------|-----|-----------|-------|-----|
| **Q1** | MOSFET N 2N7000 TO-92 | 2 | R$ 1.50 | R$ 3 | 2N7000 |
| **Q2** | MOSFET N IRF540N TO-220 | 1 | R$ 5 | R$ 5 | IRF540N |
| **Q3** | Transistor NPN BC547 | 3 | R$ 0.30 | R$ 0.90 | BC547B |
| **D1** | Diodo Zener 15V 1W | 2 | R$ 0.80 | R$ 1.60 | 1N4744A |
| **D2** | Diodo Schottky 1N5819 | 3 | R$ 0.50 | R$ 1.50 | 1N5819 |
| **D3-D5** | LED 0805 (R, G, B) | 3 | R$ 0.20 | R$ 0.60 | Genérico |

---

#### Resistores 0805 (5%)

| Valor | Qtd | Preço Unit | Total | Uso |
|-------|-----|-----------|-------|-----|
| 1kΩ | 10 | R$ 0.10 | R$ 1 | Sinal Pilot |
| 2.2kΩ | 5 | R$ 0.10 | R$ 0.50 | Pull-up |
| 330Ω | 5 | R$ 0.10 | R$ 0.50 | LED |
| 10kΩ | 10 | R$ 0.10 | R$ 1 | Diversos |
| 100Ω | 5 | R$ 0.10 | R$ 0.50 | Current sense |
| 47Ω | 5 | R$ 0.10 | R$ 0.50 | Série |

**Subtotal resistores:** R$ 4.00

---

#### Capacitores

| Referência | Descrição | Qtd | Preço Unit | Total |
|-----------|-----------|-----|-----------|-------|
| **C1-C5** | 100nF 0805 50V X7R | 10 | R$ 0.15 | R$ 1.50 |
| **C6-C8** | 10µF 0805 16V X5R | 5 | R$ 0.30 | R$ 1.50 |
| **C9** | 100µF eletrolítico 25V | 2 | R$ 0.50 | R$ 1.00 |
| **C10** | 1µF 0805 50V | 3 | R$ 0.20 | R$ 0.60 |
| **C11** | 22pF 0805 NP0 | 4 | R$ 0.15 | R$ 0.60 |

**Subtotal capacitores:** R$ 5.20

---

#### Osciladores e Timing

| Referência | Descrição | Qtd | Preço Unit | Total |
|-----------|-----------|-----|-----------|-------|
| **Y1** | Crystal 8MHz HC-49S | 1 | R$ 2.50 | R$ 2.50 |
| **Y2** | Crystal 16MHz HC-49S | 1 | R$ 2.80 | R$ 2.80 |

---

#### Conectores

| Referência | Descrição | Qtd | Preço Unit | Total | MPN |
|-----------|-----------|-----|-----------|-------|-----|
| **J1** | USB Mini-B | 1 | R$ 3.50 | R$ 3.50 | Genérico |
| **J2** | Header 2x5 pinos (SWD) | 1 | R$ 1.20 | R$ 1.20 | PinHeader |
| **J3** | Terminal block 2pos | 2 | R$ 2.00 | R$ 4.00 | Würth |
| **J4** | Pin header 1x6 | 2 | R$ 0.50 | R$ 1.00 | Genérico |

**Subtotal conectores:** R$ 9.70

---

#### Diversos

| Item | Qtd | Preço Unit | Total |
|------|-----|-----------|-------|
| Fusível 5x20mm 2A | 5 | R$ 0.80 | R$ 4.00 |
| Holder fusível PCB | 2 | R$ 1.50 | R$ 3.00 |
| Jumpers 2.54mm | 10 | R$ 0.30 | R$ 3.00 |

---

### 📊 Recapitulação Protótipo (1 PCB)

| Categoria | Custo |
|-----------|-------|
| Microcontroladores e CIs | R$ 126.00 |
| Transistores e Diodos | R$ 12.60 |
| Resistores | R$ 4.00 |
| Capacitores | R$ 5.20 |
| Osciladores | R$ 5.30 |
| Conectores | R$ 9.70 |
| Diversos | R$ 10.00 |
| **Subtotal componentes** | **R$ 172.80** |
| PCB (5 unidades JLCPCB) | R$ 110.00 |
| Frete | R$ 40.00 |
| **TOTAL 1 PROTÓTIPO** | **R$ 322.80** |

**Nota:** Você terá 5 PCBs mas componentes para apenas 1.

---

## 📦 Lista Compras Produção (100 Bornes) {#producao}

### Estratégia de Compra

**Recomendação:** Comprar componentes na **LCSC** (integrado JLCPCB)

**Vantagens:**
- Preços imbatíveis
- Integração montagem PCB
- Frete agrupado com PCB
- Estoque enorme (milhões referências)

---

### BOM Produção (100 Unidades)

| Categoria | Descrição | Qtd Total | Preço Unit | Total | LCSC Part # |
|-----------|-----------|-----------|-----------|-------|-------------|
| **MCU** | STM32F407VGT6 | 110 | $8.50 | $935 | C13305 |
| **CAN** | MCP2515-I/SO | 110 | $1.80 | $198 | C10664 |
| **CAN Trans** | TJA1050T | 110 | $0.85 | $93.50 | C7820 |
| **Buck 5V** | LM2596S-5.0 | 110 | $0.60 | $66 | C12310 |
| **LDO 3.3V** | AMS1117-3.3 | 110 | $0.15 | $16.50 | C6186 |
| **MOSFET** | 2N7000 | 220 | $0.08 | $17.60 | C20760 |
| **MOSFET Power** | IRF540N | 110 | $0.45 | $49.50 | C38281 |
| **Transistor** | BC547B | 330 | $0.02 | $6.60 | C37107 |
| **Zener 15V** | 1N4744A | 220 | $0.05 | $11 | C78492 |
| **Diodo** | 1N5819 | 330 | $0.03 | $9.90 | C8598 |
| **LED 0805** | Vermelho/Verde/Azul | 330 | $0.01 | $3.30 | C2286 |
| **Resistores 0805** | Mix valores | 5000 | $0.001 | $5 | Diversos |
| **Capacitores 0805** | Mix valores | 3000 | $0.005 | $15 | Diversos |
| **Crystal 8MHz** | HC-49S | 110 | $0.15 | $16.50 | C7982 |
| **Conectores** | Diversos | 550 | $0.30 | $165 | Diversos |

**Subtotal componentes (100 bornes):** $1.608,40 (~**R$ 8.042**)

**Margem segurança 10%:** R$ 804

**TOTAL componentes:** **R$ 8.846**

---

### Com Montagem JLCPCB

| Serviço | Qtd | Preço | Total |
|---------|-----|-------|-------|
| **PCB 4-camadas** | 100 | $8/pc | $800 |
| **Montagem SMT** | 100 | $15/pc | $1.500 |
| **Componentes** | - | - | $1.608 |
| **Frete** | 1 | $150 | $150 |
| **TOTAL USD** | | | **$4.058** |
| **TOTAL BRL** (x5.0) | | | **R$ 20.290** |

**vs Componentes apenas + montagem local:** R$ 8.846 + R$ 12.000 = R$ 20.846

**Veredicto:** Montagem JLCPCB = preço similar + ganho de tempo!

---

## 🛠️ Ferramentas e Equipamento {#ferramentas}

### Estação Soldagem (Essencial)

| Item | Spec | Preço | Fornecedor | Link |
|------|------|-------|------------|------|
| **Estação Yaxun 878D** | 60W, ar quente | R$ 350 | Mercado Livre | Buscar "Yaxun 878D" |
| **Hakko FX-888D** | 70W, precisão | R$ 650 | Importado | eBay/Amazon |
| **Pontas reposição** | Set 5 tipos | R$ 60 | Mercado Livre | - |
| **Solda Sn63/Pb37** | 0.6mm, fluxo | R$ 40/100g | Usinainfo | - |
| **Fluxo no-clean** | Caneta 10ml | R$ 30 | Baudaeletronica | - |

**Subtotal soldagem:** R$ 1.130

---

### Ferramentas Manuais

| Ferramenta | Preço | Fornecedor |
|-----------|-------|------------|
| Pinça tweezers ESD | R$ 40 | Mercado Livre |
| Alicate de corte flush | R$ 35 | Mercado Livre |
| Pinça bico curvo | R$ 30 | Mercado Livre |
| Chaves precisão set | R$ 45 | Usinainfo |
| Lupa iluminada LED | R$ 120 | Mercado Livre |
| Tapete antiestático | R$ 60 | Mercado Livre |
| Pulseira ESD | R$ 20 | Baudaeletronica |

**Subtotal ferramentas:** R$ 350

---

### Equipamento Teste (Crítico)

| Equipamento | Spec | Preço | Fornecedor | Recomendação |
|------------|------|-------|------------|--------------|
| **Multímetro** | Brymen BM235 | R$ 350 | Mercado Livre | Budget |
| **Multímetro Pro** | Fluke 87V | R$ 2.200 | Importado | Pro ⭐ |
| **Osciloscópio** | Rigol DS1054Z | R$ 2.800 | Mercado Livre | ⭐⭐⭐ |
| **Osciloscópio Budget** | Hantek DSO2D10 | R$ 1.200 | AliExpress | Budget OK |
| **Fonte DC** | 30V 10A ajustável | R$ 450 | Mercado Livre | Essencial |
| **Ferro solda portátil** | TS100 | R$ 250 | AliExpress | Backup |

**Subtotal teste (mínimo):** R$ 4.600

**Subtotal teste (recomendado pro):** R$ 5.700

---

### Opcional mas Útil

| Item | Preço | Uso |
|------|-------|-----|
| Microscópio USB | R$ 200 | Inspeção fina SMD |
| Estação ar quente isolada | R$ 400 | Dessoldagem QFN |
| Forno reflow T962A | R$ 1.800 | Produção série |
| Câmera térmica | R$ 1.200 | Debug superaquecimento |
| Analisador lógico | R$ 350 | Debug SPI/I2C |

---

## 💰 Comparação Preços Fornecedores {#comparacao}

### Exemplo: BOM Circuito Teste (LED + Resistor)

| Item | DigiKey BR | Usinainfo | LCSC | AliExpress |
|------|-----------|-----------|------|------------|
| R 330Ω 0805 (10 pcs) | R$ 2.00 | R$ 1.00 | R$ 0.50 | R$ 3.00/100 |
| LED 0805 Vermelho (5 pcs) | R$ 1.50 | R$ 1.00 | R$ 0.25 | R$ 2.00/50 |
| Frete | R$ 40 | R$ 20 | R$ 100 | Grátis |
| **TOTAL** | **R$ 43.50** | **R$ 22** | **R$ 100.75** | **R$ 5** ⭐ |

**Mas:** AliExpress = 30-45 dias vs 5-7 dias Brasil

---

### Estratégia Ótima

**Prototipagem rápida (1-5 PCB):**
```
1. PCB: JLCPCB (5 pcs, R$ 110, 3 semanas)
2. Componentes urgentes: DigiKey BR (3-5 dias, R$ 200)
3. Componentes não-críticos: LCSC (com PCB, economiza frete)
```

**Produção (50-100 PCB):**
```
1. PCB + Montagem: JLCPCB SMT (tudo incluso)
2. Componentes: LCSC (com PCB)
3. Algumas peças: DigiKey BR (backup se faltar)
```

---

## 📦 Importação China - Guia Prático {#importacao}

### Impostos e Taxas

**Importação Brasil:**
```
Valor produto:     $100
+ Frete:           $20
= Total fatura:    $120

Impostos (60%):    $72  (II 60% + ICMS + Taxa)
= Valor pagar:     $192

Em BRL (x5.0):     R$ 960
```

**Cálculo simplificado:** Valor produto × 1.92 × taxa câmbio

---

### Dicas Economizar

1. **Agrupar pedidos**
   - 1 pedido R$ 500 > 5 pedidos R$ 100
   - Frete mutualizado

2. **Componentes vs PCB montado**
   - Componentes brutos: 60% imposto
   - PCB montado: 60% imposto
   - **Melhor:** Enviar com PCB (JLCPCB)

3. **Declaração alfândega**
   - Valor real sempre
   - Não sub-declarar (risco apreensão)

4. **Fedex vs Correios**
   - Fedex: 7-10 dias, mas taxa extra R$ 100
   - Correios: 20-30 dias, mais barato
   - **Protótipo:** Correios OK
   - **Produção:** Fedex

---

### Processo Pedido LCSC + JLCPCB

**Passo a passo:**

```bash
# 1. Criar conta JLCPCB
https://jlcpcb.com/

# 2. Upload Gerbers
- Arrastar e soltar ZIP gerbers
- Configurar: 4-camadas, 1.6mm, HASL

# 3. Ativar SMT Assembly
- Clicar "SMT Assembly"
- Upload BOM CSV
- Upload CPL (posições)

# 4. Selecionar componentes
- JLCPCB sugere LCSC parts
- Confirmar estoque disponível
- Alternativa se faltar

# 5. Revisar e pagar
- Verificar preview 3D
- Confirmar BOM
- Pagar cartão/PayPal

# 6. Produção
- PCB: 2 dias
- Montagem: 3 dias
- Frete: 15-25 dias Brasil

# 7. Recebimento
- Correios/Fedex
- Pagar taxas alfândega (60%)
- Receber!
```

---

## 🎯 Orçamento Total Início Projeto

### Opção 1: Aprendizado + 1 Protótipo

| Item | Custo |
|------|-------|
| Kit aprendizado soldagem | R$ 160 |
| Estação soldagem Yaxun | R$ 350 |
| Ferramentas manuais | R$ 350 |
| Multímetro | R$ 350 |
| Osciloscópio budget | R$ 1.200 |
| Fonte DC | R$ 450 |
| **Equipamento total** | **R$ 2.860** |
| | |
| Componentes 1 protótipo | R$ 173 |
| PCB 5 unidades | R$ 110 |
| Frete | R$ 40 |
| **Protótipo total** | **R$ 323** |
| | |
| **TOTAL OPÇÃO 1** | **R$ 3.183** |

---

### Opção 2: Produção 100 Bornes

| Item | Custo |
|------|-------|
| Equipamento (como opção 1) | R$ 2.860 |
| Osciloscópio pro (Rigol) | R$ 2.800 |
| **Equipamento total** | **R$ 5.660** |
| | |
| PCB 100 unidades (JLCPCB) | R$ 20.000 |
| Montagem SMT incluída | Incluso |
| Componentes | R$ 8.000 |
| Frete | R$ 750 |
| Impostos importação (60%) | R$ 17.250 |
| **Produção total** | **R$ 46.000** |
| | |
| Certificação INMETRO | R$ 100.000 |
| Testes laboratório | R$ 20.000 |
| **Certificação total** | **R$ 120.000** |
| | |
| **TOTAL OPÇÃO 2** | **R$ 171.660** |

**vs Compra 100 bornes comerciais:** R$ 3.500.000

**Economia:** R$ 3.328.340 (95%!) 🎉

---

## 📞 Contatos Fornecedores

### Brasil

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
- Suporte: service@lcsc.com
- Chat 24/7

**JLCPCB**
- Site: https://jlcpcb.com/
- Suporte: support@jlcpcb.com
- Chat 24/7

---

## ✅ Checklist Antes do Pedido

### Prototipagem
- [ ] BOM verificada (todos valores corretos)
- [ ] Estoque verificado no fornecedor
- [ ] Footprints compatíveis (0805, SOIC, etc.)
- [ ] Orçamento aprovado
- [ ] Prazo aceitável (3-4 semanas OK?)

### Produção
- [ ] BOM finalizada e validada
- [ ] Testes protótipo OK
- [ ] Modificações design completas
- [ ] LCSC parts confirmados disponíveis
- [ ] Orçamento produção aprovado (R$ 170k)
- [ ] Planejamento certificação iniciado
- [ ] Equipe montagem treinada

---

**Documento criado por:** Equipe Técnica Eletroposto
**Versão:** 1.0
**Data:** 2025-01-08
**Licença:** MIT

🛒 **Boas compras!**
