@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input rounded-md shodow-sm w-full', 'rows' => 6]) !!} rows="6"> {{ $slot }}</textarea>
