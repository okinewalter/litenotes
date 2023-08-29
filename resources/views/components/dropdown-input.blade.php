@props(['name', 'label', 'options', 'selected' => null])
 
<div {{ $attributes->merge(['class' => 'mt-2']) }}>
    <label for="{{ $name }}">{{ $label }}</label>

    <select id="{{ $name }}" name="{{ $name }}" class="block mt-1 w-full">
        @foreach ($options as $option)
            <option value="{{ $option->id }}" {{ $option->id == $selected ? 'selected' : '' }}>
                {{ $option->title }}
            </option>
        @endforeach
    </select>
</div>
