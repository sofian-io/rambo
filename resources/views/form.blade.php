<div class="flex flex-wrap w-full">
    @foreach ($formFields as $fieldKey => $field)
        {{
            $field->page(explode('@', \Route::currentRouteAction()[1]))
                ->uniqid($fieldKey)
                ->item($item)
                ->render()
        }}
    @endforeach
</div>
