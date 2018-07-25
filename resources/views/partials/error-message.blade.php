@if($errors->has($fieldName))

    <div class="alert-danger">
        <ul>
            @foreach($errors->get($fieldName) as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif