# SCD-Project:
Rook
Laravel Project for Software Construction and Devolopment course.
# Laravel Rook VPN

## Project Overview
This project is a Laravel-based web application designed to manage customers and Rook VPN subscriptions. It features a responsive design and incorporates CRUD operations, relationships between entities, and advanced functionalities such as dynamic search with Ajax.

---

## Features

### Customers Management
- **Add Customers:** Admins can manually add customers to the database via a user-friendly interface.
- **Edit Customers:** Update customer details.
- **Delete Customers:** Remove customers from the system.
- **View Customers:** List all customers with their details.

### Subscriptions Management
- **Add Subscriptions:** Assign subscriptions to customers, specifying start and end dates.
- **Edit Subscriptions:** Update subscription details for any customer.
- **Delete Subscriptions:** Remove subscriptions when no longer needed.
- **View Subscriptions:** List all subscriptions along with customer and plan details.

### Search Functionality
- A search bar enables filtering data dynamically.
  - Filters results based on "Customer Name" and "Subscription Plan Name."
  - Utilizes Ajax for a seamless user experience.
  - Displays matching results in a dropdown below the search bar.

---

## Technologies Used

### Backend
- **Laravel Framework**: A PHP framework for building robust web applications.
- **MySQL**: Database management system.
- **Eloquent ORM**: For database interactions and relationships.

### Frontend
- **Blade Templates**: For creating dynamic, reusable views.
- **Tailwind CSS**: For styling the application with a modern, responsive design.

### Others
- **Composer**: Dependency management.
- **Node.js & NPM**: For managing front-end dependencies and Vite.
- **Vite**: For building and serving assets.
- **Ajax**: For real-time data fetching without reloading the page.

---

## Installation Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/your-repository.git
   cd your-repository
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   ```

3. Create a `.env` file by copying `.env.example`:
   ```bash
   cp .env.example .env
   ```

4. Generate the application key:
   ```bash
   php artisan key:generate
   ```

5. Set up the database:
   - Create a database.
   - Update `.env` with your database credentials.

6. Run migrations to set up tables:
   ```bash
   php artisan migrate
   ```

7. Seed the database with dummy data (optional):
   ```bash
   php artisan db:seed
   ```

8. Start the development server:
   ```bash
   php artisan serve
   ```

9. Compile front-end assets:
   ```bash
   npm run dev
   ```

---

## Project Structure

### Database Schema

#### Customers Table
| Column       | Type    | Description         |
|--------------|---------|---------------------|
| id           | Integer | Primary key         |
| name         | String  | Customer name       |
| email        | String  | Unique email        |
| password     | String  | Hashed password     |
| created_at   | Timestamp | Creation timestamp |
| updated_at   | Timestamp | Update timestamp   |

#### Subscriptions Table
| Column                | Type    | Description                                   |
|-----------------------|---------|-----------------------------------------------|
| id                    | Integer | Primary key                                   |
| user_id               | Foreign | Foreign key referencing `customers.id`        |
| subscription_plan_id  | Foreign | Foreign key referencing `subscription_plans.id` |
| start_date            | Timestamp | Start date of the subscription               |
| end_date              | Timestamp | End date of the subscription (nullable)      |
| created_at            | Timestamp | Creation timestamp                           |
| updated_at            | Timestamp | Update timestamp                             |

### Relationships
- **Customers Table**:
  - Has many subscriptions.
- **Subscriptions Table**:
  - Belongs to a customer.
  - Belongs to a subscription plan.

---

## Key Functionalities Implemented

### Search Bar
- **Dynamic Filtering**:
  - Filters data based on user input in real-time.
  - Uses Ajax to retrieve data from the server without page reloads.
  - Dropdown updates dynamically with matching results.

### CRUD Operations
- Fully functional Create, Read, Update, and Delete operations for both customers and subscriptions.

### Responsive Design
- Ensures compatibility with various devices and browsers using Tailwind CSS.

---

## Troubleshooting

### Common Issues

1. **500 | Server Error**
   - Ensure `.env` is correctly configured.
   - Run migrations to ensure database tables exist.

2. **Encryption Key Error**
   - Run `php artisan key:generate` to resolve.

3. **Vite Manifest Not Found**
   - Run `npm install` followed by `npm run dev` to build assets.

4. **Database Errors**
   - Check foreign key constraints and ensure seeders provide valid data.

---

## Future Enhancements
- Add authentication for secure access.
- Implement roles and permissions for admin and customers.
- Extend search functionality to include more fields and advanced filtering.

---

## Authors
- Your Name
- Collaborators (if any)

## License
This project is licensed under the MIT License.




