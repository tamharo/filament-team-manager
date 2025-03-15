<?php

return [

    "name" => env("APP_NAME"),

    //routes name for redirection
    "routes" => [
        "home" => "welcome",
        "invitation" => [
            "success" => "dashboard",
            "error" => "login",
        ]
    ],

    //list of roles for team members
    "roles" => [
        "admin" => "Admin"
    ],

    "mail" => [
        "invitation" => [
            "class" => "Manhamprod\FilamentTeamManager\Mail\TeamInvitationRequestMail",
            "markdown" => "mail.team-invitation-request-mail",
            "subject" => "Team invitation request!"
        ],
        "create-user" => [
            "class" => "Manhamprod\FilamentTeamManager\Mail\NewTeamMemberMail",
            "markdown" => "mail.new-team-member-mail.blade",
            "subject" => "Welcome to the team!"
        ]
    ]

];