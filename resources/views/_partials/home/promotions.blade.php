@forelse($promotions as $promotion)

    <div class="widget-activity-item">
        <div class="widget-activity-text">
            {{ $promotion->user->full_name }} was promoted to {{ $promotion->new_text }}
        </div>
        <div class="widget-activity-footer">{{ human_time($promotion->created_at) }}</div>
    </div>

@empty

    <div class="widget-activity-item">
        <div class="widget-activity-text">
            No Recent Promotions
        </div>
    </div>

@endforelse