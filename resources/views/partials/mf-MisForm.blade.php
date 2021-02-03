<form action="{{ esc_url( admin_url('admin-post.php') ) }}" method="POST">
  <div class="mf-Field">
    <label for="" class="mf-Label">{{ $mis->name }}</label>
    <input type="text" name="value" value="{{ $current_value }}">
    @if(isset($_GET['mis_saved_' . $mis->slug]) && $_GET['mis_saved_' . $mis->slug] )
      <div class="mf-Message">Saved!</div>
    @endif
  </div>
  {!! wp_nonce_field("save_mis_$mis->slug") !!}
  <input type="hidden" name="user_id" value="{{ get_current_user_id() }}">
  <input type="hidden" name="slug" value="{{ $mis->slug }}">
  <input type="hidden" name="meta_key" value="{{ $mis->meta_key }}">
  <input type="hidden" name="redirect" value="{{ add_query_arg( 'mis_saved_' . $mis->slug, 1, get_permalink() ) }}">
  <input type="hidden" name="action" value="update_user_mis">
  <input class="mf-Submit" type="submit" value="submit">
</form>
