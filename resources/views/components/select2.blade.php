<div class="form-floating">
    <select
        name="{{ $name }}"
        id="{{ $id }}"
        class="form-select @error($errorName) is-invalid @enderror"
        @if($required) required @endif>
        <option value="" selected disabled>{{ $placeholder }}</option>
        @foreach($options as $option)
        <option
            value="{{ $option->{$optionValueField} }}"
            {{-- Pass dynamic data attributes for Select2 custom rendering --}}
            data-main-text="{{ $option->{$optionTextField} }}"
            @if($optionSubTextField) data-sub-text="{{ $option->{$optionSubTextField} }}" @endif
            {{ $selected == $option->{$optionValueField} ? 'selected' : '' }}>
            {{-- This is the plain text for the default HTML select, and for Select2's search --}}
            {{ $option->{$optionTextField} }} @if($optionSubTextField) ({{ $option->{$optionSubTextField} }}) @endif
        </option>
        @endforeach
    </select>
    <label for="{{ $id }}">{{ $label }}</label>
    @error($errorName)
    <div class="invalid-feedback small">{{ $message }}</div>
    @else
    <div class="invalid-feedback">This field is required.</div> {{-- Generic required message --}}
    @enderror
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        // Function to format the option text with HTML
        function formatSelect2Option(option) {
            if (!option.id) {
                return option.text; // Return plain text for the placeholder option
            }

            // Get data from the option element (for pre-loaded options)
            var mainText = $(option.element).data('main-text') || option.mainText; // `option.mainText` for AJAX loaded
            var subText = $(option.element).data('sub-text') || option.subText; // `option.subText` for AJAX loaded

            if (!mainText) {
                return option.text; // Fallback if data attributes are missing
            }

            // Construct the HTML for the dropdown item
            var $container = $(
                '<div class="py-1">' +
                '<strong class="text-dark">' + mainText + '</strong>' +
                (subText ? '<br><small class="text-muted">' + subText + '</small>' : '') +
                '</div>'
            );
            return $container;
        }

        // Initialize Select2 on the specific element by its ID
        $('#{{ $id }}').select2({
            theme: 'bootstrap-5', // Apply the Bootstrap 5 theme for styling
            templateResult: formatSelect2Option, // Use the custom function for rendering dropdown items
            templateSelection: function(option) {
                // This function defines what appears in the selected box
                if (!option.id) {
                    return option.text;
                } // For placeholder
                var mainText = $(option.element).data('main-text') || option.mainText;
                var subText = $(option.element).data('sub-text') || option.subText;
                return mainText + (subText ? ' (' + subText + ')' : '');
            },
            // Allow HTML in options (needed for templateResult)
            escapeMarkup: function(markup) {
                return markup;
            }
        });
    });
</script>
@endpush