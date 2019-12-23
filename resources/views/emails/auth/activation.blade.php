@component('mail::message')
# Activation Your Account

Thanks For signing up,Please Activate Your Account.

@component('mail::button', ['url' => route('auth.active',[
                                        'token' =>$user->activation_token,
                                        'email' =>$user->email
                                    ])
                            ]
           )
    Activate
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
