# REG121 Homepage - Docker Development Environment

## 🚀 Quick Start

### Prerequisites
1. **Docker Desktop** must be installed and running
2. **Composer** installed locally (for initial setup)

### Starting the Environment

1. **Start Docker Desktop** (if not already running)

2. **Build and start all services:**
   ```bash
   docker-compose up -d
   ```

3. **Access your application:**
   - **Web Application**: http://localhost
   - **Database**: localhost:1433
     - Username: `sa`
     - Password: `YourStrong@Passw0rd`
     - Database: `reg121_homepage`

### Services Overview

| Service | Container Name | Port | Description |
|---------|---------------|------|-------------|
| **Nginx** | reg121_nginx | 80 | Web server |
| **PHP-FPM** | reg121_app | 9000 (internal) | Symfony application |
| **MSSQL** | reg121_mssql | 1433 | Database server |

### Development Commands

#### Using the REG121 CLI (Recommended)
```bash
# Start/stop environment
./121 start
./121 stop
./121 status

# Development commands
./121 clear-cache
./121 console make:controller HomeController
./121 composer install

# Database management
./121 db-connect
./121 db-reset

# View logs
./121 logs
./121 logs app

# Get help
./121 help
```

#### Direct Docker Commands (Alternative)
```bash
# Clear cache
docker-compose exec app php bin/console cache:clear

# Create a controller
docker-compose exec app php bin/console make:controller HomeController

# Run migrations (when ready)
docker-compose exec app php bin/console doctrine:migrations:migrate

# Connect to MSSQL
docker-compose exec mssql /opt/mssql-tools/bin/sqlcmd -S localhost -U sa -P YourStrong@Passw0rd

# Check database status
docker-compose exec mssql /opt/mssql-tools/bin/sqlcmd -S localhost -U sa -P YourStrong@Passw0rd -Q "SELECT name FROM sys.databases"

# Install dependencies
docker-compose exec app composer install

# Add new packages
docker-compose exec app composer require [package-name]
```

### File Structure
```
REG121_Homepage/
├── docker/
│   ├── nginx/
│   │   └── nginx.conf              # Nginx configuration
│   ├── php/
│   │   └── php.ini                 # PHP settings
│   └── mssql/
│       └── init/
│           └── 01-init-database.sql # Database initialization
├── docker-compose.yml              # Docker services configuration
├── Dockerfile                      # PHP application container
├── .env                           # Environment variables
├── .env.local                     # Local overrides (not committed)
└── README-Docker.md               # This file
```

### Environment Configuration

#### Database Connection
- **Development**: Uses Docker MSSQL container
- **Production**: Will use Azure SQL Database
- **Connection String**: `mssql://sa:YourStrong@Passw0rd@mssql:1433/reg121_homepage?serverVersion=2019&charset=utf8mb4`

#### Application Settings
- **Environment**: `dev` (development)
- **Debug**: `true` (enabled)
- **Secret**: Configured for development

### Troubleshooting

#### Docker Issues
```bash
# Check if Docker is running
docker ps

# View container logs
docker-compose logs [service-name]

# Restart services
docker-compose restart

# Rebuild containers
docker-compose up -d --build
```

#### Database Connection Issues
1. Ensure MSSQL container is healthy: `docker-compose ps`
2. Check MSSQL logs: `docker-compose logs mssql`
3. Verify database exists: Connect and run `SELECT name FROM sys.databases`

#### Application Issues
1. Check application logs: `docker-compose logs app`
2. Clear Symfony cache: `docker-compose exec app php bin/console cache:clear`
3. Check file permissions: `chmod -R 755 .`

### Next Steps

1. **Start Docker Desktop**
2. **Run**: `docker-compose up -d`
3. **Visit**: http://localhost
4. **Begin development** of your REG121 homepage!

### Production Considerations

- Update `.env` with production database credentials
- Change `APP_SECRET` to a secure random string
- Set `APP_ENV=prod`
- Configure proper SSL/TLS certificates
- Set up proper backup strategies for Azure SQL Database

---

**Happy coding! 🎉**