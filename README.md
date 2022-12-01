# IvvyTask #

IvvyTask is build on Laravel9/Vue3 and has a sole purpose. To manage your addresses

## Dependencies ##

* PHP 8.0.2
* node v16.16.0
* npm 8.11.0

### Packages ###

#### Fortify ####
Laravel Fortify is a frontend agnostic authentication backend implementation for Laravel. Fortify registers the routes and controllers needed to implement all of Laravel's authentication features, including login, registration, password reset, email verification, and more. After installing Fortify, you may run the following command to see the routes that Fortify has registered.
```
php artisan route:list
```


#### Sanctum ###
Laravel Sanctum provides a featherweight authentication system for SPAs, mobile applications, and simple, token based APIs. Sanctum allows each user of your application to generate multiple API tokens for their account. These tokens may be granted abilities / scopes which specify which actions the tokens are allowed to perform.

How It Works
Laravel Sanctum exists to solve two separate problems. Let's discuss each before digging deeper into the library.

API Tokens
First, Sanctum is a simple package you may use to issue API tokens to your users without the complication of OAuth. This feature is inspired by GitHub and other applications which issue "personal access tokens". For example, imagine the "account settings" of your application has a screen where a user may generate an API token for their account. You may use Sanctum to generate and manage those tokens. These tokens typically have a very long expiration time (years), but may be manually revoked by the user at anytime.

Laravel Sanctum offers this feature by storing user API tokens in a single database table and authenticating incoming HTTP requests via the Authorization header which should contain a valid API token.

SPA Authentication
Second, Sanctum exists to offer a simple way to authenticate single page applications (SPAs) that need to communicate with a Laravel powered API. These SPAs might exist in the same repository as your Laravel application or might be an entirely separate repository, such as a SPA created using Vue CLI or a Next.js application.

For this feature, Sanctum does not use tokens of any kind. Instead, Sanctum uses Laravel's built-in cookie based session authentication services. Typically, Sanctum utilizes Laravel's web authentication guard to accomplish this. This provides the benefits of CSRF protection, session authentication, as well as protects against leakage of the authentication credentials via XSS.

Sanctum will only attempt to authenticate using cookies when the incoming request originates from your own SPA frontend. When Sanctum examines an incoming HTTP request, it will first check for an authentication cookie and, if none is present, Sanctum will then examine the Authorization header for a valid API token.

#### Vitest, jsdom, mitt ####

- Vitetest is the "built in" testing framework for vite applications
- Jsdom lets vitetest run in a browser environment rather than it's default node environment
- Mitt to impliment an eventbus

## Setup ##

The .env file and sqlite files have been included in the repository since it will never be in production and it makes setup easier

first run
```
$ composer install
```
then
```
$ npm install
```

Now you can run the Laravel and Vue Dev servers

```
$ php artisan serve
```
```
$ npm run dev
```

You can now access the application on localhost:8000

### Testing ###

There are two sets of tests. One set for the backend and one for the frontend.

For tests to run, both the Laravel and Vue dev servers need to be running

To run the backend tests
```
php artisan test
```

To run the frontend tests
```
npm run test:unit
```

The tests are fairly elementary, since I haven't used either of these testing frameworks before. Vitest is immensely powerful and I will be continuing to work on this project to learn to mock API calls and to use other features to test frontend components that it offers