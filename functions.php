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
function pagenation($pages = '', $range = 2){
    $showtimes = ($range * 2)+1; //5ページを格納
    global $paged; //wpの変数　現在のページは何ページ目か
    if(empty($paged)){
        var_dump('これ');
        $paged = 1;
    } 
    if($pages == ''){ //pagesが空の場合に
        var_dump('それ');
        global $wp_query;
        $pages = $wp_query->max_num_pages;
     
        if(!$pages){
            var_dump('あれ');
            $pages = 1;
        }
    }
  
    if( 1!=$pages){
        echo "<div class=\"pagenation\">\n";
        echo "<ul>\n";
        //現在のページが1より大きい場合
        if($paged > 1) echo "<li class=\"prev\"><a href=' ".get_pagenum_link($paged-1)." '>Prev</a></li>\n";

        //
        for($i = 1; $i < $pages; $i++){
            if(1 != $pages && (!($i >= $paged+$range+1 || $i  <= $paged-$range -1) || $pages <= $showtimes)){
                echo ($paged == $i)? "<li  class=\"active\">".$i."</li>\n":"<li><a href=' ".get_pagenum_link($i)." '>".$i."</a></li>\n";
            }
        }
        if($paged<$pages)echo"<li class=\"next\"><a href=\"".get_pagenum_link($paged+1)."\">Next</a></li>\n";
        echo "</ul>\n";
        echo"</div>\n";
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
function add_custom_inputbox(){
    //第１　編集画面のhtmlに挿入されるid属性名
    //第２　管理画面に表示されるカスタムフィールド名
    //第３　メタボックスの中に出力される関数名
    //第４　管理画面に表示するカスタムフィールドの場所(postなら投稿、pageなら固定ページ)
    //第５  配置される順序
    add_meta_box('about_id', 'ABOUT入力欄', 'custom_area', 'page', 'normal');
}

//管理画面に表示される内容
function custom_area(){
    global $post; //かならず
    //入力用のhtml
    echo 'コメント : <textarea cols="50" rows="5" name="about_msg">'.get_post_meta($post->ID, 'about', true).'</textarea><br>';
}




//投稿ボタンを押した時のデータ更新と保存  
 //$post_idは振り分けられるidの事
function save_custom_postdata($post_id){
    $about_msg = '';

    if(isset($_POST['about_msg'])){
        $about_msg = $_POST['about_msg'];
    }
    if($about_msg != get_post_meta($post_id, 'about', true)){
        //id 保存したいキーの情報　上書きたい値
        update_post_meta($post_id, 'about', $about_msg);
    //入力された情報がからの場合、dbの情報も空にしなければいけないので、
     //第３にはdbの情報　trueをもっている値
    }elseif($about_msg == ''){
        delete_post_meta($post_id, 'about', get_post_meta($post_id, 'about', true));
    }
}


?>