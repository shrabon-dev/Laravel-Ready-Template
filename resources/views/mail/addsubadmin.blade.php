<x-mail::message>
# Hello {{ $name }}
# You assign as a sub admin in JobTime ltd.

Here is your email & password. Now you can login our admin dashboard using this

# Email : {{ $email }}
# Password : {{ $password }}

Thanks, {{ config('app.name') }}
</x-mail::message>
