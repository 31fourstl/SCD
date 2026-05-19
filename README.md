# SCD – South City Degenerates

A CodeIgniter 4 website with a **public frontend** showing upcoming drops and an embedded Shopify storefront, and a **password-protected admin panel** for managing those drops (CRUD + image upload).

---

## Requirements

- PHP 8.1+
- Composer
- MySQL / MariaDB

---

## Setup

### 1. Install dependencies

```bash
composer install
```

### 2. Environment configuration

Copy the example env file and fill in your values:

```bash
cp env .env
```

Edit `.env`:

```dotenv
CI_ENVIRONMENT = development

app.baseURL = 'http://yourdomain.com/'

# Database
database.default.hostname = 127.0.0.1
database.default.database = scd
database.default.username = your_db_user
database.default.password = your_db_password
database.default.DBDriver = MySQLi

# Admin credentials – CHANGE THESE!
ADMIN_USERNAME = admin
ADMIN_PASSWORD = changeme
```

### 3. Create the database

Create a database named `scd` (or whatever you set in `.env`), then run the migrations:

```bash
php spark migrate
```

Optionally seed sample drops:

```bash
php spark db:seed DropsSeeder
```

### 4. Run (development)

```bash
php spark serve
```

or point your web server's document root to `public/`.

---

## Application Structure

```
app/
├── Controllers/
│   ├── Home.php                   # Public frontend
│   └── Admin/
│       ├── AdminBaseController.php
│       ├── AuthController.php     # Login / logout
│       └── DropsController.php    # Drops CRUD + image upload
├── Filters/
│   └── AdminAuth.php              # Session-based auth guard
├── Models/
│   └── DropsModel.php
├── Views/
│   ├── frontend/
│   │   ├── layout.php             # Public layout
│   │   └── home.php               # Upcoming drops page
│   └── admin/
│       ├── layout.php             # Admin sidebar layout
│       ├── login.php
│       └── drops/
│           ├── index.php          # List drops
│           └── form.php           # Create / edit form
public/
├── assets/css/style.css           # Dark-themed stylesheet
└── uploads/                       # Drop images (served publicly)
```

---

## Admin Panel

Access the admin panel at `/admin/login`.

Default credentials (set in `.env`):
- **Username:** `admin`
- **Password:** `changeme`

> ⚠️ Change `ADMIN_PASSWORD` before deploying to production.

### Admin features

| Feature | URL |
|---|---|
| List drops | `/admin/drops` |
| Create drop | `/admin/drops/create` |
| Edit drop | `/admin/drops/edit/{id}` |
| Delete drop | `POST /admin/drops/delete/{id}` |

### Shopify integration

Paste your **Shopify Buy Button** embed code into the *Shopify Embed Code* field when creating or editing a drop. Get the code from:

> Shopify Admin → Sales Channels → Buy Button → Create a button

The embed code is rendered directly on the public homepage inside the drop card.

---

## License

MIT
