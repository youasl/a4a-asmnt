# Crops API

This is a simple API to manage crops and it's related diseases.

## Requirements

* PHP **8.1+**
* Composer

## Endpoints

### Crops

* `POST /api/crops` – Create a new crop
* `GET /api/crops` – List all crops
* `GET /api/crops/{id}` – Get a specific crop
* `PATCH /api/crops/{id}` – Update a specific crop

### Crop Diseases

* `POST /api/crops/diseases` – Create a new crop disease
* `GET /api/crops/diseases` – List all crop diseases
* `GET /api/crops/diseases/{id}` – Get a specific crop disease
* `PATCH /api/crops/diseases/{id}` – Update a specific crop disease

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

This Crops API will be available at `http://127.0.0.1:8000/api/crops`.

## Project Structure and Relevant Files

* `routes/api.php` – API routes
* `app/Models/Crops.php` – Crops model
* `app/Models/CropsDiseases.php` – Crop Diseases model
* `app/Http/Controllers/CropsController.php` – Crops controller
* `app/Http/Controllers/CropsDiseasesController.php` – Crop Diseases controller
