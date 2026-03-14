<x-mail::message>
# {{ $title }}

{{ $body }}

<x-mail::button :url="config('app.url')">
View in Dashboard
</x-mail::button>

Regards,  
**{{ $sender }}**  
*LUMINA ELITE AUTHENTICATION*

<x-mail::footer>
This is an automated operational transmission from Lumina Elite. You are receiving this because your identity is registered in the faculty database.
</x-mail::footer>
</x-mail::message>
