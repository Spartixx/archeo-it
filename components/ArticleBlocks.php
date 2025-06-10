<?php
function addParagraph()
{
    echo '
    <div id="tempParagraph" class="flex flex-col gap-3 items-center bg-yellow-950/10 p-2 rounded-xl">

        <textarea class="w-full h-fit border-1 rounded-xl p-2" name="paragraphTemp" id="paragraphTemp" cols="10" rows="10" placeholder="Entrez votre texte"></textarea>
    
        <div class="flex flex-row gap-5">
            <button type="button" id="fixTempParagraph" class="bg-green-700 rounded-3xl text-2xl p-2 text-white">Valider</button>
            <button type="button" id="delTempParagraph" class="bg-red-700 rounded-3xl text-2xl p-2 text-white">Supprimer</button>
        </div>
        
        <div id="fixedParagraph" class="flex flex-col gap-2" hidden>
            <p class="w-full h-fit border-1 rounded-xl p-2" id="paragraphFixed"></p>
        
            <div class="flex flex-row gap-5">
                <button type="button" id="delFixedParagraph" class="bg-red-700 rounded-3xl text-2xl p-2 text-white">Supprimer</button>
            </div>
        </div>
        
    </div>
    ';
}

function addSubtitle()
{

    echo '
    <div class="flex flex-col gap-3 items-center bg-yellow-950/10 p-2 rounded-xl">

        <input class="w-full h-fit border-1 rounded-xl p-2" name="subtitleTemp" id="paragraphTemp" placeholder="Entrez votre sous-titre."></textarea>
    
        <div class="flex flex-row gap-5">
            <p class="bg-green-700 rounded-3xl text-2xl p-2 text-white">Valider</p>
            <p class="bg-red-700 rounded-3xl text-2xl p-2 text-white">Supprimer</p>
        </div>
    </div>
    ';
}
?>




