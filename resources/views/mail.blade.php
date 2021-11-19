<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/detail.js') }}"></script>
</head>

<body class="bg-dark">
    <a name="logout" id="logout" class="btn btn-light" href="{{ route('logout') }}" role="button">Logout</a>
    @include('write')
    <div class="container-fluid py-2">
        <table class="table table-dark w-100">
            <thead class="bg-dark sticky-top">
                <tr>
                    <th>From</th>
                    <th>Subject</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mails as $id => $mail)
                <tr>
                    <td scope="row" class="p-0">
                        <a data-toggle="modal" data-target="#model{{ $id }}" class="d-block p-3 btn">
                            {{ $mail['from']->personal }}
                        </a>
                    </td>
                    <td class="p-0">
                        <a data-toggle="modal" data-target="#model{{ $id }}" class="d-block p-3 btn text-left">
                            {{ $mail['subject'] }}
                        </a>
                    </td>
                    <td class="p-0">
                        <a data-toggle="modal" data-target="#model{{ $id }}" class="d-block p-3 btn">
                            {{ $mail['date'] }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @foreach ($mails as $id => $mail)
    <!-- Modal -->
    <div class="modal fade" id="model{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitle{{ $id }}" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">From: {{ $mail['from'] }} - {{ $mail['subject'] }} - {{ $mail['date'] }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        {!! $mail['content'] !!}
                        {!! $mail['attachments'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</body>

</html>