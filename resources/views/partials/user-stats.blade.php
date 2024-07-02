<div class="stats shadow mx-auto">
    <div class="stat place-items-center">
        <div class="stat-figure text-primary">
            <div class="avatar">
                <div class="w-24 rounded-full">
                    <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }} profile photo">
                </div>
            </div>
        </div>
        <div class="stat-title"></div>
        <div class="stat-value">{{ auth()->user()->name }}</div>
        <div class="stat-desc">{{ auth()->user()->email }}</div>
    </div>

    <div class="stat place-items-center">
        <a href="{{ route('friend.add') }}">
            <div class="stat-title">Friends</div>
            <div class="stat-value text-secondary">{{ auth()->user()->friends->count() }}</div>
            <div class="stat-desc text-secondary"></div>
        </a>
    </div>

    <div class="stat place-items-center">
        <div class="stat-title">Messages</div>
        <div class="stat-value">{{ auth()->user()->messages->count() }}</div>
        <div class="stat-desc"></div>
    </div>
</div>
