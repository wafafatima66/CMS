@foreach ($comments as $comment)
<div class="card slider-card mt-4">

    <div class="card-body p-4 ">

        <h6 class="text-muted">{{ $comment->user->name }}</h6>
        
        <p class="">{{ $comment->comment }}</p>

    </div>

</div>
@endforeach