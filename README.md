# 🏨 Hotel Booking System

A modern, secure PHP-based hotel booking management system with admin dashboard.

![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-blue)
![License](https://img.shields.io/badge/license-MIT-green)
![Database](https://img.shields.io/badge/database-MySQL-orange)

## ✨ Features

### Customer Features
- 📅 **Online Booking** - Easy-to-use booking form
- 🔍 **Booking Verification** - Check booking status with reference number
- ✉️ **Email Notifications** - Automated booking confirmations
- 📱 **Responsive Design** - Works on all devices

### Admin Features
- 📊 **Dashboard** - Overview of all bookings
- ✅ **Approval System** - Approve or reject bookings
- 🗑️ **Booking Management** - Edit, cancel, or delete bookings
- 📈 **Statistics** - View booking metrics at a glance

## 🚀 Quick Start

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- Git

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/hotel-booking-system.git
   cd hotel-booking-system
   ```

2. **Create database**
   ```bash
   mysql -u root -p
   ```
   ```sql
   CREATE DATABASE hotel_booking;
   exit;
   ```

3. **Import database schema**
   ```bash
   mysql -u root -p hotel_booking < database/schema.sql
   ```

4. **Configure the application**
   ```bash
   cp config.example.php config.php
   ```
   
   Edit `config.php` with your database credentials:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'your_username');
   define('DB_PASS', 'your_password');
   define('DB_NAME', 'hotel_booking');
   ```

5. **Set permissions**
   ```bash
   chmod 644 config.php
   chmod 755 admin/
   ```

6. **Access the application**
   - Website: `http://localhost/hotel-booking-system`
   - Admin: `http://localhost/hotel-booking-system/admin/login.php`

### Default Admin Credentials
```
Username: admin
Password: admin123
```
⚠️ **IMPORTANT: Change these credentials immediately after first login!**

## 📁 Project Structure

```
hotel-booking-system/
├── admin/                  # Admin panel
│   ├── dashboard.php       # Admin dashboard
│   ├── login.php          # Admin login
│   ├── approve.php        # Approve bookings
│   ├── cancel.php         # Cancel bookings
│   ├── delete.php         # Delete bookings
│   └── logout.php         # Logout handler
├── assets/                # Static assets
│   ├── css/
│   │   └── style.css      # Main stylesheet
│   ├── js/
│   │   └── main.js        # JavaScript functions
│   └── images/            # Images (if any)
├── database/              # Database files
│   └── schema.sql         # Database schema
├── includes/              # PHP includes
│   ├── Database.php       # Database connection class
│   ├── Booking.php        # Booking model
│   └── functions.php      # Helper functions
├── index.php              # Homepage/booking form
├── verify.php             # Verify booking page
├── process_booking.php    # Booking form handler
├── config.example.php     # Configuration template
├── .gitignore            # Git ignore rules
├── README.md             # This file
└── LICENSE               # License file
```

## 🔧 Configuration

### Database Settings
Edit `config.php`:
```php
define('DB_HOST', 'localhost');     // Database host
define('DB_USER', 'your_username'); // Database username
define('DB_PASS', 'your_password'); // Database password
define('DB_NAME', 'hotel_booking'); // Database name
```

### Application Settings
```php
define('SITE_NAME', 'Hotel Booking System');
define('SITE_URL', 'http://yourdomain.com');
define('ADMIN_EMAIL', 'admin@yourdomain.com');
```

## 📖 Usage

### For Customers

1. **Make a Booking**
   - Visit the homepage
   - Fill out the booking form
   - Submit and receive a reference number

2. **Verify Booking**
   - Go to "Verify Booking" page
   - Enter your reference number
   - View booking status and details

### For Administrators

1. **Login**
   - Navigate to `/admin/login.php`
   - Enter admin credentials

2. **Manage Bookings**
   - View all bookings on the dashboard
   - Approve pending bookings
   - Cancel or delete bookings
   - View booking statistics

## 🔒 Security Features

- ✅ **PDO Prepared Statements** - SQL injection protection
- ✅ **CSRF Protection** - Cross-Site Request Forgery prevention
- ✅ **Input Sanitization** - XSS attack prevention
- ✅ **Session Security** - Secure session handling
- ✅ **Password Hashing** - bcrypt password hashing
- ✅ **HTTPOnly Cookies** - Cookie security

## 🌐 Deployment

### Deploying to Production

1. **Update config.php**
   - Set production database credentials
   - Update SITE_URL to your domain
   - Enable HTTPS

2. **Security Checklist**
   ```bash
   # Verify file permissions
   chmod 644 config.php
   chmod 644 *.php
   chmod 755 admin/
   
   # Remove test data
   # Edit database/schema.sql to remove sample bookings
   ```

3. **Upload files**
   - Use FTP/SFTP or Git
   - Upload to web root (public_html, www, etc.)

4. **Test the application**
   - Create a test booking
   - Login to admin panel
   - Verify all features work

### Using cPanel
1. Upload files via File Manager
2. Create database in MySQL Databases
3. Import schema.sql via phpMyAdmin
4. Update config.php with database details

### Using Git Deployment
```bash
# On your server
cd /var/www/html
git clone https://github.com/yourusername/hotel-booking-system.git
cd hotel-booking-system
cp config.example.php config.php
nano config.php  # Edit with your settings
```

## 🛠️ Customization

### Adding Room Types
Edit `index.php`:
```php
<option value="luxury">Luxury Suite - $399/night</option>
```

Update database enum in `database/schema.sql`:
```sql
room_type ENUM('standard', 'deluxe', 'suite', 'luxury')
```

### Styling
All styles are in `assets/css/style.css`. Modify CSS variables:
```css
:root {
    --primary-color: #2563eb;  /* Change primary color */
    --secondary-color: #1e40af;
}
```

## 🐛 Troubleshooting

### Database Connection Error
- Check config.php credentials
- Ensure MySQL is running
- Verify database exists

### Page Not Found (404)
- Check file permissions
- Verify .htaccess if using Apache
- Check server configuration

### Session Errors
- Ensure PHP sessions are enabled
- Check session.save_path permissions
- Verify PHP version (7.4+)

## 📝 API Documentation

### Booking Class Methods

```php
// Create new booking
$booking->create($data);

// Get booking by reference
$booking->getByReference($reference);

// Get all bookings
$booking->getAll($status = null);

// Update booking status
$booking->updateStatus($id, $status);

// Delete booking
$booking->delete($id);

// Validate dates
$booking->validateDates($checkin, $checkout);
```

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👥 Authors

- Your Name - Initial work

## 🙏 Acknowledgments

- Built with PHP and MySQL
- Inspired by modern booking systems
- Uses responsive CSS design

## 📞 Support

For support, email support@yourdomain.com or open an issue on GitHub.

## 🗺️ Roadmap

- [ ] Email notifications
- [ ] Payment integration
- [ ] Multi-language support
- [ ] Advanced search filters
- [ ] Calendar view
- [ ] PDF invoice generation
- [ ] SMS notifications
- [ ] Customer reviews

---

Made with ❤️ by Your Team
