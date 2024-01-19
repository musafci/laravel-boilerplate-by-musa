<h1>Hi, {{ $name }}</h1>
<p>Congratulations, You have been registered successfully as <strong>{{ strtoupper($user_type) }}</strong></p>
<p>Please click <a href="{{ $login_url }}">HERE</a> to login.</p>
<p>Your login email is: {{ $email }}</p>
<p>Your login password is: {{ $password }}</p>
<p><strong>Best Regards</strong></p>
<p>{{ $app_name }} Team</p>
