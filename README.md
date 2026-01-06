# Mini CMS

A lightweight content management system built with Laravel 12 and modern web technologies. This project provides a simple yet powerful platform for managing articles and announcements with user authentication and admin controls.

## Features

- **User Authentication**: Secure registration, login, and password management using Laravel Fortify
- **Article Management**: Create, read, update, and delete articles
- **Announcement System**: Post and manage announcements with admin controls
- **Admin Dashboard**: Administrative interface for managing content
- **Responsive Design**: Mobile-friendly interface using Tailwind CSS
- **Modern Frontend**: Built with Vite, Tailwind CSS, and FontAwesome icons

## Tech Stack

### Backend
- **Laravel 12** - PHP Framework
- **Laravel Fortify** - Authentication scaffolding
- **MySQL/SQLite** - Database support

### Frontend
- **Vite** - Build tool and development server
- **Tailwind CSS 4** - Utility-first CSS framework
- **FontAwesome** - Icon library
- **Blade Templates** - Laravel's templating engine

### Development Tools
- **Pest** - PHP testing framework
- **Laravel Pint** - Code style fixer
- **Laravel Sail** - Docker development environment

## Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js and npm
- Database (MySQL or SQLite)

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/lynsromero/mini-cms.git
   cd mini-cms
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database**
   - Edit your `.env` file with your database credentials
   - For SQLite: `touch database/database.sqlite`

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Build frontend assets**
   ```bash
   npm run build
   ```

7. **Start the development server**
   ```bash
   php artisan serve
   ```

### Quick Setup (Automated)
Run the setup script which handles all installation steps:
```bash
composer run setup
```

## Usage

### Development Server
Start the complete development environment (server, queue, and Vite):
```bash
composer run dev
```

### Testing
Run the test suite:
```bash
composer run test
```

### Code Style
Fix code style issues:
```bash
./vendor/bin/pint
```

## Project Structure

```
mini-cms/
├── app/
│   ├── Http/Controllers/          # Application controllers
│   ├── Models/                    # Eloquent models
│   ├── Actions/Fortify/           # Authentication actions
│   └── Providers/                 # Service providers
├── resources/
│   ├── views/                     # Blade templates
│   │   ├── components/           # Reusable view components
│   │   ├── auth/                 # Authentication views
│   │   ├── articles/             # Article-related views
│   │   ├── announcements/        # Announcement views
│   │   └── admin/                # Admin interface views
│   ├── js/                       # JavaScript files
│   └── css/                      # CSS files
├── public/                       # Public assets
├── database/                     # Database files and migrations
└── routes/                       # Application routes
```

## Key Features

### Authentication System
- User registration and login
- Password reset functionality
- Email verification
- Profile management

### Content Management
- **Articles**: Full CRUD operations for article content
- **Announcements**: System-wide announcements with admin controls
- **User Roles**: Admin and regular user permissions

### Admin Features
- Administrative dashboard
- Content moderation
- User management
- System announcements

## API Endpoints

The application provides RESTful API endpoints for:
- Authentication (`/api/auth/*`)
- Articles (`/api/articles/*`)
- Announcements (`/api/announcements/*`)

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## Security

If you discover any security-related issues, please email security@example.com instead of using the issue tracker.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Support

For support and questions:
- Create an issue on GitHub
- Check the [Laravel Documentation](https://laravel.com/docs)
- Review the project documentation

## Credits

- Built with [Laravel](https://laravel.com/)
- Styled with [Tailwind CSS](https://tailwindcss.com/)
- Icons by [FontAwesome](https://fontawesome.com/)

---

**Mini CMS** - A simple, elegant content management solution.

## 🚀 Funzionalità principali

### ✅ Autenticazione & Sicurezza

-   Registrazione utenti
-   Login / Logout
-   Verifica email via Gmail SMTP
-   Middleware `auth` + `verified`
-   Protezione CSRF e validazione server‑side

### 📢 Annunci

-   Annunci pubblici visibili a tutti
-   Creazione annunci (solo utenti verificati)
-   Annunci personali dell’utente
-   Pubblicazione annunci (solo admin)

### 📝 Articoli (CRUD completo)

-   Creazione, modifica, eliminazione
-   Validazione form
-   Visualizzazione lista e dettaglio
-   Paginazione

### 🛡️ Area Admin

-   Moderazione annunci
-   Pubblicazione / rimozione
-   Accesso protetto da middleware `admin`

---

## 🛠️ Tecnologie utilizzate

-   **Laravel 12**
-   **Blade Templates**
-   **MySQL**
-   **Fortify** (autenticazione)
-   **Bootstrap / CSS custom**
-   **Gmail SMTP** per la verifica email

---

## 📂 Struttura del progetto

app/
├── Http/
│  
├── Controllers/
│  
│  
├── HomeController.php
│  
│  
├── ArticleController.php
│  
│  
└── AnnouncementController.php
│  
└── Middleware/
├── Models/ resources/
├── views/ routes/
├── web.php

---

## 🔧 Comandi Bash utilizzati per creare il progetto

````bash
# 1. Creazione del progetto Laravel
composer create-project laravel/laravel mini-cms-annunci

cd mini-cms-annunci

# 2. Configurazione ambiente
cp .env.example .env
php artisan key:generate

# 3. Creazione modello + migrazione per gli articoli
php artisan make:model Article -m

# 4. Creazione modello + migrazione per gli annunci
php artisan make:model Announcement -m

# 5. Creazione controller principali
php artisan make:controller HomeController
php artisan make:controller ArticleController
php artisan make:controller AnnouncementController

# 6. (Opzionale) Middleware admin
php artisan make:middleware AdminMiddleware

# 7. Esecuzione migrazioni
php artisan migrate

# 8. Avvio server di sviluppo
php artisan serve

---

⚙️ Installazion

```bash
git clone <repo-url>
cd mini-cms-annunci
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

````

✉️ Configurazione SMTP Gmail

Nel file .env:

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tuamail@gmail.com
MAIL_PASSWORD=PASSWORD_APP
MAIL_ENCRYPTION=tls
⚠️ Usa una Password per App generata da Google.

---

🧪 Credenziali Admin (se previste)

-   email: admin@example.com
-   password: password
    (Oppure crea un utente e imposta is_admin = 1 nel database.)

---

👩‍💻 Autrice
Debora — Full‑stack developer
Mini CMS creato per portfolio e dimostrazione competenze.

---

# ✅ 5. Mappa architetturale del progetto

📁 routes/
└── web.php - Home - Articoli (CRUD) - Annunci pubblici - Annunci autenticati - Area Admin - Verifica email

📁 app/Http/Controllers/
├── HomeController
├── ArticleController
└── AnnouncementController

📁 resources/views/
├── home.blade.php
├── articles/
├── announcements/
└── admin/

📁 app/Models/
├── Article.php
└── Announcement.php

---
