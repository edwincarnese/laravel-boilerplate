<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{ config('app.url') }}" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="{{ config('app.name', 'Laravel') }}" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
  </a>

  @include('partials.sidebar')
</aside>