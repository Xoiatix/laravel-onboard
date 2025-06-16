# Laravel package to help track onboarding steps.

## Installation

You can install the package via composer:

```bash
composer require xoiatix/laravel-onboard
```

## Usage

Add the `Xoiatix\Onboard\Concerns\Onboardable` interface and `Xoiatix\Onboard\Concerns\Onboard` trait to your desired models.

```php
...
use Xoiatix\Onboard\Concerns\Onboardable;
use Xoiatix\Onboard\Concerns\Onboard;
...

class User extends Model implements Onboardable
{
    use Onboard;
    ...
```

### Configuration

You can configure your onboarding steps by using the `Xoiatix\Onboard\Facades\Onboard` facade. Use the default `App\Providers\AppServiceProvider.php` or create a new service provider.

```php
...
use App\Models\User;
use Xoiatix\Onboard\Facades\Onboard;
...

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Onboard::register(
            model: User::class, 
            route: 'onboarding.name', 
            validate: fn (User $model) => ! empty($model->name) 
        );
        
        Onboard::register(
            model: User::class, 
            route: 'onboarding.username', 
            validate: fn (User $model) => ! empty($model->username) 
        );

    }
}
```

### Middleware

Create a new middleware and extend the abstract `Xoiatix\Onboard\Middleware` class.

```php
use Illuminate\Http\Request;
use Xoiatix\Onboard\Concerns\Onboardable;
use Xoiatix\Onboard\Middleware;

class UserOnboarding extends Middleware
{
    /**
     * Get the onboardable model.
     *
     * @param Request $request
     * @return Onboardable|null
     */
    protected function uses(Request $request): ? Onboardable
    {
        return $request->user();
    }
}
```

#### Default Route

By default, the `Xoiatix\Onboard\Middleware` class defines the default route `home` to redirect users too, if the onboarding is complete and a step route is accessed. This can be customised by adding the `defaultRoute` method to your middleware.

```php
/**
 * Get the default route.
 *
 * @return string
 */
protected function defaultRoute(): string
{
    return 'home';
}
```

#### Ignore Routes

You can define routes to be ignored by adding the `ignoreRoutes` method. This is useful if you have registered your middleware via the `bootstrap/app.php` configuration and want to ignore the `logout` route for example.

```php
/**
 * Get the ignore routes.
 *
 * @return array
 */
protected function ignoreRoutes(): array
{
    return ['logout'];
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information.

## Security

If you discover a security vulnerability, please raise a GitHub [issue](https://github.com/xoiatix/laravel-onboard/issues).

## License

The MIT License (MIT).

Please see [License File](LICENSE.md) for more information.
