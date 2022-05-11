# Laravel Blog

A simple `Laravel` blog, with a `TailwindCSS` front-end. Made as a hobby project and to understand the framework better. Features of the website:

- Named Resource Routes with included Authentication middleware
- Eloquent Database Models + One-To-Many Relationship linking.
- Laravel default User Authentication, stored in session state.
- Form input validation and HTML character escaping, to prevent XSS attacks.
- Makes use of MySQL, only run `php artisan migrate` to configure the database.
- Included [Laravel Telescope](https://laravel.com/docs/9.x/telescope) at `/telescope` for debugging purposes.
- Custom User Icons using [DiceBear Avatars](https://avatars.dicebear.com)

*Warning: this project is <u>NOT</u> production-ready. This is purely a personal project, any commercial use is at your own risk.*

### Prerequisites:
- Have `PHP` and `NodeJS` installed on your system, and accessible via your PATH.

### Getting up-and-running:

1. `git clone https://github.com/thimvanamersfoort/laravel-blog`.
2. `npm install` and `composer install` to install all dependencies to your local system.
3. Rename `.example.env` to `.env`, and run `php artisan key:generate`.
4. Create a local MySQL database called *laravel_test*, or change to your preferred options in the Environment Variables.
5. Run `php artisan vendor:publish` and `php artisan migrate` to set up your vendor packages and tables.

**To run your application:** `npm run dev`

---

You can log in with **admin** and password **12345**. You can also create your own user within *artisan tinker*:

```php
// use App\Models\User;

$user = new User();

// Required attributes:
$user->name = 'YOUR_USERNAME';
$user->email = 'YOUR_EMAIL@test.com';
$user->password = Hash::make('YOUR_PASSWORD');

// Optional attributes:
$user->is_admin = true;
$user->first_name = 'YOUR_FIRST_NAME';
$user->last_name = 'YOUR_LAST_NAME';

$user->save();
```

### Optional

To make use of [`Laravel Telescope`](https://laravel.com/docs/9.x/telescope), for an extended debugging toolset, run the following commands:

1. `php artisan vendor:publish`, and select the `telescope-*` tags.
2. `php artisan telescope:install`

Your telescope debugger is now available at `localhost[:port]/telescope`