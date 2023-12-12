# Permission Editor
---
This is a package that gives a UI to manage the roles and permissions for Spatie Laravel Permission
## How to use
  1. Make sure to install the spatie/laravelk-permission package and configure it
  2. Run composer install ngalso/permission-editor
  3. Run ```php artisan vendor:publish --provider="Ngalso\PermissionEditor\PermissionEditorServiceProvider"``` to publish the assets and Config
  4. Launch ```/permission-editor/roles``` in your browser

*Notice*: you may want to secure the routes by adding "auth" middleware to the published config file ```config/permission-editor.php```
