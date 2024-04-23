@props([
    'options' => [],
    'selected' => null,
    'key',
    'name' => '',
])
<select hidden data-html-select data-key="{{ $key }}">
    @foreach ($options as $option)
        <option @if ($selected == $option['value']) selected @elseif($loop->index == 0) selected @else @endif
            value="{{ $option['value'] }}">
            {{ $option['name'] }}
        </option>
    @endforeach
</select>

<div {{$attributes->merge(['class' => 'gr-select'])}} data-custom-select data-key="{{ $key }}">
    <div class="gr-select__selected">
        {{ $options[0]['name'] }}
    </div>
    <div class="gr-select__options">
        @foreach ($options as $option)
            <div {{isset($option['attributes']) ? implode(' ', $option['attributes']) : ''}} class="gr-select__options-option" data-key="{{ $key }}" data-value="{{ $option['value'] }}">
                {{ $option['name'] }}</div>
        @endforeach
    </div>
</div>
