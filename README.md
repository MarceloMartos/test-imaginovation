## About this challenge

### Content

* Command: `App\Console\Commands\SendDailyEmails.php`
* Mail: `App\Mail\DailyEmail.php`
* Model: `App\Models\User.php`
* Factory: `Database\factories\UserFactory.php`
* Seeders: `Database\seeders\DatabaseSeeder.php`
* Email Resource: `Resources\views\emails\daily.blade.php`

### Instructions
* Configure .env with your local database and test mailer
* Run migrations `php artisan migrate`
* Run seeder `php artisan db:seed`
* Run worker `php artisan queue:work`
* Run schedule: `php artisan schedule:run`
* Enjoy this beautiful code made by Marcelo Martos
