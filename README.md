# CodeIgniter 4 Project with Role-Based Dashboards & Landing Pages 

## Project Overview
This project is a web application developed using CodeIgniter 4, MySQL, Vanilla JS and jQuery featuring role-based access control and content management functionalities. The application supports four user roles: Admin, Manager, Staff, and Content Manager. Each role has specific permissions and access to different parts of the application.

## Features
- **Role-Based Access Control**: Different user roles with specific permissions.
- **Authentication**: User login, registration, and password management.
- **Content Management**: Content Manager role for managing content on guest-facing pages.
- **Dashboard Views**: Separate dashboards for Admin, Manager, Staff, and Content Manager.
- **Server-Side Data Processing**: Implement server-side processing for DataTables.

## Installation
1. **Clone the Repository**
   ```bash
   git clone https://github.com/ArslanJazib/ci4-role-dashboards-landing-pages-.git

2. **Navigate to the Project Directory**
   cd your-repository

3. **Install Dependencies**
   composer install

4. **Set Up the Environment**
    cp .env.example .env

5. **Run Migrations**
   php spark migrate

6. **Seed the Database**
    php spark db:seed

7. **php spark serve**
    php spark serve