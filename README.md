# 🛰️ SkyRadar API — Monitoramento de Áreas de Risco (Recife)

<p align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" />
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel" />
  <img src="https://img.shields.io/badge/PostgreSQL-316192?style=for-the-badge&logo=postgresql&logoColor=white" alt="PostgreSQL" />
  <img src="https://img.shields.io/badge/Clean_Architecture-🛡️-blue?style=for-the-badge" alt="Clean Architecture" />
</p>

## 📌 Sobre o Projeto

O **SkyRadar** é o braço de segurança e geolocalização do ecossistema *Sky*. Esta API foi desenvolvida para monitorar zonas de risco e pontos críticos de alagamento na cidade de Recife/PE. 

O projeto utiliza dados em tempo real para fornecer alertas e inteligência geográfica, visando mitigar os impactos de desastres naturais e auxiliar a população local.

## 🏗️ Arquitetura e Engenharia de Software

Este projeto não é um simples CRUD. Ele foi desenhado sob os princípios da **Clean Architecture** e **SOLID**, garantindo que as regras de negócio sejam independentes de frameworks e bancos de dados.

### Diferenciais Técnicos:
* **Camada de Domínio Pura:** Entidades e regras de negócio isoladas.
* **Data Transfer Objects (DTOs):** Utilizados rigorosamente para o tráfego de dados entre camadas, garantindo integridade e tipagem.
* **Service Pattern:** Desacoplamento da lógica de negócio dos Controllers.
* **Repository Pattern:** Abstração da camada de persistência para facilitar testes e trocas de infraestrutura.

## 🛠️ Stack Tecnológica

* **Linguagem:** PHP 8.2+
* **Framework:** Laravel 11
* **Banco de Dados:** PostgreSQL (com suporte a dados geoespaciais) / SQLite (Dev)
* **Autenticação:** Laravel Sanctum (Pronta para SPAs e Mobile)
* **Ambiente:** Railway / Docker

## 📂 Estrutura de Pastas (Clean Architecture)

```text
app/
├── Domain/           # Regras de negócio e Entidades
├── Application/      # Casos de Uso e DTOs
└── Infrastructure/   # Framework, Controllers e Repositories

🚀 Como Rodar o Projeto
Clone o repositório:

    Bash
    git clone [https://github.com/SEU_USUARIO/sky-radar-api.git](https://github.com/SEU_USUARIO/sky-radar-api.git)
    Instale as dependências:

Bash
    composer install
    Configure o arquivo .env:

Bash
    cp .env.example .env
    php artisan key:generate
    Execute as migrations:

Bash
    php artisan migrate
    Inicie o servidor:

Bash
    php artisan serve
    📅 Roadmap de Desenvolvimento
    [x] Setup inicial do Laravel 11.

    [x] Estruturação das pastas de Clean Architecture.

    [ ] Implementação do CRUD de Áreas de Risco (RiskAreas).

    [ ] Integração com APIs climáticas (SkyCast PRO).

    [ ] Sistema de notificações via WebSockets (Real-time).

Desenvolvido por Sávio Gomes da Silva - Fullstack Developer & Arquiteto e Engenheiro de Software
