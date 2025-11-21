#  Portal de Notícias – PHP, Bootstrap e SQLite

Este projeto é um **Portal de Notícias moderno**, criado como trabalho acadêmico para demonstrar o uso de tecnologias web (PHP, HTML, CSS, JavaScript e Bootstrap) integradas a um banco de dados SQLite.  
O sistema permite cadastrar, editar, excluir e exibir notícias em um layout escuro moderno e responsivo.

---

##  Funcionalidades

###  **Área Pública**
- Exibição de notícias
- Notícia em destaque (hero)
- Cards modernos
- Busca por palavra-chave
- Página individual da notícia

###  **Painel Administrativo**
- Login e logout
- Cadastro de notícias
- Edição de notícias
- Exclusão de notícias
- Upload de imagens

###  **Design Moderno**
- Tema escuro (dark mode)
- Layout responsivo com Bootstrap 5
- Tipografia Inter
- Animações leves e hover effects

---

##  Tecnologias Utilizadas

### **Backend**
- PHP 7+
- PDO para acesso ao banco
- SQLite (estrutura leve em arquivo `.db`)

### **Frontend**
- HTML5
- CSS3
- JavaScript
- Bootstrap 5
- Tema escuro personalizado

### **Ambiente**
- XAMPP (Apache + PHP)
- GitHub para versionamento e apresentação

---

##  Estrutura do Projeto
/portal_bootstrap_updated
│── index.php
│── view.php
│── login.php
│── logout.php
│── admin.php
│── add.php
│── edit.php
│── delete.php
│── db.php
│── setup.php
│
├── /data
│ └── news.db
│
├── /uploads
│ └── imagens enviadas pelo painel
│
└── /assets/css
└── dark.css

---

##  Como Executar no XAMPP

### 1️⃣ Copie o projeto para: C:\xampp\htdocs\portal_bootstrap_updated

### 2️⃣ Inicie o Apache no XAMPP

### 3️⃣ No navegador, acesse: http://localhost/portal_bootstrap_updated/

### 4️⃣ Antes de usar pela primeira vez, acesse: http://localhost/portal_bootstrap_updated/setup.php
Isso cria automaticamente:
- o banco `news.db`  
- o usuário administrador

###  Credenciais padrão:
**Usuário:** admin  
**Senha:** admin123  

Depois, você pode excluir o arquivo `setup.php` por segurança.

---

##  Acadêmico(a)
**Roberta Luiza da Silva Moreira**

##  Tutor Externo
**Katyeudo Karlos de Sousa Oliveira**

---

##  Sobre o Projeto Acadêmico

Este repositório faz parte do trabalho acadêmico do curso da UNIASSELVI, demonstrando:

- desenvolvimento de um sistema real em PHP  
- uso de banco de dados para persistência  
- criação de interface responsiva  
- aplicação de CRUD completo  
- uso de GitHub como portfólio e entrega técnica  

---

## Contribuições
Este projeto pode ser expandido com:
- categorias de notícias  
- sistema de comentários  
- API REST  
- tema claro/escuro automático  

Sinta-se à vontade para evoluir o projeto!




