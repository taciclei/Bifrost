# 🗺️ Roteiro Projeto Eletroposto

**Versão:** 2.0
**Última atualização:** 2025-01-11
**Status:** Em desenvolvimento ativo

---

## 📋 Índice

1. [Visão Geral](#visao-geral)
2. [Estrutura do Projeto](#estrutura-projeto)
3. [Fase 0: Fundações (COMPLETO ✅)](#fase-0)
4. [Fase 1: Planejamento Estratégico (EM ANDAMENTO 🔄)](#fase-1)
5. [Fase 2: Desenvolvimento Hardware (6 meses)](#fase-2)
6. [Fase 3: Desenvolvimento Software (Paralelo)](#fase-3)
7. [Fase 4: Certificação e Validação (6 meses)](#fase-4)
8. [Fase 5: Instalação Piloto (3 meses)](#fase-5)
9. [Fase 6: Operação e Expansão (12+ meses)](#fase-6)
10. [Cronograma Global](#cronograma)
11. [Dependências Entre Fases](#dependencias)
12. [Orçamento Global](#orcamento)
13. [Riscos e Mitigações](#riscos)

---

## 🎯 Visão Geral {#visao-geral}

### Missão
Desenvolver e implantar uma rede de estações de recarga para veículos elétricos (Eletroposto) no Brasil, com uma abordagem DIY para reduzir os custos em 86% vs soluções comerciais.

### Visão
Tornar-se líder em soluções de recarga de VEs acessíveis no Brasil até 2027, com 100+ estações implantadas.

### Objetivos Estratégicos
- ✅ **Curto prazo (6 meses):** Protótipos validados e testados
- 🔄 **Médio prazo (12 meses):** Certificação INMETRO + 5 estações piloto
- 🎯 **Longo prazo (24 meses):** 100 estações operacionais

---

## 🏗️ Estrutura do Projeto {#estrutura-projeto}

### Arquitetura Atual

```
Thor projet/
├── 📄 Documentação Raiz
│   ├── README.md                    # Documentação principal
│   ├── ROADMAP.md                   # Este arquivo - Plano global
│   ├── PROJECT_SUMMARY.md           # Resumo executivo
│   ├── QUICK_START.md               # Guia início rápido
│   ├── CONTRIBUTING.md              # Guia contribuição
│   └── DOCUMENTS_CREES_SESSION2.md  # Histórico sessão
│
├── 📚 docs/ - Documentação Completa
│   ├── planning/                    # Visão e estratégia
│   │   ├── VISAO_PROJETO.md        # Visão global
│   │   ├── ESTUDO_MERCADO.md       # Estudo mercado brasileiro
│   │   └── phase[1-5]-*/           # Planos por fase
│   │
│   ├── management/                  # Gestão projeto
│   │   ├── PLANNING_6_MOIS.md      # Planejamento detalhado 6 meses
│   │   ├── GUIDE_ACHAT_COMPOSANTS.md # Guia compras
│   │   ├── USER_STORIES.md         # Stories usuários
│   │   ├── pt-br/                  # Versões portuguesas
│   │   ├── budget/
│   │   │   └── ORCAMENTO_DETALHADO.md
│   │   ├── risks/
│   │   │   └── ANALISE_RISCOS.md
│   │   └── marketing/
│   │       └── ESTRATEGIA_MARKETING.md
│   │
│   ├── technical/                   # Documentação técnica
│   │   ├── ESPECIFICACOES_TECNICAS.md
│   │   ├── FABRICATION_BORNES_DIY.md
│   │   ├── GUIDE_SOUDURE_ASSEMBLAGE.md
│   │   ├── GUIDE_TEST_VALIDATION.md
│   │   ├── OUTILS_CONCEPTION_SCHEMAS.md
│   │   ├── pt-br/                  # Versões portuguesas
│   │   ├── architecture/
│   │   │   ├── ARQUITETURA_SISTEMA.md
│   │   │   ├── ARQUITETURA_SYLIUS.md
│   │   │   └── DATABASE_SCHEMA.md
│   │   ├── API_DOCUMENTATION.md
│   │   ├── DEPLOYMENT_GUIDE.md
│   │   ├── MONITORING_OBSERVABILITY.md
│   │   └── QA_TEST_PLAN.md
│   │
│   ├── legal/
│   │   └── LGPD_COMPLIANCE.md
│   │
│   └── operations/
│       ├── maintenance/
│       ├── procedures/
│       └── training/
│
├── ⚡ hardware/ - Concepção Eletrônica
│   └── kicad_examples/
│       ├── eletroposto_charger.kicad_*  # Projeto KiCad principal
│       ├── pilot_signal_example.kicad_sch
│       ├── generate_fabrication.sh      # Script automação
│       ├── fabrication/                 # Outputs Gerbers/BOM
│       │   ├── gerber/
│       │   ├── drill/
│       │   ├── bom/
│       │   ├── assembly/
│       │   └── documentation/
│       ├── QUICK_START.md
│       ├── README.md
│       └── RESULTATS_TEST.md
│
├── 💻 backend/ - Backend Symfony
│   ├── src/
│   │   ├── Entity/Charging/         # Entidades negócio
│   │   │   ├── Station.php
│   │   │   ├── Charger.php
│   │   │   ├── ChargingSession.php
│   │   │   ├── Vehicle.php
│   │   │   └── MeterValue.php
│   │   └── Repository/Charging/     # Repositories
│   ├── config/                      # Configuração Symfony
│   │   ├── packages/
│   │   ├── routes.yaml
│   │   └── services.yaml
│   └── tests/
│
├── 🎨 frontend/ - Interface Web
│
├── 🐳 infrastructure/ - Docker & Deploy
│   └── docker/
│       ├── Dockerfile.php
│       ├── Dockerfile.websocket
│       ├── nginx/
│       └── php/
│
└── 🔧 scripts/ - Scripts automação
```

### Estado dos Componentes

| Componente | Status | Completude | Prioridade |
|-----------|--------|------------|----------|
| **Documentação Planejamento** | ✅ Completo | 100% | Alta |
| **Documentação Técnica** | ✅ Completo | 95% | Alta |
| **Hardware KiCad** | ✅ Exemplo OK | 60% | Crítica |
| **Backend Entities** | ✅ Base OK | 40% | Alta |
| **Backend API** | ⚠️ A desenvolver | 10% | Alta |
| **Frontend** | ❌ Não iniciado | 0% | Média |
| **Infraestrutura** | ✅ Base OK | 50% | Média |
| **Testes** | ⚠️ Parcial | 20% | Alta |

---

## ✅ Fase 0: Fundações (COMPLETO) {#fase-0}

**Duração:** Novembro 2024
**Orçamento:** R$ 0 (documentação)
**Status:** ✅ 100% Completo

### Realizações

#### Sessão 1 (Nov 2024)
- ✅ Estrutura projeto inicializada
- ✅ Documentação estratégica criada
  - Visão projeto, estudo mercado
  - Arquitetura sistema, specs técnicas
  - Análise riscos, orçamento detalhado
  - Marketing, compliance LGPD
- ✅ Entidades Symfony criadas (Station, Charger, etc.)
- ✅ Infraestrutura Docker configurada
- ✅ Configuração Symfony + API Platform

#### Sessão 2 (Jan 2025)
- ✅ Guias técnicos práticos (FR + PT-BR)
  - Guia soldagem e montagem
  - Guia testes e validação IEC 61851-1
  - Guia compra componentes
  - Planejamento 6 meses detalhado
- ✅ Projeto KiCad exemplo funcional
- ✅ Script automação fabricação
- ✅ Testes script validados ✓

### Entregáveis Sessão 0
- 📄 16 documentos técnicos completos (~5.700 linhas)
- 🔧 Projeto KiCad exemplo + 12 Gerbers
- 📦 Script generate_fabrication.sh funcional
- 💾 Entidades backend + repositories

---

## 🔄 Fase 1: Planejamento Estratégico (EM ANDAMENTO) {#fase-1}

**Duração:** Janeiro 2025 (2-4 semanas)
**Orçamento:** R$ 10.000
**Status:** 🔄 70% Completo

### Objetivos
- Finalizar todos documentos estratégicos
- Definir roteiro detalhado
- Assegurar orçamento inicial
- Formar equipe core

### Tarefas

#### 1.1 Finalização Documentação Estratégica
- [x] Roteiro global projeto (este documento)
- [ ] Plano de negócios detalhado 2025-2027
- [ ] Plano captação recursos (R$ 500k seed)
- [ ] Pitch deck investidores
- [ ] Análise concorrência aprofundada

#### 1.2 Estruturação Legal
- [ ] Constituição empresa (LTDA ou SA)
- [ ] Inscrição CNPJ
- [ ] Contratos parceiros/fornecedores
- [ ] Contrato equipe
- [ ] Seguros projetos

#### 1.3 Formação Equipe Core
- [ ] Recrutamento Eng. Eletrônico Sênior
- [ ] Recrutamento Dev Firmware STM32
- [ ] Treinamento KiCad avançado (2d)
- [ ] Treinamento STM32 (3d)
- [ ] Treinamento IEC 61851-1 (1d)

#### 1.4 Setup Infraestrutura Desenvolvimento
- [ ] Servidor desenvolvimento (AWS/Azure)
- [ ] Repositório privado (GitHub/GitLab)
- [ ] Pipeline CI/CD
- [ ] Ferramentas gestão projeto (Jira/Linear)
- [ ] Licenças software (KiCad Pro, etc.)

### Entregáveis Fase 1
- [ ] Empresa constituída e operacional
- [ ] Equipe de 5 pessoas formada
- [ ] Infraestrutura dev operacional
- [ ] Orçamento seed assegurado (R$ 500k)

### Orçamento Fase 1
| Item | Custo |
|------|------|
| Taxas legais constituição | R$ 3.000 |
| Treinamentos equipe | R$ 6.100 |
| Infraestrutura (1 mês) | R$ 900 |
| **TOTAL** | **R$ 10.000** |

---

## ⚡ Fase 2: Desenvolvimento Hardware (6 meses) {#fase-2}

**Duração:** Fevereiro - Julho 2025
**Orçamento:** R$ 470.350
**Status:** ⏳ Planejado

### Objetivos
- Desenvolver circuito Pilot Signal IEC 61851-1 completo
- Protótipos validados e testados
- Firmware funcional
- Dossiê certificação preparado

### Cronograma Detalhado

Ver **PLANNING_6_MOIS.md** para detalhes completos.

#### Mês 1-2: Concepção e Design
**Semanas 1-8**

- ✅ Especificações técnicas finalizadas
- ⬜ Esquema eletrônico completo (KiCad)
- ⬜ PCB 4-layer design finalizado
- ⬜ BOM com referências exatas
- ⬜ Firmware inicial (30% completo)
- ⬜ Pedido PCB + componentes

**Orçamento M1-2:** R$ 68.850

#### Mês 3: Prototipagem
**Semanas 9-13**

- ⬜ Recepção PCB e componentes
- ⬜ Montagem 2 protótipos
- ⬜ Testes elétricos básicos
- ⬜ Flash firmware no PCB
- ⬜ Validação PWM 1kHz

**Orçamento M3:** R$ 67.500

#### Mês 4: Testes e Validação
**Semanas 14-17**

- ⬜ Testes IEC 61851-1 completos (22 testes)
- ⬜ Testes segurança (isolação, fuga, etc.)
- ⬜ Identificação problemas
- ⬜ Correções e protótipos v2 se necessário

**Orçamento M4:** R$ 66.000

#### Mês 5: Otimização
**Semanas 18-22**

- ⬜ Montagem protótipos v2
- ⬜ Testes performance
- ⬜ **Testes veículos reais** (Nissan Leaf, Bolt, BMW i3)
- ⬜ Teste resistência 168h

**Orçamento M5:** R$ 66.000

#### Mês 6: Certificação
**Semanas 23-26**

- ⬜ Compilação dossiê técnico
- ⬜ Contato laboratórios credenciados (IPT, Lactec)
- ⬜ Documentação final (manuais PT)
- ⬜ Apresentação resultados
- ⬜ Amostras enviadas laboratório

**Orçamento M6:** R$ 136.000 (incluindo R$ 50k pré-certificação)

### Critérios de Sucesso Fase 2
- [ ] PWM 1kHz ±1% validado osciloscópio
- [ ] Estados A/B/C/D detectados (IEC 61851-1)
- [ ] 22/22 testes IEC 61851-1 aprovados
- [ ] Isolação >5MΩ (segurança)
- [ ] 3+ veículos reais carregam sem erro
- [ ] Teste resistência 168h: zero falhas
- [ ] Dossiê certificação INMETRO pronto

### Entregáveis Fase 2
- PCB v2 finalizado (Gerbers + fontes KiCad)
- Firmware v1.0 (código fonte + binário)
- BOM produção com MPN
- 5 protótipos funcionais
- Relatórios testes completos (IEC + segurança)
- Manual Técnico Eletroposto (PT)
- Manual do Usuário (PT)
- Dossiê certificação completo

### Equipe Fase 2
| Função | Alocação | Custo/mês |
|------|-----------|-----------|
| Eng. Eletrônico Sênior | 100% | R$ 18.000 |
| Dev Firmware STM32 | 100% | R$ 12.000 |
| Técnico Montagem | 100% | R$ 6.000 |
| Eng. Testes | 50% | R$ 4.500 |
| Gerente Projeto | 50% | R$ 7.500 |
| **TOTAL** | | **R$ 48.000/mês** |

### Riscos Fase 2
| Risco | Mitigação |
|--------|------------|
| Atraso shipping PCB | Pedir 2 semanas antes |
| Falha testes IEC | Dupla verificação design pré-pedido |
| Problema veículo real | Testar com 5 veículos diferentes |
| Componente defeituoso | Pedir 20% extra |

---

## 💻 Fase 3: Desenvolvimento Software (Paralelo) {#fase-3}

**Duração:** Março - Agosto 2025 (6 meses)
**Orçamento:** R$ 180.000
**Status:** ⏳ Planejado

### Objetivos
- Backend API completo (OCPP 1.6 + 2.0.1)
- Frontend web para gestão estações
- Aplicativo mobile usuários
- Sistema monitoramento tempo real
- Integração pagamento

### Cronograma

#### Mês 1-2: Backend API Core
**Março - Abril 2025**

- ⬜ API REST completa (Symfony + API Platform)
- ⬜ Implementação OCPP 1.6 (WebSocket)
- ⬜ CRUD estações, chargers, sessões
- ⬜ Sistema autenticação (JWT)
- ⬜ Testes unitários + integração (80% coverage)

**Entregáveis:**
- API REST completa documentada
- OCPP 1.6 funcional
- Testes automatizados

#### Mês 3-4: Frontend Web
**Maio - Junho 2025**

- ⬜ Dashboard admin (React/Vue.js)
- ⬜ Gestão estações e chargers
- ⬜ Visualização sessões em tempo real
- ⬜ Relatórios e analytics
- ⬜ Interface operador

**Entregáveis:**
- Dashboard web funcional
- Interface responsiva
- Documentação usuário

#### Mês 5: Aplicativo Mobile
**Julho 2025**

- ⬜ App React Native (iOS + Android)
- ⬜ Localização estações
- ⬜ QR code iniciar carregamento
- ⬜ Pagamento integrado
- ⬜ Histórico sessões

**Entregáveis:**
- App mobile beta (iOS + Android)
- Integração pagamento

#### Mês 6: Monitoramento & Implantação
**Agosto 2025**

- ⬜ Monitoramento Prometheus + Grafana
- ⬜ Logging centralizado (ELK)
- ⬜ Alertas incidentes
- ⬜ Pipeline CI/CD completo
- ⬜ Implantação produção

**Entregáveis:**
- Sistema monitoramento operacional
- Alertas configurados
- Pipeline CI/CD

### Equipe Fase 3
| Função | Alocação | Custo/mês |
|------|-----------|-----------|
| Backend Dev Senior | 100% | R$ 15.000 |
| Frontend Dev | 100% | R$ 12.000 |
| Mobile Dev | 75% | R$ 9.000 |
| DevOps | 50% | R$ 6.000 |
| QA Engineer | 50% | R$ 3.000 |
| **TOTAL** | | **R$ 45.000/mês** |

### Stack Tecnológico

**Backend:**
- Symfony 6.4 + API Platform 3.2
- PHP 8.3
- PostgreSQL 16
- Redis (cache)
- Mercure (real-time)

**Frontend:**
- React 18 + TypeScript
- Tailwind CSS
- React Query
- Recharts (gráficos)

**Mobile:**
- React Native 0.73
- Expo
- React Navigation

**Infraestrutura:**
- Docker + Kubernetes
- AWS/Azure
- Terraform
- GitHub Actions

### Orçamento Fase 3
| Item | Custo |
|------|------|
| Salários (6 meses) | R$ 270.000 |
| Infraestrutura cloud | R$ 30.000 |
| Licenças e ferramentas | R$ 10.000 |
| Serviços externos (pagamento) | R$ 20.000 |
| **TOTAL** | **R$ 330.000** |

---

## 🏆 Fase 4: Certificação e Validação (6 meses) {#fase-4}

**Duração:** Agosto 2025 - Janeiro 2026
**Orçamento:** R$ 150.000
**Status:** ⏳ Planejado

### Objetivos
- Certificação INMETRO obtida
- Certificação ANATEL (se WiFi/4G)
- Homologação completa
- Conformidade total IEC 61851-1

### Cronograma

#### Mês 7-8: Pré-Auditoria INMETRO
**Agosto - Setembro 2025**

- ⬜ Envio dossiê completo INMETRO
- ⬜ Pré-auditoria documentação
- ⬜ Correções menores solicitadas
- ⬜ Preparação 5 amostras certificadas

#### Mês 9-10: Testes Laboratório
**Outubro - Novembro 2025**

- ⬜ Testes IPT ou Lactec (laboratório credenciado)
  - Testes elétricos completos
  - Testes segurança
  - Testes EMC
  - Testes ambientais
- ⬜ Relatório resultados laboratório

#### Mês 11: Correções Finais
**Dezembro 2025**

- ⬜ Correções segundo relatório lab
- ⬜ Re-testes se necessário
- ⬜ Validação final

#### Mês 12: Certificação
**Janeiro 2026**

- ⬜ Certificado INMETRO emitido
- ⬜ Certificado ANATEL (se aplicável)
- ⬜ Homologação completa
- ⬜ Publicação registros oficiais

### Laboratórios Credenciados

| Laboratório | Localização | Especialidade | Custo Estimado |
|-------------|--------------|------------|-------------|
| **IPT** | São Paulo | Elétrico | R$ 40-60k |
| **Lactec** | Curitiba | Energia | R$ 50-70k |
| **Labelo** | São Paulo | EMC/Segurança | R$ 30-50k |

### Orçamento Fase 4
| Item | Custo |
|------|------|
| Testes laboratório credenciado | R$ 60.000 |
| Taxas INMETRO | R$ 50.000 |
| Taxas ANATEL (se aplicável) | R$ 20.000 |
| Correções e re-testes | R$ 10.000 |
| Consultores especializados | R$ 10.000 |
| **TOTAL** | **R$ 150.000** |

### Critérios de Sucesso Fase 4
- [ ] Certificado INMETRO Portaria 301/2019 obtido
- [ ] Certificado ANATEL (se módulos RF)
- [ ] Conformidade 100% IEC 61851-1
- [ ] Homologação veículos 5+ marcas
- [ ] Autorização comercialização

---

## 🚀 Fase 5: Instalação Piloto (3 meses) {#fase-5}

**Duração:** Fevereiro - Abril 2026
**Orçamento:** R$ 250.000
**Status:** ⏳ Planejado

### Objetivos
- Instalar 5 estações piloto
- Validar em condições reais
- Coletar dados uso
- Ajustar modelo operacional

### Estações Piloto

| Estação | Localização | Tipo | Chargers | Investimento |
|---------|--------------|------|----------|----------------|
| **Piloto 1** | São Paulo - Shopping | Público | 4x 22kW | R$ 80.000 |
| **Piloto 2** | São Paulo - Condomínio | Privado | 2x 7kW | R$ 40.000 |
| **Piloto 3** | Rio - Empresa | Comercial | 3x 22kW | R$ 60.000 |
| **Piloto 4** | Curitiba - Estacionamento | Público | 4x 22kW | R$ 80.000 |
| **Piloto 5** | Brasília - Hotel | Comercial | 2x 22kW | R$ 50.000 |

### Cronograma

#### Mês 1: Preparação
**Fevereiro 2026**

- ⬜ Seleção localizações finais
- ⬜ Negociação contratos
- ⬜ Estudos elétricos sites
- ⬜ Licenças e autorizações
- ⬜ Pedido equipamentos (100 PCB)

#### Mês 2: Instalação
**Março 2026**

- ⬜ Obras civis
- ⬜ Instalação elétrica
- ⬜ Montagem estações
- ⬜ Configuração rede
- ⬜ Testes comissionamento

#### Mês 3: Operação Piloto
**Abril 2026**

- ⬜ Abertura ao público
- ⬜ Monitoramento 24/7
- ⬜ Suporte usuários
- ⬜ Coleta métricas
- ⬜ Ajustes operacionais

### Métricas Piloto

Objetivos a medir:
- **Uptime:** >98%
- **Sessões/dia:** >30
- **Satisfação:** >4.5/5
- **Tempo resolução incidentes:** <4h
- **Receitas/estação:** >R$ 2.000/mês

### Orçamento Fase 5

| Item | Custo |
|------|------|
| Produção 100 PCB montados | R$ 46.000 |
| Obras civis + elétrica (5 sites) | R$ 100.000 |
| Equipamentos complementares | R$ 50.000 |
| Instalação e comissionamento | R$ 30.000 |
| Marketing lançamento | R$ 15.000 |
| Contingência 10% | R$ 24.000 |
| **TOTAL** | **R$ 265.000** |

---

## 📈 Fase 6: Operação e Expansão (12+ meses) {#fase-6}

**Duração:** Maio 2026 - Dezembro 2027
**Orçamento:** R$ 3.500.000 (100 estações)
**Status:** ⏳ Planejado

### Objetivos
- Implantação 100 estações
- Operação rentável
- Expansão territorial
- Captação Série A

### Cronograma Expansão

#### Semestre 1: Consolidação
**Maio - Outubro 2026**

- ⬜ Otimização operações piloto
- ⬜ Implantação 20 novas estações
- ⬜ Equipe operações 10 pessoas
- ⬜ Centro suporte cliente
- ⬜ Receita recorrente estabelecida

**Objetivos S1:**
- 25 estações totais
- 500 sessões/mês
- R$ 50k receitas/mês

#### Semestre 2: Aceleração
**Novembro 2026 - Abril 2027**

- ⬜ Implantação 30 estações
- ⬜ Expansão novas cidades (RJ, BH, Curitiba)
- ⬜ Parcerias estratégicas (frotas)
- ⬜ Captação Série A (R$ 5M)

**Objetivos S2:**
- 55 estações totais
- 2.000 sessões/mês
- R$ 200k receitas/mês
- Break-even operacional

#### Ano 2: Crescimento
**Maio - Dezembro 2027**

- ⬜ Implantação 45 estações
- ⬜ Expansão nacional
- ⬜ Recarga rápida 150kW
- ⬜ Ofertas corporativas

**Objetivos A2:**
- 100 estações totais
- 8.000 sessões/mês
- R$ 800k receitas/mês
- EBITDA positivo

### Modelo Operacional

**Equipe Operações (100 estações):**
- Diretor operações: 1
- Gerentes regionais: 3
- Técnicos manutenção: 10
- Suporte cliente: 5
- Comercial: 3
- Marketing: 2
- Admin/financeiro: 2
- **Total:** 26 pessoas

**Custo operacional mensal:**
- Salários equipe: R$ 180.000
- Manutenção preventiva: R$ 30.000
- Eletricidade: R$ 50.000
- Conectividade: R$ 10.000
- Suporte TI: R$ 15.000
- Marketing: R$ 25.000
- **Total:** R$ 310.000/mês

**Receitas projetadas (100 estações):**
- Preço médio/kWh: R$ 1.50
- Sessões/mês/estação: 80
- kWh médio/sessão: 25
- **Receita/estação/mês:** R$ 3.000
- **Receita total/mês:** R$ 300.000

**Rentabilidade:**
- Receitas: R$ 300k/mês
- Custos operações: R$ 310k/mês
- **EBITDA:** -R$ 10k/mês (break-even próximo)
- **Com 120 estações:** +R$ 50k/mês EBITDA

### Orçamento Fase 6

| Item | Custo Total |
|------|------------|
| Implantação 95 novas estações | R$ 2.850.000 |
| Operações 18 meses | R$ 5.580.000 |
| Marketing | R$ 450.000 |
| Captação Série A (custos) | R$ 200.000 |
| Contingência | R$ 420.000 |
| **TOTAL** | **R$ 9.500.000** |

**Financiamento:**
- Cashflow operacional: R$ 2.000.000
- Série A: R$ 5.000.000
- Financiamento equipamentos: R$ 2.500.000

---

## 📅 Cronograma Global {#cronograma}

### Visão 24 Meses

```
2025
├── JAN  ✅ Fase 0 completo + Fase 1 iniciada
├── FEV  🔄 Fase 1 + Fase 2 início
├── MAR  ⚡ Fase 2 + Fase 3 (paralelo)
├── ABR  ⚡ Fase 2 Mês 2
├── MAI  ⚡ Fase 2 Mês 3 + Fase 3
├── JUN  ⚡ Fase 2 Mês 4 + Fase 3
├── JUL  ⚡ Fase 2 Mês 5 + Fase 3
├── AGO  ⚡ Fase 2 Mês 6 + Fase 3 + Fase 4 início
├── SET  🏆 Fase 4 Certificação
├── OUT  🏆 Fase 4 Testes lab
├── NOV  🏆 Fase 4 Testes lab
└── DEZ  🏆 Fase 4 Correções

2026
├── JAN  🏆 Fase 4 Certificados obtidos
├── FEV  🚀 Fase 5 Piloto início
├── MAR  🚀 Fase 5 Instalação
├── ABR  🚀 Fase 5 Operação piloto
├── MAI  📈 Fase 6 Expansão início
├── JUN  📈 Fase 6 Implantação S1
├── JUL  📈 Fase 6
├── AGO  📈 Fase 6
├── SET  📈 Fase 6
├── OUT  📈 Fase 6 (25 estações)
├── NOV  📈 Fase 6 Expansão S2
└── DEZ  📈 Fase 6

2027
├── JAN-ABR  📈 Fase 6 S2 (55 estações)
├── MAI-DEZ  📈 Fase 6 Crescimento (100 estações)
└── DEZ      🎯 Objetivo 100 estações alcançado
```

### Marcos Críticos

| Data | Marco | Descrição |
|------|-------|-------------|
| **Jan 2025** | ✅ M0 | Documentação completa + KiCad exemplo |
| **Fev 2025** | 🎯 M1 | Equipe formada + empresa constituída |
| **Jul 2025** | 🎯 M2 | Protótipos validados + firmware v1.0 |
| **Ago 2025** | 🎯 M3 | Dossiê certificação depositado |
| **Jan 2026** | 🎯 M4 | Certificado INMETRO obtido |
| **Abr 2026** | 🎯 M5 | 5 estações piloto operacionais |
| **Out 2026** | 🎯 M6 | 25 estações + break-even |
| **Abr 2027** | 🎯 M7 | 55 estações + Série A |
| **Dez 2027** | 🎯 M8 | 100 estações + rentabilidade |

---

## 🔗 Dependências Entre Fases {#dependencias}

### Diagrama de Dependências

```
Fase 0: Fundações (COMPLETO ✅)
    │
    ├─→ Fase 1: Planejamento (EM ANDAMENTO 🔄)
    │       │
    │       └─→ Fase 2: Hardware (6 meses) ⚡
    │               │
    │               ├─→ Fase 4: Certificação (6 meses) 🏆
    │               │       │
    │               │       └─→ Fase 5: Piloto (3 meses) 🚀
    │               │               │
    │               │               └─→ Fase 6: Expansão 📈
    │               │
    │               └─→ Fornecimento specs para Fase 3
    │
    └─→ Fase 3: Software (6 meses, paralelo) 💻
            │
            └─→ Necessário para Fase 5 e 6
```

### Dependências Críticas

**Fase 2 → Fase 4:**
- Protótipos validados requeridos antes certificação
- Dossiê técnico completo necessário
- ⚠️ Risco: Atraso Fase 2 = atraso certificação 1:1

**Fase 2 + Fase 4 → Fase 5:**
- Certificação INMETRO obrigatória antes instalação
- PCB produção requer design finalizado
- ⚠️ Risco: Sem certificação = impossível instalar

**Fase 3 → Fase 5:**
- Backend OCPP funcional requerido
- App mobile para usuários necessário
- Dashboard operador indispensável
- ⚠️ Risco: Software não pronto = estações não operacionais

**Fase 5 → Fase 6:**
- Sucesso piloto valida modelo
- Métricas piloto informam expansão
- ⚠️ Risco: Falha piloto = pivot necessário

---

## 💰 Orçamento Global {#orcamento}

### Resumo Por Fase

| Fase | Duração | Orçamento | Status |
|-------|-------|--------|--------|
| **Fase 0: Fundações** | Nov 2024 | R$ 0 | ✅ Completo |
| **Fase 1: Planejamento** | Jan 2025 | R$ 10.000 | 🔄 Em andamento |
| **Fase 2: Hardware** | 6 meses | R$ 470.350 | ⏳ Planejado |
| **Fase 3: Software** | 6 meses | R$ 330.000 | ⏳ Planejado |
| **Fase 4: Certificação** | 6 meses | R$ 150.000 | ⏳ Planejado |
| **Fase 5: Piloto** | 3 meses | R$ 265.000 | ⏳ Planejado |
| **Fase 6: Expansão** | 18 meses | R$ 3.500.000 | ⏳ Planejado |
| **TOTAL 24 MESES** | | **R$ 4.725.350** | |

### Distribuição Orçamento Total

```
Orçamento Total: R$ 4.725.350

Desenvolvimento (Fase 1-3):     R$ 810.350  (17%)
├─ Hardware                     R$ 470.350
├─ Software                     R$ 330.000
└─ Planejamento                 R$ 10.000

Certificação (Fase 4):          R$ 150.000  (3%)

Implantação (Fase 5-6):         R$ 3.765.000 (80%)
├─ Piloto (5 estações)          R$ 265.000
└─ Expansão (95 estações)       R$ 3.500.000
```

### Financiamento Por Fase

**Rodada Seed (Fase 1-4):** R$ 1.000.000
- Bootstrapping: R$ 50.000
- Anjos/FFF: R$ 200.000
- Seed VC: R$ 750.000

**Série A (Fase 5-6):** R$ 5.000.000
- Investidor líder: R$ 3.000.000
- Co-investidores: R$ 2.000.000

**Financiamento equipamentos:** R$ 2.500.000
- Bancos: R$ 1.500.000
- Leasing: R$ 1.000.000

**Total captado:** R$ 8.500.000

### ROI e Rentabilidade

**Investimento total:** R$ 4.725.350
**Receita mensal (100 estações):** R$ 300.000
**Custos operacionais mensais:** R$ 310.000

**Break-even:** 120 estações (~30 meses)
**ROI 5 anos:** 280% (estação rentável após 18 meses)

**Valuation projetado:**
- Seed (2025): R$ 5M
- Série A (2027): R$ 50M
- Exit/IPO (2030): R$ 500M+ (objetivo)

---

## ⚠️ Riscos e Mitigações {#riscos}

### Matriz de Riscos

| Categoria | Risco | Probabilidade | Impacto | Mitigação |
|-----------|--------|-------------|--------|------------|
| **Técnico** | Falha certificação INMETRO | Médio (20%) | Crítico | Dupla validação design, consultor expert |
| **Técnico** | Problema compatibilidade veículos | Médio (25%) | Alto | Testes com 10+ modelos diferentes |
| **Financeiro** | Estouro orçamento 30%+ | Alto (40%) | Alto | Contingência 20%, orçamento conservador |
| **Operacional** | Pane crítica estações | Alto (50%) | Médio | Monitoramento 24/7, peças reposição |
| **Comercial** | Adoção lenta mercado | Médio (30%) | Crítico | Marketing agressivo, preços competitivos |
| **Regulatório** | Mudança regulação | Baixo (10%) | Alto | Vigilância regulatória, lobby |
| **Supply Chain** | Atraso componentes | Alto (40%) | Médio | Estoque tampão, fornecedores múltiplos |
| **Humano** | Saída key person | Médio (20%) | Alto | Documentação, treinamento cruzado |
| **Concorrência** | Entrada grande player | Médio (30%) | Alto | Inovação contínua, fidelização |
| **Tecnológico** | Obsolescência rápida | Baixo (15%) | Médio | Arquitetura modular, updates |

### Planos de Contingência

#### Falha Certificação
- **Ação:** Consultor expert certificação contratado desde Fase 2
- **Orçamento:** +R$ 30k
- **Prazo:** +2 meses

#### Atraso Supply Chain Crítico
- **Ação:** Pedir componentes críticos 3 meses antes
- **Orçamento:** +R$ 50k estoque
- **Prazo:** +1 mês

#### Adoção Mercado Lenta
- **Ação:** Pivot B2B corporativo, parcerias frotas
- **Orçamento:** -30% receitas A1
- **Prazo:** -6 meses break-even

---

## 📍 Pontos de Decisão Go/No-Go

### Checkpoint 1: Fim Fase 2 (Julho 2025)
**Critérios:**
- [ ] Protótipos validados 3+ veículos diferentes
- [ ] Testes IEC 61851-1: 22/22 aprovados
- [ ] Orçamento Fase 2 ≤ R$ 550k (orçamento + 15%)
- [ ] Equipe estável (0 saída)

**Decisão:** GO → Fase 4 Certificação / NO-GO → Pivot ou parada

### Checkpoint 2: Fim Fase 4 (Janeiro 2026)
**Critérios:**
- [ ] Certificado INMETRO obtido
- [ ] Backend + App funcionais
- [ ] Orçamento Fases 2-4 ≤ R$ 1.1M
- [ ] Contratos piloto assinados (3 mínimo)

**Decisão:** GO → Fase 5 Piloto / NO-GO → Re-certificação ou pivot

### Checkpoint 3: Fim Fase 5 (Abril 2026)
**Critérios:**
- [ ] 5 estações operacionais
- [ ] Uptime >95%
- [ ] Satisfação >4.0/5
- [ ] R$ 10k+ receitas/mês
- [ ] Pipeline Série A sólido

**Decisão:** GO → Fase 6 Expansão / NO-GO → Otimização piloto 3 meses

---

## 📚 Documentação Associada

### Documentos Estratégicos
- `/docs/planning/VISAO_PROJETO.md` - Visão global
- `/docs/planning/ESTUDO_MERCADO.md` - Estudo mercado brasileiro
- `/PROJECT_SUMMARY.md` - Resumo executivo

### Gestão e Orçamento
- `/docs/management/PLANNING_6_MOIS.md` - Planejamento detalhado Fase 2
- `/docs/management/GUIDE_ACHAT_COMPOSANTS.md` - Guia compras
- `/docs/management/budget/ORCAMENTO_DETALHADO.md` - Orçamento detalhado
- `/docs/management/risks/ANALISE_RISCOS.md` - Análise riscos

### Técnico Hardware
- `/docs/technical/FABRICATION_BORNES_DIY.md` - Viabilidade DIY
- `/docs/technical/GUIDE_SOUDURE_ASSEMBLAGE.md` - Guia montagem
- `/docs/technical/GUIDE_TEST_VALIDATION.md` - Protocolos testes
- `/docs/technical/OUTILS_CONCEPTION_SCHEMAS.md` - Guia ferramentas
- `/hardware/kicad_examples/README.md` - Documentação KiCad

### Técnico Software
- `/docs/technical/architecture/ARQUITETURA_SISTEMA.md` - Arquitetura sistema
- `/docs/technical/API_DOCUMENTATION.md` - Documentação API
- `/docs/technical/DEPLOYMENT_GUIDE.md` - Guia implantação
- `/docs/technical/MONITORING_OBSERVABILITY.md` - Monitoramento

### Versões Português (PT-BR)
- `/docs/management/pt-br/PLANEJAMENTO_6_MESES.md`
- `/docs/management/pt-br/GUIA_COMPRA_COMPONENTES.md`
- `/docs/technical/pt-br/GUIA_SOLDAGEM_MONTAGEM.md`
- `/docs/technical/pt-br/GUIA_TESTE_VALIDACAO.md`

---

## 🎯 Próximas Ações Imediatas

### Esta Semana (Jan 2025)
1. [x] Criar este roteiro
2. [ ] Finalizar plano negócios 2025-2027
3. [ ] Preparar pitch deck investidores
4. [ ] Listar candidatos equipe core (5 pessoas)
5. [ ] Identificar 3 laboratórios certificação

### Este Mês (Janeiro 2025)
1. [ ] Constituir empresa (LTDA)
2. [ ] Recrutar Eng. Eletrônico + Dev Firmware
3. [ ] Assegurar R$ 200k seed inicial
4. [ ] Setup infraestrutura desenvolvimento
5. [ ] Lançar Fase 2 (Hardware)

### Este Trimestre (Q1 2025)
1. [ ] Fase 1 completada 100%
2. [ ] Fase 2 lançada (M1-2 completos)
3. [ ] Fase 3 iniciada (backend)
4. [ ] Rodada seed fechada (R$ 500k)
5. [ ] Esquema eletrônico + PCB design finalizados

---

## 📞 Contato e Governança

### Equipe Liderança

**Fundador/CEO:** [A definir]
**CTO Hardware:** [A recrutar]
**CTO Software:** [A recrutar]
**CFO:** [A recrutar]
**COO:** [A recrutar]

### Conselheiros

**Conselheiro Certificação:** [Expert INMETRO]
**Conselheiro Hardware:** [Expert eletrônica automotiva]
**Conselheiro Software:** [Expert OCPP/recarga VE]
**Conselheiro Negócios:** [Expert mobilidade elétrica BR]

### Conselho

- Fundador/CEO
- Investidor líder (pós-seed)
- Membro conselho independente (expert VE)

---

## 📊 KPIs Globais Projeto

### Fase 2-3 (Desenvolvimento)
- Respeito planejamento: ±10%
- Respeito orçamento: ±15%
- Testes aprovados: 100%
- Code coverage: >80%

### Fase 4 (Certificação)
- Prazo certificação: <8 meses
- Taxa sucesso testes lab: 100%
- Orçamento certificação: ≤R$ 150k

### Fase 5-6 (Implantação)
- Uptime estações: >98%
- Satisfação cliente: >4.5/5
- Tempo resolução: <4h
- Receitas/estação: >R$ 3k/mês

### Financeiro Global
- Burn rate mensal: <orçamento +10%
- CAC (custo aquisição cliente): <R$ 50
- LTV/CAC ratio: >3:1
- Meses até break-even: <30

---

**Documento criado por:** Equipe Eletroposto
**Versão:** 2.0
**Data:** 2025-01-11
**Próxima revisão:** 2025-02-11 (mensal)

---

🚀 **Vamos construir o futuro da recarga de VEs no Brasil!** ⚡🇧🇷
