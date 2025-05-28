# PHP-Directory-Lister-API-and-fileViewer 📁

A lightweight PHP script that:

- Lists files and folders in a directory as JSON
- Serves files (currently pdf) for inline viewing in your app or website
- Restricts access to within its base directory

---

## 🚀 Features

- ✅ Directory browsing via HTTP GET
- ✅ Inline file serving
- ✅ Secure path validation
- ✅ Simple and extensible codebase

---

## 📂 How to Use

### 1. Place the Script

Save the script in a folder on your PHP-enabled server. The script uses its own directory (`__DIR__`) as the root for all operations.

### 2. Browse Directory

Send a GET request to the script with an optional `path` query:

- GET /index.php
- GET /index.php?path=subfolder

  
**Sample Response:**
```json
[
  {
    "name": "example.pdf",
    "isFile": true
  },
  {
    "name": "documents",
    "isFile": false
  }
]


