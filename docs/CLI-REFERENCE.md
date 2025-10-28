# REG121 CLI Quick Reference

## 🚀 Essential Commands

### Environment Management
```bash
./121 start          # Start all services
./121 stop           # Stop all services  
./121 restart        # Restart all services
./121 status         # Check service status
./121 destroy        # Remove everything (with confirmation)
```

### Development Tools
```bash
./121 clear-cache    # Clear Symfony cache
./121 logs           # View all logs
./121 logs app       # View application logs only
```

### Symfony Commands
```bash
./121 console make:controller HomeController
./121 console doctrine:migrations:migrate
./121 console cache:clear
```

### Composer Commands
```bash
./121 composer install
./121 composer require symfony/maker-bundle --dev
./121 composer update
```

### Database Management
```bash
./121 db-connect     # Connect to MSSQL database
./121 db-reset       # Reset database with sample data
```

### Help & Info
```bash
./121 help           # Show full help
./121 version        # Show version info
```

## 🎨 Branding
- **Orange** (`#FF8C00`) - Primary brand color
- **White** - Secondary color
- **ASCII Logo** - REG121 branding in terminal

## 🔧 Service Access
- **Web App**: http://localhost
- **Database**: localhost:1433
  - Username: `sa`
  - Password: `YourStrong@Passw0rd`
  - Database: `reg121_homepage`

## ⚡ Quick Start Workflow
1. `./121 start` - Start environment
2. `./121 status` - Verify everything is running
3. `./121 console make:controller` - Create your first controller
4. Visit http://localhost - See your app!

## 🛠️ Troubleshooting
- **Docker not running**: Start Docker Desktop first
- **Services won't start**: Check `./121 logs` for errors
- **Database issues**: Try `./121 db-reset`
- **Cache problems**: Run `./121 clear-cache`
