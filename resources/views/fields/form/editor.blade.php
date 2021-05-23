<div class="crud-form-field" wire:ignore>
    <div class="crud-form-field-label">
        <x-rambo::crud.form.label :field="$field" />
    </div>

    <div class="crud-form-field-input w-60">
        <div
            x-data="setupEditor{{ $field->getName() }}('{{ nl2br($field->getValue()) }}')"
            x-init="() => init($refs.element)"
        >
            <template x-if="editor">
                <div class="wysiwyg-editor">
                    <button
                        @click="editor.chain().toggleHeading({ level: 1 }).focus().run()"
                        :class="{ 'is-active': editor.isActive('heading', { level: 1 }) }"
                    >
                        H1
                    </button>
                    <button
                        @click="editor.chain().toggleHeading({ level: 2 }).focus().run()"
                        :class="{ 'is-active': editor.isActive('heading', { level: 2 }) }"
                    >
                        H2
                    </button>
                    <button
                        @click="editor.chain().toggleHeading({ level: 3 }).focus().run()"
                        :class="{ 'is-active': editor.isActive('heading', { level: 3 }) }"
                    >
                        H3
                    </button>
                    <button
                        @click="editor.chain().toggleHeading({ level: 4 }).focus().run()"
                        :class="{ 'is-active': editor.isActive('heading', { level: 4 }) }"
                    >
                        H4
                    </button>
                    <button
                        @click="editor.chain().toggleHeading({ level: 5 }).focus().run()"
                        :class="{ 'is-active': editor.isActive('heading', { level: 5 }) }"
                    >
                        H5
                    </button>
                    <button
                        @click="editor.chain().toggleHeading({ level: 6 }).focus().run()"
                        :class="{ 'is-active': editor.isActive('heading', { level: 6 }) }"
                    >
                        H6
                    </button>

                    <button
                        @click="editor.chain().toggleBold().focus().run()"
                        :class="{ 'is-active': editor.isActive('bold') }"
                    >
                        <i class="fas fa-bold"></i>
                    </button>
                    <button
                        @click="editor.chain().toggleItalic().focus().run()"
                        :class="{ 'is-active': editor.isActive('italic') }"
                    >
                        <i class="fas fa-italic"></i>
                    </button>
                    <button
                        @click="editor.chain().focus().toggleStrike().run()"
                        :class="{ 'is-active': editor.isActive('strike') }"
                    >
                        <i class="fas fa-strikethrough"></i>
                    </button>
                    <button
                        @click="editor.chain().focus().toggleUnderline().run()"
                        :class="{ 'is-active': editor.isActive('underline') }"
                    >
                        <i class="fas fa-underline"></i>
                    </button>

                    <button
                        @click="setLink"
                        :class="{ 'is-active': editor.isActive('link') }"
                    >
                        <i class="fas fa-link"></i>
                    </button>
                    <button
                        @click="editor.chain().focus().unsetLink().run()"
                        v-if="editor.isActive('link')"
                    >
                        <i class="fas fa-unlink"></i>
                    </button>
                </div>
            </template>

            <div class="wysiwyg-preview" x-ref="element"></div>
        </div>

        <x-rambo::crud.form.error :field="$field" />
    </div>

    <script>
        window.setupEditor{{ $field->getName() }} = function(content) {
            return {
                editor: null,
                content: content,
                updatedAt: Date.now(), // force Alpine to rerender on selection change
                init (element) {
                    this.editor = new window.Editor({
                        element: element,
                        extensions: [
                            window.StarterKit,
                            window.Underline,
                            window.Link,
                        ],
                        content: this.content,
                        onUpdate: ({ editor }) => {
                            Livewire.emit(
                                "{{ $field->emit ?? 'field:update' }}",
                                editor.getHTML(),
                                '{{ $field->getName() }}'
                            )
                        },
                        onSelectionUpdate: () => {
                            this.updatedAt = Date.now()
                        },
                    })
                },
                setLink () {
                    const url = window.prompt('URL')
                    this.editor.chain().focus().setLink({ href: url }).run()
                },
            }
        }
    </script>
</div>
