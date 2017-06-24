## ARTCC Management System

This system was developed and built by Matt Bozwood-Davies.

`git clone https://github.com/mbozwood/artcc_system.git` or however you would like, as long as you link back. I prefer SSH keys myself.

CD into the drive, and run the following command(s):
 
`composer install`
 
`cp .env.example .env`

`php artisan key:generate`

Setup the DB connection in the `.env` file.

Good to go.