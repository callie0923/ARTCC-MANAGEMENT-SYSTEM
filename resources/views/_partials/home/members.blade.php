@forelse($members as $member)

    <div class="widget-activity-item">
        <div class="widget-activity-text">
            Welcome {{ $member->user->full_name }} to the ARTCC!
        </div>
        <div class="widget-activity-footer">{{ human_time($member->created_at) }}</div>
    </div>

@empty

    <div class="widget-activity-item">
        <div class="widget-activity-text">
            No New Members
        </div>
    </div>

@endforelse