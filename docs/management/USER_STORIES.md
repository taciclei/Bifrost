# 📝 User Stories - Product Backlog

**Versão:** 1.0
**Data:** Janeiro 2025
**Product Owner:** A definir

---

## 📋 Estrutura de User Story

```
Como [persona]
Quero [ação/funcionalidade]
Para que [benefício/valor]

Critérios de Aceitação:
- [ ] Critério 1
- [ ] Critério 2

Estimativa: [Story Points 1-13]
Prioridade: [Alta/Média/Baixa]
```

---

## 🎯 Épicos

### Epic 1: Gestão de Usuários
### Epic 2: Gestão de Estações e Carregadores
### Epic 3: Sessões de Carregamento
### Epic 4: Pagamentos
### Epic 5: OCPP WebSocket
### Epic 6: Mobile App

---

## 📱 Epic 1: Gestão de Usuários

### US-001: Cadastro de Usuário

**Como** um novo usuário
**Quero** me cadastrar na plataforma
**Para que** eu possa usar os eletropostos

**Critérios de Aceitação:**
- [ ] Formulário solicita: nome, email, CPF, telefone, senha
- [ ] Email deve ser único no sistema
- [ ] CPF deve ser válido (algoritmo validador)
- [ ] Senha mínima: 8 caracteres, 1 maiúscula, 1 número
- [ ] Email de confirmação enviado automaticamente
- [ ] Usuário não pode fazer carregamentos até confirmar email
- [ ] LGPD: Checkbox de consentimento obrigatório
- [ ] LGPD: Link para política de privacidade visível

**Estimativa:** 5 Story Points
**Prioridade:** Alta
**Sprint:** 1

---

### US-002: Login com Email e Senha

**Como** um usuário cadastrado
**Quero** fazer login com meu email e senha
**Para que** eu possa acessar minha conta

**Critérios de Aceitação:**
- [ ] Aceita email ou CPF como identificador
- [ ] Senha com máscara (escondida)
- [ ] Opção "Lembrar-me" (30 dias)
- [ ] Link "Esqueci minha senha"
- [ ] Após 5 tentativas erradas, bloquear por 15 minutos
- [ ] JWT token com expiração de 1 hora
- [ ] Refresh token com expiração de 30 dias
- [ ] Log de tentativas de login (audit trail)

**Estimativa:** 3 Story Points
**Prioridade:** Alta
**Sprint:** 1

---

### US-003: Recuperação de Senha

**Como** um usuário que esqueceu a senha
**Quero** recuperar meu acesso
**Para que** eu possa voltar a usar o sistema

**Critérios de Aceitação:**
- [ ] Formulário solicita email
- [ ] Email com link de reset enviado (válido por 1 hora)
- [ ] Link leva para tela de nova senha
- [ ] Nova senha deve atender requisitos mínimos
- [ ] Após reset, todas sessões ativas são invalidadas
- [ ] Confirmação de alteração enviada por email

**Estimativa:** 3 Story Points
**Prioridade:** Média
**Sprint:** 2

---

### US-004: Cadastrar Veículo

**Como** um usuário autenticado
**Quero** cadastrar meu veículo elétrico
**Para que** o sistema saiba o tipo de conector que preciso

**Critérios de Aceitação:**
- [ ] Formulário: marca, modelo, ano, placa, tipo de conector
- [ ] Tipo de conector: Type 2, CCS2, CHAdeMO, GB/T
- [ ] Placa validada (padrão Mercosul ABC1D23)
- [ ] Opção de marcar como veículo principal
- [ ] Capacidade de bateria (kWh) - opcional
- [ ] Potência máxima de carregamento (kW) - opcional
- [ ] Permite cadastrar até 5 veículos
- [ ] Upload de foto do veículo - opcional

**Estimativa:** 5 Story Points
**Prioridade:** Alta
**Sprint:** 2

---

## 🔌 Epic 2: Gestão de Estações e Carregadores

### US-010: Listar Estações no Mapa

**Como** um usuário
**Quero** ver todas as estações disponíveis em um mapa
**Para que** eu possa escolher a mais próxima de mim

**Critérios de Aceitação:**
- [ ] Mapa centrado na localização atual do usuário (GPS)
- [ ] Marcadores coloridos: Verde (disponível), Amarelo (ocupado), Vermelho (offline)
- [ ] Filtros: Tipo de conector, Potência mínima, Disponibilidade
- [ ] Ao clicar no marcador, exibe card com detalhes da estação
- [ ] Card mostra: Nome, Endereço, Carregadores disponíveis/total, Distância
- [ ] Botão "Navegar" abre Google Maps/Waze
- [ ] Lista alternativa (visualização sem mapa)

**Estimativa:** 8 Story Points
**Prioridade:** Alta
**Sprint:** 3

---

### US-011: Ver Detalhes de Estação

**Como** um usuário
**Quero** ver detalhes completos de uma estação
**Para que** eu possa decidir se vou até lá

**Critérios de Aceitação:**
- [ ] Exibe: Nome, Endereço completo, Horário de funcionamento
- [ ] Fotos da estação (carrossel)
- [ ] Lista de carregadores com status em tempo real
- [ ] Amenidades: WiFi, Banheiro, Café, Loja
- [ ] Instruções de acesso (portão, estacionamento)
- [ ] Avaliações de usuários (estrelas 1-5)
- [ ] Botão "Favoritar" (salva para acesso rápido)
- [ ] Botão "Reportar Problema"

**Estimativa:** 5 Story Points
**Prioridade:** Média
**Sprint:** 3

---

### US-012: Ver Status de Carregadores em Tempo Real

**Como** um usuário
**Quero** ver o status atual de cada carregador
**Para que** eu saiba se está disponível antes de ir até lá

**Critérios de Aceitação:**
- [ ] Status: Disponível, Ocupado, Reservado, Offline, Faulted, Manutenção
- [ ] Cores visuais claras para cada status
- [ ] Atualização automática a cada 30 segundos (WebSocket)
- [ ] Mostra tempo estimado de liberação (se ocupado)
- [ ] Especificações: Potência (kW), Tipo de conector
- [ ] Tarifa atual (R$/kWh)
- [ ] Botão "Reservar" (se disponível) - funcionalidade futura

**Estimativa:** 8 Story Points
**Prioridade:** Alta
**Sprint:** 4

---

## ⚡ Epic 3: Sessões de Carregamento

### US-020: Iniciar Sessão de Carregamento

**Como** um usuário com veículo cadastrado
**Quero** iniciar uma sessão de carregamento
**Para que** meu veículo seja recarregado

**Critérios de Aceitação:**
- [ ] Seleciona carregador disponível
- [ ] Seleciona veículo (se tiver mais de um)
- [ ] Sistema verifica saldo suficiente (mínimo R$ 10)
- [ ] Exibe estimativa de custo baseado em tarifa atual
- [ ] Confirmação: "Iniciar carregamento no Carregador X?"
- [ ] Ao confirmar, envia comando OCPP RemoteStartTransaction
- [ ] Aguarda confirmação do carregador (timeout 30s)
- [ ] Se sucesso, redireciona para tela de monitoramento
- [ ] Se falha, exibe mensagem de erro clara
- [ ] Notificação push: "Carregamento iniciado"

**Estimativa:** 13 Story Points
**Prioridade:** Alta
**Sprint:** 5

---

### US-021: Monitorar Carregamento em Tempo Real

**Como** um usuário com sessão ativa
**Quero** acompanhar o carregamento em tempo real
**Para que** eu saiba quando meu veículo estará carregado

**Critérios de Aceitação:**
- [ ] Exibe em destaque: Energia entregue (kWh), Tempo decorrido, Custo atual
- [ ] Atualização em tempo real (WebSocket, a cada MeterValue)
- [ ] Gráfico de potência ao longo do tempo
- [ ] Barra de progresso (% de bateria - se disponível via OCPP)
- [ ] Estimativa de tempo restante para 80% e 100%
- [ ] Botão "Parar Carregamento" sempre visível
- [ ] Notificações: 50% completo, 80% completo, 100% completo
- [ ] Permite deixar tela (carregamento continua em background)

**Estimativa:** 13 Story Points
**Prioridade:** Alta
**Sprint:** 6

---

### US-022: Parar Carregamento

**Como** um usuário com sessão ativa
**Quero** parar o carregamento manualmente
**Para que** eu possa liberar o carregador quando terminar

**Critérios de Aceitação:**
- [ ] Botão "Parar Carregamento" claramente visível
- [ ] Confirmação: "Tem certeza? Custo atual: R$ X,XX"
- [ ] Ao confirmar, envia OCPP RemoteStopTransaction
- [ ] Aguarda confirmação do carregador (timeout 30s)
- [ ] Exibe resumo: Energia total, Tempo total, Custo final
- [ ] Redireciona para tela de pagamento
- [ ] Notificação: "Carregamento finalizado"
- [ ] Se falha, permite retry ou suporte

**Estimativa:** 8 Story Points
**Prioridade:** Alta
**Sprint:** 6

---

### US-023: Ver Histórico de Carregamentos

**Como** um usuário
**Quero** ver meu histórico de carregamentos
**Para que** eu possa acompanhar meu consumo e gastos

**Critérios de Aceitação:**
- [ ] Lista todas sessões: Concluídas, Canceladas, Em andamento
- [ ] Cada item mostra: Data, Estação, Energia (kWh), Duração, Custo
- [ ] Filtros: Período (semana, mês, ano), Estação, Veículo
- [ ] Ordenação: Mais recente primeiro (padrão)
- [ ] Ao clicar, expande com detalhes completos
- [ ] Botão "Download Recibo" (PDF)
- [ ] Gráfico de consumo mensal (kWh e R$)
- [ ] Exportar CSV (para declaração IR)

**Estimativa:** 8 Story Points
**Prioridade:** Média
**Sprint:** 7

---

## 💳 Epic 4: Pagamentos

### US-030: Comprar Créditos com PIX

**Como** um usuário
**Quero** comprar créditos via PIX
**Para que** eu possa carregar meu veículo

**Critérios de Aceitação:**
- [ ] Opções de pacotes: R$ 50, R$ 100, R$ 200, R$ 500, Outro valor
- [ ] Pacotes maiores têm bônus: +5% (R$100), +10% (R$200), +15% (R$500)
- [ ] Gera QR Code PIX (via Mercado Pago ou PagSeguro)
- [ ] Exibe QR Code + código copia-e-cola
- [ ] Válido por 30 minutos
- [ ] Aguarda confirmação via webhook
- [ ] Ao confirmar, atualiza saldo imediatamente
- [ ] Notificação: "Créditos adicionados! Saldo: R$ X,XX"
- [ ] Recibo enviado por email

**Estimativa:** 13 Story Points
**Prioridade:** Alta
**Sprint:** 8

---

### US-031: Pagar Sessão com Cartão de Crédito

**Como** um usuário
**Quero** pagar uma sessão com cartão de crédito
**Para que** eu possa carregar mesmo sem créditos pré-pagos

**Critérios de Aceitação:**
- [ ] Integração com Stripe ou Mercado Pago
- [ ] Formulário: Número do cartão, Validade, CVV, Nome
- [ ] Opção de parcelamento (até 3x sem juros)
- [ ] Salvar cartão para próximas compras (opcional, tokenizado)
- [ ] 3D Secure para segurança adicional
- [ ] Processamento instantâneo (< 5s)
- [ ] Se aprovado, libera veículo do carregador
- [ ] Se negado, permite retry ou método alternativo
- [ ] Recibo digital enviado por email

**Estimativa:** 13 Story Points
**Prioridade:** Alta
**Sprint:** 9

---

### US-032: Ver Extrato de Transações

**Como** um usuário
**Quero** ver meu extrato financeiro
**Para que** eu possa controlar meus gastos

**Critérios de Aceitação:**
- [ ] Lista todas transações: Compras de crédito, Carregamentos, Estornos
- [ ] Cada transação mostra: Data, Tipo, Valor, Método de pagamento, Status
- [ ] Saldo atual destacado no topo
- [ ] Filtros: Período, Tipo de transação
- [ ] Totalizadores: Total gasto, Total recarregado, Economia vs gasolina
- [ ] Download de extrato (PDF ou CSV)
- [ ] Gráfico de gastos mensais

**Estimativa:** 5 Story Points
**Prioridade:** Média
**Sprint:** 10

---

## 🔌 Epic 5: OCPP WebSocket

### US-040: BootNotification (Carregador se Conecta)

**Como** desenvolvedor
**Quero** que o sistema aceite BootNotification de carregadores
**Para que** eles se registrem corretamente no sistema

**Critérios de Aceitação:**
- [ ] Server WebSocket escuta na porta 9000
- [ ] Aceita conexões de carregadores autenticados (serial number)
- [ ] Processa mensagem BootNotification (OCPP 1.6)
- [ ] Valida campos obrigatórios: chargePointVendor, chargePointModel
- [ ] Responde com status "Accepted" se carregador conhecido
- [ ] Define heartbeat interval: 300 segundos (5 minutos)
- [ ] Atualiza status do carregador para "Online" no banco
- [ ] Log de evento: "Charger X connected"

**Estimativa:** 13 Story Points
**Prioridade:** Alta
**Sprint:** 5

---

### US-041: Heartbeat (Keepalive)

**Como** desenvolvedor
**Quero** que carregadores enviem Heartbeat
**Para que** eu saiba que estão online

**Critérios de Aceitação:**
- [ ] Carregadores enviam Heartbeat a cada 5 minutos
- [ ] Server responde com timestamp atual
- [ ] Atualiza last_heartbeat no banco de dados
- [ ] Se não receber heartbeat por 10min, marca carregador como Offline
- [ ] Alerta enviado para equipe técnica (Slack)
- [ ] Log de cada heartbeat recebido (nível DEBUG)

**Estimativa:** 5 Story Points
**Prioridade:** Alta
**Sprint:** 5

---

### US-042: StartTransaction (Iniciar Carregamento)

**Como** desenvolvedor
**Quero** processar mensagem StartTransaction
**Para que** o carregamento seja registrado no sistema

**Critérios de Aceitação:**
- [ ] Carregador envia StartTransaction após usuário conectar cabo
- [ ] Mensagem contém: connectorId, idTag (RFID), meterStart, timestamp
- [ ] Server valida idTag (verifica se usuário existe e tem saldo)
- [ ] Se autorizado, responde com transactionId único
- [ ] Cria registro de ChargingSession no banco
- [ ] Atualiza status do carregador para "Occupied"
- [ ] Notificação para usuário: "Carregamento iniciado"
- [ ] Se não autorizado, responde com "IdTagInvalid"

**Estimativa:** 13 Story Points
**Prioridade:** Alta
**Sprint:** 6

---

### US-043: MeterValues (Dados em Tempo Real)

**Como** desenvolvedor
**Quero** receber MeterValues dos carregadores
**Para que** usuários vejam progresso em tempo real

**Critérios de Aceitação:**
- [ ] Carregadores enviam MeterValues a cada 60 segundos
- [ ] Mensagem contém: transactionId, meterValue (Wh), timestamp
- [ ] Opcionalmente: powerKw, currentA, voltageV, socPercent
- [ ] Server persiste em tabela meter_value
- [ ] Calcula energia entregue (meterValue atual - meterStart)
- [ ] Calcula custo acumulado (energia × tarifa)
- [ ] Envia atualização para frontend via WebSocket
- [ ] Frontend atualiza tela de monitoramento em tempo real

**Estimativa:** 13 Story Points
**Prioridade:** Alta
**Sprint:** 6

---

### US-044: StopTransaction (Finalizar Carregamento)

**Como** desenvolvedor
**Quero** processar StopTransaction
**Para que** a sessão seja finalizada corretamente

**Critérios de Aceitação:**
- [ ] Carregador envia StopTransaction ao desconectar cabo
- [ ] Mensagem contém: transactionId, meterStop, timestamp, reason
- [ ] Server atualiza ChargingSession: endTime, meterEnd, energy_delivered
- [ ] Calcula custo total (energia × tarifa)
- [ ] Atualiza status para "Completed"
- [ ] Atualiza status do carregador para "Available"
- [ ] Processa pagamento (debita do saldo ou cria cobrança)
- [ ] Envia recibo por email
- [ ] Notificação: "Carregamento finalizado. Custo: R$ X,XX"

**Estimativa:** 13 Story Points
**Prioridade:** Alta
**Sprint:** 6

---

## 📊 Resumo de Estimativas

| Epic | User Stories | Story Points Total | Sprints |
|------|--------------|-------------------|---------|
| **Epic 1: Usuários** | 4 | 16 | 1-2 |
| **Epic 2: Estações** | 3 | 21 | 3-4 |
| **Epic 3: Sessões** | 4 | 42 | 5-7 |
| **Epic 4: Pagamentos** | 3 | 31 | 8-10 |
| **Epic 5: OCPP** | 5 | 61 | 5-6 |
| **TOTAL** | **19** | **171** | **10 sprints** |

---

## 📅 Roadmap Sugerido

### Sprint 1-2: Foundation (4 semanas)
- Autenticação e cadastro de usuários
- CRUD de veículos

### Sprint 3-4: Discovery (4 semanas)
- Listagem de estações no mapa
- Detalhes e status em tempo real

### Sprint 5-6: Core OCPP (4 semanas)
- Servidor WebSocket completo
- Fluxo de carregamento end-to-end

### Sprint 7-8: Monetization (4 semanas)
- Histórico de sessões
- Compra de créditos (PIX)

### Sprint 9-10: Growth (4 semanas)
- Pagamento com cartão
- Extratos e analytics

---

## 🎯 Definition of Done

Uma User Story está "Done" quando:

- [ ] Código desenvolvido e revisado (code review)
- [ ] Testes unitários escritos (cobertura >= 80%)
- [ ] Testes de integração escritos
- [ ] Testes funcionais/E2E passando
- [ ] PHPStan level 8 sem erros
- [ ] Documentação atualizada (se aplicável)
- [ ] Deploy em staging realizado
- [ ] QA testou e aprovoucou
- [ ] Product Owner aceitou
- [ ] Merge na branch main

---

## 📌 Notas

- **Velocity esperada:** 20-25 story points por sprint (time de 5 devs)
- **Sprints de 2 semanas**
- **Refinamento:** Toda quarta-feira
- **Retrospectiva:** Última sexta de cada sprint

---

**Responsável:** Product Owner
**Última atualização:** Janeiro 2025
