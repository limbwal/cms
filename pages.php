<!DOCTYPE html>
<?php
    require "cms/functions.php";
    if (!isLoggedIn()) {
        die(); // if they aren't logged in, they have no business being here.
    }
?>
<html>
    <head>
        <script src="/res/jquery-3.2.1.min.js"></script>
        <script src="/res/jquery.cookie.js"></script>
        <script src="/js/pages.js"></script>    
        <link rel="stylesheet" href="/css/styles.css">
    </head>
    
    <body>
        <br>
        <br>
        <button id="newPageButton" class="center-me button">Add New Page</button>
        <div id="newPageForm" class="modal center">
          <div class="modal-content center">
            <span class="close">&times;</span>
              <form onsubmit="makeNewPage()">
                <ul class="form-style-1">
                    <li><label>Page Name <span class="required">*</span></label><input type="text" id="name" class="field-divided" placeholder="Page Name" />&nbsp;</li>
                    <li>
                        <label>Page Title <span class="required">*</span></label>
                        <input type="text" name="title" id="title" placeholder="Page Title" class="field-divided" />
                    </li>
                    <li>
                        <input type="submit" value="Make New Page" />
                    </li>
                </ul>
            </form>
            </div>
        </div>
    </body>
</html>