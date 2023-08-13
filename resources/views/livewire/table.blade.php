<div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                @foreach($this->columns() as $column)
                    <th wire:click="sort('{{ $column->key }}')">
                        <div class="d-flex align-items-center">
                            {{ $column->label }}
                            @if($sortBy === $column->key)
                                @if ($sortDirection === 'asc')
                                    <span class="relative d-flex align-items-center">
                                        <i class="fa-solid fa-angle-up"></i>
                                    </span>
                                @else
                                    <span class="relative d-flex align-items-center">
                                        <i class="fa-solid fa-angle-down"></i>
                                    </span>
                                @endif
                            @endif
                        </div>
                    </th>
                @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($this->data() as $row)
                <tr>
                    @foreach($this->columns() as $column)
                    <td>
                        <div>
                            <x-dynamic-component
                                :component="$column->component"
                                :value="$row[$column->key]"
                            >
                            </x-dynamic-component>
                        </div>
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-md-6 overflow-auto">
            {{ $this->data()->links() }}
        </div>

        <div class="col-12 col-md-6 text-center text-md-end text-muted">
            Showing {{ $this->data()->firstItem() }} to {{ $this->data()->lastItem() }} of {{ $this->data()->total() }} results
        </div>
    </div>
</div>
