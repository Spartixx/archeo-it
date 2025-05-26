<?php function alert($message = 'une alerte est survenue !', $type = 'success') {

    echo '<div class="flex flex-row justify-between h-20 w-auto m-10 p-4 rounded-2xl border-2 opacity-75 border-green-300 bg-green-200">
        <div class="flex flex-row justify-start items-center gap-5">
            <img class="w-9 h-9 " src="../assets/img/icons/check.png" alt="check icon">
            <p class="text-green-800 font-bold" >  </p>
        </div>

        <img class="w-12 h-12 pl-3 py-2 border-l-2 border-green-600 transition hover:scale-110 duration-200" src="../assets/img/icons/gray_cross.png" alt="cross icon">

    </div>';

}

alert();
?>


