@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}<span style="margin-left: 5px;">(First Name, Last Name)</span><span style="color: red; margin-left: 5px;">*</span>
</label>
