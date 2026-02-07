# Contributing to Hotel Booking System

First off, thank you for considering contributing to Hotel Booking System! 🎉

## Code of Conduct

This project and everyone participating in it is governed by respect and professionalism. Please be kind and courteous.

## How Can I Contribute?

### Reporting Bugs

Before creating bug reports, please check existing issues. When you create a bug report, include as many details as possible:

- **Use a clear and descriptive title**
- **Describe the exact steps to reproduce the problem**
- **Provide specific examples**
- **Describe the behavior you observed**
- **Explain which behavior you expected to see instead**
- **Include screenshots if possible**
- **Include your environment details** (PHP version, MySQL version, OS)

### Suggesting Enhancements

Enhancement suggestions are tracked as GitHub issues. When creating an enhancement suggestion:

- **Use a clear and descriptive title**
- **Provide a detailed description of the suggested enhancement**
- **Explain why this enhancement would be useful**
- **List some examples of how it would work**

### Pull Requests

1. Fork the repo and create your branch from `main`
2. If you've added code, add tests if applicable
3. Ensure your code follows the existing style
4. Update the documentation
5. Make sure your code lints
6. Issue the pull request!

## Development Setup

```bash
# Clone your fork
git clone https://github.com/your-username/hotel-booking-system.git
cd hotel-booking-system

# Create a branch
git checkout -b feature/my-new-feature

# Make your changes
# ...

# Commit your changes
git commit -m "Add some feature"

# Push to your fork
git push origin feature/my-new-feature
```

## Coding Standards

### PHP Code Style

- Use 4 spaces for indentation (not tabs)
- Follow PSR-12 coding standards
- Use meaningful variable names
- Add comments for complex logic
- Use type hints where possible

### Example:
```php
<?php
/**
 * Calculate booking total
 * 
 * @param array $booking Booking details
 * @return float Total amount
 */
function calculateTotal(array $booking): float {
    // Implementation
}
```

### Database

- Use prepared statements (PDO)
- Never use raw SQL with user input
- Use transactions for multiple related operations

### Security

- Always sanitize user input
- Use CSRF tokens for forms
- Implement proper authentication
- Hash passwords with bcrypt
- Validate data on server-side

### Git Commit Messages

- Use the present tense ("Add feature" not "Added feature")
- Use the imperative mood ("Move cursor to..." not "Moves cursor to...")
- Limit the first line to 72 characters
- Reference issues and pull requests

### Testing

Before submitting:

- Test all functionality manually
- Check for SQL injection vulnerabilities
- Test with different PHP versions if possible
- Verify responsive design on mobile

## Project Structure

Follow the existing structure:
```
/admin      - Admin panel files
/assets     - Static files (CSS, JS, images)
/database   - Database schemas
/includes   - PHP classes and functions
```

## Questions?

Feel free to open an issue with the `question` label!

Thank you for contributing! 🙌
