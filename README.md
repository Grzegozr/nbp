# NBP API
## DEV usage on Docker

Clone repo from GitHub.

`git clone git@github.com:Grzegozr/nbp.git`

Go to installation folder.

`cd nbp`

Install composer dependencies.

`
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
`

Create .env file from example

`cp .env.example .env`

Run project.

`vendor/bin/sail up -d`

Generate new Key.

`vendor/bin/sail artisan key:generate`

Run DB migrations

`vendor/bin/sail artisan migrate`

Install NPM dependencies.

`vendor/bin/sail npm install`

Compile JS.

`vendor/bin/sail npm run dev`

Your project is available on`localhost`.
