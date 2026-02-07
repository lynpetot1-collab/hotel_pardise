# 🚀 GitHub Setup Guide

## Step-by-Step Instructions to Upload to GitHub

### Option 1: Using GitHub Desktop (Easiest)

1. **Download GitHub Desktop**
   - Go to https://desktop.github.com
   - Download and install

2. **Create Repository on GitHub**
   - Go to https://github.com
   - Click the **+** icon → **New repository**
   - Name: `hotel-booking-system`
   - Description: "Modern PHP hotel booking system"
   - Choose Public or Private
   - **Do NOT** check "Initialize with README"
   - Click **Create repository**

3. **Upload Your Code**
   - Open GitHub Desktop
   - Click **File** → **Add Local Repository**
   - Select the `hotel-booking-system` folder
   - Click **Publish repository**
   - Choose Public/Private
   - Click **Publish**

### Option 2: Using Command Line

```bash
# Navigate to your project folder
cd /path/to/hotel-booking-system

# Initialize git (if not already done)
git init

# Add all files
git add .

# Commit
git commit -m "Initial commit: Modern hotel booking system"

# Add your GitHub repository as remote
git remote add origin https://github.com/YOUR_USERNAME/hotel-booking-system.git

# Push to GitHub
git branch -M main
git push -u origin main
```

### Option 3: Using GitHub Web Interface

1. Create a new repository on GitHub
2. Go to your repository
3. Click "uploading an existing file"
4. Drag and drop all files from the folder
5. Click "Commit changes"

## 🔒 Important Security Notes

Your `config.php` file is automatically excluded by `.gitignore` to protect your database credentials. This means:

✅ **Safe to push to GitHub** - No sensitive data will be uploaded
✅ **config.example.php included** - Template for others to use
✅ **Easy deployment** - Copy example to config.php on any server

## 📝 After Uploading to GitHub

### Clone to a New Server

```bash
# Clone your repository
git clone https://github.com/YOUR_USERNAME/hotel-booking-system.git
cd hotel-booking-system

# Create config from example
cp config.example.php config.php

# Edit with your credentials
nano config.php

# Import database
mysql -u root -p hotel_booking < database/schema.sql

# Set permissions
chmod 644 config.php
```

## 🎯 What's Different from InfinityFree?

✅ **Clean Structure** - Organized folders and files
✅ **Modern Code** - PDO, OOP, security best practices
✅ **No Credentials** - config.php excluded from Git
✅ **Documentation** - Comprehensive README and guides
✅ **Portable** - Works on any PHP/MySQL hosting

## 🌐 Deploying to Production

### cPanel Hosting

1. Download as ZIP from GitHub
2. Upload to File Manager
3. Extract in public_html
4. Create database in MySQL Databases
5. Copy config.example.php → config.php
6. Edit config.php with credentials
7. Import schema.sql via phpMyAdmin

### VPS/Cloud Server

```bash
cd /var/www/html
git clone https://github.com/YOUR_USERNAME/hotel-booking-system.git
cd hotel-booking-system
cp config.example.php config.php
nano config.php  # Edit credentials
mysql -u root -p < database/schema.sql
```

## 🔑 Default Login Credentials

```
Admin URL: /admin/login.php
Username: admin
Password: admin123
```

**⚠️ CHANGE IMMEDIATELY after first login!**

## ✅ Checklist Before Going Live

- [ ] Upload all files to GitHub
- [ ] Clone to production server
- [ ] Create config.php from example
- [ ] Import database schema
- [ ] Change admin password
- [ ] Test booking system
- [ ] Test admin panel
- [ ] Enable HTTPS
- [ ] Update SITE_URL in config.php

## 📞 Need Help?

- Check the main README.md
- Open an issue on GitHub
- Review CONTRIBUTING.md

---

**Congratulations! Your hotel booking system is now on GitHub!** 🎉
