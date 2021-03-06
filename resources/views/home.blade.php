@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                    @if(isset($errors) && key($errors->getMessages()) == 'msgErro')
                        <nav class="navbar navbar-dark bg-warning">
                            <!-- Navbar content --><h4>{{$errors->first()}}</h4>
                        </nav>
                    @elseif(isset($errors) && key($errors->getMessages()) == 'msgSuccess')
                        <nav class="navbar navbar-dark bg-success">
                            <!-- Navbar content --><h4>{{$errors->first()}}</h4>
                        </nav>
                    @endif
                <div class="card-header">

                    @if (isset($response) && !empty($response))
                        <h1>{{$response->competition->name}} - Season {{$response->filters->season}}</h1>
                        <h2>Total of {{$response->resultSet->count}} games
                            <br>
                            Starts at {{$response->resultSet->first}} and ends at {{$response->resultSet->last}} |
                            Played {{$response->resultSet->played}}</h2>
                    @else
                        <h1>View Season - View games</h1>
                    @endif
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{url('index')}}">all games this season</a>
                        |
                    <a href="{{url('index/1')}}">Upcoming Games from this date (today)</a>
                        |
                    <a href="{{url('index/0/1')}}">Your Personal Selection</a>
                </div>
                <div>

                    @if (isset($response) && !empty($response))

                        <ul>
                            @foreach ($response->matches as $key => $body)
                                <form method="post" action="/savegame">
                                    @csrf
                                    <li>
                                        <b>Day/Hour:</b> {{ $dategame = substr(str_replace('T', ' / ', $body->utcDate), 0, -1)}}
                                        -
                                        @if (!in_array($body->id, $games_saved))
                                            <input type="submit" name="submit" value="Save this game"></li>
                                    @else
                                        <a href="../destroy/{{$body->id}}">Remove this game from the Personal Team</a>
                                    @endif
                                    <li><b>Status:</b> {{ $status = $body->status }}</li>
                                    <li><b>stage:</b> {{ $stage = $body->stage }}</li>
                                    <li><b>Home Team:</b> {{ $team_home = $body->homeTeam->name }}</li>
                                    <li><b>Away Team:</b> {{ $team_away = $body->awayTeam->name }}</li>
                                    <li><b>Winner:</b> {{ $winner =  $body->score->winner }}</li>
                                    <p>

                                        <input type="hidden" name="game" value="{{ json_encode([
                                                                                                ['id'=>$body->id,
                                                                                                'stage'=>$stage,
                                                                                                'status'=>$status,
                                                                                                'winner'=>$winner,
                                                                                                'dategame'=>$dategame,
                                                                                                'away_team'=>$team_away,
                                                                                                'home_team'=>$team_home]
                                                                                                ]) }}">
                                </form>
                            @endforeach
                        </ul>

                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
@endsection
