# ✈️ Airline Management System (AMS)

A full-stack **Airline Management System** built using **PHP, MySQL, HTML, CSS, and JavaScript**, designed to manage airline ticket booking, updating, deletion, seat selection, and admin-level reporting with email notifications.

---

## 📌 Features

### 👤 Customer Features
- Book airline tickets with:
  - Name
  - Age
  - Email validation
  - Seat selection
  - Boarding airport
  - Destination airport
- View booked ticket details
- Update ticket information
- Delete an existing ticket
- Responsive UI (desktop & mobile)
- Animated seat and airport selection

### 🔐 Admin Features
- Time-based password-protected admin access
- View all booked tickets in a structured table
- Automatic email reporting using **PHPMailer (SMTP)**
- Printable admin ticket list

---

## 🧱 Tech Stack

| Layer | Technology |
|------|-----------|
| Frontend | HTML5, CSS3, JavaScript |
| Backend | PHP |
| Database | MySQL |
| Email | PHPMailer (SMTP – Gmail) |
| UI | Responsive CSS + JS animations |

---

## 📁 Project Structure

- **Frontend**
  - `index.html` – Main ticket booking interface
  - `style.css` – Global styling
  - `print.css` – Print-friendly ticket styles
  - `node.js` – Seat and airport selection logic

- **Backend (PHP)**
  - `index.php` – Handles ticket booking
  - `show.php` – Displays booked ticket details
  - `update.php` – Loads ticket data for update
  - `saveUpdate.php` – Saves updated ticket data
  - `delete.php` – Deletes a ticket
  - `getData.php` – Fetches customer data from database

- **Admin**
  - `adminCheck.php` – Admin password validation
  - `adminIn.php` – Admin dashboard & email reporting
---

## 🗄️ Database Setup

### Airline
```sql
CREATE TABLE customer (
  seat VARCHAR(10) PRIMARY KEY,
  name VARCHAR(100),
  age INT,
  email VARCHAR(100),
  srcfrom VARCHAR(100),
  srcto VARCHAR(100)
);
