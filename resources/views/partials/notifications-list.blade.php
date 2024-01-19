@if(count($notifications) > 0)
    <ul class="list-group">
        @foreach($notifications as $notification)
            <?php
//                dd($notification);
                ?>
            <li class="list-group-item" style="--tw-bg-opacity: 1; background-color: rgb(209 239 222/var(--tw-bg-opacity)); padding: 10px; border-radius: 15px; margin: 5px;">
                <h6 class="text-bold">{{ $notification['subject'] ?? null }}</h6>
                <small class="text-muted">{{ !empty($notification['created_at']) ? date('j F, Y H:i:s A', strtotime($notification['created_at'])) : null }}</small><br>
                <small class="text-black">{{ $notification['message'] ?? null }}</small>
            </li>
        @endforeach
    </ul>
@else
    <p>No new notification found.</p>
@endif
