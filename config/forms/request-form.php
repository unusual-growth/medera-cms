<?php

use A17\Twill\Models\User;

return [
  'class' => 'create-request',
  "title" => [
    "type" => "h2",
    "content" => "util.form.createrequest",
  ],
  'inputs' => [
    [
        'type' => 'hidden',
        "input_id"=>"zc_gad",
        "input_name"=>"zc_gad",
        'value' => '',
    ],
    [
          'type' => 'text',
          'input_name' => 'name',
          // 'label' => 'Social Media Name',
          // 'model' => '',
          'placeholder' => 'util.form.name',
          'class' => 'input-container ',
          'props' => 'required',
          "hasParent" => false,
          'col' => [ //optional default is 12
            'default' => 12, //required if col is used
            'xs' => 12, //required if col is used
            'sm' => 12, //required if col is used
            'md' => 12, //required if col is used
            'lg' => 12, //required if col is used
            'xl' => 12, //required if col is used
            'xxl' => 12,  //required if col is used
          ],
        ],
        [
          'type' => 'text',
          'input_name' => 'surname',
          // 'label' => 'Social Media Name',
          // 'model' => '',
          'placeholder' => 'util.form.surname',
          'class' => 'input-container ',
          'props' => 'required',
          "hasParent" => false,
          'col' => [
            'default' => 12,
            'xs' => 12,
            'sm' => 12,
            'md' => 12,
            'lg' => 12,
            'xl' => 12,
            'xxl' => 12,
          ],
        ],
        [
          'type' => 'email',
          'input_name' => 'email',
          // 'label' => 'Social Media Name',
          // 'model' => '',
          'placeholder' => 'util.form.email',
          'class' => '',
          'props' => 'required ',
          "hasParent" => false,
          'col' => [
            'default' => 12,
            'xs' => 12,
            'sm' => 12,
            'md' => 12,
            'lg' => 12,
            'xl' => 12,
            'xxl' => 12,
          ]
        ],
        [
          'type' => 'phone',
          'input_name' => 'phone',
          // 'label' => 'Social Media Name',
          // 'model' => '',
          'placeholder' => 'util.form.phone',
          'class' => '',
          'props' => 'required',
          "hasParent" => false,
          'col' => [
            'default' => 12,
            'xs' => 12,
            'sm' => 12,
            'md' => 12,
            'lg' => 12,
            'xl' => 12,
            'xxl' => 12,
          ]
        ],
        [
            'type' => 'text',
            'input_name' => 'company',
            // 'label' => 'Social Media Name',
            // 'model' => '',
            'placeholder' => 'util.form.company',
            'class' => 'input-container ',
            'props' => 'required',
            "hasParent" => false,
            'col' => [ //optional default is 12
              'default' => 12, //required if col is used
              'xs' => 12, //required if col is used
              'sm' => 12, //required if col is used
              'md' => 12, //required if col is used
              'lg' => 12, //required if col is used
              'xl' => 12, //required if col is used
              'xxl' => 12,  //required if col is used
            ],
          ],
    [
      'type' => 'button',
      'button_type' => 'button',
      'input_name' => 'btn_submit',
      // 'placeholder' => '',
      // 'model' => '', //Where user should decide which model supposed to used ?
      'class' => ' peach-cta',
      'text' => 'util.form.createrequest',
    ],
    [
      'type' => 'checkbox',
      'input_name' => 'privacy_policy_request',
      'label' => 'util.form.labels.privacy_policy',
      // 'model' => '',
      'class' => 'unusual-checkbox',
      'props' => 'required',
    ],
  ]
];
