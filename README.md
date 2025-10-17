# WordPress Plugin CRUD

[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE) [![PHP Version](https://img.shields.io/badge/PHP-8.4-blue)](https://www.php.net/) [![WordPress Version](https://img.shields.io/badge/WordPress-6.x-green)](https://wordpress.org/) [![Docker](https://img.shields.io/badge/Docker-Ready-blue.svg)](https://www.docker.com/)

A **WordPress plugin** providing a full **CRUD (Create, Read, Update, Delete)** system for managing custom data within WordPress. Built with PHP and designed to integrate seamlessly into WordPress admin.

---

## Table of Contents

- [Features](#features)  
- [Screenshots](#screenshots)  
- [Installation](#installation)  
- [Usage](#usage)  
- [Technologies](#technologies)  
- [Docker Setup](#docker-setup)  
- [Project Structure](#project-structure)  
- [Contributing](#contributing)  
- [License](#license)  

---

## Features

- Create, Read, Update, Delete records from WordPress admin.  
- Lightweight, secure, and easy to extend.  
- Integrated with WordPress admin menus.  
- Supports Docker-based development environments.  

---

## Screenshots

![Book List](https://github.com/shaik-obydullah/wordpress-plugin-crud/blob/main/Book%20List.png?raw=true)

---

## Installation

### Prerequisites

- WordPress 6.x or higher  
- PHP 8.x  
- MySQL or MariaDB  
- Docker (optional for local development)  

### Steps

1. Clone the repository:

```bash
git clone https://github.com/shaik-obydullah/wordpress-plugin-crud.git
```

2. Navigate to the project folder:

```bash
cd wordpress-plugin-crud
```

3. Copy the plugin folder to your WordPress plugins directory (if not using Docker):

```bash
cp -r plugins/wp-simple-crud /path/to/wordpress/wp-content/plugins/
```

4. Activate the plugin in WordPress admin:  
**WordPress Admin → Plugins → Installed Plugins → WP Simple CRUD → Activate**

---

## Usage

- Access the plugin from the WordPress admin sidebar: **Simple CRUD**  
- Add new records (e.g., Books), edit or delete existing records  
- Changes are stored in a custom database table (`wp_books`)  

---

## Technologies

- PHP 8.x  
- WordPress 6.x  
- MySQL 8.x  
- Docker  
- HTML / CSS (Admin Interface)  

---

## Docker Setup

Use Docker for local development to keep WordPress, MySQL, and phpMyAdmin isolated.

```yaml
services:
  db:
    image: mysql:8.0
    container_name: wordpress_db
    restart: always
    environment:
      MYSQL_DATABASE: wordpress
      MYSQL_USER: wordpress
      MYSQL_PASSWORD: wordpress
      MYSQL_ROOT_PASSWORD: root
    volumes:
      - ./db_data:/var/lib/mysql

  wordpress:
    image: wordpress:latest
    container_name: wordpress_app
    depends_on:
      - db
    ports:
      - "8080:80"
    environment:
      WORDPRESS_DB_HOST: db
      WORDPRESS_DB_USER: wordpress
      WORDPRESS_DB_PASSWORD: wordpress
      WORDPRESS_DB_NAME: wordpress
    volumes:
      - ./wordpress_data:/var/www/html
      - ./themes:/var/www/html/wp-content/themes
      - ./plugins:/var/www/html/wp-content/plugins

  phpmyadmin:
    image: phpmyadmin/phpmyadmin:latest
    container_name: wordpress_phpmyadmin
    depends_on:
      - db
    ports:
      - "8081:80"
    environment:
      PMA_HOST: db
      PMA_USER: root
      PMA_PASSWORD: root
    restart: always

volumes:
  db_data:
```

**Commands to run Docker setup:**

```bash
docker compose up -d
```

- WordPress: [http://localhost:8080](http://localhost:8080)  
- phpMyAdmin: [http://localhost:8081](http://localhost:8081)  

---

## Project Structure

```
wordpress-plugin-crud/
│
├── docker-compose.yml
├── wordpress_data/           # WordPress core files (Docker mount)
├── plugins/                  # Custom plugins
│   └── wp-simple-crud/
├── themes/                   # Custom themes
├── db_data/                  # MySQL volume
├── README.md
└── LICENSE
```

---

## Contributing

- Fork the repository  
- Make your changes  
- Submit a pull request  
- Ensure PHP and WordPress coding standards are followed  

---

## License

This project is licensed under the MIT License — see the [LICENSE](LICENSE) file for details.




