<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ServiceSeeder::class,
            SubServiceSeeder::class,
            ClientSeeder::class,
            MakeSeeder::class,
            VehicleModelSeeder::class,
            VehicleSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            ProductRatingSeeder::class,
            OrderSeeder::class,
            OrderProductSeeder::class,
            RecordSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            AddressSeeder::class,
            BookingSeeder::class,
            InventorySeeder::class,
            NotificationSeeder::class,
            DeliverySeeder::class,
        ]);
    }
}
