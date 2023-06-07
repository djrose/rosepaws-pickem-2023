{{-- FOOTER SCRIPTS --}}

<script src="{{ mix('js/app.js') }}"></script>
<script src="/js/sweetalert.min.js"></script>

{{-- JQUERY V2.1.4 --}}
<!-- jQuery Local Library in case Google Developer CDN did not load -->
<script>
  (function(jqueryLocalPath) {
    if (!window.jQuery) {
      var dynamicScriptEl = document.createElement('script');
      dynamicScriptEl.src = jqueryLocalPath;
      document.write(dynamicScriptEl.outerHTML);
    }
  })('/js/vendor/jquery/jquery.min.js');
</script>

<!-- jQuery Validate -->
<script src="/js/vendor/jquery/jquery.validate.min.js"></script>

<script>
//FORM VALIDATION
//leveraging jquery validate plugin and adding custom methods, then adding those methods to the rules
$(function() {
  jQuery.validator.addMethod("StrongerEmail", function(value, element) {
      // allow any non-whitespace characters as the host part
      return this.optional(element) || /^([A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)){2,}@(([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)){2,}\.([A-Za-z]{2,})$/.test(value);
  }, 'Please enter a valid Email Address.');
  jQuery.validator.addMethod("BasicPhone", function(value, element) {
      // allow any non-whitespace characters as the host part
      return this.optional(element) || /^(\(?\+?[0-9]{5,}\)?)?[0-9_\- \(\)]{5,}$/.test(value);
  }, 'Please enter a valid Phone Number.');
});
</script>
