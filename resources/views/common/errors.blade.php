
@if ( count( $errors ) > 0 ) 
    <div class="alert alert-danger">
        <strong>Something went wrong!</strong>

        <br></br>

        <ul>
            {{--  エラー情報を順に表示  --}}
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif