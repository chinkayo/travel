<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMtbmasterTable extends Migration
{
    private $mtb_master_table=[
        "mtb_event_statuses"=>[
            [
                "id"=>1,
                "value"=>"申し込み前",
                "rank"=>1
            ],
            [
                "id"=>2,
                "value"=>"申し込み受付中",
                "rank"=>2
            ],
            [
                "id"=>3,
                "value"=>"人数達成",
                "rank"=>3
            ],
            [
                "id"=>4,
                "value"=>"人数不足キャンセル",
                "rank"=>4
            ],
            [
                "id"=>5,
                "value"=>"途中キャンセル",
                "rank"=>5
            ]
        ],
        "mtb_application_statuses"=>[
            [
                "id"=>1,
                "value"=>"審査待ち",
                "rank"=>1
            ],
            [
                "id"=>2,
                "value"=>"審査通過",
                "rank"=>2
            ],
            [
                "id"=>3,
                "value"=>"審査落ち",
                "rank"=>3
            ]
        ],
        "mtb_user_statuses"=>[
            [
                "id"=>1,
                "value"=>"メール承認待ち",
                "rank"=>1
            ],
            [
                "id"=>2,
                "value"=>"本会員",
                "rank"=>2
            ],
            [
                "id"=>3,
                "value"=>"退会済み",
                "rank"=>3
            ]
        ],
        "mtb_event_types"=>[
            [
                "id"=>1,
                "value"=>"女子会",
                "rank"=>1
            ],
            [
                "id"=>2,
                "value"=>"登山",
                "rank"=>2
            ],
            [
                "id"=>3,
                "value"=>"飲み会",
                "rank"=>3
            ],
            [
                "id"=>4,
                "value"=>"花火大会",
                "rank"=>4
            ],
            [
                "id"=>5,
                "value"=>"海外旅行",
                "rank"=>5
            ],
            [
                "id"=>6,
                "value"=>"花見",
                "rank"=>6
            ]
        ],
        "mtb_areas"=>[
            [
                "id"=>1,
                "value"=>"北海道",
                "rank"=>1
            ],
            [
                "id"=>2,
                "value"=>"東北",
                "rank"=>2
            ],
            [
                "id"=>3,
                "value"=>"関東",
                "rank"=>3
            ],
            [
                "id"=>4,
                "value"=>"中部",
                "rank"=>4
            ],
            [
                "id"=>5,
                "value"=>"近畿",
                "rank"=>5
            ],
            [
                "id"=>6,
                "value"=>"中国",
                "rank"=>6
            ],
            [
                "id"=>7,
                "value"=>"四国",
                "rank"=>7
            ],
            [
                "id"=>8,
                "value"=>"九州沖縄",
                "rank"=>8
            ]
        ]
    ];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->mtb_master_table as $table_name => $record){
            Schema::create($table_name, function (Blueprint $table) {
                $table->charset='utf8';
                $table->collation='utf8_general_ci';
                $table->increments('id');
                $table->text('value');
                $table->integer('rank');
                
            });
            DB::table($table_name)->insert($record);
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->mtb_master_table as $table_name => $value){
            Schema::dropIfExists($table_name);
        }
        
    }
}
