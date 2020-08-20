<main id="main" class="flex">
    <form class="form_termin_links" method="POST">
        <h2 class="h2Main">Ein Termin für die Seite!</h2>
            <p class="wrapper_inputs_termine">Titel<br><input type="text" name="title_appointement" value="<?php echo $title_appointement?>"></p>
            <p class="wrapper_inputs_termine">Beschreibung</p><textarea type="text" name="descr_appointement" placeholder="Beschreibe den Termin">value="<?php echo $descr_appointement?></textarea>
            <p class="wrapper_inputs_termine">Datum<br><input type="date" name="date_appointement" value="<?php echo $date_appointement?>"></p>
            <p class="wrapper_inputs_termine">Uhrzeit<br><input type="text" name="time_appointement" value="<?php echo $time_appointement?>"></p>
            <p class="wrapper_inputs_termine">Ort<br><input type="text" name="location_appointement"></p>
            <p class="wrapper_inputs_termine"><input class="butUpload" type="submit" name="publish_appointement" value="veröffentlichen" value="<?php echo $location_appointement?>"></p>
    </form>
    <form class="form_termin_links" method="POST">
            <h2 class="h2Main">Unser nächstes Treffen: </h2>
            <p class="wrapper_inputs_termine">Datum<br><input type="date" name="date_next_meeting"></p>
            <p class="wrapper_inputs_termine">Uhrzeit<br><input type="text" name="time_next_meeting"></p>
            <p class="wrapper_inputs_termine">Ort<br><input type="text" name="location_next_meeting" id="location_next_meeting"></p>
            <p class="wrapper_inputs_termine"><input class="butUpload" type="submit" name="publish_next_meeting" value="veröffentlichen"></p>
    </form>
    <?php echo $location_appointement?>
    </main>
