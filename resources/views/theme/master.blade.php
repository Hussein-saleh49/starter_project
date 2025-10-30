<!DOCTYPE html>
<html lang="en">
@include("theme.parials.head")
<body>

 @include("theme.parials.header_nav")

  <main class="site-main">  

    @include("theme.parials.hero")
  

    @yield("content")

  </main>

 @include("theme.parials.footer")
  
 @include("theme.parials.scripts")
</body>
</html>