<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Task extends Model
{

    use Sortable;

    // nustatoma kuri lentele bus rikiuojama. kintamieji- galioja tik modelyje, yra bibliotekos
    protected $table="tasks";

    //nurodomi kintamieji, kurie gali buti pildomi nauja informacija
    protected $fillable=["title", "description", "type_id"];

    // nurodomi visi stulpeliai kuriuo norima rikiuoti
    public $sortable= ["id", "title", "description", "type_id"];



    public function taskType() {
        return $this->belongsTo(Type::class, "type_id", "id");

    }

    public function taskOwner() {
        return $this->belongsTo(Owner::class, "owner_id", "id");

    }

}

