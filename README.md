# TechZone – E-Commerce Website (PHP + MySQL)

### **Students Name:** Dhruv Kansara(5146917), Nihari Makvana (5144648), Sneha Patel(249413340)
### **Course:** Web Programming (COMP…)  
### **Institution:** Algoma University  
### **Instructor:**  
### **Project:** Term Project – Full E-Commerce System  
### **Semester:** Fall 2025

---

## 📌**Project Description**
TechZone is a PHP-based e-commerce platform that allows users to browse products, add items to cart, and complete a checkout process.  
It also includes a secure **Admin Dashboard** where administrators can manage products, view customer orders, and manage user accounts.

This project demonstrates:
- PHP CRUD operations  
- MySQL relational database  
- PDO secure queries  
- Session-based authentication  
- Responsive UI (Bootstrap)

---

## ⭐**Features**

### 🛍 **User-Side**
- Browse all products  
- Single product view  
- Add to cart  
- View and update cart  
- Checkout (place order)  
- Automatic order + order item insertion  
- Session-based cart system  

### 🔐 **Admin Panel**
- Admin login (secure, password hashed)  
- Dashboard with quick actions  
- Manage Products  
  - Add  
  - Edit  
  - Delete  
- View Customer Orders  
- View Users  
- Logout (session destroy)

---

## 🗂 **Project Structure**
```
termproject/
│
│── admin/
│     ├── admin_footer.php
│     ├── admin_header.php
│     ├── dashboard.php
│     ├── login.php
│     ├── logout.php
│     ├── orders.php
│     ├── product_add.php
│     ├── product_delete.php
│     ├── product_edit.php
│     ├── products.php
│     └── users.php
│
│── css/
│
│── db/
│     ├── conn.php
│     └── techzone.sql      ← Database export file
│
│── includes/
│
│── js/
│
│── node_modules/
│
│── pics/
│
│── scss/
│
├── .gitignore
├── README.md
│
├── add_to_cart.php
├── cart.php
├── checkout.php
├── index.php
├── login.php
├── logout.php
├── make_admin.php
├── migrate_products.php
├── package-lock.json
├── package.json
├── place_order.php
├── product-data.php
├── products.php
├── remove_cart.php
├── remove_item.php
├── signup.php
├── signup_success.php
├── singleproduct.php
└── update_cart.php


# ⚙ **Setup Instructions (Important)**  
Follow these steps to run the project locally.

---

## **1️⃣ Install Requirements**
You must have installed:

- **XAMPP** (recommended)  
- PHP 8+  
- MySQL  
- Apache  

---

## **2️⃣ Move Project to htdocs**
Move your project folder into:

```
C:\xampp\htdocs\termproject
```

so you can run:

```
http://localhost/termproject
```

---

## **3️⃣ Create the MySQL Database**
Open **phpMyAdmin**  
→ Go to **http://localhost/phpmyadmin**  
→ Click *New*  
→ Enter database name: **techzone**  
→ Click **Create**

---

## **4️⃣ Import the SQL File**
Inside phpMyAdmin:

1. Click your database: **techzone**
2. Go to **Import** tab
3. Click **Choose File**
4. Select:
```
termproject/db/techzone.sql
```
5. Click **Go**

Your database (admins, customers, orders, products…) will be created automatically.

---

## **5️⃣ Configure Database Connection**
Open:

```
db/conn.php
```

Verify:

```php
$host = 'localhost';
$dbname = 'techzone';
$username = 'root';
$password = '';
```

---

## **6️⃣ Start Apache + MySQL**
Open **XAMPP Control Panel**:

✔ Start Apache  
✔ Start MySQL  

Then open website:

```
http://localhost/termproject
```

---

# 🔐 **Admin Login Credentials**
(Default admin created in SQL file)

```
Email: admin@techzone.com
Password: Admin@123
```

If for some reason password doesn't work:
→ Recreate admin with hashed password  
(Your SQL file includes hashed password already.)

# 🔗 **GitHub Link**
Paste your repository link here once uploaded:

```
https://github.com/dhkansara/TermProject-.git
```

---

# ✔ Submitted Files Should Include:
- All PHP source files  
- CSS, JS, images  
- SQL file (`techzone.sql`)  
- README.md  
- Video presentation link  

---
