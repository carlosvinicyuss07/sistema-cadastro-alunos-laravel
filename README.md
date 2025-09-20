# 📚 Sistema de Cadastro de Alunos

Um sistema web desenvolvido em **Laravel 12** para gerenciar o cadastro de alunos.  
O projeto conta com **autenticação de usuários**, **controle de permissões** (user/admin) e operações de **CRUD** (Create, Read, Update, Delete) integradas ao **MySQL**.

---

## ✨ Funcionalidades

- 🔐 **Autenticação** de usuários (login, registro e logout).
- 👥 **Controle de permissões**:
  - **Usuário comum** → pode visualizar a lista de alunos.
  - **Administrador** → pode adicionar, editar e excluir alunos.
- 📝 **Cadastro de alunos** com informações básicas (nome, email, curso, nota etc.).
- 📑 **Listagem de alunos** em tabela dinâmica.
- ✏️ **Edição de registros** já cadastrados.
- ❌ **Exclusão** de alunos.
- ✅ Validações de formulário.
- 🎨 Layout com Blade Templates.

---
## 🖼️ Demonstração do Sistema

- 🔑 Tela de Login
<img width="1920" height="910" alt="image" src="https://github.com/user-attachments/assets/e34c80fa-abb7-4eb3-9988-d7be2d3b078f" />

- 🔑 Tela de Registro
<img width="1920" height="911" alt="image" src="https://github.com/user-attachments/assets/6879a2ad-2e19-4023-9b2c-84bf4265a930" />

- 🏠 Tela Home 
<img width="1916" height="908" alt="image" src="https://github.com/user-attachments/assets/6b410afd-5c73-4114-902c-172af1ffbd84" />

- 📝 Listagem de Alunos
<img width="1916" height="908" alt="image" src="https://github.com/user-attachments/assets/84c31569-7e01-4a4c-be7e-6a645631f11f" />

- ➕ Cadastro de Aluno
<img width="1919" height="905" alt="image" src="https://github.com/user-attachments/assets/d844e121-f940-431b-9f3b-e7598bc21d3d" />

- ℹ️ Informações do Usuário
<img width="1916" height="909" alt="image" src="https://github.com/user-attachments/assets/fd7bc7dd-1f7e-48f8-84cf-23032a0d256e" />

---

## 🛠️ Tecnologias utilizadas

- [PHP 8.2](https://www.php.net/)  
- [Laravel 12](https://laravel.com/)  
- [MySQL](https://www.mysql.com/)  
- [Blade Templates](https://laravel.com/docs/12.x/blade)  
- [TailwindCSS](https://tailwindcss.com/) (via Breeze para autenticação)  
- [Composer](https://getcomposer.org/)  
- [XAMPP](https://www.apachefriends.org/) (ambiente de desenvolvimento)

---

## ⚙️ Requisitos

Antes de rodar o projeto, verifique se você possui:

- PHP >= 8.2  
- Composer  
- MySQL  
- Node.js & NPM (para assets, caso use Breeze/Front-end)  

---

## 🚀 Como rodar o projeto

Clone o repositório:

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```
Instale as dependências:

```bash
composer install
npm install && npm run dev
```
Configure o arquivo .env:

```env
APP_NAME="Sistema de Cadastro de Alunos"
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_alunos
DB_USERNAME=root
DB_PASSWORD=
```
Gere a chave da aplicação:

```bash
php artisan key:generate
```
Rode as migrações para criar as tabelas no banco:

```bash
php artisan migrate
```
Inicie o servidor local:

```bash
php artisan serve
```
Acesse no navegador:

```cpp
http://127.0.0.1:8000
```
---

## 👤 Perfis de Usuário

Usuário comum: pode visualizar a lista de alunos.

Administrador: pode cadastrar, editar e excluir alunos.

A definição de perfis pode ser ajustada diretamente no banco de dados, atribuindo o campo role ao usuário (user ou admin).

---

## 📂 Estrutura de Pastas (simplificada)
```bash
app/
 ├── Http/
 │    ├── Controllers/      # Controladores (AlunoController, Auth Controllers)
 │    ├── Middleware/       # Middlewares de autenticação e autorização
 ├── Models/                # Modelos Eloquent (Aluno, User)

resources/
 ├── views/                 # Views Blade (alunos, auth, layouts)

routes/
 ├── web.php                # Rotas principais
```

---
## 🎯 Objetivo do projeto

O principal objetivo deste sistema foi praticar Laravel de forma progressiva, evoluindo do CRUD básico até recursos mais avançados como autenticação, autorização e organização das rotas.
Esse projeto mostra como transformar um conceito simples (cadastro de alunos) em um sistema funcional e escalável.

---
## 📜 Licença

Este projeto está sob a licença MIT.

---
## 👨‍💻 Autor

Desenvolvido por Carlos Vinícyus Silva Nascimento

📧 [carlosvinicyuss@gmail.com]

🔗 [www.linkedin.com/in/carlosvinicyuss]
