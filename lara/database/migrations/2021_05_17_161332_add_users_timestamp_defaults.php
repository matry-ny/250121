<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddUsersTimestampDefaults extends Migration
{
    public function up()
    {
        $sql = <<<SQL
            ALTER TABLE `users`
                MODIFY `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                MODIFY `updated_at` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP
        SQL;

        DB::statement($sql);
    }

    public function down()
    {
        return true;
    }
}
