<div class="avatar d-block" style="background-image: url('{{asset($user->avatar)}}')">
    <span class="avatar-status {{$user->isOnline() ? 'bg-green' : 'bg-muted'}}"></span>
</div>