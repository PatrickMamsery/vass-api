<div class="summary-tile-wrapper">
    <div class="summary">
        <div class="title">
            <div class="icon">
                <i class="fa fa-{{ $icon }}"></i>
            </div>
            <div class="text">
                {{ $title }}
            </div>
        </div>
        <div class="stats">
            <p class="total">{{ $total }}</p>
            <p class="trend {{ $trend_direction }}">
                <span>{{ $trend }}%</span>
                <i class="fa fa-arrow-{{ $trend_direction }}"></i>
            </p>
        </div>
        <div class="subtitle">
            <span>{{ $subtitle }}</span>
        </div>
    </div>
</div>