## Installation

Follow the instructions below to install the app.

### Clone the repo use ssh

Run the following command in your terminal:

```
git clone git@github.com:zin-min-thu/E-Com.git
```

*Note: Prefer to use SSH. Ask your project maintainer if you need to submit your public key.*

### Clone the repo use HTTPS

Run the following command in your terminal:

```
git clone https://github.com/zin-min-thu/E-Com.git
```
### Install dependencies

Laravel use Composer to manage package dependencies. Make sure your development machine has Composer installed.

Go to your project root folder and run the following command:

```
composer install
```

### Create a local env file

To create a local env file, make a copy from example env file:

```
cp .env.example .env
```

Then update the config settings for database connection.

### Migrate the database

Make sure your database connection settings are valid.

Run the following command to create the database for the app:

```
php artisan migrate
```

After this point the app should be running from your web server. But you will not be able to use the app because there is no user to log in to the app.

Run the following command to create the default admin:

```
php artisan db:seed --class=AdminsTableSeeder
```

Use the following credentials to log in to the app:

| username               | password |
|------------------------|----------|
| admin@gmail.com        | 123456   |

### Configure mail

The app uses Mailtrap for local developement. You may need to configure Laravel Mail with your Mailtrap account. To create an account, go to https://mailtrap.io.
