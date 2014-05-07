<select{{$targs}}>
@foreach($values as $key => $val)
    @if ((String)$key === (String)$value)
        <option value="{{{(string)$key}}}" selected="selected">{{{$val}}}</option>
    @else
        <option value="{{{(string)$key}}}">{{{$val}}}</option>
    @end
@end
</select>
