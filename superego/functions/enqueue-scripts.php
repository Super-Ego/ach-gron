<?

// Enqueue scripts
function site_scripts()
{

  // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
  global $wp_styles;

  /* SCRIPTS */

  // Register Main JS
  wp_enqueue_script('main', THEME . '/assets/scripts/dist/main.js', ['jquery'], filemtime(DIR . '/assets/scripts/dist/main.js'), true);

  // Register GSAP JS  (CDN)
  wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.2/gsap.min.js', ['jquery'], null, true);

  // Register GSAP JS SrollTrigger  (CDN)
  wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.2/ScrollTrigger.min.js', ['jquery', 'gsap'], null, true);

  // Register gsap
  wp_enqueue_script('gsap-client', THEME . '/assets/scripts/gsap.js', ['jquery', 'gsap'], filemtime(DIR . '/assets/scripts/gsap.js'), true);

  // Register Formidable JS (Enable on pages / blocks with Formidable forms)
  //wp_enqueue_script('formidable-js', THEME . '/assets/scripts/formidable.js', ['jquery'], filemtime(DIR . '/assets/scripts/formidable.js'), false);

  // Register frontpage script & stylesheet
  //if (is_front_page()) :
  //wp_enqueue_style('home-style', THEME . '/assets/styles/css/home.css', [], filemtime(DIR . '/assets/styles/css/home.css'), 'all');
  //wp_enqueue_script('home-js', THEME . '/assets/scripts/home.js', ['jquery'], filemtime(DIR . '/assets/scripts/home.js'), false);
  //endif;

  /* STYLESHEETS */

  // Register Theme style.css (Used for Custom properties in backend)
  wp_enqueue_style('style', get_stylesheet_uri(), [], filemtime(DIR . '/style.css'), 'all');

  // Register main stylesheet
  wp_enqueue_style('main-style', THEME . '/assets/styles/css/main.css', [], filemtime(DIR . '/assets/styles/css/main.css'), 'all');
  wp_enqueue_style('tailwind-style', THEME . '/assets/styles/css/style.css', [], filemtime(DIR . '/assets/styles/css/style.css'), 'all');

  // Register Bootstrap Grid Style
  wp_enqueue_style('bootstrap-5-grid', THEME . '/assets/styles/vendors/bootstrap-grid.min.css', [], filemtime(DIR . '/assets/styles/vendors/bootstrap-grid.min.css'), 'all');

  // Register Cookieinformation Style (Enable if Cookieinformation)
  //wp_enqueue_style('cookieinformation-style', THEME . '/assets/styles/cookieinformation.css', [], filemtime(get_template_directory() . '/assets/styles/cookieinformation.css'), 'all');

  /* FONTS */

  // Register Google fonts from Customizer
  if (get_theme_mod('setting_google_fonts')) :
    wp_enqueue_style('google-fonts', get_theme_mod('setting_google_fonts'), [], null);
  endif;

  // Register Adobe Typekit from Customizer
  if (get_theme_mod('setting_adobe_typekit')) :
    wp_enqueue_style('adobe-typekit', get_theme_mod('setting_adobe_typekit'), [], null);
  endif;

  // Register logged-in styling
  if (is_user_logged_in()) :
    wp_enqueue_style('logged-in', THEME . '/assets/styles/css/logged-in.css', [], filemtime(DIR . '/assets/styles/css/logged-in.css'), 'all');
  endif;
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);

// Remove wp version param from any enqueued scripts
// function remove_version($src)
// {
//   if (strpos($src, 'ver='))
//     $src = remove_query_arg('ver', $src);
//   return $src;
// }
// add_filter('style_loader_src', 'remove_version', 9999);
// add_filter('script_loader_src', 'remove_version', 9999);
