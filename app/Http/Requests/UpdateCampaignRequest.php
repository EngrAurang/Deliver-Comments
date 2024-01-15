<?php

namespace App\Http\Requests;

use App\Models\Campaign;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCampaignRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('campaign_edit');
    }

    public function rules()
    {
        return [
            'domain' => [
                'string',
                'required',
            ],
            'deliver_comments' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'keyword' => [
                'string',
                'nullable',
            ],
            'message' => [
                'string',
                'nullable',
            ],
        ];
    }
}
