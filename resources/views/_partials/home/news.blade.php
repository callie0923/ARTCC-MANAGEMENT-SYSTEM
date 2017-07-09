@forelse($threads as $thread)
    <div class="widget-activity-item">
        <div class="widget-activity-text">
            <a href="{{ route('forum.thread', [$thread->board->category, $thread->board, $thread]) }}">{{ $thread->title }}</a>
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