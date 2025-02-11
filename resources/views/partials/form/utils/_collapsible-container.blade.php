<a17-inputframe>
    <details>
        <summary>
            <span class="f--underlined">{{ $label }}</span>
            @isset($description)
                - <span class="f--small">{{ $note }}</span>
            @endisset
        </summary>
        @isset($fields)
            @foreach($fields as $field)
            {!! $field->render() !!}
            @endforeach
        @endisset
    </details>
</a17-inputframe>
