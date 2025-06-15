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

    echo '<link rel="stylesheet" href="../assets/css/main.css" >
    <div class="absolute z-100 flex flex-row justify-end w-full">
        <div class="flex flex-row justify-between h-17 w-fit m-10 p-4 rounded-2xl border-2 opacity-100 border-'.$color.'-600 bg-'.$color.'-300/60 translate-y-4 shake alertForm" id="alertForm">

            <div class="flex flex-row justify-start items-center gap-5">
                <img class="w-9 h-9 " src="../assets/img/icons/'.$img.'" alt="state icon">
                <p class="text-'.$color.'-800 font-bold" >'.$message.'</p>
            </div>

            <button name="crossBtn" id="alertBtn" class="alertBtn flex items-center">
                <img class="w-12 h-12 pl-3 py-2 ml-4 border-l-2 border-'.$color.'-700 transition hover:scale-115" src="../assets/img/icons/cross.png" alt="cross icon" onClick=>
            </button>

        </div>
    </div>';
}
?>


