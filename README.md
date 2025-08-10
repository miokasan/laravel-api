# Laravel API - User Management

## Deskripsi
API endpoint untuk manajemen user dengan Laravel 11 dan database MySQL.


- Host: `127.0.0.1`
- Port: `3306`

## Field User
- `nama` (string, required)
- `email` (string, required, unique)
- `password` (string, required, min:6)
- `alamat` (text, required)

## Setup Project

1. **Install Dependencies**
```bash
composer install
```

2. **Konfigurasi Environment**
File `.env` sudah dikonfigurasi dengan database MySQL.

3. **Jalankan Migration**
```bash
php artisan migrate
```

4. **Jalankan Server**
```bash
php artisan serve --host=0.0.0.0 --port=8000
```

## API Endpoints

### 1. Get All Users
```bash
GET /api/users
```

### 2. Get User by ID
```bash
GET /api/users/{id}
```

### 3. Create User
```bash
POST /api/users
Content-Type: application/json

{
    "nama": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "alamat": "Jl. Contoh No. 123"
}
```

### 4. Update User
```bash
PUT /api/users/{id}
Content-Type: application/json

{
    "nama": "John Doe Updated",
    "email": "john.updated@example.com",
    "password": "newpassword123",
    "alamat": "Jl. Contoh No. 456 Updated"
}
```

### 5. Delete User
```bash
DELETE /api/users/{id}
```

## Testing

### Test Create User
```bash
curl -X POST http://localhost:8000/api/users \
  -H "Content-Type: application/json" \
  -d '{
    "nama": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "alamat": "Jl. Contoh No. 123"
  }'
```

### Test Get All Users
```bash
curl -X GET http://localhost:8000/api/users
```

### Test Get User by ID
```bash
curl -X GET http://localhost:8000/api/users/1
```

### Test Update User
```bash
curl -X PUT http://localhost:8000/api/users/1 \
  -H "Content-Type: application/json" \
  -d '{
    "nama": "John Doe Updated",
    "email": "john.updated@example.com",
    "password": "newpassword123",
    "alamat": "Jl. Contoh No. 456 Updated"
  }'
```

### Test Delete User
```bash
curl -X DELETE http://localhost:8000/api/users/1
```

## Response Format

### Success Response
```json
{
    "success": true,
    "data": {
        "id": 1,
        "nama": "John Doe",
        "email": "john@example.com",
        "alamat": "Jl. Contoh No. 123",
        "created_at": "2025-08-03T22:23:19.000000Z",
        "updated_at": "2025-08-03T22:23:19.000000Z"
    }
}
```

### Error Response
```json
{
    "success": false,
    "message": "Validation error",
    "errors": {
        "email": ["The email field is required."]
    }
}
```

## Status
✅ **WORKING** - API berhasil dibuat dan berjalan tanpa error 419. Semua endpoint berfungsi dengan baik.

## File Structure
```
laravel-api/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── Api/
│   │   │       └── UserController.php
│   │   └── Middleware/
│   │       └── ApiMiddleware.php
│   └── Models/
│       └── User.php
├── database/
│   └── migrations/
│       └── 0001_01_01_000000_create_users_table.php
├── routes/
│   ├── api.php
│   └── web.php
├── bootstrap/
│   └── app.php
├── API_DOCUMENTATION.md
└── README.md
```
