<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' =>'A(z) :attribute el kell legyen fogadva!',
    'accepted_if' =>'The :attribute must be accepted when :other is :value.',
    'active_url' =>'A(z) :attribute nem érvényes url!',
    'after' =>'A(z) :attribute :date utáni dátum kell, hogy legyen!',
    'after_or_equal' =>'A(z) :attribute nem lehet korábbi dátum, mint :date!',
    'alpha' =>'A(z) :attribute kizárólag betűket tartalmazhat!',
    'alpha_dash' =>'A(z) :attribute kizárólag betűket, számokat és kötőjeleket tartalmazhat!',
    'alpha_num' =>'A(z) :attribute kizárólag betűket és számokat tartalmazhat!',
    'array' =>'A(z) :attribute egy tömb kell, hogy legyen!',
    'attached' =>'Ezt a :attribute-at már csatolták.',
    'before' =>'A(z) :attribute :date előtti dátum kell, hogy legyen!',
    'before_or_equal' =>'A(z) :attribute nem lehet későbbi dátum, mint :date!',
    'between' => [
        'array' => 'A(z) :attribute :min - :max közötti elemet kell, hogy tartalmazzon!',
        'file' => 'A(z) :attribute mérete :min és :max kilobájt között kell, hogy legyen!',
        'numeric' => 'A(z) :attribute :min és :max közötti szám kell, hogy legyen!',
        'string' => 'A(z) :attribute hossza :min és :max karakter között kell, hogy legyen!',
    ],
    'boolean' => 'A(z) :attribute mező csak true vagy false értéket kaphat!',
    'confirmed' => 'A(z) :attribute nem egyezik a megerősítéssel.',
    'current_password' => 'The password is incorrect.',
    'date' => 'A(z) :attribute nem érvényes dátum.',
    'date_equals' => ':Attribute meg kell egyezzen a következővel: :date.',
    'date_format' => 'A(z) :attribute nem egyezik az alábbi dátum formátummal :format!',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => 'A(z) :attribute és :other értékei különbözőek kell, hogy legyenek!',
    'digits' => 'A(z) :attribute :digits számjegyű kell, hogy legyen!',
    'digits_between' => 'A(z) :attribute értéke :min és :max közötti számjegy lehet!',
    'dimensions' => 'A(z) :attribute felbontása nem megfelelő.',
    'distinct' => 'A(z) :attribute értékének egyedinek kell lennie!',
    'doesnt_end_with' => 'The :attribute may not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute may not start with one of the following: :values.',
    'email' => 'A(z) :attribute nem érvényes email formátum.',
    'ends_with' => 'A(z) :attribute a következővel kell végződjön: :values',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'A kiválasztott :attribute érvénytelen.',
    'failed' => 'Rossz email-jelszó páros.',
    'file' => 'A(z) :attribute fájl kell, hogy legyen!',
    'filled' => 'A(z) :attribute megadása kötelező!',
    'gt' => [
        'array' => 'A(z) :attribute több, mint :value elemet kell, hogy tartalmazzon.',
        'file' => 'A(z) :attribute mérete nagyobb kell, hogy legyen, mint :value kilobájt.',
        'numeric' => 'A(z) :attribute nagyobb kell, hogy legyen, mint :value!',
        'string' => 'A(z) :attribute hosszabb kell, hogy legyen, mint :value karakter.',
    ],
    'gte' => [
        'array' => 'A(z) :attribute legalább :value elemet kell, hogy tartalmazzon.',
        'file' => 'A(z) :attribute mérete nem lehet kevesebb, mint :value kilobájt.',
        'numeric' => 'A(z) :attribute nagyobb vagy egyenlő kell, hogy legyen, mint :value!',
        'string' => 'A(z) :attribute hossza nem lehet kevesebb, mint :value karakter.',
    ],
    'image' => 'A(z) :attribute képfájl kell, hogy legyen!',
    'in' => 'A kiválasztott :attribute érvénytelen.',
    'in_array' => 'A(z) :attribute értéke nem található a(z) :other értékek között.',
    'integer' => 'A(z) :attribute értéke szám kell, hogy legyen!',
    'ip' => 'A(z) :attribute érvényes IP cím kell, hogy legyen!',
    'ipv4' => 'A(z) :attribute érvényes IPv4 cím kell, hogy legyen!',
    'ipv6' => 'A(z) :attribute érvényes IPv6 cím kell, hogy legyen!',
    'json' => 'A(z) :attribute érvényes JSON szöveg kell, hogy legyen!',
    'lowercase' => 'The :attribute must be lowercase.',
    'lt' => [
        'array' => 'A(z) :attribute kevesebb, mint :value elemet kell, hogy tartalmazzon.',
        'file' => 'A(z) :attribute mérete kisebb kell, hogy legyen, mint :value kilobájt.',
        'numeric' => 'A(z) :attribute kisebb kell, hogy legyen, mint :value!',
        'string' => 'A(z) :attribute rövidebb kell, hogy legyen, mint :value karakter.',
    ],
    'lte' => [
        'array' => 'A(z) :attribute legfeljebb :value elemet kell, hogy tartalmazzon.',
        'file' => 'A(z) :attribute mérete nem lehet több, mint :value kilobájt.',
        'numeric' => 'A(z) :attribute kisebb vagy egyenlő kell, hogy legyen, mint :value!',
        'string' => 'A(z) :attribute hossza nem lehet több, mint :value karakter.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'array' => 'A(z) :attribute legfeljebb :max elemet kell, hogy tartalmazzon.',
        'file' => 'A(z) :attribute mérete nem lehet több, mint :max kilobájt.',
        'numeric' => 'A(z) :attribute értéke nem lehet nagyobb, mint :max!',
        'string' => 'A(z) :attribute hossza nem lehet több, mint :max karakter.',
    ],
    'max_digits' => 'The :attribute must not have more than :max digits.',
    'mimes' => 'A(z) :attribute kizárólag az alábbi fájlformátumok egyike lehet: :values.',
    'mimetypes' => 'A(z) :attribute kizárólag az alábbi fájlformátumok egyike lehet: :values.',
    'min' => [
        'array' => 'A(z) :attribute legalább :min elemet kell, hogy tartalmazzon.',
        'file' => 'A(z) :attribute mérete nem lehet kevesebb, mint :min kilobájt.',
        'numeric' => 'A(z) :attribute értéke nem lehet kisebb, mint :min!',
        'string' => 'A(z) :attribute hossza nem lehet kevesebb, mint :min karakter.',
    ],
    'min_digits' => 'The :attribute must have at least :min digits.',
    'multiple_of' => 'A :attribute :value többszörösének kell lennie',
    'next' => 'Következő &raquo;',
    'not_in' => 'A(z) :attribute értéke érvénytelen.',
    'not_regex' => 'A(z) :attribute formátuma érvénytelen.',
    'numeric' => 'A(z) :attribute szám kell, hogy legyen!',
    'password' => 'A(z) :attribute jelszónak kell, hogy legyen!',
    'password' => [
        'letters' => 'The :attribute must contain at least one letter.',
        'mixed' => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute must contain at least one number.',
        'symbols' => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'A(z) :attribute mező nem található!',
    'previous' => '&laquo; Előző',
    'prohibited' => 'A :attribute mező tilos.',
    'prohibited_if' => 'A :attribute mező tilos, ha :other :value.',
    'prohibited_unless' => 'A :attribute mező tilos, kivéve, ha :other a :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'A(z) :attribute formátuma érvénytelen.',
    'relatable' => 'Lehet, hogy ez az :attribute nem kapcsolódik ehhez az erőforráshoz.',
    'required' => 'A(z) :attribute megadása kötelező!',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'A(z) :attribute megadása kötelező, ha a(z) :other értéke :value!',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => 'A(z) :attribute megadása kötelező, ha a(z) :other értéke nem :values!',
    'required_with' => 'A(z) :attribute megadása kötelező, ha a(z) :values érték létezik.',
    'required_with_all' => 'A(z) :attribute megadása kötelező, ha a(z) :values értékek léteznek.',
    'required_without' => 'A(z) :attribute megadása kötelező, ha a(z) :values érték nem létezik.',
    'required_without_all' => 'A(z) :attribute megadása kötelező, ha egyik :values érték sem létezik.',
    'reset' => 'Az új jelszó beállítva!',
    'same' => 'A(z) :attribute és :other mezőknek egyezniük kell!',
    'sent' => 'Jelszó-emlékeztető elküldve!',
    'size' => [
        'array' => 'A(z) :attribute :size elemet kell tartalmazzon!',
        'file' => 'A(z) :attribute mérete :size kilobájt kell, hogy legyen!',
        'numeric' => 'A(z) :attribute értéke :size kell, hogy legyen!',
        'string' => 'A(z) :attribute hossza :size karakter kell, hogy legyen!',
    ],
    'starts_with' => ':Attribute a következővel kell kezdődjön: :values',
    'string' => 'A(z) :attribute szöveg kell, hogy legyen.',
    'throttle' => 'Túl sok próbálkozás. Kérjük próbálja újra :seconds másodperc múlva.',
    'throttled' => 'Kérjük várjon, mielőtt újra megpróbálná.',
    'timezone' => 'A(z) :attribute nem létező időzona.',
    'token' => 'Ez az új jelszó generálásához tartozó token érvénytelen.',
    'unique' => 'A(z) :attribute már foglalt.',
    'uploaded' => 'A(z) :attribute feltöltése sikertelen.',
    'url' => 'A(z) :attribute érvénytelen link.',
    'user' => 'Nem található felhasználó a megadott email címmel.',
    'uuid' => ':Attribute érvényes UUID-val kell rendelkezzen.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'id' => 'azonosító',
        'name' => 'név',
        'description' => 'leírás',
        'obtained' => 'bekerülési dátum',
        'image' => 'kép',
        'date' => 'dátum',
        'text' => 'szöveg',
        'display' => 'megjelenítés',
        'color' => 'szín',
        'bg-color' => 'szín',
        'newtext' => 'komment szöveg'
    ],

];