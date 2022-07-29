<div class="{{$class ?? ''}} p-0">
    <div class="auto-container">
        <div class="bravo-text text-box">
            {!! clean($content ?? '') !!}
        </div>
    </div>
</div>

<style>
    .bravo-text.text-box h2 {
        margin-top: 24px !important;
    }

    .bravo-text.text-box p {
        font-size: 16px !important;
    }
</style>
