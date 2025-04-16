<?php
namespace App\Console\Commands;

use App\Models\Aircraft;
use App\Models\Flight;
use App\Models\FlightPosition;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class FetchOpenSkyData extends Command
{
    protected $signature = 'fetch:opensky';
    protected $description = 'Fetch live data from OpenSky Network and store it';

    public function handle()
    {
        $this->info('Fetching data from OpenSky...');

        // Use cURL to fetch the data from OpenSky
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://opensky-network.org/api/states/all");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);

        if (!$json) {
            $this->error('❌ No se pudo obtener datos de OpenSky');
            return;
        }

        $data = json_decode($json, true);

        if (!isset($data['states']) || !is_array($data['states'])) {
            $this->error('❌ Formato de datos inválido');
            return;
        }

        foreach ($data['states'] as $state) {
            // Map OpenSky data to local fields
            $icao24 = $state[0];                 // ICAO 24-bit address
            $callsign = trim($state[1] ?? '');   // Flight callsign (may be empty)
            $origin_country = $state[2] ?? '';   // Country of origin
            $timestamp = $state[4] ?? now()->timestamp; // Timestamp (use current if missing)
            $longitude = $state[5] ?? null;      // Longitude
            $latitude = $state[6] ?? null;       // Latitude
            $altitude = $state[7] ?? 0;       // Altitude
            $velocity = $state[9] ?? null;       // Velocity (m/s)
            $heading = $state[10] ?? null;       // Heading (degrees)

            // Default values for missing data fields
            $registration = '';                  // Default empty registration
            $model = 'Unknown';                  // Default model value
            $manufacturer = 'Unknown';           // Default manufacturer value
            $airline_icao = '';                  // Default empty airline ICAO code
            $country = $origin_country ?: 'Unknown'; // Default country if not provided

            if (!$icao24 || !$latitude || !$longitude) {
                continue; // Skip incomplete data
            }

            // Step 1: Aircraft (create or update based on icao24)
            $aircraft = Aircraft::updateOrCreate(
                ['icao24' => $icao24],
                [
                    'callsign' => $callsign,
                    'country' => $country,
                    'registration' => $registration,
                    'model' => $model,
                    'manufacturer' => $manufacturer,
                    'airline_icao' => $airline_icao
                ]
            );

            // Step 2: Flight (create or update flight record based on callsign)
            $flight = Flight::firstOrCreate(
                [
                    'aircraft_icao' => $icao24,
                    'callsign' => $callsign,
                    'scheduled_departure' => Carbon::createFromTimestamp($timestamp)->startOfHour(),
                    'status' => '',  // Default status (can be updated later)
                    'departure_airport' => '',  // Default airport (can be updated later)
                    'arrival_airport' => ''   // Default airport (can be updated later)
                ]
            );

            // Step 3: FlightPosition (create a new position record for each update)
            FlightPosition::create([
                'flight_id' => $flight->flight_id,
                'timestamp' => Carbon::createFromTimestamp($timestamp),
                'latitude' => $latitude,
                'longitude' => $longitude,
                'altitude' => $altitude,
                'speed' => $velocity,  // Changed from velocity to speed (check your DB schema)
                'heading' => $heading,
            ]);
        }

        Cache::put("flight:{$icao24}", [
            'latitutde' => $latitude,
            'longitude' => $longitude,
            'altitude' => $altitude,
            'speed' => $velocity,
            'heading' => $heading,
            'timestamp' => $timestamp,
        ], now()->addMinutes(5)); //esto guarda la última posición en redis


        $this->info('✅ Datos importados correctamente.');
    }
}
