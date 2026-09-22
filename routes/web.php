trim((string) $request->input('nim')),
        'nama'  => strip_tags(trim((string) $request->input('nama'))),
        'email' => filter_var((string) $request->input('email'), FILTER_SANITIZE_EMAIL),
        'usia'  => trim((string) $request->input('usia')),
    ];

    // 2. Validasi Server-Side
    \(validator = Validator::make(\)dataBersih, [
        'nim'   => ['required', 'numeric', 'digits_between:8,12'],
        'nama'  => ['required', 'min:3', 'max:50'],
        'email' => ['required', 'email'],
        'usia'  => ['required', 'integer', 'min:17', 'max:60'],
    ], [
        'nim.required'       => 'NIM wajib diisi.',
        'nim.numeric'        => 'NIM harus berupa angka.',
        'nim.digits_between' => 'NIM harus berisi 8 hingga 12 digit.',
        'nama.required'      => 'Nama wajib diisi.',
        'nama.min'           => 'Nama minimal 3 karakter.',
        'nama.max'           => 'Nama maksimal 50 karakter.',
        'email.required'     => 'Email wajib diisi.',
        'email.email'        => 'Format email tidak valid.',
        'usia.required'      => 'Usia wajib diisi.',
        'usia.integer'       => 'Usia harus berupa angka.',
        'usia.min'           => 'Usia minimal 17 tahun.',
        'usia.max'           => 'Usia maksimal 60 tahun.',
    ]);

    if ($validator->fails()) {
        return redirect('/form-mahasiswa')
            ->withErrors($validator)
            ->withInput();
    }

    \(data =\)validator->validated();
    \(data['usia'] = (int)\)data['usia'];

    return view('hasil-form', ['data' => $data]);
});