@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

@if ($errors->has($name))
    <span class="text-red-600">
        {{ $errors->first($name) }}
    </span>
@endif
