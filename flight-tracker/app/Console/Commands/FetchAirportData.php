<?php 

namespace App\Console\Commands;

use App\Models\Airport;
use Illuminate\Console\Command;

class FetchAirportData extends Command  {
    protected $signature = 'fetch:airports';
    protected $description = 'Fecth live airport data and store it in the database';

    public function handle(){
        $this->info('Fetching airport data...');


        //usar curl también
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://opensky-network.org/api/airports"); // Aquí deberías poner la URL correcta para los aeropuertos si está disponible
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        
        if (!$json) {
            $this->error('❌ No se pudo obtener datos de aeropuertos');
            return;
        }

        $data = json_decode($json, true);

        if (!isset($data['airports']) || !is_array($data['airports'])) {
            $this->error('❌ Formato de datos inválido');
            return;
        }

        // Iterar sobre los aeropuertos y almacenar en la base de datos
        foreach ($data['airports'] as $airport) {
            $icao = $airport['icao'] ?? null;
            $name = $airport['name'] ?? null;
            $country = $airport['country'] ?? null;

            // Si los datos del aeropuerto no están completos, continuar con el siguiente
            if (!$icao || !$name || !$country) {
                continue;
            }

            // Crear o actualizar el aeropuerto en la base de datos
            Airport::updateOrCreate(
                ['icao' => $icao],
                [
                    'name' => $name,
                    'country' => $country
                ]
            );
        }

        $this->info('✅ Datos de aeropuertos importados correctamente.');
    }
}