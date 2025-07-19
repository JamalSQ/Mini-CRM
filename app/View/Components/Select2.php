<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Collection;

class Select2 extends Component
{
    /**
     * Create a new component instance.
     */
    public string $name;
    public string $id;
    public string $label;
    public Collection $options; // Or array, if you prefer
    public mixed $selected;
    public string $placeholder;
    public bool $required;
    public string $optionValueField;
    public string $optionTextField;
    public ?string $optionSubTextField; // Nullable for optional sub-text
    public string $errorName;

    /**
     * Create a new component instance.
     *
     * @param string $name The name attribute for the select element.
     * @param string|null $id The ID attribute for the select element. Defaults to $name.
     * @param string $label The text for the floating label.
     * @param Collection|array $options The data to populate the dropdown. Each item should have an 'id' and the fields for text/sub-text.
     * @param mixed $selected The value of the currently selected option (for edit forms).
     * @param string $placeholder The text for the initial "Select..." option.
     * @param bool $required If the field is required for validation.
     * @param string $optionValueField The key from the option object to use for the 'value' attribute.
     * @param string $optionTextField The key from the option object to use for the main text in the option.
     * @param string|null $optionSubTextField The key from the option object to use for the sub-text in the dropdown.
     * @param string|null $errorName The key used for validation errors. Defaults to $name.
     */
    public function __construct(
        string $name,
        ?string $id = null,
        string $label,
        $options, // Accepts Collection or array
        mixed $selected = null,
        string $placeholder = 'Select an option',
        bool $required = false,
        string $optionValueField = 'id',
        string $optionTextField = 'name', // Default for simple lists
        ?string $optionSubTextField = null, // Default to no sub-text
        ?string $errorName = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name; // Use provided ID or default to name
        $this->label = $label;
        $this->options = $options instanceof Collection ? $options : collect($options); // Ensure it's a collection
        $this->selected = old($name, $selected); // Make it sticky with old() helper
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->optionValueField = $optionValueField;
        $this->optionTextField = $optionTextField;
        $this->optionSubTextField = $optionSubTextField;
        $this->errorName = $errorName ?? $name; // Use provided error name or default to name
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select2');
    }
}
