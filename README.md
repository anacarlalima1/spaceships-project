# 🚀 Spaceship Management System

Bem-vindo ao **Starship Management System**! Este projeto foi desenvolvido como parte de um teste técnico, utilizando o padrão **Domain-Driven Design (DDD)**. Ele simula um sistema de gerenciamento de espaçonaves, onde é possível visualizar, adicionar, editar e remover espaçonaves através de uma interface desenvolvida com Vue.js e Tailwind CSS.

## 🛠 Tecnologias Utilizadas

- **PHP 7.4**: Linguagem de programação principal utilizada no backend.
- **Laravel 8.x**: Framework PHP utilizado para o desenvolvimento da API e implementação do padrão **DDD**.
- **JSON Server**: Ferramenta usada para simular uma API RESTful com base em um arquivo JSON.
- **Vue.js**: Framework JavaScript utilizado para o desenvolvimento do frontend.
- **Vuex**: Biblioteca para gerenciamento de estado no Vue.js.
- **Tailwind CSS**: Framework CSS utilizado para estilização e responsividade.
- **Axios**: Biblioteca para realizar requisições HTTP no frontend.
- **Vite**: Ferramenta de build rápida para Vue.js.

## ⚙️ Funcionalidades

- **Listagem de Espaçonaves**: Permite visualizar todas as espaçonaves registradas no sistema.
- **Adicionar Espaçonaves**: Interface para cadastrar novas espaçonaves.
- **Editar Espaçonaves**: Funcionalidade para editar dados de espaçonaves existentes.
- **Remover Espaçonaves**: Permite excluir espaçonaves indesejadas do sistema.
- **Modal de Confirmação**: Ao excluir uma espaçonave, um modal de confirmação é exibido.

## 🧱 Arquitetura do Projeto - DDD

O projeto foi desenvolvido utilizando o padrão **Domain-Driven Design (DDD)**, que organiza o código em camadas claras e bem definidas.

### 📂 Estrutura do Projeto

```bash
.
├── app/
│   ├── SpaceShip/
│   │   ├── Application/          # Camada de aplicação (use cases)
│   │   ├── Domain/               # Camada de domínio (entidades, DTOs, interfaces)
│   │   ├── Infrastructure/       # Camada de infraestrutura (repositorios, controllers, integração com APIs)
│   │   └── Http/                 # Controladores HTTP para lidar com requests
├── resources/
│   ├── js/                       # Arquivos frontend Vue.js
│   ├── views/                    # Views blade se necessário
├── routes/
│   ├── web.php                   # Definições das rotas web da aplicação
├── database/
│   ├── db.json                   # Arquivo JSON utilizado pelo JSON Server para simular a API
└── README.md                     # Este arquivo
```

### Domain-Driven Design

- **Camada de Domínio**: Define as regras de negócio e as entidades como DTOs (Data Transfer Objects) e interfaces de repositório.
- **Camada de Aplicação**: Contém os "use cases" que orquestram as operações de negócio.
- **Camada de Infraestrutura**: Implementação dos repositórios e lógica de persistência, além da integração com serviços externos.

## 🚀 Como Executar o Projeto

### 1. Clone o repositório

```bash
git clone https://github.com/anacarlalima1/starships.git
cd starships-project
```

### 2. Instale as dependências do Laravel

Para instalar as dependências do Laravel, execute o seguinte comando:

```bash
composer install
```

### 3. Configure o arquivo `.env`

Renomeie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente necessárias, como a URL da API do JSON Server.

```bash
cp .env.example .env
```

Em seguida, gere a chave da aplicação:

```bash
php artisan key:generate
```

### 4. Instale as dependências do frontend

```bash
npm install
npm run dev
```

### 5. Inicie o servidor Laravel

Agora, inicie o servidor local do Laravel:

```bash
php artisan serve
```

Isso deve iniciar o servidor na URL:

```bash
http://localhost:8000
```

### 6. Inicie o JSON Server

Inicie o JSON Server para servir o arquivo `db.json`:

```bash
json-server --watch database/db.json --port 3000
```

Isso deve iniciar a API simulada na URL:

```bash
http://localhost:3000
```

### 7. Executando o Frontend

O frontend é construído utilizando Vue.js e Vite. Para rodar o frontend, use o comando:

```bash
npm run dev
```

Isso deve abrir o frontend automaticamente no navegador.

### 8. Acesse o Projeto

Agora, você pode acessar a interface web no endereço `http://localhost:8000` e utilizar as funcionalidades de listagem, adição, edição e exclusão de espaçonaves.

## 🛠 Comandos Úteis

- **Iniciar o servidor Laravel**: `php artisan serve`
- **Iniciar o JSON Server**: `json-server --watch database/db.json --port 3000`
- **Compilar o frontend com Vite**: `npm run dev`

## 📖 Padrões Utilizados

### Domain-Driven Design (DDD)
Este projeto foi desenvolvido utilizando o **DDD (Domain-Driven Design)** para organizar o código em camadas claras e definir as responsabilidades de cada uma delas. Com isso, o código se torna mais fácil de manter, escalar e testar.

- **Camada de Domínio**: Regras de negócio e entidades principais, como o `SpaceshipDTO` e interfaces de repositórios.
- **Camada de Aplicação**: Contém os casos de uso, como a criação, edição e exclusão de espaçonaves.
- **Camada de Infraestrutura**: Contém a lógica que comunica com a API externa (JSON Server), como o repositório `SpaceshipApiRepository`.

## 🤝 Contribuições

Sinta-se à vontade para contribuir com melhorias ou correções para este projeto! Basta abrir um **pull request** ou relatar um **issue**.

---

Com isso, o projeto estará configurado e pronto para uso!
