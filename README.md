#  Blog Post RESTful API (Core PHP + MySQL)

This is a simple RESTful API built in **Core PHP** to perform CRUD operations (Create, Read, Update, Delete) on blog posts stored in a MySQL database.

---

##  How to Run the API

### Requirements
- PHP (7.x or 8.x)
- MySQL
- Apache Server (use XAMPP/Laragon)
- Postman (for API testing)

---

###  Setup Instructions

1. **Start Apache & MySQL** using XAMPP or Laragon.

2. **Import the SQL database**:
   - Go to `http://localhost/phpmyadmin`
   - Click `Import`, choose the provided `blog_api.sql`, and click `Go`.

3. **Place project folder**:
   - Copy this folder into `C:\xampp\htdocs\` (or your web root directory).
   - Folder name example: `blog_api`

4. **Visit in browser**:
   - `http://localhost/blog_api`

---

##  API Endpoints

###  `GET /posts` – Get all blog posts
**URL**: `http://localhost/blog_api/posts`  
**Method**: `GET`  
**Response:**
```json
[
  {
    "id": 1,
    "title": "Sample Post",
    "content": "This is a blog post.",
    "created_at": "2025-08-01 14:25:00"
  }
]
```

###  `GET /posts/{id}` – Get a single post
**URL**: `http://localhost/blog_api/posts/1`  
**Method**: `GET`  
**Response:**
```json
{
  "id": 1,
  "title": "Sample Post",
  "content": "This is a blog post.",
  "created_at": "2025-08-01 14:25:00"
}
```

###  `POST /posts` – Create a new post
**URL**: `http://localhost/blog_api/posts`  
**Method**: `POST`  
**Headers**:
```
Content-Type: application/json
```
**Body:**
```json
{
  "title": "New Post",
  "content": "Created via API!"
}
```
**Response:**
```json
{
  "message": "Post created"
}
```

###  `PUT /posts/{id}` – Update a post
**URL**: `http://localhost/blog_api/posts/1`  
**Method**: `PUT`  
**Headers**:
```
Content-Type: application/json
```
**Body:**
```json
{
  "title": "Updated Title",
  "content": "Updated content via PUT."
}
```
**Response:**
```json
{
  "message": "Post updated"
}
```

###  `DELETE /posts/{id}` – Delete a post
**URL**: `http://localhost/blog_api/posts/1`  
**Method**: `DELETE`  
**Response:**
```json
{
  "message": "Post deleted"
}
```

---

##  Security Measures

- All input is sanitized to prevent XSS.
- Uses prepared statements to prevent SQL injection.
- Returns appropriate HTTP status codes (`200`, `201`, `404`, `500`).

## Project Demo

<img width="1171" height="190" alt="Capture 1" src="https://github.com/user-attachments/assets/665fc807-cb31-435f-8995-0942f6252511" />
<img width="1578" height="920" alt="post" src="https://github.com/user-attachments/assets/019f98e5-830f-46cb-adce-a9772df4fd03" />
<img width="1107" height="828" alt="Capture 3" src="https://github.com/user-attachments/assets/a7fb4d41-aaca-45a2-8fd1-0259631f46c0" />
<img width="1068" height="722" alt="Capture 4" src="https://github.com/user-attachments/assets/922b65d7-c82d-4c19-bc39-8b7bc32a9a54" />
<img width="1044" height="744" alt="Capture 5" src="https://github.com/user-attachments/assets/06de7303-f983-4b6a-9aa5-1670fe0008cb" />
<img width="1070" height="724" alt="Capture 6" src="https://github.com/user-attachments/assets/361404c0-54d5-4e3c-866c-8a4b5995520c" />
<img width="1076" height="723" alt="Capture 8" src="https://github.com/user-attachments/assets/832a7851-dd8d-43c9-bfcd-2b7bb1524d1f" />
