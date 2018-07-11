<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>

     <form action="uploadarchivo.php" id="upload" method="post" enctype="multipart/form-data">
        <div> Nombre:
             <input type="text"   name="nombre" id='nombre'  value=''>
        </div>
        <div> Apellido :
             <input type="text"   name="apellido" id='apellido'  value=''>
        </div>

        <input name="archivo" type="file" /><br />

        <button id="iniciar"  type="submit"  >Iniciar Session </button>    
         
        
 
    </form>
</div>
     
</body>
</html>