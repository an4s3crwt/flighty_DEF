# Flight Tracker System

A simple flight tracker system built with Laravel to track flight schedules, statuses, departures, arrivals, and aircraft information.

## Features

- **Flights**: Track flight details including callsign, status, aircraft, departure and arrival airports, and scheduled times.
- **Departures**: Track flights' scheduled departure times and status.
- **Arrivals**: Track flights' scheduled arrival times and status.
- **Aircraft**: Store and track aircraft details like ICAO code, registration, model, and manufacturer.
- **Airports**: Track airport details including ICAO, IATA code, location, and timezone.
- **Airlines**: Store and track airline details.

## Installation

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

## Models

Flight: Interacts with the flights table.

Departure: Interacts with the departures table.

Arrival: Interacts with the arrivals table.

Aircraft: Interacts with the aircraft table.

Airport: Interacts with the airports table.

Airline: Interacts with the airlines table.


:3