 <header class="header">
   <div class="menu-trigger">
     <div id="trigger-wrap">
       <span></span>
       <span></span>
       <span></span>
     </div>
   </div>

   <nav class="nav-menu">
     <!-- 動的にmenuを表示 -->
     <?php wp_nav_menu(array(
        'theme_location' => 'mainmenu',
        'container' => '',
        'menu_class' => '',
        'items_wrap' => '<ul>%3$s</ul>'
      )); ?>
   </nav>
 </header>