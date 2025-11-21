# Portal Bootstrap (PHP + SQLite)
Simple news portal built with PHP (PDO + SQLite) and Bootstrap 5.

## Quick start
1. Put the `portal_bootstrap` folder on a PHP-enabled server (PHP 7.4+ recommended).
2. Visit `setup.php` once in your browser to create the SQLite database and an admin user.
   - Default admin credentials created by `setup.php`: **admin / admin123**
   - After setup, delete `setup.php` for security.
3. Open `index.php` to see the news portal. Login at `login.php` to access admin features.

## Features
- Login / logout (sessions)
- Add / edit / delete news (title, summary, content, image)
- Image upload (saved to `/uploads`)
- SQLite database (file `data/news.db`)
- Search / public listing
- Bootstrap 5 layout

## Notes
- For production, secure uploads and change default password.
- If your hosting prevents file creation, create `data/` and `data/news.db` manually and run SQL from `setup.php`.


# Theme
Projeto atualizado com tema moderno escuro (Dark Mode) e layout de cards modernos.
