<div
    @class([
        'bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative',
        'hidden' => !$message
    ])
    role="alert">
    <span class="block sm:inline">{{ $message }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        {{ $slot }}
    </span>
</div>