<?php

// //カスタムヘッダー画像の設置
// $custom_header_defaults = array(
//     'default-image'=>get_bloginfo('template_url').'ここにurl',
//     'header-text'=>  false,
// );

// //カスタムヘッダー昨日を有効にする
add_theme_support('custom-header', $costom_header_defaults);


//カスタムメニュー使用
register_nav_menu('mainmenu', 'メインメニュー');


//ページネーション
function pagenation($pages = '', $range = 2)
{
    $showtimes = ($range * 2) + 1; //5ページを格納
    global $paged; //wpの変数　現在のページは何ページ目か
    if (empty($paged)) {
        var_dump('これ');
        $paged = 1;
    }
    if ($pages == '') { //pagesが空の場合に
        var_dump('それ');
        global $wp_query;
        $pages = $wp_query->max_num_pages;

        if (!$pages) {
            var_dump('あれ');
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<div class=\"pagenation\">\n";
        echo "<ul>\n";
        //現在のページが1より大きい場合
        if ($paged > 1) echo "<li class=\"prev\"><a href=' " . get_pagenum_link($paged - 1) . " '>Prev</a></li>\n";

        //
        for ($i = 1; $i < $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i  <= $paged - $range - 1) || $pages <= $showtimes)) {
                echo ($paged == $i) ? "<li  class=\"active\">" . $i . "</li>\n" : "<li><a href=' " . get_pagenum_link($i) . " '>" . $i . "</a></li>\n";
            }
        }
        if ($paged < $pages) echo "<li class=\"next\"><a href=\"" . get_pagenum_link($paged + 1) . "\">Next</a></li>\n";
        echo "</ul>\n";
        echo "</div>\n";
    }
}










//================================
//カスタムフィールド
//================================

//投稿するカスタムボックスを生成
add_action('admin_menu', 'add_custom_inputbox');
//追加した表示項目の更新　保存のためのアクションフック
//第一引数はsave_post 第二引数はこれから作っていくカスタムボックスの変数
add_action('save_post', 'save_custom_postdata');


//入力項目がどの投稿タイプのページに表示されるのか
function add_custom_inputbox()
{
    //第１　編集画面のhtmlに挿入されるid属性名
    //第２　管理画面に表示されるカスタムフィールド名
    //第３　メタボックスの中に出力される関数名
    //第４　管理画面に表示するカスタムフィールドの場所(postなら投稿、pageなら固定ページ)
    //第５  配置される順序
    add_meta_box('about_id', 'ABOUT入力欄', 'custom_area', 'page', 'normal');
    add_meta_box('reruit_id', 'RECRUIT欄', 'custom_area2', 'page', 'normal');
    add_meta_box('map_id', 'map入力欄', 'custom_area3', 'page', 'normal');
    add_meta_box('top_img_id', 'トップ画像URL入力', 'custom_area4', 'page', 'normal');
}

//管理画面に表示される内容
function custom_area()
{
    global $post; //かならず
    //入力用のhtml
    echo 'コメント : <textarea cols="50" rows="5" name="about_msg">' . get_post_meta($post->ID, 'about', true) . '</textarea><br>';
}
function custom_area2()
{
    global $post;
    echo '<table>';
    for ($i = 1; $i <= 12; $i++) {
        echo '<tr><td>info' . $i . ': </td><td><input  name="recruit_info' . $i . '" value="' . get_post_meta($post->ID, 'recruit_info' . $i, true) . '"></td></tr>';
    }
    echo '</table>';
}
function custom_area3()
{
    global $post;
    echo 'マップ: <textarea cols="50" rows="5" name="map">' . get_post_meta($post->ID, 'map', true) . '</textarea>';
}
function custom_area4()
{
    global $post;
    echo 'トップ画像URL :  <input type="text" name="img-top" value="' . get_post_meta($post->ID, 'img-top', true) . '"> ';
}















//投稿ボタンを押した時のデータ更新と保存  
//$post_idは振り分けられるidの事
function save_custom_postdata($post_id)
{
    $about_msg = '';
    $recruit_data = '';
    $map = '';
    $img_top = '';

    if (isset($_POST['about_msg'])) {
        $about_msg = $_POST['about_msg'];
    }
    if ($about_msg != get_post_meta($post_id, 'about', true)) {
        //id 保存したいキーの情報　上書きたい値
        update_post_meta($post_id, 'about', $about_msg);
        //入力された情報がからの場合、dbの情報も空にしなければいけないので、
        //第３にはdbの情報　trueをもっている値
    } elseif ($about_msg == '') {
        delete_post_meta($post_id, 'about', get_post_meta($post_id, 'about', true));
    }

    //recruit
    for ($i = 1; $i <= 12; $i++) {
        if (isset($_POST['recruit_info' . $i])) {
            $recruit_data = $_POST['recruit_info' . $i];
        }
        if ($recruit_data != get_post_meta($post_id, 'recruit_info' . $i, true)) {
            //id 保存したいキーの情報　上書きたい値
            update_post_meta($post_id, 'recruit_info' . $i, $recruit_data);
            //入力された情報がからの場合、dbの情報も空にしなければいけないので、
            //第３にはdbの情報　trueをもっている値
        } elseif ($recruit_data == '') {
            delete_post_meta($post_id, 'recruit_info', get_post_meta($post_id, 'recruit_info', true));
        }
    }

    //map
    if (isset($_POST['map'])) {
        $map = $_POST['map'];
    }
    if ($map != get_post_meta($post_id, 'map', true)) {
        //id 保存したいキーの情報　上書きたい値
        update_post_meta($post_id, 'map', $map);
        //入力された情報がからの場合、dbの情報も空にしなければいけないので、
        //第３にはdbの情報　trueをもっている値
    } elseif ($map == '') {
        delete_post_meta($post_id, 'map', get_post_meta($post_id, 'map', true));
    }


    //トップ画像
    if (isset($_POST['img-top'])) {
        $img_top= $_POST['img-top'];
    }
    if ($img_top!= get_post_meta($post_id, 'img-top', true)) {
        //id 保存したいキーの情報　上書きたい値
        update_post_meta($post_id, 'img-top', $img_top);
        //入力された情報がからの場合、dbの情報も空にしなければいけないので、
        //第３にはdbの情報　trueをもっている値
    } elseif ($img_top == '') {
        delete_post_meta($post_id, 'img-top', get_post_meta($post_id, 'img-top', true));
    }
}





//================================
//カスタムヴィジェット -->これはpanelのヴィジェット(今回は使わない)
//================================
//ヴィジェットエリアを作成する関数はどれか
add_action('widgets_init', 'my_widgets_area');
//ヴィジェット自体を作成する関数はどれか
add_action('widgets_init', create_function('', 'return register_widget("my_widgets_item1");'));

//ヴィジェットエリアを作成する
function my_widgets_area(){
    register_sidebar(array(
        //パネル
        //idと　ヴィジェットエリアをなにで囲むか
        'name'=>'メリットエリア',
        'id'=>'widget_merit',
        'before_widget'=>'<div>',
        'after_widget'=>'</div>'
    ));
    register_sidebar(array(
        //ブログのサイドバー
        'name'=>'right_sidebar',
        'id'=>'my_sidebar',
        'before_widget'=>'<div>',
        'after_widget'=>'</div>',
        'before_title'=>'<h2>',
        'after_title'=>'</h2>'
    ));
}



//ヴィジェット自体を作成する
class my_widgets_item1 extends WP_widget{
    //初期化
    function my_widgets_item1(){
        parent::WP_Widget(false, $name = 'メリットヴィジェット');
    }

    //ヴィジェットの入力項目を作成する処理
    function form($instance){
        //サニタイズ ヴィジェットから入力された情報 hTMLのタグを閉じる
        $title = esc_attr($instance['title']);
        $body = esc_attr($instance['body']);
    ?>
        <p>
         <label for="<?php echo $this->get_field_id('title'); ?>">
            <?php echo 'タイトル'; ?>
         </label>
         <!--このname属性とfor属性を同じにすること -->
         <input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title') ?>" type="text"
          value="<?php echo $title; ?>">
        </p>
        <p>
         <label for="<?php echo $this->get_field_id('body'); ?>">
            <?php echo '内容'; ?>
         </label>
         <textarea class="widget" rows="16" cols="20" id="<?php echo $this->get_field_id('body'); ?>" name="<?php echo $this->get_field_name('body'); ?>"><?php echo $body; ?></textarea>
        </p>
    <?php 
    }

    //ヴィジェットに入力された情報を保存する処理
    function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']); //サニタイズ
        $instance['body'] = trim($new_instance['body']);  //trim　は前後の空白を削除　文章の一部にリンクをつけたりできる

        return $instance;
    }

    //管理画面から入力されたヴィジェットを(HTMLの形式で)画面に表示する処理　//パネルのような形式で表示させる
    function widget($args, $instance){
        //配列を変数に展開　引数名を変数に格納
        extract($args);
        //ヴィジェットから入力した情報を取得
         //apply_filtersはwpでの処理を挟んで、DBに保存する
        $title = apply_filters('widget_title', $instance['title']);
        $body = apply_filters('widget_body', $instance['body']);

        //ヴィジェットを出力 ヴィジェットから入力された情報がある場合、htmlを表示する
        if($title){
    ?>
        <section class="panel">
            <h2><?php echo $title; ?></h2>
            <p>
               <?php echo $body; ?> 
            </p>
        </section>
    <?php 
        }
    }
}
?>