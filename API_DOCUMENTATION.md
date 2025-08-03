# API Documentation - User Management

## Base URL
```
http://localhost:8000/api
```

## Status: ✅ WORKING
API sudah berhasil dibuat dan berjalan tanpa error 419. Semua endpoint berfungsi dengan baik.

## Endpoints

### 1. Get All Users
**GET** `/users`

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "nama": "John Doe",
            "email": "john@example.com",
            "alamat": "Jl. Contoh No. 123",
            "created_at": "2025-08-02T07:30:00.000000Z",
            "updated_at": "2025-08-02T07:30:00.000000Z"
        }
    ]
}
```

### 2. Get User by ID
**GET** `/users/{id}`

**Response Success:**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "nama": "John Doe",
        "email": "john@example.com",
        "alamat": "Jl. Contoh No. 123",
        "created_at": "2025-08-02T07:30:00.000000Z",
        "updated_at": "2025-08-02T07:30:00.000000Z"
    }
}
```

**Response Error (404):**
```json
{
    "success": false,
    "message": "User not found"
}
```

### 3. Create User
**POST** `/users`

**Request Body:**
```json
{
    "nama": "Jane Doe",
    "email": "jane@example.com",
    "password": "password123",
    "alamat": "Jl. Baru No. 456"
}
```

**Response Success (201):**
```json
{
    "success": true,
    "message": "User created successfully",
    "data": {
        "id": 2,
        "nama": "Jane Doe",
        "email": "jane@example.com",
        "alamat": "Jl. Baru No. 456",
        "created_at": "2025-08-02T07:35:00.000000Z",
        "updated_at": "2025-08-02T07:35:00.000000Z"
    }
}
```

**Response Error (422 - Validation):**
```json
{
    "success": false,
    "message": "Validation error",
    "errors": {
        "email": ["The email field is required."],
        "password": ["The password must be at least 6 characters."]
    }
}
```

### 4. Update User
**PUT/PATCH** `/users/{id}`

**Request Body:**
```json
{
    "nama": "Jane Smith",
    "alamat": "Jl. Update No. 789"
}
```

**Response Success:**
```json
{
    "success": true,
    "message": "User updated successfully",
    "data": {
        "id": 2,
        "nama": "Jane Smith",
        "email": "jane@example.com",
        "alamat": "Jl. Update No. 789",
        "created_at": "2025-08-02T07:35:00.000000Z",
        "updated_at": "2025-08-02T07:40:00.000000Z"
    }
}
```

### 5. Delete User
**DELETE** `/users/{id}`

**Response Success:**
```json
{
    "success": true,
    "message": "User deleted successfully"
}
```

## Testing with cURL

### Create User
```bash
curl -X POST http://localhost:8000/api/users \
  -H "Content-Type: application/json" \
  -d '{
    "nama": "Test User",
    "email": "test@example.com",
    "password": "password123",
    "alamat": "Jl. Test No. 123"
  }'
```

### Get All Users
```bash
curl -X GET http://localhost:8000/api/users
```

### Get User by ID
```bash
curl -X GET http://localhost:8000/api/users/1
```

### Update User
```bash
curl -X PUT http://localhost:8000/api/users/1 \
  -H "Content-Type: application/json" \
  -d '{
    "nama": "Updated Name",
    "alamat": "Updated Address"
  }'
```

### Delete User
```bash
curl -X DELETE http://localhost:8000/api/users/1
```

## Validation Rules

- **nama**: required, string, max 255 characters
- **email**: required, valid email format, unique
- **password**: required, string, minimum 6 characters
- **alamat**: required, string

## Database Schema

Table: `users`
- `id` (bigint, primary key, auto increment)
- `nama` (varchar(255), not null)
- `email` (varchar(255), unique, not null)
- `email_verified_at` (timestamp, nullable)
- `password` (varchar(255), not null, hashed)
- `alamat` (text, not null)
- `remember_token` (varchar(100), nullable)
- `created_at` (timestamp, nullable)
- `updated_at` (timestamp, nullable) 