Sir {{ $user->name }}, welcome to joining. <br />
Please press the link below to confirm your signning yup.<br />
{{ route('users.confirm', $user->confirm_code) }}
