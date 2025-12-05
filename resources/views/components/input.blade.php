@props([
    'label' => '',
    'type' => 'text',
    'name' => '',
    'placeholder' => '',
    'required' => false,
    'value' => ''
])

<div>
    @if($label)
        <label class="block text-sm font-medium mb-1" for="{{ $name }}">{{ $label }}</label>
    @endif
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        placeholder="{{ $placeholder }}"
        value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge([
            'class' => 'w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-[#1c1c1c] text-black dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-800'
        ]) }}
    >
</div>
