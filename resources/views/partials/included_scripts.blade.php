<div class="ajaxLoader"><svg class="loader" width="70px" height="70px" viewBox="0 0 128 128"><g><circle cx="16" cy="64" r="16" fill="#f3d862" fill-opacity="1"/><circle cx="16" cy="64" r="14.344" fill="#f3d862" fill-opacity="1" transform="rotate(45 64 64)"/><circle cx="16" cy="64" r="12.531" fill="#f3d862" fill-opacity="1" transform="rotate(90 64 64)"/><circle cx="16" cy="64" r="10.75" fill="#f3d862" fill-opacity="1" transform="rotate(135 64 64)"/><circle cx="16" cy="64" r="10.063" fill="#f3d862" fill-opacity="1" transform="rotate(180 64 64)"/><circle cx="16" cy="64" r="8.063" fill="#f3d862" fill-opacity="1" transform="rotate(225 64 64)"/><circle cx="16" cy="64" r="6.438" fill="#f3d862" fill-opacity="1" transform="rotate(270 64 64)"/><circle cx="16" cy="64" r="5.375" fill="#f3d862" fill-opacity="1" transform="rotate(315 64 64)"/><animateTransform attributeName="transform" type="rotate" values="45 64 64;90 64 64;135 64 64;180 64 64;225 64 64;270 64 64;315 64 64;0 64 64" calcMode="discrete" dur="720ms" repeatCount="indefinite"></animateTransform></g></svg></div>
<?php $nocache_hash = \md5(time()); ?>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/jquery.cookie.js') }}"></script>
<script src="{{ asset('js/modernizr.custom.js') }}"></script>
<script src="{{ asset('js/jquery.responsImg.min.js') }}"></script>
<script src="{{ asset('js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/tabs.min.js') }}"></script>
<script src="{{ asset('js/jquery.date-dropdowns.js') }}"></script>
<script src="{{ asset('js/swiper.min.js') }}"></script>
<script src="{{ asset('js/sticky.min.js') }}"></script>
<script src="{{ asset('js/iframeResizer.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
@if (\App::getLocale() != 'en')
    <script src="{{ asset('js/jquery.validate.messages_' . \App::getLocale() . '.js') }}"></script>
@endif
<script src="{{ asset('js/validation.js') }}?v={{ $nocache_hash }}"></script>
<script src="{{ asset('js/main.js') }}?v={{ $nocache_hash }}"></script>
<script src="{{ asset('js/depo.js') }}?v={{ $nocache_hash }}"></script>



<script type="text/javascript">
/*
var chatButton;
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://lepreconcasino.ladesk.com/scripts/track.js',
function(e){ 

if( $('#personal_data input[name="name"]').val() != undefined && $('#personal_data input[placeholder="Email"]').val() != undefined  )
{
		LiveAgent.setUserDetails($('#personal_data input[placeholder="Email"]').val(),$('#personal_data input[name="name"]').val()); 
}

chatButton = LiveAgent.createButton('f4e35ce2', e); 

});

$(document).ready(function(){
	
});
*/
</script>


