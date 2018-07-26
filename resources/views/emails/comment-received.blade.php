Hi {{ $team->name }},

You've got a new comment on your page.
<br>
Comment content:

<p>
    {{ $team->comments->last()->content }}
</p>