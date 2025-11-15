# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is the **SGA Industries Eletropostos** project - a commercial electric vehicle charging station network for Belém, Pará, Brazil. The system manages OCPP 1.6+ compatible charging stations with a proprietary software platform.

**Key Technologies (Planned):**
- Backend: Java/SpringBoot (JHipster compatible)
- Database: PostgreSQL
- Frontend: Angular (JHipster compatible)
- Protocol: OCPP 1.6 JSON over WebSocket
- Cloud: AWS or DigitalOcean

## Project Documentation

The complete project plan is available in `pdf_9ad542c9.pdf`, which contains:
- 24-month implementation timeline (5 phases)
- Technical specifications and architecture
- Budget breakdown (R$ 1.38M total investment)
- Risk management strategies
- Stakeholder communication plans

## Architecture Goals

**System Components (from project plan):**

```
[Charging Stations OCPP]
    ↓
[Central OCPP Server]
    ↓
[Backend REST API]
    ↓
[PostgreSQL Database]
    ↓
[Web/Mobile Frontend]
```

**Core Functionalities to Implement:**

1. **User Management:** Registration, authentication, password recovery
2. **Station Location:** Real-time map, filtering, availability
3. **Charging Sessions:** Booking, start/stop control, real-time monitoring
4. **Billing:** Tariff calculation, payment integration (Stripe/PayPal/Pix), receipts
5. **Equipment Monitoring:** Real-time status, failure alerts, maintenance tracking
6. **Reporting:** Usage analytics, revenue tracking, operational metrics
7. **Security:** End-to-end encryption, multi-factor auth, LGPD compliance

**Advanced Features (Future):**
- Smart charging based on time-of-use rates
- Solar generation integration
- Loyalty program and gamification
- Public API for third-party integration

## Development Phases

**Phase 1 (Months 1-3):** Planning & Analysis
- Market research and feasibility studies
- Location analysis and partner negotiations
- Regulatory compliance documentation

**Phase 2 (Months 4-6):** Development & Procurement
- Backend OCPP server implementation
- Core REST APIs
- Equipment procurement from China (BYD/TGOOD)
- Commercial partnerships

**Phase 3 (Months 7-9):** Installation & Integration
- First charging point installation
- System integration and testing
- Regulatory inspections (CREA, Fire Department, Equatorial Pará)

**Phase 4 (Months 10-12):** Operations & Optimization
- Commercial launch
- Performance monitoring and optimization
- Pricing adjustments

**Phase 5 (Months 13-24):** Expansion
- Deploy 2-3 additional charging points
- Scale operations

## Key Technical Requirements

**OCPP 1.6 Compliance:**
- WebSocket communication with charging stations
- Support for standard OCPP messages (StartTransaction, StopTransaction, etc.)
- Real-time status monitoring and remote control

**Security & Compliance:**
- JWT authentication with SSL/TLS
- LGPD (Brazil's GDPR) compliance for user data
- Secure payment processing
- ABNT NBR IEC 61851 electrical standards

**Performance Targets:**
- API response time: <500ms (p95)
- System uptime: >99.5%
- Transaction error rate: <0.1%
- Support response time: <2 hours

## Business Metrics (KPIs)

**Operational:**
- Average utilization: >60% (Month 12), >75% (Month 24)
- Monthly revenue: R$ 35,000 (Month 12), R$ 120,000 (Month 24)
- Operating margin: >30% (Month 12), >35% (Month 24)

**Customer:**
- Net Promoter Score (NPS): >50 (Month 12), >60 (Month 24)
- Customer retention: >85% (Month 12), >90% (Month 24)
- Customer Satisfaction (CSAT): >4.2/5

**Financial:**
- ROI: >40% annually (target: >50%)
- Payback period: <20 months (target: 18 months)

## Priority Locations

1. Shopping Bosque Grão-Pará (existing EV infrastructure, high traffic)
2. Shopping Pátio Belém (major commercial anchor)
3. Aeroporto Internacional Val-de-Cans (traveler demand)
4. BR-316 highway (interstate EV traffic)
5. Parkshopping area (Class A, high EV concentration)

## Pricing Strategy

- Base rate: R$ 0.85/kWh (launch discount: R$ 0.68/kWh)
- Peak hours (11:30-14:00, 18:00-21:00): +15%
- Off-peak (22:00-06:00, 09:00-11:30): -10%
- Subscription plan: R$ 99/month for 10 charges

## Risk Management

**High Priority Risks:**
- Import delays from China (add 15-day buffer)
- Lower than projected demand (deep market studies required)
- Equipment failure (preventive maintenance, redundancy)
- Aggressive competition (differentiate via software and service)

## Stakeholder Communications

- **Internal team:** Weekly meetings + reports
- **Commercial partners:** Monthly meetings + reports
- **Investors:** Monthly reports
- **Regulatory agencies (ANEEL):** Quarterly formal communications
- **Customers:** Continuous (app, email, support)

## Project Team Structure

- **Project Director:** Overall responsibility, strategic planning
- **Technical Manager:** Infrastructure, OCPP development, installations
- **Commercial Manager:** Partnerships, operations, business development
- **Admin-Financial Manager:** Budget control, compliance, legal

## Notes for Development

- The project follows a **Build-Operate-Transfer** model with commercial partners
- All charging stations will use **comodato** (loan for use) agreements with hosts
- Revenue sharing: 30-40% to commercial partner
- Focus on **proprietary software** as competitive advantage
- Equipment: Mix of Chinese imports (BYD, TGOOD) and local suppliers for warranty
