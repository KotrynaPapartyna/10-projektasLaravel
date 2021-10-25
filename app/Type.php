<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Type extends Model
{
    //public function typeTask () {
        //return $this->belongsTo(Task::class, 'task_id', 'id');
    ///}

    use Sortable;

    // nustatoma kuri lentele bus rikiuojama. kintamieji- galioja tik modelyje, yra bibliotekos
    protected $table="types";

    //nurodomi kintamieji, kurie gali buti pildomi nauja informacija
    protected $fillable=["title", "description"];

    // nurodomi visi stulpeliai kuriuo norima rikiuoti
    public $sortable= ["id", "title", "description"];
}

