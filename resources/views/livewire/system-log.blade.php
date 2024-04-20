<div>
    <div class="filter mt-5">
        <div class="row">
            <div class="col">
                <div class="select">
                    <select wire:model="actor">
                        <option selected>Action By</option>
                        @foreach ($actors as $item)
                            <option value="{{ $item->id }}">{{ $item->fname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="select">
                    <select wire:model="platform">
                        <option selected>Platform</option>
                        <option value="application">Application</option>
                        <option value="dashboard">Dashboard</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="select">
                    <select wire:model="action">
                        <option selected>Action</option>
                        <option value="edit">Edit</option>
                        <option value="delete">Delete</option>
                        <option value="access">Access</option>
                        <option value="transaction">Transaction</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="select">
                    <input type="date" wire:model="from_date" />
                </div>
            </div>
            <div class="col">
                <div class="select">
                    <input type="date" wire:model="to_date" />
                </div>
            </div>
        </div>
    </div>
    <div class="paper mt-5">
        @foreach ($logs as $item)
            <div class="log">
                <div class="action {{ $item->action }}">{{ ucfirst($item->action) }}</div>
                <div class="mono">[{{ $item->updated_at }}][{{ ucfirst($item->actor->fname) }} {{ ucfirst($item->actor->sname) }}][{{ $item->platform }}]</div>
                <div class="mono">
                    {{ $item->description }}
                </div>
            </div>
        @endforeach
    </div>
</div>
