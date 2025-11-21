#  Portal de Noticias – PHP, Bootstrap e SQLite

Este projeto é um **Portal de Noticias moderno**, criado como trabalho acadêmico para demonstrar o uso de tecnologias web (PHP, HTML, CSS, JavaScript e Bootstrap) integradas a um banco de dados SQLite.  
O sistema permite cadastrar, editar, excluir e exibir notícias em um layout escuro moderno e responsivo.

---

##  Funcionalidades

###  **Area Publica**
- Exibição de noticias
- Noticia em destaque (hero)
- Cards modernos
- Busca por palavra-chave
- Pagina individual da noticia

###  **Painel Administrativo**
- Login e logout
- Cadastro de noticias
- Edição de noticias
- Exclusao de noticias
- Upload de imagens

###  **Design Moderno**
- Tema escuro (dark mode)
- Layout responsivo com Bootstrap 5
- Tipografia Inter
- Animaçoes leves e hover effects

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

###  Credenciais padrao:
**Usuario:** admin  
**Senha:** admin123  

Depois, você pode excluir o arquivo `setup.php` por segurança.

---

##  Academico
**Roberta Luiza da Silva Moreira**

##  Tutor Externo
**Katyeudo Karlos de Sousa Oliveira**

---

##  Sobre o Projeto Academico

Este repositorio faz parte do trabalho academico do curso da UNIASSELVI, demonstrando:

- desenvolvimento de um sistema real em PHP  
- uso de banco de dados para persistencia  
- criaçeo de interface responsiva  
- aplicaçao de CRUD completo  
- uso de GitHub como portfolio e entrega tecnica  

---

## Contribuiçoes
Este projeto pode ser expandido com:
- categorias de notícias  
- sistema de comentarios  
- API REST  
- tema claro/escuro automatico  

Sinta-se a vontade para evoluir o projeto!




