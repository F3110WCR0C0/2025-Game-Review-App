<!DOCTYPE html>
<html>
<head><title>Games</title></head>
<body>
    <h1>All Games</h1>
    <ul>
        @foreach ( $games as game )
            <li>
                {{$game->statistics_id}} - {{$game->review_id}} - {{$game->genre_id}} - {{$game->name}} - {{$game->release_date}} - {{$game->age_rating}} - {{$game->price}} - {{$game->discount}}
            </li>
        @endforeach
    </ul>
</body>
</html>