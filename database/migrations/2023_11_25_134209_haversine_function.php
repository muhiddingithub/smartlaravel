<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $haversineSql = <<<SQL
CREATE OR REPLACE FUNCTION haversine(
    lat1 DOUBLE PRECISION,
    lon1 DOUBLE PRECISION,
    lat2 DOUBLE PRECISION,
    lon2 DOUBLE PRECISION
) RETURNS DOUBLE PRECISION AS $$
DECLARE
    R DOUBLE PRECISION := 6371000; -- Earth radius in meters
    dLat DOUBLE PRECISION := RADIANS(lat2 - lat1);
    dLon DOUBLE PRECISION := RADIANS(lon2 - lon1);
    a DOUBLE PRECISION :=
        SIN(dLat / 2) * SIN(dLat / 2) +
        COS(RADIANS(lat1)) * COS(RADIANS(lat2)) *
        SIN(dLon / 2) * SIN(dLon / 2);
    c DOUBLE PRECISION := 2 * ATAN2(SQRT(a), SQRT(1 - a));
    distance DOUBLE PRECISION := R * c;
BEGIN
    RETURN distance;
END;
$$ LANGUAGE plpgsql;
SQL;
        \Illuminate\Support\Facades\DB::unprepared($haversineSql);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
