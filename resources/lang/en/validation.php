<?php
return [

    'accept' => ':attribute harus diterima.',
    'active_url' => ':attribute bukan URL yang valid.',
    'after' => ':attribute harus tanggal setelah :date.',
    'after_or_equal' => ':attribute harus tanggal setelah atau sama dengan :date.',
    'alpha' => ':attribute hanya boleh berisi huruf.',
    'alpha_dash' => ':attribute hanya boleh berisi huruf, angka, tanda hubung dan garis bawah.',
    'alpha_num' => ':attribute hanya boleh berisi huruf dan angka.',
    'array' => ':attribute harus berupa array.',
    'before' => ':attribute harus tanggal sebelum :date.',
    'before_or_equal' => ':attribute harus tanggal sebelum atau sama dengan :date.',
    'between' => [
        'numeric' => ':attribute harus antara :min dan :max.',
        'file' => ':attribute harus antara :min dan :max kilobyte.',
        'string' => ':attribute harus antara karakter :min dan :max.',
        'array' => ':attribute harus memiliki antara item :min dan :max.',
    ],
    'boolean' => 'Kolom Input :attribute harus benar atau salah.',
    'confirm' => 'Konfirmasi :attribute tidak cocok.',
    'date' => ':attribute bukan tanggal yang valid.',
    'date_equals' => ':attribute harus tanggal yang sama dengan :date.',
    'date_format' => ':attribute tidak cocok dengan format :format.',
    'different' => ':attribute dan :other harus berbeda.',
    'digits' => ':attribute harus berupa digit :digits.',
    'digits_between' => ':attribute harus antara digit :min dan :max.',
    'dimension' => ':attribute memiliki dimensi gambar yang tidak valid.',
    'different' => 'Kolom Input :attribute memiliki nilai duplikat.',
    'email' => ':attribute harus berupa alamat email yang valid.',
    'ending_with' => ':attribute harus diakhiri dengan salah satu :values berikut.',
    'existing' => ':attribute yang dipilih tidak valid.',
    'file' => ':attribute harus berupa file.',
    'diisi' => 'Kolom Input :attribute harus memiliki nilai.',
    'gt' => [
        'numeric' => ':attribute harus lebih besar dari :value.',
        'file' => ':attribute harus lebih besar dari :value kilobyte.',
        'string' => ':attribute harus lebih besar dari karakter :value.',
        'array' => ':attribute harus memiliki lebih dari item :value.',
    ],
    'gte' => [
        'numeric' => ':attribute harus lebih besar dari atau sama dengan :value.',
        'file' => ':attribute harus lebih besar dari atau sama dengan :value kilobyte.',
        'string' => ':attribute harus lebih besar dari atau sama dengan karakter :value.',
        'array' => ':attribute harus memiliki item ber:values atau lebih.',
    ],
    'image' => ':attribute harus berupa gambar.',
    'in' => ':attribute yang dipilih tidak valid.',
    'in_array' => 'Kolom Input :attribute tidak ada di :other.',
    'integer' => ':attribute harus berupa integer.',
    'ip' => ':attribute harus berupa alamat IP yang valid.',
    'ipv4' => ':attribute harus berupa alamat IPv4 yang valid.',
    'ipv6' => ':attribute harus berupa alamat IPv6 yang valid.',
    'json' => ':attribute harus berupa string JSON yang valid.',
    'lt' => [
        'numeric' => 'The :attribute harus kurang dari :value',
        'file' => ':attribute harus kurang dari :value kilobyte.',
        'string' => ':attribute harus kurang dari karakter nilai :.',
        'array' => ':attribute harus memiliki kurang dari item :value.',
    ],
    'lte' => [
        'numeric' => ':attribute harus kurang dari atau sama dengan :value.',
        'file' => ':attribute harus kurang dari atau sama dengan :value kilobyte.',
        'string' => ':attribute harus kurang dari atau sama dengan karakter :value.',
        'array' => ':attribute tidak boleh lebih dari :value item.',
    ],
    'max' => [
        'numeric' => ':attribute tidak boleh lebih besar dari :max.',
        'file' => ':attribute tidak boleh lebih dari :max kilobyte.',
        'string' => ':attribute tidak boleh lebih dari karakter :max.',
        'array' => ':attribute tidak boleh lebih dari :max item.',
    ],
    'mimes' => ':attribute harus berupa file dari type: :values.',
    'mimetypes' => ':attribute harus berupa file bertipe : :values.',
    'min' => [
        'numeric' => ':attribute minimal harus :min.',
        'file' => ':attribute minimal harus :min kilobyte.',
        'string' => ':attribute minimal harus terdiri dari karakter :min.',
        'array' => ':attribute minimal harus memiliki item :min.',
    ],
    'multiple_of' => ':attribute harus kelipatan dari :value',
    'not_in' => ':attribute yang dipilih tidak valid.',
    'not_regex' => 'Format :attribute tidak valid.',
    'numeric' => ':attribute harus berupa angka.',
    'password' => 'Password salah.',
    'present' => 'Kolom Input :attribute harus ada.',
    'regex' => 'Format :attribute tidak valid.',
    'required' => 'Kolom Input :attribute wajib diisi.',
    'required_if' => 'Kolom Input :attribute wajib diisi jika :other adalah :value.',
    'required_unless' => 'Kolom Input :attribute harus diisi kecuali :other ada di :values.',
    'required_with' => 'Kolom Input :attribute harus diisi jika :values ada.',
    'required_with_all' => 'Bidang :attribute harus diisi jika ada nilai :.',
    'required_without' => 'Kolom Input :attribute harus diisi jika :values tidak ada.',
    'required_without_all' => 'Kolom Input :attribute harus diisi jika tidak ada :values yang ada.',
    'same' => ':attribute dan :other harus cocok.',
    'size' => [
        'numeric' => ':attribute harus :size.',
        'file' => ':attribute harus :size kilobyte.',
        'string' => ':attribute harus berupa karakter berukuran :.',
        'array' => ':attribute harus berisi item :size.',
    ],
    'begin_with' => ':attribute harus dimulai dengan salah satu dari :values berikut.',
    'string' => ':attribute harus berupa string.',
    'timezone' => ':attribute harus merupakan zona yang valid.',
    'unique' => ':attribute telah digunakan.',
    'uploaded' => 'The :attribute gagal diunggah.',
    'url' => 'Format :attribute tidak valid.',
    'uuid' => ':attribute harus merupakan UUID yang valid.',
    'custom' => [
        'atribut-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'atribut' => [],
];
