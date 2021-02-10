<?php
/**
 * Um Evento INdividual
 * Identificador Unico para Estatisticas
 */

namespace Casa\Models\Governanca;

use Pedreiro\Models\Base as BaseModel;
use Facilitador\Services\Normalizer;
use Log;
use Illuminate\Database\Eloquent\SoftDeletes;
use Informate\Models\System\Archive;

class Rotulo extends BaseModel
{

    public $table = 'governanca_rotulos';

    public $incrementing = false;
    protected $casts = [
        'code' => 'string',
    ];
    protected $primaryKey = 'code';
    protected $keyType = 'string'; 



    protected $guarded = [];

    public $rules = [
        'code' => 'required',
    ];

    // protected $appends = [
    //     'translations',
    // ];

    protected $fillable = [
        'code',
        'name',
        'description',
        'published_at'
    ];
    public $formFields = [
        ['name' => 'name', 'label' => 'Name', 'type' => 'text'],
        ['name' => 'description', 'label' => 'Description', 'type' => 'textarea'],
        ['name' => 'date_estimated', 'label' => 'Data Estimada', 'type' => 'date'],
    ];
    public $indexFields = [
        'name',
        'description',
        'published_at'
    ];

    protected $dates = [
        'published_at' => 'Y-m-d H:i'
    ];

    // public function history()
    // {
    //     return Archive::where('entity_type', get_class($this))->where('entity_id', $this->id)->get();
    // }
}
