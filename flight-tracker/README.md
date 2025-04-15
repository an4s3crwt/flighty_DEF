# Flight Tracker

Laravel-based system for tracking flight schedules, statuses, and aircraft information.

## Features

- Flight details (callsign, status, aircraft)
- Departure/arrival tracking
- Aircraft registry
- Airport database
- Airline directory

## Setup

1. Clone the repository:

   git clone https://github.com/an4s3crwt/flighty_DEF.git

2. Install dependencies:

    cd flighty_DEF/flight-tracker
    composer install

3. Set up the .env file by copying the example:

    cp .env.example .env

4. Generate the application key:

    php artisan key:generate

5. Set up your database in .env

6. Run the migrations:

    php artisan migrate

7. Serve the application:

    php artisan serve


