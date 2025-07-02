💼 JobBoard
JobBoard é uma aplicação web desenvolvida com Laravel que conecta candidatos e empregadores por meio de uma plataforma simples e eficiente para publicação e candidatura de vagas. O projeto é focado em boas práticas de desenvolvimento, arquitetura limpa e componentes reutilizáveis.


🚀 Funcionalidades
- 📋 Listagem pública de vagas

- 🧑‍💼 Cadastro de empregadores e publicação de vagas

- 👤 Registro e login de candidatos

- 📝 Aplicação a vagas com controle de duplicidade

- 📂 Visualização de candidatos por vaga com salário esperado

- 🔍 Breadcrumbs e interface intuitiva via Blade Components
  

🧠 Tecnologias e Padrões Utilizados

- ⚙️ Framework e Estrutura
  
> Laravel 10+ com estrutura MVC

> Componentização via Blade Components (<x-layout>, <x-card>, <x-link-button>, etc.)

> Organização RESTful com uso extensivo de Route::resource()

> Integração com Vite para build frontend moderno e rápido, com suporte a hot reload

> Utilização de Alpine.js para comportamentos dinâmicos leves no frontend, sem necessidade de frameworks mais pesados

> Route Model Binding para acesso direto a modelos nas controllers


🔐 Segurança e Autenticação

- Autenticação de usuários com auth e controle de sessões

- Middleware employer para separar contextos de navegação

- Policies (ex: apply) para autorização baseada em contexto de usuário


🧰 Validação e Regras de Negócio
- Uso de Form Requests (JobRequest) para validação centralizada

- Proteção contra acessos não autorizados e submissões inválidas

- Separação clara entre usuários autenticados e visitantes com @auth / @guest


🧩 Componentização
- UI modular com Blade Components reutilizáveis

- Campos com <x-label>, <x-text-input>, <x-radio-group>, etc.

- Padrão DRY aplicado a formulários e cards de vagas


🔄 Fluxos e Experiência
- Redirecionamentos amigáveis com feedback (with('success', ...))

- Breadcrumbs dinâmicos com links gerados por rotas nomeadas

- Mensagens condicionais personalizadas (ex: "você já se candidatou")


```
job-board/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Requests/
│   │   └── Middleware/
│   ├── Models/
│   └── Policies/
├── resources/
│   ├── views/
│       ├── components/
│       ├── job/
│       └── layout.blade.php
├── routes/
     └── web.php

```

📚 Como rodar o projeto

```bash
git clone https://github.com/Andreeoak/JobBoard.git
cd JobBoard/job-board
composer install

# Instala dependências JavaScript (Vite + Alpine.js)
npm install

cp .env.example .env
php artisan key:generate
docker compose up
php artisan migrate --seed
php artisan serve

# Compila os assets com Vite em modo desenvolvimento
npm run dev
```
