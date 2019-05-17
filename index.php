<?php get_header(); ?>
    
    <!-- メニュー -->
   <?php get_template_part('content', 'menu'); ?>

   
    <main>
      <!-- gridレイアウト　container-fulidかcontainer -->
      <section class=" hero container-fluid">
        <div class="hero-title">
          <h2>Wordpress　Template</h2>
        </div>
      </section>

        <section class="container-fluid main-contents">
         <div class="row">
            <div class="col">
              
            </div>

            <section class="col-8 main-content">
              <div class="middle-content">

                <div id="home">
                  <h1 class="content-title">ABOUT</h1>
                  <p>
                    これからの社会には、〇〇のようなITシステムの必要性を感じ創業して以来15年、ＩＴ社会の成長とともに私たちも成長してまいりました。
 
                    「お客様に最高の満足度を提供する」という経営理念の下、私たちが提供させていただいているシステムが、より皆様の身近な存在になるべく、システム内容の向上や最新技術の導入、また市場調査やマーケットの開拓などに、全社員の総力でもって取り組んでまいりました。
                    
                    私たちのシステムが、皆様一人ひとりの快適な未来へつながっていく、その強い想いを持ってこれからも日々あらゆる事業に邁進していく所存です。
                    
                    今後とも益々のご支援とご愛好を賜りますようお願い申し上げます。
                  </p>
                </div>

                <div id=#recruit>
                  <h1 class="content-title">JOIN US</h1>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>業務内容</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
          
              </div>
            </section>

            <div class="col">
              
            </div>
         </div>
        </section>

    </main>

 <?php get_footer(); ?>

   