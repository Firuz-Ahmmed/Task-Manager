# Task Manager API Documentation

## API Endpoints

### Create Task

- **Endpoint:** `POST /api/tasks`
- **Request Body:**
  ```json
  {
      "title": "Sample Task",
      "description": "This is a sample task"
  }

- **Response::**
     - **201 Created:**
    ```json
        {
           "id": 1,
           "title": "Sample Task",
           "description": "This is a sample task",
           "is_completed": false,
           "created_at": "2023-01-01T00:00:00.000000Z",
           "updated_at": "2023-01-01T00:00:00.000000Z"
        }

- **Response::**
     - **200 OK:**
  ```json


    {
        "id": 1,
        "title": "Sample Task",
        "description": "This is a sample task",
        "is_completed": false,
        "created_at": "2023-01-01T00:00:00.000000Z",
        "updated_at": "2023-01-01T00:00:00.000000Z"
    }

- **Read Single Task::**
  - **Endpoint:** `GET /api/tasks/{id}`
- **Response::**
   - **200 OK**
  ```json
  {
    "id": 1,
    "title": "Sample Task",
    "description": "This is a sample task",
    "is_completed": false,
    "created_at": "2023-01-01T00:00:00.000000Z",
    "updated_at": "2023-01-01T00:00:00.000000Z"
  }
- **404 Not Found**
  ```json
   {
    "message": "Task not found"
  }
- **Update Task**
  - **Endpoint:** `PUT /api/tasks/{id}`
- **Request Body:**
  ```json
  {
    "title": "Updated Task",
    "description": "Updated description",
    "is_completed": true
  }
- **Response:**
    - **200 OK**
   ```json
  {
    "id": 1,
    "title": "Updated Task",
    "description": "Updated description",
    "is_completed": true,
    "created_at": "2023-01-01T00:00:00.000000Z",
    "updated_at": "2023-01-01T01:00:00.000000Z"
  }
- **404 Not Found**
    ```json
   {
    "message": "Task not found"
   }
- **Delete Task**
   - **Endpoint:** `DELETE /api/tasks/{id}`
- **Response:**
    - **200 OK**
    ```json
   {
    "message": "Task deleted successfully"
   }
- **404 Not Found**
    ```json
   {
    "message": "Task not found"
   }
Setup and Testing Instructions:
# Setup Instructions

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-repo/task-manager.git
   cd task-manager
2. **Install dependencies:**

   ```bash
    composer install
3. **Create and configure .env file:**

    ```env
    cp .env.example .env
4. **Update the .env file with your database credentials.**

5. **Generate application key:**

    ```bash
    php artisan key:generate
6. **Run database migrations:**

   ```bash
    php artisan migrate
7. **Run the development server:**

     ```bash
    php artisan serve
8. **Testing the API:**
Use Postman or curl to test the API endpoints as described in the API documentation.

9. **Run automated tests:**

```bash
    php artisan test
