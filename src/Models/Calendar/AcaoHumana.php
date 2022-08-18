<?php
/**
 * Um Evento INdividual
 * Identificador Unico para Estatisticas
 */

namespace Casa\Models\Calendar;

use Pedreiro\Models\Base as BaseModel;
use Facilitador\Services\Normalizer;
use Log;
use Illuminate\Database\Eloquent\SoftDeletes;
use Informate\Models\System\Archive;

class AcaoHumana extends BaseModel
{
    use \Telefonica\Traits\HasMetrics;

    public $table = 'acao_humanas';

    public $incrementing = false;
    protected $casts = [
        'fingerprint' => 'string',
    ];
    protected $primaryKey = 'fingerprint';
    protected $keyType = 'string'; 



    protected $guarded = [];

    public $rules = [
        'fingerprint' => 'required',
    ];

    // protected $appends = [
    //     'translations',
    // ];

    protected $fillable = [
        'name',
        'start_init',
        'people_slug',
        'title',
        'details',
        'seo_description',
        'seo_keywords',
        'is_published',
        'fingerprint',
        'template',
        'published_at',
    ];
    public $formFields = [
        ['name' => 'name', 'label' => 'Name', 'type' => 'text'],
        ['name' => 'description', 'label' => 'Description', 'type' => 'textarea'],
    ];
    public $indexFields = [
        'name',
        'description',
    ];

    protected $dates = [
        'published_at' => 'Y-m-d H:i'
    ];

    public function __construct(array $attributes = [])
    {
        $keys = array_keys(request()->except('_method', '_token'));
        $this->fillable(array_values(array_unique(array_merge($this->fillable, $keys))));
        parent::__construct($attributes);
    }
    
    public function getDetailsAttribute($value)
    {
        return new Normalizer($value);
    }

    public function history()
    {
        return Archive::where('entity_type', get_class($this))->where('entity_id', $this->id)->get();
    }
}
