<x-mail::message>
# {{ __("You're invited to join the team!") }}

{{ __("Hello") }},

{{ __("We are pleased to invite you to join our team! We would be thrilled to have you on board. Click the button below to accept the invitation and become part of our team") }}:

<x-mail::button :url="route('validate-team-invitation', ['token' => $invitation->token])">
{{ __("Join the team now") }}
</x-mail::button>

{{ __("If you already have an account, simply log in after clicking the link. If you don't have an account, you will receive an email with your login details after clicking the link.") }}

{{ __("If you have any questions or need assistance, feel free to contact us.") }}

{{ __("Thank you and we look forward to seeing you soon!") }}
**{{ config('filament-team-manager.name') }} {{ __("Team") }}**
</x-mail::message>
