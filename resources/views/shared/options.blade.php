{!! DEFAULT_SELECT_TEXT !!}
@foreach( $options as $key => $value )
    <option value="{{ $key }}">{{ $value }}</option>
@endforeach