# 💉 Sri Lankan Vaccine Safety Network (SLVSN)

[![Laravel](https://img.shields.io/badge/Laravel-11.31-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![Build Status](https://img.shields.io/badge/Build-Passing-brightgreen.svg)]()

## 📋 Table of Contents

- [About](#about)
- [Features](#features)
- [System Architecture](#system-architecture)
- [Project Structure](#project-structure)
 - [Local Setup with XAMPP](#local-setup-with-xampp)
- [Requirements](#requirements)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Configuration](#configuration)
- [Usage](#usage)
- [API Documentation](#api-documentation)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)

## 🎯 About

The **Sri Lankan Vaccine Safety Network (SLVSN)** is a comprehensive vaccine monitoring and safety tracking system designed to assess vaccine safety and effectiveness across large and diverse populations in Sri Lanka. This Laravel-based web application leverages Big Data Analytics and Visualization to enhance vaccination process monitoring at large scales of public health.

### Mission Statement
*"The project explores the concept of Big Data and Big Data visualization in relation to the vaccination process in Sri Lanka, ensuring vaccine safety and effectiveness through collaborative, investigator-led research efforts."*

## ✨ Features

### 🔐 Authentication & User Management
- **Secure Registration/Login**: Medical professionals can register with medical license numbers
- **Profile Management**: Users can update their profiles and credentials
- **Password Reset**: Secure password recovery system
- **Session Management**: Secure session handling with Laravel Breeze

### 💉 Vaccine Management
- **Vaccine Registry**: Track vaccines with manufacturer details, batch numbers, and expiration dates
- **Patient Records**: Comprehensive patient information management
- **Vaccination Records**: Link patients with administered vaccines and healthcare providers
- **Adverse Effects Tracking**: Monitor and report vaccine adverse effects with severity levels

### 📊 Data Analytics & Visualization
- **Power BI Integration**: Interactive dashboards for vaccination data analysis
- **Real-time Monitoring**: Live tracking of vaccination progress and adverse effects
- **Big Data Processing**: Handle large-scale vaccination data efficiently
- **Audit Trails**: Complete change logging system with database triggers

### 📰 Information Hub
- **News Integration**: Real-time vaccine-related news from external APIs
- **Research Access**: Platform for accessing vaccination studies and data
- **Community Engagement**: Discussion forums and information sharing

### 🛡️ Data Security & Compliance
- **Database Triggers**: Automatic change logging for all critical tables
- **Data Integrity**: Foreign key constraints and validation rules
- **Audit Logging**: Comprehensive tracking of all system changes
- **Secure API Integration**: Protected external service connections

## 🏗️ System Architecture

### Database Schema

#### Core Tables
- **users**: Healthcare professionals with medical license numbers
- **patients**: Patient demographic and contact information
- **vaccines**: Vaccine inventory with batch tracking
- **vaccination_records**: Links patients, vaccines, and administrators
- **adverse_effects**: Adverse effect reports with severity classification
- **adverse_effect_logs**: Audit trail for adverse effect changes
- **change_log**: System-wide change tracking

#### Key Relationships
```
users (1) -----> (N) vaccination_records
patients (1) ---> (N) vaccination_records  
vaccines (1) ---> (N) vaccination_records
vaccination_records (1) -> (N) adverse_effects
```

### Technology Stack
- **Backend**: Laravel 11.31 (PHP 8.2+)
- **Frontend**: Blade Templates, Alpine.js, Tailwind CSS
- **Database**: MySQL with automated triggers
- **Testing**: Pest PHP testing framework
- **Build Tools**: Vite, PostCSS
- **Analytics**: Power BI integration

## 📁 Project Structure

```text
.
├─ backend/                          # Laravel application (server-side)
│  ├─ app/                           # Application code (Models, Http Controllers, Requests, etc.)
│  ├─ bootstrap/                     # Framework bootstrap
│  ├─ config/                        # Laravel configuration files
│  ├─ database/                      # Migrations, factories, seeders
│  ├─ public/                        # Public web root (Vite builds output to build/ here)
│  │  └─ build/                      # Compiled assets from frontend (manifest.json, assets/...)
│  ├─ resources/
│  │  └─ views/                      # Blade templates (server-rendered UI)
│  ├─ routes/                        # Web, console, auth routes
│  ├─ storage/                       # Framework/cache/logs (should be writable)
│  ├─ tests/                         # Pest tests
│  ├─ vendor/                        # Composer dependencies
│  ├─ artisan                        # Artisan CLI
│  ├─ composer.json                  # Backend Composer config and scripts
│  └─ phpunit.xml                    # PHPUnit/Pest configuration
│
├─ frontend/                         # Client-side assets and build tooling
│  ├─ resources/
│  │  ├─ css/                        # Tailwind entry (app.css)
│  │  └─ js/                         # JS entry (app.js, bootstrap.js)
│  ├─ package.json                   # Frontend scripts and deps
│  ├─ package-lock.json              # Lockfile
│  ├─ postcss.config.js              # PostCSS configuration
│  ├─ tailwind.config.js             # Tailwind scan paths (points to backend views)
│  └─ vite.config.js                 # Builds to ../backend/public/build and dev server
│
├─ CHANGELOG.md
├─ README.md
└─ (optional) .env files             # Backend env at backend/.env; Vite env at frontend/.env
```

### Run targets (quick ref)
- **Backend dev**: `cd backend && composer install && composer dev`
- **Frontend dev only**: `cd frontend && npm install && npm run dev`
- **Production build**: `cd backend && composer build`

## 🧰 Local Setup with XAMPP

### Apache Alias (serve at http://localhost/slvsn)
1) Open `C:\xampp\apache\conf\httpd.conf` and ensure these are enabled (no leading `#`):
```
LoadModule rewrite_module modules/mod_rewrite.so
Include conf/extra/httpd-xampp.conf
```
2) Open `C:\xampp\apache\conf\extra\httpd-xampp.conf` (or `httpd.conf` if preferred) and add:
```apache
# Serve SLVSN at http://localhost/slvsn
Alias /slvsn "S:/Vaccine_Monitoring_Sys/backend/public"
<Directory "S:/Vaccine_Monitoring_Sys/backend/public">
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
    DirectoryIndex index.php
</Directory>
```
3) Restart Apache in XAMPP.

### Environment
Edit `backend/.env`:
```env
APP_URL=http://localhost/slvsn
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vaccine_monitoring
DB_USERNAME=root
DB_PASSWORD=
QUEUE_CONNECTION=sync
```

### One-time backend prep
```powershell
cd S:\Vaccine_Monitoring_Sys\backend
php artisan key:generate
php artisan storage:link
```

### Build frontend assets (outputs to `backend/public/build`)
```powershell
cd S:\Vaccine_Monitoring_Sys\frontend
npm install
npm run build
```
Notes:
- Vite 6 writes the manifest to `public/build/.vite/manifest.json`. The build script also copies to `public/build/manifest.json` for compatibility.

### Clear Laravel caches if routes/assets change
```powershell
cd S:\Vaccine_Monitoring_Sys\backend
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### Open the site
- `http://localhost/slvsn`
- If you see a 404 on pretty URLs, verify `mod_rewrite` is enabled and `AllowOverride All` is set in the Alias `<Directory>` block.

## 📋 Requirements

### System Requirements
- **PHP**: 8.2 or higher
- **Composer**: Latest version
- **Node.js**: 18+ and npm
- **Database**: MySQL 8.0+ or MariaDB 10.3+
- **Web Server**: Apache/Nginx

### PHP Extensions
- OpenSSL
- PDO
- Mbstring
- Tokenizer
- XML
- Ctype
- JSON
- BCMath

## 🚀 Installation

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/vaccine-monitoring-system.git
cd vaccine-monitoring-system
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Configure Environment Variables
Edit `.env` file with your settings:
```env
APP_NAME="Vaccine Monitoring System"
APP_ENV=local
APP_KEY=base64:your-generated-key
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vaccine_monitoring
DB_USERNAME=your_username
DB_PASSWORD=your_password

# News API Configuration
NEWS_API_KEY=your_news_api_key
```

### 5. Database Setup
```bash
# Create database
mysql -u root -p -e "CREATE DATABASE vaccine_monitoring;"

# Run migrations
php artisan migrate

# Seed database (optional)
php artisan db:seed
```

### 6. Build Assets
```bash
# Development
npm run dev

# Production
npm run build
```

### 7. Start Development Server
```bash
# Option 1: Laravel development server
php artisan serve

# Option 2: Using the dev script (includes queue worker and Vite)
composer run dev
```

Visit `http://localhost:8000` to access the application.

## 🗄️ Database Setup

### Migration Files
The system includes comprehensive database migrations:

1. **Core Laravel Tables**:
   - `0001_01_01_000000_create_users_table.php`
   - `0001_01_01_000001_create_cache_table.php`
   - `0001_01_01_000002_create_jobs_table.php`

2. **Vaccine System Tables**:
   - `2024_12_28_070514_create_vaccines_table.php`
   - `2024_12_28_070602_create_patients_table.php`
   - `2024_12_28_070631_create_vaccination_records_table.php`
   - `2024_12_28_071225_create_adverse_effects_table.php`

3. **Audit & Logging**:
   - `2024_12_28_072019_create_change_log_table.php`
   - `2025_01_13_114103_create_adverse_effect_logs_table.php`

4. **Database Triggers**:
   - `2024_12_28_110152_create_triggers_for_vaccines.php`
   - `2024_12_28_110647_create_update_trigger_for_patients.php`
   - `2024_12_28_110658_create_update_trigger_for_vaccination_records.php`
   - `2024_12_28_110709_create_update_trigger_for_adverse_effects.php`

5. **User Enhancements**:
   - `2025_01_13_083120_add_medical_no_to_users_table.php`

### Running Migrations
```bash
# Run all migrations
php artisan migrate

# Rollback migrations (if needed)
php artisan migrate:rollback

# Fresh migration with seeding
php artisan migrate:fresh --seed
```

## ⚙️ Configuration

### News API Setup
1. Register at [NewsAPI.org](https://newsapi.org/)
2. Get your API key
3. Add to `.env`: `NEWS_API_KEY=your_api_key_here`

## 📊 Power BI Integration
The dashboard integrates with Power BI for advanced analytics. Update the iframe source in `resources/views/dashboard.blade.php` with your Power BI report URL.

### Mail Configuration
Configure mail settings in `.env` for password reset functionality:
```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
```

## 📖 Usage

### User Registration
1. Navigate to `/register`
2. Fill in required information including medical license number
3. Verify email (if email verification is enabled)
4. Access the dashboard

### Managing Adverse Effects
1. Login to the system
2. Navigate to "Adverse Effects" section
3. Create, view, edit, or delete adverse effect reports
4. View audit logs for all changes

### Accessing Analytics
1. Login and go to Dashboard
2. View Power BI integrated reports
3. Analyze vaccination trends and adverse effects
4. Export data for further analysis

### News & Information
- Visit `/news` for latest vaccine-related news
- News is automatically fetched from external APIs
- Articles are filtered for vaccine and health-related content

## 🔌 API Documentation

### Adverse Effects API
```php
// List all adverse effects
GET /adverse_effects

// Create new adverse effect
POST /adverse_effects

// Edit adverse effect
GET /adverse_effects/{id}/edit

// Update adverse effect
PUT /adverse_effects/{id}

// Delete adverse effect
DELETE /adverse_effects/{id}

// View audit logs
GET /adverse_effects/logs
```

### Authentication Routes
```php
// Registration
GET|POST /register

// Login
GET|POST /login

// Logout
POST /logout

// Password Reset
GET|POST /forgot-password
GET|POST /reset-password/{token}
```

## 🧪 Testing

### Running Tests
```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --testsuite=Feature

# Run with coverage
php artisan test --coverage

# Run specific test file
php artisan test tests/Feature/AdverseEffectTest.php
```

### Test Suites
- **Feature Tests**: End-to-end application testing
- **Unit Tests**: Individual component testing
- **Authentication Tests**: User registration, login, logout
- **Adverse Effects Tests**: CRUD operations and validation

### Available Test Files
- `tests/Feature/AdverseEffectTest.php`
- `tests/Feature/UserAuthenticationTest.php`
- `tests/Feature/ProfileTest.php`
- `tests/Feature/Auth/AuthenticationTest.php`
- `tests/Feature/Auth/RegistrationTest.php`

## 🛠️ Development

### Code Style
The project uses Laravel Pint for code formatting:
```bash
# Format code
./vendor/bin/pint

# Check formatting
./vendor/bin/pint --test
```

### Development Commands
```bash
# Start development environment
composer run dev

# Clear application cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Generate IDE helper files
php artisan ide-helper:generate
```

### Database Management
```bash
# Create new migration
php artisan make:migration create_table_name

# Create new model with migration
php artisan make:model ModelName -m

# Create new controller
php artisan make:controller ControllerName --resource
```

## 🤝 Contributing

We welcome contributions to improve the Vaccine Monitoring System!

### How to Contribute
1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### Development Guidelines
- Follow PSR-12 coding standards
- Write tests for new features
- Update documentation as needed
- Ensure all tests pass before submitting PR

### Reporting Issues
- Use GitHub Issues for bug reports
- Provide detailed reproduction steps
- Include system information and error logs

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- **Laravel Framework**: For providing an excellent foundation
- **Sri Lankan Health Ministry**: For supporting vaccine safety initiatives
- **Healthcare Professionals**: For their valuable feedback and requirements
- **Open Source Community**: For the amazing tools and libraries

## 📞 Support

For support and questions:
- **Email**: support@slvsn.lk
- **Documentation**: [Project Wiki](https://github.com/your-username/vaccine-monitoring-system/wiki)
- **Issues**: [GitHub Issues](https://github.com/your-username/vaccine-monitoring-system/issues)

---

**Crafted with care for Sri Lanka's Healthcare System**

*Ensuring vaccine safety through technology and data-driven insights.*#
