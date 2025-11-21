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
##  Trechos Principais do Codigo

A seguir estão alguns trechos essenciais que demonstram o funcionamento do portal de noticias.  
Eles mostram como a aplicação realiza **persistencia**, **autenticaçao**, **exibiçao de conteudo** e **interaçoes com o banco SQLite**.

---

### 🔹 1. Conexão com o Banco de Dados (SQLite) – *db.php*

```php
function getPDO() {
    $dbfile = __DIR__ . '/data/news.db';
    $pdo = new PDO('sqlite:' . $dbfile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

session_start();

---

### 🔹 2. Login com senha criptografada – *login.php*

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :u");
$stmt->execute([':u' => $username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user;
    header("Location: admin.php");
}

---

### 🔹 3. Inserção de uma Notícia – *add.php*

$insert = $pdo->prepare(
    "INSERT INTO news (title, summary, content, image) 
     VALUES (:title, :summary, :content, :image)"
);

$insert->execute([
    ':title'   => $title,
    ':summary' => $summary,
    ':content' => $content,
    ':image'   => $imageName
]);

---

### 🔹 4. Exibir notícias na página inicial – *index.php*

if ($search != "") {
    $stmt = $pdo->prepare("SELECT * FROM news 
                           WHERE title LIKE :s OR summary LIKE :s
                           ORDER BY created_at DESC");
    $stmt->execute([':s' => "%$search%"]);
} else {
    $stmt = $pdo->query("SELECT * FROM news ORDER BY created_at DESC");
}

$news = $stmt->fetchAll(PDO::FETCH_ASSOC);

---

### 🔹 5. Estrutura das Tabelas (SQLite) – *setup.php*

if ($search != "") {
    $stmt = $pdo->prepare("SELECT * FROM news 
                           WHERE title LIKE :s OR summary LIKE :s
                           ORDER BY created_at DESC");
    $stmt->execute([':s' => "%$search%"]);
} else {
    $stmt = $pdo->query("SELECT * FROM news ORDER BY created_at DESC");
}

$news = $stmt->fetchAll(PDO::FETCH_ASSOC);
´´´

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




