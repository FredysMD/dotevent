# Dot Event

Dot Event es una aplicación creada para la organización y gestión de capacitaciones.

**Este proyecto esta desarrollado usando Laravel v9 y Boostrap v5.**


## Steps

    Instalar las dependencias del proyecto en back-end

    `` composer install ``
    
    Instalar las dependecias del proyecto en front-end

    `` npm install ``

    Crear una base de datos llamada 'dot_event' en el loca

    Correr las migraciones para crear las tablas

    `` php artisan migrate ``

    Correr las consultas de la sección "Queries"

    Levantar el back-end
    
    `` php artisan serve ``

    Levantar el front-end

    `` npm run dev ``

    Ir a http://127.0.0.1:8000/

    Registrar usario  http://127.0.0.1:8000/register
    
## Queries
    Sentencias SQL para el registro de los usuarios y capacitaciones(eventos):

    El rol cero es el rol del Admin y el 1 el del usuario común.

    Usuarios:
        USE dot_event;
        INSERT INTO users (name, username ,fullname,  email, password, role) 
        VALUES ('Fredys1', 'Fredys', 'Fredys Marquez','fmarquezduque@gmail.com', '$2y$10$VQFB8OtBtpkfgamJ3M9fyeyYSDiG1OOxGYIUaUCE1T4A54of49Yvq', 1),   
        ('Dot Studio1', 'DES', 'DOT EVENT STUDIO','doteventstudio@gmail.com', '$2y$10$VQFB8OtBtpkfgamJ3M9fyeyYSDiG1OOxGYIUaUCE1T4A54of49Yvq', 0);   

    Events (Capacitaciones):

        USE dot_event;
        INSERT INTO events (`title`, `description`, `date`, `time`, `location`, `instructors`, `cost`, `limit`, `state`,`created_at`, `updated_at`)
        VALUES
        ("Evento 1", "Descripción del evento 1", "2023-04-01", 1200, "Lugar 1", "Instructor 1", 100.50, 50, 1, NOW(), NOW()),
        ("Evento 2", "Descripción del evento 2", "2023-04-05", 1500, "Lugar 2", "Instructor 2", 80.00, 30, 1, NOW(), NOW()),
        ("Evento 3", "Descripción del evento 3", "2023-04-07", 1600, "Lugar 3", "Instructor 3", 200.00, 100, 1, NOW(), NOW()),
        ("Evento 4", "Descripción del evento 4", "2023-04-10", 1100, "Lugar 4", "Instructor 4", 50.00, 20, 1, NOW(), NOW()),
        ("Evento 5", "Descripción del evento 5", "2023-04-15", 1300, "Lugar 5", "Instructor 5", 150.00, 80, 1, NOW(), NOW()),
        ("Evento 6", "Descripción del evento 6", "2023-04-19", 1700, "Lugar 6", "Instructor 6", 120.00, 60, 1, NOW(), NOW()),
        ("Evento 7", "Descripción del evento 7", "2023-04-22", 1400, "Lugar 7", "Instructor 7", 70.00, 40, 1, NOW(), NOW()),
        ("Evento 8", "Descripción del evento 8", "2023-04-25", 1800, "Lugar 8", "Instructor 8", 90.00, 50, 1, NOW(), NOW()),
        ("Evento 9", "Descripción del evento 9", "2023-04-28", 2000, "Lugar 9", "Instructor 9", 180.00, 70, 1, NOW(), NOW()),
        ("Evento 10", "Descripción del evento 10", "2023-05-01", 1000, "Lugar 10", "Instructor 10", 60.00, 30, 1, NOW(), NOW()); 

## Creedenciales

Admin

email:  dotevent@gmail.com
Password: Fm.DE2023

user

email:  fmarquezduque@gmail.com
Password: Fm.DE2023
