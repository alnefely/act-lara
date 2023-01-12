<?php

return [
    'accepted'             => ':attribute يجب قبوله.',
    'active_url'           => ':attribute ليس عنوان URL صالحًا.',
    'after'                => ':attribute يجب أن يكون تاريخ بعد :date.',
    'after_or_equal'       => ':attribute يجب أن يكون تاريخ بعد أو يساوي :date.',
    'alpha'                => ':attribute قد يحتوي على أحرف فقط.',
    'alpha_dash'           => ':attribute قد يحتوي فقط على أحرف وأرقام وشرطات.',
    'alpha_num'            => ':attribute قد يحتوي على أحرف وأرقام فقط.',
    'array'                => ':attribute يجب أن يكون مصفوفة.',
    'before'               => ':attribute يجب أن يكون تاريخ من قبل :date.',
    'before_or_equal'      => ':attribute يجب أن يكون تاريخًا قبل أو يساوي :date.',
    'between'              => [
        'numeric' => ':attribute يجب ان يكون بين :min و :max.',
        'file'    => ':attribute يجب ان يكون بين :min و :max كيلو بايت.',
        'string'  => ':attribute يجب ان يكون بين :min و :max الأحرف.',
        'array'   => ':attribute يجب ان يكون بين :min و :max العناصر.',
    ],
    'boolean'              => ':attribute يجب أن يكون الحقل صحيحًا أو خطأ.',
    'confirmed'            => ':attribute التأكيد غير متطابق.',
    'date'                 => ':attribute هذا ليس تاريخ صحيح.',
    'date_format'          => ':attribute لا يطابق التنسيق :format.',
    'different'            => ':attribute و :other يجب أن تكون مختلف.',
    'digits'               => ':attribute يجب أن يكون :digits أرقام.',
    'digits_between'       => ':attribute يجب أن يكون بين :min و :max أرقام.',
    'dimensions'           => ':attribute أبعاد الصورة غير صالحة.',
    'distinct'             => ':attribute الحقل له قيمة مكررة.',
    'email'                => ':attribute يجب أن يكون عنوان بريد إلكتروني صالح.',
    'phone'                => 'هاتفك ليس بالتنسيق الصحيح !.',
    'exists'               => 'المحدد :attribute غير صالح.',
    'file'                 => ':attribute يجب أن يكون ملف.',
    'filled'               => ':attribute يجب أن يكون للحقل قيمة.',
    'gt'                   => [
        'numeric' => ':attribute يجب أن يكون أكبر من :value.',
        'file'    => ':attribute يجب أن يكون أكبر من :value كيلو بايت.',
        'string'  => ':attribute يجب أن يكون أكبر من :value الأحرف.',
        'array'   => ':attribute يجب أن يكون لديك أكثر من :value العناصر.',
    ],
    'gte'                  => [
        'numeric' => ':attribute يجب أن يكون أكبر من أو يساوي :value.',
        'file'    => ':attribute يجب أن يكون أكبر من أو يساوي :value كيلو بايت.',
        'string'  => ':attribute يجب أن يكون أكبر من أو يساوي :value الأحرف.',
        'array'   => ':attribute يجب أن يكون :value عناصر أو أكثر.',
    ],
    'image'                => ':attribute يجب أن تكون صورة.',
    'in'                   => 'المحدد :attribute غير صالح.',
    'in_array'             => ':attribute الحقل غير موجود في :other.',
    'integer'              => ':attribute يجب أن يكون صحيحا.',
    'ip'                   => ':attribute يجب أن يكون عنوان IP صالحًا.',
    'ipv4'                 => ':attribute يجب أن يكون عنوان IPv4 صالحًا.',
    'ipv6'                 => ':attribute يجب أن يكون عنوان IPv6 صالحًا.',
    'json'                 => ':attribute يجب أن تكون سلسلة JSON صالحة.',
    'lt'                   => [
        'numeric' => ':attribute يجب أن يكون أقل من :value.',
        'file'    => ':attribute يجب أن يكون أقل من :value كيلو بايت.',
        'string'  => ':attribute يجب أن يكون أقل من :value الأحرف.',
        'array'   => ':attribute يجب أن يكون أقل من :value العناصر.',
    ],
    'lte'                  => [
        'numeric' => ':attribute يجب أن يكون أقل من أو يساوي :value.',
        'file'    => ':attribute يجب أن يكون أقل من أو يساوي :value كيلو بايت.',
        'string'  => ':attribute يجب أن يكون أقل من أو يساوي :value الأحرف.',
        'array'   => ':attribute يجب ألا يزيد عن :value العناصر.',
    ],
    'max'                  => [
        'numeric' => ':attribute يجب أن لا يكون أكبر من :max.',
        'file'    => ':attribute يجب أن لا يكون أكبر من :max كيلو بايت.',
        'string'  => ':attribute يجب أن لا يكون أكبر من :max حرف.',
        'array'   => ':attribute قد لا يكون لديه أكثر من :max العناصر.',
    ],
    'mimes'                => ':attribute يجب أن يكون الملف من نوع: :values.',
    'mimetypes'            => ':attribute يجب أن يكون ملف type: :values.',
    'min'                  => [
        'numeric' => ':attribute لا بد أن يكون على الأقل :min.',
        'file'    => ':attribute لا بد أن يكون على الأقل :min كيلو بايت.',
        'string'  => ':attribute لا بد أن يكون على الأقل :min حرف.',
        'array'   => ':attribute يجب أن يكون على الأقل :min العناصر.',
    ],
    'not_in'               => 'المحدد :attribute غير صالح.',
    'not_regex'            => ':attribute التنسيق غير صالح.',
    'numeric'              => ':attribute يجب أن يكون رقما.',
    'present'              => ':attribute يجب أن يكون الحقل موجودًا.',
    'regex'                => ':attribute التنسيق غير صالح.',
    'required'             => 'حقل :attribute مطلوب.',
    'required_if'          => ':attribute مطلوب الحقل عندما :other يكون :value.',
    'required_unless'      => ':attribute مطلوب حقل ما لم :other في داخل :values.',
    'required_with'        => ':attribute مطلوب الحقل عندما :values حاضر.',
    'required_with_all'    => ':attribute مطلوب الحقل عندما :values حاضر.',
    'required_without'     => ':attribute مطلوب الحقل عندما :values غير موجود.',
    'required_without_all' => ':attribute مطلوب الحقل عندما none of :values موجودة.',
    'same'                 => ':attribute و :other يجب أن تتطابق.',
    'size'                 => [
        'numeric' => ':attribute يجب أن يكون :size.',
        'file'    => ':attribute يجب أن يكون :size كيلو بايت.',
        'string'  => ':attribute يجب أن يكون :size الأحرف.',
        'array'   => ':attribute يجب أن يحتوي على :size العناصر.',
    ],
    'string'               => ':attribute يجب أن تكون سلسلة.',
    'timezone'             => ':attribute يجب أن تكون منطقة صالحة.',
    'unique'               => ':attribute موجود بالفعل.',
    'uploaded'             => ':attribute فشل التحميل يجب ان يكون حجم الملف لا يزيد عن 1 ميجابايت.',
    'url'                  => ':attribute التنسيق غير صالح.',
    'validate_nickname'    => 'يجب أن يكون هذا الحقل فقط. فقط استخدم a-z و 0-9.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
     */

    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
     */

    'attributes'           => [],

];
