## ARTCC Management System

This system was developed and built by Matt Bozwood-Davies.

`git clone https://github.com/mbozwood/artcc_system.git`

CD into the drive, and run the following command(s):
 
`composer install`
 
`cp .env.example .env`

`php artisan key:generate`

Setup the DB connection in the `.env` file.

`php artisan migrate --seed`

`php artisan setup`

Ensure the IP is set in VATUSA Management before running any further commands. Most notably, `php artisan artcc:initroster`

Check the System Settings pages to finish setup.

Good to go.
