<?php 
require_once('class.parsecsv.php');
$valid_formats = array("csv");
if( isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" and isset($_FILES)){

    $name = $_FILES['fl-seo-data-csv']['name'];
    $size = $_FILES['fl-seo-data-csv']['size'];
    $path = $_POST['upload_dir'];
    
    if(strlen($name)){
        
        $ext = getExtension($name);
        if(in_array($ext,$valid_formats)){
            if($size < (8192*8192) ){
                $actual_csv_name = 'yoast-meta-data-' . time().substr(str_replace(" ", "_", $ext), 5).".".$ext;
                $tmp = $_FILES['fl-seo-data-csv']['tmp_name'];
                if(move_uploaded_file($tmp, $path . '/' . $actual_csv_name)){

                    $csv = new parseCSV( $path . '/' . $actual_csv_name );

                    $records = sizeof( $csv->data );
                    
                    $data = array_keys( $csv->data[0] );
                    $node = '';
                    for( $c=0; $c <= sizeof($data); $c++ ){
                        // $node .= "<li>{" . trim(preg_replace('<\W+>', "_", $data[$c]), "_") . "}</li>";
                        $node .= ( isset($data[$c]) ) ? "<li data-column='" . trim( $data[$c] ) . "' class='draggable'><code><i class='fa fa-arrows-alt'></i> {" . trim( $data[$c] ) . "}</code></li>" : '';
                    }

                    echo "<div class='updated autohide'>
                            <p>CSV has been successfully uploaded. There are <strong>" . sizeof( $csv->data ) . "</strong> records found. Now help me prepare your data by dragging the items from the right to any textbox in the left.</p>
                        </div>

                        <div class='notice inline notice-warning notice-alt taxonomy' style='display: none;'>
                            <p>You are about to import a taxonomy. Please note that only <strong><code>SEO meta title</code></strong> and <strong><code>SEO meta description</code></strong> will be updated.</p>
                        </div>
                        
                        <div class='csv-tree-wrap'>

                            <div class='two-third' style='width: 75%; float: left;'>
                                <h3 style='color: #999;'>Drag elements from the right to the corresponding textbox below <a class='tooltip' href='#' onclick='return false;' rel='tooltip' title='The input fields below are copycat of SEO metabox which will be passed as custom fields during import. Help me identify your data by dragging the items from the right to any of the textbox below.'>&nbsp;</a></h3>
                                <div id='csv_xml_form'>
                                    <fieldset data-column='post-id'>
                                        <legend>Post or Page ID <a class='tooltip' href='#' onclick='return false;' rel='tooltip' title='Required. Post or page ID (or Taxonomy ID if importing Taxonomy)'>&nbsp;</a></legend>
                                        <div class='drag-element'><input placeholder='Required' readonly style='background: #fff;' type='text' id='csv-column-id' class='widefat droppable' value=''></div>
                                    </fieldset>
                                    <fieldset data-column='post-type'>
                                        <legend>Post Type <a class='tooltip' href='#' onclick='return false;' rel='tooltip' title='Required. Post Type (or Taxonomy Type if importing taxonomy).'>&nbsp;</a></legend>
                                        <div class='drag-element'><input placeholder='Required' readonly style='background: #fff;' type='text' id='csv-column-post-type' class='widefat droppable' value=''></div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>SEO Meta Title <a class='tooltip' href='#' onclick='return false;' rel='tooltip' title='SEO Meta Title. To use WordPress default, leave empty to skip from bulk update.'>&nbsp;</a></legend>
                                        <div class='drag-element'><input placeholder='Optional' readonly style='background: #fff;' type='text' id='csv-column-seo-title' class='widefat droppable' value=''></div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>SEO Meta Description <a class='tooltip' href='#' onclick='return false;' rel='tooltip' title='SEO Meta Description. To use WordPress default, leave empty to skip from bulk update.'>&nbsp;</a></legend>
                                        <div class='drag-element'><input placeholder='Optional' readonly style='background: #fff;' type='text' id='csv-column-description' class='widefat droppable' value=''></div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>SEO Meta Keywords <a class='tooltip' href='#' onclick='return false;' rel='tooltip' title='SEO Meta Keywords. To use WordPress default, leave empty to skip from bulk update.'>&nbsp;</a></legend>
                                        <div class='drag-element'><input placeholder='Optional' readonly style='background: #fff;' type='text' id='csv-column-keywords' class='widefat droppable' value=''></div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>SEO Focus Keywords <a class='tooltip' href='#' onclick='return false;' rel='tooltip' title='SEO Focus Keywords. To use WordPress default, leave empty to skip from bulk update.'>&nbsp;</a></legend>
                                        <div class='drag-element'><input placeholder='Optional' readonly style='background: #fff;' type='text' id='csv-column-focus-keywords' class='widefat droppable' value=''></div>
                                    </fieldset>

                                    <div class='clear'></div>

                                    <div id='fsl-advance-fields' class='od-accordion accordion'>
                                        <h4 class='accordion-toggle' style='border-bottom: 0; line-height: 1;'><span class='dashicons1 dashicons-plus1'></span>More Fields</h4>
                                        <div class='accordion-content' style='padding-left: 0;'>
                                            <fieldset>
                                                <legend>Post or Page Title <a class='tooltip' href='#' onclick='return false;' rel='tooltip' title='Your post or page actual title (not SEO title). To use WordPress default, leave empty to skip from bulk update.'>&nbsp;</a></legend>
                                                <div class='drag-element'><input placeholder='Optional' readonly style='background: #fff;' type='text' id='csv-column-post-title' class='widefat droppable' value=''></div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Post Slug<a class='tooltip' href='#' onclick='return false;' rel='tooltip' title='Post slug. To use WordPress default, leave empty to skip from bulk update.'>&nbsp;</a></legend>
                                                <div class='drag-element'><input placeholder='Optional' readonly style='background: #fff;' type='text' id='csv-column-post-slug' class='widefat droppable' value=''></div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class='third' style='width: 25%; float: right;'>
                                <h3 style='color: #999;'>Record #1 out of " . $records . " <a class='tooltip' href='#' onclick='return false;' rel='tooltip' title='These are the columns found on your CSV file. Just drag one of these items to the corresponding textbox in the left'>&nbsp;</a></h3>
                                <ul>" . $node . "</ul>
                            </div>    

                            <div style='clear: both;'></div>

                        </div><!-- end .csv-tree-wrap -->
                            
                        <p id='import-button-wrap'><input type='submit' id='start-import' class='button button-primary' data-file='" . $path . '/' . $actual_csv_name . "' value='Start Import' data-json='" . json_encode( $data ) . "'></p>";

                }
                else{
                    echo "Fail upload folder with read access.";
                }
            }
            else
            echo "File size max 8 MB";                    
        }
        else{
            echo '<div class="error"><p>Invalid file format. <a href="?page=fl-seo-data-csv&tab=csv_import">Please try again</a>.</p></div>';  
        }
    }
        
    else
        echo "Please select a file..!";
        
    exit;
}

function getExtension($str){

         $i = strrpos($str,".");
         if (!$i) { return ""; } 

         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}