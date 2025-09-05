# Building Management System

A comprehensive Laravel-based building and apartment management system with RESTful API, designed for managing complexes, buildings, floors, and apartments with advanced features like OAuth2 authentication, search capabilities, and administrative tools.

## 🏗️ Overview

This system provides a complete solution for building management with multi-level hierarchy support (Complex → Building → Floor → Apartment) and includes features for user management, CSV data operations, search functionality, and comprehensive audit trails.

## ✨ Features

### Core Functionality
- **Multi-level Building Hierarchy**: Manage complexes, buildings, floors, and apartments with slug-based routing
- **User Management**: Admin and user roles with comprehensive access control
- **RESTful API**: Complete CRUD operations with HATEOAS support for all entities
- **OAuth2 Authentication**: Secure API access with Laravel Passport

### Data Management
- **CSV Import/Export**: Bulk operations for users and apartments
- **Search Integration**: Elasticsearch-powered fast search across apartments
- **Data Pipelines**: Advanced filtering and pipeline processing for user and apartment attributes

### Performance & Monitoring
- **Redis Caching**: Optimized GET request caching for improved performance
- **Async Job Processing**: Background jobs and message queues for imports and calculations
- **Action History**: 7-day user action tracking using command and observer patterns
- **Performance Testing**: Postman-based performance test suites

### Development & Deployment
- **Comprehensive Testing**: Unit and feature tests with PHPUnit
- **Code Quality**: PHPStan static analysis for code quality assurance
- **CI/CD Pipeline**: GitHub Actions for automated testing and deployment
- **Docker Support**: Laravel Sail for containerized development environment

## 🛠️ Technology Stack

- **Framework**: Laravel 11.x
- **PHP**: 8.2+
- **Database**: MySQL with migrations
- **Cache**: Redis
- **Search**: Elasticsearch
- **Authentication**: Laravel Passport (OAuth2)
- **Queue**: Database/Redis-based job queues
- **Frontend Build**: Vite with Tailwind CSS
- **Testing**: PHPUnit
- **Code Analysis**: PHPStan
- **Containerization**: Docker with Laravel Sail

## 📋 Prerequisites

- PHP 8.2 or higher
- Composer
- Docker and Docker Compose (for Sail)
- Node.js and npm (for frontend assets)

## 🚀 Installation

### 1. Clone the Repository
```bash
git clone https://github.com/nanorocks/building.nankov.mk.git
cd building.nankov.mk/bca
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Environment Variables
Edit `.env` file with your configuration:
```env
APP_NAME="Building Management System"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=building_management
DB_USERNAME=sail
DB_PASSWORD=password

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

# Add Elasticsearch configuration
ELASTICSEARCH_HOST=elasticsearch
ELASTICSEARCH_PORT=9200
```

### 5. Start Development Environment
```bash
./vendor/bin/sail up -d
```

### 6. Database Setup
```bash
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan passport:install
```

### 7. Build Frontend Assets
```bash
./vendor/bin/sail npm run dev
```

## 🔧 Development Commands

### Docker Environment
```bash
# Start all services
./vendor/bin/sail up -d

# Stop all services
./vendor/bin/sail down

# View logs
./vendor/bin/sail logs

# Access application container
./vendor/bin/sail shell
```

### Database Operations
```bash
# Run migrations
./vendor/bin/sail artisan migrate

# Rollback migrations
./vendor/bin/sail artisan migrate:rollback

# Fresh migration with seeding
./vendor/bin/sail artisan migrate:fresh --seed
```

### Code Quality & Testing
```bash
# Run all tests
./vendor/bin/sail test

# Run specific test suite
./vendor/bin/sail test --testsuite=Feature

# PHPStan static analysis
./vendor/bin/sail composer analyse
# or
vendor/bin/phpstan analyse app tests

# Laravel Pint code formatting
./vendor/bin/sail pint
```

### Queue Management
```bash
# Process jobs
./vendor/bin/sail artisan queue:work

# List failed jobs
./vendor/bin/sail artisan queue:failed

# Clear all jobs
./vendor/bin/sail artisan queue:clear
```

## 📡 API Documentation

### Authentication
All API endpoints require OAuth2 authentication. Include the Bearer token in your requests:
```
Authorization: Bearer {your-access-token}
```

### Base URL
```
http://localhost/api/v1
```

### Available Endpoints

#### Apartments
- `GET /apartments` - List all apartments
- `GET /apartments/{slug}` - Get specific apartment
- `POST /apartments` - Create new apartment
- `PUT /apartments/{slug}` - Update apartment
- `DELETE /apartments/{slug}` - Delete apartment

#### Buildings
- `GET /buildings` - List all buildings
- `GET /buildings/{slug}` - Get specific building
- `POST /buildings` - Create new building
- `PUT /buildings/{slug}` - Update building
- `DELETE /buildings/{slug}` - Delete building

#### Complexes
- `GET /complexes` - List all complexes
- `GET /complexes/{slug}` - Get specific complex
- `POST /complexes` - Create new complex
- `PUT /complexes/{slug}` - Update complex
- `DELETE /complexes/{slug}` - Delete complex

#### Floors
- `GET /floors` - List all floors
- `GET /floors/{slug}` - Get specific floor
- `POST /floors` - Create new floor
- `PUT /floors/{slug}` - Update floor
- `DELETE /floors/{slug}` - Delete floor

#### Action History
- `GET /action-history` - View user action history (last 7 days)

## 🧪 Testing

### Running Tests
```bash
# Run all tests
./vendor/bin/sail test

# Run with coverage
./vendor/bin/sail test --coverage

# Run specific test file
./vendor/bin/sail test tests/Feature/ApartmentTest.php
```

### Test Structure
- **Unit Tests**: Located in `tests/Unit/`
- **Feature Tests**: Located in `tests/Feature/`
- **Database**: Uses SQLite for testing environment

## 🚀 Deployment

### GitHub Actions CI/CD
The repository includes automated CI/CD pipeline that:
- Runs on push/PR to main branch
- Sets up PHP 8.2 environment
- Installs dependencies
- Runs database migrations
- Executes test suite
- Performs static analysis

### Manual Deployment Steps
1. Clone repository on production server
2. Install dependencies: `composer install --no-dev`
3. Configure production environment variables
4. Run migrations: `php artisan migrate --force`
5. Install Passport keys: `php artisan passport:install`
6. Build assets: `npm run build`
7. Configure web server (Apache/Nginx)

## 📁 Project Structure

```
bca/
├── app/
│   ├── Http/Controllers/    # API Controllers
│   ├── Models/             # Eloquent Models
│   ├── Policies/           # Authorization Policies
│   ├── Services/           # Business Logic Services
│   ├── Repositories/       # Data Access Layer
│   └── Providers/          # Service Providers
├── database/
│   ├── migrations/         # Database Migrations
│   └── seeders/           # Database Seeders
├── routes/
│   ├── api.php            # API Routes
│   └── web.php            # Web Routes
├── tests/
│   ├── Feature/           # Feature Tests
│   └── Unit/             # Unit Tests
└── config/               # Configuration Files
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### Development Workflow
1. Ensure all tests pass: `./vendor/bin/sail test`
2. Run static analysis: `vendor/bin/phpstan analyse app tests`
3. Format code: `./vendor/bin/sail pint`
4. Update documentation if needed

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🔗 Links

- [Laravel Documentation](https://laravel.com/docs)
- [Laravel Sail Documentation](https://laravel.com/docs/sail)
- [Laravel Passport Documentation](https://laravel.com/docs/passport)
