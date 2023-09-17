<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateSelectPaymentsProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE PROCEDURE SelectPayments(
                IN p_user_id BIGINT(20),
                IN p_min_total INT(11),
                IN p_max_total INT(11),
                IN p_start_date DATE,
                IN p_end_date DATE
            )
            BEGIN
                SET @sqlQuery = CONCAT("SELECT * FROM payments WHERE 1 = 1");
                IF p_user_id IS NOT NULL AND p_user_id != "" THEN
                    SET @sqlQuery = CONCAT(@sqlQuery, " AND fk_id_user = ", p_user_id);
                END IF;
                IF p_min_total IS NOT NULL AND p_min_total != "" THEN
                    SET @sqlQuery = CONCAT(@sqlQuery, " AND total >= ", p_min_total);
                END IF;

                IF p_max_total IS NOT NULL AND p_max_total != "" THEN
                    SET @sqlQuery = CONCAT(@sqlQuery, " AND total <= ", p_max_total);
                END IF;

                IF p_start_date IS NOT NULL AND p_start_date != "" THEN
                    SET @sqlQuery = CONCAT(@sqlQuery, " AND created_at >= ", p_start_date);
                END IF;

                IF p_end_date IS NOT NULL AND p_end_date != "" THEN
                    SET @sqlQuery = CONCAT(@sqlQuery, " AND created_at <= ", p_end_date);
                END IF;

                PREPARE finalQuery FROM @sqlQuery;
                EXECUTE finalQuery;
                DEALLOCATE PREPARE finalQuery;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS SelectPayments');
    }
}
