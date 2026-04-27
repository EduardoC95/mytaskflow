# MyTaskFlow 🗂️

<p align="center">
  <strong>Aplicação web de gestão de tarefas desenvolvida com Laravel</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-red" />
  <img src="https://img.shields.io/badge/TailwindCSS-UI-blue" />
  <img src="https://img.shields.io/badge/MySQL-Database-orange" />
  <img src="https://img.shields.io/badge/Pest-Testing-green" />
</p>

---

## 📌 Sobre o Projeto

O **MyTaskFlow** é uma aplicação web de gestão de tarefas (To-Do) que permite criar, organizar e acompanhar tarefas de forma simples e intuitiva.

Foi desenvolvido com foco em:

* organização
* produtividade
* boas práticas de desenvolvimento Laravel

---

## 🎯 Objetivo

Criar uma aplicação rápida, clara e funcional para gestão de tarefas do dia a dia.

---

## ✨ Funcionalidades

### 📝 Tarefas

* Criar tarefas com:

  * título (obrigatório)
  * descrição (opcional)
  * data de vencimento
  * prioridade (baixa, média, alta)

### 📋 Listagem

* Visualização de todas as tarefas
* Paginação

### 🔎 Filtros

* Por estado (pendente / concluída)
* Por prioridade
* Por data

### 🔍 Detalhe

* Página dedicada para cada tarefa

### ✏️ Edição

* Atualização completa da tarefa

### ✅ Conclusão

* Marcar tarefa como concluída / reabrir

### 🗑️ Eliminação

* Remover tarefas com confirmação

---

## 🎨 Interface

* Construída com **Tailwind CSS**
* Design consistente e responsivo
* Tema inspirado em **biblioteca / editorial**

---

## 🧠 Arquitetura

* MVC (Model-View-Controller)
* Form Requests para validação
* Blade components reutilizáveis
* Código organizado e modular

---

## 🗄️ Base de Dados

Tabela principal: `tasks`

Campos:

* title
* description
* due_date
* priority
* status
* completed_at

Inclui índices para otimização de queries.

---

## 🧪 Testes

Testes de integração com **Pest** para:

* criação de tarefas
* validação
* atualização
* conclusão
* eliminação

```bash
php artisan test
```

---

## 🌱 Seeders

Dados automáticos para demonstração:

```bash
php artisan migrate:fresh --seed
```

---

## ⚙️ Instalação

```bash
git clone https://github.com/teu-username/mytaskflow.git

cd mytaskflow

composer install
npm install

cp .env.example .env
php artisan key:generate
```

### Configurar base de dados

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mytaskflow
DB_USERNAME=root
DB_PASSWORD=
```

Depois:

```bash
php artisan migrate --seed
npm run dev
```

---

## 🚀 Executar

```bash
php artisan serve
```

ou (Laravel Herd):

```
http://mytaskflow.test
```

---

## 📈 Melhorias Futuras

* autenticação de utilizadores
* notificações
* drag & drop
* API REST
* Vue.js

---

## 👨‍💻 Autor

Eduardo Carvalho

---

## 📄 Licença

Projeto desenvolvido em âmbito de estágio
