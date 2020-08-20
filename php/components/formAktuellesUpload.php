    
    <?php function createFormUpload ($head, $date, $text) {?>
    <main id="main" class="flex">
        <form id="formLogin" action="" method="post" enctype="multipart/form-data" class="formLogin">
        <p class="pFormUpload"><label class="labelWriteAkt" for="butfileImage">Füge ein Bild hinzu: </label><input type="file" name="fileImage" id="butfileImage">
        </p><p class="adviceLeer"></p>
        <p class="pFormUpload"><label class="labelWriteAkt"for="date">Füge das Datum hinzu!</label><input type="date" name="date" value="<?php echo $date?>" id="date">
        </p><p class="adviceLeer"></p>
        <p class="pFormUpload"><label class="labelWriteAkt"for="head">Füge eine Überschrift ein!</label><input type="text" name="head" id="headArticle" value="<?php echo $head?>">
        </p><p class="adviceLeer"></p>
        <p class="pFormUpload"><label class="labelWriteAkt" for="text" style="width: 90%">Schreibe einen passenden Text! </label></p>
        <p class="adviceLeer"></p>
            <textarea style="width: 100%" name="text" id="text"  cols="30" rows="10" >
                <?php echo $text?>
            </textarea>
        <p class="pFormUpload"><input class="butUpload" type="submit" name="publishArticle" value="veröffentlichen"></p><p class="adviceLeer"></p>
        </form>
    </main>
    <?php
    }
    ?>