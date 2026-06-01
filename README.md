# ChatGPT Image Generator

A Laravel application that generates AI images from user prompts and stores generation history.

## Requirements

* PHP 8.3+
* Composer
* MySQL 8+
* Node.js 20+
* Git

---

## Clone the Repository

```bash
git clone https://github.com/your-username/chatgpt-image-generator.git
```

Move into the project directory:

```bash
cd chatgpt-image-generator
```

---

## Install PHP Dependencies

```bash
composer install
```

---

## Install Node Dependencies

```bash
npm install
```

---

## Create Environment File

Copy the example environment file:

```bash
cp .env.example .env
```

For Windows:

```bash
copy .env.example .env
```

---

## Configure Environment Variables

Open `.env` and update database settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=chatgpt_image_generator
DB_USERNAME=root
DB_PASSWORD=
```

Configure OpenAI settings:

```env
OPENAI_API_KEY=your_api_key_here
```

---

## Generate Application Key

```bash
php artisan key:generate
```

---

## Run Database Migrations

```bash
php artisan migrate
```

If seeders exist:

```bash
php artisan db:seed
```

Or:

```bash
php artisan migrate --seed
```

---

## Create Storage Link

```bash
php artisan storage:link
```

---

## Build Frontend Assets

Development:

```bash
npm run dev
```

Production:

```bash
npm run build
```

---

## Start the Application

```bash
php artisan serve
```

Application URL:

```text
http://127.0.0.1:8000
```

---

## Common Commands

Clear Cache:

```bash
php artisan optimize:clear
```

Run Migrations:

```bash
php artisan migrate
```

Rollback Last Migration:

```bash
php artisan migrate:rollback
```

Check Routes:

```bash
php artisan route:list
```

Run Tests:

```bash
php artisan test
```

---

## Pull Latest Changes

```bash
git pull origin main
```

If database changes were introduced:

```bash
php artisan migrate
```

If frontend assets changed:

```bash
npm install
npm run build
```

---

## Troubleshooting

### Vendor Directory Missing

```bash
composer install
```

### Node Modules Missing

```bash
npm install
```

### Application Key Missing

```bash
php artisan key:generate
```

### Permission Issues

```bash
chmod -R 775 storage bootstrap/cache
```

### Clear All Cache

```bash
php artisan optimize:clear
```

---

## Project Structure

```text
app/
routes/
resources/
database/
public/
storage/
```

---

## Author

Sharon Unnikrishnan
Laravel Developer
