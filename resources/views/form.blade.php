<div class="flex flex-wrap w-full">
    @foreach ($formFields as $field)
        {{
            $field->page(explode('@', \Route::currentRouteAction()[1]))
                ->item($item)
                ->render()
        }}
    @endforeach
</div>
