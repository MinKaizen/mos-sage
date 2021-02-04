<form class="mf-MisForm"
      action="{{ esc_url( admin_url('admin-post.php') ) }}"
      method="POST">
  <div class="mf-Body @if(isset($_GET['mis_saved_' . $mis->slug]) && $_GET['mis_saved_' . $mis->slug] )mf-Body-saved @endif">
    <div class="mf-Fields">
      <label class="mf-Label" for="" class="mf-Label">{{ $mis->name }} ID:</label>
      <input class="mf-Input"type="text" name="value" value="{{ $current_value }}">
      <input class="mf-Submit" type="submit" value="Save">
    </div>
    @if(isset($_GET['mis_saved_' . $mis->slug]) && $_GET['mis_saved_' . $mis->slug] )
      <span class="mf-Saved">✓Saved</span>
    @endif
  </div>
  {!! wp_nonce_field("save_mis_$mis->slug") !!}
  <input type="hidden" name="user_id" value="{{ get_current_user_id() }}">
  <input type="hidden" name="slug" value="{{ $mis->slug }}">
  <input type="hidden" name="meta_key" value="{{ $mis->meta_key }}">
  <input type="hidden" name="redirect" value="{{ add_query_arg( 'mis_saved_' . $mis->slug, 1, get_permalink() ) }}">
  <input type="hidden" name="action" value="update_user_mis">
</form>
