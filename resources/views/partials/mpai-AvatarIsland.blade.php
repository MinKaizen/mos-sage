<div class="mpai-AvatarIsland">
  <div class="mpai-AvatarWrapper">
    {!! get_avatar( get_current_user_id(), 200 ) !!}
  </div>
  <div class="mpai-AvatarUpload">
    @shortcode('[avatar_upload]')
  </div>
  <div class="mpai-Details">
    <div class="mpai-Details_Label mpai-Details_Label-username">Username:</div>
    <div class="mpai-Details_Value mpai-Details_Value-username">@shortcode('[mos_username]')</div>
    <div class="mpai-Details_Label mpai-Details_Label-Level">Level:</div>
    <div class="mpai-Details_Value mpai-Details_Value-Level">@shortcode('[mos_level]')</div>
    <div class="mpai-Details_Label mpai-Details_Label-Progress">Course Status:</div>
    <div class="mpai-Details_Value mpai-Details_Value-Progress">{{ \App\free_course_progress()['formatted'] }}</div>
  </div>
</div>
