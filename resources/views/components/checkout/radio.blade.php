@props(['label' => '', 'checked' => false, 'name' => '', 'value' => ''])

<label {{ $attributes->merge(['class' => 'page-checkout__radio-wrapper']) }}>
    <input value="{{$value}}" hidden type="radio" name="{{ $name }}" {{ $checked ? 'checked' : '' }} />
    <div class="page-checkout__radio-circle">
        <div class="page-checkout__radio-checked">
        </div>
    </div>
    <p class="page-checkout__radio-label">{{ $label }}</p>
</label>
