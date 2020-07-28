<?php
/**
 * Armazena os tipos de pagamentos para moedas fiat
 */

namespace Casa\Models\Finance\Money;

use Illuminate\Support\Facades\Hash;
use Muleta\Traits\Models\EloquentGetTableNameTrait;
use App\Models\Model;

class PaymentCryptoType extends Model
{
    use EloquentGetTableNameTrait;

    protected static $organizationPerspective = false;
}