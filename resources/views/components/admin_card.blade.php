<a wire:click="setAdmin({{ $item->id }})" class="admin-card">
    <div class="circular-icon">
        <i class="fa-solid fa-user-gear"></i>
    </div>
    <div class="body">
        <div class="name">{{ ucfirst($item->fname) }} {{ ucfirst($item->sname) }}</div>
        <div class="email">{{ $item->email }}</div>
    </div>
</a>