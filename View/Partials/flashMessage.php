<?php if (!empty($_SESSION['flashMessage'])) { 
        if ($_SESSION['flashMessage']["status"] == "success") {
            echo '<div class="alert alert-success alert-dismissible fade show text-center m-4" role="alert">';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show text-center m-4" role="alert">';
        }
        
        echo $_SESSION['flashMessage']["message"];
        unset($_SESSION['flashMessage']); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>