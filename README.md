# Client and Appointment Management System

A simple PHP application for managing clients and their appointments.

## Features

-   **Client Management:**
    -   Create new clients
    -   View a list of existing clients
    -   Update client information
    -   Delete clients
-   **Appointment Management (Rendez-vous):**
    -   Schedule new appointments for clients
    -   View all scheduled appointments
    -   Modify appointment details
    -   (Note: Deletion of appointments is not explicitly shown in the router but might be a feature or an oversight)

## Installation and Setup

1.  **Prerequisites:**
    *   PHP 7.4 or higher.
    *   A web server (e.g., Apache, Nginx).
    *   MySQL database server.

2.  **Clone the repository (if applicable) or download the files.**

3.  **Configure Web Server:**
    *   Set the web server's document root to point to the `public` directory of this project.

4.  **Database Setup:**
    *   Connect to your MySQL server.
    *   Create a database. The application is configured to use `v2db` by default:
        ```sql
        CREATE DATABASE v2db;
        ```
    *   **Create Tables:**
        *   You will need to create the `client` and `rendezvous` tables manually.
        *   The structure for these tables (columns, data types) can be inferred from the properties and methods within the model files:
            *   `app/models/Client.php` for the `client` table.
            *   `app/models/RendezVous.php` for the `rendezvous` table (pay attention to foreign keys linking to the client table).
    *   **Configure Database Connection:**
        *   Open `app/Database.php`.
        *   If your database credentials or name are different from the defaults (`servername="localhost"`, `username="root"`, `password="passer"`, `dbname="v2db"`), update them accordingly.

5.  **Dependencies:**
    *   This project does not use a dependency manager like Composer. All required files are included manually.

6.  **Permissions (if needed):**
    *   Ensure your web server has the necessary read permissions for the project files and write permissions if any file uploads or caching mechanisms are implemented (though not apparent from the current codebase).

## Usage

Once the application is set up and your web server is configured to point to the `public` directory:

1.  **Access the application:**
    Open your web browser and navigate to the URL where you've hosted the project. For a local setup, this might be something like `http://localhost/your_project_folder/public/` or `http://your_project_folder.test/` if using virtual hosts.

2.  **Navigating the Application:**
    The application uses a simple routing mechanism based on the `action` query parameter in the URL.

    *   **View Clients:**
        *   URL: `index.php` (defaults to client list) or `index.php?action=voirClients`
        *   This page displays a list of all clients.

    *   **Add a New Client:**
        *   From the client list page, there should be a link/button to add a new client.
        *   Direct URL: `index.php?action=ajouterClient` (to view the form)
        *   The form submission (handled by `action=creerCli`) will create the client.

    *   **Edit an Existing Client:**
        *   From the client list, there should be options to edit each client.
        *   Direct URL (example for client with ID 1): `index.php?action=ModifierCli&idCli=1` (to view the edit form)
        *   The form submission (handled by `action=ValiderUpdateCli`) will update the client.

    *   **Delete a Client:**
        *   From the client list, there should be options to delete each client.
        *   Direct URL (example for client with ID 1): `index.php?action=supprimerCli&idCli=1`

    *   **View Appointments (Rendez-vous):**
        *   URL: `index.php?action=voirRdv`
        *   This page displays a list of all appointments.

    *   **Schedule a New Appointment:**
        *   From the appointment list page or potentially a client's detail page, there should be a link/button to schedule a new appointment.
        *   Direct URL: `index.php?action=prendreRdv` (to view the form)
        *   The form submission (handled by `action=creerRdv`) will create the appointment.

    *   **Edit an Existing Appointment:**
        *   From the appointment list, there should be options to edit each appointment.
        *   Direct URL (example for appointment with ID 1): `index.php?action=ModifierRdv&idRdv=1` (to view the edit form)
        *   The form submission (handled by `action=updateRdv`) will update the appointment.

## Project Structure

The project follows a basic Model-View-Controller (MVC) pattern:

*   `app/`: Contains the core application logic.
    *   `Database.php`: Handles the database connection.
    *   `controller/`: Contains controller classes (`ClientController.php`, `RendezVousController.php`) that handle user input, interact with models, and select views.
    *   `models/`: Contains model classes (`Client.php`, `RendezVous.php`) that manage data interaction with the database.
    *   `views/`: Contains the presentation files (PHP mixed with HTML) for displaying data to the user.
        *   `clients/`: Views related to client management.
        *   `rendezvous/`: Views related to appointment management.
*   `public/`: The web server's document root.
    *   `index.php`: The single entry point for all requests. It includes necessary files and routes requests to the appropriate controllers based on the `action` parameter.
