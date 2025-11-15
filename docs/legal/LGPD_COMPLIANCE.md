# 🔒 Conformidade LGPD - Eletroposto

**Lei Geral de Proteção de Dados (Lei nº 13.709/2018)**
**Versão:** 1.0
**Data:** Janeiro 2025

---

## 📋 Índice

1. [Visão Geral](#visão-geral)
2. [Dados Pessoais Coletados](#dados-pessoais-coletados)
3. [Base Legal](#base-legal)
4. [Direitos dos Titulares](#direitos-dos-titulares)
5. [Medidas de Segurança](#medidas-de-segurança)
6. [Transferência Internacional](#transferência-internacional)
7. [DPO - Encarregado](#dpo---encarregado)
8. [Relatório de Impacto](#relatório-de-impacto)
9. [Procedimentos](#procedimentos)

---

## 🎯 Visão Geral

A Eletroposto compromete-se com a **proteção de dados pessoais** de todos os usuários, em conformidade com a **LGPD (Lei nº 13.709/2018)**.

### Princípios Seguidos

1. **Finalidade:** Dados coletados apenas para propósitos específicos e legítimos
2. **Adequação:** Tratamento compatível com a finalidade informada
3. **Necessidade:** Limitação ao mínimo necessário
4. **Livre Acesso:** Transparência sobre dados coletados
5. **Qualidade:** Dados exatos, claros e atualizados
6. **Transparência:** Informações claras e acessíveis
7. **Segurança:** Medidas técnicas e administrativas
8. **Prevenção:** Medidas para prevenir danos
9. **Não Discriminação:** Tratamento não pode ser ilícito ou abusivo
10. **Responsabilização:** Demonstração de conformidade

---

## 📊 Dados Pessoais Coletados

### Dados de Cadastro

| Dado | Categoria | Finalidade | Base Legal |
|------|-----------|------------|------------|
| **Nome Completo** | Identificação | Identificação do usuário | Execução de contrato |
| **CPF** | Identificação | Validação de identidade, faturamento | Execução de contrato |
| **Email** | Contato | Comunicação, recuperação de senha | Execução de contrato |
| **Telefone** | Contato | Notificações SMS, suporte | Consentimento |
| **Data de Nascimento** | Identificação | Validação de maioridade | Obrigação legal |
| **Endereço Completo** | Localização | Faturamento, envio de documentos | Execução de contrato |

### Dados do Veículo

| Dado | Categoria | Finalidade | Base Legal |
|------|-----------|------------|------------|
| **Marca/Modelo** | Técnico | Compatibilidade de carregamento | Execução de contrato |
| **Placa** | Identificação | Identificação do veículo | Execução de contrato |
| **Tipo de Conector** | Técnico | Compatibilidade de carregamento | Execução de contrato |
| **Capacidade Bateria** | Técnico | Estimativas de carregamento | Legítimo interesse |

### Dados de Uso

| Dado | Categoria | Finalidade | Base Legal |
|------|-----------|------------|------------|
| **Localização (GPS)** | Geolocalização | Encontrar estações próximas | Consentimento |
| **Histórico de Carregamentos** | Transacional | Histórico, faturamento | Execução de contrato |
| **Energia Consumida (kWh)** | Transacional | Faturamento | Execução de contrato |
| **Forma de Pagamento** | Financeiro | Processamento de pagamentos | Execução de contrato |
| **IP Address** | Técnico | Segurança, prevenção de fraudes | Legítimo interesse |
| **User Agent** | Técnico | Compatibilidade, suporte | Legítimo interesse |

### Dados Sensíveis (NÃO coletamos)

- ❌ Origem racial ou étnica
- ❌ Convicção religiosa
- ❌ Opinião política
- ❌ Filiação sindical
- ❌ Dados genéticos ou biométricos
- ❌ Dados sobre saúde
- ❌ Dados sobre vida sexual

---

## ⚖️ Base Legal

Conforme **Art. 7º da LGPD**, tratamos dados pessoais com base em:

### 1. Consentimento (Art. 7º, I)

**Aplicável a:**
- Envio de SMS marketing
- Compartilhamento de localização em tempo real
- Notificações push personalizadas

**Como obtemos:**
```
✅ Checkbox clara e específica no cadastro:
"☐ Aceito receber notificações por SMS sobre promoções e novidades"

✅ Opt-in para cada finalidade separadamente
✅ Pode ser revogado a qualquer momento no app
```

### 2. Execução de Contrato (Art. 7º, V)

**Aplicável a:**
- Dados de cadastro (nome, CPF, email)
- Dados do veículo
- Histórico de carregamentos
- Faturamento

**Justificativa:** Necessário para fornecer o serviço de carregamento

### 3. Legítimo Interesse (Art. 7º, IX)

**Aplicável a:**
- Prevenção de fraudes (IP address, device fingerprint)
- Analytics de uso do app (anonimizados)
- Melhorias de experiência do usuário

**Balanceamento:**
- Interesse da empresa: Segurança e melhoria do serviço
- Direitos do titular: Não são desproporcionalmente afetados
- Medida: Dados minimizados e anonimizados quando possível

### 4. Obrigação Legal (Art. 7º, II)

**Aplicável a:**
- Notas fiscais (CPF/CNPJ obrigatório)
- Retenção de dados fiscais por 5 anos (Código Tributário)
- Dados para combate à lavagem de dinheiro (se aplicável)

---

## 🔓 Direitos dos Titulares

### Art. 18 da LGPD

| Direito | Descrição | Como Exercer | Prazo |
|---------|-----------|--------------|-------|
| **Confirmação** | Confirmar se tratamos seus dados | Email para dpo@eletroposto.com.br | 15 dias |
| **Acesso** | Receber cópia de todos dados | Download no app (Perfil > Privacidade > Exportar) | Imediato |
| **Correção** | Corrigir dados incompletos ou incorretos | Editar no app (Perfil > Editar Dados) | Imediato |
| **Anonimização** | Anonimizar dados desnecessários | Solicitar ao DPO | 30 dias |
| **Portabilidade** | Exportar dados em formato estruturado | Download JSON/CSV no app | Imediato |
| **Eliminação** | Excluir dados não mais necessários | App (Perfil > Deletar Conta) | 30 dias |
| **Revogação** | Revogar consentimento | App (Perfil > Privacidade > Consentimentos) | Imediato |
| **Oposição** | Opor-se ao tratamento | Email para dpo@eletroposto.com.br | 15 dias |

### Implementação Técnica

#### Exportação de Dados (JSON)

```json
{
  "personal_data": {
    "name": "João Silva",
    "cpf": "123.456.789-00",
    "email": "joao@example.com",
    "phone": "+55 91 98765-4321",
    "created_at": "2025-01-01T10:00:00Z"
  },
  "vehicles": [
    {
      "brand": "BYD",
      "model": "Dolphin",
      "license_plate": "ABC1D23",
      "connector_type": "CCS2"
    }
  ],
  "charging_sessions": [
    {
      "session_id": 42,
      "station": "Shopping Pátio Belém",
      "start_time": "2025-01-08T10:30:00Z",
      "end_time": "2025-01-08T11:15:00Z",
      "energy_kwh": 25.5,
      "cost_brl": 30.60
    }
  ],
  "payment_methods": [
    {
      "type": "credit_card",
      "last_digits": "1234",
      "expiry": "12/2027"
    }
  ]
}
```

#### Anonimização (Direito ao Esquecimento)

```php
<?php

class DataAnonymizer
{
    public function anonymizeCustomer(Customer $customer): void
    {
        $customer->setEmail('deleted_' . $customer->getId() . '@anonymized.local');
        $customer->setFirstName('Anonimizado');
        $customer->setLastName('Usuário');
        $customer->setPhoneNumber(null);
        $customer->setCpf(null);
        $customer->setDeletedAt(new \DateTimeImmutable());

        // Manter dados de sessões para auditoria fiscal (5 anos)
        // mas desassociar do usuário
        foreach ($customer->getChargingSessions() as $session) {
            $session->setAnonymized(true);
        }

        $this->entityManager->flush();

        $this->logger->info('Customer anonymized', [
            'customer_id' => $customer->getId(),
            'anonymized_at' => new \DateTimeImmutable(),
        ]);
    }
}
```

---

## 🔐 Medidas de Segurança

### Técnicas

#### 1. Criptografia

```php
// Dados em trânsito: TLS 1.3
// Configuração Nginx
ssl_protocols TLSv1.3;
ssl_ciphers HIGH:!aNULL:!MD5;

// Dados em repouso: AES-256
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;

$key = Key::loadFromAsciiSafeString(getenv('ENCRYPTION_KEY'));
$encryptedCpf = Crypto::encrypt($cpf, $key);
```

#### 2. Hashing de Senhas

```php
// Argon2i (recomendado pela OWASP)
$hash = password_hash($password, PASSWORD_ARGON2I, [
    'memory_cost' => 65536,  // 64 MB
    'time_cost' => 4,
    'threads' => 2,
]);
```

#### 3. Controle de Acesso

```php
// RBAC (Role-Based Access Control)
#[Security("is_granted('ROLE_USER') and object.getCustomer() == user")]
public function getSession(ChargingSession $session): Response
{
    // Usuário só acessa próprias sessões
}
```

#### 4. Auditoria (Logs Imutáveis)

```php
// Logs de acesso a dados pessoais
$this->auditLogger->info('Personal data accessed', [
    'data_type' => 'customer_profile',
    'customer_id' => $customerId,
    'accessed_by' => $user->getId(),
    'ip_address' => $request->getClientIp(),
    'timestamp' => new \DateTimeImmutable(),
]);
```

### Organizacionais

- ✅ **Treinamento:** Equipe treinada em LGPD (anual)
- ✅ **Políticas:** Política de Segurança da Informação documentada
- ✅ **Acesso Restrito:** Princípio do menor privilégio
- ✅ **Contratos:** NDAs com funcionários e fornecedores
- ✅ **Backups:** Criptografados e testados mensalmente
- ✅ **Incident Response:** Plano de resposta a vazamentos

---

## 🌐 Transferência Internacional

### Fornecedores Internacionais

| Fornecedor | Serviço | País | Adequação LGPD |
|------------|---------|------|----------------|
| **AWS** | Hosting | EUA | Cláusulas Contratuais Padrão |
| **Stripe** | Pagamentos | EUA | Privacy Shield successor |
| **SendGrid** | Email | EUA | Cláusulas Contratuais Padrão |

### Salvaguardas

- ✅ Data centers em São Paulo (AWS sa-east-1) quando possível
- ✅ Cláusulas contratuais padrão (Art. 33, VIII da LGPD)
- ✅ Contratos DPA (Data Processing Agreement)
- ✅ Garantias de conformidade com GDPR (quando aplicável)

---

## 👤 DPO - Encarregado de Dados

### Responsabilidades

- Orientar funcionários sobre LGPD
- Atender requisições de titulares
- Interlocução com ANPD (Autoridade Nacional)
- Auditorias de conformidade

### Contato

```
Nome: [A definir]
Email: dpo@eletroposto.com.br
Telefone: [A definir]
Endereço: [Endereço da sede]
```

**Canal de Atendimento:**
- Email: dpo@eletroposto.com.br
- Formulário Web: https://eletroposto.com.br/privacidade/contato
- Telefone: [número]
- Prazo de resposta: Até 15 dias úteis

---

## 📄 Relatório de Impacto (RIPD)

### Quando Elaborar

Conforme **Art. 38 da LGPD**, elaborar RIPD quando:
- Tratamento de dados sensíveis (não aplicável)
- Uso de tecnologias emergentes (IA, ML)
- Tratamento em larga escala
- Alto risco aos titulares

### Avaliação Atual

| Critério | Pontuação (0-5) | Justificativa |
|----------|-----------------|---------------|
| **Volume de dados** | 3 | Milhares de usuários (não milhões) |
| **Dados sensíveis** | 0 | Não coletamos |
| **Perfilamento automático** | 1 | Apenas analytics básicos |
| **Decisões automatizadas** | 2 | Apenas validações técnicas |
| **Vulnerabilidades** | 2 | Sistema novo, pode ter falhas |
| **TOTAL** | **8/25** | **Risco Baixo-Moderado** |

**Conclusão:** RIPD recomendado mas não obrigatório inicialmente. Reavaliar após 10.000 usuários.

---

## 📋 Procedimentos

### Procedimento 1: Solicitação de Acesso a Dados

```mermaid
1. Titular envia email para dpo@eletroposto.com.br
2. DPO valida identidade (CPF, email cadastrado)
3. Sistema gera exportação de dados (JSON/PDF)
4. DPO envia para titular (email seguro)
5. Registra atendimento no log de auditoria
```

**Prazo:** 15 dias úteis

---

### Procedimento 2: Exclusão de Conta (Direito ao Esquecimento)

```mermaid
1. Usuário clica "Deletar Conta" no app
2. Sistema exibe aviso: "Dados serão anonimizados em 30 dias"
3. Período de reflexão: 30 dias (pode cancelar)
4. Após 30 dias, script de anonimização roda automaticamente
5. Dados fiscais mantidos por 5 anos (obrigação legal)
6. Email de confirmação enviado
```

**Código:**

```php
// Comando: php bin/console app:anonymize-deleted-accounts
class AnonymizeDeletedAccountsCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $cutoffDate = new \DateTimeImmutable('-30 days');

        $customers = $this->customerRepository->findPendingDeletion($cutoffDate);

        foreach ($customers as $customer) {
            $this->dataAnonymizer->anonymizeCustomer($customer);
            $output->writeln("Anonymized customer #{$customer->getId()}");
        }

        return Command::SUCCESS;
    }
}
```

---

### Procedimento 3: Vazamento de Dados

**Se houver incidente de segurança:**

1. **Imediato (0-2h):**
   - Isolar sistema comprometido
   - Conter vazamento
   - Acionar equipe de segurança

2. **Até 24h:**
   - Avaliar extensão do vazamento
   - Identificar dados afetados
   - Documentar incidente

3. **Até 72h:**
   - Notificar ANPD (se alto risco)
   - Comunicar titulares afetados
   - Implementar medidas corretivas

4. **Pós-incidente:**
   - Análise de causa raiz
   - Melhorias de segurança
   - Atualizar RIPD

**Modelo de Comunicação:**

```
Assunto: Importante: Incidente de Segurança - Eletroposto

Prezado(a) [Nome],

Informamos que em [data], identificamos um incidente de segurança
que pode ter afetado seus dados pessoais.

DADOS AFETADOS:
- [Lista de tipos de dados]

MEDIDAS TOMADAS:
- [Ações corretivas]

O QUE VOCÊ DEVE FAZER:
- Altere sua senha imediatamente
- Monitore extratos bancários
- [Outras recomendações]

CONTATO:
dpo@eletroposto.com.br | [telefone]

Atenciosamente,
Equipe Eletroposto
```

---

## ✅ Checklist de Conformidade

### Antes do Lançamento

- [ ] Política de Privacidade publicada e acessível
- [ ] Termos de Uso publicados
- [ ] Formulários de consentimento implementados
- [ ] DPO nomeado oficialmente
- [ ] Contratos DPA assinados com fornecedores
- [ ] Mecanismo de exportação de dados funcionando
- [ ] Mecanismo de exclusão de conta funcionando
- [ ] Logs de auditoria configurados
- [ ] Criptografia implementada (trânsito e repouso)
- [ ] Treinamento de equipe realizado
- [ ] Plano de resposta a incidentes documentado

### Manutenção Contínua (Mensal)

- [ ] Revisar solicitações de titulares
- [ ] Atualizar registro de tratamento de dados
- [ ] Auditar logs de acesso a dados sensíveis
- [ ] Verificar conformidade de novos fornecedores
- [ ] Testar backups

### Anual

- [ ] Reavaliar RIPD
- [ ] Atualizar Política de Privacidade
- [ ] Renovar treinamento de equipe
- [ ] Auditoria externa de segurança (pentest)
- [ ] Revisar contratos com processadores

---

## 📞 Contatos

**DPO (Encarregado):**
- Email: dpo@eletroposto.com.br
- Telefone: [A definir]

**ANPD (Autoridade Nacional):**
- Site: https://www.gov.br/anpd
- Email: anpd@anpd.gov.br

---

**Responsável:** DPO (Data Protection Officer)
**Última revisão:** Janeiro 2025
**Próxima revisão:** Janeiro 2026
