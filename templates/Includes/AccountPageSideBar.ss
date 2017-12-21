<div class="sidebar col-md-3">
    <ul class="nav nav-stacked">
        <% loop $AccountLinks %>
            <li><a href="{$Link}">{$Title}</a></li>
        <% end_loop %>
    </ul>
</div>