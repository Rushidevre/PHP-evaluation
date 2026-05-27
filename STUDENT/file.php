<?php 
$demo = 'file.txt';
function read($demo){
    if(file_exists($demo)){
        $data=file_get_contents($demo);
        echo nl2br($data);
    }
    
}

//read($demo);

function write($demo ,$id ,$name , $sal){
    $data="$id:$name:$sal";
    file_put_contents($demo,array($id,$name,$sal));
    echo nl2br($data);
}

//write($demo,1 ,"tom" ,100);


function append($demo ,$id ,$name , $sal){
    $data="$id:$name:$sal";
    file_put_contents($demo,array($id,$name,$sal),FILE_APPEND);
    echo ($data);
}

//append($demo,2 ,"jerry" ,10);

function delete($demo){
    if(file_exists($demo)){
        unlink($demo);
        echo "file deleted";
    }
    else{
        echo "file not found";
    }
}
delete($demo);

?>