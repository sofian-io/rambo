<div class="flex flex-wrap w-full">
    @foreach ($formFields as $field)
        {{ $field->render() }}
    @endforeach
</div>
