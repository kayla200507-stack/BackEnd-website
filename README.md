# Internship Management System API

This is a Laravel-based API for a Student Internship Management System. It features JWT authentication, layered architecture (Controller-Service-Request), and a robust role-based user system.

## 🚀 Getting Started

### Base URL
All API requests are made to:
`http://localhost:8000/api`

### Authentication
The API uses JSON Web Tokens (JWT). Most endpoints require the `Authorization` header:
`Authorization: Bearer <your_token>`

---

## 🔐 Authentication Endpoints

| Method | Endpoint | Description |
| :--- | :--- | :--- |
| `POST` | `/auth/register/student` | Register as a student (Mahasiswa). |
| `POST` | `/auth/register/dosen` | Register as a lecturer (Dosen). |
| `POST` | `/auth/login` | Login and get JWT token. |
| `POST` | `/auth/logout` | Logout (requires token). |
| `POST` | `/auth/refresh` | Refresh expired token (requires token). |
| `GET` | `/auth/me` | Get authenticated user info (requires token). |

---

## 📂 Profiles (Admin/Self)

| Method | Endpoint | Description |
| :--- | :--- | :--- |
| `GET` | `/mahasiswa` | List all student profiles (paginated). |
| `POST` | `/mahasiswa` | Create a student profile. |
| `GET` | `/mahasiswa/{id}` | Get specific student profile. |
| `PATCH` | `/mahasiswa/{id}` | Update student profile. |
| `GET` | `/dosen` | List all lecturer profiles. |
| `GET` | `/admin` | List all admin profiles. |

---

## 💼 Internship Vacancies

| Method | Endpoint | Description |
| :--- | :--- | :--- |
| `GET` | `/lowongan` | List all vacancies (Support search & filter). |
| `POST` | `/lowongan` | Create a new vacancy. |
| `GET` | `/lowongan/{id}` | Get vacancy details. |
| `PATCH` | `/lowongan/{id}` | Update vacancy. |
| `DELETE` | `/lowongan/{id}` | Delete vacancy. |

---

## 📝 Application Process

| Method | Endpoint | Description |
| :--- | :--- | :--- |
| `GET` | `/pendaftaran` | List all applications. |
| `POST` | `/pendaftaran` | Apply for a vacancy. |
| `GET` | `/pendaftaran/{id}` | Get application details. |
| `PATCH` | `/pendaftaran/{id}/status` | Update application status (Admin/Dosen). |

---

## 🏗️ Active Internships (Magang)

| Method | Endpoint | Description |
| :--- | :--- | :--- |
| `GET` | `/magang` | List all active placements. |
| `GET` | `/magang/{id}` | Get placement details. |
| `GET` | `/magang/{idMagang}/logbook` | List logbooks for a placement. |
| `POST` | `/logbook` | Submit a daily logbook entry. |
| `PATCH` | `/logbook/{id}/validate` | Validate logbook entry (Dosen). |
| `GET` | `/magang/{idMagang}/laporan` | List reports for a placement. |
| `POST` | `/laporan` | Upload final internship report. |
| `PATCH` | `/laporan/{id}/review` | Review internship report (Dosen). |

---

## 📢 Communication

| Method | Endpoint | Description |
| :--- | :--- | :--- |
| `GET` | `/pengumuman` | List system announcements. |
| `POST` | `/pengumuman` | Create an announcement (Admin). |
| `GET` | `/notifikasi` | List user notifications. |
| `PATCH` | `/notifikasi/{id}/read` | Mark notification as read. |

---

## 🔍 Features

### Pagination
Append `?per_page=15&page=2` to any list endpoint.

### Searching & Filtering
Use query parameters to search or filter results:
- **Search**: `?search=keyword`
- **Filter**: `?role=admin` or `?id_kategori=1`
- **Sorting**: `?sort_by=nama&sort_dir=asc`

### Response Format
All responses follow this standard structure:
```json
{
    "status": "success",
    "message": "...",
    "data": { ... }
}
```

---

## 🛠️ Setup Admin
Run the seeder to create the initial admin account:
`php artisan db:seed --class=AdminSeeder`
- **Email**: `admin@magang.com`
- **Password**: `admin123`
