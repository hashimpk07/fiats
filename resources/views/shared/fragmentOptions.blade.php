<option value="">Choose a {{ $data }}</option>
@foreach( $options as $key => $value )
    <option value="{{ $key }}">{{ $value }}</option>
@endforeach