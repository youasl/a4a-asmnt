# Crops API

This is a simple API to manage crops and crop diseases.

## Endpoints

### Crops

* `POST /crops` – Create a new crop
* `GET /crops` – List all crops
* `GET /crops/{id}` – Get a specific crop
* `PATCH /crops/{id}` – Update a specific crop

### Crop Diseases

* `POST /crops/diseases` – Create a new crop disease
* `GET /crops/diseases` – List all crop diseases
* `GET /crops/diseases/{id}` – Get a specific crop disease
* `PATCH /crops/diseases/{id}` – Update a specific crop disease

## Installation

1. **Clone the repository**

```bash
git clone https://github.com/youasl/a4a-asmnt.git
cd a4a-asmnt
```

2. **Install dependencies**

```bash
composer install
```

3. **Set up environment**

```bash
php artisan key:generate
```

4. **Start the server**

```bash
php artisan serve
```

Your API will be available at `http://127.0.0.1:8000/api`.

## Project Structure and Relevant Files

* `routes/api.php` – API routes
* `app/Models/Crops.php` – Crops model
* `app/Models/CropsDiseases.php` – Crop Diseases model
* `app/Http/Controllers/CropsController.php` – Crops controller
* `app/Http/Controllers/CropsDiseasesController.php` – Crop Diseases controller
