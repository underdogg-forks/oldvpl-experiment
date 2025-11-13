# Security Best Practices for InvoicePlane

This document outlines security best practices and considerations for deploying and maintaining InvoicePlane.

## Environment Configuration

### 1. Application Key
- **CRITICAL**: Generate a unique application key using `php artisan key:generate`
- Never use the default key from `.env.example`
- Never commit your `.env` file to version control
- Rotate the key periodically (note: this will invalidate encrypted data)

### 2. Debug Mode
- **ALWAYS** set `APP_DEBUG=false` in production
- Debug mode can expose sensitive information including:
  - Database credentials
  - Application secrets
  - File paths
  - Stack traces

### 3. Logging
- Set `LOG_LEVEL=error` in production (default in `.env.example`)
- Regularly review and rotate log files
- Ensure log files are not web-accessible

## HTTPS Configuration

### 1. Force HTTPS
- Set `SESSION_SECURE_COOKIE=true` to ensure cookies are only sent over HTTPS
- Configure your web server to redirect HTTP to HTTPS
- Consider using HSTS headers to force HTTPS

### 2. SSL/TLS
- Use TLS 1.2 or higher
- Keep SSL certificates up to date
- Use strong cipher suites

## Database Security

### 1. Database Credentials
- Use strong, unique database passwords
- Create a dedicated database user with minimal privileges
- Never use the root database user
- Restrict database access to localhost if possible

### 2. Database Backups
- Encrypt database backups
- Store backups securely, separate from the application
- Test backup restoration regularly

## File Uploads

### Current Protections
- File type validation (whitelist of safe mime types)
- File size limits (10MB default)
- Filename sanitization to prevent directory traversal
- Attachment storage outside web root

### Best Practices
- Regularly review uploaded files
- Consider implementing virus scanning for uploads
- Monitor disk usage
- Set appropriate file permissions on upload directories

## Authentication

### Current Protections
- Login rate limiting (5 attempts per minute per email)
- CSRF protection on all forms
- Password hashing with bcrypt
- Session security with SameSite cookies

### Best Practices
- Enforce strong password policies
- Consider implementing two-factor authentication
- Regularly audit user accounts and permissions
- Implement account lockout after multiple failed attempts

## API Security

### Current Protections
- HMAC-SHA256 signature verification
- API key authentication
- Rate limiting (60 requests per minute)

### Best Practices
- Rotate API keys periodically
- Monitor API usage for anomalies
- Implement IP whitelisting if possible
- Use HTTPS for all API calls

## Web Server Configuration

### Apache
- Enable `mod_rewrite`
- Set appropriate file permissions (755 for directories, 644 for files)
- Configure `.htaccess` files properly
- Disable directory listing
- Hide server version information

### Nginx
- Configure proper URL rewriting
- Set appropriate file permissions
- Disable server tokens
- Implement rate limiting

## Regular Maintenance

### 1. Updates
- Keep PHP updated to the latest stable version
- Update Composer dependencies regularly: `composer update`
- Monitor security advisories for Laravel and dependencies
- Test updates in a staging environment first

### 2. Security Audits
- Review application logs regularly
- Monitor for suspicious activity
- Conduct periodic security scans
- Review user permissions and access

### 3. Backups
- Automated daily backups of database and files
- Test backup restoration monthly
- Store backups in multiple locations
- Encrypt sensitive backup data

## Monitoring

### What to Monitor
- Failed login attempts
- API usage patterns
- File upload activity
- Database query performance
- Disk space usage
- Server resource usage

### Alerting
- Set up alerts for:
  - Multiple failed login attempts
  - Unusual API activity
  - Large file uploads
  - Database errors
  - Server resource exhaustion

## Deployment Checklist

Before deploying to production, verify:

- [ ] `APP_DEBUG=false`
- [ ] `APP_ENV=production`
- [ ] `LOG_LEVEL=error`
- [ ] Unique `APP_KEY` generated
- [ ] Strong database credentials
- [ ] HTTPS configured and forced
- [ ] `SESSION_SECURE_COOKIE=true`
- [ ] File permissions set correctly
- [ ] `.env` file secured (600 permissions)
- [ ] Storage directory writable by web server
- [ ] Backups configured and tested
- [ ] Monitoring and alerting configured
- [ ] Security headers enabled (via SecurityHeaders middleware)
- [ ] All dependencies updated
- [ ] Application tested in staging environment

## Incident Response

If you discover a security vulnerability:

1. **Do not** disclose it publicly
2. Email security details to mail@invoiceplane.com
3. Include:
   - Description of the vulnerability
   - Steps to reproduce
   - Potential impact
   - Suggested fix (if available)
4. Wait for confirmation before public disclosure

## Security Features Added in This Release

### SQL Injection Prevention
- Input validation in Sortable trait
- Parameterized queries in search functions
- Whitelisted values for user input

### File Upload Security
- File type validation (whitelist)
- Filename sanitization
- Path traversal prevention
- File size limits

### Authentication & Authorization
- Login rate limiting
- Timing attack prevention in API auth
- Privilege escalation prevention
- Improved password change authorization

### Security Headers
- X-Content-Type-Options: nosniff
- X-Frame-Options: SAMEORIGIN
- X-XSS-Protection: 1; mode=block
- Referrer-Policy: strict-origin-when-cross-origin
- Content-Security-Policy (configurable)

### Session Security
- Secure cookie flag (auto-enabled in production)
- SameSite cookie attribute (lax)
- CSRF protection (tightened exemptions)

### Network Security
- SSL certificate verification in cURL requests
- HTTPS enforcement for session cookies

## Additional Resources

- [Laravel Security Best Practices](https://laravel.com/docs/10.x/security)
- [OWASP Top 10](https://owasp.org/www-project-top-ten/)
- [PHP Security Guide](https://www.php.net/manual/en/security.php)
- [InvoicePlane Community](https://community.invoiceplane.com/)

## Questions or Concerns?

If you have questions about security:
- Visit the [InvoicePlane Community Forums](https://community.invoiceplane.com/)
- Check the [Official Wiki](https://wiki.invoiceplane.com/)
- Join the [Slack Channel](https://invoiceplane-slack.herokuapp.com/)
