# 🌈⚡ Bifrost - Rede de Recarga para Veículos Elétricos

**A ponte para o futuro elétrico**

[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)
[![GitHub Stars](https://img.shields.io/github/stars/taciclei/Bifrost)](https://github.com/taciclei/Bifrost)
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg)](CONTRIBUTING.md)
[![Gitflow](https://img.shields.io/badge/workflow-Gitflow-blue)](GITFLOW.md)

> *"Conectando o Brasil ao futuro da mobilidade elétrica"* 🇧🇷

[English](./README_EN.md) | **Português**

---

## 📋 Índice

- [Sobre o Projeto](#-sobre-o-projeto)
- [O Problema](#-o-problema)
- [Nossa Solução](#-nossa-solução)
- [Mercado](#-mercado)
- [Modelo de Negócio](#-modelo-de-negócio)
- [Tecnologia](#-tecnologia)
- [Roadmap](#-roadmap)
- [Como Começar](#-como-começar)
- [Documentação](#-documentação)
- [Investimento](#-investimento)
- [Equipe](#-equipe)
- [Contribuir](#-contribuir)
- [Licença](#-licença)
- [Contato](#-contato)

---

## 🎯 Sobre o Projeto

**Bifrost** é uma startup brasileira que desenvolve e implanta uma rede de estações de recarga para veículos elétricos (VE) utilizando uma abordagem **DIY (Do It Yourself)** que reduz custos em **86% comparado às soluções comerciais**.

### Missão

Democratizar o acesso à infraestrutura de recarga para veículos elétricos no Brasil, tornando a mobilidade elétrica acessível para todos.

### Visão

Tornar-se líder em soluções de recarga VE acessíveis no Brasil até 2027, com 100+ estações implantadas e expandir para América Latina até 2030.

### Por que "Bifrost"?

**Bifrost** é a ponte arco-íris da mitologia nórdica que conecta Asgard (reino dos deuses) à Midgard (Terra).

**Simbolismo perfeito para nossa missão:**
- 🌈 **Ponte** = Conecta veículos à energia
- ⚡ **Arco-íris** = Espectro de energia sustentável
- 🔗 **Conexão** = Rede de estações de recarga
- 🛡️ **Ponte de Thor** = Poderosa e confiável

---

## 💡 O Problema

### A Infraestrutura de Recarga VE no Brasil está Travada

**5 Desafios Críticos:**

#### 1. 💰 Custo Proibitivo
- Estações comerciais custam **R$ 25.000 - R$ 50.000**
- ROI de 5-7 anos = Inviável para maioria dos negócios
- Pequenas empresas e condomínios ficam de fora

#### 2. 📉 Infraestrutura Insuficiente
- Brasil: **1 ponto de recarga para cada 31 veículos**
- Europa: 1 ponto para cada 10 veículos
- EUA: 1 ponto para cada 15 veículos
- **Déficit atual: 6.800 pontos de recarga**
- **Déficit 2027: 47.000 pontos necessários**

#### 3. 🗺️ Concentração Geográfica
- 70% dos pontos em São Paulo e Rio de Janeiro
- Interior e outras capitais carentes
- "Ansiedade de autonomia" limita adoção de VE

#### 4. 🌍 Dependência de Importação
- 90% das estações são importadas
- Preços inflados por impostos e logística
- Falta de suporte técnico local
- Vendor lock-in

#### 5. 🔒 Tecnologia Fechada
- Soluções proprietárias sem interoperabilidade
- Custos de manutenção elevados
- Impossível customizar ou reparar

### O Custo Real do Problema

**Para atender demanda de 2027:**
- 15.000 estações × R$ 35.000 = **R$ 525.000.000**

> ❌ **MEIO BILHÃO DE REAIS** inviabiliza expansão da infraestrutura VE no Brasil

---

## 🚀 Nossa Solução

### Bifrost Charging Station

**Abordagem DIY (Do It Yourself) + Open Source**

```
┌────────────────────────────────────────────────┐
│                                                │
│              BIFROST STATION                   │
│                                                │
│  💰 R$ 4.987    vs    R$ 35.000 (comercial)   │
│                                                │
│           86% MAIS BARATO ✨                   │
│                                                │
└────────────────────────────────────────────────┘
```

### Especificações Técnicas

| Característica | Especificação |
|----------------|---------------|
| **Potência** | 7.4 kW (32A monofásico) |
| **Conector** | Type 2 (Mennekes) padrão europeu |
| **Protocolo** | OCPP 1.6J / 2.0.1 (padrão aberto) |
| **Conectividade** | 4G LTE + WiFi + Ethernet |
| **Display** | LCD TFT 7" touchscreen |
| **Pagamento** | RFID + QR Code + App + Cartão |
| **Proteções** | RCD 30mA, sobrecorrente, sobretensão |
| **Certificação** | INMETRO IEC 61851-1 ✅ |
| **Modular** | Upgradeable até 22 kW |
| **Garantia** | 2 anos |

### Tempo de Carregamento

| Veículo | Bateria | Tempo (0-100%) |
|---------|---------|----------------|
| Nissan Leaf | 40 kWh | 5-6 horas |
| Chevrolet Bolt | 60 kWh | 8 horas |
| BYD Dolphin | 45 kWh | 6 horas |
| Tesla Model 3 | 60 kWh | 8 horas |

### Comparação Direta

| Item | Comercial | Bifrost | Economia |
|------|-----------|---------|----------|
| **Custo estação** | R$ 35.000 | R$ 4.987 | **86%** ✨ |
| **Instalação** | 3-6 meses | 1-2 meses | **67%** |
| **Manutenção/ano** | R$ 4.000 | R$ 800 | **80%** |
| **ROI** | 5-7 anos | 2-3 anos | **60%** |
| **Suporte** | Importado | Local BR | ✅ |
| **Customização** | Fechado | Open API | ✅ |
| **Documentação** | Proprietária | Open Source | ✅ |

### Como Conseguimos 86% de Redução?

**Breakdown de Custos:**

```
BOM (Componentes):           R$ 1.716,60
  ├─ STM32F407VGT6:          R$ 82,00
  ├─ Relé contator 32A:      R$ 156,00
  ├─ RCD 30mA:               R$ 234,00
  ├─ LCD TFT 7":             R$ 180,00
  ├─ Módulo 4G:              R$ 145,00
  ├─ Leitor RFID:            R$ 89,00
  └─ +150 componentes:       R$ 830,60

Fabricação:                  R$ 1.420,00
  ├─ PCB (JLCPCB):           R$ 420,00
  ├─ Montagem SMD:           R$ 650,00
  └─ Gabinete:               R$ 350,00

Outros:                      R$ 1.850,40
  ├─ Testes QA:              R$ 250,00
  ├─ Embalagem:              R$ 200,00
  ├─ Logística:              R$ 150,00
  ├─ Comissão (10%):         R$ 850,00
  └─ Margem:                 R$ 400,40

────────────────────────────────────────
TOTAL CUSTO:                 R$ 4.987,00
PREÇO VENDA:                 R$ 8.500,00
MARGEM BRUTA:                41% (R$ 3.513)
```

---

## 📊 Mercado

### Mercado Brasileiro de VE - Crescimento Explosivo

**Frota de Veículos Elétricos:**

```
1.5M  │                              ●  2030
      │                            ╱
500K  │                      ●  2027
      │                    ╱
      │                  ╱
100K  │      ●  2024   ╱
      │    ╱         ╱
      │  ╱         ╱
      └──────────────────────────────
        2024    2027    2030

        CAGR 41% ao ano 📈
```

**Infraestrutura Necessária:**

| Ano | Frota VE | Pontos Necessários | Existentes | Déficit |
|-----|----------|-------------------|------------|---------|
| 2024 | 100.000 | 10.000 | 3.200 | **6.800** |
| 2027 | 500.000 | 50.000 | 3.200 | **47.000** |
| 2030 | 1.500.000 | 150.000 | 3.200 | **147.000** |

### Tamanho do Mercado

**TAM (Total Addressable Market) - 2030:**
- 150.000 estações × R$ 4.987 = **R$ 748.050.000**

**SAM (Serviceable Addressable Market) - 2027:**

Foco inicial:
- 30% Condomínios residenciais: R$ 70.316.700
- 25% Estacionamentos comerciais: R$ 58.597.250
- 20% Postos de combustível: R$ 46.877.800
- **TOTAL SAM: R$ 175.791.750**

**SOM (Serviceable Obtainable Market):**
- Meta conservadora 1% do SAM (3 anos): R$ 2.343.890
- Meta agressiva 5% do SAM (5 anos): **R$ 11.719.450**

### Competição - Sweet Spot

```
  Alta Qualidade
       ▲
       │  ABB
       │  Schneider (R$ 35-50k)
       │
       │  EZ.Charge
       │  Voltz (R$ 30-40k)
       │
       │  EVBox
       │  ChargePoint (R$ 15-25k)
       │
   ┌───┼───────┐
   │  BIFROST  │  ← R$ 8.500
   │  R$ 4.987 │     Qualidade Alta
   └───┼───────┘     Custo Baixo ✨
       │
  Baixa Qualidade
```

**Nossa vantagem competitiva única:**
- ✅ Qualidade certificada (INMETRO)
- ✅ Preço acessível (86% menor)
- ✅ Suporte local
- ✅ Open source (sem vendor lock-in)

---

## 💰 Modelo de Negócio

### 4 Fluxos de Receita

#### 1. Venda de Hardware (60% receita inicial → 30% futuro)

**Produto:** Estação completa certificada INMETRO

- **Preço:** R$ 8.500/unidade
- **Custo:** R$ 4.987/unidade
- **Margem:** 41% (R$ 3.513/unidade)

**Clientes:**
- Condomínios residenciais
- Estacionamentos comerciais
- Postos de combustível
- Empresas (frotas corporativas)
- Shoppings centers
- Hotéis e resorts

**Volumes projetados:**
```
Ano 1:   50 unidades  = R$ 425.000
Ano 2:  200 unidades  = R$ 1.700.000
Ano 3:  500 unidades  = R$ 4.250.000
Ano 4: 1000 unidades  = R$ 8.500.000
Ano 5: 1500 unidades  = R$ 12.750.000
```

#### 2. SaaS - Plataforma de Gestão (25% → 40% futuro)

**Produto:** Cloud backend + App + Dashboard + OCPP

**Planos:**

| Plano | Preço/mês | Features |
|-------|-----------|----------|
| **Basic** | R$ 149 | Dashboard básico, App usuário, OCPP 1.6 |
| **Pro** | R$ 299 | Analytics, API custom, OCPP 2.0.1, Suporte priority |
| **Enterprise** | R$ 599 | White label, ERP integration, SLA 99.9%, Account manager |

**Projeções MRR (Monthly Recurring Revenue):**
```
Ano 1:   50 estações × R$ 149 = R$ 7.450/mês  (R$ 89.400/ano)
Ano 2:  200 estações × R$ 200 = R$ 40.000/mês (R$ 480.000/ano)
Ano 3:  500 estações × R$ 220 = R$ 110.000/mês (R$ 1.320.000/ano)
Ano 5: 1500 estações × R$ 250 = R$ 375.000/mês (R$ 4.500.000/ano)
```

#### 3. Manutenção e Suporte (10% receita)

**Serviços:**
- Manutenção preventiva: R$ 800/ano por estação
- Suporte on-site: R$ 250/visita
- Troca de peças: Custo + 40% margem
- Upgrades hardware: R$ 1.500 - R$ 3.000

**Projeções:**
```
Ano 1: R$ 40.000
Ano 2: R$ 160.000
Ano 3: R$ 400.000
Ano 5: R$ 1.200.000
```

#### 4. Network de Recarga Próprio (5% → 40% futuro)

**Modelo:** Operar estações próprias em locais premium

**Pricing:**
- R$ 0,89/kWh (vs R$ 0,65 tarifa residencial)
- Margem: R$ 0,24/kWh (37%)

**Volumes:**
- Estação média: 100 sessões/mês × 20 kWh = 2.000 kWh
- Receita/estação/mês: 2.000 × R$ 0,89 = R$ 1.780
- Lucro/estação/mês: 2.000 × R$ 0,24 = R$ 480

**Expansão:**
```
Ano 3:  20 estações próprias  = R$ 115.200/ano
Ano 5: 100 estações próprias  = R$ 576.000/ano
```

### Projeções Financeiras 5 Anos

| Métrica | 2025 | 2026 | 2027 | 2028 | 2029 |
|---------|------|------|------|------|------|
| **Estações vendidas** | 50 | 200 | 500 | 1.000 | 1.500 |
| **Receita total** | 590K | 2.4M | 6.3M | 14.0M | 21.6M |
| **EBITDA** | -820K | -522K | 797K | 4.4M | 8.7M |
| **Margem EBITDA** | -139% | -21% | 13% | 32% | 40% |
| **Break-even** | - | - | ✅ Mês 30 | ✅ | ✅ |

**Crescimento:**
- Revenue CAGR: 147% (anos 1-5)
- Break-even: Mês 30 (120 estações instaladas)
- ROI 5 anos: 280%

---

## 🛠️ Tecnologia

### Stack Completo

#### Hardware

```yaml
PCB Design: KiCad 9.0+ (Open Source)
Microcontrolador: STM32F407VGT6 (ARM Cortex-M4)
Standards: IEC 61851-1, ABNT NBR IEC 61851-1
Protocol: OCPP 1.6J / 2.0.1
Fabricação: JLCPCB (China) ou Wollz (Brasil)
```

#### Backend

```yaml
Framework: Symfony 6.4 (PHP 8.2+)
API: API Platform 3.2 (REST/GraphQL)
Database: PostgreSQL 16
Cache: Redis 7
Real-time: Mercure (WebSocket)
Auth: JWT (Lexik)
OCPP: Ratchet WebSocket Server
```

#### Frontend Web

```yaml
Framework: React 18
Language: TypeScript 5
Styling: Tailwind CSS 3
State: React Query + Zustand
Maps: Leaflet / Google Maps API
Charts: Recharts
```

#### Mobile App

```yaml
Framework: React Native 0.73
Toolchain: Expo
Navigation: React Navigation
State: React Query
Maps: React Native Maps
Payments: Stripe SDK
```

#### Infrastructure

```yaml
Containers: Docker + Docker Compose
Orchestration: Kubernetes (futuro)
Cloud: AWS / Azure / DigitalOcean
IaC: Terraform
CI/CD: GitHub Actions
Monitoring: Prometheus + Grafana
Logging: ELK Stack
```

### Arquitetura do Sistema

```
┌─────────────────────────────────────────────────────┐
│                   USUÁRIOS                          │
│  📱 Mobile App    🌐 Web App    🎛️ Admin Dashboard  │
└──────────────────┬──────────────────────────────────┘
                   │
                   ▼
┌─────────────────────────────────────────────────────┐
│              API GATEWAY (Nginx)                     │
└──────────────────┬──────────────────────────────────┘
                   │
      ┌────────────┼────────────┐
      ▼            ▼            ▼
┌──────────┐ ┌──────────┐ ┌──────────┐
│ Backend  │ │  OCPP    │ │ Real-time│
│ Symfony  │ │  Server  │ │ Mercure  │
│  (REST)  │ │(WebSocket│ │(WebSocket│
└────┬─────┘ └────┬─────┘ └────┬─────┘
     │            │            │
     └────────────┴────────────┘
                  ▼
     ┌─────────────────────────┐
     │   PostgreSQL + Redis    │
     └─────────────────────────┘
                  ▲
                  │
     ┌────────────┴────────────┐
     │                         │
     ▼                         ▼
┌──────────┐            ┌──────────┐
│ Estação  │◄──OCPP────►│ Estação  │
│ Bifrost  │            │ Bifrost  │
│  (IoT)   │            │  (IoT)   │
└──────────┘            └──────────┘
```

---

## 🗺️ Roadmap

### Phase 0: Fundações ✅ (Nov 2024)
**Status:** Completo
- ✅ Protótipo hardware funcional
- ✅ Firmware básico operacional
- ✅ Backend estruturado
- ✅ Testes de bancada validados

### Phase 1: Planejamento 🔄 (Jan 2025 - 70% completo)
**Status:** Em andamento
- ✅ Documentação completa (12.700+ linhas)
- ✅ Roadmap 24 meses
- ✅ Business plan
- ✅ Pitch deck
- ✅ Lista 20 investidores
- ✅ Git + Gitflow configurado
- 🔄 Fundraising R$ 1M
- ⏳ Recrutamento equipe (5 posições)
- ⏳ Constituição empresa

**Deadline:** 31 de Janeiro 2025

### Phase 2: Hardware ⏳ (Fev-Jul 2025 - 6 meses)
**Orçamento:** R$ 470.350

**Objetivos:**
- Design PCB v2.0 final
- Fabricação 50 protótipos
- Firmware v0.8
- Testes IEC 61851-1 (22 testes)
- Dossiê certificação INMETRO

**Entregáveis:**
- 10 PCBs certificáveis
- Firmware boot + charge control
- Backend OCPP funcional
- 5 pilotos instalados
- 500+ sessões de recarga

### Phase 3: Software ⏳ (Mar-Ago 2025 - 6 meses paralelo)
**Orçamento:** R$ 330.000

**Objetivos:**
- Backend completo (Symfony)
- Frontend dashboard (React)
- Mobile app beta (React Native)
- Integração pagamentos (Stripe, Pix)
- API OCPP 2.0.1

### Phase 4: Certificação ⏳ (Ago-Nov 2025 - 3 meses)
**Orçamento:** R$ 150.000

**Objetivos:**
- Certificação INMETRO aprovada
- Homologação ANATEL
- Testes laboratório credenciado
- Documentação técnica completa

### Phase 5: Piloto ⏳ (Set-Dez 2025 - 3 meses)
**Orçamento:** R$ 265.000

**Objetivos:**
- 50 estações vendidas
- R$ 425k receita
- NPS > 8/10
- Setup produção (100 un/mês)

### Phase 6: Expansão 🎯 (2026-2027 - 18 meses)
**Orçamento:** R$ 3.500.000

**Objetivos:**
- 500+ estações vendidas acumuladas
- 6 cidades cobertura
- Break-even operacional
- Series A captado
- Network próprio (50 estações)

---

## 🚀 Como Começar

### Para Desenvolvedores

#### Pré-requisitos

```bash
- Git + Git Flow
- Docker + Docker Compose
- PHP 8.2+ (para backend)
- Node.js 18+ (para frontend/mobile)
- KiCad 9.0+ (para hardware)
```

#### Instalação

```bash
# 1. Clonar repositório
git clone https://github.com/taciclei/Bifrost.git
cd Bifrost

# 2. Copiar variáveis de ambiente
cp .env.example .env
# Editar .env com suas configurações

# 3. Iniciar stack Docker
docker-compose up -d

# 4. Instalar dependências backend
docker-compose exec php composer install
docker-compose exec php bin/console doctrine:migrations:migrate

# 5. Instalar dependências frontend
cd frontend
npm install
npm run dev

# 6. Acessar aplicações
# Backend API: http://localhost:8000
# Frontend: http://localhost:3000
# OCPP Server: ws://localhost:9000
```

#### Workflow de Desenvolvimento (Gitflow)

```bash
# Criar nova feature
git flow feature start minha-feature

# Desenvolver
git add .
git commit -m "feat(scope): Descrição"

# Finalizar feature
git flow feature finish minha-feature

# Ver documentação completa
cat GITFLOW.md
```

### Para Investidores

**Documentos essenciais:**

1. 📄 [Business Plan](./BUSINESS_PLAN.md) - Plano completo (900 linhas)
2. 🎯 [Pitch Deck](./PITCH_DECK.md) - Apresentação investidores (23 slides)
3. 📊 [Roadmap 24 meses](./ROTEIRO_PT-BR.md) - Timeline detalhado
4. 💰 [Lista Investidores](./LISTA_INVESTIDORES.md) - 20 VCs/Angels

**Oportunidade:**
- Seed: R$ 1M por 20% equity
- Valuation pré: R$ 4M
- ROI projetado: 8-13x em 5 anos
- TIR: 78-98%

### Para Novos Membros da Equipe

**Leitura obrigatória:**

1. [README_PT-BR.md](./README_PT-BR.md) - Visão geral português
2. [ROTEIRO_PT-BR.md](./ROTEIRO_PT-BR.md) - Roadmap 24 meses
3. [PROXIMOS_PASSOS.md](./PROXIMOS_PASSOS.md) - Ações imediatas
4. [GITFLOW.md](./GITFLOW.md) - Workflow Git

**Configurar ambiente:**
- Ver seção [Instalação](#instalação) acima

---

## 📚 Documentação

### Documentação Estratégica

| Documento | Tamanho | Descrição |
|-----------|---------|-----------|
| [BUSINESS_PLAN.md](./BUSINESS_PLAN.md) | 37K | Plano de negócios completo |
| [PITCH_DECK.md](./PITCH_DECK.md) | 28K | Apresentação investidores (23 slides) |
| [ROTEIRO_PT-BR.md](./ROTEIRO_PT-BR.md) | 31K | Roadmap 24 meses detalhado |
| [LISTA_INVESTIDORES.md](./LISTA_INVESTIDORES.md) | 22K | 20 VCs/Angels + estratégia |
| [PROXIMOS_PASSOS.md](./PROXIMOS_PASSOS.md) | 11K | Ações imediatas |
| [ANALISE_COMPLETA.md](./ANALISE_COMPLETA.md) | 14K | Análise estado projeto |

### Documentação Técnica

| Documento | Descrição |
|-----------|-----------|
| [GITFLOW.md](./GITFLOW.md) | Workflow Git completo |
| [docs/technical/ESPECIFICACOES_TECNICAS.md](./docs/technical/ESPECIFICACOES_TECNICAS.md) | Specs hardware |
| [docs/technical/pt-br/GUIA_SOLDAGEM_MONTAGEM.md](./docs/technical/pt-br/GUIA_SOLDAGEM_MONTAGEM.md) | Guia montagem PCB |
| [docs/technical/pt-br/GUIA_TESTE_VALIDACAO.md](./docs/technical/pt-br/GUIA_TESTE_VALIDACAO.md) | Testes IEC 61851-1 |
| [docs/management/pt-br/GUIA_COMPRA_COMPONENTES.md](./docs/management/pt-br/GUIA_COMPRA_COMPONENTES.md) | Compras + BOM |

### Índice Completo

📄 [INDICE.md](./INDICE.md) - Navegação completa de toda documentação

---

## 💰 Investimento

### Seed Round - ABERTO

**Termos:**
```yaml
Valor: R$ 1.000.000
Equity: 20%
Valuation pré-money: R$ 4.000.000
Valuation pós-money: R$ 5.000.000
Instrumento: SAFE ou Equity direto
```

**Uso de Fundos:**
```
40% Hardware & certificação     R$ 400.000
30% Equipe (6 meses)            R$ 300.000
20% Software & cloud            R$ 200.000
10% Marketing & ops             R$ 100.000
─────────────────────────────────────────
TOTAL                           R$ 1.000.000

Runway: 9 meses até Series A
```

**Projeção Retorno:**

| Cenário | Valuation 2029 | Return | ROI |
|---------|----------------|--------|-----|
| Conservador | R$ 30M | R$ 6M | 6x |
| Base | R$ 50M | R$ 10M | 10x |
| Otimista | R$ 80M | R$ 16M | 16x |

**Contato investidores:** contact@taciclei.com

---

## 👥 Equipe

### Atual

**Founder/CEO:** Tácio Clei
- Estratégia, fundraising, parcerias
- Email: contact@taciclei.com
- GitHub: [@taciclei](https://github.com/taciclei)

### Recrutamento (com seed)

**5 Posições Críticas:**

| Cargo | Salário | Equity | Status |
|-------|---------|--------|--------|
| **CTO / Eng. Eletrônico Sr** | R$ 18k/mês | 5% | 🔴 Aberto |
| **Tech Lead Backend** | R$ 15k/mês | 3% | 🔴 Aberto |
| **Dev Firmware STM32** | R$ 12k/mês | 1% | 🔴 Aberto |
| **Gerente de Projeto** | R$ 15k/mês (50%) | 2% | 🔴 Aberto |
| **Técnico Montagem** | R$ 6k/mês | - | 🔴 Aberto |

**Ver vagas completas:** [Em breve]

---

## 🤝 Contribuir

Aceitamos contribuições! Veja [CONTRIBUTING.md](./CONTRIBUTING.md) para guidelines.

### Como Contribuir

```bash
# 1. Fork o repositório

# 2. Clonar seu fork
git clone https://github.com/SEU-USER/Bifrost.git

# 3. Criar feature
git flow feature start minha-contribuicao

# 4. Fazer mudanças
git add .
git commit -m "feat(scope): Descrição"

# 5. Push para seu fork
git push origin feature/minha-contribuicao

# 6. Abrir Pull Request no GitHub
```

### Áreas que Precisam de Ajuda

- 🔧 **Hardware:** Design PCB, otimizações
- 💻 **Backend:** Implementação OCPP, testes
- 🎨 **Frontend:** Dashboard, UX/UI
- 📱 **Mobile:** App React Native
- 📝 **Documentação:** Tradução, exemplos
- 🧪 **Testes:** Unit tests, integration tests

---

## 📜 Licença

Este projeto está licenciado sob a **Licença MIT**.

Veja o arquivo [LICENSE](./LICENSE) para detalhes.

**TL;DR:** Open source, use comercialmente, modifique, distribua. Apenas mantenha copyright notice.

---

## 📞 Contato

### Empresa

**Bifrost - Soluções em Mobilidade Elétrica Ltda**
*(em constituição)*

**Fundador/CEO:** Tácio Clei
**Email:** contact@taciclei.com
**GitHub:** https://github.com/taciclei/Bifrost
**Website:** [em breve]

### Redes Sociais

- **LinkedIn:** [em breve]
- **Twitter:** [em breve]
- **Instagram:** [em breve]

### Suporte

- **Issues:** https://github.com/taciclei/Bifrost/issues
- **Discussions:** https://github.com/taciclei/Bifrost/discussions
- **Email:** contact@taciclei.com

---

## 🌟 Agradecimentos

- Comunidade KiCad
- Symfony e API Platform
- Open Charge Alliance (OCPP)
- Todos os colaboradores e apoiadores

---

## 📊 Status do Projeto

```
Phase 1: Planejamento             ████████████░░░░  70%

Features:
├─ Business Plan                  ████████████████  100%
├─ Pitch Deck                     ████████████████  100%
├─ Lista Investidores             ████████████████  100%
├─ Documentação                   ████████████████  100%
├─ Git + Gitflow                  ████████████████  100%
├─ Fundraising                    ████░░░░░░░░░░░░   25%
├─ Recrutamento                   ░░░░░░░░░░░░░░░░    0%
└─ Constituição empresa           ░░░░░░░░░░░░░░░░    0%

Próximo Marco: Seed R$ 1M captado (31 Jan 2025)
```

---

## 🎯 Visão 2030

**Infraestrutura:**
- 🎯 1.500 estações vendidas
- 🎯 100 estações próprias operando
- 🎯 50 franquias ativas
- 🎯 Presença em 15 cidades brasileiras

**Impacto:**
- 🌍 300.000 kg CO₂ evitados/ano
- ⚡ 2.000.000 kWh energia limpa distribuída
- 👥 80 empregos diretos criados

**Internacional:**
- 🌎 Argentina, Chile (2028)
- 🌎 Colômbia, México (2029)

---

## 🚀 Call to Action

### Para Investidores
📧 **Email:** contact@taciclei.com
📄 **Business Plan:** [BUSINESS_PLAN.md](./BUSINESS_PLAN.md)
🎯 **Pitch Deck:** [PITCH_DECK.md](./PITCH_DECK.md)

### Para Desenvolvedores
⭐ **Star** este repositório
🍴 **Fork** e contribua
📖 **Leia** [CONTRIBUTING.md](./CONTRIBUTING.md)

### Para Talentos
💼 **Vagas abertas:** [Em breve]
📧 **Envie CV:** contact@taciclei.com

---

<div align="center">

## 🌈⚡ Bifrost

**A ponte para o futuro elétrico**

*Construindo a infraestrutura de recarga VE mais acessível do Brasil*

🇧🇷 **Made in Brazil with ❤️**

---

**[⬆ Voltar ao topo](#-bifrost---rede-de-recarga-para-veículos-elétricos)**

</div>
