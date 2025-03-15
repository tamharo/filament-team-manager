<x-mail::message>
# {{ __("Welcome to the team!") }}

{{ __("Hello") }},

{{ __("We are excited to welcome you to our team! You can now access your account and start collaborating with us.") }}

{{ __("Here are your login details") }}:

**{{ __("Email") }}:** {{ $email }}  
**{{ __("Password") }}:** {{ $password }}

{{ __("Simply use these credentials to log in to your account and get started.") }}

{{ __("If you have any questions or need assistance, feel free to contact us.") }}

{{ __("Thank you and welcome aboard!") }}
**{{ config('filament-team-manager.name') }} {{ __("Team") }}**
</x-mail::message>
