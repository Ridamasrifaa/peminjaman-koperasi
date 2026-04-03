<x-mail::message>

{{-- LOGO --}}


{{-- TITLE --}}
# Reset Password Koperasi SMKN 4 Tasikmalaya

Halo,

Kami menerima permintaan untuk mereset password akun kamu di **Koperasi SMKN 4 Tasikmalaya**.

Silakan klik tombol di bawah ini untuk melanjutkan proses reset password:

{{-- BUTTON --}}
@isset($actionText)
<x-mail::button :url="$actionUrl" color="primary">
Reset Password
</x-mail::button>
@endisset

Link ini hanya berlaku selama **60 menit**.

Jika kamu tidak merasa melakukan permintaan ini, abaikan saja email ini.

---

Terima kasih,  
**Koperasi SMKN 4 Tasikmalaya**

{{-- SUBCOPY --}}
@isset($actionText)
<x-slot:subcopy>
Jika tombol tidak bisa diklik, salin dan buka link berikut di browser kamu:

<span class="break-all">{{ $actionUrl }}</span>
</x-slot:subcopy>
@endisset

</x-mail::message>