<x-mail::message>
# U got new email from {{ $contact->email  }}
Subject: {{ $contact->subject }}<br>
Name: {{ $contact->name }}<br>
Email: {{ $contact->email }}<br>

    AND THIS SAY:

{{ $contact->message }}<br>


<x-mail::button :url="''">
Check all emails
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
