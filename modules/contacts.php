<!---------- Модальное окно контактов ---------->

<div class='modal' id='contacts-modal'>
        <div class='close'>X</div>
        <div class='content'>
            <ul id = "friends_list">
                <?php
                    include "modules/friend_list.php";
                ?>
            </ul>    
        </div>    
    </div>