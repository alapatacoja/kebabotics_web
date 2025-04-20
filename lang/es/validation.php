<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | El campo following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El campo :attribute debe estar aceptado.',
    'accepted_if' => 'El campo :attribute debe estar aceptado cuando :other sea :value.',
    'active_url' => 'El campo :attribute debe ser una URL válida.',
    'after' => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El campo :attribute debe contener letras únicamente.',
    'alpha_dash' => 'El campo :attribute debe contener letras, número, guiones y guiones bajos.',
    'alpha_num' => 'El campo :attribute debe contener únicamente letras y números.',
    'array' => 'El campo :attribute debe ser un array.',
    'ascii' => 'El campo :attribute solo debe contener caracteres alfanuméricos y símbolos de un solo byte.',
    'before' => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'array' => 'El campo :attribute debe estar entre :min y :max.',
        'file' => 'El campo :attribute debe estar entre :min y :max kilobytes.',
        'numeric' => 'El campo :attribute debe estar entre :min y :max.',
        'string' => 'El campo :attribute debe estar entre :min y :max caracteres.',
    ],
    'boolean' => 'El campo :attribute debe ser true o false.',
    'confirmed' => 'La confirmación del campo :attribute no coincide.',
    'current_password' => 'El campo contraseña es incorrecto.',
    'date' => 'El campo :attribute debe ser una fecha válida.',
    'date_equals' => 'El campo :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El campo :attribute debe coincidir con el formato :format.',
    'decimal' => 'El campo :attribute debe tener :decimal números decimales.',
    'declined' => 'El campo :attribute debe ser rechazado.',
    'declined_if' => 'El campo :attribute debe ser rechazado cuando :other sea :value.',
    'different' => 'El campo :attribute y :other deben ser diferentes.',
    'digits' => 'El campo :attribute debe tener :digits dígitos.',
    'digits_between' => 'El campo :attribute debe tener entre :min y :max dígitos.',
    'dimensions' => 'El campo :attribute tiene dimensiones de imagen no válidas.',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'doesnt_end_with' => 'El campo :attribute no debe terminar con uno de los siguientes: :values.',
    'doesnt_start_with' => 'El campo :attribute no debe comenzar con uno de los siguientes: :values.',
    'email' => 'El campo :attribute debe ser una dirección de correo válida.',
    'ends_with' => 'El campo :attribute debe acabar con uno de los siguientes: :values.',
    'enum' => 'El campo seleccionado :attribute no es válido.',
    'exists' => 'El campo selected :attribute no es válido.',
    'file' => 'El campo :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe tener un valor.',
    'gt' => [
        'array' => 'El campo :attribute debe tener más de :value valores.',
        'file' => 'El campo :attribute debe ser mayor que :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser mayor que :value.',
        'string' => 'El campo :attribute debe ser mayor que :value caracteres.',
    ],
    'gte' => [
        'array' => 'El campo :attribute debe tener :value valores o más.',
        'file' => 'El campo :attribute debe ser mayor o igual que :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser mayor o igual que to :value.',
        'string' => 'El campo :attribute debe ser mayor o igual que :value caracteres.',
    ],
    'image' => 'El campo :attribute debe ser una imagen.',
    'in' => 'El campo seleccionado :attribute no es válido.',
    'in_array' => 'El campo :attribute debe existir en :other.',
    'integer' => 'El campo :attribute debe ser un integer.',
    'ip' => 'El campo :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El campo :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El campo :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El campo :attribute debe ser una cadena JSON válida.',
    'lowercase' => 'El campo :attribute debe estar en minúsculas.',
    'lt' => [
        'array' => 'El campo :attribute debe tener menos de :value valores.',
        'file' => 'El campo :attribute debe ser menor de :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser menor de :value.',
        'string' => 'El campo :attribute debe ser menor de :value characters.',
    ],
    'lte' => [
        'array' => 'El campo :attribute field must not have more than :value items.',
        'file' => 'El campo :attribute debe ser less than or equal to :value kilobytes.',
        'numeric' => 'El campo :attribute debe ser less than or equal to :value.',
        'string' => 'El campo :attribute debe ser less than or equal to :value characters.',
    ],
    'mac_address' => 'El campo :attribute debe ser a valid MAC address.',
    'max' => [
        'array' => 'El campo :attribute field must not have more than :max items.',
        'file' => 'El campo :attribute field must not be greater than :max kilobytes.',
        'numeric' => 'El campo :attribute field must not be greater than :max.',
        'string' => 'El campo :attribute field must not be greater than :max characters.',
    ],
    'max_digits' => 'El campo :attribute field must not have more than :max digits.',
    'mimes' => 'El campo :attribute debe ser a file of type: :values.',
    'mimetypes' => 'El campo :attribute debe ser a file of type: :values.',
    'min' => [
        'array' => 'El campo :attribute field must have at least :min items.',
        'file' => 'El campo :attribute debe ser at least :min kilobytes.',
        'numeric' => 'El campo :attribute debe ser at least :min.',
        'string' => 'El campo :attribute debe ser at least :min characters.',
    ],
    'min_digits' => 'El campo :attribute field must have at least :min digits.',
    'missing' => 'El campo :attribute debe ser missing.',
    'missing_if' => 'El campo :attribute debe ser missing when :other is :value.',
    'missing_unless' => 'El campo :attribute debe ser missing unless :other is :value.',
    'missing_with' => 'El campo :attribute debe ser missing when :values is present.',
    'missing_with_all' => 'El campo :attribute debe ser missing when :values are present.',
    'multiple_of' => 'El campo :attribute debe ser a multiple of :value.',
    'not_in' => 'El campo seleccionado :attribute no es válido.',
    'not_regex' => 'El campo :attribute field format no es válido.',
    'numeric' => 'El campo :attribute debe ser numérico.',
    'password' => [
        'letters' => 'El campo :attribute debe contener al menos una letra.',
        'mixed' => 'El campo :attribute debe contener al menos una letra mayúscula y una minúscula.',
        'numbers' => 'El campo :attribute debe contener al menos un número.',
        'symbols' => 'El campo :attribute debe contener al menos un símbolo.',
        'uncompromised' => 'El campo dado :attribute ha aparecido en una fuga de datos. Por favor, elija una diferente :attribute.',
    ],
    'present' => 'El campo :attribute debe ser present.',
    'prohibited' => 'El campo :attribute field is prohibited.',
    'prohibited_if' => 'El campo :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'El campo :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'El campo :attribute field prohibits :other from being present.',
    'regex' => 'El campo :attribute field format no es válido.',
    'required' => 'El campo :attribute field is required.',
    'required_array_keys' => 'El campo :attribute field must contain entries for: :values.',
    'required_if' => 'El campo :attribute field is required when :other is :value.',
    'required_if_accepted' => 'El campo :attribute field is required when :other is accepted.',
    'required_unless' => 'El campo :attribute field is required unless :other is in :values.',
    'required_with' => 'El campo :attribute field is required when :values is present.',
    'required_with_all' => 'El campo :attribute field is required when :values are present.',
    'required_without' => 'El campo :attribute field is required when :values is not present.',
    'required_without_all' => 'El campo :attribute field is required when none of :values are present.',
    'same' => 'El campo :attribute debe coincidir con :other.',
    'size' => [
        'array' => 'El campo :attribute field must contain :size items.',
        'file' => 'El campo :attribute debe ser :size kilobytes.',
        'numeric' => 'El campo :attribute debe ser :size.',
        'string' => 'El campo :attribute debe ser :size characters.',
    ],
    'starts_with' => 'El campo :attribute field must start with one of the following: :values.',
    'string' => 'El campo :attribute debe ser un string.',
    'timezone' => 'El campo :attribute debe ser a valid timezone.',
    'unique' => 'El campo :attribute ya está en uso.',
    'uploaded' => 'El campo :attribute no se pudo cargar.',
    'uppercase' => 'El campo :attribute debe ser uppercase.',
    'url' => 'El campo :attribute debe ser a valid URL.',
    'ulid' => 'El campo :attribute debe ser a valid ULID.',
    'uuid' => 'El campo :attribute debe ser a valid UUID.',

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

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | El campo following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
