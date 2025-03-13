# Async API

This project was created to put into practice the concepts studied about asynchronous queues using Redis, jobs, email sending, Excel generation, consuming external APIs, and cloud storage (S3).

## 📌 Technologies Used

This project was developed using the following technologies:

-   [Laravel](https://laravel.com/)
-   [PHP](https://www.php.net/)
-   [MySQL/PostgreSQL](https://www.mysql.com/)
-   [Redis](https://redis.io/)
-   [Docker](https://www.docker.com/)
-   [MinIO/S3](https://min.io/)
-   [MailHog](https://github.com/mailhog/MailHog)

## 🚀 Installation and Setup

### Prerequisites

To ensure everything is properly set up and that the project connects with the external API, follow these official installation guides:

-   [Laravel Installing PHP Docs](https://laravel.com/docs/12.x/installation#installing-php)
-   [Docker Installing Docs](https://docs.docker.com/engine/install/)

### API Key Requirement

This project integrates with the [Ball Don't Lie API](https://docs.balldontlie.io/#teams).  
To use the API, you must obtain an API key from their official documentation and add it to your `.env` file:

### Installation Steps

1. **Clone the repository**

    ```sh
    git clone https://github.com/lucalana/async-api.git
    cd async-api
    ```

2. **Install dependencies**

    ```sh
    composer install
    ```

3. **Create and configure the .env file**

    ```sh
    cp .env.example .env
    ```

4. **Generate the application key**

    ```sh
    php artisan key:generate
    ```

5. **Start the services**
    ```sh
    docker compose up -d
    ```

## 🛠 Usage

-   Run queues
    ```sh
    php artisan queue:work
    ```
