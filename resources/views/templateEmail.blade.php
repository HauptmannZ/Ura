@component('mail::message')
    Klik tombol dibawah ini
    @component('mail::button', ['url' => $alamat])
        Klik disini
    @endcomponent
    Jika ini bukan kamu yang login, jangan lakukan aksi ini
    {{ config('app.name') }}
@endcomponent
