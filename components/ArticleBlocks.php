<?php
function addParagraph($position)
{
    echo '
    <form method="post" id="tempParagraph" >

        <div class="flex flex-col gap-3 items-center bg-yellow-950/10 p-2 rounded-xl w-full">
            <textarea class="w-full h-fit border-1 rounded-xl p-2" name="paragraphTemp" id="paragraphTemp" cols="10" rows="10" placeholder="Entrez votre texte"></textarea>
    
            <div class="flex flex-row gap-5">
                <button type="submit" name="tempParagraph" value="'.$position.'" class="bg-green-700 rounded-3xl text-2xl p-2 text-white transition hover:scale-105">Valider</button>
                <button type="button" id="delTempParagraph" class="bg-red-700 rounded-3xl text-2xl p-2 text-white">Supprimer</button>
            </div>
        </div>
        
    </form>
    ';
}

function addSubtitle($position)
{

    echo '
    <form method="post" id="tempSubtitle" >

        <div class="flex flex-col gap-3 items-center bg-yellow-950/10 p-2 rounded-xl w-full">
            <input class="w-full h-fit border-1 rounded-xl p-2" name="subtitleTemp" id="subtitleTemp" placeholder="Entrez votre sous-titre."></textarea>
 
            <div class="flex flex-row gap-5">
                <button type="submit" name="tempParagraph" value="'.$position.'" class="bg-green-700 rounded-3xl text-2xl p-2 text-white transition hover:scale-105">Valider</button>
                <button type="button" id="delTempParagraph" class="bg-red-700 rounded-3xl text-2xl p-2 text-white">Supprimer</button>
            </div>
        </div>
        
    </form>
    ';
}


function addImage($position)
{
    echo '
    <form method="post" id="tempImage" enctype="multipart/form-data">

        <div class="flex flex-col gap-3 items-center bg-yellow-950/10 p-2 rounded-xl">
            <h2 class="text-2xl">Choisissez une image en cliquant ci dessous</h2>
        
            <input type="file" class="w-fit h-[10rem] border-1 rounded-xl p-2 bg-white transition hover:scale-105 duration:50" name="imageTemp" id="imageTemp">
 
            <div class="flex flex-row gap-5">
                <button type="submit" name="tempParagraph" value="'.$position.'" class="bg-green-700 rounded-3xl text-2xl p-2 text-white transition hover:scale-105">Valider</button>
                <button type="button" id="delTempParagraph" class="bg-red-700 rounded-3xl text-2xl p-2 text-white">Supprimer</button>
            </div>
        </div>
        
    </form>
    ';
}

?>




