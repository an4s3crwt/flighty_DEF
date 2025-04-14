# Flight Tracker System

A Laravel-based flight tracking system to monitor flight schedules, statuses, departures, arrivals, and aircraft information.

## Features

- **Flight Management**:
  - Track flight details (callsign, status, aircraft)
  - Monitor departure/arrival airports and scheduled times
- **Departures & Arrivals**:
  - Real-time status tracking
  - Schedule monitoring
- **Aircraft Registry**:
  - ICAO codes, registration details
  - Model and manufacturer information
- **Airport Database**:
  - ICAO/IATA codes
  - Location data and timezones
- **Airline Directory**:
  - Comprehensive airline details

## 🚀 Installation

### Prerequisites
- PHP 8.0+
- Composer
- MySQL/SQLite

### Setup Steps

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


