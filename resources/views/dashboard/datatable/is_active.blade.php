<td class="text-center">
    <label class="custom-switch">
    <input type="checkbox" name="is_active" {{$news->is_active ? 'checked' : ''}} data-id="{{$news->id}}" data-url="{{route('student-news.activation')}}" class="custom-switch-input activation" >
        <span class="custom-switch-indicator"></span>
    </label>
</td>
