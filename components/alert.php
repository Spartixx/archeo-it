<?php function alert($message = 'une alerte est survenue !', $type = 'success' || 'danger' || 'warning') {

    switch ($type) {
        case 'success':
            $color = 'green';
            $img = "check.png";
            break;

        case 'warning':
            $color = 'orange';
            $img = "warning.png";
            break;

        case 'danger':
            $color = 'red';
            $img = "cross.png";
            break;

        default:
            $color = 'success';
            $img = "check.png";
            break;
    }


    echo '<div class="flex flex-row justify-between h-20 w-auto m-10 p-4 rounded-2xl border-2 opacity-75 border-'.$color.'-300 bg-'.$color.'-200 alertForm" id="alertForm">
        
        <div class="flex flex-row justify-start items-center gap-5">
            <img class="w-9 h-9 " src="../assets/img/icons/'.$img.'" alt="state icon">
            <p class="text-'.$color.'-800 font-bold" >'.$message.'</p>
        </div>

        <button name="crossBtn" id="alertBtn" class="alertBtn">
            <img class="w-12 h-12 pl-3 py-2 border-l-2 border-'.$color.'-600 transition hover:scale-115" src="../assets/img/icons/cross.png" alt="cross icon" onClick=>
        </button>

    </div>';
}
?>


