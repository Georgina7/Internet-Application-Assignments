# Internet-Application-Assignments
Assignments Repository

Proceed where you left from lab 1….
It is time to implement your logic for the interfaces and database you designed.

You will create a class User , which implement the Account interface provided below.

Interface Account {
public function register ($pdo);
public function login($pdo);
public function changePassword($pdo);
public function logout ($pdo);
}

$pdo is the database connection handle

In your User class, you may add other supporting methods or setters and getters. Your user class will also have the member variables.

Other requirements…
Validate your form inputs both in client side and server side.
Passwords are hashed using PHP’s password_hash () function.
Database connection uses PDO
