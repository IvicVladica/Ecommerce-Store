<?php require_once("../../resources/config.php");

if(isset($_GET['delete_slide_id'])) {

    $find_image_path = query("SELECT slide_image FROM slides WHERE slide_id = " . escape_string($_GET['delete_slide_id']) . " ");
    confirm($find_image_path);
    $row = fetch_array($find_image_path);
    $target_path = UPLOAD_DIRECTORY . DS . $row['slide_image'];
    unlink($target_path);

    $query = query("DELETE FROM slides WHERE slide_id = " . escape_string($_GET['delete_slide_id']) . " ");
    confirm($query);

    set_message("Slide deleted");
    redirect("index.php?slides");

} else {

    redirect("index.php?slides");

}



?>