# 🧶 The Crochet Edit — Handcrafted Boutique Web Application

An end-to-end e-commerce web platform for artisan handcrafted crochet collections, featuring a modern user storefront, cart & order management, customer feedback system, and a comprehensive administrative portal.

---

## 🌟 Key Features

### 🛍️ User Storefront (`/user`)
- **Interactive Product Catalog**: Filter products by categories (toys, blankets, caps, purses, etc.).
- **Product Details & Showcase**: High-resolution imagery, pricing, artisan badges, and stock availability.
- **Cart Management**: Add products to cart, update quantity, and remove items with real-time stock sync.
- **Order & Billing**: Integrated checkout process with invoice generation.
- **Customer Feedback**: Share reviews and artisanal requests.
- **User Authentication**: Secure user registration, sign-in, and password recovery.

### 🛡️ Admin Management Portal (`/admin`)
- **Dashboard Analytics**: Real-time stats for total products, categories, active orders, and customer feedback.
- **Product Management**: Add, update, and remove crochet products with image upload support.
- **Category Control**: Organize products into curated seasonal collections.
- **Order Tracking & Shipping**: Monitor customer purchase orders and manage delivery states.
- **Feedback Moderation**: Review user testimonials and feedback entries.

---

## 💻 Tech Stack

- **Backend**: PHP 8.x / PHP 7.x
- **Database**: MySQL / MariaDB (Compatible with UwAmp, XAMPP, WAMP, and live cPanel)
- **Frontend**: HTML5, CSS3, JavaScript, FontAwesome 6 icons
- **Server Support**: Apache HTTP Server

---

## 📁 Project Structure

```
crochetshop/
├── admin/                  # Administrative dashboard & actions
│   ├── action/             # Backend processing scripts (CRUD)
│   ├── config/             # Database connection & polyfill
│   ├── css/                # Admin styling
│   ├── include/            # View components & templates
│   └── index.php           # Admin entry point
├── database/               # Database schemas and seed data
│   └── crochetshop.sql     # Complete database export
├── uploadfile/             # Uploaded product and asset imagery
├── user/                   # User customer storefront
│   ├── action/             # Cart, checkout, and auth actions
│   ├── config/             # Database connection & polyfill
│   ├── css/                # Modern boutique design styles
│   ├── include/            # Customer pages (gallery, cart, feedback)
│   └── index.php           # User store entry point
├── index.php               # Root entry redirecting to storefront
├── README.md               # Project documentation
└── .gitignore              # Git ignore rules
```

---

## 🚀 Local Installation & Setup Guide

### Prerequisites
- Install **UwAmp**, **XAMPP**, or **WampServer** (with Apache & MySQL/MariaDB).

### Step 1: Clone or Download the Repository
```bash
git clone https://github.com/devangipatoliya2504/crochetshop.git
```
Place the folder inside your web server root directory:
- For **UwAmp**: `E:\UwAmp\www\crochetshop`
- For **XAMPP**: `C:\xampp\htdocs\crochetshop`

### Step 2: Import the Database
1. Open your browser and go to **phpMyAdmin** (`http://localhost/phpmyadmin/`).
2. Create a new database named **`crochetshop`**.
3. Click on the **Import** tab.
4. Choose the file located at `database/crochetshop.sql` from this project.
5. Click **Import** (or **Go**).

### Step 3: Run the Application
Start your Apache and MySQL servers, then visit in your browser:
- **Storefront**: `http://localhost/crochetshop/`
- **Admin Panel**: `http://localhost/crochetshop/admin/index.php`

---

## 🔑 Default Credentials

- **Admin Login**:
  - Username: `devu` | Password: `2504`
  - Username: `vishu` | Password: `0509`

---

## 🌐 Live Hosting Options for Portfolios

To display this project live in your portfolio:
1. **Free PHP/MySQL Hosting**:
   - [InfinityFree](https://www.infinityfree.com/) (Free unlimited PHP & MySQL hosting)
   - [Alwaysdata](https://www.alwaysdata.com/)
2. Upload the project files into the `htdocs` / `public_html` directory.
3. Import `database/crochetshop.sql` via the hosting provider's phpMyAdmin.
4. Update `user/config/connection.php` and `admin/config/connection.php` with your live hosting database credentials.

---

## 👩‍💻 Developed By

- **Devangi Patoliya** & **Vishva Tilala**
- Crafted with pride & passion for artisanal creations ✨
