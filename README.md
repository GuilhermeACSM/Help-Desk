# Help Desk Web Application 🖥️💬

This is a web-based **Help Desk** application designed to manage customer service requests, track issues, and provide support through a user-friendly interface. The application is built using PHP, with two implementations for interacting with the database: one using **PDO** (PHP Data Objects) and another using traditional **MySQL** queries (without PDO).

### 🚀 Features

- **User Registration and Authentication**: Users can sign up, log in, and manage their accounts.
 <img src="https://github.com/user-attachments/assets/c7baac43-5555-4bc0-abaa-8566a92ad808" width="650" />
- **Ticket Management**: Users can create, view, and manage support tickets.
- **Admin Panel**: Admins can view all tickets, assign them to support agents, and update ticket statuses.
 <img src="https://github.com/user-attachments/assets/7be980ad-41ac-43ec-9cb6-df0ff133cd2b" width="650" />
- **Responsive Design**: The application is mobile-friendly and works on various devices.
- **Search Functionality**: Users can search for tickets by status, date, or priority.
  
### 🛠️ Technologies Used

- **PHP**: Server-side scripting to handle the application logic.
- **MySQL**: Database management for storing user information and ticket data.
- **HTML/CSS**: Front-end design and structure, ensuring a clean and user-friendly interface.
- **JavaScript**: For form validation and enhanced user experience.
- **Bootstrap**: For responsive and modern design.

### 🏗️ Database Interaction

The application includes two versions for interacting with the MySQL database:

#### 1. **PDO (PHP Data Objects)**

In this version, **PDO** is used for database interaction, ensuring a more secure and efficient approach to handling database queries.

- **Advantages of PDO**:
  - Prepared statements for improved security and protection against SQL injection attacks.
  - Support for multiple databases, making the application more portable.
  
```php
// Example of PDO connection
try {
    $pdo = new PDO("mysql:host=localhost;dbname=helpdesk", "username", "password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
```

#### 2. **Without PDO (Traditional MySQL)**

In this version, the application uses **mysqli** functions to interact directly with the MySQL database. This approach is simpler than PDO but requires more care to prevent SQL injection, as it doesn't support prepared statements by default.

##### Basic Database Interaction:
To connect to the MySQL database, we use the `mysqli_connect()` function.

```php
// Example of MySQL connection without PDO
$connection = mysqli_connect("localhost", "username", "password", "helpdesk");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
```
