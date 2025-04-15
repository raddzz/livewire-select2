<div wire:ignore>
    <select class="select2-{{ $this->id }} {{ $this->class ?? '' }}" @if($this->multiple) multiple="multiple" @endif>
        @foreach($this->options as $key => $option)
            <option value="{{ $key }}" @if($this->multiple ? in_array($key, (array)$this->model) : $key == $this->model) selected @endif>
                {{ $option }}
            </option>
        @endforeach
    </select>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        initSelect2()

        document.addEventListener('livewire-select2-init', () => {
            initSelect2()
        })

        function initSelect2() {
            $('.select2-{{ $this->id }}').select2({
                theme: 'bootstrap-5'
            }).on('change', function (e) {
                let data = $(this).val();
                @this.select2Change(data)
            });
        }
    });
</script>
