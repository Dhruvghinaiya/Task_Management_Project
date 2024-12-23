@if ($errors->has($name))
    <span class="text-red-600">
        {{ $errors->first($name) }}
    </span>
@endif