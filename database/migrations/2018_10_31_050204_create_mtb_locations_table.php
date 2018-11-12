<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtbLocationsTable extends Migration
{
    private $mtb_locations = [
        [
            "id"=> 1,
            "value"=>"札幌市",
            "rank"=>1,
            "area_id"=>1
        ],
        [
            "id"=> 2,
            "value"=>"函館市",
            "rank"=>2,
            "area_id"=>1
        ],
        [
            "id"=> 3,
            "value"=>"仙台市",
            "rank"=>3,
            "area_id"=>2
        ],
        [
            "id"=> 4,
            "value"=>"青森市",
            "rank"=>4,
            "area_id"=>2
        ],
        [
            "id"=> 5,
            "value"=>"東京",
            "rank"=>5,
            "area_id"=>3
        ],
        [
            "id"=> 6,
            "value"=>"横浜市",
            "rank"=>6,
            "area_id"=>3
        ],
        [
            "id"=> 7,
            "value"=>"名古屋市",
            "rank"=>7,
            "area_id"=>4
        ],
        [
            "id"=> 8,
            "value"=>"静岡市",
            "rank"=>8,
            "area_id"=>4
        ],
        [
            "id"=> 9,
            "value"=>"大阪市",
            "rank"=>9,
            "area_id"=>5
        ],
        [
            "id"=> 10,
            "value"=>"京都",
            "rank"=>10,
            "area_id"=>5
        ],
        [
            "id"=> 11,
            "value"=>"広島市",
            "rank"=>11,
            "area_id"=>6
        ],
        [
            "id"=> 12,
            "value"=>"岡山市",
            "rank"=>12,
            "area_id"=>6
        ],
        [
            "id"=> 13,
            "value"=>"高松市",
            "rank"=>13,
            "area_id"=>7
        ],
        [
            "id"=> 14,
            "value"=>"松山市",
            "rank"=>14,
            "area_id"=>7
        ],
        [
            "id"=> 15,
            "value"=>"那覇市",
            "rank"=>15,
            "area_id"=>8
        ],
        [
            "id"=> 16,
            "value"=>"熊本市",
            "rank"=>16,
            "area_id"=>8
        ]
    ];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('mtb_locations', function (Blueprint $table) {
                $table->charset='utf8';
                $table->collation='utf8_general_ci';
                $table->increments('id');
                $table->text('value');
                $table->integer('rank');
                $table->integer('area_id')->unsigned();
                $table->foreign('area_id')->references('id')->on('mtb_areas');
            });
            foreach ($this->mtb_locations as $record) {
                DB::table('mtb_locations')->insert($record);
            }
            
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mtb_locations');
    }
}
