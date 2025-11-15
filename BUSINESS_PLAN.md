# 📊 Business Plan - Eletroposto

**Versão:** 1.0
**Data:** 11 de Janeiro de 2025
**Confidencial**

---

## 📋 Executive Summary

### Visão Geral

**Eletroposto** é uma startup brasileira focada no desenvolvimento e implantação de uma rede de estações de recarga para veículos elétricos (VE) utilizando uma abordagem DIY (Do It Yourself) que reduz custos em **86% comparado às soluções comerciais**.

### Oportunidade de Mercado

- **Mercado brasileiro de VE:** Crescimento de 41% ao ano (2023-2027)
- **Frota VE Brasil 2024:** ~100.000 veículos
- **Projeção 2027:** 500.000+ veículos elétricos
- **Infraestrutura atual:** Apenas 3.200 pontos de recarga públicos (insuficiente)
- **Déficit:** 15.000+ pontos de recarga necessários até 2027

### Proposta de Valor

| Item | Solução Comercial | Eletroposto | Economia |
|------|------------------|-------------|----------|
| **Custo por estação** | R$ 35.000 | R$ 4.987 | **86%** |
| **Tempo instalação** | 3-6 meses | 1-2 meses | **67%** |
| **Manutenção/ano** | R$ 4.000 | R$ 800 | **80%** |
| **ROI** | 5-7 anos | 2-3 anos | **60%** |

### Pedido de Financiamento

**Seed Round:** R$ 1.000.000 (US$ 200.000)

**Uso dos recursos:**
- 40% - Desenvolvimento hardware (R$ 400.000)
- 30% - Equipe técnica (R$ 300.000)
- 20% - Software e cloud (R$ 200.000)
- 10% - Marketing e operações (R$ 100.000)

**Valoração pré-money:** R$ 4.000.000 (US$ 800.000)
**Equity oferecido:** 20%

### Projeções Financeiras (5 anos)

| Ano | Estações | Receita Anual | EBITDA | Margem |
|-----|----------|---------------|--------|--------|
| **2025** | 5 | R$ 180.000 | -R$ 820.000 | - |
| **2026** | 30 | R$ 1.080.000 | -R$ 220.000 | - |
| **2027** | 100 | R$ 3.600.000 | R$ 980.000 | 27% |
| **2028** | 250 | R$ 9.000.000 | R$ 3.600.000 | 40% |
| **2029** | 500 | R$ 18.000.000 | R$ 8.100.000 | 45% |

**Break-even:** Mês 30 (120 estações)
**ROI 5 anos:** 280%

---

## 🎯 Problema

### O Desafio da Infraestrutura VE no Brasil

#### 1. Custo Proibitivo
- Estações comerciais custam R$ 25.000 - R$ 50.000
- Inviável para pequenos negócios e condomínios
- Retorno sobre investimento entre 5-7 anos

#### 2. Infraestrutura Insuficiente
- Brasil: 1 ponto de recarga para cada 31 veículos elétricos
- Europa: 1 ponto para cada 10 veículos
- EUA: 1 ponto para cada 15 veículos

#### 3. Concentração Geográfica
- 70% dos pontos em São Paulo e Rio de Janeiro
- Interior e outras capitais severamente carentes
- "Ansiedade de autonomia" limita adoção de VE

#### 4. Dependência de Importação
- 90% das estações são importadas
- Preços inflados por impostos e logística
- Falta de suporte técnico local

#### 5. Tecnologia Fechada
- Soluções proprietárias sem interoperabilidade
- Vendor lock-in
- Custos de manutenção elevados

### Tamanho do Problema

**Investimento necessário (mercado tradicional):**
- 15.000 estações × R$ 35.000 = **R$ 525.000.000**

**Com solução Eletroposto:**
- 15.000 estações × R$ 4.987 = **R$ 74.805.000** (economia de R$ 450M)

---

## 💡 Solução

### Eletroposto: Estações de Recarga VE Acessíveis

#### Abordagem DIY (Do It Yourself)

**Design Próprio:**
- Hardware open-source baseado em KiCad
- Microcontrolador STM32F407VGT6
- Componentes disponíveis no mercado brasileiro
- Documentação completa para replicação

**Fabricação Local:**
- PCBs fabricadas no Brasil ou China (JLCPCB)
- Montagem SMD profissional
- Gabinetes produzidos localmente
- Redução de custos de importação

**Software Aberto:**
- Backend Symfony 6.4 (PHP)
- Frontend React 18
- Protocolo OCPP 1.6/2.0.1
- Mobile app React Native

#### Especificações Técnicas

| Característica | Especificação |
|----------------|---------------|
| **Tipo** | Mode 3 IEC 61851-1 |
| **Potência** | 7.4 kW (monofásico 32A) |
| **Conector** | Type 2 (Mennekes) |
| **Protocolo** | OCPP 1.6J / 2.0.1 |
| **Conectividade** | 4G LTE + WiFi + Ethernet |
| **Proteções** | RCD, sobrecorrente, sobretensão |
| **Certificação** | IEC 61851-1, ABNT NBR IEC 61851-1 |
| **Display** | LCD TFT 7" touchscreen |
| **Pagamento** | RFID, QR Code, App, cartão crédito |

#### Diferencial Competitivo

**1. Custo 86% Menor**
- BOM (Bill of Materials): R$ 1.716,60/unidade
- Custo total produção: R$ 4.987/unidade
- Preço comercial: R$ 25.000 - R$ 50.000

**2. Open Source**
- Hardware: Licença MIT
- Software: Licença MIT
- Documentação completa disponível
- Comunidade pode contribuir

**3. Modular e Escalável**
- Módulos substituíveis
- Upgrades de firmware OTA
- Expansão de potência (até 22 kW)
- Integração com sistemas existentes

**4. Made in Brazil**
- 70% componentes nacionais em produção larga escala
- Suporte técnico local
- Manutenção acessível
- Sem dependência de importação

**5. Plataforma Completa**
- Backend gerenciamento
- App mobile usuários
- Dashboard operadores
- API aberta OCPP

---

## 📈 Mercado

### Tamanho do Mercado

#### Brasil - Mercado Direto (TAM)

**Veículos Elétricos:**
- 2024: 100.000 veículos
- 2027: 500.000 veículos (CAGR 41%)
- 2030: 1.500.000 veículos projetado

**Infraestrutura Necessária:**
- Ratio ideal: 1 ponto recarga / 10 veículos
- 2024: 10.000 pontos necessários (atual: 3.200) = **déficit 6.800**
- 2027: 50.000 pontos necessários = **déficit 47.000**
- 2030: 150.000 pontos necessários

**Valor do Mercado (TAM):**
- 47.000 estações × R$ 4.987 = **R$ 234.389.000** (até 2027)
- 150.000 estações × R$ 4.987 = **R$ 748.050.000** (até 2030)

#### Mercado Endereçável (SAM)

**Segmentos alvo inicial:**
1. **Condomínios residenciais** (30% do mercado)
   - 14.100 estações × R$ 4.987 = R$ 70.316.700
2. **Estacionamentos comerciais** (25% do mercado)
   - 11.750 estações × R$ 4.987 = R$ 58.597.250
3. **Postos de combustível** (20% do mercado)
   - 9.400 estações × R$ 4.987 = R$ 46.877.800

**SAM Total (2027):** R$ 175.791.750

#### Mercado Obtível (SOM)

**Meta conservadora: 1% do SAM em 3 anos**
- 470 estações × R$ 4.987 = **R$ 2.343.890**

**Meta agressiva: 5% do SAM em 5 anos**
- 2.350 estações × R$ 4.987 = **R$ 11.719.450**

### Análise da Competição

#### Principais Competidores

**1. Fabricantes Internacionais**
- **ABB, Schneider Electric, Siemens**
- Pontos fortes: Marca estabelecida, confiabilidade
- Pontos fracos: Preço elevado (R$ 35-50k), sem suporte local
- Custo: R$ 35.000 - R$ 50.000

**2. Redes Nacionais**
- **EZ.Charge, Tupinambá, Voltz**
- Pontos fortes: Rede estabelecida, presença local
- Pontos fracos: Modelo franchising caro, dependência de hardware importado
- Custo: R$ 30.000 - R$ 40.000

**3. Fabricantes Chineses**
- **EVBox, ChargePoint (fabricação China)**
- Pontos fortes: Preço competitivo
- Pontos fracos: Qualidade variável, dificuldade importação, sem certificação INMETRO
- Custo: R$ 15.000 - R$ 25.000

#### Posicionamento Competitivo

```
          Alto Custo
               ▲
               │
    ABB    Schneider  Siemens
               │
          EZ.Charge  Voltz
               │
          EVBox   ChargePoint
               │
    ┌──────────┼──────────┐
    │  ELETROPOSTO        │  ← Custo 86% menor
    │  R$ 4.987           │     Qualidade alta
    └──────────┼──────────┘
               │
          Baixo Custo
    ◄──────────┼──────────►
    Baixa                  Alta
    Qualidade         Qualidade
```

### Vantagem Competitiva Sustentável

**Barreiras de entrada criadas:**

1. **Know-how técnico:** 2 anos de desenvolvimento
2. **Certificações:** INMETRO Portaria 301/2019
3. **Software proprietário:** Backend + App + Firmware otimizado
4. **Economia de escala:** Redução 40% custo BOM em volume
5. **Network effects:** Quanto mais estações, mais valioso o network

---

## 🎯 Modelo de Negócio

### Fluxos de Receita

#### 1. Venda de Hardware (60% receita)

**Produto:** Estação completa pronta para instalação

**Pricing:**
- **Preço venda:** R$ 8.500/unidade
- **Custo produção:** R$ 4.987/unidade
- **Margem bruta:** R$ 3.513 (41%)

**Clientes:**
- Condomínios residenciais
- Estacionamentos comerciais
- Postos de combustível
- Empresas (frotas)
- Shoppings centers
- Hotéis e resorts

**Volumes projetados:**
- Ano 1: 50 unidades = R$ 425.000
- Ano 2: 200 unidades = R$ 1.700.000
- Ano 3: 500 unidades = R$ 4.250.000

#### 2. SaaS - Plataforma de Gestão (25% receita)

**Produto:** Cloud backend + App + Dashboard

**Pricing (recorrente mensal):**
- **Plano Basic:** R$ 149/mês por estação
  - Dashboard básico
  - App usuário
  - OCPP 1.6
  - Suporte email

- **Plano Pro:** R$ 299/mês por estação
  - Tudo do Basic +
  - Analytics avançado
  - API customizada
  - OCPP 2.0.1
  - Suporte prioritário

- **Plano Enterprise:** R$ 599/mês por estação
  - Tudo do Pro +
  - White label
  - Integração ERP
  - SLA 99.9%
  - Account manager dedicado

**Projeções MRR (Monthly Recurring Revenue):**
- Ano 1: 50 estações × R$ 149 = R$ 7.450/mês = R$ 89.400/ano
- Ano 2: 200 estações × R$ 200 (mix) = R$ 40.000/mês = R$ 480.000/ano
- Ano 3: 500 estações × R$ 220 (mix) = R$ 110.000/mês = R$ 1.320.000/ano

#### 3. Manutenção e Suporte (10% receita)

**Serviços:**
- Manutenção preventiva: R$ 800/ano
- Suporte on-site: R$ 250/visita
- Troca de peças: Custo + 40%
- Upgrades de hardware: R$ 1.500 - R$ 3.000

**Projeções:**
- Ano 1: R$ 40.000
- Ano 2: R$ 160.000
- Ano 3: R$ 400.000

#### 4. Network de Recarga Próprio (5% receita inicial → 40% futuro)

**Modelo:** Operar estações próprias em locais estratégicos

**Pricing:**
- R$ 0,89/kWh (vs R$ 0,65 tarifa residencial)
- Margem: R$ 0,24/kWh (37%)

**Volumes:**
- Estação média: 100 sessões/mês × 20 kWh = 2.000 kWh
- Receita/estação/mês: 2.000 × R$ 0,89 = R$ 1.780
- Lucro/estação/mês: 2.000 × R$ 0,24 = R$ 480

**Expansão:**
- Ano 3: 20 estações próprias = R$ 115.200/ano
- Ano 5: 100 estações próprias = R$ 576.000/ano

### Estrutura de Custos

#### Custos Variáveis (por estação vendida)

| Item | Custo |
|------|-------|
| **BOM (componentes)** | R$ 1.716,60 |
| **PCB fabricação** | R$ 420,00 |
| **Montagem SMD** | R$ 650,00 |
| **Gabinete e instalação** | R$ 800,00 |
| **Testes e QA** | R$ 250,00 |
| **Embalagem e logística** | R$ 350,00 |
| **Comissão vendas (10%)** | R$ 850,00 |
| **TOTAL** | **R$ 5.036,60** |

**Margem de contribuição:** R$ 8.500 - R$ 5.036,60 = **R$ 3.463,40 (41%)**

#### Custos Fixos Mensais

| Categoria | Custo/mês | Ano 1 |
|-----------|-----------|-------|
| **Salários equipe** | R$ 58.500 | R$ 702.000 |
| **Aluguel escritório/lab** | R$ 8.000 | R$ 96.000 |
| **Cloud (AWS)** | R$ 3.500 | R$ 42.000 |
| **Marketing** | R$ 10.000 | R$ 120.000 |
| **Jurídico/contábil** | R$ 4.000 | R$ 48.000 |
| **Equipamentos e tools** | R$ 2.000 | R$ 24.000 |
| **Outros operacionais** | R$ 4.000 | R$ 48.000 |
| **TOTAL** | **R$ 90.000** | **R$ 1.080.000** |

### Análise de Break-even

**Ponto de equilíbrio mensal:**
- Custos fixos: R$ 90.000/mês
- Margem contribuição: R$ 3.463/unidade
- Break-even vendas: 90.000 ÷ 3.463 = **26 estações/mês**

**Com receita recorrente SaaS:**
- A partir do mês 12: Base instalada gera R$ 7.450 MRR
- Break-even reduz para: (90.000 - 7.450) ÷ 3.463 = **24 estações/mês**

---

## 📊 Projeções Financeiras

### Premissas

**Vendas:**
- Ano 1: 50 estações (ramp-up)
- Ano 2: 200 estações (crescimento 300%)
- Ano 3: 500 estações (crescimento 150%)
- Ano 4: 1.000 estações (crescimento 100%)
- Ano 5: 1.500 estações (crescimento 50%)

**Pricing:**
- Estação: R$ 8.500 (fixo Anos 1-3, depois R$ 9.500)
- SaaS: R$ 149-599/mês (média ponderada R$ 220)
- Taxa retenção SaaS: 95% ao ano

**Custos:**
- COGS: R$ 5.037/unidade Ano 1 → R$ 3.500 Ano 5 (economia escala)
- Fixos: R$ 90k/mês Ano 1 → R$ 250k/mês Ano 5

### Demonstrativo de Resultados Projetado (5 anos)

| Item | 2025 | 2026 | 2027 | 2028 | 2029 |
|------|------|------|------|------|------|
| **RECEITAS** | | | | | |
| Vendas hardware | 425.000 | 1.700.000 | 4.250.000 | 9.500.000 | 14.250.000 |
| SaaS (ARR) | 89.400 | 480.000 | 1.320.000 | 2.640.000 | 3.960.000 |
| Manutenção | 40.000 | 160.000 | 400.000 | 800.000 | 1.200.000 |
| Network próprio | 36.000 | 108.000 | 360.000 | 1.080.000 | 2.160.000 |
| **Receita Total** | **590.400** | **2.448.000** | **6.330.000** | **14.020.000** | **21.570.000** |
| | | | | | |
| **CUSTOS** | | | | | |
| COGS hardware | 251.850 | 950.000 | 2.125.000 | 4.200.000 | 5.250.000 |
| COGS SaaS (30%) | 26.820 | 144.000 | 396.000 | 792.000 | 1.188.000 |
| COGS network (70%) | 25.200 | 75.600 | 252.000 | 756.000 | 1.512.000 |
| **Custo Total** | **303.870** | **1.169.600** | **2.773.000** | **5.748.000** | **7.950.000** |
| | | | | | |
| **Margem Bruta** | **286.530** | **1.278.400** | **3.557.000** | **8.272.000** | **13.620.000** |
| **% Margem** | **49%** | **52%** | **56%** | **59%** | **63%** |
| | | | | | |
| **DESPESAS OPERACIONAIS** | | | | | |
| Salários | 702.000 | 1.200.000 | 1.800.000 | 2.400.000 | 3.000.000 |
| Marketing | 120.000 | 240.000 | 480.000 | 720.000 | 960.000 |
| Infraestrutura | 138.000 | 180.000 | 240.000 | 360.000 | 480.000 |
| Geral e Admin | 147.000 | 180.000 | 240.000 | 360.000 | 480.000 |
| **Total OpEx** | **1.107.000** | **1.800.000** | **2.760.000** | **3.840.000** | **4.920.000** |
| | | | | | |
| **EBITDA** | **-820.470** | **-521.600** | **797.000** | **4.432.000** | **8.700.000** |
| **% Margem** | **-139%** | **-21%** | **13%** | **32%** | **40%** |
| | | | | | |
| **Break-even** | Mês 18 | Mês 24 | ✅ | ✅ | ✅ |

### Fluxo de Caixa Projetado

| Item | 2025 | 2026 | 2027 | 2028 | 2029 |
|------|------|------|------|------|------|
| **Saldo inicial** | 1.000.000 | 179.530 | -342.070 | 454.930 | 4.886.930 |
| EBITDA | -820.470 | -521.600 | 797.000 | 4.432.000 | 8.700.000 |
| CapEx | -100.000 | -150.000 | -300.000 | -500.000 | -800.000 |
| Variação capital giro | -50.000 | -100.000 | -200.000 | -300.000 | -400.000 |
| **Fluxo caixa operacional** | -970.470 | -771.600 | 297.000 | 3.632.000 | 7.500.000 |
| | | | | | |
| Investimento (Seed) | 1.000.000 | - | - | - | - |
| Investimento (Serie A) | - | 1.500.000 | - | - | - |
| **Fluxo financiamento** | 1.000.000 | 1.500.000 | 0 | 0 | 0 |
| | | | | | |
| **Saldo final** | **179.530** | **-342.070** | **454.930** | **4.886.930** | **12.386.930** |

**Necessidade de capital:**
- Seed Round (2025): R$ 1.000.000 ✅
- Series A (2026): R$ 1.500.000 (para acelerar crescimento)

### Análise de Retorno

**Para investidor Seed (R$ 1M por 20% equity):**

| Cenário | Valuation 2029 | Equity 20% | ROI | TIR |
|---------|----------------|------------|-----|-----|
| **Conservador** | R$ 30.000.000 | R$ 6.000.000 | 6x | 57% |
| **Base** | R$ 50.000.000 | R$ 10.000.000 | 10x | 78% |
| **Otimista** | R$ 80.000.000 | R$ 16.000.000 | 16x | 98% |

**Múltiplos de valuation (2029):**
- ARR: R$ 3.960.000
- Múltiplo SaaS: 8-12x ARR
- Valuation: R$ 31.680.000 - R$ 47.520.000
- + Hardware business: R$ 14.250.000 × 1.5x = R$ 21.375.000
- **Valuation total:** R$ 50M - R$ 70M

---

## 🎯 Estratégia Go-to-Market

### Fase 1: Validação (Meses 1-6) - 2025 Q1-Q2

**Objetivo:** Validar product-market fit com 5 estações piloto

**Táticas:**
1. **Clientes beta gratuitos** (3 condomínios em SP)
   - Fornecemos estação grátis
   - Coletamos feedback e dados de uso
   - Casos de uso para marketing

2. **Parcerias estratégicas** (2 postos combustível)
   - Shell, Ipiranga ou Petrobras
   - Teste de modelo B2B
   - Validação de volume de uso

3. **PR e mídia**
   - Press release lançamento
   - Artigos em AutoEsporte, Quatro Rodas
   - Entrevistas em podcasts de sustentabilidade

**Métricas de sucesso:**
- 5 estações instaladas ✅
- 500+ sessões de recarga realizadas
- NPS > 8/10
- 3 leads B2B qualificados

### Fase 2: Tração Inicial (Meses 7-12) - 2025 Q3-Q4

**Objetivo:** Atingir 50 estações vendidas + R$ 500k receita

**Canais:**

**1. Vendas diretas B2B** (60% vendas)
- Equipe comercial 2 SDRs + 2 closers
- Outbound: LinkedIn + cold email
- Targets:
  - 500 condomínios de alto padrão (SP, RJ, BSB)
  - 200 estacionamentos comerciais
  - 50 postos de combustível

**2. Parcerias de canal** (30% vendas)
- Instaladores elétricos certificados
- Construtoras e incorporadoras
- Redes de postos de combustível
- Comissão: 15% sobre venda

**3. Inbound marketing** (10% vendas)
- Website otimizado SEO
- Blog técnico sobre VE
- Calculadora de ROI online
- Webinars mensais

**Métricas:**
- 50 estações vendidas
- CAC < R$ 2.000
- LTV/CAC > 3
- Pipeline R$ 1.5M

### Fase 3: Crescimento (Ano 2) - 2026

**Objetivo:** 200 estações + escalar operações

**Expansão geográfica:**
- Q1: São Paulo (100% foco)
- Q2: Rio de Janeiro e Brasília
- Q3: Belo Horizonte e Curitiba
- Q4: Porto Alegre e Salvador

**Novos segmentos:**
- Frotas corporativas (Uber, 99, empresas delivery)
- Shoppings centers (parceria com Multiplan, BR Malls)
- Hotéis e resorts (parceria com redes)

**Marketing:**
- Budget R$ 240k/ano
- Google Ads: R$ 8k/mês
- LinkedIn Ads: R$ 5k/mês
- Eventos e feiras: R$ 60k/ano
- Content marketing: R$ 3k/mês

### Fase 4: Escala (Anos 3-5) - 2027-2029

**Objetivo:** 500+ estações/ano + network próprio

**Network de recarga próprio:**
- Operar 100 estações em locais premium
- Rodovias (parceria com CCR, Arteris)
- Aeroportos (Guarulhos, Galeão, Congonhas)
- Centros comerciais (Paulista, Barra)

**Franchising:**
- Modelo: Franqueado compra estação + paga R$ 299/mês SaaS
- Investimento franqueado: R$ 15k (estação + instalação)
- Royalties: 10% receita recarga
- Meta: 50 franquias até 2029

**Internacional:**
- Ano 4: Argentina e Chile (mercados similares)
- Ano 5: Colômbia e México

---

## 👥 Equipe

### Time Atual (Fundadores)

**[Nome Fundador] - CEO**
- Background: [Completar]
- Responsabilidades: Estratégia, fundraising, parcerias

### Time a Contratar (6 meses)

**Posição 1: CTO / Engenheiro Eletrônico Sênior**
- Salário: R$ 18.000/mês
- Equity: 5%
- Responsabilidades:
  - Liderar desenvolvimento hardware
  - Design PCB KiCad
  - Testes e certificação
  - Gestão fornecedores
- Requisitos:
  - 10+ anos experiência eletrônica de potência
  - Experiência com certificação IEC 61851-1
  - Conhecimento STM32
  - Inglês fluente

**Posição 2: Tech Lead Backend**
- Salário: R$ 15.000/mês
- Equity: 3%
- Responsabilidades:
  - Arquitetura backend Symfony
  - Implementação OCPP
  - Gestão cloud AWS
  - Liderança equipe dev
- Requisitos:
  - 8+ anos PHP/Symfony
  - Experiência protocolos IoT
  - DevOps (Docker, K8s)
  - Inglês fluente

**Posição 3: Desenvolvedor Firmware STM32**
- Salário: R$ 12.000/mês
- Equity: 1%
- Responsabilidades:
  - Firmware STM32 C/C++
  - Integração sensores e displays
  - Protocolos comunicação
  - OTA updates
- Requisitos:
  - 5+ anos embedded systems
  - Expert STM32 HAL
  - Protocolos SPI, I2C, UART, ModBus
  - Git e CI/CD

**Posição 4: Gerente de Projeto / Certificação**
- Salário: R$ 15.000/mês (50% tempo)
- Equity: 2%
- Responsabilidades:
  - Gestão cronograma Fase 2-4
  - Coordenação certificação INMETRO
  - Interface laboratórios
  - Documentação técnica
- Requisitos:
  - Experiência certificação produtos elétricos
  - PMP ou similar
  - Conhecimento normas brasileiras
  - Network em laboratórios

**Posição 5: Técnico Montagem**
- Salário: R$ 6.000/mês
- Responsabilidades:
  - Montagem protótipos
  - Testes de bancada
  - Suporte instalação campo
  - Manutenção
- Requisitos:
  - Experiência soldagem SMD
  - Leitura de esquemáticos
  - Testes elétricos
  - Carteira de motorista

### Advisors

**Advisor Técnico - Hardware VE**
- Equity: 0.5%
- Compromisso: 4h/mês
- Perfil: Ex-engenheiro ABB ou Schneider com experiência em carregadores VE

**Advisor Negócios - Mobilidade Elétrica**
- Equity: 0.5%
- Compromisso: 4h/mês
- Perfil: Executivo de montadora ou startup mobilidade

**Advisor Certificação**
- Equity: 0.25%
- Compromisso: 2h/mês
- Perfil: Especialista INMETRO ou laboratório credenciado

### Organograma (Ano 2)

```
           CEO
            │
    ├───────┼───────┬───────┐
    │       │       │       │
   CTO   Tech Lead  CPO   CFO
    │       │       │       │
    ├───    ├───    ├───    └─── Controller
    │       │       │
Eng. HW  Dev Back  Product
Eng. FW  Dev Front  Design
Téc. Mont. DevOps   Marketing
          QA        Sales
```

**Headcount crescimento:**
- Ano 1: 7 pessoas
- Ano 2: 15 pessoas
- Ano 3: 30 pessoas
- Ano 4: 50 pessoas
- Ano 5: 80 pessoas

---

## ⚙️ Plano de Execução

### Roadmap 24 Meses

#### Q1 2025 (Jan-Mar) - Fase 1: Planejamento ✅ 70%

**Objetivos:**
- ✅ Documentação completa
- ✅ Roadmap 24 meses
- 🔄 Business plan (este documento)
- ⏳ Pitch deck
- ⏳ Fundraising seed R$ 1M
- ⏳ Recrutamento 3 pessoas
- ⏳ Constituição empresa (CNPJ)

**Entregáveis:**
- Business plan ✅
- Pitch deck
- Empresa constituída
- R$ 200k+ captado

#### Q2 2025 (Abr-Jun) - Fase 2 Início: Protótipos

**Objetivos:**
- Design PCB revisão 2.0 final
- Fabricação 10 protótipos
- Firmware versão 0.8
- Backend OCPP funcional
- Testes de bancada completos

**Entregáveis:**
- 10 PCBs montadas
- Firmware boot + charge control
- Backend com 3 endpoints OCPP
- Relatório testes elétricos

**Budget:** R$ 80.000

#### Q3 2025 (Jul-Set) - Fase 2: Validação

**Objetivos:**
- Testes IEC 61851-1 (22 testes)
- Instalação 5 pilotos
- App mobile beta
- Dossiê certificação INMETRO

**Entregáveis:**
- 5 estações instaladas
- 500+ sessões de recarga
- Dossiê submetido INMETRO
- NPS > 8/10

**Budget:** R$ 120.000

#### Q4 2025 (Out-Dez) - Fase 2 Fim + Fase 3: Primeiras Vendas

**Objetivos:**
- Certificação INMETRO aprovada
- Setup produção (50 un/mês)
- Vendas: 50 estações
- Series A: R$ 1.5M

**Entregáveis:**
- Certificado INMETRO
- 50 estações vendidas
- R$ 425k receita
- R$ 1.5M captado

**Budget:** R$ 200.000

#### 2026 - Crescimento e Escala

**Q1-Q2:**
- Produção 100 unidades
- Expansão RJ e BSB
- Team 15 pessoas

**Q3-Q4:**
- Produção 100 unidades
- Lançamento franchising
- Network próprio: 10 estações

**Ano completo:**
- 200 estações vendidas
- R$ 2.4M receita
- Break-even operacional

#### 2027 - Consolidação

**Objetivos:**
- 500 estações vendidas
- EBITDA positivo (R$ 800k)
- Expansão 6 capitais
- Network 50 estações próprias

### Marcos Críticos (Milestones)

| Marco | Data | Critério Sucesso |
|-------|------|------------------|
| **M1: Seed fechado** | Mar 2025 | R$ 1M captado |
| **M2: Team completo** | Abr 2025 | 5 contratações |
| **M3: Protótipos** | Jun 2025 | 10 PCBs funcionais |
| **M4: Pilotos** | Set 2025 | 5 estações + 500 sessões |
| **M5: Certificação** | Nov 2025 | INMETRO aprovado |
| **M6: Primeiras vendas** | Dez 2025 | 50 unidades |
| **M7: Break-even** | Jun 2026 | Fluxo caixa positivo |
| **M8: Escala** | Dez 2027 | 500 estações acumuladas |

### Riscos e Mitigações

#### Riscos Técnicos

**Risco 1: Falha certificação INMETRO**
- Probabilidade: Média (30%)
- Impacto: Alto (atraso 6 meses)
- Mitigação:
  - Contratar consultor especializado
  - Testes pré-certificação em lab privado
  - Design conservador seguindo norma
  - Budget contingência R$ 50k

**Risco 2: Problemas qualidade hardware**
- Probabilidade: Média (25%)
- Impacto: Alto (recalls, reputação)
- Mitigação:
  - QA rigoroso (100% testes)
  - Burn-in 72h antes de envio
  - Garantia 2 anos
  - Seguro produto

**Risco 3: Bugs críticos firmware**
- Probabilidade: Média (40%)
- Impacto: Médio
- Mitigação:
  - OTA updates
  - Testes automatizados
  - Beta testers internos
  - Rollback automático

#### Riscos de Mercado

**Risco 4: Adoção VE mais lenta que projetado**
- Probabilidade: Média (35%)
- Impacto: Alto (reduz TAM)
- Mitigação:
  - Diversificar: frotas elétricas (já crescendo)
  - Retrofit: adaptar para e-bikes, e-scooters
  - Export: mercados LATAM

**Risco 5: Competição de gigantes (ABB, Schneider baixam preços)**
- Probabilidade: Baixa (15%)
- Impacto: Alto
- Mitigação:
  - Foco segmento preço (eles não vão competir em low-cost)
  - Lock-in via software/network
  - Velocidade de inovação

**Risco 6: Mudança regulatória**
- Probabilidade: Baixa (10%)
- Impacto: Alto
- Mitigação:
  - Participar comitês normatização
  - Flexibilidade técnica (OTA)
  - Lobby via ABVE

#### Riscos Operacionais

**Risco 7: Não encontrar talento técnico**
- Probabilidade: Alta (50%)
- Impacto: Alto
- Mitigação:
  - Salários acima mercado (+20%)
  - Equity generosa
  - Remote-first (ampliar pool)
  - Trainee programs (formar talento)

**Risco 8: Ruptura supply chain (componentes)**
- Probabilidade: Média (30%)
- Impacto: Médio
- Mitigação:
  - Dual sourcing críticos
  - Estoque 3 meses
  - Design for availability (componentes comuns)

**Risco 9: Problemas de cash flow**
- Probabilidade: Média (35%)
- Impacto: Alto
- Mitigação:
  - Series A antecipada (Q4 2025)
  - Pagamento antecipado clientes (30%)
  - Crédito bancário (BNDES, Finep)

---

## 💰 Uso de Fundos (Seed R$ 1M)

### Alocação Detalhada

#### 1. Desenvolvimento Hardware - R$ 400.000 (40%)

| Item | Valor | Justificativa |
|------|-------|---------------|
| **PCBs protótipos** | R$ 50.000 | 50 unidades × R$ 1.000 |
| **Componentes eletrônicos** | R$ 100.000 | BOM × 50 units + buffer |
| **Equipamentos de teste** | R$ 80.000 | Osciloscópio, fonte, multímetros |
| **Ferramentas e bancada** | R$ 30.000 | Estação soldagem, ferramentas |
| **Certificação INMETRO** | R$ 100.000 | Testes + dossiê + taxas |
| **Gabinetes e mecânica** | R$ 40.000 | Protótipos de gabinete |
| **TOTAL** | **R$ 400.000** | |

#### 2. Equipe Técnica (6 meses) - R$ 300.000 (30%)

| Posição | Salário/mês | 6 meses | Total |
|---------|-------------|---------|-------|
| **Eng. Eletrônico Sr** | R$ 18.000 | 6 | R$ 108.000 |
| **Dev Firmware** | R$ 12.000 | 6 | R$ 72.000 |
| **Tech Lead Backend** | R$ 15.000 | 6 | R$ 90.000 |
| **Gerente Projeto** | R$ 7.500 | 4 | R$ 30.000 |
| **TOTAL** | | | **R$ 300.000** |

*Nota: Após 6 meses, Series A ou receita cobre salários*

#### 3. Software e Infraestrutura - R$ 200.000 (20%)

| Item | Valor | Detalhes |
|------|-------|----------|
| **Desenvolvimento backend** | R$ 90.000 | Já incluído em salário Tech Lead |
| **Cloud AWS (12 meses)** | R$ 42.000 | R$ 3.500/mês |
| **Licenças e tools** | R$ 18.000 | GitHub, Figma, Jira, etc. |
| **Mobile app development** | R$ 50.000 | Freelancer React Native |
| **TOTAL** | **R$ 200.000** | |

#### 4. Marketing e Operações - R$ 100.000 (10%)

| Item | Valor | Detalhes |
|------|-------|----------|
| **Website e branding** | R$ 25.000 | Design + desenvolvimento |
| **Marketing digital** | R$ 30.000 | Google Ads, LinkedIn (6 meses) |
| **Jurídico e contábil** | R$ 20.000 | Constituição + 6 meses |
| **Escritório (6 meses)** | R$ 18.000 | Coworking R$ 3k/mês |
| **Outros operacionais** | R$ 7.000 | Viagens, eventos, diversos |
| **TOTAL** | **R$ 100.000** | |

### Runway

**Burn rate mensal (primeiros 6 meses):**
- Salários: R$ 52.500/mês
- Cloud e tools: R$ 5.000/mês
- Marketing: R$ 5.000/mês
- Operacional: R$ 4.000/mês
- **Total:** R$ 66.500/mês

**Runway:** R$ 600.000 (após investir R$ 400k em hardware) ÷ R$ 66.500 = **9 meses**

**Plano:**
- Mês 6: Primeiras vendas (R$ 50k)
- Mês 9: Series A (R$ 1.5M)
- Mês 12: Break-even operacional

---

## 📞 Pedido de Investimento

### Termos do Seed Round

**Valor buscado:** R$ 1.000.000 (US$ 200.000)

**Instrumento:** SAFE (Simple Agreement for Future Equity)
- Valuation cap: R$ 5.000.000 (US$ 1M)
- Discount: 20%
- Pro rata rights: Sim
- MFN (Most Favored Nation): Sim

**ou**

**Equity direto:**
- Valuation pré-money: R$ 4.000.000
- Investimento: R$ 1.000.000
- Valuation pós-money: R$ 5.000.000
- % Equity: 20%

### Uso dos Recursos

**Resumo:**
- 40% Hardware e certificação
- 30% Equipe técnica (6 meses)
- 20% Software e cloud
- 10% Marketing e ops

**Runway:** 9 meses até Series A ou break-even

### Marcos de Desempenho

**Até uso de 50% dos fundos (Mês 3):**
- ✅ Equipe 5 pessoas contratada
- ✅ 10 protótipos funcionais
- ✅ Backend OCPP operacional

**Até uso de 100% dos fundos (Mês 6):**
- ✅ Certificação INMETRO submetida
- ✅ 5 estações piloto instaladas
- ✅ 50+ leads B2B qualificados

**Mês 9 (Series A readiness):**
- ✅ Certificação aprovada
- ✅ 30+ estações vendidas
- ✅ R$ 250k+ receita acumulada
- ✅ NPS > 8/10

### Projeção Retorno Investidor

**Cenário Base:**
- Investimento Seed: R$ 1M por 20% equity
- Series A (2026): R$ 1.5M a R$ 15M valuation (10% diluição)
- Series B (2027): R$ 5M a R$ 35M valuation (10% diluição)
- Exit (2029): Aquisição ou IPO a R$ 50M - R$ 80M

**Retorno investidor Seed:**
- Equity final: 20% × 0.9 × 0.9 = 16.2%
- Exit R$ 50M: 16.2% = R$ 8.1M (**8.1x retorno**)
- Exit R$ 80M: 16.2% = R$ 12.96M (**13x retorno**)
- TIR: 78% - 98%

### Comparables - Múltiplos

**Startups VE charging similares:**

| Empresa | País | Last Round | Valuation | Múltiplo ARR |
|---------|------|------------|-----------|--------------|
| **Wallbox** | ESP | IPO 2021 | US$ 1.5B | 15x |
| **ChargePoint** | USA | IPO 2021 | US$ 2.4B | 12x |
| **EVBox** | HOL | Series C | US$ 750M | 10x |
| **Teld** | CHN | Series D | US$ 1.2B | 8x |

**Eletroposto (projeção 2029):**
- ARR: R$ 3.96M
- Múltiplo conservador: 8x
- Valuation: R$ 31.68M
- + Hardware business: R$ 14.25M × 1.5x = R$ 21.37M
- **Total: R$ 50M - R$ 70M**

---

## 📎 Anexos

### Anexo A: Estrutura Societária

**Cap table pré-Seed:**
- Fundador(es): 80%
- Advisors: 2%
- Employee pool (ESOP): 18%

**Cap table pós-Seed:**
- Fundador(es): 64%
- Investidores Seed: 20%
- Advisors: 1.6%
- ESOP: 14.4%

**Cap table pós-Series A (projeção):**
- Fundador(es): 57.6%
- Seed investors: 18%
- Series A investors: 10%
- Advisors: 1.4%
- ESOP exercido: 5%
- ESOP disponível: 8%

### Anexo B: Principais Fornecedores

**Componentes Eletrônicos:**
- DigiKey Brasil (primary)
- Mouser Brasil (backup)
- LCSC China (volume)

**PCBs:**
- JLCPCB China (protótipos)
- Wollz Brazil (produção)

**Gabinetes:**
- [Fornecedor local a definir]

**Conectores Type 2:**
- Phoenix Contact
- Mennekes (OEM)

### Anexo C: Roadmap Técnico Detalhado

Ver documento: **ROTEIRO_PT-BR.md**

### Anexo D: Análise Competitiva Detalhada

Ver documento: **docs/planning/ESTUDO_MERCADO.md**

### Anexo E: Especificações Técnicas Completas

Ver documento: **docs/technical/ESPECIFICACOES_TECNICAS.md**

### Anexo F: Budget Detalhado 24 Meses

Ver documento: **docs/management/budget/ORCAMENTO_DETALHADO.md**

### Anexo G: Guias Técnicos

- **Soldagem e Montagem:** docs/technical/pt-br/GUIA_SOLDAGEM_MONTAGEM.md
- **Testes e Validação:** docs/technical/pt-br/GUIA_TESTE_VALIDACAO.md
- **Compra Componentes:** docs/management/pt-br/GUIA_COMPRA_COMPONENTES.md

---

## 📞 Contato

**Empresa:** Eletroposto Soluções em Mobilidade Elétrica Ltda (em constituição)

**Fundador/CEO:** [Nome]
**Email:** [email]
**Telefone:** [telefone]
**LinkedIn:** [linkedin]

**Endereço:** [A definir - SP]

**Website:** [em desenvolvimento]

---

## ✅ Próximos Passos para Investidor

1. **Reunião inicial (30 min):** Apresentação pitch deck + Q&A
2. **Due diligence técnica:** Demonstração protótipo + visita lab
3. **Due diligence financeira:** Modelos financeiros + premissas
4. **Reunião decisão:** Termos investimento + cronograma
5. **Fechamento:** Assinatura contrato + transferência fundos

**Timeline esperado:** 30-45 dias

---

**Documento preparado por:** Equipe Eletroposto
**Data:** 11 de Janeiro de 2025
**Versão:** 1.0
**Confidencial**

🚗⚡ **Construindo o Futuro da Mobilidade Elétrica no Brasil** 🇧🇷
