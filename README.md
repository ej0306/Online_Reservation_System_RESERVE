# Reservation System

This is a README file for the Reservation System project. Before opening the Admin file, please follow the steps below.

## Prerequisites

- XAMPP or a similar local development environment is set up on your computer.

## Installation

1. Open your preferred web browser and navigate to `localhost/phpmyadmin` (for Windows) or `localhost:8080/phpmyadmin` (for Mac).
2. Click on the toolbar labeled "Database".
3. Create a new database called "reservation".
4. Look for the toolbar labeled "Import" and import the SQL file named "reservation.sql".
5. Open the terminal in XAMPP and create a new database called "reservation_made".
   - Note: Importing the file named "reservation_made.sql" using phpMyAdmin will not work.
6. Once the database is created, manually create a table called "reservation_made".
   - Note: Alternatively, you can copy the content from the text file located at `Admin/db/reservation_made.sql`.
7. Make sure everything is set up correctly, and then go to `localhost/Admin/index.php`.

## User Credentials

To access the user part of the system, the file `mysqli_connectReservation.php` is used to connect to the databases. The variable `@dbc` in this file enables the connection using a private MySQL username and password instead of the default "root" user. Therefore, you will need to use your own MySQL username and password instead of the ones used in the `mysqli_connectReservation.php` file.

Now you are ready to use the Reservation System.


## Screenshots of the website

### Homepage
![Homepage](https://github.com/ej0306/Reserve/assets/54604143/3a086b13-64a4-4d8f-b2d6-a14790d4b693)
![Inside Homepage](https://github.com/ej0306/Reserve/assets/54604143/31a43b06-b23a-44c2-b9b7-dcc729505b12)

### Make a reservation page
![Make Reservation](https://github.com/ej0306/Reserve/assets/54604143/c266b9ac-9b95-4444-9179-223884802296)

### Modify created reservation
![Modify Created Reservation](https://github.com/ej0306/Reserve/assets/54604143/d7992f68-5853-421e-a158-95a032a6b63e)

### View created reservation
![View Created Reservation](https://github.com/ej0306/Reserve/assets/54604143/2460eff4-446f-4478-a064-2ec481e6f612)

### Write a review
![Write a Review](https://github.com/ej0306/Reserve/assets/54604143/3e604c91-ebfc-477d-a237-87a10125098b)


### Admin Site/Dashboard
![Administrative Dashboard](https://github.com/ej0306/Reserve/assets/54604143/23af4d77-a61d-4e74-9083-3ad30325e36a)


