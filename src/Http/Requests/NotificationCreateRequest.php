<?php

namespace Casa\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Facilitador\Models\Notification;

class NotificationCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return app(Notification::class)->rules;
    }
}
