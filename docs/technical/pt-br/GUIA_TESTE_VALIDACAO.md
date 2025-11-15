# Guia de Teste e Validação - Circuito Pilot Signal Eletroposto

## 📋 Sumário

1. [Visão Geral](#visao-geral)
2. [Testes Elétricos Básicos](#testes-base)
3. [Testes Conformidade IEC 61851-1](#testes-iec)
4. [Testes Segurança](#testes-seguranca)
5. [Testes Performance](#testes-performance)
6. [Validação Completa](#validacao)
7. [Certificação](#certificacao)

---

## 🎯 Visão Geral {#visao-geral}

### Objetivos dos Testes

O circuito Pilot Signal deve ser testado e validado segundo:
- ✅ **IEC 61851-1** (norma internacional)
- ✅ **ABNT NBR IEC 61851-1** (norma brasileira)
- ✅ **Portaria INMETRO 301/2019**

### Níveis de Teste

```
Nível 1: Testes Elétricos Básicos
    ↓ (se OK)
Nível 2: Testes Conformidade IEC 61851-1
    ↓ (se OK)
Nível 3: Testes Segurança
    ↓ (se OK)
Nível 4: Testes Performance
    ↓ (se OK)
Nível 5: Validação Completa
    ↓ (se OK)
Certificação INMETRO
```

---

## ⚡ Testes Elétricos Básicos {#testes-base}

### Teste 1.1: Inspeção Visual

**Equipamento:** Lupa 10x, luz LED

**Checklist:**
- [ ] PCB limpo, sem resíduos de fluxo
- [ ] Todos componentes presentes (vs BOM)
- [ ] Polaridade correta (diodos, LEDs, CIs)
- [ ] Sem pontes de solda
- [ ] Sem componentes danificados

**Critério de aceitação:** Nenhum defeito visual

---

### Teste 1.2: Continuidade e Curtos-Circuitos

**Equipamento:** Multímetro modo continuidade

```bash
# Teste GND Plane
1. Medir todos pontos GND
   ✓ PASS: Continuidade (bip) entre todos pontos
   ✗ FAIL: Sem continuidade

# Teste VCC Rails
2. Medir todos pontos +12V
   ✓ PASS: Continuidade entre todos pontos +12V
   ✗ FAIL: Sem continuidade

# Teste Isolação
3. Medir GND ↔ +12V
   ✓ PASS: SEM continuidade (silêncio)
   ✗ FAIL: Bip = curto-circuito!

4. Medir GND ↔ +5V
   ✓ PASS: SEM continuidade
   ✗ FAIL: Curto-circuito

5. Medir GND ↔ +3.3V
   ✓ PASS: SEM continuidade
   ✗ FAIL: Curto-circuito
```

**Resultado:** ____ / 5 testes passaram

---

### Teste 1.3: Resistência

**Equipamento:** Multímetro modo Ohm

```bash
# Resistência GND ↔ VCC
Medida: _______ kΩ
✓ PASS: >10 kΩ
✗ FAIL: <10 kΩ (fuga ou curto-circuito)

# Resistências Individuais (R1, R2, etc.)
R1 (1kΩ):   Medido ______ Ω  ✓/✗ (920-1080Ω)
R2 (2kΩ):   Medido ______ Ω  ✓/✗ (1.8k-2.2kΩ)
R3 (330Ω):  Medido ______ Ω  ✓/✗ (300-360Ω)
```

---

### Teste 1.4: Primeira Energização (Alimentação Limitada)

**Equipamento:**
- Fonte DC ajustável
- Multímetro modo Ampère

**Setup Seguro:**
```
PSU (12V, limite 100mA)
      │
   [Amperímetro]
      │
    [PCB]
      │
    GND
```

**Procedimento:**
```bash
1. Ajustar PSU: 12V, limite corrente 100mA
2. Conectar amperímetro em série
3. Alimentar progressivamente

# Observação Corrente
Corrente medida: ______ mA

✓ PASS: <50mA (normal)
⚠ WARNING: 50-80mA (verificar)
✗ FAIL: >80mA (problema! Desligar!)

# Se >80mA:
- Desligar imediatamente
- Tocar componentes: quente = problema
- Inspecionar curtos-circuitos
- NÃO continuar
```

---

### Teste 1.5: Tensões Rails

**Equipamento:** Multímetro modo Volt DC

**Alimentação normal (limite 500mA):**

```bash
# Medidas
VCC (+12V):  Medido ______ V  ✓/✗ (11.4-12.6V)
+5V rail:    Medido ______ V  ✓/✗ (4.75-5.25V)
+3.3V rail:  Medido ______ V  ✓/✗ (3.13-3.47V)
GND:         Medido ______ V  ✓/✗ (0V)

# Estabilidade
Variações: _______ mV
✓ PASS: <100mV
✗ FAIL: >100mV (instável)
```

**Resultado Teste 1:**
- [ ] PASS - Passar ao Teste 2
- [ ] FAIL - Depurar e re-testar

---

## 🔌 Testes Conformidade IEC 61851-1 {#testes-iec}

### Teste 2.1: Sinal Pilot - Forma de Onda PWM

**Equipamento:** Osciloscópio (100 MHz min)

**Setup:**
```
Osciloscópio
  CH1 → Sinal CP (Pilot)
  CH2 → GND

Trigger: Edge, CH1, rising, 0V
```

**Medidas:**

#### A. Frequência
```bash
Frequência medida: _______ Hz

✓ PASS: 990-1010 Hz (±1%)
✗ FAIL: Fora das tolerâncias
```

#### B. Amplitude
```bash
Com carga simulada veículo (2.74kΩ // 1µF):

V_high medido: ______ V
✓ PASS: +11.4 a +12.6V

V_low medido: ______ V
✓ PASS: -11.4 a -12.6V

Amplitude P-P: ______ V
✓ PASS: 22.8-25.2V (±5%)
✗ FAIL: Fora das tolerâncias
```

#### C. Duty Cycle
```bash
# Testar diferentes correntes máximas

6A → DC medido: ______ %  ✓/✗ (9.5-10.5%)
12A → DC medido: ______ %  ✓/✗ (19-21%)
16A → DC medido: ______ %  ✓/✗ (25-27%)
20A → DC medido: ______ %  ✓/✗ (31-34%)
32A → DC medido: ______ %  ✓/✗ (51-54%)

Fórmula: I_max = DC(%) × 0.6
```

#### D. Tempo de subida/descida
```bash
Rise time: ______ µs  ✓/✗ (<50µs)
Fall time: ______ µs  ✓/✗ (<50µs)
```

**Screenshot osciloscópio obrigatório!**

---

### Teste 2.2: Detecção Estados Veículo

**Equipamento:**
- Resistências de teste (2.74kΩ, 882Ω, 246Ω)
- Multímetro

**Carga Simulada:**
```
[PCB CP] ─── [R teste] ─── [GND]
                │
            [Voltímetro]
```

#### Estado A: Sem Veículo
```bash
R_load: ∞ (desconectado)
Tensão CP medida: ______ V

✓ PASS: +12V DC (±0.6V)
✗ FAIL: Outra tensão
```

#### Estado B: Veículo Conectado
```bash
R_load: 2.74kΩ (±5%)
Tensão CP medida: ______ V

✓ PASS: +9V PWM (±0.6V)
✗ FAIL: Outra tensão
```

#### Estado C: Carga Solicitada
```bash
R_load: 882Ω (±5%)
Tensão CP medida: ______ V

✓ PASS: +6V PWM (±0.6V)
✗ FAIL: Outra tensão
```

#### Estado D: Carga + Ventilação
```bash
R_load: 246Ω (±5%)
Tensão CP medida: ______ V

✓ PASS: +3V PWM (±0.6V)
✗ FAIL: Outra tensão
```

#### Estado E: Erro (Curto-Circuito)
```bash
R_load: 0Ω (curto-circuito)
Tensão CP medida: ______ V

✓ PASS: 0V (detecção erro)
⚠ Verificar: Proteção ativada?
```

---

### Teste 2.3: Tempo de Resposta

**Equipamento:** Osciloscópio + switch rápido

**Teste transição Estado A → B:**
```bash
1. Estado A (desconectado)
2. Conectar R=2.74kΩ
3. Medir tempo até mudança

Tempo medido: ______ ms

✓ PASS: <100ms
✗ FAIL: >100ms
```

**Teste transição Estado B → C:**
```bash
1. Estado B (R=2.74kΩ)
2. Mudar para R=882Ω
3. Medir tempo mudança

Tempo medido: ______ ms

✓ PASS: <100ms
✗ FAIL: >100ms
```

---

### Teste 2.4: Impedância Fonte

**Equipamento:** Ponte de impedância ou método divisão tensão

**Procedimento:**
```bash
1. Medir V_CP sem carga: V1 = ______ V
2. Conectar R=1kΩ, medir: V2 = ______ V
3. Calcular: Z_source = R × (V1-V2)/V2

Z_source calculado: ______ Ω

✓ PASS: 880-1200Ω (norma: 1kΩ ±20%)
✗ FAIL: Fora das tolerâncias
```

---

## 🛡️ Testes Segurança {#testes-seguranca}

### Teste 3.1: Isolação Galvânica

**Equipamento:** Megôhmetro 500VDC

```bash
# Teste entre circuito e chassi metálico
Resistência isolação: _______ MΩ

✓ PASS: >5 MΩ
✗ FAIL: <5 MΩ (problema isolação!)
```

---

### Teste 3.2: Proteção Sobretensão

**Equipamento:**
- Fonte ajustável 0-30V
- Osciloscópio

**Teste Diodo Zener:**
```bash
1. Aumentar tensão entrada gradualmente
2. Observar tensão saída

V_in = 15V → V_out = ______ V ✓/✗ (<15.6V)
V_in = 18V → V_out = ______ V ✓/✗ (<15.6V)
V_in = 24V → V_out = ______ V ✓/✗ (<15.6V)

✓ PASS: Zener limita a 15V ±3%
✗ FAIL: Tensão saída ultrapassa 15.6V
```

---

### Teste 3.3: Corrente de Fuga para Terra

**Equipamento:** Amperímetro µA

```bash
Corrente fuga medida: ______ µA

✓ PASS: <30µA (Tipo A, AC+DC)
✗ FAIL: >30µA (PERIGO!)
```

⚠️ **CRÍTICO PARA SEGURANÇA PESSOAS**

---

### Teste 3.4: Proteção Curto-Circuito

**⚠️ Teste DESTRUTIVO potencial - Protótipo apenas!**

```bash
1. Alimentar normalmente
2. Curto-circuitar CP → GND
3. Observar:

Fusível/proteção dispara: ✓/✗
Tempo reação: ______ ms  ✓/✗ (<100ms)
Componentes danificados: Sim/Não

✓ PASS: Proteção funciona, sem danos
✗ FAIL: Componentes queimados
```

---

### Teste 3.5: Temperatura Componentes

**Equipamento:** Termômetro infravermelho ou câmera térmica

**Funcionamento contínuo 1 hora, corrente máxima:**

```bash
Temp ambiente: ______ °C

MOSFET:        ______ °C  ✓/✗ (<85°C)
Regulador 5V:  ______ °C  ✓/✗ (<85°C)
Resistências:  ______ °C  ✓/✗ (<70°C)
MCU:           ______ °C  ✓/✗ (<70°C)

✓ PASS: Todas temp OK
✗ FAIL: Superaquecimento detectado
```

---

## 🚀 Testes Performance {#testes-performance}

### Teste 4.1: Precisão Duty Cycle

**Equipamento:** Frequencímetro precisão

**Teste 10 ajustes diferentes:**

| Corrente | DC Teórico | DC Medido | Erro | Pass/Fail |
|----------|------------|-----------|------|-----------|
| 6A | 10% | ____% | ____% | ✓/✗ |
| 8A | 13.3% | ____% | ____% | ✓/✗ |
| 10A | 16.7% | ____% | ____% | ✓/✗ |
| 13A | 21.7% | ____% | ____% | ✓/✗ |
| 16A | 26.7% | ____% | ____% | ✓/✗ |
| 20A | 33.3% | ____% | ____% | ✓/✗ |
| 25A | 41.7% | ____% | ____% | ✓/✗ |
| 32A | 53.3% | ____% | ____% | ✓/✗ |
| 40A | 66.7% | ____% | ____% | ✓/✗ |
| 63A | 96% | ____% | ____% | ✓/✗ |

**Critério:** Erro <±2% em toda faixa

---

### Teste 4.2: Estabilidade Frequência

**Equipamento:** Frequencímetro + registrador

**Medida contínua 24h:**

```bash
Frequência min: ______ Hz
Frequência max: ______ Hz
Frequência méd: ______ Hz
Deriva: ______ Hz

✓ PASS: Deriva <±5 Hz
✗ FAIL: Deriva >±5 Hz
```

---

### Teste 4.3: Ruído e Interferências EMI

**Equipamento:**
- Analisador espectro ou osciloscópio FFT
- Gaiola Faraday (opcional)

```bash
# Harmônicos PWM
Fundamental 1kHz: ______ dBm
2º harmônico 2kHz: ______ dBm  ✓/✗ (<-20dBc)
3º harmônico 3kHz: ______ dBm  ✓/✗ (<-30dBc)

# Ruído alta frequência
Ruído 10-100kHz: ______ mVpp  ✓/✗ (<50mVpp)
Ruído 100kHz-1MHz: ______ mVpp  ✓/✗ (<20mVpp)
```

---

### Teste 4.4: Consumo Energético

**Equipamento:** Wattímetro

```bash
# Idle (standby)
Potência: ______ mW  ✓/✗ (<500mW)

# Ativo (PWM on, sem carga)
Potência: ______ W  ✓/✗ (<2W)

# Carga máxima (63A sinalizado)
Potência circuito: ______ W  ✓/✗ (<5W)
```

---

### Teste 4.5: Confiabilidade - Ciclos ON/OFF

**Teste automatizado:**

```bash
Programa teste:
1. ON 10s, OFF 2s
2. Repetir 10.000 ciclos
3. Verificar funcionamento

Ciclos completados: ______ / 10.000
Falhas: ______

✓ PASS: 10.000 ciclos, 0 defeito
✗ FAIL: Defeito antes de 10.000
```

---

## ✅ Validação Completa {#validacao}

### Teste 5.1: Integração com Veículo Real

**⚠️ Teste com VEÍCULO REAL elétrico**

**Veículos testados:**

| Veículo | Conector | Estado B | Estado C | Carga OK | Pass/Fail |
|---------|----------|----------|----------|----------|-----------|
| Nissan Leaf | Tipo 1 | ✓/✗ | ✓/✗ | ✓/✗ | ✓/✗ |
| Chevrolet Bolt | Tipo 1 | ✓/✗ | ✓/✗ | ✓/✗ | ✓/✗ |
| BMW i3 | Tipo 2 | ✓/✗ | ✓/✗ | ✓/✗ | ✓/✗ |
| Tesla Model 3 | Tipo 2 | ✓/✗ | ✓/✗ | ✓/✗ | ✓/✗ |
| BYD Dolphin | Tipo 2 | ✓/✗ | ✓/✗ | ✓/✗ | ✓/✗ |

**Critério:** Mínimo 5 veículos diferentes, 100% sucesso

---

### Teste 5.2: Endurance 1000 Horas

**Teste contínuo sob condições:**

```bash
Temperatura: 40°C
Umidade: 85%
Ciclos: ON/OFF a cada 4h

Duração: _______ horas completadas / 1000h
Falhas: _______

✓ PASS: 1000h sem defeito
✗ FAIL: Defeito antes de 1000h
```

---

### Teste 5.3: Ambiente Severo

#### Temperatura:
```bash
Teste -10°C: ✓/✗ (funciona)
Teste +50°C: ✓/✗ (funciona)
Teste +85°C armazenamento: ✓/✗ (sobrevive)
```

#### Umidade:
```bash
Teste 95% RH, 40°C, 24h: ✓/✗
Sem condensação: ✓/✗
```

#### Vibrações:
```bash
Teste 5-500Hz, 2g, 1h: ✓/✗
Sem desconexões: ✓/✗
```

---

## 🏆 Certificação {#certificacao}

### Checklist Pré-Certificação

**Testes obrigatórios passados:**
- [ ] Todos testes elétricos básicos (1.1-1.5)
- [ ] Todos testes IEC 61851-1 (2.1-2.4)
- [ ] Todos testes segurança (3.1-3.5)
- [ ] Testes performance (4.1-4.5)
- [ ] Validação veículos reais (5.1)
- [ ] Teste endurance 1000h (5.2)
- [ ] Testes ambiente (5.3)

**Documentação obrigatória:**
- [ ] Esquemas eletrônicos completos
- [ ] BOM com componentes certificados
- [ ] Datasheet todos componentes críticos
- [ ] Relatórios testes (todos com fotos/screenshots)
- [ ] Manual técnico
- [ ] Manual usuário (português)
- [ ] Análise riscos (FMEA)

---

### Organismos Certificação Brasil

#### 1. INMETRO
**Site:** https://www.gov.br/inmetro

**Processo:**
1. Pré-auditoria documentação
2. Envio amostras (3-5 unidades)
3. Testes laboratório credenciado
4. Auditoria fabricação
5. Certificação emitida

**Custo:** R$ 50.000 - R$ 120.000
**Prazo:** 6-12 meses

#### 2. ANATEL (Módulos Sem-Fio)
**Site:** https://www.gov.br/anatel

**Se 4G/WiFi presente:**
- Certificação módulos RF
- Testes SAR
- Testes EMC

**Custo:** R$ 15.000 - R$ 30.000
**Prazo:** 3-6 meses

---

### Laboratórios Credenciados

| Laboratório | Localização | Contato | Especialidade |
|-------------|-------------|---------|---------------|
| **IPT** | São Paulo | www.ipt.br | Elétrico |
| **Lactec** | Curitiba | www.lactec.org.br | Energia |
| **Labelo** | São Paulo | labelo.org.br | EMC/Segurança |
| **Cepel** | Rio | www.cepel.br | Elétrico |

---

## 📊 Relatório de Teste - Template

### Identificação

```
Projeto: Eletroposto - Circuito Pilot Signal
Versão PCB: v_____
Número Série: _____________
Data Teste: ____/____/2025
Testador: ___________________
```

### Resumo Resultados

| Categoria | Testes Total | Passaram | Falharam | Taxa Sucesso |
|-----------|--------------|----------|----------|--------------|
| Elétrico Básico | 5 | ___ | ___ | ___% |
| IEC 61851-1 | 4 | ___ | ___ | ___% |
| Segurança | 5 | ___ | ___ | ___% |
| Performance | 5 | ___ | ___ | ___% |
| Validação | 3 | ___ | ___ | ___% |
| **TOTAL** | **22** | ___ | ___ | ___% |

### Veredicto Final

- [ ] **PASS** - Produto conforme, pronto certificação
- [ ] **PASS com ressalvas** - Correções menores necessárias
- [ ] **FAIL** - Correções maiores requeridas
- [ ] **FAIL crítico** - Refazer design

### Comentários
```
_________________________________________________
_________________________________________________
_________________________________________________
```

### Assinaturas

```
Testador: ________________  Data: __________

Responsável Qualidade: ________________  Data: __________

Engenheiro Chefe: ________________  Data: __________
```

---

## 📚 Recursos

### Normas (Compra)

- **ABNT NBR IEC 61851-1:2022** (~R$ 400)
  - https://www.abntcatalogo.com.br/

### Equipamento Recomendado

| Equipamento | Preço | Necessidade |
|-------------|-------|-------------|
| Osciloscópio 100MHz | R$ 2.000-5.000 | Obrigatório |
| Multímetro precisão | R$ 300-800 | Obrigatório |
| Fonte DC | R$ 400-1.200 | Obrigatório |
| Resistências teste | R$ 100 | Obrigatório |
| Termômetro IR | R$ 150-400 | Recomendado |
| Analisador espectro | R$ 5.000+ | Opcional |

---

**Documento criado por:** Equipe Técnica Eletroposto
**Versão:** 1.0
**Data:** 2025-01-08
**Licença:** MIT

✅ **Boa sorte com seus testes!**
