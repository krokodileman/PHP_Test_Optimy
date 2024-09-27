<?php

namespace App\Models;

/**
 * libary to manage database connections
 */

use Illuminate\Database\Capsule\Manager;

class Database
{
    public function __construct(private Manager $manager) {}

    public function connection(array $connectData)
    {
        /** Call to regster a connection*/
        $this->manager->addConnection($connectData);

        /** init db connection */
        $this->manager->bootEloquent();
    }
}
