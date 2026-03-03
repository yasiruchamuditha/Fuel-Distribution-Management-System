# ⛽ Fuel Distribution Management System

A web-based solution for managing fuel distribution and reducing long queues at fuel stations — built in response to the fuel shortages experienced in Sri Lanka during the economic crisis.

The system allows customers to book time-slot appointments at their nearest fuel station using QR codes, eliminating the need to wait in physical queues. Fuel stations, suppliers, and administrators each have dedicated dashboards to manage operations end-to-end.

---

## 📋 Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Project Structure](#project-structure)
- [User Roles](#user-roles)
- [Screenshots](#screenshots)
- [Author](#author)

---

## ✨ Features

### 👤 Regular Users
- User registration and login with role-based access
- Vehicle and instrument (generator/three-wheeler etc.) registration
- Token creation for fuel appointments
- QR code generation for booked tokens
- QR code verification at fuel stations
- Real-time fuel status search by station
- Submit reviews and feedback

### ⛽ Fuel Station Operators
- Fuel station registration and profile management
- Fuel price management
- Fuel availability status updates
- Token approval / QR code scanning & verification

### 🏢 Administrators
- Full user account management (create, update, delete)
- Fuel station management
- Supplier management
- Vehicle and instrument registration oversight
- Token management (vehicle & non-vehicle)
- Fuel price and status monitoring across all stations

### 🚚 Suppliers
- Supplier registration
- Fuel price management

### 🔑 General / Auth
- Secure login with role-based redirect (Admin / Fuel Station / User)
- Email-based account verification via OTP
- Forgotten password recovery via email (PHPMailer)
- Password update flow

---

## 🛠 Tech Stack

| Layer | Technology |
|---|---|
| **Backend** | PHP (procedural) |
| **Frontend** | HTML5, CSS3, JavaScript, Bootstrap 4 |
| **Database** | MySQL 8.0+ |
| **Email** | PHPMailer |
| **UI Libraries** | jQuery, Font Awesome, Owl Carousel, Tempus Dominus (date/time picker) |
| **Other** | QR code generation (`qrp.php`) |

---

## ✅ Prerequisites

- PHP 8.0 or higher
- MySQL 8.0 or higher
- A web server such as **Apache** (XAMPP / WAMP / LAMP recommended)
- Composer (optional, PHPMailer is bundled)

---

## 🚀 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yasiruchamuditha/Fuel-Distribution-Management-System.git
   ```

2. **Move the project to your web server's root directory**
   - For XAMPP: `C:/xampp/htdocs/Fuel-Distribution-Management-System`
   - For WAMP: `C:/wamp64/www/Fuel-Distribution-Management-System`
   - For Linux (LAMP): `/var/www/html/Fuel-Distribution-Management-System`

3. **Configure the database connection**

   Open `connection.php` and update the credentials:
   ```php
   $con = mysqli_connect("localhost", "YOUR_DB_USER", "YOUR_DB_PASSWORD", "fuelup");
   ```

4. **Start your web server and MySQL service**, then open your browser at:
   ```
   http://localhost/Fuel-Distribution-Management-System/
   ```

---

## 🗄 Database Setup

1. Open **phpMyAdmin** (or any MySQL client).
2. Create a new database named `fuelup`.
3. Import the provided SQL dump:
   ```
   fuelup.sql
   ```
   This creates all 16 required tables and seeds initial data.

### Database Tables

| Table | Description |
|---|---|
| `user_registration` | All user accounts (Admin, Fuel Station, User) |
| `vehicle_registration` | Registered vehicles per user |
| `instrument_registration` | Registered non-vehicle instruments per user |
| `fuel_station_registration` | Fuel station details |
| `fuel_status` | Current fuel availability at each station |
| `fuel_price` | Fuel price records per station |
| `supplier_registration` | Supplier details |
| `token_vehicle` | Vehicle fuel appointment tokens |
| `token_approved_vehicle` | Approved vehicle tokens |
| `token_instrument` | Instrument fuel appointment tokens |
| `token_approved_instrument` | Approved instrument tokens |
| `qr_code_verification` | QR code records for verification |
| `qr_released` | Completed/used QR codes |
| `feedback` | User feedback submissions |
| `review_table` | User reviews and ratings |
| `passwordupdates` | Password reset OTP records |

---

## 📁 Project Structure

```
Fuel-Distribution-Management-System/
│
├── index.php                        # Landing / home page
├── connection.php                   # Database connection
├── fuelup.sql                       # Database schema and seed data
│
├── # ── Authentication & Account ──
├── M_User_Login.php                 # Login (all roles)
├── M_User_SignUp.php                # User registration
├── M_Acc_Verification.php          # Account email verification
├── M_Forgotten_Password.php        # Password recovery (request)
├── M_Verify_Code.php               # OTP verification
├── M_Update_Password.php           # Password update
├── M_Update_Account_Password.php   # Account password update
│
├── # ── User (U_) Pages ──
├── U_About.php                      # About page
├── U_Contact.php                    # Contact page
├── U_My_Account.php                 # User account management
├── U_Review.php                     # User reviews
├── U_Service.php                    # Services overview
│
├── # ── Services (S_) ──
├── S_Vehicle_Registration.php       # Register a vehicle
├── S_Instrument_Registration.php    # Register an instrument
├── S_Token_Creation_Vehicle.php     # Create vehicle fuel token
├── S_Token_Creation_Instrument.php  # Create instrument fuel token
├── S_Fuel_Status_Search.php        # Search fuel availability
├── S_Fuel_Price.php                 # View fuel prices
├── S_Other_Products.php             # Other products listing
├── S_Other_Services.php             # Other services listing
│
├── # ── Fuel Station (F_) ──
├── F_Fuel_Station.php               # Fuel station dashboard
├── F_Station_Registration.php       # Station registration
├── F_Fuel_Status.php                # Update fuel status
├── F_Qr_Verification.php            # Verify customer QR codes
├── F_Feedback.php                   # View customer feedback
├── FuelStation_Login.php            # Fuel station login redirect
│
├── # ── Admin (A_) ──
├── A_Admin.php                      # Admin dashboard
├── A_Registration.php               # Admin registration
├── A_User_Management.php            # Manage users
├── A_User_Registration.php          # Register new user
├── A_Fuel_Station_Management.php    # Manage fuel stations
├── A_Fuel_Station_Registration.php  # Register fuel station
├── A_Fuel_Price_Management.php      # Manage fuel prices
├── A_Fuel_Price_Update.php          # Update fuel price
├── A_Fuel_Status_Management.php     # Manage fuel status
├── A_Supplier_Management.php        # Manage suppliers
├── A_Supplier_Registration.php      # Register supplier
├── A_Vehicle_Management.php         # Manage vehicles
├── A_Vehicle_Registration.php       # Register vehicle (admin)
├── A_Vehicle_Token_Management.php   # Manage vehicle tokens
├── A_Non_Vehicle_Management.php     # Manage non-vehicle instruments
├── A_Non_Vehicle_Registration.php   # Register instrument (admin)
├── A_Non_Vehicle_Token_Management.php # Manage instrument tokens
│
├── # ── QR Code ──
├── M_QR_Generator.php               # Generate QR code for token
├── M_Verify_Qr_Code.php             # Verify QR code
├── qrp.php                          # QR code library/helper
├── search.php                       # Search utility
├── submit_rating.php                # Submit star rating
│
├── # ── Shared Partials ──
├── M_NavigationBar.php              # Main navigation bar
├── M_NavigationBar_Index.php        # Index page navigation
├── M_NavigationBarForms.php         # Forms navigation bar
├── M_Footer.php                     # Footer
├── M_Back_To_Top.php                # Back-to-top button
├── A_Navigation_Bar.php             # Admin navigation bar
├── A_Footer.php / A_MFooter.php     # Admin footer variants
├── F_Navigation_Bar.php             # Fuel station navigation bar
│
├── css/                             # Compiled CSS stylesheets
├── scss/                            # SCSS source files
├── js/                              # JavaScript files
├── lib/                             # Third-party JS libraries
├── img/                             # Images and assets
└── PHPMailer/                       # PHPMailer library for email
```

---

## 👥 User Roles

| Role | Default Access | Description |
|---|---|---|
| `User` | `index.php` | End customer; can register vehicles, create tokens, generate QR codes |
| `Fuel_Station` | `F_Fuel_Station.php` | Fuel station operator; manages fuel status, prices, and verifies QR codes |
| `Admin` | `A_Admin.php` | System administrator; full management of all entities |

---

## 👤 Author

**Yasiru Chamuditha**
- 🌐 [linktr.ee/yasiruchamuditha](https://linktr.ee/yasiruchamuditha)
- 📧 fuelupgroup@gmail.com

---

## 📄 License

This project is open source. Feel free to use, modify, and distribute it with appropriate credit to the original author.
 
  
