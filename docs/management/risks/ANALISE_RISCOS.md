# 🛡️ Análise de Riscos - Projeto Eletroposto

**Versão:** 1.0
**Data:** Janeiro 2025
**Projeto:** Rede de Eletropostos - Belém/PA

---

## 📊 Matriz de Classificação de Riscos

### Probabilidade
- **Baixa (B):** < 20% de chance
- **Média (M):** 20-50% de chance
- **Alta (A):** > 50% de chance

### Impacto
- **Baixo (B):** Impacto financeiro < R$ 50k, atraso < 1 mês
- **Médio (M):** Impacto financeiro R$ 50k-200k, atraso 1-3 meses
- **Alto (A):** Impacto financeiro > R$ 200k, atraso > 3 meses

### Severidade (Probabilidade × Impacto)
- **Verde:** Baixo-Baixo, Baixo-Médio
- **Amarelo:** Médio-Médio, Baixo-Alto, Alto-Baixo
- **Vermelho:** Alto-Médio, Médio-Alto, Alto-Alto

---

## 🔴 Riscos Críticos (Vermelhos)

### R01 - Atraso na Importação de Carregadores

**Categoria:** Fornecimento
**Probabilidade:** Alta (A)
**Impacto:** Alto (A)
**Severidade:** 🔴 CRÍTICA

#### Descrição
Atrasos na importação de carregadores DC da China/Europa podem comprometer o cronograma de implantação, especialmente considerando processos alfandegários brasileiros complexos.

#### Causas
- Burocracia alfandegária brasileira
- Falta de certificação INMETRO
- Problemas logísticos internacionais
- Conflitos comerciais/tarifas de importação
- Falta de containers disponíveis

#### Impacto
- **Financeiro:** R$ 200k-500k (custos de armazenagem, multas contratuais)
- **Cronograma:** Atraso de 3-6 meses
- **Reputação:** Perda de credibilidade com primeiros clientes
- **Competitivo:** Concorrentes podem ocupar mercado

#### Mitigação
1. **Pré-qualificação de fornecedores** (2 meses antes):
   - Contratar 2-3 fornecedores homologados (ABB, Siemens, BYD)
   - Verificar certificações INMETRO prévias
   - Estabelecer contratos com cláusulas de penalidade

2. **Despachante aduaneiro especializado**:
   - Contratar empresa com experiência em equipamentos elétricos
   - Preparar documentação com 3 meses de antecedência
   - Orçamento: R$ 15k-25k

3. **Estoque de segurança**:
   - Importar 1 carregador adicional (+R$ 100k)
   - Manter em estoque para substituição rápida

4. **Fornecedor nacional secundário**:
   - Identificar montadoras brasileiras (WEG, Tupinambá)
   - Custo 20-30% superior, mas entrega mais rápida

#### Contingência
- Iniciar operações com 2 carregadores ao invés de 3
- Alugar carregadores móveis temporariamente (R$ 8k/mês)
- Renegociar prazos com parceiros

#### Monitoramento
- **Indicador:** Dias desde pedido até desembaraço
- **Meta:** ≤ 60 dias
- **Frequência:** Semanal
- **Responsável:** Gerente de Operações

---

### R02 - Vandalismo e Roubo de Equipamentos

**Categoria:** Segurança
**Probabilidade:** Média (M)
**Impacto:** Alto (A)
**Severidade:** 🔴 CRÍTICA

#### Descrição
Cabos de carregamento (cobre), componentes eletrônicos e até carregadores completos podem ser alvo de furto/vandalismo, especialmente em estações menos monitoradas.

#### Causas
- Alto valor de revenda do cobre
- Localização em áreas de baixa vigilância
- Operação 24/7 sem segurança física
- Componentes eletrônicos valiosos

#### Impacto
- **Financeiro:** R$ 50k-150k por incidente (reposição + seguro)
- **Operacional:** 2-4 semanas de estação offline
- **Experiência do usuário:** Frustração, perda de confiança
- **Receita:** R$ 15k-30k de faturamento perdido

#### Mitigação
1. **Segurança física robusta**:
   - Câmeras IP 360° com visão noturna (R$ 12k por estação)
   - Sensores de movimento e abertura (R$ 5k)
   - Iluminação LED de alta potência (R$ 8k)
   - Cercamento reforçado em áreas críticas (R$ 15k)

2. **Monitoramento remoto**:
   - Central de monitoramento 24/7 terceirizada (R$ 3k/mês)
   - Alertas em tempo real via WebSocket/SMS
   - Integração com polícia militar (convênios)

3. **Design anti-vandalismo**:
   - Cabos permanentes (não removíveis)
   - Parafusos de segurança torx
   - Gabinetes em aço inox reforçado
   - Componentes sem valor de revenda

4. **Seguro específico**:
   - Apólice para equipamentos elétricos (R$ 18k/ano)
   - Cobertura para vandalismo, incêndio, raio
   - Franquia: R$ 5k

#### Contingência
- Estoque de cabos e componentes críticos (R$ 30k)
- Parceria com fornecedor para reposição express (48h)
- Carregadores móveis para backup temporário

#### Monitoramento
- **Indicador:** Incidentes de segurança/mês
- **Meta:** 0 incidentes
- **Frequência:** Diária
- **Responsável:** Supervisor de Segurança

---

### R03 - Inadimplência de Clientes Corporativos

**Categoria:** Financeiro
**Probabilidade:** Média (M)
**Impacto:** Alto (A)
**Severidade:** 🔴 CRÍTICA

#### Descrição
Clientes corporativos (frotas) podem representar 40-60% da receita. Atrasos ou inadimplência afetam fluxo de caixa crítico para operação.

#### Causas
- Crise econômica setorial (transporte, logística)
- Burocracia em pagamentos de empresas públicas
- Disputas contratuais sobre valores
- Falência de clientes

#### Impacto
- **Financeiro:** R$ 80k-200k/mês de receita bloqueada
- **Fluxo de caixa:** Impossibilidade de pagar fornecedores
- **Operacional:** Corte de energia por inadimplência própria
- **Crescimento:** Impossibilidade de expandir rede

#### Mitigação
1. **Análise de crédito rigorosa**:
   - Consulta Serasa/Boa Vista (R$ 500/mês)
   - Limite de crédito por cliente (máx. R$ 50k)
   - Exigir garantias para contratos > R$ 100k/ano

2. **Modelo de pagamento antecipado**:
   - Pré-pagamento para 70% dos clientes PF
   - Boleto/PIX com desconto (5% para antecipação)
   - Créditos de recarga (pacotes pré-pagos)

3. **Diversificação de clientes**:
   - Não depender de 1 cliente > 15% da receita
   - Mix balanceado: 40% PF, 40% frotas, 20% parcerias

4. **Fundo de reserva**:
   - Capital de giro equivalente a 3 meses de operação (R$ 150k)
   - Linha de crédito pré-aprovada (R$ 300k) com juros baixos

#### Contingência
- Suspensão automática de acesso após 15 dias de atraso
- Cobrança judicial para valores > R$ 10k
- Renegociação de contratos com clientes estratégicos

#### Monitoramento
- **Indicador:** DSO (Days Sales Outstanding)
- **Meta:** ≤ 30 dias
- **Frequência:** Semanal
- **Responsável:** Controller Financeiro

---

## 🟡 Riscos Médios (Amarelos)

### R04 - Instabilidade da Rede Elétrica

**Categoria:** Infraestrutura
**Probabilidade:** Alta (A)
**Impacto:** Médio (M)
**Severidade:** 🟡 MÉDIA

#### Descrição
Belém possui histórico de quedas de energia, especialmente no período chuvoso (janeiro-maio). Interrupções afetam operação dos carregadores.

#### Causas
- Tempestades tropicais
- Sobrecarga da rede Equatorial Energia
- Manutenções programadas não avisadas
- Queimadas próximas a linhas de transmissão

#### Impacto
- **Financeiro:** R$ 10k-30k/mês (receita perdida)
- **Operacional:** Carregamentos interrompidos
- **Experiência:** Frustração de clientes (NPS -20 pontos)
- **Equipamentos:** Risco de queima por surtos

#### Mitigação
1. **No-breaks industriais**:
   - UPS 30 kVA por estação (R$ 45k cada)
   - Autonomia de 30 minutos (tempo para desligar com segurança)

2. **Proteção contra surtos**:
   - DPS (Dispositivo de Proteção contra Surtos) trifásico (R$ 8k)
   - Aterramento robusto conforme NBR 5410

3. **Gerador diesel de backup** (opcional):
   - Gerador 100 kVA (R$ 150k)
   - Apenas para estação principal (maior movimento)
   - Ativação automática em 30 segundos

4. **Monitoramento proativo**:
   - Integração com API da Equatorial Energia
   - Alertas de queda/retorno de energia
   - Desligamento suave de carregamentos em andamento

#### Contingência
- Comunicação proativa com clientes sobre previsão de quedas
- Créditos de compensação para carregamentos interrompidos
- Parceria com Equatorial para priorização de religamento

#### Monitoramento
- **Indicador:** Horas offline/mês
- **Meta:** < 10 horas/mês
- **Frequência:** Diária

---

### R05 - Baixa Adesão Inicial de Usuários

**Categoria:** Mercado
**Probabilidade:** Média (M)
**Impacto:** Médio (M)
**Severidade:** 🟡 MÉDIA

#### Descrição
Mercado de VE em Belém ainda é pequeno (1.255 unidades em 2024). Baixa adesão inicial pode comprometer ROI e fluxo de caixa nos primeiros 12 meses.

#### Causas
- Baixa penetração de VE na frota local
- Desconhecimento sobre carregamento público
- Concorrência de carregamento residencial
- Preço percebido como alto

#### Impacto
- **Financeiro:** R$ 100k-200k de receita não atingida no Ano 1
- **Cronograma:** Atraso no break-even (24 → 36 meses)
- **Investidores:** Perda de confiança
- **Expansão:** Impossibilidade de abrir novas estações

#### Mitigação
1. **Marketing agressivo pré-lançamento** (6 meses antes):
   - Investimento: R$ 80k (10% do orçamento)
   - Redes sociais (Instagram, Facebook)
   - Parcerias com concessionárias de VE (Caoa Chery, BYD Belém)
   - Eventos em shopping centers

2. **Programa de fidelidade**:
   - Cashback de 10% nas primeiras 10 recargas
   - Plano mensal "ilimitado" R$ 499/mês (frotas)
   - Indicação: R$ 20 de crédito para ambos

3. **Parcerias estratégicas**:
   - Convênios com empresas (Uber, iFood, 99)
   - Descontos para funcionários públicos (COP30)
   - Integração com apps de mobilidade

4. **Preços promocionais**:
   - Primeiros 3 meses: 30% de desconto
   - Horário off-peak (22h-6h): 20% desconto
   - Carregamento completo grátis na inauguração

#### Contingência
- Reduzir custos operacionais (automatizar atendimento)
- Buscar clientes âncora (frotas governamentais/Uber)
- Estender promoções por mais 3 meses

#### Monitoramento
- **Indicador:** Usuários ativos/mês
- **Meta:** 200 usuários no Mês 6
- **Frequência:** Semanal

---

### R06 - Falha no Protocolo OCPP (Carregadores Offline)

**Categoria:** Tecnologia
**Probabilidade:** Média (M)
**Impacto:** Médio (M)
**Severidade:** 🟡 MÉDIA

#### Descrição
Bugs no servidor WebSocket (Ratchet) ou incompatibilidades do protocolo OCPP 1.6 podem causar perda de comunicação com carregadores.

#### Causas
- Bugs no código PHP do servidor OCPP
- Incompatibilidades entre fabricantes de carregadores
- Timeout de conexão WebSocket
- Sobrecarga do servidor em horário de pico
- Ataques DDoS

#### Impacto
- **Operacional:** Carregadores offline sem controle remoto
- **Financeiro:** R$ 5k-15k/semana de receita perdida
- **Dados:** Perda de métricas de carregamento
- **Experiência:** Clientes não conseguem iniciar carregamento

#### Mitigação
1. **Testes rigorosos de integração**:
   - Homologação com 3 fabricantes diferentes
   - Simulador OCPP 1.6 para testes automatizados
   - Testes de stress (100 carregadores simultâneos)

2. **Monitoramento em tempo real**:
   - Dashboard de status de conexão WebSocket
   - Alertas automáticos se carregador offline > 5 min
   - Logs detalhados de mensagens OCPP

3. **Arquitetura resiliente**:
   - Load balancer Nginx para WebSocket
   - Auto-restart do servidor se crash
   - Fila Redis para mensagens não entregues
   - Fallback para modo offline (carregador autônomo)

4. **Suporte técnico especializado**:
   - Contrato de suporte com fabricante de carregadores
   - Desenvolvedor PHP/Symfony sênior on-call (R$ 12k/mês)

#### Contingência
- Modo degradado: carregadores funcionam sem backend
- Reinicialização remota de carregadores via 4G
- Atualização de firmware over-the-air (OTA)

#### Monitoramento
- **Indicador:** Uptime do servidor OCPP
- **Meta:** ≥ 99.5%
- **Frequência:** Contínua (real-time)

---

### R07 - Conformidade LGPD (Lei Geral de Proteção de Dados)

**Categoria:** Legal/Regulatório
**Probabilidade:** Baixa (B)
**Impacto:** Alto (A)
**Severidade:** 🟡 MÉDIA

#### Descrição
Coleta de dados pessoais (CPF, e-mail, localização, histórico de carregamento) sem compliance adequado pode gerar multas de até R$ 50 milhões.

#### Causas
- Desconhecimento da legislação
- Falta de Política de Privacidade clara
- Ausência de DPO (Data Protection Officer)
- Vazamento de dados por falha de segurança
- Não obter consentimento explícito

#### Impacto
- **Legal:** Multa de até 2% do faturamento (máx. R$ 50 milhões)
- **Reputacional:** Perda total de confiança
- **Operacional:** Suspensão do sistema pela ANPD
- **Financeiro:** R$ 100k-500k em adequações emergenciais

#### Mitigação
1. **Adequação desde o Design (Privacy by Design)**:
   - Criptografia de dados pessoais (AES-256)
   - Minimização de coleta (apenas dados necessários)
   - Anonimização de dados analíticos
   - Direito ao esquecimento (exclusão em 30 dias)

2. **Documentação legal completa**:
   - Política de Privacidade em linguagem clara
   - Termo de Consentimento explícito (opt-in)
   - Registro de tratamento de dados (ROPA)
   - Contratos com processadores (AWS, Stripe)

3. **DPO (Data Protection Officer)**:
   - Contratar consultoria LGPD (R$ 8k/mês)
   - Treinamento interno sobre proteção de dados
   - Auditorias anuais de compliance

4. **Segurança da informação**:
   - Firewall WAF (Web Application Firewall)
   - Testes de penetração (pentest) semestrais (R$ 15k)
   - Certificado SSL/TLS para todas as comunicações
   - Logs de acesso a dados pessoais

#### Contingência
- Seguro de responsabilidade cibernética (R$ 12k/ano)
- Plano de resposta a incidentes (notificação ANPD em 72h)
- Comunicação transparente com usuários em caso de vazamento

#### Monitoramento
- **Indicador:** Incidentes de vazamento de dados
- **Meta:** 0 incidentes
- **Frequência:** Mensal (auditorias)

---

## 🟢 Riscos Baixos (Verdes)

### R08 - Mudanças Regulatórias (ANEEL)

**Categoria:** Regulatório
**Probabilidade:** Baixa (B)
**Impacto:** Médio (M)
**Severidade:** 🟢 BAIXA

#### Descrição
Novas regulamentações da ANEEL sobre tarifação de energia para eletropostos podem alterar modelo de negócio.

#### Mitigação
- Acompanhar consultas públicas da ANEEL
- Participar de associações do setor (ABVE)
- Modelo tarifário flexível no sistema

---

### R09 - Concorrência de Grandes Players

**Categoria:** Mercado
**Probabilidade:** Média (M)
**Impacto:** Baixo (B)
**Severidade:** 🟢 BAIXA

#### Descrição
Entrada de grandes redes (Shell Recharge, Ipiranga Eletra, Copel) pode pressionar margens.

#### Mitigação
- Foco em atendimento local diferenciado
- Parcerias com comércio local
- Programa de fidelidade robusto
- Agilidade em novas localizações

---

### R10 - Problemas de Conectividade 4G/5G

**Categoria:** Tecnologia
**Probabilidade:** Baixa (B)
**Impacto:** Baixo (B)
**Severidade:** 🟢 BAIXA

#### Descrição
Instabilidade de sinal 4G em alguns pontos pode afetar comunicação OCPP.

#### Mitigação
- Múltiplas operadoras (Vivo, Claro, TIM)
- Fallback para operação offline
- Antenas externas de alto ganho

---

## 📋 Plano de Monitoramento de Riscos

### Reuniões

| Frequência | Participantes | Objetivo |
|------------|---------------|----------|
| **Semanal** | Gerente de Operações, CTO | Review de indicadores críticos |
| **Mensal** | Diretoria, Financeiro | Dashboard de riscos + KPIs |
| **Trimestral** | Board, Investidores | Revisão estratégica de riscos |

### Dashboard de Riscos

**Indicadores-chave:**

1. **Uptime de Estações:** ≥ 99%
2. **DSO (Dias de recebimento):** ≤ 30 dias
3. **Incidentes de Segurança:** 0/mês
4. **NPS (Net Promoter Score):** ≥ 50
5. **Uptime Servidor OCPP:** ≥ 99.5%
6. **Inadimplência:** < 2%

### Escalação de Riscos

| Severidade | Tempo de Resposta | Responsável |
|------------|-------------------|-------------|
| 🔴 Crítica | Imediato (< 2h) | CEO + Diretoria |
| 🟡 Média | 24 horas | Gerente de Área |
| 🟢 Baixa | 1 semana | Coordenador |

---

## 💰 Orçamento de Mitigação de Riscos

### Investimentos Iniciais

| Item | Custo |
|------|-------|
| Segurança física (3 estações) | R$ 120.000 |
| No-breaks industriais (3 unidades) | R$ 135.000 |
| Seguro de equipamentos (anual) | R$ 18.000 |
| Consultoria LGPD (12 meses) | R$ 96.000 |
| Estoque de segurança (carregador + peças) | R$ 130.000 |
| Marketing pré-lançamento | R$ 80.000 |
| **TOTAL** | **R$ 579.000** |

### Custos Recorrentes (Mensais)

| Item | Custo/mês |
|------|-----------|
| Monitoramento 24/7 | R$ 3.000 |
| Desenvolvedor on-call | R$ 12.000 |
| Consultoria LGPD | R$ 8.000 |
| Consultas de crédito | R$ 500 |
| Seguro cibernético | R$ 1.000 |
| **TOTAL** | **R$ 24.500/mês** |

---

## 🎯 Próximas Ações (30 dias)

- [ ] Contratar despachante aduaneiro especializado
- [ ] Solicitar 3 orçamentos de sistemas de segurança
- [ ] Iniciar processo de adequação LGPD (contratar consultoria)
- [ ] Estabelecer linha de crédito pré-aprovada (R$ 300k)
- [ ] Criar dashboard de monitoramento de riscos
- [ ] Contratar seguro de equipamentos
- [ ] Desenvolver política de análise de crédito de clientes

---

**Documento deve ser revisado trimestralmente e atualizado conforme novos riscos identificados.**

**Última atualização:** Janeiro 2025
**Próxima revisão:** Abril 2025
**Responsável:** Diretor de Operações
