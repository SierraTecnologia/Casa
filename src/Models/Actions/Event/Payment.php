<?php
/**
 * Armazena os tipos de pagamentos que fazem com cada moeda e suas taxas
 */

namespace Casa\Models\Actions\Event;

use Illuminate\Support\Facades\Hash;

use Casa\Models\Model;
class Payment  extends Model
{


    public function createByType()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'id');
    }
}