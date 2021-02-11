<form class="mf-MisForm"
      action="{{ esc_url( admin_url('admin-post.php') ) }}"
      method="POST">
  <div class="mf-Body @if($is_saved)mf-Body-saved @endif">
    <div class="mf-Fields">
      <label class="mf-Label" for="" class="mf-Label">{{ $mis->name }} ID:</label>
      <input class="mf-Input"type="text" name="value" value="{{ $current_value }}">
      <input class="mf-Submit" type="submit" value="Save">
    </div>
    @if($is_saved)<span class="mf-Saved">✓Saved</span>@endif
    @if($is_error)<span class="mf-Error">✗ {{ $error_message }}</span>@endif
  </div>
  {!! wp_nonce_field("save_mis_$mis->slug") !!}
  <input type="hidden" name="user_id" value="{{ get_current_user_id() }}">
  <input type="hidden" name="slug" value="{{ $mis->slug }}">
  <input type="hidden" name="meta_key" value="{{ $mis->meta_key }}">
  <input type="hidden" name="redirect" value="{{ get_permalink() }}">
  <input type="hidden" name="action" value="update_user_mis">
</form>
