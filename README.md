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

