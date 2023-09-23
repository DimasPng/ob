<?php /* source file: /home/admin/web/yulialanske.ru/public_html/ob/protected/modules/admin/views/settings/up/index.php */ ?>
<?php $this->pageTitle='Обновление OrderBro' ?>


<?php 

function get_web_page( $url )
{
    $options = array(
        CURLOPT_RETURNTRANSFER => true,     // return web page
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => "",       // handle all encodings
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
        CURLOPT_TIMEOUT        => 120,      // timeout on response
        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
    );

    $ch      = curl_init( $url );
    curl_setopt_array( $ch, $options );
    $content = curl_exec( $ch );
    $err     = curl_errno( $ch );
    $errmsg  = curl_error( $ch );
    $header  = curl_getinfo( $ch );
    curl_close( $ch );

    $header['errno']   = $err;
    $header['errmsg']  = $errmsg;
    $header['content'] = $content;
    return $header;
}

?>


    <div class="col">
        <!-- main header -->
        <div class="bg-light lter b-b wrapper-md">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h1 class="m-n font-thin h3 text-black">Обновление</h1>
                    <small class="text-muted">Обновление</small>
                </div>                                
            </div>
        </div>
        <!-- / main header -->
        <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
            <div class="panel panel-default">
                
                <form action="" method="post">                   
                    
                    <fieldset>

                    <legend>Проверка и обновление OrderBro</legend>

                    <?php 
                            if($_POST["update"]=="true")
                            {
                                 //копируем с моего сайта обновление, чтобы не мешать с дистрика
                                copy('http://raten.mcdir.ru/ob.zip', $_SERVER['DOCUMENT_ROOT'].'/ob/ob.zip');

                                $zip = new ZipArchive;
                                $res = $zip->open($_SERVER['DOCUMENT_ROOT']."/ob/ob.zip");
                               
                                if ($res === TRUE) {
                                  $zip->extractTo($_SERVER['DOCUMENT_ROOT']."/ob/");
                                  $zip->close();
                                }

                                $last = get_web_page( "http://raten.mcdir.ru/version.txt" );
                                $last_version = $last['content'];
                                file_put_contents($_SERVER['DOCUMENT_ROOT']."/ob/version.txt", $last_version);
                                echo "<h3 style='margin-left:20px;'>Обновления успешно установлены.</h3>";
                            }


                            $current = get_web_page( $_SERVER['SERVER_NAME']."/ob/version.txt" );
                            $last = get_web_page( "http://raten.mcdir.ru/version.txt" );
                            if($current['content']<$last['content'])
                            { ?>
                                <h2 style="margin-left:20px;">Доступно новое обновление</h2>
                                 <fieldset class="submit" style="width: 400px;margin-top:30px;"> 
                                        <button class="submit btn m-b-xs  btn-primary btn-addon btn-lg">Обновить OrderBro</button>
                                </fieldset>
                                <input type="hidden" name="update" value="true">

                            <?php }  else
                            {
                                echo "<h3 style='margin-left:20px;'>Новых обновление не найдено...</h3>";
                            }
                               
                            
                    ?>

                    <br>
                    
                    <p></p>
                        

                    </fieldset>

                   
                </form>

            </div>

        </div>
    </div>