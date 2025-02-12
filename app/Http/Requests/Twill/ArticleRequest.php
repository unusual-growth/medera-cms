<?php

namespace App\Http\Requests\Twill;

use A17\Twill\Http\Requests\Admin\Request;

class ArticleRequest extends Request
{
    public function rulesForCreate()
    {
        
        return $this->rulesForTranslatedFields(
            [
            

            ],
            [
                "title" => "required",
            ]
        );
    }

    public function rulesForUpdate()
    {
        return $this->rulesForTranslatedFields(
            [
                "medias.library-image" => "required",
            ],
            [
                "title" => "required",
                "description" => "required|min:50",
            ]
        );
    }

    public function messages()
    {
        $fields =  [
            'medias.library-image' => 'required',
            "title" => "required",
            "description" => "required|min:50",   
       ];

        $messages =  [
            'title.required' => "The title is required",
            'medias.library-image.required' => "Image is required",
            'description.required' => "The description is required",
            'description.min:50' => "The description lenght should be at least 50 characters",
        ];

        return $this->messagesForTranslatedFields($messages, $fields);
    }
}
