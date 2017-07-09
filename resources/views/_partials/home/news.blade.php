@forelse($threads as $thread)
    <div class="widget-activity-item">
        <div class="widget-activity-text">
            {{ $thread->title }}
        </div>
        <div class="widget-activity-footer">{{ human_time($thread->created_at) }}</div>
    </div>
@empty
    <div class="widget-activity-item">
        <div class="widget-activity-text">
            No Announcements
        </div>
    </div>
@endforelse