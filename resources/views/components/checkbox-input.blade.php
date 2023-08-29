@props(['name', 'label', 'checked' => false])

<div {{ $attributes->merge(['class' => 'flex items-center']) }}>
    <input type="checkbox" id="{{ $name }}" name="{{ $name }}" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
    <label for="{{ $name }}" class="ml-2 pl-2">{{ $label }}</label>
</div>
