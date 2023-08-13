@props([
    'value'
])

<div class="flex">
    @if ($value === '1')
        <span class="badge bg-info">Laki-Laki</span>
    @elseif ($value === '2')
        <span class="badge bg-secondary">perempuan</span>
    @endif
</div>
