<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="bg-dark" style="height: 100%;">
    <div class="row justify-content-center align-items-center h-100 w-100">
        <div class="col-md-6 bg-light align p-3 rounded">
            <form action="{{ route('login.login') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="mode">Mode</label>
                            <select id="mode" class="form-control" name="mode" required>
                                <option value="imap3">IMAP3</option>
                                <option value="pop3">POP3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="host">Host</label>
                            <input id="host" class="form-control" type="text" name="host" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="port">Port</label>
                            <input id="port" class="form-control" type="text" name="port" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="encryption">Encryption</label>
                            <input id="encryption" class="form-control" type="text" name="encryption" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="email" name="email" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password" autocomplete="true" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>