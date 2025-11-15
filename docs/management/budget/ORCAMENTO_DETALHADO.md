# Orçamento Detalhado do Projeto
## Rede de Eletropostos - Belém, Pará

**Versão:** 1.0
**Data:** Janeiro 2025
**Período:** 24 meses
**Status:** Planejamento

---

## 1. RESUMO EXECUTIVO

### 1.1 Visão Geral Financeira

| Categoria | Valor (R$) | % Total |
|-----------|------------|---------|
| **CAPEX (Investimento Inicial)** | **955.000** | **81%** |
| **OPEX (12 meses)** | **225.000** | **19%** |
| **INVESTIMENTO TOTAL** | **1.180.000** | **100%** |

**Observações:**
- Valores baseados em pesquisa de mercado (jan/2025)
- Orçamento conservador com margem de contingência
- Preços de carregadores: dados reais do mercado brasileiro

---

## 2. CAPEX - INVESTIMENTO INICIAL

### 2.1 Equipamentos de Recarga

#### 2.1.1 Carregadores DC (Carga Rápida)

| Item | Qtd | Valor Unit. (R$) | Subtotal (R$) | Observações |
|------|-----|------------------|---------------|-------------|
| Carregador DC 30kW | 2 | 95.000 | 190.000 | Preço médio mercado brasileiro |
| Carregador DC 60kW | 1 | 120.000 | 120.000 | Para localização premium |
| **Subtotal DC** | **3** | - | **310.000** | - |

**Fornecedores Potenciais:**
- NeoCharge (nacional)
- BlueSky New Energy (importação, prazo 120 dias)
- Duosida / TGOOD (importação China)

#### 2.1.2 Carregadores AC (Wallbox)

| Item | Qtd | Valor Unit. (R$) | Subtotal (R$) | Observações |
|------|-----|------------------|---------------|-------------|
| Wallbox 22kW OCPP 1.6 | 4 | 12.000 | 48.000 | Para shoppings/hotéis |
| Wallbox 7kW básico | 2 | 6.000 | 12.000 | Backup/locais secundários |
| **Subtotal AC** | **6** | - | **60.000** | - |

**Total Equipamentos de Recarga:** R$ 370.000

#### 2.1.3 Impostos e Logística (Importação)

| Item | Base (R$) | % | Valor (R$) |
|------|-----------|---|------------|
| Equipamentos importados | 200.000 | - | - |
| Imposto de Importação (II) | 200.000 | 15% | 30.000 |
| IPI | 200.000 | 5% | 10.000 |
| ICMS | 200.000 | 18% | 36.000 |
| PIS/COFINS | 200.000 | 11,75% | 23.500 |
| Despachante Aduaneiro | - | - | 8.000 |
| Transporte Internacional | - | - | 15.000 |
| Transporte Nacional | - | - | 7.500 |
| **Subtotal Importação** | - | - | **130.000** |

**Total Equipamentos com Impostos:** R$ 500.000

### 2.2 Infraestrutura Elétrica

#### 2.2.1 Por Ponto de Instalação (Média)

| Item | Qtd | Valor Unit. (R$) | Subtotal (R$) | Observações |
|------|-----|------------------|---------------|-------------|
| Quadro elétrico trifásico | 1 | 8.000 | 8.000 | 220V/380V, 100A-200A |
| Cabos de potência (média) | 1 | 12.000 | 12.000 | Cobre, dimensionamento ABNT |
| Proteções (disjuntores, DPS) | 1 | 5.000 | 5.000 | Schneider ou WEG |
| Aterramento e SPDA | 1 | 3.500 | 3.500 | Conforme NBR |
| Eletrodutos e acessórios | 1 | 4.000 | 4.000 | - |
| Mão de obra elétrica | 1 | 15.000 | 15.000 | Equipe certificada CREA |
| **Subtotal por Ponto** | - | - | **47.500** | - |

**Total 3 Pontos:** R$ 142.500

### 2.3 Obras Civis

#### 2.3.1 Por Ponto de Instalação (Média)

| Item | Qtd | Valor Unit. (R$) | Subtotal (R$) | Observações |
|------|-----|------------------|---------------|-------------|
| Fundações e bases | 1 | 12.000 | 12.000 | Concreto armado |
| Pavimentação e drenagem | 1 | 8.000 | 8.000 | Piso industrial |
| Sinalização viária | 1 | 5.000 | 5.000 | Pintura, placas |
| Estruturas de suporte | 1 | 7.000 | 7.000 | Metálica ou concreto |
| Cobertura (opcional) | 1 | 15.000 | 15.000 | Proteção clima |
| Acessibilidade (NBR 9050) | 1 | 3.000 | 3.000 | Rampas, sinalização |
| Mão de obra civil | 1 | 18.000 | 18.000 | Empreiteira local |
| **Subtotal por Ponto** | - | - | **68.000** | - |

**Total 3 Pontos:** R$ 204.000

### 2.4 Desenvolvimento de Software

| Item | Horas | Valor/Hora (R$) | Subtotal (R$) | Observações |
|------|-------|-----------------|---------------|-------------|
| Arquitetura e Planejamento | 80 | 150 | 12.000 | Arquiteto de software |
| Backend OCPP 1.6 (Java/Spring) | 400 | 120 | 48.000 | Desenvolvedor Senior |
| Frontend Web (Angular) | 300 | 100 | 30.000 | Desenvolvedor Pleno |
| Integração Pagamentos | 80 | 120 | 9.600 | Stripe, Pix, cartões |
| Banco de Dados (PostgreSQL) | 60 | 100 | 6.000 | Modelagem, tuning |
| APIs REST | 100 | 120 | 12.000 | Documentação Swagger |
| Testes Automatizados | 120 | 80 | 9.600 | Unit, Integration, E2E |
| DevOps e Infraestrutura | 80 | 100 | 8.000 | Docker, CI/CD, Cloud |
| UI/UX Design | 60 | 100 | 6.000 | Wireframes, protótipos |
| QA e Homologação | 80 | 80 | 6.400 | Testes funcionais |
| **Subtotal Software** | **1.360** | - | **147.600** | ~6 meses dev |

**Contingência (10%):** R$ 14.760
**Total Desenvolvimento:** R$ 162.360

### 2.5 Licenças, Aprovações e Consultorias

| Item | Qtd | Valor (R$) | Subtotal (R$) | Observações |
|------|-----|------------|---------------|-------------|
| Projeto Elétrico (CREA) | 3 | 3.500 | 10.500 | Eng. Eletricista |
| Projeto Civil (CREA) | 3 | 2.500 | 7.500 | Eng. Civil |
| ART (Anotações CREA) | 6 | 500 | 3.000 | Por projeto |
| Vistoria Corpo de Bombeiros | 3 | 1.500 | 4.500 | AVCB |
| Licenças Municipais | 3 | 2.000 | 6.000 | Alvará, localização |
| Consultoria Regulatória | 1 | 15.000 | 15.000 | ANEEL, LGPD |
| Consultoria Jurídica | 1 | 12.000 | 12.000 | Contratos, compliance |
| Estudo de Viabilidade | 1 | 20.000 | 20.000 | Mercado, financeiro |
| **Subtotal Licenças** | - | - | **78.500** | - |

### 2.6 Marketing e Lançamento

| Item | Valor (R$) | Observações |
|------|------------|-------------|
| Identidade Visual (logo, marca) | 8.000 | Designer profissional |
| Website institucional | 12.000 | Desenvolvimento + conteúdo |
| Material gráfico (banners, placas) | 6.000 | Sinalização nos pontos |
| Campanha de Lançamento (digital) | 15.000 | Google Ads, Meta Ads |
| Assessoria de Imprensa | 8.000 | Release, mídia local |
| Evento de Inauguração | 10.000 | Por ponto (3x) |
| Brindes e merchandising | 4.000 | Primeiros clientes |
| **Subtotal Marketing** | **63.000** | - |

### 2.7 Contingência e Reserva

| Item | Base (R$) | % | Valor (R$) |
|------|-----------|---|------------|
| Contingência Técnica | 500.000 | 5% | 25.000 |
| Reserva Financeira | 955.000 | 3% | 28.650 |
| **Subtotal Contingência** | - | - | **53.650** | - |

---

## 3. RESUMO CAPEX

| Categoria | Valor (R$) | % CAPEX |
|-----------|------------|---------|
| Equipamentos de Recarga (c/ impostos) | 500.000 | 52,4% |
| Infraestrutura Elétrica | 142.500 | 14,9% |
| Obras Civis | 204.000 | 21,4% |
| Desenvolvimento de Software | 162.360 | 17,0% |
| Licenças e Consultorias | 78.500 | 8,2% |
| Marketing e Lançamento | 63.000 | 6,6% |
| Contingência e Reserva | 53.650 | 5,6% |
| **TOTAL CAPEX** | **1.204.010** | **100%** |

**Arredondado:** R$ 1.205.000

---

## 4. OPEX - CUSTOS OPERACIONAIS (12 Meses)

### 4.1 Pessoal

| Função | Qtd | Salário (R$) | Encargos | Total/Mês | 12 Meses |
|--------|-----|--------------|----------|-----------|----------|
| Gerente de Operações | 1 | 8.000 | 80% | 14.400 | 172.800 |
| Técnico de Manutenção | 1 | 4.000 | 80% | 7.200 | 86.400 |
| Atendimento/Suporte | 1 | 3.000 | 80% | 5.400 | 64.800 |
| Desenvolvedor (manutenção) | 0,5 | 6.000 | 80% | 5.400 | 64.800 |
| **Subtotal Pessoal** | - | - | - | **32.400** | **388.800** |

### 4.2 Energia Elétrica

| Item | Consumo Médio | Tarifa (R$/kWh) | Custo/Mês | 12 Meses |
|------|---------------|-----------------|-----------|----------|
| Energia vendida (revendida) | 10.000 kWh | 0,60 | 6.000 | 72.000 |
| Perdas técnicas (5%) | 500 kWh | 0,60 | 300 | 3.600 |
| Consumo próprio (iluminação, etc) | 200 kWh | 0,60 | 120 | 1.440 |
| **Subtotal Energia** | - | - | **6.420** | **77.040** |

**Nota:** Custo de energia revendida já incluso no CMV (Custo de Mercadoria Vendida)

### 4.3 Manutenção e Limpeza

| Item | Valor/Mês (R$) | 12 Meses |
|------|----------------|----------|
| Manutenção Preventiva (equipamentos) | 3.500 | 42.000 |
| Peças e Reparos (média) | 2.000 | 24.000 |
| Limpeza e Conservação | 1.200 | 14.400 |
| **Subtotal Manutenção** | **6.700** | **80.400** |

### 4.4 Tecnologia e Comunicação

| Item | Valor/Mês (R$) | 12 Meses |
|------|----------------|----------|
| Cloud Hosting (AWS/DigitalOcean) | 1.500 | 18.000 |
| Conectividade (4G/5G) | 600 | 7.200 |
| Licenças de Software | 500 | 6.000 |
| Monitoramento e Segurança | 800 | 9.600 |
| **Subtotal Tecnologia** | **3.400** | **40.800** |

### 4.5 Seguros

| Item | Valor Anual (R$) | Observações |
|------|------------------|-------------|
| Seguro de Equipamentos | 15.000 | 3% do valor dos equipamentos |
| Responsabilidade Civil | 8.000 | Cobertura de acidentes |
| **Subtotal Seguros** | **23.000** | - |

### 4.6 Administrativo

| Item | Valor/Mês (R$) | 12 Meses |
|------|----------------|----------|
| Contabilidade | 1.500 | 18.000 |
| Assessoria Jurídica | 1.000 | 12.000 |
| Despesas Administrativas | 800 | 9.600 |
| Marketing Recorrente | 2.000 | 24.000 |
| **Subtotal Administrativo** | **5.300** | **63.600** |

### 4.7 Parcerias Comerciais

| Item | Receita Base | % Parceiro | Custo/Mês | 12 Meses |
|------|--------------|------------|-----------|----------|
| Receita Compartilhada (média) | 20.000 | 30% | 6.000 | 72.000 |
| Aluguel de Espaço (se aplicável) | - | - | 2.000 | 24.000 |
| **Subtotal Parcerias** | - | - | **8.000** | **96.000** |

---

## 5. RESUMO OPEX (12 MESES)

| Categoria | Valor/Mês (R$) | 12 Meses | % OPEX |
|-----------|----------------|----------|--------|
| Pessoal | 32.400 | 388.800 | 51,7% |
| Energia (sem revenda) | 420 | 5.040 | 0,7% |
| Manutenção e Limpeza | 6.700 | 80.400 | 10,7% |
| Tecnologia | 3.400 | 40.800 | 5,4% |
| Seguros | 1.917 | 23.000 | 3,1% |
| Administrativo | 5.300 | 63.600 | 8,5% |
| Parcerias Comerciais | 8.000 | 96.000 | 12,8% |
| Contingência Operacional (5%) | 2.907 | 34.882 | 4,6% |
| **TOTAL OPEX** | **60.644** | **732.522** | **100%** |

**Arredondado:** R$ 733.000 / 12 meses

---

## 6. CONSOLIDAÇÃO DO INVESTIMENTO

### 6.1 Investimento Total (24 Meses)

| Categoria | Ano 1 (R$) | Ano 2 (R$) | Total (R$) |
|-----------|------------|------------|------------|
| **CAPEX Inicial** | 1.205.000 | - | 1.205.000 |
| **OPEX Ano 1** | 733.000 | - | 733.000 |
| **OPEX Ano 2** | - | 750.000 | 750.000 |
| **Expansão (3 novos pontos)** | - | 600.000 | 600.000 |
| **TOTAL** | **1.938.000** | **1.350.000** | **3.288.000** |

### 6.2 Necessidade de Capital por Fase

| Fase | Período | Investimento (R$) | Acumulado (R$) |
|------|---------|-------------------|----------------|
| 1 - Planejamento | Meses 1-3 | 80.000 | 80.000 |
| 2 - Desenvolvimento | Meses 4-6 | 250.000 | 330.000 |
| 3 - Instalação | Meses 7-9 | 650.000 | 980.000 |
| 4 - Operação Inicial | Meses 10-12 | 225.000 | 1.205.000 |
| 5 - Ano 2 (Operação) | Meses 13-24 | 733.000 | 1.938.000 |

---

## 7. PROJEÇÃO DE RECEITAS

### 7.1 Premissas

| Premissa | Valor |
|----------|-------|
| Tarifa Média de Recarga | R$ 1,00/kWh |
| Consumo Médio por Recarga | 40 kWh |
| Receita Média por Recarga | R$ 40,00 |

### 7.2 Cenários de Demanda (Mês 12)

#### Cenário Conservador (60 recargas/ponto/mês)

| Item | Qtd Pontos | Recargas/Ponto | Total Recargas | Receita/Mês |
|------|------------|----------------|----------------|-------------|
| Total | 3 | 60 | 180 | R$ 7.200 |

#### Cenário Moderado (120 recargas/ponto/mês)

| Item | Qtd Pontos | Recargas/Ponto | Total Recargas | Receita/Mês |
|------|------------|----------------|----------------|-------------|
| Total | 3 | 120 | 360 | R$ 14.400 |

#### Cenário Otimista (200 recargas/ponto/mês)

| Item | Qtd Pontos | Recargas/Ponto | Total Recargas | Receita/Mês |
|------|------------|----------------|----------------|-------------|
| Total | 3 | 200 | 600 | R$ 24.000 |

### 7.3 Projeção Anual (Moderado - Crescimento Gradual)

| Mês | Recargas | Receita (R$) | Custo Energia | Margem Bruta | Custo Operacional | Resultado |
|-----|----------|--------------|---------------|--------------|-------------------|-----------|
| 1-3 | 0 | 0 | 0 | 0 | 0 | 0 |
| 4-6 | 0 | 0 | 0 | 0 | 0 | 0 |
| 7 | 50 | 2.000 | 1.200 | 800 | 40.000 | -39.200 |
| 8 | 100 | 4.000 | 2.400 | 1.600 | 50.000 | -48.400 |
| 9 | 150 | 6.000 | 3.600 | 2.400 | 55.000 | -52.600 |
| 10 | 200 | 8.000 | 4.800 | 3.200 | 60.000 | -56.800 |
| 11 | 280 | 11.200 | 6.720 | 4.480 | 60.000 | -55.520 |
| 12 | 360 | 14.400 | 8.640 | 5.760 | 60.000 | -54.240 |
| **Total Ano 1** | **1.140** | **45.600** | **27.360** | **18.240** | **325.000** | **-306.760** |

**Observações:**
- Operação inicia no mês 7
- Crescimento gradual de demanda
- Custos operacionais iniciam no mês 7
- Prejuízo operacional no ano 1 (esperado)

### 7.4 Projeção Ano 2 (Com Expansão)

| Trimestre | Pontos | Recargas/Mês | Receita/Mês | Resultado/Mês | Resultado Trim. |
|-----------|--------|--------------|-------------|---------------|-----------------|
| Q1 | 3 | 450 | 18.000 | -40.000 | -120.000 |
| Q2 | 4 | 650 | 26.000 | -30.000 | -90.000 |
| Q3 | 5 | 900 | 36.000 | -15.000 | -45.000 |
| Q4 | 6 | 1.200 | 48.000 | +5.000 | +15.000 |
| **Ano 2** | **6** | **~800** | **~32.000** | **-20.000** | **-240.000** |

**Break-even projetado:** Final do Mês 24 ou início do Mês 25

---

## 8. ANÁLISE DE VIABILIDADE FINANCEIRA

### 8.1 Indicadores

| Indicador | Valor | Observações |
|-----------|-------|-------------|
| **Investimento Total (2 anos)** | R$ 1.938.000 | CAPEX + OPEX |
| **Faturamento Ano 1** | R$ 45.600 | Meses 7-12 |
| **Faturamento Ano 2** | R$ 384.000 | 12 meses completos |
| **Prejuízo Acumulado (24 meses)** | ~R$ 550.000 | Esperado em fase inicial |
| **Payback Estimado** | 30-36 meses | Após atingir escala |
| **ROI Anual (após payback)** | 25-40% | Com 6-8 pontos operando |

### 8.2 Ponto de Equilíbrio

**Receita Mensal Necessária para Break-Even:**
- Custos Fixos Mensais: R$ 60.000
- Margem de Contribuição: 40% (após custos de energia e parceiro)
- **Receita Necessária:** R$ 150.000/mês
- **Equivalente a:** ~3.750 recargas/mês (150.000 / 40)
- **Por Ponto (6 pontos):** 625 recargas/ponto/mês

### 8.3 Análise de Sensibilidade

#### Variação de Demanda

| Cenário | Demanda vs. Projetado | Payback (meses) | ROI Anual |
|---------|----------------------|-----------------|-----------|
| Pessimista | -40% | >48 | 10-15% |
| Conservador | -20% | 36-42 | 20-30% |
| Base | 100% | 30-36 | 25-40% |
| Otimista | +20% | 24-30 | 35-50% |
| Agressivo | +50% | 18-24 | 45-60% |

#### Variação de Custo de Equipamento

| Cenário | Custo vs. Orçado | Impacto Investimento | Impacto Payback |
|---------|------------------|----------------------|-----------------|
| -20% (nacional) | R$ 400.000 | -R$ 100.000 | -3 meses |
| Base | R$ 500.000 | - | - |
| +20% (atraso) | R$ 600.000 | +R$ 100.000 | +3 meses |

---

## 9. ESTRUTURA DE FINANCIAMENTO

### 9.1 Fontes de Capital

| Fonte | Valor (R$) | % | Condições |
|-------|------------|---|-----------|
| **Capital Próprio** | 400.000 | 33% | Sócios |
| **Linha de Crédito (BNDES Mover)** | 600.000 | 50% | Taxa: TJLP + 2% a.a., 60 meses |
| **Reinvestimento de Receitas** | 200.000 | 17% | Meses 10-24 |
| **TOTAL** | **1.200.000** | **100%** | - |

### 9.2 Simulação de Financiamento BNDES

**Condições:**
- Valor: R$ 600.000
- Taxa: TJLP (6,5%) + 2% = 8,5% a.a.
- Prazo: 60 meses (5 anos)
- Carência: 6 meses
- Sistema: SAC (Sistema de Amortização Constante)

**Prestação Média Mensal:** R$ 12.500 (após carência)

---

## 10. RECOMENDAÇÕES FINANCEIRAS

### 10.1 Otimizações Possíveis

1. **Reduzir CAPEX Inicial:**
   - Iniciar com 2 pontos (DC + AC) em vez de 3
   - Economia: R$ 250.000
   - Expansão incremental baseada em demanda real

2. **Equipamentos Nacionais:**
   - Priorizar fornecedores brasileiros quando possível
   - Economia em impostos: ~30%
   - Trade-off: Menor variedade, possível maior custo unitário

3. **Modelo Lean de Software:**
   - MVP com funcionalidades essenciais
   - Desenvolvimento incremental
   - Economia: R$ 50.000

4. **Parcerias Estratégicas:**
   - Negociar isenção de aluguel em troca de maior % de receita
   - Economia: R$ 24.000/ano

### 10.2 Contingências Recomendadas

| Contingência | Valor (R$) | Finalidade |
|--------------|------------|------------|
| Reserva Técnica | 50.000 | Falhas de equipamento, reparos |
| Reserva Operacional | 100.000 | 2 meses de OPEX |
| Reserva de Oportunidade | 50.000 | Localizações não planejadas |
| **Total Reservas** | **200.000** | - |

---

## 11. CRONOGRAMA FINANCEIRO

### 11.1 Desembolsos por Trimestre

| Trimestre | CAPEX (R$) | OPEX (R$) | Total (R$) | Acumulado (R$) |
|-----------|------------|-----------|------------|----------------|
| **Q1 (Meses 1-3)** | 80.000 | 0 | 80.000 | 80.000 |
| **Q2 (Meses 4-6)** | 250.000 | 0 | 250.000 | 330.000 |
| **Q3 (Meses 7-9)** | 650.000 | 165.000 | 815.000 | 1.145.000 |
| **Q4 (Meses 10-12)** | 225.000 | 180.000 | 405.000 | 1.550.000 |
| **Ano 2** | 600.000 | 750.000 | 1.350.000 | 2.900.000 |

### 11.2 Fluxo de Caixa Projetado (Primeiros 12 Meses)

| Mês | Receita | Custos | Investimento | Saldo Mês | Saldo Acum. |
|-----|---------|--------|--------------|-----------|-------------|
| 1 | 0 | 0 | 30.000 | -30.000 | -30.000 |
| 2 | 0 | 0 | 25.000 | -25.000 | -55.000 |
| 3 | 0 | 0 | 25.000 | -25.000 | -80.000 |
| 4 | 0 | 0 | 80.000 | -80.000 | -160.000 |
| 5 | 0 | 0 | 85.000 | -85.000 | -245.000 |
| 6 | 0 | 0 | 85.000 | -85.000 | -330.000 |
| 7 | 2.000 | 1.200 | 250.000 | -249.200 | -579.200 |
| 8 | 4.000 | 2.400 | 200.000 | -198.400 | -777.600 |
| 9 | 6.000 | 3.600 | 200.000 | -197.600 | -975.200 |
| 10 | 8.000 | 4.800 | 75.000 | -71.800 | -1.047.000 |
| 11 | 11.200 | 6.720 | 75.000 | -70.520 | -1.117.520 |
| 12 | 14.400 | 8.640 | 75.000 | -69.240 | -1.186.760 |

**Observação:** Fluxo de caixa negativo esperado nos primeiros 24 meses.

---

## 12. APROVAÇÕES

| Papel | Nome | Assinatura | Data |
|-------|------|------------|------|
| Diretor Financeiro | | | |
| Gerente de Projeto | | | |
| Investidor Principal | | | |

---

## 13. ANEXOS

### A. Fontes de Dados
- NeoCharge: Preços carregadores DC (jan/2025)
- BlueSky New Energy: Importação e prazos
- Mercado Livre: Cotações equipamentos
- BNDES: Condições Programa Mover

### B. Próximas Etapas
1. Refinar custos de infraestrutura com engenheiro local
2. Obter cotações formais de 3+ fornecedores de equipamentos
3. Validar custos operacionais com operadores existentes
4. Negociar condições preliminares com BNDES

---

**Documento Confidencial**
**Revisão:** Trimestral ou mediante mudanças significativas
**Versão:** 1.0
